<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itS.concepts item=itC key=kC}
<tr>     
    <td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="70" class="colRB"></td>    
    <td width="25" class="colB" align="center">
     	<a href="javascript:void(0)" onclick="ViewCuants({$item.projectId},{$itC.conceptConId})">
        	<div id="iconCuant_{$item.projectId}_{$itC.conceptConId}">[-]</div>
        </a>
    </td>
    <td class="colR" align="left" height="25" colspan="2">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewCuants({$item.projectId},{$itC.conceptConId})">{$itC.name}</a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>
    <td width="76" class="colR"></td>    
    <td width="100" class="colR"></td>
    <td width="50" class=""></td>
</tr>

<tr id="cuant_{$item.projectId}_{$itC.conceptConId}">
    <td colspan="11" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-description.tpl"}
    </td>
</tr>

<tr>     
    <td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="70" class="colR"></td>    
    <td width="25" class="col" align="center"></td>
    <td width="96" class="colRC" colspan="4" align="left" height="20" bgcolor="#DCE6F1">
    &nbsp;<span class="txtTotal">Total {$itC.name}</span>
    </td>
    <td width="100" class="col" bgcolor="#DCE6F1" align="right" colspan="2">
    <span class="txtTotal">${$itC.total|number_format:2:'.':','}</span>&nbsp;
    </td>
    <td width="50" bgcolor="#DCE6F1" align="center">
    	{assign var="totCon" value="{($itC.total/$item.total) * 100}"}
    	<span class="txtTotal">{$totCon|number_format:2:'.':','}</span>
    </td>
</tr>
{/foreach}

{foreach from=$itS.concepts2 item=itC key=kC}
<tr>     
    <td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="70" class="colRB"></td>    
    <td width="25" class="colB" align="center">
     	<a href="javascript:void(0)" onclick="ViewCuants({$item.projectId},{777+$kC+$kS+$b})">
        	<div id="iconCuant_{$item.projectId}_{777+$kC+$kS+$b}">[-]</div>
        </a>
    </td>
    <td class="colR" align="left" height="25" colspan="2">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewCuants({$item.projectId},{777+$kC+$kS+$b})"> --- </a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>
    <td width="76" class="colR"></td>    
    <td width="100" class="colR"></td> 
    <td width="50" class=""></td>
</tr>

<tr id="cuant_{$item.projectId}_{777+$kC+$kS+$b}">
    <td colspan="11" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-description.tpl"}
    </td>
</tr>

<tr>     
    <td width="30" class="colRB"></td>
    <td width="96" class="col"></td>
    <td width="70" class="colR"></td>    
    <td width="25" class="col" align="center"></td>
    <td width="96" class="colRC" colspan="4"></td>
    <td width="100" class="colB" colspan="2"></td>
    <td width="50" class=""></td>    
</tr>
{/foreach}

{if $itS.concepts|count == 0 && $itS.concepts2|count == 0}
<tr>     
    <td width="30" class="colR2"></td>
    <td width="96" class="colR"></td>
    <td width="70" class="colR2"></td>    
    <td width="25" class="colR"></td>
    <td class="colR2B" align="left" height="25" colspan="6">&nbsp;
		> Ning&uacute;n registro encontrado.
    </td>
</tr>
{/if}
</table>