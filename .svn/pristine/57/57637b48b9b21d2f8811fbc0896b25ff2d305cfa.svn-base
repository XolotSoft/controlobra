{foreach from=$pagos item=it key=ky}
    <tr>
    	<td align="center" height="40">{$it.seccion}</td>
    	<td align="center">{$it.noCheque}</td>        
        <td align="center">{$it.noInvoice}</td>
        <td align="center">${$it.quantity|number_format:2:".":","} {$it.currency}</td>
        <td align="center">{$it.fecha|date_format:"%d %b %Y"|capitalize}</td>      
        <td align="center">{$it.concepto}</td>
        <td align="center">{$it.proveedor}</td>
        <td align="center">{$it.status}</td>
        <td align="center">{if $it.seccion == "R"}{$it.statusCheque}{else}--{/if}</td>
        <td align="center">        	
        	{if $it.seccion == "R"}
        	<a href="javascript:void(0)" onclick="DetailsPagoPopup({$it.chequeId})" title="Ver Detalles">
            {else}
            <a href="javascript:void(0)" onclick="DetailsPagoEPopup({$it.chequeId})" title="Ver Detalles">
            {/if}
        	<img src="{$WEB_ROOT}/images/icons/view.png" border="0"/>
            </a>                      
        </td>
    </tr>        
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if $pagos|count > 0}
<tr>
    <td align="center" height="40"></td>
    <td align="center"></td>        
    <td align="center"><b>TOTAL</b></td>
    <td align="center"><b>${$total|number_format:2:".":","}</b></td>
    <td align="center"></td>      
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
</tr>
{/if}