<table width="100%" cellpadding="0" cellspacing="0" id="tblOrderBuy" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/order-buy-entregas-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/order-buy-entregas-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="8" align="right" class="tblPages" height="22">
        {if count($ordersBuy.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$ordersBuy.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>