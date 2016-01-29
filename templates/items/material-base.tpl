{foreach from=$materials.items item=item key=key}
    <tr>      
        <td align="center" height="40">{$item.noCat}</td>
        <td align="center">{$item.category}</td>
        <td align="center">{if $item.subcategory}{$item.subcategory}{/if}</td>
        <td align="center">{if $item.concept}{$item.concept}{/if}</td>
        <td>&nbsp;{$item.name}</td>
        <td align="center">{if $item.unit}{$item.unit}{/if}</td>
        <td align="center">{$item.waste}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="ViewPrices({$item.materialId})">
        <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Precios" />
        </a>
        </td>        
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.materialId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.materialId}" title="Editar"/>
        </td>
    </tr>
   
    <tr id="prices_{$item.materialId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="left">
    {include file="{$DOC_ROOT}/templates/lists/material-price.tpl"}
    </td></tr>
       
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}