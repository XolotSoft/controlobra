{foreach from=$item.subcategories item=it key=ky}
    <tr>     
        <td height="40" align="center"> > </td>
        <td>&nbsp;{$it.name}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="AddConceptDiv({$it.subcategoryId})">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Concepto" />
        </a>
        <a href="javascript:void(0)" onclick="ViewConcept({$it.subcategoryId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Conceptos" />
        </a>
        </td>
        <td align="center">{if $it.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteSubcategoryPopup({$it.subcategoryId})" title="Eliminar Subpartida"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditSubcategoryPopup({$it.subcategoryId})" title="Editar Subpartida"/>
        </td>
    </tr>
    
    <tr id="concept_{$it.subcategoryId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="4" align="left" id="contConcept_{$it.subcategoryId}">
    {include file="{$DOC_ROOT}/templates/lists/concept-concept.tpl"}
    </td></tr>
        
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}