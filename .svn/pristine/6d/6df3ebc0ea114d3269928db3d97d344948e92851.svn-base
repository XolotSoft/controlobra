{foreach from=$it.concepts item=t key=k}
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;{$t.name}</td>
        <td align="center">{if $t.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteConceptPopup({$t.conceptConId})" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditConceptPopup({$t.conceptConId})" title="Editar"/>
        </td>
    </tr>    
{foreachelse}
<tr><td colspan="4" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}