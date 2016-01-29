{foreach from=$payments.items item=item key=key}
    <tr>
        <td align="center" height="40">{$item.contPaymentId}</td>
        <td align="center">{if $item.customer}{$item.customer}{/if}</td>
        <td align="center">{if $item.item}{$item.item}{/if}</td>        
        <td align="center">{if $item.area}{$item.area}{/if}</td>
        <td align="center">${$item.quantity}</td>        
        <td align="center">{$item.fecha}</td>
        <td align="center">       
        	<img src="{$WEB_ROOT}/images/icons/view.png" class="spanView" id="{$item.contPaymentId}" title="Ver Detalles"/>
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.contPaymentId}" title="Eliminar"/>        </td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}