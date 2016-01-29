{foreach from=$item.pedidos item=itM key=kM}
    <tr>
    	<td align="center"> > </td>
        <td height="40">&nbsp;{$itM.supplier}</td>        
        <td align="center">{$itM.total|number_format:2:".":","}</td>
        <td align="center">{$itM.status}</td>
        <td align="center">
        	{if $itM.status == "Pendiente"}	
        	<a href="javascript:void(0)" onclick="ConfirmPedidos({$itM.reqPedidoId},{$item.requisicionId})">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" title="Confirmar" />
            </a>
            {/if}
            <a href="javascript:void(0)" onclick="ViewPedidosPopup({$itM.reqPedidoId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Detalles" />
            </a>
            <a href="javascript:void(0)" onclick="DeletePedidosPopup({$itM.reqPedidoId},{$item.requisicionId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar Pedido"/>
            </a> 
        </td>
    </tr>   
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}