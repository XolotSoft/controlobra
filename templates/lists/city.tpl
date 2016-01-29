<table width="100%" cellpadding="0" cellspacing="0" border="0" id="tblCity" class="sortable boxTable">
	{include file="{$DOC_ROOT}/templates/items/city-header.tpl"}
<tbody>
	{include file="{$DOC_ROOT}/templates/items/city-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="4" align="right" class="tblPages" height="22">
        {if count($cities.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$cities.pages}
		{/if}
        </td>
	</tr>
</tfoot>
</table>