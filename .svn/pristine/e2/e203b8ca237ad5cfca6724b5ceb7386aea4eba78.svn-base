{foreach from=$item.materials item=itM key=kM}
    <tr>
        <td align="left" height="40">&nbsp;{$itM.material}</td>
        <td align="center">{$itM.unit}</td>
        <td align="center">{$itM.quantity}</td>
        <td align="center">{$itM.recibido}</td>
        <td align="center">{$itM.saldo}</td>
        <td align="center">
        {if $itM.status == "Proceso"}
        	Pendiente
        {else}
        	{$itM.status}
        {/if}
        </td>
        <td align="center">
        {if $item.stEntrega != "Pagos"}
        <a href="javascript:void(0)" onclick="EditEntrega({$itM.ordBuyItemId})">
        	<img src="{$WEB_ROOT}/images/icons/edit.gif" title="Editar"/>
        </a>
        {else}
        	--
        {/if}
        </td>
    </tr>    
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}