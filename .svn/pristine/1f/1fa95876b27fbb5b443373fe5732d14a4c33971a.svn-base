{foreach from=$projects.items item=item key=key}    
    
    <tr id="cats_{$item.projectId}">    	
        <td colspan="8" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/concept-resumen-cat-2.tpl"}
        </td>
    </tr>
    
    {if $showPrecio}
        {if count($item.categories)}
        <tr id="cats_{$item.projectId}">    	
            <td colspan="6" bgcolor="#333333" style="border-right:1px solid #333333">&nbsp;
                <span class="txtTotal2">TOTAL DEL PROYECTO</span>
            </td>
            <td width="100" bgcolor="#333333" align="right" colspan="2">
                <span class="txtTotal2">${$item.total|number_format:2:'.':','}</span>&nbsp;
            </td>
        </tr>
        {/if}
    {/if}
    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}