<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:03
         compiled from "/var/www//controlobra/templates/items/customer-address-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18436954375699611b446405-90791087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '035f81cd7d01a7862ea22a3da9d199caaa576916' => 
    array (
      0 => '/var/www//controlobra/templates/items/customer-address-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '18436954375699611b446405-90791087',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>       
        <td height="40" align="center"> > </td>
        <td>
        <div style="padding:6px">
            <?php echo $_smarty_tpl->getVariable('it')->value['street'];?>
,
            <br />
        	<?php if ($_smarty_tpl->getVariable('it')->value['noExt']){?>
            	<b>No. Ext.</b>: <?php echo $_smarty_tpl->getVariable('it')->value['noExt'];?>
,
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('it')->value['noInt']){?>
            	<b>No. Int.</b>: <?php echo $_smarty_tpl->getVariable('it')->value['noInt'];?>
,            
            	<b>C&oacute;digo Postal</b>: <?php echo $_smarty_tpl->getVariable('it')->value['postalCode'];?>
,
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('it')->value['colonia']){?>
            	<br />
            	<b>Colonia</b>: <?php echo $_smarty_tpl->getVariable('it')->value['colonia'];?>

            <?php }?>
        </div>
        </td>        
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['city']){?><?php echo $_smarty_tpl->getVariable('it')->value['city'];?>
<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['state']){?><?php echo $_smarty_tpl->getVariable('it')->value['state'];?>
<?php }?></td>
        <td align="center">
        <a href="javascript:void(0)" onclick="DeleteAddressPopup(<?php echo $_smarty_tpl->getVariable('it')->value['custAddressId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" title="Eliminar Direcci&oacute;n"/>
        </a>
        <a href="javascript:void(0)" onclick="EditAddressPopup(<?php echo $_smarty_tpl->getVariable('it')->value['custAddressId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" id="<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" title="Editar Direcci&oacute;n"/>
        </a>
        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>