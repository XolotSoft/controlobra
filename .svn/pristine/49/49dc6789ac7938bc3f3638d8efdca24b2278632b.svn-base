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
    <td width="76" class="colR" align="center"></td>
    <td width="56" class="colR"></td>    
</tr>

<tr id="cuant_{$item.projectId}_{$itC.conceptConId}">
    <td colspan="8" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/material-resumen-description2.tpl"}
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
        	<div id="iconCuant_{$item.projectId}_{$itC.conceptConId}">[-]</div>
        </a>
    </td>
    <td class="colR" align="left" height="25" colspan="2">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewCuants({$item.projectId},{777+$kC+$kS+$b})"> --- </a>
    </td>
    <td width="76" class="colR" align="center">{$itC.cantidad}</td>
    <td width="56" class="colR"></td>   
</tr>

<tr id="cuant_{$item.projectId}_{777+$kC+$kS+$b}">
    <td colspan="8" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/material-resumen-description2.tpl"}
    </td>
</tr>
{/foreach}

{if $itS.concepts|count == 0 && $itS.concepts2|count == 0}
<tr>     
    <td width="30" class="colR2"></td>
    <td width="96" class="colR"></td>
    <td width="70" class="colR2"></td>    
    <td width="25" class="colR"></td>
    <td class="colR2B" align="left" height="25" colspan="4">&nbsp;
		> Ning&uacute;n registro encontrado.
    </td>
</tr>
{/if}
</table>