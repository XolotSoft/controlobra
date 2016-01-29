{foreach from=$types.items item=item key=key}
    <tr>
        <td align="center" height="40">{$item.typeId}</td>       
        <td>&nbsp;{$item.name}</td>
        <td align="center">{$item.comunArea}</td>
        <td align="center">{$item.realArea}</td>
        <td align="center">{$item.totalArea}</td>
        <td align="center">{if $item.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.typeId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.typeId}" title="Editar"/>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}