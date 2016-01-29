{foreach from=$ordersBuy.items item=item key=ky}
    <tr>       
        <td height="40" align="center">{$item.orderBuyId}</td>
        <td align="center">{$item.requisicion}</td>
        <td align="left">&nbsp;{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">{$item.fechaEnvio|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">{$item.fechaEntrega|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">
        {if $item.enviado == "1"}Enviado
        {else}No Enviado{/if}
        </td>  
        <td align="center">        	
            <a href="{$WEB_ROOT}/order-buy-email/id/{$item.orderBuyId}">
            <img src="{$WEB_ROOT}/images/icons/email.png" border="0" title="Enviar Orden de Compra"/>
            </a>            
        	<a href="{$WEB_ROOT}/modules/order-buy-pdf.php?id={$item.orderBuyId}" target="_blank">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0" title="Ver Pdf"/>
            </a>    
            <a href="javascript:void(0)" onclick="EditFechaEntrega({$item.orderBuyId})" title="Editar Fecha de Entrega">
            <img src="{$WEB_ROOT}/images/icons/edit.gif"/>
            </a>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}