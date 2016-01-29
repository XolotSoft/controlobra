{foreach from=$projects.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>       
        <td>&nbsp;{$item.name}</td>
        <td align="center">
            <a href="javascript:void(0)" onclick="AddTypeDiv({$item.projectId})">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Tipo de Area" />
            </a>
            <a href="javascript:void(0)" onclick="ViewTypes({$item.projectId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Tipos de Area" />
            </a>
        </td>
        <td align="center">
            <a href="javascript:void(0)" onclick="AddItemDiv({$item.projectId})">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Torre" />
            </a>
            <a href="javascript:void(0)" onclick="ViewItems({$item.projectId})">
                <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Torres" />
            </a>
        </td>
        <td align="center">
            <a href="{$WEB_ROOT}/project-ejes/projectId/{$item.projectId}">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
            </a>
        </td>
        <td align="center">
            <a href="{$WEB_ROOT}/project-cajybod/projectId/{$item.projectId}">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
            </a>
        </td>
        <td align="center">
            <a href="{$WEB_ROOT}/project-montos/projectId/{$item.projectId}">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
            </a>
        </td>        
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.projectId}" title="Eliminar Proyecto"/>
            <a href="{$WEB_ROOT}/project-edit/projId/{$item.projectId}">
            <img src="{$WEB_ROOT}/images/icons/edit.gif" title="Editar Proyecto" border="0"/></a>
            <a href="{$WEB_ROOT}/project-img/projId/{$item.projectId}">
            <img src="{$WEB_ROOT}/images/icons/picture.png" title="Editar Imagen" border="0"/></a>
            <a href="javascript:void(0)" onclick="EditAddressDiv({$item.projectId})">
            <img src="{$WEB_ROOT}/images/icons/house.png" title="Editar Direcci&oacute;n de Entrega" border="0"/></a>
        </td>
    </tr>
    
    <tr id="type_{$item.projectId}" style="display:none">
    <td colspan="8" align="left">
    <div id="contType_{$item.projectId}">
    	{include file="{$DOC_ROOT}/templates/lists/project-type.tpl"}
    </div>
    </td></tr>
    
    <tr id="item_{$item.projectId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="left">
    <div id="contItem_{$item.projectId}">
    	{include file="{$DOC_ROOT}/templates/lists/project-item.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}