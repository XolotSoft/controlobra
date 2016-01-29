<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:23:17
         compiled from "/var/www//controlobra/templates/items/contract-payment-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126550116156996345991bb6-08741219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd06d65c63f7ac61ff90d771178dd298e4566acfb' => 
    array (
      0 => '/var/www//controlobra/templates/items/contract-payment-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '126550116156996345991bb6-08741219',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('payments')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('item')->value['contPaymentId'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['customer']){?><?php echo $_smarty_tpl->getVariable('item')->value['customer'];?>
<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['item']){?><?php echo $_smarty_tpl->getVariable('item')->value['item'];?>
<?php }?></td>        
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['area']){?><?php echo $_smarty_tpl->getVariable('item')->value['area'];?>
<?php }?></td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('item')->value['quantity'];?>
</td>        
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['fecha'];?>
</td>
        <td align="center">       
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" class="spanView" id="<?php echo $_smarty_tpl->getVariable('item')->value['contPaymentId'];?>
" title="Ver Detalles"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['contPaymentId'];?>
" title="Eliminar"/>        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>