<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:04
         compiled from "/var/www//controlobra/templates/items/concept-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1046026491569963b08ada92-99544520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f0dee962aa218dee421018f3cdf54e5d38fb7a7' => 
    array (
      0 => '/var/www//controlobra/templates/items/concept-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1046026491569963b08ada92-99544520',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('concepts')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>               
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('item')->value['tipo'];?>
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
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('item')->value['tipo']=="Obra"){?>              
        <a href="javascript:void(0)" onclick="ViewMaterial(<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Materiales" /></a>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('item')->value['tipo']=="Subcontrato"){?>              
        <a href="javascript:void(0)" onclick="ViewPrice(<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
)">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/view.png" border="0" title="Ver Precios" /></a>
        <?php }?>
        </td>      
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
" title="Eliminar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
" title="Editar"/>
        </td>
    </tr>
       
    <tr id="mat_<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="right">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/concept-material.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td></tr>
    
    <tr id="price_<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="right">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/concept-price.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td></tr>
   
<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>