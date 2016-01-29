<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:03
         compiled from "/var/www//controlobra/templates/items/customer-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18405118325699611b2c93b4-13766094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc85220aaeb84f45f56371e96dc203fccbdd76c' => 
    array (
      0 => '/var/www//controlobra/templates/items/customer-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '18405118325699611b2c93b4-13766094',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include '/var/www/controlobra/libs/plugins/modifier.capitalize.php';
?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('customers')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('key')->value+1;?>
</td>       
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['category']){?><?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('item')->value['category']);?>
<?php }?></td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['phone'];?>
</td>
        <td align="center">
        <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/customer-img/customerId/<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" /></a>
        </td>
        <td align="center">        
        <a href="javascript:void(0)" onclick="ViewAddress(<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Direcciones" />
        </a>
        <a href="javascript:void(0)" onclick="AddAddressDiv(<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
)">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Direcci&oacute;n" />
        </a>
        </td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['active']){?>Si<?php }else{ ?>No<?php }?></td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" title="Eliminar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" title="Editar"/>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/customer-email/customerId/<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" title="Enviar Correo">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/email.png" border="0"/></a>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/customer-doc/customerId/<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" title="Documentaci&oacute;n">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/report.png" border="0"/></a>
        </td>
    </tr>
    
    <tr id="address_<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" style="display:none">
        <td>&nbsp;</td>        
        <td colspan="7" align="left">
        <div id="contAddress_<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
">
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/customer-address.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        </td>
    </tr>
    
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>