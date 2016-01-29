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
    	<a href="javascript:void(0)" onclick="ViewConcepts({$item.projectId},{$itS.subcategoryId})">{$itS.name}</a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>      
</tr>

<tr id="conc_{$item.projectId}_{$itS.subcategoryId}">
    <td colspan="8" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-concept2.tpl"}
    </td>
</tr>

<tr>
	<td width="30" class="col" style="border-bottom:1px solid #FFFFFF"></td>
    <td width="71" class="colR2" style="border-bottom:1px solid #FFFFFF"></td>
	<td align="center" width="24" class="colR2" style="border-bottom:1px solid #FFFFFF"></td>
    <td width="96" class="colTR2" height="1" colspan="5"></td>       
</tr>

<tr>
    <td colspan="3" bgcolor="#FFFFFF" class="colRB">&nbsp;</td>
    <td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
{/foreach}

{foreach from=$itC.subcategories2 item=itS key=kS}
<tr>
	<td width="30" class="colRB"></td>
    <td width="71" class="colRB"></td>
	<td align="center" width="24" class="colB">
    	<a href="javascript:void(0)" onclick="ViewConcepts({$item.projectId},{777+$kS})">
        	<div id="iconConc_{$item.projectId}_{777+$kS}">[-]</div>
        </a>
    </td>
    <td align="left" class="colR" height="25" colspan="3">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewConcepts({$item.projectId},{777+$kS})"> --- </a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>      
</tr>

<tr id="conc_{$item.projectId}_{777+$kS}">
    <td colspan="8" bgcolor="#FFFFFF" class="colB">
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-concept2.tpl" b="2"}
    </td>
</tr>

<tr>
	<td width="30" class="col" style="border-bottom:1px solid #FFFFFF"></td>
    <td width="71" class="colR2" style="border-bottom:1px solid #FFFFFF"></td>
	<td align="center" width="24" class="colR2" style="border-bottom:1px solid #FFFFFF"></td>
    <td width="96" class="colTR2" height="1" colspan="5"></td>       
</tr>

<tr>
    <td colspan="3" bgcolor="#FFFFFF" class="colRB">&nbsp;</td>
    <td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
{/foreach}

{if $itC.subcategories|count == 0 && $itC.subcategories2|count == 0}
<tr>
	<td width="30" class="colR2"></td>
    <td width="71" class="colR2"></td>
	<td align="center" width="24" class="colR"></td>
    <td align="left" class="colTR2B" height="25" colspan="5">&nbsp;
		> Ning&uacute;n registro encontrado.
    </td>
</tr>
{/if}
</table>