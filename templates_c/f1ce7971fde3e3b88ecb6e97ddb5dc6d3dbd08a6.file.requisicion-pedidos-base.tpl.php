<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:45
         compiled from "/var/www//controlobra/templates/items/requisicion-pedidos-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1614959816569964152aaf77-73555271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1ce7971fde3e3b88ecb6e97ddb5dc6d3dbd08a6' => 
    array (
      0 => '/var/www//controlobra/templates/items/requisicion-pedidos-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1614959816569964152aaf77-73555271',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['itM'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kM'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['pedidos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itM']->key => $_smarty_tpl->tpl_vars['itM']->value){
 $_smarty_tpl->tpl_vars['kM']->value = $_smarty_tpl->tpl_vars['itM']->key;
?>
    <tr>
    	<td align="center"> > </td>
        <td height="40">&nbsp;<?php echo $_smarty_tpl->getVariable('itM')->value['supplier'];?>
</td>        
        <td align="center"><?php echo number_format($_smarty_tpl->getVariable('itM')->value['total'],2,".",",");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itM')->value['status'];?>
</td>
        <td align="center">
        	<?php if ($_smarty_tpl->getVariable('itM')->value['status']=="Pendiente"){?>	
        	<a href="javascript:void(0)" onclick="ConfirmPedidos(<?php echo $_smarty_tpl->getVariable('itM')->value['reqPedidoId'];?>
,<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
)">
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/ok.png" border="0" title="Confirmar" />
            </a>
            <?php }?>
            <a href="javascript:void(0)" onclick="ViewPedidosPopup(<?php echo $_smarty_tpl->getVariable('itM')->value['reqPedidoId'];?>
)">
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Detalles" />
            </a>
            <a href="javascript:void(0)" onclick="DeletePedidosPopup(<?php echo $_smarty_tpl->getVariable('itM')->value['reqPedidoId'];?>
,<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
)">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" title="Eliminar Pedido"/>
            </a> 
        </td>
    </tr>   
<?php }} else { ?>
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>