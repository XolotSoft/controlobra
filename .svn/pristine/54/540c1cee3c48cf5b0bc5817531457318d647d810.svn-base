<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="projectId" id="projectId" value="{$projectId}" />
<input type="hidden" name="action" id="action" value="searchConcept" />
<table width="900" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
	<td align="center"><b>Torre</b></td>
    <td align="center"><b>Tipo de Area</b></td>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Descripci&oacute;n</b></td>    
    <td align="center"><b>Mostrar Precios</b></td>
    <td align="center"><b>Con Iva</b></td>
</tr>
<tr>
	<td align="center">
        <div id="enumItems">{include file="{$DOC_ROOT}/templates/lists/enumProjItemArea2.tpl"}</div>
    </td>
    <td align="center">
        <div id="enumAreas">{include file="{$DOC_ROOT}/templates/lists/enumAreasArea.tpl"}</div>
    </td>
	<td align="center">{include file="{$DOC_ROOT}/templates/lists/enumCategory2.tpl" todos="1"}</td>
    <td align="center">
        <div id="enumSubcat">{include file="{$DOC_ROOT}/templates/lists/enumSubcategory2.tpl" todos="1"}</div>
    </td>
    <td align="center">
        <div id="enumConcept">{include file="{$DOC_ROOT}/templates/lists/enumConceptCon3.tpl"}</div>
    </td>
    <td align="center">
        <div id="enumDesc">{include file="{$DOC_ROOT}/templates/lists/enumConcept2.tpl"}</div>
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
<tr><td colspan="8" height="10"></td></tr>
<tr>
	<td colspan="2"></td>
    <td align="center" colspan="4">
    <div style="float:left; margin-left:100px">
    	<input type="button" class="btnGral" value="Buscar" onclick="SearchConcept()" />
    </div>
    <div style="float:left">
        <input type="button" class="btnGral" value="Limpiar" onclick="ResetForm()" />
    </div>
    </td>
    <td colspan="2"></td>
</tr>
</table>
</form>