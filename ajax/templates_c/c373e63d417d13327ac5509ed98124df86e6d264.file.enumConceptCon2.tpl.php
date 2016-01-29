<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:09
         compiled from "/var/www//controlobra/templates/lists/enumConceptCon2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:433140729569963b5b73164-06493635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c373e63d417d13327ac5509ed98124df86e6d264' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumConceptCon2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '433140729569963b5b73164-06493635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="conceptConId2" id="conceptConId2" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conceptsCon')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['conceptConId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['conceptConId']==$_smarty_tpl->getVariable('item')->value['conceptConId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>