{foreach from=$it.subtypes item=is key=ky}
    <tr>        
        <td align="right">{$is.name}&nbsp;</td>
        <td align="center">{if $is.redondeo > 0}{$is.redondeo}{else}--{/if}</td>
        <td align="center">{if $is.comunArea > 0}{$is.comunArea}{else}--{/if}</td>
        <td align="center">{if $is.realArea > 0}{$is.realArea}{else}--{/if}</td>
        <td align="center">{if $is.ventaArea > 0}{$is.ventaArea}{else}--{/if}</td>
        <td align="center">{if $is.terrazaReal > 0}{$is.terrazaReal}{else}--{/if}</td>
        <td align="center">{if $is.terrazaComun > 0}{$is.terrazaComun}{else}--{/if}</td>
        <td align="center">{if $is.jardinReal > 0}{$is.jardinReal}{else}--{/if}</td>
        <td align="center">{if $is.jardinComun > 0}{$is.jardinComun}{else}--{/if}</td>
        <td align="center">
       <div style="border: 1px solid #000000; width:11px; height:11px; background-color:{$is.color};"></div>
        </td>
        <td height="40" align="center">{if $is.abierta}S&iacute;{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanLink" onclick="DeleteSubTypePopup({$is.projSubTypeId})" title="Eliminar SubTipo de Area"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanLink" onclick="EditSubTypePopup({$is.projSubTypeId})" title="Editar SubTipo de Area"/>
        </td>
    </tr>        
{foreachelse}
<tr><td colspan="12" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}