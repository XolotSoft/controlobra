<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "./templates/lists/enumSubcatSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114366186256a6c3956f2262-79015187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bd73aaf0401236df7e8d8f4802d5c12984b1677' => 
    array (
      0 => './templates/lists/enumSubcatSearch.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '114366186256a6c3956f2262-79015187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="vSubcategoryId" id="vSubcategoryId" class="smallInput" onchange="LoadConceptConsSearch()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcategorias')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['subcategoryId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>