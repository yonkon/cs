<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:22
         compiled from "/home/shikon/proj/cs/design/backend/templates/addons/hybrid_auth/components/google_callback_url.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4130130053c6c5aeae2717-21931464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '570fbc115e68db96b8b1f9adb0a4fa95df80bdd9' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/addons/hybrid_auth/components/google_callback_url.tpl',
      1 => 1405209975,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '4130130053c6c5aeae2717-21931464',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5af19d8f6_30656503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5af19d8f6_30656503')) {function content_53c6c5af19d8f6_30656503($_smarty_tpl) {?><div class="control-group setting-wide">
	<label class="control-label"><?php echo $_smarty_tpl->__('google_callback_url');?>
: </label>
	<div class="controls">
		<input type="text" readonly="readonly" value="<?php echo htmlspecialchars(fn_url("auth.process?hauth.done=Google","C"), ENT_QUOTES, 'UTF-8');?>
" onclick="this.select()">
	</div>
</div><?php }} ?>
