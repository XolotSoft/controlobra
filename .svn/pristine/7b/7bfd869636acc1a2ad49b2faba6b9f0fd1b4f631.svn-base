{foreach from=$iA.partidas item=iP key=kP}
<tr id="cat-{$iT.projItemId}-{$iA.projTypeId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
	<td align="left" colspan="{if $showPrecio}9{else}6{/if}">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows('{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}')">
                <div id="icon_{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {$iP.name}
        </div> 
    </td>       
</tr>

{include file="{$DOC_ROOT}/templates/lists/concept-area-gastos-item-subcat.tpl"}

{if $showPrecio}
    <tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}">
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td align="left" colspan="{if $showPrecio}7{else}4{/if}"><b>TOTAL {$iP.name}</b></td>
        <td align="right"><b>${$iP.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td align="center">
            {assign var="totRes" value="{($iP.total/$item.total) * 100}"}
            {$totRes|number_format:2:'.':','}
        </td>
    </tr>
{/if}

{/foreach}