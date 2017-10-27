<?php /* Smarty version Smarty-3.1.19, created on 2017-10-27 11:53:59
         compiled from "/var/www/html/prestashop/themes/classic/templates/catalog/_partials/product-customization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19094914259f3023739e954-95726252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '775a03a3fa646256052da53d94991c5c10a8e2a6' => 
    array (
      0 => '/var/www/html/prestashop/themes/classic/templates/catalog/_partials/product-customization.tpl',
      1 => 1509018716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19094914259f3023739e954-95726252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'configuration' => 0,
    'product' => 0,
    'customizations' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59f302373b7b02_09781869',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f302373b7b02_09781869')) {function content_59f302373b7b02_09781869($_smarty_tpl) {?>
<section class="product-customization">
  <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
    <div class="card card-block">
      <h3 class="h4 card-title"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</h3>
      <?php echo smartyTranslate(array('s'=>'Don\'t forget to save your customization to be able to add to cart','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>


      
        <form method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data">
          <ul class="clearfix">
            <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizations']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
              <li class="product-customization-item">
                <label> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label>
                <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
                  <textarea placeholder="<?php echo smartyTranslate(array('s'=>'Your message here','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
" class="product-message" maxlength="250" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
"></textarea>
                  <small class="float-xs-right"><?php echo smartyTranslate(array('s'=>'250 char. max','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</small>
                  <?php if ($_smarty_tpl->tpl_vars['field']->value['text']!=='') {?>
                      <h6 class="customization-message"><?php echo smartyTranslate(array('s'=>'Your customization:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

                          <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['text'], ENT_QUOTES, 'UTF-8');?>
</label>
                      </h6>
                  <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='image') {?>
                  <?php if ($_smarty_tpl->tpl_vars['field']->value['is_customized']) {?>
                    <br>
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
">
                    <a class="remove-image" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['remove_image_url'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Remove Image','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
                  <?php }?>
                  <span class="custom-file">
                    <span class="js-file-name"><?php echo smartyTranslate(array('s'=>'No selected file','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</span>
                    <input class="file-input js-file-input" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> type="file" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
">
                    <button class="btn btn-primary"><?php echo smartyTranslate(array('s'=>'Choose file','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
                  </span>
                  <small class="float-xs-right"><?php echo smartyTranslate(array('s'=>'.png .jpg .gif','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</small>
                <?php }?>
              </li>
            <?php } ?>
          </ul>
          <div class="clearfix">
            <button class="btn btn-primary float-xs-right" type="submit" name="submitCustomizedData"><?php echo smartyTranslate(array('s'=>'Save Customization','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
          </div>
        </form>
      

    </div>
  <?php }?>
</section>
<?php }} ?>
