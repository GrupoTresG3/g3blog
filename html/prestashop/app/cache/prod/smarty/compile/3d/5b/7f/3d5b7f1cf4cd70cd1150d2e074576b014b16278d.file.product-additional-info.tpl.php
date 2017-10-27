<?php /* Smarty version Smarty-3.1.19, created on 2017-10-27 11:53:59
         compiled from "/var/www/html/prestashop/themes/classic/templates/catalog/_partials/product-additional-info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199270359159f302374309a4-89121681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d5b7f1cf4cd70cd1150d2e074576b014b16278d' => 
    array (
      0 => '/var/www/html/prestashop/themes/classic/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1509018716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199270359159f302374309a4-89121681',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59f30237432466_46302106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f30237432466_46302106')) {function content_59f30237432466_46302106($_smarty_tpl) {?>
<div class="product-additional-info">
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

</div>
<?php }} ?>
