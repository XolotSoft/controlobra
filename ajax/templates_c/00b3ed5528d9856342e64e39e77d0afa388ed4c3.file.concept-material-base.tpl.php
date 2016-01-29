<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:04
         compiled from "/var/www//controlobra/templates/items/concept-material-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1153563975569963b09ccf42-61583170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00b3ed5528d9856342e64e39e77d0afa388ed4c3' => 
    array (
      0 => '/var/www//controlobra/templates/items/concept-material-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1153563975569963b09ccf42-61583170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['materials']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>
    	<td align="center"> > </td>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('it')->value['material'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['unit'];?>
</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('it')->value['price'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['quantity'];?>
</td>        
        <td align="right">$<?php echo $_smarty_tpl->getVariable('it')->value['total'];?>
&nbsp;</td>
    </tr>
<?php }} else { ?>
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>

<?php if (count($_smarty_tpl->getVariable('item')->value['materials'])>0){?>
    <tr>
    	<td></td>
        <td height="40"></td>
        <td></td>
        <td></td>
        <td align="center"><b>TOTAL</b></td>        
        <td align="right">$<?php echo $_smarty_tpl->getVariable('item')->value['total'];?>
&nbsp;</td>
    </tr>

<?php }?>