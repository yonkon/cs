<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:41:11
         compiled from "/home/shikon/proj/cs/design/backend/templates/views/settings_wizard/components/default_currency.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86978180253c6c7472703a4-49992390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00835f4bdd864e6f09765721aab3e55f8b440a36' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/views/settings_wizard/components/default_currency.tpl',
      1 => 1405209973,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '86978180253c6c7472703a4-49992390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currencies' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c74737d070_57195909',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c74737d070_57195909')) {function content_53c6c74737d070_57195909($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('primary_currency'));
?>
<div class="control-group setting-wide">
    <label for="" class="control-label"><?php echo $_smarty_tpl->__("primary_currency");?>
:</label>
    <div class="controls">
        <select name="default_currency">
            <?php  $_smarty_tpl->tpl_vars["currency"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["currency"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["currency"]->key => $_smarty_tpl->tpl_vars["currency"]->value) {
$_smarty_tpl->tpl_vars["currency"]->_loop = true;
?>
                <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['currency_code'], ENT_QUOTES, 'UTF-8');?>
" <?php if (@constant('CART_PRIMARY_CURRENCY')==$_smarty_tpl->tpl_vars['currency']->value['currency_code']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['description'], ENT_QUOTES, 'UTF-8');?>
</option>
            <?php } ?>
        </select>
    </div>
</div><?php }} ?>
