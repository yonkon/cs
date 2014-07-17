<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:40:04
         compiled from "/home/shikon/proj/cs/design/backend/templates/views/settings_wizard/components/ssl_checking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172685790553c6c704b5d062-58187959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2da46a49ae2fd965f668db8ec7c02fae716109c' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/views/settings_wizard/components/ssl_checking.tpl',
      1 => 1405209973,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '172685790553c6c704b5d062-58187959',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'checking_result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c704c490e1_83437425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c704c490e1_83437425')) {function content_53c6c704c490e1_83437425($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('warning_https_disabled','ssl_certificate','check_ssl','fail','ok'));
?>
<div id="ssl_checking">
    <?php if ($_smarty_tpl->tpl_vars['checking_result']->value=="fail") {?>
    <br>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p><?php echo $_smarty_tpl->__("warning_https_disabled");?>
</p>
    </div>
    <?php }?>
    <br>
    <div class="control-group setting-wide">
        <label for="" class="control-label"><?php echo $_smarty_tpl->__("ssl_certificate");?>
</label>
        <div class="controls">
            <a class="btn cm-ajax" href="<?php echo htmlspecialchars(fn_url("settings_wizard.check_ssl"), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="ssl_checking"><?php echo $_smarty_tpl->__("check_ssl");?>
</a>
            <?php if ($_smarty_tpl->tpl_vars['checking_result']->value=="fail") {?>
                <span class="label label-important"><?php echo $_smarty_tpl->__("fail");?>
</span>
            <?php } elseif ($_smarty_tpl->tpl_vars['checking_result']->value=="ok") {?>
                <span class="label label-success"><?php echo $_smarty_tpl->__("ok");?>
</span>
            <?php }?>
        </div>
    </div>
<!--ssl_checking--></div><?php }} ?>
