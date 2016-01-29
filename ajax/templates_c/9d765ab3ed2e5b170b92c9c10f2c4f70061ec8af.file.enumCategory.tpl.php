<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:50
         compiled from "/var/www//controlobra/templates/lists/enumCategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1151738354569d03fee41a48-28832938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d765ab3ed2e5b170b92c9c10f2c4f70061ec8af' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumCategory.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1151738354569d03fee41a48-28832938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="categoryId" id="categoryId" class="smallInput" onchange="LoadSubcats()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categorias')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['categoryId']==$_smarty_tpl->getVariable('item')->value['categoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>