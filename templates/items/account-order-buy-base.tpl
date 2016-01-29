{foreach from=$item.orderBuy item=it key=ky}
    <tr>       
        <td align="center" height="40">{$it.quantity}</td>
        <td align="center" height="40">{$it.saldo}</td>
        <td align="center">{$it.unit}</td>
        <td align="center">{$it.material}</td>
        <td align="center">${$it.unitPrice|number_format:2:".":","}</td>
        <td align="center">${$it.total|number_format:2:".":","}</td>
    </tr>        
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}