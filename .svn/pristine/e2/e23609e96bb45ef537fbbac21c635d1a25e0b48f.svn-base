{foreach from=$item.prices item=it key=ky}
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;{$it.supplier}</td>
        <td align="center">${$it.price}</td>
        <td align="center">{$it.iva}%</td>
        <td align="right">${$it.total}&nbsp;</td>
        <td align="center">{$it.fecha}</td>
        <td align="center">{if $it.supMain}S&iacute;{else}No{/if}</td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if count($item.prices) > 0}
    <tr>
    	<td height="40"></td>
        <td></td>
        <td></td>
        <td align="center"><b>TOTAL</b></td>
        <td align="right">${$item.totalP}&nbsp;</td>
        <td></td>
        <td></td>
    </tr>
{/if}