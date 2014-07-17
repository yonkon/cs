<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:40:06
         compiled from "/home/shikon/proj/cs/design/backend/templates/common/tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2936014653c6c7060bc870-78659208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b19a3b7b521a6d566a8cf07dbe837a04ae0ea608' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/common/tooltip.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2936014653c6c7060bc870-78659208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tooltip' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c70613da07_82988088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c70613da07_82988088')) {function content_53c6c70613da07_82988088($_smarty_tpl) {?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['tooltip']->value) {?><a class="cm-tooltip<?php if ($_smarty_tpl->tpl_vars['params']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tooltip']->value, ENT_QUOTES, 'UTF-8');?>
"><i class="icon-question-sign"></i></a><?php }?><?php }} ?>
