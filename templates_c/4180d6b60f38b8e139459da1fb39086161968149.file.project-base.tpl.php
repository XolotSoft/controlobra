<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:632081807569d1d8a65afa3-74099676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4180d6b60f38b8e139459da1fb39086161968149' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '632081807569d1d8a65afa3-74099676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('key')->value+1;?>
</td>       
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
        <td align="center">
            <a href="javascript:void(0)" onclick="AddTypeDiv(<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Tipo de Area" />
            </a>
            <a href="javascript:void(0)" onclick="ViewTypes(<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
)">
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Tipos de Area" />
            </a>
        </td>
        <td align="center">
            <a href="javascript:void(0)" onclick="AddItemDiv(<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Torre" />
            </a>
            <a href="javascript:void(0)" onclick="ViewItems(<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
)">
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Torres" />
            </a>
        </td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-ejes/projectId/<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />
            </a>
        </td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-cajybod/projectId/<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />
            </a>
        </td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-montos/projectId/<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />
            </a>
        </td>        
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
" title="Eliminar Proyecto"/>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-edit/projId/<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" title="Editar Proyecto" border="0"/></a>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-img/projId/<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/picture.png" title="Editar Imagen" border="0"/></a>
            <a href="javascript:void(0)" onclick="EditAddressDiv(<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/house.png" title="Editar Direcci&oacute;n de Entrega" border="0"/></a>
        </td>
    </tr>
    
    <tr id="type_<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
" style="display:none">
    <td colspan="8" align="left">
    <div id="contType_<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/project-type.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
    </td></tr>
    
    <tr id="item_<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="left">
    <div id="contItem_<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/project-item.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
    </td></tr>
    
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>