<table width="100%" cellpadding="0" cellspacing="0" id="tblConcept" border="0" class="sortable boxTable">
    {include file="{$DOC_ROOT}/templates/items/concept-header.tpl"}
    <tbody>     
    {include file="{$DOC_ROOT}/templates/items/concept-base.tpl"}
</tbody>
<tfoot>
	<tr>
    	<td colspan="8" align="left" class="tblPages" height="22">
        {if count($concepts.items)}
            <div style="float:left">        
            {include file="{$DOC_ROOT}/templates/lists/itemsPage.tpl" page="concept"}
            Reg. por P&aacute;gina :: Total = {$concepts.total}
            </div>
        {/if}
        
        {if count($concepts.pages)}   
            <div style="float:right; padding-top:2px">        
            {include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$concepts.pages}		
            </div>
        {/if}
        </td>
	</tr>
</tfoot>      
</table>