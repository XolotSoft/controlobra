<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/enumUnit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:489511133569d03ff158da3-68046976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2f45fba367c65e287e958ae388e62729b159032' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumUnit.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '489511133569d03ff158da3-68046976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="unitId" id="unitId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('units')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['unitId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['unitId']==$_smarty_tpl->getVariable('item')->value['unitId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['clave'];?>
</option>
<?php }} ?>
</select>