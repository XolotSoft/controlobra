<table width="100%" cellpadding="0" cellspacing="0" id="tblMaterial" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/material-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/material-base.tpl"}
</tbody>
<tfoot>
	<tr>
    	<td colspan="9" align="left" class="tblPages" height="22">
        {if count($materials.items)}
            <div style="float:left">        
            {include file="{$DOC_ROOT}/templates/lists/itemsPage.tpl" page="material"}
            Reg. por P&aacute;gina :: Total = {$materials.total}
            </div>
        {/if}
        
        {if count($materials.pages)}   
            <div style="float:right; padding-top:2px">        
            {include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$materials.pages}		
            </div>
        {/if}
        </td>
	</tr>
</tfoot>   
</table>