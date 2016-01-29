{foreach from=$payments.items item=item key=ky}
    <tr>       
        <td height="40" align="center">
        	{$item.accountPaymentId} 
            <a href="javascript:void(0)" onclick="ViewOrderBuy({$item.accountPaymentId})" id="det_{$item.accountPaymentId}">[+]</a>
        </td>
        <td align="center">{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>       
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">
        <div id="txtPagado_{$item.accountPaymentId}">
        	{if $item.revisado}Revisado{else}Pendiente{/if}
        </div>
        </td>            
        <td align="center">
        	{if $item.revisado == 0}
        	<a href="javascript:void(0)" onclick="Confirm({$item.accountPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" title="Confirmar de Revisado"/>
            </a>
            {/if}        	
            <a href="javascript:void(0)" onclick="DeletePaymentPopup({$item.accountPaymentId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar"/>
            </a>          
        </td>
    </tr>
    
    <tr id="pagos_{$item.accountPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="5" align="left">
    <div id="contPagos_{$item.accountPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/account-pagos.tpl"}
    </div>
    </td></tr>
    
    <tr id="orderBuy_{$item.accountPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="5" align="left">
    <div id="contOrderBuy_{$item.accountPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/account-order-buy.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}