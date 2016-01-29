{foreach from=$iC.descripciones item=iD key=kD}
<tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
	<td align="left">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows('{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}-{$iD.conceptId}')">
                <div id="icon_{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}-{$iD.conceptId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {$iD.name}
        </div> 
    </td>
    <td align="center">{$iD.cantidad|number_format:2:'.':','}</td>
    <td align="center">{$iD.unit}</td>
    {if $showPrecio}
    <td align="center">${$iD.price|number_format:2:'.':','}</td>
    <td align="right">${$iD.total|number_format:2:'.':','}&nbsp;</td>
    <td align="center">
    	{assign var="totDes" value="{($iD.total/$item.total) * 100}"}
    	{$totDes|number_format:2:'.':','}
    </td>
    {/if}
</tr>

{include file="{$DOC_ROOT}/templates/lists/concept-resumen-item-materiales.tpl"}

{/foreach}