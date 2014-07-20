<?php

use Tygh\Registry;
use Tygh\Session;
use Tygh\Mailer;
use Agent;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //
    // Create/Update user
    //
    if ($mode == 'update') {
        if (fn_image_verification('use_for_register', $_REQUEST) == false) {
            fn_save_post_data('user_data');

            return array(CONTROLLER_STATUS_REDIRECT, 'agents.add');
        }

        $is_update = !empty($_REQUEST['user_data']['user_id']);

        if (!$is_update) {
            $is_valid_user_data = true;

            if (empty($_REQUEST['user_data']['email'])) {
                fn_set_notification('W', __('warning'), __('error_validator_required', array('[field]' => __('email'))));
                $is_valid_user_data = false;

            } elseif (!fn_validate_email($_REQUEST['user_data']['email'])) {
                fn_set_notification('W', __('error'), __('text_not_valid_email', array('[email]' => $_REQUEST['user_data']['email'])));
                $is_valid_user_data = false;
            }
            $_REQUEST['user_data']['password1'] = $_REQUEST['user_data']['password2'] = fn_generate_guest_password();
            if (empty($_REQUEST['user_data']['password1']) || empty($_REQUEST['user_data']['password2'])) {

                if (empty($_REQUEST['user_data']['password1'])) {
                    fn_set_notification('W', __('warning'), __('error_validator_required', array('[field]' => __('password'))));
                }

                if (empty($_REQUEST['user_data']['password2'])) {
                    fn_set_notification('W', __('warning'), __('error_validator_required', array('[field]' => __('confirm_password'))));
                }
                $is_valid_user_data = false;

            } elseif ($_REQUEST['user_data']['password1'] !== $_REQUEST['user_data']['password2']) {
                fn_set_notification('W', __('warning'), __('error_validator_password', array('[field2]' => __('password'), '[field]' => __('confirm_password'))));
                $is_valid_user_data = false;
            }

            if (!$is_valid_user_data) {
                return array(CONTROLLER_STATUS_REDIRECT, 'agents.add');
            }
        }

        fn_restore_processed_user_password($_REQUEST['user_data'], $_POST['user_data']);

        $res = fn_update_subagent($_REQUEST['user_data']['user_id'], $_REQUEST['user_data'], $auth, !empty($_REQUEST['ship_to_another']), true);

        if ($res) {
            list($user_id, $profile_id) = $res;

            // Cleanup user info stored in cart
            if (!empty($_SESSION['cart']) && !empty($_SESSION['cart']['user_data'])) {
                unset($_SESSION['cart']['user_data']);
            }

            // Delete anonymous authentication
            if ($cu_id = fn_get_session_data('cu_id') && !empty($auth['user_id'])) {
                fn_delete_session_data('cu_id');
            }

            Session::regenerateId();

            if (!empty($_REQUEST['return_url'])) {
                return array(CONTROLLER_STATUS_OK, $_REQUEST['return_url']);
            }

        } else {
            fn_save_post_data('user_data');
            fn_delete_notification('changes_saved');
        }

        if (!empty($user_id) && !$is_update) {
            $redirect_url = "profiles.success_add";
        } else {
            $redirect_url = "profiles." . (!empty($user_id) ? "update" : "add") . "?";

            if (Registry::get('settings.General.user_multiple_profiles') == 'Y') {
                $redirect_url .= "profile_id=$profile_id&";
            }

            if (!empty($_REQUEST['return_url'])) {
                $redirect_url .= 'return_url=' . urlencode($_REQUEST['return_url']);
            }
        }

        return array(CONTROLLER_STATUS_OK, $redirect_url);
    }
}

