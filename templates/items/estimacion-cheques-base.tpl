{foreach from=$resPagos.items item=it key=ky}
    <tr>
    	<td align="center">{$it.noCheque}</td>
        <td align="center" height="40">{$it.bank}</td>        
        <td align="center">{$it.noInvoice}</td>
        <td align="center">${$it.quantity|number_format:2:".":","} {$it.currency}</td>
        <td align="center">{$it.fecha|date_format:"%d %b %Y"|capitalize}</td>      
        <td align="center">{$it.concepto}</td>
        <td align="center">{$it.status}</td>
        <td align="center">{$it.statusCheque}</td>
        <td align="center">
        	{if $it.statusCheque == "Emitido" && $it.status != "Cancelado"}
            <a href="javascript:void(0)" onclick="RecogerChequeDiv({$it.estimacionPagoId})" title="Recoger Cheque">
        	<img src="{$WEB_ROOT}/images/icons/user_go.png" border="0"/>
            </a>
            <a href="javascript:void(0)" onclick="CancelarChequeDiv({$it.estimacionPagoId})" title="Cancelar Cheque">
        	<img src="{$WEB_ROOT}/images/icons/cancel.png" border="0"/>
            </a>
            {elseif $it.statusCheque == "Recogido"}            
            <a href="javascript:void(0)" onclick="CobrarChequeDiv({$it.estimacionPagoId})" title="Cobrar Cheque">
        	<img src="{$WEB_ROOT}/images/icons/money_dollar.png" border="0"/>
            </a>
            <a href="{$WEB_ROOT}/modules/estimacion-cheques-pdf.php?id={$it.estimacionPagoId}" title="Ver Recibo" target="_blank">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0"/>
            </a>
            {/if}
        	<a href="javascript:void(0)" onclick="DetailsPagoPopup({$it.estimacionPagoId})" title="Ver Detalles">
        	<img src="{$WEB_ROOT}/images/icons/view.png" border="0"/>
            </a>                      
        </td>
    </tr>        
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}