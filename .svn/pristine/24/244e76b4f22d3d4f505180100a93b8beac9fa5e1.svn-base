{foreach from=$iP.subpartidas item=iSp key=kSp}
<tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
	<td align="left" colspan="{if $showPrecio}8{else}5{/if}">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows('{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}')">
                <div id="icon_{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {if $iSp.name == "0"}---{else}{$iSp.name}{/if}
        </div> 
    </td>
</tr>

{include file="{$DOC_ROOT}/templates/lists/material-area-gastos-concept.tpl"}

{if $showPrecio}
    <tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}">
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td align="left" colspan="{if $showPrecio}6{else}3{/if}"><b>TOTAL {if $iSp.name == "0"}---{else}{$iSp.name}{/if}</b></td>    
        <td align="right"><b>${$iSp.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td align="center">
            {assign var="totRes" value="{($iSp.total/$item.total) * 100}"}
            {$totRes|number_format:2:'.':','}
        </td>
    </tr>
{/if}

{/foreach}