<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumEquipCont.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6614072695699624adae5c9-60748242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ca14597edb5160b120b52915df3dba336ef62b6' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumEquipCont.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '6614072695699624adae5c9-60748242',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="projEquipId" id="projEquipId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projEquips')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('it')->value['projEquipId'];?>
" <?php if ($_smarty_tpl->getVariable('it')->value['projEquipId']==$_smarty_tpl->getVariable('info')->value['projEquipId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('it')->value['quantity'];?>
 <?php echo $_smarty_tpl->getVariable('it')->value['currency'];?>
</option>
<?php }} ?>
</select>