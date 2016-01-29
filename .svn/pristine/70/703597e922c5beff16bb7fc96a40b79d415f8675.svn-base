{foreach from=$categories.items item=item key=key}
    <tr>
        <td align="center" height="40">{$item.noCat}</td>       
        <td>&nbsp;{$item.name}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddSubcategoryDiv({$item.categoryId})">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Subpartida" />
        </a>
        <a href="javascript:void(0)" onclick="ViewSubcategory({$item.categoryId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Subpartidas" />
        </a>
        </td>
        <td align="center">{if $item.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.categoryId}" title="Eliminar Partida"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.categoryId}" title="Editar Partida"/>
        </td>
    </tr>
 
    <tr id="subcat_{$item.categoryId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="4" align="left">
    <div id="contSubcat_{$item.categoryId}">
    {include file="{$DOC_ROOT}/templates/lists/subcategory.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}