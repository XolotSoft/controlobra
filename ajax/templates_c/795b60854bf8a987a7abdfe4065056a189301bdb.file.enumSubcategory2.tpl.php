<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:09
         compiled from "/var/www//controlobra/templates/lists/enumSubcategory2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:340351058569963b5a9d201-82247369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '795b60854bf8a987a7abdfe4065056a189301bdb' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumSubcategory2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '340351058569963b5a9d201-82247369',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="subcategoryId2" id="subcategoryId2" class="smallInput" onchange="LoadConceptCons2()">
<option value=""><?php if ($_smarty_tpl->getVariable('todos')->value){?>Todos<?php }else{ ?>Seleccione<?php }?></option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcategorias')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['subcategoryId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['subcategoryId']==$_smarty_tpl->getVariable('item')->value['subcategoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>