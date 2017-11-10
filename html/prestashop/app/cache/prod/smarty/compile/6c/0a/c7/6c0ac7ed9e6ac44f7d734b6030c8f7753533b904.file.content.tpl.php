<?php /* Smarty version Smarty-3.1.19, created on 2017-11-10 11:39:53
         compiled from "/var/www/html/prestashop/admin313yf8acm/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7032381885a0581f9cfa431-04266537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c0ac7ed9e6ac44f7d734b6030c8f7753533b904' => 
    array (
      0 => '/var/www/html/prestashop/admin313yf8acm/themes/default/template/content.tpl',
      1 => 1509018712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7032381885a0581f9cfa431-04266537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a0581f9d02ab2_38707902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0581f9d02ab2_38707902')) {function content_5a0581f9d02ab2_38707902($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
