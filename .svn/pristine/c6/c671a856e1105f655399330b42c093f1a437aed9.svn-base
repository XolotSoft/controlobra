<table width="100%" cellpadding="0" cellspacing="0" border="1" class="tblNoBorder tblCollapse">
{foreach from=$item.categories item=itC key=kS}
<tr>
	<td width="30" align="center" class="colR">  
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.projectId},{$itC.categoryId})">
        	<div id="iconSubcat_{$item.projectId}_{$itC.categoryId}">[-]</div>
        </a>
    </td>
    <td align="left" class="colR" height="25" colspan="4">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.projectId},{$itC.categoryId})">
        {if $itC.name == "0"}---{else}{$itC.name}{/if}
        </a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>
    <td width="76" class="colR"></td>
    <td width="100" class="colR"></td>
    <td width="50" class=""></td>
</tr>

<tr id="subcats_{$item.projectId}_{$itC.categoryId}">
    <td colspan="10" bgcolor="#FFFFFF" class="col">    
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-gastos-subcat.tpl"}
    </td>
</tr>

<tr>
    <td align="left" class="colRT" colspan="7" height="20" bgcolor="#A6A6A6">
    &nbsp;<span class="txtTotal">Total {if $itC.name == "0"}---{else}{$itC.name}{/if}</span>
    </td>
    <td width="100" class="" bgcolor="#A6A6A6" align="right" colspan="2">    
    <span class="txtTotal">${$itC.total|number_format:2:'.':','}</span>&nbsp;
    </td>
    <td align="center"bgcolor="#A6A6A6">
    	{assign var="totRes" value="{($itC.total/$item.total) * 100}"}
    	<span class="txtTotal">{$totRes|number_format:2:'.':','}</span>
    </td>
</tr>

<tr>
    <td colspan="10" bgcolor="#FFFFFF">&nbsp;</td>
</tr>

{foreachelse}
<tr>
	<td width="30" align="center" class="colTR2BL">  
    	>
    </td>
    <td align="left" class="colTRB" height="25" colspan="8">&nbsp;
		Ning&uacute;n registro encontrado.
    </td>
</tr>
{/foreach}
</table>