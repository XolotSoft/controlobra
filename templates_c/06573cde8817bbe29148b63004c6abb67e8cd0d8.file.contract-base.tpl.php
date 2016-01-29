<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:15:52
         compiled from "/var/www//controlobra/templates/items/contract-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:440267926569961881e1289-90990440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06573cde8817bbe29148b63004c6abb67e8cd0d8' => 
    array (
      0 => '/var/www//controlobra/templates/items/contract-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '440267926569961881e1289-90990440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contracts')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('item')->value['noContract'];?>
</td>
        <td align="left">&nbsp;<?php if ($_smarty_tpl->getVariable('item')->value['customer']){?><?php echo $_smarty_tpl->getVariable('item')->value['customer'];?>
<?php }?></td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['tipoClte'];?>
</td>
        <td align="center">
        Torre: <?php echo $_smarty_tpl->getVariable('item')->value['item'];?>
<br />
        Depto: <?php echo $_smarty_tpl->getVariable('item')->value['area'];?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('item')->value['total'],2,'.',',');?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('item')->value['pagos'],2,'.',',');?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('item')->value['saldo'],2,'.',',');?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['status'];?>
</td>
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('mainMnu')->value=="resumenes"){?>          
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-edoctaclte/contractId/<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
">
        		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" title="Ver Detalles"/>
            </a>
        <?php }else{ ?>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
" title="Eliminar"/>
            <?php if ($_smarty_tpl->getVariable('item')->value['status']=="Cancelado"){?>
            <a href="javascript:void(0)" onclick="ViewCancelContractPopup(<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
)" title="Detalles de Cancelaci&oacute;n">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/cancel2.png" id="<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
" border="0"/>
            </a>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('item')->value['status']=="Activo"){?>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
" title="Editar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/cancel.png" class="spanCancel" id="<?php echo $_smarty_tpl->getVariable('item')->value['contractId'];?>
" title="Cancelar"/>
            <?php }?>
        <?php }?>
        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>