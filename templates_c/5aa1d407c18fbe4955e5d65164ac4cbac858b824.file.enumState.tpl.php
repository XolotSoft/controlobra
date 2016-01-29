<?php /* Smarty version Smarty3-b7, created on 2016-01-18 12:53:34
         compiled from "/var/www//controlobra/templates/lists/enumState.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1221679498569d34aece1cb1-62801186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aa1d407c18fbe4955e5d65164ac4cbac858b824' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumState.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1221679498569d34aece1cb1-62801186',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="stateId" id="stateId" class="smallInput" onchange="LoadCities()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('states')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['stateId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['stateId']==$_smarty_tpl->getVariable('item')->value['stateId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>