{foreach from=$projects.items item=item key=key}    
    
   {foreach from=$item.categories item=itC key=kS}
    <tr id="cats_{$item.projectId}">    	
       	<td bgcolor="#FFFFFF" height="30">&nbsp;{$itC.name}</td>
        <td colspan="15" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/resumen-gastos-subcat.tpl"}
        </td>
    </tr>
    <tr>    	
       	<td class="colR_T" bgcolor="#D8D8D8" height="30" colspan="4" style="color:#000000"><b>&nbsp;TOTAL {$itC.name}</b></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_G" align="right"" width="{$wTotal+16}" bgcolor="#D8D8D8">${$itC.total|number_format:2:'.':','}&nbsp;</td>
        <td class="colR_G" align="center" width="{$wBlank+17}"></td>
        <td class="colR_T" align="center" width="{$wCantidad2+15}" bgcolor="#D8D8D8">0.00</td>
        <td class="colR_G" align="center" width="{$wTotal2+17}" bgcolor="#D8D8D8">$0.00</td>
        <td class="colR_G" align="center" width="{$wPorc+17}" bgcolor="#D8D8D8">0.00</td>
        <td class="colR_G" align="center" width="{$wBlank+15}"></td>
        <td class="colR_T" align="center" width="{$wCantidad2+17}" bgcolor="#D8D8D8">0.00</td>
        <td align="center" width="{$wTotal2+15}" bgcolor="#D8D8D8">$0.00</td>
        <td align="center" width="{$wPorc+15}" bgcolor="#D8D8D8">0.00</td>
     </tr>
    {/foreach}
    
    
    
    {*}
    {if $showPrecio}
        {if count($item.categories)}
        <tr id="cats_{$item.projectId}">    	
            <td colspan="7" bgcolor="#333333" style="border-right:1px solid #333333">&nbsp;
                <span class="txtTotal2">TOTAL DEL PROYECTO</span>
            </td>
            <td width="100" bgcolor="#333333" align="right" colspan="2">
                <span class="txtTotal2">${$item.total|number_format:2:'.':','}</span>&nbsp;
            </td>
        </tr>
        {/if}
    {/if}
    {*}
    
{foreachelse}
<tr><td colspan="14" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}