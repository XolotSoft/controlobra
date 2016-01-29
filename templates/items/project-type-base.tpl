{foreach from=$item.types item=it key=ky}
    <tr>        
        <td align="left">&nbsp;<a href="javscript:void(0)" onclick="ShowSubTypes({$it.projTypeId})">{$it.name}</a></td>
        <td align="center">{if $it.redondeo > 0}{$it.redondeo}{else}--{/if}</td>
        <td align="center">{if $it.comunArea > 0}{$it.comunArea}{else}--{/if}</td>
        <td align="center">{if $it.realArea > 0}{$it.realArea}{else}--{/if}</td>
        <td align="center">{if $it.ventaArea > 0}{$it.ventaArea}{else}--{/if}</td>
        <td align="center">{if $it.terrazaReal > 0}{$it.terrazaReal}{else}--{/if}</td>
        <td align="center">{if $it.terrazaComun > 0}{$it.terrazaComun}{else}--{/if}</td>
        <td align="center">{if $it.jardinReal > 0}{$it.jardinReal}{else}--{/if}</td>
        <td align="center">{if $it.jardinComun > 0}{$it.jardinComun}{else}--{/if}</td>
        <td align="center">
       <div style="border: 1px solid #000000; width:11px; height:11px; background-color:{$it.color};"></div>
        </td>
        <td height="40" align="center">{if $it.abierta}S&iacute;{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/add.png" class="spanLink" onclick="AddSubTypePopup({$it.projTypeId})" title="Agregar SubTipo de Area"/>
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteTypePopup({$it.projTypeId})" title="Eliminar Tipo de Area"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditTypePopup({$it.projTypeId})" title="Editar Tipo de Area"/>
        </td>
    </tr>
    
    <tr>
    	<td colspan="12">
        <div id="listSubtipo_{$it.projTypeId}" style="display:none">
        	{include file="{$DOC_ROOT}/templates/lists/project-subtype.tpl"}
        </div>
        </td>
    </tr>
        
{foreachelse}
<tr><td colspan="12" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}