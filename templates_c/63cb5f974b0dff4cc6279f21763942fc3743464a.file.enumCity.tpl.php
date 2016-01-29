<?php /* Smarty version Smarty3-b7, created on 2016-01-18 12:53:34
         compiled from "/var/www//controlobra/templates/lists/enumCity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1433665189569d34aed83ba0-00373396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63cb5f974b0dff4cc6279f21763942fc3743464a' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumCity.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1433665189569d34aed83ba0-00373396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="cityId" id="cityId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cities')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['cityId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['cityId']==$_smarty_tpl->getVariable('item')->value['cityId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>