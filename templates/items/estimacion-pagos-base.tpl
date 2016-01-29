{foreach from=$item.pagos item=it key=ky}
    <tr>       
        <td align="center" height="40">{$it.tipo}</td>
        <td align="center">{$it.bank}</td>
        <td align="center">{$it.noCheque}</td>
        <td align="center">{$it.noInvoice}</td>
        <td align="center">${$it.quantity|number_format:2:".":","} {$it.currency}</td>
        <td align="center">{$it.fecha|date_format:"%d %b %Y"|capitalize}</td>      
        <td align="center">{$it.status}</td>     
        <td align="center">             	
            <a href="javascript:void(0)" onclick="DetailsPagoPopup({$it.estimacionPagoId})">
        	<img src="{$WEB_ROOT}/images/icons/view.png" title="Ver Detalles"/>
            </a>
            {*}
            {if $it.tipo == "Cheque" && $it.status == "Activo"}
            <a href="{$WEB_ROOT}/modules/estimacion-payment-pdf.php?id={$it.estimacionPagoId}" target="_blank">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0" title="Imprimir Cheque"/>
            </a>
            {/if}
            {*}
            {if $it.tipo == "Transferencia" && $it.status == "Activo"}
            <a href="{$WEB_ROOT}/modules/estimacion-payment-pdf2.php?id={$it.estimacionPagoId}" target="_blank">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0" title="Imprimir Comprobante"/>
            </a>
            {/if}
            {if $it.status == "Activo"}
            <a href="javascript:void(0)" onclick="CancelPagoPopup({$it.estimacionPagoId})">
        	<img src="{$WEB_ROOT}/images/icons/cancel.png" title="Cancelar Pago"/>
            </a>
            {/if}                      
        </td>
    </tr>        
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}