{foreach from=$ordersBuy.items item=item key=ky}
    <tr>       
        <td height="40" align="center">{$item.orderBuyId}</td>
        <td align="center">{$item.requisicion}</td>
        <td align="left">&nbsp;{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>        
        <td align="center">{$item.status}</td>  
        <td align="center">
        	{if $item.status == "Pendiente"}
            <a href="javascript:void(0)" onclick="Confirm({$item.orderBuyId})" title="Confirmar">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0"/>
            </a>
            <a href="javascript:void(0)" onclick="EditOrderBuyPopup({$item.orderBuyId})" title="Editar Comentarios">
        		<img src="{$WEB_ROOT}/images/icons/edit.gif" border="0" />
            </a>          
            {/if}            
        	<a href="{$WEB_ROOT}/modules/order-buy-pdf.php?id={$item.orderBuyId}" target="_blank"title="Ver Pdf">
        	<img src="{$WEB_ROOT}/images/icons/pdf.png" border="0" />
            </a>            
            <a href="javascript:void(0)" onclick="DeleteOrderBuyPopup({$item.orderBuyId})"title="Eliminar">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" border="0" />
            </a>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}