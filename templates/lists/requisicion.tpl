<table width="100%" cellpadding="0" cellspacing="0" id="tblRequisicion" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/requisicion-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/requisicion-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="8" align="right" class="tblPages" height="22">
        {if count($requisiciones.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$requisiciones.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>