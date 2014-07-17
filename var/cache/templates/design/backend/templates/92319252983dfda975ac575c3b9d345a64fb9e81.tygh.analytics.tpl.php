<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:39
         compiled from "/home/shikon/proj/cs/design/backend/templates/common/analytics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37670049953c6c5bf97fdc8-81570728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92319252983dfda975ac575c3b9d345a64fb9e81' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/common/analytics.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '37670049953c6c5bf97fdc8-81570728',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5bf9d24b3_60118957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5bf9d24b3_60118957')) {function content_53c6c5bf9d24b3_60118957($_smarty_tpl) {?><!-- GA code -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-40339423-1']);
    _gaq.push(['_setDomainName', '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_host'], ENT_QUOTES, 'UTF-8');?>
']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<!-- GA code end -->
<?php }} ?>
