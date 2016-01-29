<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:04
         compiled from "./templates/forms/search-material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68497900569963ec7c5ce4-78778869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4843aba982a658504cf2bec145a3c87eca465b60' => 
    array (
      0 => './templates/forms/search-material.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '68497900569963ec7c5ce4-78778869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchMaterial" />
<table width="700" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Nombre</b></td>
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
    	<input type="text" name="name2" id="name2" class="smallInput" />
    </td>
</tr>
<tr><td colspan="4" height="10"></td></tr>
<tr>
    <td align="center" colspan="4">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchMaterial()" />
    </td>
</tr>
</table>
</form>