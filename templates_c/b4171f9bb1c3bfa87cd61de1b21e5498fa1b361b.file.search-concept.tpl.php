<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:24:55
         compiled from "./templates/forms/search-concept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:862164181569963a7ed52c9-81882264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4171f9bb1c3bfa87cd61de1b21e5498fa1b361b' => 
    array (
      0 => './templates/forms/search-concept.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '862164181569963a7ed52c9-81882264',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchConcept" />
<table width="700" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Tipo</b></td>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Nombre</b></td>
</tr>
<tr>
    <td align="center"><?php $_template = new Smarty_Internal_Template("lists/enumConceptType2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</td>
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
<tr><td colspan="5" height="10"></td></tr>
<tr>
    <td align="center" colspan="5">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchConcept()" />
    </td>
</tr>
</table>
</form>