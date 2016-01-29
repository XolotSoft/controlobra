<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:45
         compiled from "/var/www//controlobra/templates/items/requisicion-material-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:269261456569964151e2635-28568503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ead59d2517a0589abba6f9a5ea268a53e256753f' => 
    array (
      0 => '/var/www//controlobra/templates/items/requisicion-material-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '269261456569964151e2635-28568503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['itM'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kM'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['materials']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itM']->key => $_smarty_tpl->tpl_vars['itM']->value){
 $_smarty_tpl->tpl_vars['kM']->value = $_smarty_tpl->tpl_vars['itM']->key;
?>
    <tr>
    	<td align="center">
        <?php if ($_smarty_tpl->getVariable('itM')->value['status']=="Pendiente"){?>
        <input type="checkbox" name="matId[]" id="mat_<?php echo $_smarty_tpl->getVariable('item')->value['reqPedidoId'];?>
_<?php echo $_smarty_tpl->getVariable('itM')->value['reqMatId'];?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['reqPedidoId'];?>
_<?php echo $_smarty_tpl->getVariable('itM')->value['reqMatId'];?>
" />
        <?php }else{ ?>
        	>
        <?php }?>
        </td>
        <td height="40">&nbsp;<?php echo $_smarty_tpl->getVariable('itM')->value['supplier'];?>
</td>
        <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itM')->value['material'];?>
</div></td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itM')->value['unit'];?>
</td>
        <td align="center"><?php echo number_format($_smarty_tpl->getVariable('itM')->value['quantity'],2,".",",");?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('itM')->value['price'],2,".",",");?>
</td>
        <td align="center">$<?php echo number_format($_smarty_tpl->getVariable('itM')->value['total'],2,".",",");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itM')->value['status'];?>
</td>
    </tr>    
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>