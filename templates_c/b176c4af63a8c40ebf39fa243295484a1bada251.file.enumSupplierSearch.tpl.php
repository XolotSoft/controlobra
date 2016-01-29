<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "./templates/lists/enumSupplierSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39199277356a6c39573f7b2-60891658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b176c4af63a8c40ebf39fa243295484a1bada251' => 
    array (
      0 => './templates/lists/enumSupplierSearch.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '39199277356a6c39573f7b2-60891658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="vSupplierId" id="vSupplierId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('suppliers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['supplierId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>