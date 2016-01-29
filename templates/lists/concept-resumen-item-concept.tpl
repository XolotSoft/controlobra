{foreach from=$iSp.conceptos item=iC key=kC}
<tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
	<td align="left" colspan="{if $showPrecio}7{else}4{/if}">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows('{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}')">
                <div id="icon_{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {if $iC.name == "0"}---{else}{$iC.name}{/if}
        </div> 
    </td>
</tr>

{include file="{$DOC_ROOT}/templates/lists/concept-resumen-item-descripcion.tpl"}

{if $showPrecio}
    <tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}">
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td align="left" colspan="{if $showPrecio}5{else}2{/if}"><b>TOTAL {if $iC.name == "0"}---{else}{$iC.name}{/if}</b></td>    
        <td align="right"><b>${$iC.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td align="center">
            {assign var="totRes" value="{($iC.total/$item.total) * 100}"}
            {$totRes|number_format:2:'.':','}
        </td>
    </tr>
{/if}

{/foreach}