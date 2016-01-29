{foreach from=$payments item=item key=ky}
    <tr>       
        <td height="40" align="center">
        {$item.estimacionId} 
        <a href="javascript:void(0)" onclick="ViewDetails({$item.estimacionPaymentId})" id="det_{$item.estimacionPaymentId}">[+]</a>
        </td>
        <td align="center">{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>
        <td align="center">
        <div id="txtAbonos_{$item.estimacionPaymentId}">
        	${$item.abonos|number_format:2:".":","}
        </div>
        </td>
        <td align="center">
        <div id="txtSaldo_{$item.estimacionPaymentId}">
        	${$item.saldo|number_format:2:".":","}
        </div>
        </td>
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">
        <div id="txtPagado_{$item.estimacionPaymentId}">
        	{if $item.pagado}Pagado{else}Pendiente{/if}
        </div>
        </td>
        <td align="center">
        <div id="btnPago_{$item.estimacionPaymentId}" align="center" {if $item.pagado == 0}style="display:none"{/if}>            
            <a href="javascript:void(0)" onclick="ViewPagos({$item.estimacionPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Pagos"/>
            </a>
        </div>
        <div id="btnPago2_{$item.estimacionPaymentId}" align="center" {if $item.pagado == 1}style="display:none"{/if}>
        	<a href="javascript:void(0)" onclick="AddPagoDiv({$item.estimacionPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Pago"/>
            </a> 
            <a href="javascript:void(0)" onclick="ViewPagos({$item.estimacionPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Pagos"/>
            </a>            
        </div>
        </td>     
        <td align="center">        	       	
            <a href="javascript:void(0)" onclick="DeletePaymentPopup({$item.estimacionPaymentId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar"/>
            </a>          
        </td>
    </tr>
    
    <tr id="pagos_{$item.estimacionPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="8" align="left">
    <div id="contPagos_{$item.estimacionPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/estimacion-pagos.tpl"}
    </div>
    </td></tr>
    
    <tr id="details_{$item.estimacionPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="8" align="left">
    <div id="contDetails_{$item.estimacionPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/estimacion-details.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}