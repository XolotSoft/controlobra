<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "./templates/lists/comparativo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1688186645699612848dd91-20680456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337ba4d52211a525f64ebe0451a59a1c733b4295' => 
    array (
      0 => './templates/lists/comparativo.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1688186645699612848dd91-20680456',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->assign("wSubcat","100",null,null);?>
<?php $_smarty_tpl->assign("wConcept","100",null,null);?>
<?php $_smarty_tpl->assign("wCantidad","60",null,null);?>
<?php $_smarty_tpl->assign("wUnidad","40",null,null);?>
<?php $_smarty_tpl->assign("wPrecio","60",null,null);?>
<?php $_smarty_tpl->assign("wTotal","85",null,null);?>
<?php $_smarty_tpl->assign("wBlank","35",null,null);?>
<?php $_smarty_tpl->assign("wCantidad2","85",null,null);?>
<?php $_smarty_tpl->assign("wTotal2","85",null,null);?>
<?php $_smarty_tpl->assign("wPorc","60",null,null);?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" class="boxTable">
<tbody>     
    <tr>
    	<td width="573" height="30"></td>
        <td align="center" width="312" bgcolor="#EBEBEB" style="color:#000000">PRESUPUESTO ORIGINAL</td>
        <td width="51"></td>
        <td align="center" width="280" bgcolor="#EBEBEB" style="color:#000000">PRESUPUESTO MODIFICADO</td>
        <td width="51"></td>
        <td align="center" width="280" bgcolor="#EBEBEB" style="color:#000000">GASTO REAL</td>
    </tr>
</tbody>     
</table>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/resumen-gastos-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/resumen-gastos-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>     
</table>