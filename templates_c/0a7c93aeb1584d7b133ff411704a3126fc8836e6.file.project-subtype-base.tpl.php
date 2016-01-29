<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-subtype-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33517874569d1d8a9ad127-60603416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7c93aeb1584d7b133ff411704a3126fc8836e6' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-subtype-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '33517874569d1d8a9ad127-60603416',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['is'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('it')->value['subtypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['is']->key => $_smarty_tpl->tpl_vars['is']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['is']->key;
?>
    <tr>        
        <td align="right"><?php echo $_smarty_tpl->getVariable('is')->value['name'];?>
&nbsp;</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['redondeo']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['redondeo'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['comunArea']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['comunArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['realArea']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['realArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['ventaArea']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['ventaArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['terrazaReal']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['terrazaReal'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['terrazaComun']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['terrazaComun'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['jardinReal']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['jardinReal'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('is')->value['jardinComun']>0){?><?php echo $_smarty_tpl->getVariable('is')->value['jardinComun'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center">
       <div style="border: 1px solid #000000; width:11px; height:11px; background-color:<?php echo $_smarty_tpl->getVariable('is')->value['color'];?>
;"></div>
        </td>
        <td height="40" align="center"><?php if ($_smarty_tpl->getVariable('is')->value['abierta']){?>S&iacute;<?php }else{ ?>No<?php }?></td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanLink" onclick="DeleteSubTypePopup(<?php echo $_smarty_tpl->getVariable('is')->value['projSubTypeId'];?>
)" title="Eliminar SubTipo de Area"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanLink" onclick="EditSubTypePopup(<?php echo $_smarty_tpl->getVariable('is')->value['projSubTypeId'];?>
)" title="Editar SubTipo de Area"/>
        </td>
    </tr>        
<?php }} else { ?>
<tr><td colspan="12" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>