if ($mode == 'add') {

    if (!empty($auth['user_id'])) {
        return array(CONTROLLER_STATUS_REDIRECT, "profiles.update");
    }

    fn_add_breadcrumb(__('registration'));

    $user_data = array();
    if (!empty($_SESSION['cart']) && !empty($_SESSION['cart']['user_data'])) {
        $user_data = $_SESSION['cart']['user_data'];
    }

    $restored_user_data = fn_restore_post_data('user_data');
    if ($restored_user_data) {
        $user_data = fn_array_merge($user_data, $restored_user_data);
    }

    Registry::set('navigation.tabs.general', array (
        'title' => __('general'),
        'js' => true
    ));

    $params = array();
    if (isset($_REQUEST['user_type'])) {
        $params['user_type'] = $_REQUEST['user_type'];
    }

    $profile_fields = fn_get_profile_fields('C', array(), CART_LANGUAGE, $params);

    Registry::get('view')->assign('profile_fields', $profile_fields);
    Registry::get('view')->assign('user_data', $user_data);
    Registry::get('view')->assign('ship_to_another', fn_check_shipping_billing($user_data, $profile_fields));
    Registry::get('view')->assign('countries', fn_get_simple_countries(true, CART_LANGUAGE));
    Registry::get('view')->assign('states', fn_get_all_states());

} elseif ($mode == 'add_subagent') {
    if (empty($auth['user_id'])) {
        return array(CONTROLLER_STATUS_REDIRECT, "auth.login_form?return_url=".urlencode(Registry::get('config.current_url')));
    }
    Registry::get('view')->assign('content_tpl', 'views/agents/update_subagent.tpl');

    $profile_id = null; /*empty($_REQUEST['profile_id']) ? 0 : $_REQUEST['profile_id'];*/
    fn_add_breadcrumb(__('editing_profile'));

//    if (!empty($_REQUEST['profile']) && $_REQUEST['profile'] == 'new') {
//        $user_data = fn_get_user_info($auth['user_id'], false);
//    } else {
//        $user_data = fn_get_user_info($auth['user_id'], true, $profile_id);
//    }

    $user_data = fn_get_agent_by_id($auth['user_id']);

    if (empty($user_data)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }
    if(empty ($_REQUEST['user_data'])) {
//        Registry::get('view')->display('views/agents/update_subagent.tpl');
        return array(CONTROLLER_STATUS_OK);
    }
    $subagent_data = $_REQUEST['user_data'];
    $subagent_data['curator_id'] = $user_data['user_id'];
    $subagent_data['company_id'] = $user_data['company_id'];
    $subagent_data['company'] = $user_data['company'];
    $restored_user_data = fn_restore_post_data('user_data');
    if ($restored_user_data) {
        $subagent_data = fn_array_merge($subagent_data, $restored_user_data);
    }
    $res = fn_update_subagent(null, $subagent_data, array(), !empty($_REQUEST['ship_to_another']), true);

    Registry::set('navigation.tabs.general', array (
        'title' => __('general'),
        'js' => true
    ));

    $show_usergroups = true;
    if (Registry::get('settings.General.allow_usergroup_signup') != 'Y') {
        $show_usergroups = fn_user_has_active_usergroups($user_data);
    }

    if ($show_usergroups) {
        $usergroups = fn_get_usergroups('C');
        if (!empty($usergroups)) {
            Registry::set('navigation.tabs.usergroups', array (
                'title' => __('usergroups'),
                'js' => true
            ));

            Registry::get('view')->assign('usergroups', $usergroups);
        }
    }

    $profile_fields = array();

    Registry::get('view')->assign('profile_fields', $profile_fields);
    Registry::get('view')->assign('user_data', $user_data);
    Registry::get('view')->assign('ship_to_another', fn_check_shipping_billing($user_data, $profile_fields));
    Registry::get('view')->assign('countries', fn_get_simple_countries(true, CART_LANGUAGE));
    Registry::get('view')->assign('states', fn_get_all_states());
    if (Registry::get('settings.General.user_multiple_profiles') == 'Y') {
        Registry::get('view')->assign('user_profiles', fn_get_user_profiles($auth['user_id']));
    }

} elseif ($mode == 'update') {

    if (empty($auth['user_id'])) {
        return array(CONTROLLER_STATUS_REDIRECT, "auth.login_form?return_url=".urlencode(Registry::get('config.current_url')));
    }

    $profile_id = empty($_REQUEST['profile_id']) ? 0 : $_REQUEST['profile_id'];
    fn_add_breadcrumb(__('editing_profile'));

    if (!empty($_REQUEST['profile']) && $_REQUEST['profile'] == 'new') {
        $user_data = fn_get_user_info($auth['user_id'], false);
    } else {
        $user_data = fn_get_user_info($auth['user_id'], true, $profile_id);
    }

    if (empty($user_data)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    $restored_user_data = fn_restore_post_data('user_data');
    if ($restored_user_data) {
        $user_data = fn_array_merge($user_data, $restored_user_data);
    }

    Registry::set('navigation.tabs.general', array (
        'title' => __('general'),
        'js' => true
    ));

    $show_usergroups = true;
    if (Registry::get('settings.General.allow_usergroup_signup') != 'Y') {
        $show_usergroups = fn_user_has_active_usergroups($user_data);
    }

    if ($show_usergroups) {
        $usergroups = fn_get_usergroups('C');
        if (!empty($usergroups)) {
            Registry::set('navigation.tabs.usergroups', array (
                'title' => __('usergroups'),
                'js' => true
            ));

            Registry::get('view')->assign('usergroups', $usergroups);
        }
    }

    $profile_fields = fn_get_profile_fields();

    Registry::get('view')->assign('profile_fields', $profile_fields);
    Registry::get('view')->assign('user_data', $user_data);
    Registry::get('view')->assign('ship_to_another', fn_check_shipping_billing($user_data, $profile_fields));
    Registry::get('view')->assign('countries', fn_get_simple_countries(true, CART_LANGUAGE));
    Registry::get('view')->assign('states', fn_get_all_states());
    if (Registry::get('settings.General.user_multiple_profiles') == 'Y') {
        Registry::get('view')->assign('user_profiles', fn_get_user_profiles($auth['user_id']));
    }

// Delete profile
} elseif ($mode == 'delete_profile') {

    fn_delete_user_profile($auth['user_id'], $_REQUEST['profile_id']);

    return array(CONTROLLER_STATUS_OK, "profiles.update");

} elseif ($mode == 'usergroups') {
    if (empty($auth['user_id']) || empty($_REQUEST['type']) || empty($_REQUEST['usergroup_id'])) {
        return array(CONTROLLER_STATUS_DENIED);
    }

    if (fn_request_usergroup($auth['user_id'], $_REQUEST['usergroup_id'], $_REQUEST['type'])) {
        $user_data = fn_get_user_info($auth['user_id']);

        Mailer::sendMail(array(
            'to' => 'default_company_users_department',
            'from' => 'default_company_users_department',
            'reply_to' => $user_data['email'],
            'data' => array(
                'user_data' => $user_data,
                'usergroups' => fn_get_usergroups('F', Registry::get('settings.Appearance.backend_default_language')),
                'usergroup_id' => $_REQUEST['usergroup_id']
            ),
            'tpl' => 'profiles/usergroup_request.tpl',
            'company_id' => $user_data['company_id'],
        ), 'A', Registry::get('settings.Appearance.backend_default_language'));
    }

    return array(CONTROLLER_STATUS_OK, "profiles.update");

} elseif ($mode == 'success_add') {

    if (empty($auth['user_id'])) {
        return array(CONTROLLER_STATUS_REDIRECT, "profiles.add");
    }

    fn_add_breadcrumb(__('registration'));
}

/**
 * Requests usergroup for customer
 *
 * @param int $user_id User identifier
 * @param int $usergroup_id Usergroup identifier
 * @param string $type Type of request (join|cancel)
 * @return bool True if request successfuly sent, false otherwise
 */
function fn_request_usergroup($user_id, $usergroup_id, $type)
{
    $success = false;
    if (!empty($user_id)) {
        $_data = array(
            'user_id' => $user_id,
            'usergroup_id' => $usergroup_id,
        );

        if ($type == 'cancel') {
            $_data['status'] = 'F';

        } elseif ($type == 'join') {
            $_data['status'] = 'P';
            $success = true;
        }

        if (!empty($_data['status'])) {
            db_query("REPLACE INTO ?:usergroup_links SET ?u", $_data);
        }
    }

    return $success;
}


function fn_get_agent_by_id($id) {
    $agent = db_get_row('SELECT * FROM ?:users WHERE user_id = ?i', $id );

    return $agent;
}


/**
 * Add/update user
 *
 * @param int $user_id - user ID to update (empty for new user)
 * @param array $user_data - user data
 * @param array $auth - authentication information
 * @param bool $ship_to_another - flag indicates that shipping and billing fields are different
 * @param bool $notify_user - flag indicates that user should be notified
 * @param bool $send_password - TRUE if the password should be included into the e-mail
 * @return array with user ID and profile ID if success, false otherwise
 */
function fn_update_subagent ($user_id, $user_data, &$auth, $ship_to_another, $notify_user, $send_password = false)
{
    /**
     * Actions before updating user
     *
     * @param int   $user_id         User ID to update (empty for new user)
     * @param array $user_data       User data
     * @param array $auth            Authentication information
     * @param bool  $ship_to_another Flag indicates that shipping and billing fields are different
     * @param bool  $notify_user     Flag indicates that user should be notified
     * @param bool  $send_password   TRUE if the password should be included into the e-mail
     */
    fn_set_hook('update_user_pre', $user_id, $user_data, $auth, $ship_to_another, $notify_user, $send_password);

    $register_at_checkout = isset($user_data['register_at_checkout']) && $user_data['register_at_checkout'] == 'Y' ? true : false;

    if (fn_allowed_for('ULTIMATE')) {
        if (AREA == 'A' && !empty($user_data['user_type']) && $user_data['user_type'] == 'C' && (empty($user_data['company_id']) || (Registry::get('runtime.company_id') &&  $user_data['company_id'] != Registry::get('runtime.company_id')))) {
            fn_set_notification('W', __('warning'), __('access_denied'));

            return false;
        }
    }

    if (!empty($user_id)) {
        $current_user_data = db_get_row("SELECT user_id, company_id, is_root, status, user_type, user_login, lang_code, password, salt, last_passwords FROM ?:users WHERE user_id = ?i", $user_id);

        if (empty($current_user_data)) {
            fn_set_notification('E', __('error'), __('object_not_found', array('[object]' => __('user'))),'','404');

            return false;
        }



        if (fn_allowed_for('ULTIMATE')) {
            if (AREA != 'A' || empty($user_data['company_id'])) {
                //we should set company_id for the frontdend, in the backend company_id received from form
                if ($current_user_data['user_type'] == 'A') {
                    if (!isset($user_data['company_id']) || AREA != 'A' || Registry::get('runtime.company_id')) {
                        // reset administrator's company if it was not set to root
                        $user_data['company_id'] = $current_user_data['company_id'];
                    }
                } elseif (Registry::get('settings.Stores.share_users') == 'Y') {
                    $user_data['company_id'] = $current_user_data['company_id'];
                } else {
                    $user_data['company_id'] = Registry::ifGet('runtime.company_id', 1);
                }
            }
        }

        if (fn_allowed_for('MULTIVENDOR')) {
            if (AREA != 'A') {
                //we should set company_id for the frontend
                $user_data['company_id'] = $current_user_data['company_id'];
            }
        }

        $action = 'update';
    } else {
        $current_user_data = array(
            'status' => (AREA != 'A' && Registry::get('settings.General.approve_user_profiles') == 'Y') ? 'D' : (!empty($user_data['status']) ? $user_data['status'] : 'A'),
            'user_type' => 'C', // FIXME?
        );

        if (fn_allowed_for('ULTIMATE')) {
            if (!empty($user_data['company_id']) || Registry::get('runtime.company_id') || AREA == 'A') {
                //company_id can be received when we create user account from the backend
                $company_id = !empty($user_data['company_id']) ? $user_data['company_id'] : Registry::get('runtime.company_id');
                if (empty($company_id)) {
                    $company_id = fn_check_user_type_admin_area($user_data['user_type']) ? $user_data['company_id'] : fn_get_default_company_id();
                }
                $user_data['company_id'] = $current_user_data['company_id'] = $company_id;
            } else {
                fn_set_notification('W', __('warning'), __('access_denied'));

                return false;
            }
        }

        $action = 'add';

        $user_data['lang_code'] = !empty($user_data['lang_code']) ? $user_data['lang_code'] : CART_LANGUAGE;
        $user_data['timestamp'] = TIME;
    }

    $original_password = '';
    $current_user_data['password'] = !empty($current_user_data['password']) ? $current_user_data['password'] : '';
    $current_user_data['salt'] = !empty($current_user_data['salt']) ? $current_user_data['salt'] : '';

    // Set the user type
    $user_data['user_type'] = fn_check_user_type($user_data, $current_user_data);

    if (
        Registry::get('runtime.company_id')
        && !fn_allowed_for('ULTIMATE')
        && (
            !fn_check_user_type_admin_area($user_data['user_type'])
            || (
                isset($current_user_data['company_id'])
                && $current_user_data['company_id'] != Registry::get('runtime.company_id')
            )
        )
    ) {
        fn_set_notification('W', __('warning'), __('access_denied'));

        return false;
    }

    // Check if this user needs login/password
    if (fn_user_need_login($user_data['user_type'])) {
        // Check if user_login already exists
        // FIXME
        if (!isset($user_data['email'])) {
            $user_data['email'] = db_get_field("SELECT email FROM ?:users WHERE user_id = ?i", $user_id);
        }

        $is_exist = fn_is_user_exists($user_id, $user_data);

        if ($is_exist) {
            fn_set_notification('E', __('error'), __('error_user_exists'), '', 'user_exist');

            return false;
        }

        // Check the passwords
        if (!empty($user_data['password1']) || !empty($user_data['password2'])) {
            $original_password = trim($user_data['password1']);
            $user_data['password1'] = !empty($user_data['password1']) ? trim($user_data['password1']) : '';
            $user_data['password2'] = !empty($user_data['password2']) ? trim($user_data['password2']) : '';
        }

        // if the passwords are not set and this is not a forced password check
        // we will not update password, otherwise let's check password
        if (!empty($_SESSION['auth']['forced_password_change']) || !empty($user_data['password1']) || !empty($user_data['password2'])) {

            $valid_passwords = true;

            if ($user_data['password1'] != $user_data['password2']) {
                $valid_passwords = false;
                fn_set_notification('E', __('error'), __('error_passwords_dont_match'));
            }

            // PCI DSS Compliance
            if (fn_check_user_type_admin_area($user_data['user_type'])) {

                $msg = array();
                // Check password length
                $min_length = Registry::get('settings.Security.min_admin_password_length');
                if (strlen($user_data['password1']) < $min_length || strlen($user_data['password2']) < $min_length) {
                    $valid_passwords = false;
                    $msg[] = str_replace("[number]", $min_length, __('error_password_min_symbols'));
                }

                // Check password content
                if (Registry::get('settings.Security.admin_passwords_must_contain_mix') == 'Y') {
                    $tmp_result = preg_match('/\d+/', $user_data['password1']) && preg_match('/\D+/', $user_data['password1']) && preg_match('/\d+/', $user_data['password2']) && preg_match('/\D+/', $user_data['password2']);
                    if (!$tmp_result) {
                        $valid_passwords = false;
                        $msg[] = __('error_password_content');
                    }
                }

                if ($msg) {
                    fn_set_notification('E', __('error'), implode('<br />', $msg));
                }

                // Check last 4 passwords
                if (!empty($user_id)) {
                    $prev_passwords = !empty($current_user_data['last_passwords']) ? explode(',', $current_user_data['last_passwords']) : array();

                    if (!empty($_SESSION['auth']['forced_password_change'])) {
                        // if forced password change - new password can't be equal to current password.
                        $prev_passwords[] = $current_user_data['password'];
                    }

                    if (in_array(fn_generate_salted_password($user_data['password1'], $current_user_data['salt']), $prev_passwords)) {
                        $valid_passwords = false;
                        fn_set_notification('E', __('error'), __('error_password_was_used'));
                    } else {
                        if (count($prev_passwords) >= 5) {
                            array_shift($prev_passwords);
                        }
                        $user_data['last_passwords'] = implode(',', $prev_passwords);
                    }
                }
            } // PCI DSS Compliance

            if (!$valid_passwords) {
                return false;
            }

            $user_data['salt'] = fn_generate_salt();
            $user_data['password'] = fn_generate_salted_password($user_data['password1'], $user_data['salt']);
            if ($user_data['password'] != $current_user_data['password'] && !empty($user_id)) {
                // if user set current password - there is no necessity to update password_change_timestamp
                $user_data['password_change_timestamp'] = $_SESSION['auth']['password_change_timestamp'] = TIME;
            }
            unset($_SESSION['auth']['forced_password_change']);
            fn_delete_notification('password_expire');

        }
    }

    $user_data['status'] = (AREA != 'A' || empty($user_data['status'])) ? $current_user_data['status'] : $user_data['status']; // only administrator can change user status

    // Fill the firstname, lastname and phone from the billing address if the profile was created or updated through the admin area.
    if (AREA != 'A') {
        Registry::get('settings.General.address_position') == 'billing_first' ? $address_zone = 'b' : $address_zone = 's';
    } else {
        $address_zone = 'b';
    }
    if (!empty($user_data['firstname']) || !empty($user_data[$address_zone . '_firstname'])) {
        $user_data['firstname'] = empty($user_data['firstname']) && !empty($user_data[$address_zone . '_firstname']) ? $user_data[$address_zone . '_firstname'] : $user_data['firstname'];
    }
    if (!empty($user_data['lastname']) || !empty($user_data[$address_zone . '_lastname'])) {
        $user_data['lastname'] = empty($user_data['lastname']) && !empty($user_data[$address_zone . '_lastname']) ? $user_data[$address_zone . '_lastname'] : $user_data['lastname'];
    }
    if (!empty($user_data['phone']) || !empty($user_data[$address_zone . '_phone'])) {
        $user_data['phone'] = empty($user_data['phone']) && !empty($user_data[$address_zone . '_phone']) ? $user_data[$address_zone . '_phone'] : $user_data['phone'];
    }

    if (!fn_allowed_for('ULTIMATE')) {
        //for ult company_id was set before
        fn_set_company_id($user_data);
    }

    if (!empty($current_user_data['is_root']) && $current_user_data['is_root'] == 'Y') {
        $user_data['is_root'] = 'Y';
    } else {
        $user_data['is_root'] = 'N';
    }

    // check if it is a root admin
    $is_root_admin_exists = db_get_field(
        "SELECT user_id FROM ?:users WHERE company_id = ?i AND is_root = 'Y' AND user_id != ?i",
        $user_data['company_id'], !empty($user_id) ? $user_id : 0
    );
    $user_data['is_root'] = empty($is_root_admin_exists) && $user_data['user_type'] !== 'C' ? 'Y' : 'N';

    unset($user_data['user_id']);

    if (!empty($user_id)) {
        db_query("UPDATE ?:users SET ?u WHERE user_id = ?i", $user_data, $user_id);

        fn_clean_usergroup_links($user_id, $current_user_data['user_type'], $user_data['user_type']);

        fn_log_event('users', 'update', array(
            'user_id' => $user_id,
        ));
    } else {
        if (!isset($user_data['password_change_timestamp'])) {
            $user_data['password_change_timestamp'] = 1;
        }

        $user_id = db_query("INSERT INTO ?:users ?e" , $user_data);

        fn_log_event('users', 'create', array(
            'user_id' => $user_id,
        ));
    }
    $user_data['user_id'] = $user_id;

    // Set/delete insecure password notification
    if (AREA == 'A' && Registry::get('config.demo_mode') != true && !empty($user_data['password1'])) {
        if (!fn_compare_login_password($user_data, $user_data['password1'])) {
            fn_delete_notification('insecure_password');
        } else {

            $lang_var = 'warning_insecure_password';
            if (Registry::get('settings.General.use_email_as_login') == 'Y') {
                $lang_var = 'warning_insecure_password_email';
            }

            fn_set_notification('E', __('warning'), __($lang_var, array(
                '[link]' => fn_url("profiles.update?user_id=" . $user_id)
            )), 'K', 'insecure_password');
        }
    }

    if (empty($user_data['user_login'])) { // if we're using email as login or user type does not require login, fill login field
        db_query("UPDATE ?:users SET user_login = 'user_?i' WHERE user_id = ?i AND user_login = ''", $user_id, $user_id);
    }

//    // Fill shipping info with billing if needed
//    if (empty($ship_to_another)) {
//        $profile_fields = fn_get_profile_fields($user_data['user_type']);
//        $use_default = (AREA == 'A') ? true : false;
//        fn_fill_address($user_data, $profile_fields, $use_default);
//    }


    if ($register_at_checkout) {
        $user_data['register_at_checkout'] = 'Y';
    }
    $lang_code = (AREA == 'A' && !empty($user_data['lang_code'])) ? $user_data['lang_code'] : CART_LANGUAGE;

    if (!fn_allowed_for('ULTIMATE:FREE')) {
        $user_data['usergroups'] = db_get_hash_array(
            "SELECT lnk.link_id, lnk.usergroup_id, lnk.status, a.type, b.usergroup"
            . " FROM ?:usergroup_links as lnk"
            . " INNER JOIN ?:usergroups as a ON a.usergroup_id = lnk.usergroup_id AND a.status != 'D'"
            . " LEFT JOIN ?:usergroup_descriptions as b ON b.usergroup_id = a.usergroup_id AND b.lang_code = ?s"
            . " WHERE a.status = 'A' AND lnk.user_id = ?i AND lnk.status != 'D' AND lnk.status != 'F'"
            , 'usergroup_id', $lang_code, $user_id
        );
    }

    // Send notifications to customer
    if (!empty($notify_user)) {
        $from = 'company_users_department';

        if (fn_allowed_for('MULTIVENDOR')) {
            // Vendor administrator's notification
            // is sent from root users department
            if ($user_data['user_type'] == 'V') {
                $from = 'default_company_users_department';
            }
        }

        // Notify customer about profile activation (when update profile only)
        if ($action == 'update' && $current_user_data['status'] === 'D' && $user_data['status'] === 'A') {
            Mailer::sendMail(array(
                'to' => $user_data['email'],
                'from' => $from,
                'data' => array(
                    'password' => $original_password,
                    'send_password' => $send_password,
                    'user_data' => $user_data
                ),
                'tpl' => 'profiles/profile_activated.tpl',
                'company_id' => $user_data['company_id']
            ), fn_check_user_type_admin_area($user_data['user_type']) ? 'A' : 'C', $lang_code);
        }

        // Notify customer about profile add/update
        $prefix = ($action == 'add') ? 'create' : 'update';

        Mailer::sendMail(array(
            'to' => $user_data['email'],
            'from' => $from,
            'data' => array(
                'password' => $original_password,
                'send_password' => $send_password,
                'user_data' => $user_data,
            ),
            'tpl' => 'profiles/' . $prefix . '_profile.tpl',
            'company_id' => $user_data['company_id']
        ), fn_check_user_type_admin_area($user_data['user_type']) ? 'A' : 'C', $lang_code);
    }

    if ($action == 'add') {

        $skip_auth = false;
        if (AREA != 'A') {
            if (Registry::get('settings.General.approve_user_profiles') == 'Y') {
                fn_set_notification('W', __('important'), __('text_profile_should_be_approved'));

                // Notify administrator about new profile
                Mailer::sendMail(array(
                    'to' => 'company_users_department',
                    'from' => 'company_users_department',
                    'reply_to' => $user_data['email'],
                    'data' => array(
                        'user_data' => $user_data,
                    ),
                    'tpl' => 'profiles/activate_profile.tpl',
                    'company_id' => $user_data['company_id']
                ), 'A', Registry::get('settings.Appearance.backend_default_language'));

                $skip_auth = true;
            } else {
                fn_set_notification('N', __('information'), __('text_profile_is_created'));
            }
        }

        if (!is_null($auth)) {

            if (empty($skip_auth)) {
                $auth = fn_fill_auth($user_data);
            }
        }
    } else {
        if (AREA == 'C') {
            fn_set_notification('N', __('information'), __('text_profile_is_updated'));
        }
    }

    return array($user_id, !empty($user_data['profile_id']) ? $user_data['profile_id'] : false);

}