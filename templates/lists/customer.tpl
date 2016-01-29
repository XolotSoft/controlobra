<table width="100%" cellpadding="0" cellspacing="0" id="tblCustomer" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/customer-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/customer-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="8" align="right" class="tblPages" height="22">
        {if count($customers.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$customers.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>