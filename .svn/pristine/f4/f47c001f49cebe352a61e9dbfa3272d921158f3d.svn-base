{foreach from=$categories item=item key=key}
<tr>
    <td align="center" height="40" bgcolor="#FFFFFF">
    	<a href="javascript:void80)" onclick="ViewSubcats({$item.categoryId})">{$item.name}</a>
    </td>       
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.categoryId})">
        <div id="iconSubcat_{$item.categoryId}">[+]</div>
        </a>
    </td>
</tr>

<tr id="subcats_{$item.categoryId}" style="display:none">
    <td colspan="4">
	{include file="{$DOC_ROOT}/templates/lists/cuant-subcat.tpl"}
	</td>
</tr>

{foreachelse}
<tr><td align="center" colspan=4" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}