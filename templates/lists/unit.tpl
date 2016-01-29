<table width="100%" cellpadding="0" cellspacing="0" id="tblUnit" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/unit-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/unit-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="5" align="right" class="tblPages" height="22">
        {if count($units.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$units.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>