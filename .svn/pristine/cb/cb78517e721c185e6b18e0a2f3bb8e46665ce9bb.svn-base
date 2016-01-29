{foreach from=$item.materials item=it key=ky}
    <tr>
    	<td align="center"> > </td>
        <td align="center" height="40">{$it.material}</td>
        <td align="center">{$it.unit}</td>
        <td align="center">${$it.price}</td>
        <td align="center">{$it.quantity}</td>        
        <td align="right">${$it.total}&nbsp;</td>
    </tr>
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if count($item.materials) > 0}
    <tr>
    	<td></td>
        <td height="40"></td>
        <td></td>
        <td></td>
        <td align="center"><b>TOTAL</b></td>        
        <td align="right">${$item.total}&nbsp;</td>
    </tr>

{/if}