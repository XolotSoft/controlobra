{foreach from=$item.materials item=itM key=kM}
    <tr>
    	<td align="center">
        {if $itM.status == "Pendiente"}
        <input type="checkbox" name="matId[]" id="mat_{$item.reqPedidoId}_{$itM.reqMatId}" value="{$item.reqPedidoId}_{$itM.reqMatId}" />
        {else}
        	>
        {/if}
        </td>
        <td height="40">&nbsp;{$itM.supplier}</td>
        <td align="center"><div align="center">{$itM.material}</div></td>
        <td align="center">{$itM.unit}</td>
        <td align="center">{$itM.quantity|number_format:2:".":","}</td>
        <td align="center">${$itM.price|number_format:2:".":","}</td>
        <td align="center">${$itM.total|number_format:2:".":","}</td>
        <td align="center">{$itM.status}</td>
    </tr>    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}