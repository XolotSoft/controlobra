<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:41
         compiled from "/var/www//controlobra/templates/items/requisicion-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190395305856996411bf4ae3-42802102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b55ac35066de50eb1bf967defb1056d9f7f62db' => 
    array (
      0 => '/var/www//controlobra/templates/items/requisicion-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '190395305856996411bf4ae3-42802102',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/controlobra/libs/plugins/modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('concepts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>       
    <td height="40" align="center"><?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
</td>
    <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
    <td align="center">        
        
        <?php  $_smarty_tpl->tpl_vars['iT'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kT'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['torres']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['iT']->key => $_smarty_tpl->tpl_vars['iT']->value){
 $_smarty_tpl->tpl_vars['kT']->value = $_smarty_tpl->tpl_vars['iT']->key;
?>
            <div align="center" style="padding-top:10px"><b>Torre:</b> <?php echo $_smarty_tpl->getVariable('iT')->value['name'];?>
</div>
            <table width="200" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"><b>AREA</b></td>                
            </tr>
            <?php  $_smarty_tpl->tpl_vars['iA'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kA'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('iT')->value['areas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['iA']->key => $_smarty_tpl->tpl_vars['iA']->value){
 $_smarty_tpl->tpl_vars['kA']->value = $_smarty_tpl->tpl_vars['iA']->key;
?>
            <tr>
                <td align="center"><?php echo $_smarty_tpl->getVariable('iA')->value['name'];?>
</td>                
            </tr>
            <?php }} ?>
            </table>
        <?php }} ?>
        <br /> 
               
    </td>         
    <td align="center"><?php echo number_format($_smarty_tpl->getVariable('item')->value['totalReq'],2,".",",");?>
</td>
    <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['fecha'],"%d-%m-%Y");?>
</td>
    <td align="center">
    <?php if ($_smarty_tpl->getVariable('item')->value['status']=="Completado"){?>
    	Completo
    <?php }else{ ?>
    	<?php echo $_smarty_tpl->getVariable('item')->value['status'];?>

    <?php }?>
    </td>
    <td align="center">
    <?php if ($_smarty_tpl->getVariable('item')->value['status']=="Pendiente"){?>
    	<a href="javascript:void(0)" onclick="AddPedidosPopup(<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" title="Agregar Pedido" />
        </a>
    <?php }else{ ?>
    --
    <?php }?>
    </td>    
    
    <td align="center">
    	 <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
" title="Eliminar"/>
         <?php if ($_smarty_tpl->getVariable('item')->value['steel']==0){?>
         <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/details.png" class="spanView" id="<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
" title="Ver Detalles"/>
         <?php }else{ ?>
         <a href="javascript:void(0)" onclick="ViewReqAceroPopup(<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
)">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/details.png" title="Ver Detalles" border="0"/>
         </a>
         <?php }?>
    </td>
</tr>

<tr id="materials_<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
" style="display:none">    
    <td colspan="8" align="right">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/requisicion-material.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
</tr>

<tr id="pedidosAll_<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
" style="display:none">    
    <td colspan="8" align="right">
    <div id="contPedidosAll_<?php echo $_smarty_tpl->getVariable('item')->value['requisicionId'];?>
">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/requisicion-pedidos.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
    </td>
</tr>

<?php }} else { ?>
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>