<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "./templates/forms/search-concept-resumen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11471883815699612833b1b9-28931215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d4bb1f930ee9df86c3f6f75b08c9fabb5ac8734' => 
    array (
      0 => './templates/forms/search-concept-resumen.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '11471883815699612833b1b9-28931215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchResumen" />
<table width="700" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Mostrar Precios</b></td>
    <td align="center"><b>Con Iva</b></td>
</tr>
<tr>
    <td align="center"><?php $_template = new Smarty_Internal_Template("lists/enumCategory2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</td>
    <td align="center">
        <div id="enumSubcat"><?php $_template = new Smarty_Internal_Template("lists/enumSubcategory2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center">
        <div id="enumConcept"><?php $_template = new Smarty_Internal_Template("lists/enumConceptCon2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center">
        <select class="smallInput" name="showPrecio" id="showPrecio">
        <option value="1">S&iacute;</option>
        <option value="0">No</option>
        </select>
    </td>
    <td align="center">
        <select class="smallInput" name="conIva" id="conIva">
        <option value="1">S&iacute;</option>
        <option value="0">No</option>
        </select>
    </td>
</tr>
<tr><td colspan="5" height="10"></td></tr>
<tr>
    <td align="center" colspan="5">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchConcept()" />
    </td>
</tr>
</table>
</form>