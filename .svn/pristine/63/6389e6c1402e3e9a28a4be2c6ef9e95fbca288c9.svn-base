{foreach from=$personals.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>       
        <td>&nbsp;{$item.name}</td>
        <td align="center">{$item.username}</td>
        <td align="center">{if $item.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.personalId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.personalId}" title="Editar"/>
            <img src="{$WEB_ROOT}/images/icons/key.png" class="spanPass" id="{$item.personalId}" title="Contrase&ntilde;a"/>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}