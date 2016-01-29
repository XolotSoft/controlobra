{foreach from=$units.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>       
        <td align="center">{$item.clave}</td>
        <td>&nbsp;{$item.name}</td>
        <td align="center">{if $item.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.unitId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.unitId}" title="Editar"/>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}