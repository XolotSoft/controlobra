<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:22
         compiled from "/var/www//controlobra/templates/lists/resumen-gastos-description.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1058596435699612e9ff172-95945291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b03a6c6aaaead5e8f8aae72b1860fd0a648243a' => 
    array (
      0 => '/var/www//controlobra/templates/lists/resumen-gastos-description.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1058596435699612e9ff172-95945291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?php  $_smarty_tpl->tpl_vars['itD'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kD'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itC')->value['descriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itD']->key => $_smarty_tpl->tpl_vars['itD']->value){
 $_smarty_tpl->tpl_vars['kD']->value = $_smarty_tpl->tpl_vars['itD']->key;
?>
<tr>
    <td class="colR" align="left" height="25">&nbsp;
    	<?php echo $_smarty_tpl->getVariable('itD')->value['name'];?>

    </td>
    <td class="colR" align="center" width="<?php echo $_smarty_tpl->getVariable('wCantidad')->value+15;?>
"><?php echo number_format($_smarty_tpl->getVariable('itD')->value['cantidad'],2,'.',',');?>
</td>
    <td class="colR" align="center" width="<?php echo $_smarty_tpl->getVariable('wUnidad')->value+17;?>
"><?php echo $_smarty_tpl->getVariable('itD')->value['unit'];?>
</td>
    <td class="colR" align="right" width="<?php echo $_smarty_tpl->getVariable('wPrecio')->value+16;?>
">$<?php echo number_format($_smarty_tpl->getVariable('itD')->value['price'],2,'.',',');?>
&nbsp;</td>
    <td class="colR_G" align="right"" width="<?php echo $_smarty_tpl->getVariable('wTotal')->value+16;?>
">$<?php echo number_format($_smarty_tpl->getVariable('itD')->value['total'],2,'.',',');?>
&nbsp;</td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wBlank')->value+17;?>
"></td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value+15;?>
">0.00</td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value+17;?>
">$0.00</td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wPorc')->value+17;?>
">0.00</td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wBlank')->value+15;?>
"></td>
    <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value+17;?>
">0.00</td>
    <td align="center" width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value+15;?>
">$0.00</td>
    <td align="center" width="<?php echo $_smarty_tpl->getVariable('wPorc')->value+15;?>
">0.00</td>
</tr>
<?php }} ?>
</table>