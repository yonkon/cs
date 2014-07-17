{if !"AJAX_REQUEST"|defined}
    {capture name="mainbox"}
{/if}

<div id="rus_activate_form">
    <form name="activate-form"  method="post" action="{""|fn_url}" class="form-horizontal form-edit {if "AJAX_REQUEST"|defined}cm-ajax cm-ajax-force{/if}">
        <input type="hidden" class="cm-no-hide-input" name="selected_section" value="content_license" />

        {capture name="tabsbox"}
        {if $license_info->status ==  "D"}
            {__("rus_connect.end_trial_text")}
        {/if}
        <div id="content_license">

        {if !fn_russian_pack_available()}
            {include file="common/subheader.tpl" title=__("rus_connect.activate_subheader") }
        {else}
            {include file="common/subheader.tpl" title=__("rus_connect.activate_true_subheader") }
            <p>{__("rus_connect.activate_true_text")}</p>
        {/if}
            <input type="hidden" id="rus_register_store_name" name="rus_register[store_name]"  value="{if $addons.rus_build_pack.store_name}{$addons.rus_build_pack.store_name}{else}{$config.http_host}{$config.http_path}{/if}"/>
            <input type="hidden" name="result_ids" value="rus_activate_form"/>

        {if !$config.demo_mode}
            <div class="control-group">
                <label class="control-label" for="elm_license_key">{__("rus_connect.license_key")}:</label>
                <div class="controls">
                    <input type="text" name="rus_register[license_key]" id="elm_license_key" size="10" value="{if $addons.rus_build_pack.license_key}{$addons.rus_build_pack.license_key}{else}{$rus_register.license_key}{/if}" class="input-long" placeholder="{__("please_enter_license_here")}"/>
                    {if !empty($license_info) && $license_info->status == 'T'} ({__('rus_build_pack.active_to')} {$license_info->expiration}){/if}
                    {if !empty($license_info) && $license_info->status == 'D'} ({__('rus_build_pack.end_tial_to')} {$license_info->expiration}){/if}
                </div>
            </div>
        {/if}

        {if !$addons.rus_build_pack.license_key}
              <div class="control-group">
                  <div class="controls">
                      {__("rus_connect.activate_text")}
                  </div>
              </div>
        {/if}
        <!--content_license--></div>
        {if !$addons.rus_build_pack.license_key}
            <div id="content_trial">
                {include file="common/subheader.tpl" title=__("rus_connect.trial_subheader") }
                <p>{__("rus_connect.trial_text")}</p>
                <div class="control-group">
                    <label class="control-label" for="elm_email">{__("rus_connect.email_helpdesk")}:</label>
                    <div class="controls">
                        <input type="text" name="rus_register[email]" id="elm_email" size="10" value="" class="input-long" placeholder="{__("rus_connect.please_enter_email")}"/>
                    </div>
                </div>
            <!--content_trial--></div>
        {/if}
        {/capture}
        {include file="common/tabsbox.tpl" content=$smarty.capture.tabsbox active_tab=$smarty.request.selected_section track=true}

        <div class="control-group">
            <div class="controls">
                <textarea id="rus_build_license" name="rus_register[license_txt]" cols="23" rows="12" class="input-large" readonly="readonly" disabled="disabled">{if $license_txt}{$license_txt}{/if}</textarea>
            </div>
        </div>
        {if !$config.demo_mode}
            <div class="control-group">
                <div class="controls">
                    <label for="id_accept_terms" class="cm-check-agreement checkbox">
                        <input type="checkbox" id="id_accept_terms" name="rus_register[rus_accept_terms]" {if $rus_register.rus_accept_terms == "Y" || $addons.rus_build_pack.rus_accept_terms == "Y"}checked="checked"{/if}  value="Y">
                        {__("rus_connect.terms_n_conditions")}
                    </label>
                </div>
                <div class="controls">
                    <label for="help_us" class="checkbox">
                        <input id="help_us" type="checkbox" name="rus_register[rus_help_us]" {if $rus_register.rus_help_us == "Y" || $addons.rus_build_pack.rus_help_us == "Y"}checked="checked"{/if} value="Y">
                        {__("rus_connect.help_us")}{include file="common/tooltip.tpl" tooltip=__("rus_connect.help_us_tooltip")}
                    </label>
                </div>
            </div>

            {if !"AJAX_REQUEST"|defined}
                {capture name="buttons"}
            {/if}

            {if "AJAX_REQUEST"|defined}
            <div class="buttons-container">
                <a class="btn pull-left cm-dialog-closer cm-tooltip">{__("close")}</a>
                {/if}
                {include file="buttons/button.tpl" but_role="submit-link" but_meta="btn btn-primary" but_name="dispatch[rus_upgrade.activate]" but_target_form="activate-form" but_text=__("rus_connect.activate")}

                {if "AJAX_REQUEST"|defined}
            </div>
            {/if}

            {if !"AJAX_REQUEST"|defined}
            {/capture}
            {/if}
        {/if}
    </form>
<!--rus_activate_form--></div>

{if !"AJAX_REQUEST"|defined}
        {/capture}
        {include file="common/mainbox.tpl" title=__("rus_connect.activate_title") content=$smarty.capture.mainbox title_extra=$smarty.capture.title_extra sidebar=$smarty.capture.sidebar buttons=$smarty.capture.buttons}

{/if}