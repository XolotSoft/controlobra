<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.subcategories item=itS key=kS}
<tr>
	<td width="30" class="colRB"></td>
    <td width="71" class="colRB"></td>
	<td align="center" width="24" class="colB">
    	<a href="javascript:void(0)" onclick="ViewConcepts({$item.projectId},{$itS.subcategoryId})">
        	<div id="iconConc_{$item.projectId}_{$itS.subcategoryId}">[-]</div>
        </a>
    </td>
    <td align="left" class="colR" height="25" colspan="3">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewConcepts({$item.projectId},{$itS.subcategoryId})">
        {if $itS.name == "0"}---{else}{$itS.name}{/if}
        </a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>
    <td width="76" class="colR"></td>   
    <td width="100" class="colR"></td>
    <td width="50" class=""></td>
</tr>

<tr id="conc_{$item.projectId}_{$itS.subcategoryId}">
    <td colspan="11" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-gastos-concept.tpl"}
    </td>
</tr>

<tr>
	<td width="30" class="colRB"></td>
    <td width="71" class="colRB"></td>
	<td align="center" width="24" class="colB"></td>
    <td width="96" align="left" class="colRS" height="20" colspan="5" bgcolor="#C4BD97">
   	&nbsp;<span class="txtTotal">Total {if $itS.name == "0"}---{else}{$itS.name}{/if}</span>
    </td>    
    <td width="100" class="colTB" bgcolor="#C4BD97" align="right" colspan="2">
    <span class="txtTotal">${$itS.total|number_format:2:'.':','}</span>&nbsp;
    </td>
    <td width="50" bgcolor="#C4BD97" align="center">
    	{assign var="totSub" value="{($itS.total/$item.total) * 100}"}
    	<span class="txtTotal">{$totSub|number_format:2:'.':','}</span>
    </td>
</tr>
{/foreach}

{if $itC.subcategories|count == 0}
<tr>
	<td width="30" class="colR2"></td>
    <td width="71" class="colR2"></td>
	<td align="center" width="24" class="colR"></td>
    <td align="left" class="colTR2B" height="25" colspan="7">&nbsp;
		> Ning&uacute;n registro encontrado.
    </td>
</tr>
{/if}
</table>