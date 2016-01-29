<table width="100%" cellpadding="0" cellspacing="0" id="tblOrderBuy" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/order-buy-send-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/order-buy-send-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="9" align="right" class="tblPages" height="22">
        {if count($ordersBuy.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$ordersBuy.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>