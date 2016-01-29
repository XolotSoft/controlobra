<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/items/project-depto-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:758912405569d1d8ace5102-46156615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad058316c5c3c8606237060394894aef66760f9b' => 
    array (
      0 => '/var/www//controlobra/templates/items/project-depto-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '758912405569d1d8ace5102-46156615',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['itD'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kD'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itm')->value['deptos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itD']->key => $_smarty_tpl->tpl_vars['itD']->value){
 $_smarty_tpl->tpl_vars['kD']->value = $_smarty_tpl->tpl_vars['itD']->key;
?>
    <tr>     
        <td align="center" height="40"> >>> </td>        
        <td align="center"><?php echo $_smarty_tpl->getVariable('itD')->value['type'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('itD')->value['name'];?>
</td>        
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanLink" onclick="DeleteDeptoPopup(<?php echo $_smarty_tpl->getVariable('itD')->value['projDeptoId'];?>
)" title="Eliminar Depto."/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanLink" onclick="EditDeptoPopup(<?php echo $_smarty_tpl->getVariable('itD')->value['projDeptoId'];?>
)" title="Editar Depto."/>
        </td>
    </tr>       
<?php }} else { ?>
<tr><td colspan="3" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>