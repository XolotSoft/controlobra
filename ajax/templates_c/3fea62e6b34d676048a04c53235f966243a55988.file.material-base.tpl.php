<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:53
         compiled from "/var/www//controlobra/templates/items/material-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:374173357569d0401e75bc9-50261062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fea62e6b34d676048a04c53235f966243a55988' => 
    array (
      0 => '/var/www//controlobra/templates/items/material-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '374173357569d0401e75bc9-50261062',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('materials')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>      
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('item')->value['noCat'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['category'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['subcategory']){?><?php echo $_smarty_tpl->getVariable('item')->value['subcategory'];?>
<?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['concept']){?><?php echo $_smarty_tpl->getVariable('item')->value['concept'];?>
<?php }?></td>
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['unit']){?><?php echo $_smarty_tpl->getVariable('item')->value['unit'];?>
<?php }?></td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['waste'];?>
</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="ViewPrices(<?php echo $_smarty_tpl->getVariable('item')->value['materialId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Precios" />
        </a>
        </td>        
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['materialId'];?>
" title="Eliminar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['materialId'];?>
" title="Editar"/>
        </td>
    </tr>
   
    <tr id="prices_<?php echo $_smarty_tpl->getVariable('item')->value['materialId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="left">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/material-price.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td></tr>
       
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>