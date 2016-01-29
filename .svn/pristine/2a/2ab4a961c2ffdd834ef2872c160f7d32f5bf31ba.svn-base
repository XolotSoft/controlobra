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
        	<a href="javascript:void(0)" onclick="DetailsPagoPopup({$it.accountPagoId})" title="Ver Detalles">
        	<img src="{$WEB_ROOT}/images/icons/view.png" border="0"/>
            </a>
            {*}
            {if $it.tipo == "Cheque"}
            <a href="{$WEB_ROOT}/modules/account-payment-pdf.php?id={$it.accountPagoId}" target="_blank" title="Imprimir Cheque">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0"/>
            </a>
            {/if}
            {*}
            {if $it.tipo == "Transferencia" && $it.status == "Activo"}
            <a href="{$WEB_ROOT}/modules/account-payment-pdf2.php?id={$it.accountPagoId}" target="_blank" title="Imprimir Comprobante">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0"/>
            </a>
            {/if}
            {if $it.status == "Activo"}
            <a href="javascript:void(0)" onclick="CancelPagoPopup({$it.accountPagoId})" title="Cancelar Pago">
        	<img src="{$WEB_ROOT}/images/icons/cancel.png"/>
            </a>
            {/if}
        </td>
    </tr>        
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}