{foreach from=$itM.pedidos item=it key=ky}
    <tr>       
        <td height="40" align="center"> >> </td>
        <td>&nbsp;{$it.supplier}</td>
        <td align="center">${$it.price}</td>
        <td align="center">{$it.pedido}</td>
        <td align="center">${$it.total}</td>
        <td align="center">{$it.status}</td>
        <td align="center">        	
            {if $it.status == "Pendiente"}
        	<a href="javascript:void(0)" onclick="ConfirmPedido({$it.reqMatId})">
            <img src="{$WEB_ROOT}/images/icons/ok.png" title="Confirmar Pedido"/>
            </a>        
        	{/if}
            <a href="javascript:void(0)" onclick="DeletePedidoPopup({$it.reqMatId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar Pedido"/>
            </a> 
        </td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}