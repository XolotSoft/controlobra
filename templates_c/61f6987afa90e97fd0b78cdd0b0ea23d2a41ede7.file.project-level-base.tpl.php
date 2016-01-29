<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-level-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2065590691569d1d8ac25481-36868776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61f6987afa90e97fd0b78cdd0b0ea23d2a41ede7' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-level-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '2065590691569d1d8ac25481-36868776',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['itm'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('it')->value['levels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itm']->key => $_smarty_tpl->tpl_vars['itm']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['itm']->key;
?>
    <tr>     
        <td align="center" height="40"> >> </td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['level'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddDeptoDiv(<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
)">
        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Depto." />
        </a>
        <a href="javascript:void(0)" onclick="ViewDeptos(<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Deptos." />
        </a>
        </td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanLink" onclick="DeleteLevelPopup(<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
)" title="Eliminar Nivel"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanLink" onclick="EditLevelPopup(<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
)" title="Editar Nivel"/>
        </td>
    </tr>
    
    <tr id="depto_<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="4" align="left" id="contDepto_<?php echo $_smarty_tpl->getVariable('itm')->value['projLevelId'];?>
">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/project-depto.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td></tr>
    
<?php }} else { ?>
<tr><td colspan="4" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>