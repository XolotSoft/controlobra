{foreach from=$history.items item=item key=key}
    <tr>
        <td align="center" height="40">{$item.fecha|date_format:"%d-%m-%Y"}</td>       
        <td align="center">{$item.fecha|date_format:"%k:%M:%S"}</td>
        <td align="center">{$item.user}</td>
        <td align="center">{$item.module}</td>
        <td align="center">{$item.action}</td>
        <td align="center">{if $item.itemId}ID = {$item.itemId}{else}{$item.description}{/if}</td>
    </tr>
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}