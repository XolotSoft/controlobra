{foreach from=$it.levels item=itm key=k}
    <tr>     
        <td align="center" height="40"> >> </td>
        <td align="center">{$itm.level}</td>
        <td align="center">{$itm.name}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddDeptoDiv({$itm.projLevelId})">
        	<img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Depto." />
        </a>
        <a href="javascript:void(0)" onclick="ViewDeptos({$itm.projLevelId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Deptos." />
        </a>
        </td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteLevelPopup({$itm.projLevelId})" title="Eliminar Nivel"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditLevelPopup({$itm.projLevelId})" title="Editar Nivel"/>
        </td>
    </tr>
    
    <tr id="depto_{$itm.projLevelId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="4" align="left" id="contDepto_{$itm.projLevelId}">
    {include file="{$DOC_ROOT}/templates/lists/project-depto.tpl"}
    </td></tr>
    
{foreachelse}
<tr><td colspan="4" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}