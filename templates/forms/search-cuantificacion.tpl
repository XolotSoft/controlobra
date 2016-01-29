<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchCuantificacion" />
<table width="100%" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Contratista</b></td>
    <td align="center"><b>Torres</b></td>
    <td align="center"><b>Tipo Area</b></td>
</tr>
<tr>    
    <td align="center">
    <select name="vCategoryId" id="vCategoryId" class="smallInput" onchange="LoadSubcatsSearch()">
    <option value="">Seleccione</option>
    {foreach from=$categorias item=item key=key}
    <option value="{$item.categoryId}" {if $info.categoryId == $item.categoryId}selected{/if}>{$item.name}</option>
    {/foreach}
    </select>
    </td>
    <td align="center">
        <div id="vEnumSubcat">{include file="lists/enumSubcatSearch.tpl"}</div>
    </td>
    <td align="center">
        <div id="vEnumConcept">{include file="lists/enumConceptConSearch.tpl"}</div>
    </td>
    <td align="center">
    	{include file="lists/enumSupplierSearch.tpl"}
    </td>
    <td align="center">
    	<select name="vProjItemId" id="vProjItemId" class="smallInput" onchange="LoadLevelsSearch()">
        <option value="">Seleccione</option>
        {foreach from=$items item=item key=key}
        <option value="{$item.projItemId}">{$item.name}</option>
        {/foreach}
        </select>
    </td>
    <td align="center">
	   	<select name="vProjTypeId" id="vProjTypeId" class="smallInput">
        <option value="">Seleccione</option>
        {foreach from=$types item=item key=key}
        <option value="{$item.projTypeId}">{$item.name}</option>
        {/foreach}
        </select>
    </td>
</tr>
<tr>
    <td align="center"><b>Nivel Inicial</b></td>
    <td align="center"><b>Nivel Final</b></td>
    <td align="center"></td>
    <td align="center"><b>Cant. B</b></td>
    <td align="center"><b>Cant. H</b></td>
    <td align="center"></td>
</tr>
<tr>
    <td align="center">
    <div id="level1">{include file="{$DOC_ROOT}/templates/lists/enumLevelCuant.tpl"}</div>
    </td>
    <td align="center">
    <div id="level2">{include file="{$DOC_ROOT}/templates/lists/enumLevelCuant.tpl"}</div>
    </td>
    <td align="center"></td>
    <td align="center"><input type="text" name="vB" id="vB" class="smallInput" style="width:100px" /></td>
    <td align="center"><input type="text" name="vH" id="vH" class="smallInput" style="width:100px" /></td>
    <td align="center"></td>
</tr>
<tr><td colspan="6" height="10"></td></tr>
<tr>
    <td align="center" colspan="6">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchCuantificacion()" />
    </td>
</tr>
</table>
</form>