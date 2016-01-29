<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "./templates/lists/enumCategory2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1962337283569961283a7456-91376009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cd310ee28c2bd1a4a82b19b67a330980151d64e' => 
    array (
      0 => './templates/lists/enumCategory2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1962337283569961283a7456-91376009',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="categoryId2" id="categoryId2" class="smallInput" onchange="LoadSubcats2()">
<option value=""><?php if ($_smarty_tpl->getVariable('todos')->value){?>Todos<?php }else{ ?>Seleccione<?php }?></option>
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