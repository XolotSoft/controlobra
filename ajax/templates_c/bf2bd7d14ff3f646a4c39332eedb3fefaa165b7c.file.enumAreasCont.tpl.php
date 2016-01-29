<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumAreasCont.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11749032785699624aa3b5c1-69317241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf2bd7d14ff3f646a4c39332eedb3fefaa165b7c' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumAreasCont.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '11749032785699624aa3b5c1-69317241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="projDeptoId" id="projDeptoId" class="smallInput" onchange="UpdateM2Depto()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('areas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['projDeptoId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['projDeptoId']==$_smarty_tpl->getVariable('item')->value['projDeptoId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>