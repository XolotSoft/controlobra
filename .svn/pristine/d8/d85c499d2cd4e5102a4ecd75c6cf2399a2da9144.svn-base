{foreach from=$payments.items item=item key=ky}
    <tr>       
        <td height="40" align="center">
        	{$item.accountPaymentId} 
            <a href="javascript:void(0)" onclick="ViewOrderBuy({$item.accountPaymentId})" id="det_{$item.accountPaymentId}">[+]</a>
        </td>
        <td align="center">{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>
        <td align="center">
        <div id="txtAbonos_{$item.accountPaymentId}">
        	${$item.abonos|number_format:2:".":","}
        </div>
        </td>
        <td align="center">
        <div id="txtSaldo_{$item.accountPaymentId}">
        	${$item.saldo|number_format:2:".":","}
        </div>
        </td>
        <td align="center">{$item.fecha}</td>
        <td align="center">
        <div id="txtPagado_{$item.accountPaymentId}">
        	{if $item.pagado}Pagado{else}Pendiente{/if}
        </div>
        </td>
        <td align="center">
        <div id="btnPago_{$item.accountPaymentId}" align="center" {if $item.pagado == 0}style="display:none"{/if}>            
            <a href="javascript:void(0)" onclick="ViewPagos({$item.accountPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Pagos"/>
            </a>
        </div>
        <div id="btnPago2_{$item.accountPaymentId}" align="center" {if $item.pagado == 1}style="display:none"{/if}>
        	<a href="javascript:void(0)" onclick="AddPagoDiv({$item.accountPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Pago"/>
            </a> 
            <a href="javascript:void(0)" onclick="ViewPagos({$item.accountPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Pagos"/>
            </a>            
        </div>
        </td>     
        <td align="center">        	
            <a href="javascript:void(0)" onclick="DeletePaymentPopup({$item.accountPaymentId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar"/>
            </a>          
        </td>
    </tr>
    
    <tr id="pagos_{$item.accountPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="8" align="left">
    <div id="contPagos_{$item.accountPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/account-pagos.tpl"}
    </div>
    </td></tr>
    
    <tr id="orderBuy_{$item.accountPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="8" align="left">
    <div id="contOrderBuy_{$item.accountPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/account-order-buy.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}