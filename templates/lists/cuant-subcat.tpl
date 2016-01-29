<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$item.subcategories item=itS key=kS}
<tr>
	<td align="center" bgcolor="#F8F8F8" width="195"> > </td>
    <td align="center" height="40" bgcolor="#F8F8F8" width="195">
    	<a href="javascript:void(0)" onclick="ViewConcepts({$itS.subcategoryId})">{$itS.name}</a>
    </td>       
    <td bgcolor="#F8F8F8">&nbsp;
    <input type="hidden" name="subcats_{$item.categoryId}[]" value="{$itS.subcategoryId}" />
    </td>
    <td align="center" bgcolor="#F8F8F8" width="95">
    	<a href="javascript:void(0)" onclick="ViewConcepts({$itS.subcategoryId})">
        	<div id="iconConc_{$itS.subcategoryId}">[+]</div>
        </a>
    </td>
</tr>

<tr id="conc_{$itS.subcategoryId}" style="display:none">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="3" bgcolor="#FFFFFF">
    	{include file="{$DOC_ROOT}/templates/lists/cuant-concept.tpl"}
    </td>
</tr>
{/foreach}

{foreach from=$item.subcategories2 item=itS key=kS}
<tr>
	<td align="center" bgcolor="#F8F8F8" width="195"> > </td>
    <td align="center" height="40" bgcolor="#F8F8F8" width="195">
    	<a href="javascript:void(0)" onclick="ViewConcepts({777+$kS})">---</a>
    </td>       
    <td bgcolor="#F8F8F8">&nbsp;
    <input type="hidden" name="subcats_{$item.categoryId}[]" value="{777+$kS}" />
    </td>
    <td align="center" bgcolor="#F8F8F8" width="95">
    	<a href="javascript:void(0)" onclick="ViewConcepts({777+$kS})">
        	<div id="iconConc_{777+$kS}">[+]</div>
        </a>
    </td>
</tr>

<tr id="conc_{777+$kS}" style="display:none">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="3" bgcolor="#FFFFFF">
    	{include file="{$DOC_ROOT}/templates/lists/cuant-concept.tpl"}
    </td>
</tr>
{/foreach}

{if $item.subcategories|count == 0 && $item.subcategories2|count == 0}
<tr>
	<td align="center" bgcolor="#F8F8F8" width="195"> > </td>
	<td colspan="3" align="center" height="40" bgcolor="#F8F8F8">Ninguna subcategor&iacute;a encontrada.</td>
</tr>
{/if}
</table>