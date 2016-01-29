<table width="100%" cellpadding="0" cellspacing="0" border="0" id="tblState" class="sortable boxTable">
	{include file="{$DOC_ROOT}/templates/items/state-header.tpl"}
<tbody>
	{include file="{$DOC_ROOT}/templates/items/state-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="4" align="right" class="tblPages" height="22">
        {if count($states.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$states.pages}
		{/if}
        </td>
	</tr>
</tfoot> 
</table>