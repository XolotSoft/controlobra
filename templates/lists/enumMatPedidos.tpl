{foreach from=$materials item=item key=key}
<div style="width:30%;float:left"><b>{$item.material}:</b></div>
<br style="clear:both" />
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">            
    <tr>
    	<td align="center"><div align="center" class="bdTB">Proveedor</div></td>
        <td align="center" width="60"><div align="center" class="bdTB">Unidad</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">Cantidad</div></td>
        <td align="center" width="60"><div align="center" class="bdTB">Desp.</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">Solicitado</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">Saldo</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">A Solicitar</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">Precio Uni.</div></td>
        <td align="center" width="70"><div align="center" class="bdTB">Total</div></td>
    </tr>
    <tr>
    	<td align="center">
        {include file="{$DOC_ROOT}/templates/lists/enumSupplierPedidos.tpl"}
        </td>
        <td align="center"><div align="center">{$item.unit}</div></td>
        <td align="center">
        	<div align="center">{$item.quantity|number_format:2:".":","}</div>
            <input type="hidden" name="quantity_{$item.conceptMatId}" id="quantity_{$item.conceptMatId}" value="{$item.quantity}" />
        </td>
        <td align="center">
        	<div align="center">{$item.desperdicio|number_format:2:".":","}</div>
            <input type="hidden" name="waste_{$item.conceptMatId}" id="waste_{$item.conceptMatId}" value="{$item.desperdicio}" />
        </td>
        <td align="center"><div align="center">{$item.solicitado|number_format:2:".":","}</div></td>
    	<td align="center"><div align="center">{$item.saldo}</div></td>
        <td align="center">
        <div align="center">
        	<input type="text" class="smallInput" size="6" name="solicitar_{$item.conceptMatId}" id="solicitar_{$item.conceptMatId}" onblur="UpdateTotalPricePed({$item.conceptMatId})" value="{$item.solicitar|number_format:2:'.':''}" />
        </div>
        </td>
        <td align="center">
        <div align="center">
        	<input type="text" class="smallInput" size="6" name="unitPrice_{$item.conceptMatId}" id="unitPrice_{$item.conceptMatId}" onblur="UpdateTotalPricePed({$item.conceptMatId})" value="{$item.unitPrice}" />
        </div>
        </td>
        <td align="center"><div align="center" id="total_{$item.conceptMatId}">${$item.total}</div></td>
    </tr>           
</table>
<br />
{/foreach}