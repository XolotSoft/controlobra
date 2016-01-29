<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.descriptions item=itD key=kD}
<tr>
    <td class="colR" align="left" height="25">&nbsp;
    	{$itD.name}
    </td>
    <td class="colR" align="center" width="{$wCantidad+15}">{$itD.cantidad|number_format:2:'.':','}</td>
    <td class="colR" align="center" width="{$wUnidad+17}">{$itD.unit}</td>
    <td class="colR" align="right" width="{$wPrecio+16}">${$itD.price|number_format:2:'.':','}&nbsp;</td>
    <td class="colR_G" align="right"" width="{$wTotal+16}">${$itD.total|number_format:2:'.':','}&nbsp;</td>
    <td class="colR_G" align="center" width="{$wBlank+17}"></td>
    <td class="colR_G" align="center" width="{$wCantidad2+15}">0.00</td>
    <td class="colR_G" align="center" width="{$wTotal2+17}">$0.00</td>
    <td class="colR_G" align="center" width="{$wPorc+17}">0.00</td>
    <td class="colR_G" align="center" width="{$wBlank+15}"></td>
    <td class="colR_G" align="center" width="{$wCantidad2+17}">0.00</td>
    <td align="center" width="{$wTotal2+15}">$0.00</td>
    <td align="center" width="{$wPorc+15}">0.00</td>
</tr>
{/foreach}
</table>