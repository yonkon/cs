<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:43
         compiled from "/home/shikon/proj/cs/design/backend/templates/addons/news_and_emails/hooks/index/recent_activity_item.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130354758153c6c5c38f9ac5-26427484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c80df3d2598bab72c5e8b101a6e3181388893d5' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/addons/news_and_emails/hooks/index/recent_activity_item.post.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '130354758153c6c5c38f9ac5-26427484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5c397ed80_12586157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5c397ed80_12586157')) {function content_53c6c5c397ed80_12586157($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']=="news") {?>
    <a href="<?php echo htmlspecialchars(fn_url("news.update?news_id=".((string)$_smarty_tpl->tpl_vars['item']->value['content']['id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['content']['news'], ENT_QUOTES, 'UTF-8');?>
</a><br>                        
<?php }?><?php }} ?>
