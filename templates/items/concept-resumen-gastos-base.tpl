{if $vista == "anterior"}

{foreach from=$cheques item=item key=key}    
    <tr>    	
        <td align="center" height="25">{$item.partida}</td>
        <td align="center">{$item.subpartida}</td>
        <td align="center">{$item.concept}</td>
        <td align="center">{$item.supplier}</td>
        <td align="center">{$item.noCheque}</td>
        <td align="center">{$item.fecha|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$item.noInvoice}</td>
        <td align="center">{$item.descripcion}</td>
        <td align="right">${$item.quantity}&nbsp;</td>
    </tr>  
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if $cheques|count > 0}
<tr>
    <td colspan="7" bgcolor="#333333" style="border-right:1px solid #333333">&nbsp;
        <span class="txtTotal2">TOTAL</span>
    </td>
    <td width="100" bgcolor="#333333" align="right"></td>
    <td align="center" bgcolor="#333333"><span class="txtTotal2">${$total|number_format:2:'.':','}</span></td>
</tr> 
{/if}

{else}

{foreach from=$projects.items item=item key=key}    
    
    <tr id="cats_{$item.projectId}">    	
        <td colspan="10" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/concept-resumen-gastos-cat.tpl"}
        </td>
    </tr>
    
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
    
{foreachelse}
<tr><td colspan="10" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{/if}