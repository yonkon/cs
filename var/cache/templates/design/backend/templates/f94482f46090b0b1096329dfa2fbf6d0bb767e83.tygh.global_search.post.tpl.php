<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:47
         compiled from "/home/shikon/proj/cs/design/backend/templates/addons/rus_build_pack/hooks/index/global_search.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161747434853c6c5c7e15d31-33473292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f94482f46090b0b1096329dfa2fbf6d0bb767e83' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/addons/rus_build_pack/hooks/index/global_search.post.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '161747434853c6c5c7e15d31-33473292',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5c8000355_07722954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5c8000355_07722954')) {function content_53c6c5c8000355_07722954($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['runtime']->value['controller']!="rus_install"&&$_smarty_tpl->tpl_vars['runtime']->value['mode']!="activate"&&$_smarty_tpl->tpl_vars['runtime']->value['controller']!="index") {?>

	<?php if (!fn_russian_pack_available()) {?>
		<script type="text/javascript">
	        Tygh.$(document).ready(function(){
	            Tygh.$('#rus_activate').trigger('click');
	        });
	    </script>

        <a id="rus_activate" class="hidden cm-dialog-opener cm-ajax btn btn-primary" data-ca-target-id="rus_activate_form" title="<?php echo $_smarty_tpl->__("rus_connect.activate_title");?>
" href="<?php echo htmlspecialchars(fn_url("rus_upgrade.activate"), ENT_QUOTES, 'UTF-8');?>
"></a>
	<?php }?>

<?php }?><?php }} ?>
