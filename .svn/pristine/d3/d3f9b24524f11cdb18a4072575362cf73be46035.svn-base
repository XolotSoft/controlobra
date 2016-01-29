{foreach from=$ordersBuy.items item=item key=ky}
    <tr>       
        <td height="40" align="center">{$item.orderBuyId}</td>
        <td height="40" align="center">{$item.requisicion}</td>
        <td align="left">
        	&nbsp;{$item.supplier}
        	
            {foreach from=$item.torres item=iT key=kT}
                <div align="center" style="padding-top:10px"><b>Torre:</b> {$iT.name}</div>
                <table width="200" border="1" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td align="center"><b>AREA</b></td>
                    <td align="center"><b>REQ. ACTUAL</b></td>
                </tr>
                {foreach from=$iT.areas item=iA key=kA}
                <tr>
                    <td align="center">{$iA.name}</td>
                    <td align="center">{$iA.requisicion|number_format:2:'.':','}</td>
                </tr>
                {/foreach}
                </table>
            {/foreach}
            
        </td>
        <td align="center">${$item.total|number_format:2:".":","}</td>
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">{$item.fechaEntrega|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">
        {if $item.stEntrega == "Proceso"}
        	Pendiente
        {elseif $item.stEntrega == "Pagos"}
        	Completo
        {else}
        	{$item.stEntrega}
        {/if}
        </td>  
        <td align="center">
        	{if $item.stEntrega == "Completo" || $item.stEntrega == "Pagos"}
            {*}
            <a href="javascript:void(0)" onclick="ConfirmPago({$item.orderBuyId})">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" title="Confirmar Pago"/>
            </a>
            {*}
            {else}
            <a href="javascript:void(0)" onclick="RecibirAllMaterials({$item.orderBuyId})">
                <img src="{$WEB_ROOT}/images/icons/add.png" title="Recibir Todo los Materiales"/>
            </a>
            {/if}        	
            <a href="javascript:void(0)" onclick="ViewMaterials({$item.orderBuyId})">
                <img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Materiales"/>
            </a>
        </td>
    </tr>
    
    <tr id="materials_{$item.orderBuyId}" style="display:">
    	<td>&nbsp;</td>  
        <td colspan="7" align="right">
        {include file="{$DOC_ROOT}/templates/lists/order-buy-material.tpl"}
        </td>
    </tr>
    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}