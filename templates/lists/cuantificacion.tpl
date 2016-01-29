<table width="100%" cellpadding="0" cellspacing="0" id="tblCuantificacion" border="0" class="boxTable">
    {include file="{$DOC_ROOT}/templates/items/cuantificacion-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/cuantificacion-base.tpl"}
</tbody>
<tfoot>
	<tr>
		<td colspan="4" align="right" class="tblPages" height="22">
        {if count($cuantificaciones.pages)}
		{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$cuantificaciones.pages}
		{/if}
        </td>
	</tr>
</tfoot>     
</table>