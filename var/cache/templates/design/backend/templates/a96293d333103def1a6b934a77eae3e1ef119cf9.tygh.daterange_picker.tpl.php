<?php /* Smarty version Smarty-3.1.15, created on 2014-07-16 22:34:43
         compiled from "/home/shikon/proj/cs/design/backend/templates/common/daterange_picker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176621903853c6c5c3b17073-21623046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a96293d333103def1a6b934a77eae3e1ef119cf9' => 
    array (
      0 => '/home/shikon/proj/cs/design/backend/templates/common/daterange_picker.tpl',
      1 => 1405209976,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '176621903853c6c5c3b17073-21623046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'start_date' => 0,
    'end_date' => 0,
    'id' => 0,
    'extra_class' => 0,
    'data_url' => 0,
    'result_ids' => 0,
    'settings' => 0,
    'time_from' => 0,
    'time_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53c6c5c4351262_93381637',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6c5c4351262_93381637')) {function content_53c6c5c4351262_93381637($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/shikon/proj/cs/app/functions/smarty_plugins/modifier.date_format.php';
if (!is_callable('smarty_function_script')) include '/home/shikon/proj/cs/app/functions/smarty_plugins/function.script.php';
?><?php
fn_preload_lang_vars(array('month_name_abr_1','month_name_abr_2','month_name_abr_3','month_name_abr_4','month_name_abr_5','month_name_abr_6','month_name_abr_7','month_name_abr_8','month_name_abr_9','month_name_abr_10','month_name_abr_11','month_name_abr_12','weekday_abr_0','weekday_abr_1','weekday_abr_2','weekday_abr_3','weekday_abr_4','weekday_abr_5','weekday_abr_6','today','yesterday','last_n_days','last_n_days','this_month','last_month','apply','clear','from','to'));
?>

<?php $_smarty_tpl->tpl_vars['start_date'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['start_date']->value)===null||$tmp==='' ? (strtotime("-30 day")) : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['end_date'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['end_date']->value)===null||$tmp==='' ? (strtotime("now")) : $tmp), null, 0);?>
<div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="reportrange <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra_class']->value, ENT_QUOTES, 'UTF-8');?>
 cm-date-range" <?php if ($_smarty_tpl->tpl_vars['data_url']->value) {?>data-ca-target-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['result_ids']->value) {?>data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
    <a class="btn-text">
        <span>
            <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_date']->value,"%b %d, %Y"), ENT_QUOTES, 'UTF-8');?>
 — <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_date']->value,"%b %d, %Y"), ENT_QUOTES, 'UTF-8');?>

        </span>
        <b class="caret"></b>
    </a>
</div>

<script type="text/javascript">
(function(_, $){
	$(document).ready(function() {
		_.tr({ 
			default_lang : '<?php echo htmlspecialchars(strtr(@constant('DEFAULT_LANGUAGE'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" )), ENT_QUOTES, 'UTF-8');?>
',
			month_name_abr_1 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_1"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_2 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_2"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_3 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_3"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_4 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_4"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_5 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_5"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_6 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_6"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_7 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_7"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_8 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_8"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_9 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_9"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_10 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_10"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_11 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_11"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			month_name_abr_12 : '<?php echo strtr($_smarty_tpl->__("month_name_abr_12"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_0 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_0"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_1 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_1"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_2 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_2"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_3 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_3"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_4 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_4"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_5 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_5"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			weekday_abr_6 : '<?php echo strtr($_smarty_tpl->__("weekday_abr_6"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			today : '<?php echo strtr($_smarty_tpl->__("today"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			yesterday : '<?php echo strtr($_smarty_tpl->__("yesterday"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			last_7_days : '<?php echo $_smarty_tpl->__("last_n_days",array("[N]"=>7));?>
',
			last_30_days : '<?php echo $_smarty_tpl->__("last_n_days",array("[N]"=>30));?>
',
			this_month : '<?php echo strtr($_smarty_tpl->__("this_month"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			last_month : '<?php echo strtr($_smarty_tpl->__("last_month"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			apply : '<?php echo strtr($_smarty_tpl->__("apply"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			clear : '<?php echo strtr($_smarty_tpl->__("clear"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			from : '<?php echo strtr($_smarty_tpl->__("from"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			to : '<?php echo strtr($_smarty_tpl->__("to"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
			format : '<?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['calendar_date_format']=="month_first") {?>DD/MM/YYYY<?php } else { ?>MM/DD/YYYY<?php }?>'
		});
		_.time_from = '<?php echo htmlspecialchars(strtr($_smarty_tpl->tpl_vars['time_from']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" )), ENT_QUOTES, 'UTF-8');?>
';
		_.time_to = '<?php echo htmlspecialchars(strtr($_smarty_tpl->tpl_vars['time_to']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" )), ENT_QUOTES, 'UTF-8');?>
';
	});
}(Tygh, Tygh.$));
</script>

<?php echo smarty_function_script(array('src'=>"js/tygh/date_picker.js"),$_smarty_tpl);?>
<?php }} ?>
