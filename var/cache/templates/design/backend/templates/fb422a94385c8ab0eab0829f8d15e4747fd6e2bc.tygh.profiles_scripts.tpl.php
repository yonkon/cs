<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:42:47
         compiled from "/home/shikon/proj/cs/design/backend/templates/views/profiles/components/profiles_scripts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181171327353c6c7a7252041-05484605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb422a94385c8ab0eab0829f8d15e4747fd6e2bc' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/views/profiles/components/profiles_scripts.tpl',
      1 => 1405209973,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '181171327353c6c7a7252041-05484605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'states' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c7a73222d4_11787218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c7a73222d4_11787218')) {function content_53c6c7a73222d4_11787218($_smarty_tpl) {?><script type="text/javascript">
//<![CDATA[
(function(_, $) {

    /* Do not put this code to document.ready, because it should be
       initialized first
    */
    $.ceRebuildStates('init', {
        default_country: '<?php echo htmlspecialchars(strtr($_smarty_tpl->tpl_vars['settings']->value['General']['default_country'], array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" )), ENT_QUOTES, 'UTF-8');?>
',
        states: <?php echo json_encode($_smarty_tpl->tpl_vars['states']->value);?>

    });


    
    $.ceFormValidator('setZipcode', {
        US: {
            regexp: /^(\d{5})(-\d{4})?$/,
            format: '01342 (01342-5678)'
        },
        CA: {
            regexp: /^(\w{3} ?\w{3})$/,
            format: 'K1A OB1 (K1AOB1)'
        },
        RU: {
            regexp: /^(\d{6})?$/,
            format: '123456'
        }
    });
    

}(Tygh, Tygh.$));
//]]>
</script>
<?php }} ?>
