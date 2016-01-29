<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:45
         compiled from "/var/www//controlobra/templates/lists/estimacion-concept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:324562382569964511538e0-65676786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5624e18195eab5dcb45263ae5bb852556c601e42' => 
    array (
      0 => '/var/www//controlobra/templates/lists/estimacion-concept.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '324562382569964511538e0-65676786',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?php  $_smarty_tpl->tpl_vars['itC'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kC'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['concepts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itC']->key => $_smarty_tpl->tpl_vars['itC']->value){
 $_smarty_tpl->tpl_vars['kC']->value = $_smarty_tpl->tpl_vars['itC']->key;
?>
<tr>
	<td align="center" width="55"><?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
</td>
    <td align="center" height="40" width="199" bgcolor="#F8F8F8"> >> </td>       
    <td align="center" bgcolor="#F8F8F8">
    <div align="center" style="padding-top:10px; padding-bottom:8px"><u><?php echo $_smarty_tpl->getVariable('itC')->value['name'];?>
</u></div>
    
    <?php  $_smarty_tpl->tpl_vars['iT'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kT'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itC')->value['torres']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['iT']->key => $_smarty_tpl->tpl_vars['iT']->value){
 $_smarty_tpl->tpl_vars['kT']->value = $_smarty_tpl->tpl_vars['iT']->key;
?>
        <div align="center" style="padding-top:10px"><b>Torre:</b> <?php echo $_smarty_tpl->getVariable('iT')->value['name'];?>
</div>
        <table width="200" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center"><b>AREA</b></td>
            <td align="center"><b>EST. ACTUAL</b></td>
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
            <td align="center"><?php echo number_format($_smarty_tpl->getVariable('iA')->value['estimacion'],2,'.',',');?>
</td>
        </tr>
        <?php }} ?>
        </table>
    <?php }} ?>
    <br />     
    <div align="center" style="padding-bottom:10px"><b>Unidad:</b> <?php echo $_smarty_tpl->getVariable('itC')->value['unit'];?>
</div>
    </td>
    <td align="center" bgcolor="#F8F8F8" width="168"><?php echo number_format($_smarty_tpl->getVariable('itC')->value['totalEst'],2,".",",");?>
</td>
    <td align="center" bgcolor="#F8F8F8" width="95"><?php echo $_smarty_tpl->getVariable('itC')->value['status'];?>
</td>
    <td align="center" bgcolor="#F8F8F8" width="95">
    <?php if ($_smarty_tpl->getVariable('itC')->value['status']=="Pendiente"){?>
     <a href="javascript:void(0)" onclick="ConfirmPayment(<?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
)" title="Confirmar Pago">     
     <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/ok.png" class="spanConfirm" id="<?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
" />
     </a>
     <?php }?>
     <?php if ($_smarty_tpl->getVariable('itC')->value['steel']==0){?>
     <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/details.png" class="spanView" id="<?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
" title="Ver Detalles"/>
     <?php }else{ ?>
     <a href="javascript:void(0)" onclick="ViewEstAceroPopup(<?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
)">
     	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/details.png" title="Ver Detalles" border="0"/>
     </a>
     <?php }?>
     <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('itC')->value['estimacionId'];?>
" title="Eliminar"/>
    </td>
</tr>
<?php }} else { ?>
<tr>
	<td align="center" width="40"></td>
    <td align="center" bgcolor="#F8F8F8" width="352"> >> </td>
	<td colspan="3" bgcolor="#F8F8F8" align="center" height="40">Ning&uacute;n concepto encontrado.</td>
</tr>
<?php } ?>
</table>