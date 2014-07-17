<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:41
         compiled from "/home/shikon/proj/cs/design/backend/templates/common/loading_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85335651953c6c5c13c1444-83403891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dee81c5a33e4d262cdeaabccd52dd507d750fa3' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/common/loading_box.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '85335651953c6c5c13c1444-83403891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5c141ca12_71027107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5c141ca12_71027107')) {function content_53c6c5c141ca12_71027107($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('loading'));
?>
<div id="ajax_overlay" class="ajax-overlay"></div>
<div id="ajax_loading_box" class="hidden ajax-loading-box">
    <strong><?php echo $_smarty_tpl->__("loading");?>
</strong>
</div>
<?php }} ?>
