<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:40:06
         compiled from "/home/shikon/proj/cs/design/backend/templates/buttons/button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95434142253c6c7064751d8-87929908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9802c50daafb15b87da71ae150202a6c962d89a5' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/buttons/button.tpl',
      1 => 1405209972,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '95434142253c6c7064751d8-87929908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_role' => 0,
    'but_name' => 0,
    'but_href' => 0,
    'method' => 0,
    'r' => 0,
    'but_group' => 0,
    'but_type' => 0,
    'but_id' => 0,
    'but_meta' => 0,
    'but_onclick' => 0,
    'allow_href' => 0,
    'but_text' => 0,
    'tabindex' => 0,
    'but_external_click_id' => 0,
    'but_target_form' => 0,
    'but_target_id' => 0,
    'but_check_filter' => 0,
    'but_disabled' => 0,
    'but_target' => 0,
    'title' => 0,
    'but_icon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c7071a7739_90162030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c7071a7739_90162030')) {function content_53c6c7071a7739_90162030($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['but_role']->value=="text") {?>
    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, 0);?>
    <?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("btn", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['but_name']->value) {?><?php $_smarty_tpl->tpl_vars["r"] = new Smarty_variable($_smarty_tpl->tpl_vars['but_name']->value, null, 0);?><?php } else { ?><?php $_smarty_tpl->tpl_vars["r"] = new Smarty_variable($_smarty_tpl->tpl_vars['but_href']->value, null, 0);?><?php }?>
<?php $_smarty_tpl->tpl_vars["method"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['method']->value)===null||$tmp==='' ? "POST" : $tmp), null, 0);?>
<?php if (fn_check_view_permissions($_smarty_tpl->tpl_vars['r']->value,$_smarty_tpl->tpl_vars['method']->value)) {?>

<?php if ($_smarty_tpl->tpl_vars['but_group']->value) {?><div class="btn-group"><?php }?>

<?php if ($_smarty_tpl->tpl_vars['but_role']->value=="submit"||$_smarty_tpl->tpl_vars['but_role']->value=="button_main"||$_smarty_tpl->tpl_vars['but_type']->value||$_smarty_tpl->tpl_vars['but_role']->value=="big") {?> 
    <input <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="btn <?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?> btn-primary<?php }?>" type="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['but_type']->value)===null||$tmp==='' ? "submit" : $tmp), ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['but_name']->value) {?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_name']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?> onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['tabindex']->value) {?>tabindex="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tabindex']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_check_filter']->value) {?> data-ca-check-filter="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_check_filter']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_disabled']->value) {?>disabled="disabled"<?php }?>  />

<?php } elseif ($_smarty_tpl->tpl_vars['but_role']->value&&$_smarty_tpl->tpl_vars['but_role']->value!="submit"&&$_smarty_tpl->tpl_vars['but_role']->value!="action"&&$_smarty_tpl->tpl_vars['but_role']->value!="submit-link"&&$_smarty_tpl->tpl_vars['but_role']->value!="advanced-search"&&$_smarty_tpl->tpl_vars['but_role']->value!="button") {?> 
    <a <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_href']->value) {?> href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['but_href']->value), ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?> onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target']->value) {?> target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>"<?php if ($_smarty_tpl->tpl_vars['title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php if ($_smarty_tpl->tpl_vars['but_icon']->value) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_icon']->value, ENT_QUOTES, 'UTF-8');?>
"></i><?php }?> <?php echo $_smarty_tpl->tpl_vars['but_text']->value;?>
</a>

<?php } elseif ($_smarty_tpl->tpl_vars['but_role']->value=="action"||$_smarty_tpl->tpl_vars['but_role']->value=="advanced-search"||$_smarty_tpl->tpl_vars['but_role']->value=="submit-link") {?> 
    <a <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_href']->value) {?> href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['but_href']->value), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?>onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_target']->value) {?>target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_name']->value) {?> data-ca-dispatch="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_name']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="btn<?php if ($_smarty_tpl->tpl_vars['but_role']->value=="submit-link") {?> btn-primary cm-submit<?php }?><?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>"><?php if ($_smarty_tpl->tpl_vars['but_icon']->value) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_icon']->value, ENT_QUOTES, 'UTF-8');?>
"></i><?php }?> <?php echo $_smarty_tpl->tpl_vars['but_text']->value;?>
</a>
    
<?php } elseif ($_smarty_tpl->tpl_vars['but_role']->value=="button") {?>
    <input <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?>class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> type="button" <?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?>onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['tabindex']->value) {?>tabindex="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tabindex']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> />

<?php } elseif ($_smarty_tpl->tpl_vars['but_role']->value=="icon") {?> 
    <a <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_href']->value) {?> href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['but_href']->value), ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?>onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_target']->value) {?>target="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['but_text']->value;?>
</a>

<?php } elseif (!$_smarty_tpl->tpl_vars['but_role']->value||!$_smarty_tpl->tpl_vars['but_name']->value) {?> 
    <input <?php if ($_smarty_tpl->tpl_vars['but_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="btn <?php if ($_smarty_tpl->tpl_vars['but_meta']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_meta']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>" type="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['but_type']->value)===null||$tmp==='' ? "submit" : $tmp), ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['but_name']->value) {?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_name']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?> onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
;<?php if (!$_smarty_tpl->tpl_vars['allow_href']->value) {?> return false;<?php }?>"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['tabindex']->value) {?>tabindex="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tabindex']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_external_click_id']->value) {?> data-ca-external-click-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_external_click_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_form']->value) {?> data-ca-target-form="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_form']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['but_target_id']->value) {?> data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_target_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['but_disabled']->value) {?>disabled="disabled"<?php }?>  />
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['but_group']->value) {?></div><?php }?>
<?php }?><?php }} ?>
