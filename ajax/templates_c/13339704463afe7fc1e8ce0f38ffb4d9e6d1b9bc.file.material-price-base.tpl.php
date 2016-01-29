<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:54
         compiled from "/var/www//controlobra/templates/items/material-price-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1613844041569d040208b438-85220396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13339704463afe7fc1e8ce0f38ffb4d9e6d1b9bc' => 
    array (
      0 => '/var/www//controlobra/templates/items/material-price-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1613844041569d040208b438-85220396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('it')->value['supplier'];?>
</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('it')->value['price'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['iva'];?>
%</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('it')->value['total'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['currency'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['fecha'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['supMain']){?>S&iacute;<?php }else{ ?>No<?php }?></td>
    </tr>
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>