<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.descriptions item=itD key=kD}
<tr>
	<td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="96" class="colB"></td>
    <td width="70" class="colRB"></td>    
    <td width="25" class="colB" align="center"></td>
    <td class="col" align="left" height="25">&nbsp;{if $itD.name == ""}---{else}{$itD.name}{/if}</td>    
    <td width="76" class="col" align="center">{$itD.noCheque}</td>
    <td width="56" class="col" align="center">{$itD.fecha|date_format:"%d-%m-%Y"}</td>
    <td width="76" class="col" align="center">{$itD.noInvoice}</td>
    <td width="100" class="" align="right">${$itD.total|number_format:2:'.':','}&nbsp;</td>
    <td width="50" align="center">
    	{assign var="totDes" value="{($itD.total/$item.total) * 100}"}
    	{$totDes|number_format:2:'.':','}
    </td>   
</tr>

<tr id="mats_{$item.projectId}_{$itD.conceptId}" style="display:none">
    <td colspan="11" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-materials.tpl"}
    </td>
</tr>

{foreachelse}
<tr>
	<td width="30" class="colR2"></td>
    <td width="96" class="colR"></td>
    <td width="96" class="colR"></td>
    <td width="70" class="colR2"></td>    
    <td width="25" class="colR"></td>
    <td class="colRB" align="left" height="25" colspan="4">&nbsp;
 		> Ning&uacute;n registro encontrado.   	
    </td>    
</tr>
{/foreach}
</table>