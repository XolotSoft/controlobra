<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-type-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:741429388569d1d8a814562-29446263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7c9d8bffcc63816f3aa988f834d28e50f8aa1f0' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-type-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '741429388569d1d8a814562-29446263',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>        
        <td align="left">&nbsp;<a href="javscript:void(0)" onclick="ShowSubTypes(<?php echo $_smarty_tpl->getVariable('it')->value['projTypeId'];?>
)"><?php echo $_smarty_tpl->getVariable('it')->value['name'];?>
</a></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['redondeo']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['redondeo'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['comunArea']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['comunArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['realArea']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['realArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['ventaArea']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['ventaArea'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['terrazaReal']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['terrazaReal'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['terrazaComun']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['terrazaComun'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['jardinReal']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['jardinReal'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['jardinComun']>0){?><?php echo $_smarty_tpl->getVariable('it')->value['jardinComun'];?>
<?php }else{ ?>--<?php }?></td>
        <td align="center">
       <div style="border: 1px solid #000000; width:11px; height:11px; background-color:<?php echo $_smarty_tpl->getVariable('it')->value['color'];?>
;"></div>
        </td>
        <td height="40" align="center"><?php if ($_smarty_tpl->getVariable('it')->value['abierta']){?>S&iacute;<?php }else{ ?>No<?php }?></td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" class="spanLink" onclick="AddSubTypePopup(<?php echo $_smarty_tpl->getVariable('it')->value['projTypeId'];?>
)" title="Agregar SubTipo de Area"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanLink" onclick="DeleteTypePopup(<?php echo $_smarty_tpl->getVariable('it')->value['projTypeId'];?>
)" title="Eliminar Tipo de Area"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanLink" onclick="EditTypePopup(<?php echo $_smarty_tpl->getVariable('it')->value['projTypeId'];?>
)" title="Editar Tipo de Area"/>
        </td>
    </tr>
    
    <tr>
    	<td colspan="12">
        <div id="listSubtipo_<?php echo $_smarty_tpl->getVariable('it')->value['projTypeId'];?>
" style="display:none">
        	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/project-subtype.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        </td>
    </tr>
        
<?php }} else { ?>
<tr><td colspan="12" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>