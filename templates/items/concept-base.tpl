{foreach from=$concepts.items item=item key=key}
    <tr>               
        <td align="center" height="40">{$item.tipo}</td>
        <td align="center">{$item.category}</td>
        <td align="center">{if $item.subcategory}{$item.subcategory}{/if}</td>
        <td align="center">{if $item.concept}{$item.concept}{/if}</td>
        <td>&nbsp;{$item.name}</td>
        <td align="center">{if $item.unit}{$item.unit}{/if}</td>
        <td align="center">
        {if $item.tipo == "Obra"}              
        <a href="javascript:void(0)" onclick="ViewMaterial({$item.conceptId})">
        <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Materiales" /></a>
        {/if}
        
        {if $item.tipo == "Subcontrato"}              
        <a href="javascript:void(0)" onclick="ViewPrice({$item.conceptId})">
        <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Precios" /></a>
        {/if}
        </td>      
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.conceptId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.conceptId}" title="Editar"/>
        </td>
    </tr>
       
    <tr id="mat_{$item.conceptId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="right">
    {include file="{$DOC_ROOT}/templates/lists/concept-material.tpl"}
    </td></tr>
    
    <tr id="price_{$item.conceptId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="7" align="right">
    {include file="{$DOC_ROOT}/templates/lists/concept-price.tpl"}
    </td></tr>
   
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}