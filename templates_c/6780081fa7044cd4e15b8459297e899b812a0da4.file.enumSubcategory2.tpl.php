<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "./templates/lists/enumSubcategory2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72130494556996128401588-64277783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6780081fa7044cd4e15b8459297e899b812a0da4' => 
    array (
      0 => './templates/lists/enumSubcategory2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '72130494556996128401588-64277783',
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