<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:28:20
         compiled from "/var/www//controlobra/templates/items/estimacion-cheques-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18497116515699647440a498-21822509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '553c3346aba42b9185c9f89ac738dbc1e3d1b90f' => 
    array (
      0 => '/var/www//controlobra/templates/items/estimacion-cheques-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '18497116515699647440a498-21822509',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/controlobra/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) include '/var/www/controlobra/libs/plugins/modifier.capitalize.php';
?><?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('resPagos')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>
    	<td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['noCheque'];?>
</td>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('it')->value['bank'];?>
</td>        
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['noInvoice'];?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('it')->value['quantity'],2,".",",");?>
 <?php echo $_smarty_tpl->getVariable('it')->value['currency'];?>
</td>
        <td align="center"><?php echo smarty_modifier_capitalize(smarty_modifier_date_format($_smarty_tpl->getVariable('it')->value['fecha'],"%d %b %Y"));?>
</td>      
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['concepto'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['status'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['statusCheque'];?>
</td>
        <td align="center">
        	<?php if ($_smarty_tpl->getVariable('it')->value['statusCheque']=="Emitido"&&$_smarty_tpl->getVariable('it')->value['status']!="Cancelado"){?>
            <a href="javascript:void(0)" onclick="RecogerChequeDiv(<?php echo $_smarty_tpl->getVariable('it')->value['estimacionPagoId'];?>
)" title="Recoger Cheque">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/user_go.png" border="0"/>
            </a>
            <a href="javascript:void(0)" onclick="CancelarChequeDiv(<?php echo $_smarty_tpl->getVariable('it')->value['estimacionPagoId'];?>
)" title="Cancelar Cheque">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/cancel.png" border="0"/>
            </a>
            <?php }elseif($_smarty_tpl->getVariable('it')->value['statusCheque']=="Recogido"){?>            
            <a href="javascript:void(0)" onclick="CobrarChequeDiv(<?php echo $_smarty_tpl->getVariable('it')->value['estimacionPagoId'];?>
)" title="Cobrar Cheque">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/money_dollar.png" border="0"/>
            </a>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/modules/estimacion-cheques-pdf.php?id=<?php echo $_smarty_tpl->getVariable('it')->value['estimacionPagoId'];?>
" title="Ver Recibo" target="_blank">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/pdf.png" border="0"/>
            </a>
            <?php }?>
        	<a href="javascript:void(0)" onclick="DetailsPagoPopup(<?php echo $_smarty_tpl->getVariable('it')->value['estimacionPagoId'];?>
)" title="Ver Detalles">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0"/>
            </a>                      
        </td>
    </tr>        
<?php }} else { ?>
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>