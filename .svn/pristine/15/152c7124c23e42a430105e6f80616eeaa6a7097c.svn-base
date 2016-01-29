{foreach from=$itm.deptos item=itD key=kD}
    <tr>     
        <td align="center" height="40"> >>> </td>        
        <td align="center">{$itD.type}</td>
        <td align="center">{$itD.name}</td>        
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteDeptoPopup({$itD.projDeptoId})" title="Eliminar Depto."/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditDeptoPopup({$itD.projDeptoId})" title="Editar Depto."/>
        </td>
    </tr>       
{foreachelse}
<tr><td colspan="3" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}