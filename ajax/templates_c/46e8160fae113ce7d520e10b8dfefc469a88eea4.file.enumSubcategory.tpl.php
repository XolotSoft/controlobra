<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/enumSubcategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2072384509569d03ff0892f6-96082412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46e8160fae113ce7d520e10b8dfefc469a88eea4' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumSubcategory.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '2072384509569d03ff0892f6-96082412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="subcategoryId" id="subcategoryId" class="smallInput" onchange="LoadConceptCons()">
<option value="">Seleccione</option>
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