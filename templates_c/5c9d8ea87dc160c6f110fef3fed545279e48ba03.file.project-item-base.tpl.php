<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-item-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1649948564569d1d8ab71536-68324326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c9d8ea87dc160c6f110fef3fed545279e48ba03' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-item-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1649948564569d1d8ab71536-68324326',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>
        <td height="40" align="center"> > </td>
        <td align="left">&nbsp;<?php echo $_smarty_tpl->getVariable('it')->value['name'];?>
</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddLevelDiv(<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Nivel" />
        </a>
        <a href="javascript:void(0)" onclick="ViewLevels(<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Niveles" />
        </a>
        </td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanLink" onclick="DeleteItemPopup(<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
)" title="Eliminar Torre"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanLink" onclick="EditItemPopup(<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
)" title="Editar Torre"/>
        </td>
    </tr>
    
    <tr id="level_<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="3" align="left" id="contLevel_<?php echo $_smarty_tpl->getVariable('it')->value['projItemId'];?>
">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/project-level.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td></tr>
    
<?php }} else { ?>
<tr><td colspan="4" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>