{foreach from=$item.items item=it key=ky}
    <tr>
        <td height="40" align="center"> > </td>
        <td align="left">&nbsp;{$it.name}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddLevelDiv({$it.projItemId})">
        <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Nivel" />
        </a>
        <a href="javascript:void(0)" onclick="ViewLevels({$it.projItemId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Niveles" />
        </a>
        </td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteItemPopup({$it.projItemId})" title="Eliminar Torre"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditItemPopup({$it.projItemId})" title="Editar Torre"/>
        </td>
    </tr>
    
    <tr id="level_{$it.projItemId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="3" align="left" id="contLevel_{$it.projItemId}">
    {include file="{$DOC_ROOT}/templates/lists/project-level.tpl"}
    </td></tr>
    
{foreachelse}
<tr><td colspan="4" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}