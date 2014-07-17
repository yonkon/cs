<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:48
         compiled from "/home/shikon/proj/cs/design/backend/templates/common/comet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142210052453c6c5c8734841-12615639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b76ba998762bb46a570af2222c8d40449ed643f' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/common/comet.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '142210052453c6c5c8734841-12615639',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5c876ff34_95662141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5c876ff34_95662141')) {function content_53c6c5c876ff34_95662141($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('processing'));
?>
<a id="comet_container_controller" data-backdrop="static" data-keyboard="false" href="#comet_control" data-toggle="modal" class="hide"></a>

<div class="modal hide fade" id="comet_control" tabindex="-1" role="dialog" aria-labelledby="comet_title" aria-hidden="true">
    <div class="modal-header">
        <h3 id="comet_title"><?php echo $_smarty_tpl->__("processing");?>
</h3>
    </div>
    <div class="modal-body">
        <p></p>
        <div class="progress progress-striped active">
            
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>
</div><?php }} ?>
