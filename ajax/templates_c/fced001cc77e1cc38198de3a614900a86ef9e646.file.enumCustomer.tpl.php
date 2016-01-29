<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumCustomer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9982701235699624aa75d79-61566940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fced001cc77e1cc38198de3a614900a86ef9e646' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumCustomer.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '9982701235699624aa75d79-61566940',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/controlobra/libs/plugins/modifier.truncate.php';
?><select name="customerId" id="customerId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('customers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['customerId']==$_smarty_tpl->getVariable('item')->value['customerId']){?>selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('item')->value['name'],30,"...");?>
</option>
<?php }} ?>
</select>