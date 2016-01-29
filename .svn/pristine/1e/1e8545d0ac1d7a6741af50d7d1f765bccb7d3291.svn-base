{foreach from=$contracts.items item=item key=key}
    <tr>
        <td align="center" height="40">{$item.noContract}</td>
        <td align="left">&nbsp;{if $item.customer}{$item.customer}{/if}</td>
        <td align="center">{$item.tipoClte}</td>
        <td align="center">
        Torre: {$item.item}<br />
        Depto: {$item.area}</td>
        <td align="center">${$item.total|number_format:2:'.':','}</td>
        <td align="center">${$item.pagos|number_format:2:'.':','}</td>
        <td align="center">${$item.saldo|number_format:2:'.':','}</td>
        <td align="center">{$item.status}</td>
        <td align="center">
        {if $mainMnu == "resumenes"}          
        	<a href="{$WEB_ROOT}/resumen-edoctaclte/contractId/{$item.contractId}">
        		<img src="{$WEB_ROOT}/images/icons/view.png" title="Ver Detalles"/>
            </a>
        {else}
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.contractId}" title="Eliminar"/>
            {if $item.status == "Cancelado"}
            <a href="javascript:void(0)" onclick="ViewCancelContractPopup({$item.contractId})" title="Detalles de Cancelaci&oacute;n">
            <img src="{$WEB_ROOT}/images/icons/cancel2.png" id="{$item.contractId}" border="0"/>
            </a>
            {/if}
            {if $item.status == "Activo"}
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.contractId}" title="Editar"/>
            <img src="{$WEB_ROOT}/images/icons/cancel.png" class="spanCancel" id="{$item.contractId}" title="Cancelar"/>
            {/if}
        {/if}
        </td>
    </tr>
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}