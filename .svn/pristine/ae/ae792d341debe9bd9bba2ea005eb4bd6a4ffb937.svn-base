{foreach from=$projects.items item=item key=key}    
    
    <tr id="cats_{$item.projectId}">    	
        <td colspan="10" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/material-resumen-cat.tpl"}
        </td>
    </tr>
    
    {if $showPrecio}
        {if count($item.categories)}
        <tr id="cats_{$item.projectId}">    	
            <td colspan="7" bgcolor="#333333" style="border-right:1px solid #333333">&nbsp;
                <span class="txtTotal2">TOTAL DEL PROYECTO</span>
            </td>
            <td width="100" bgcolor="#333333" align="right" colspan="2">
                <span class="txtTotal2">${$item.total|number_format:2:'.':','}</span>&nbsp;
            </td>
            <td align="center" bgcolor="#333333"><span class="txtTotal2">100.00</span></td>
        </tr>
        {/if}
    {/if}
    
{foreachelse}
<tr><td colspan="10" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}