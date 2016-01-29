{foreach from=$item.prices item=it key=ky}
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;{$it.supplier}</td>
        <td align="center">${$it.price}</td>
        <td align="center">{$it.iva}%</td>
        <td align="center">${$it.total}</td>
        <td align="center">{$it.currency}</td>
        <td align="center">{$it.fecha}</td>
        <td align="center">{if $it.supMain}S&iacute;{else}No{/if}</td>
    </tr>
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}