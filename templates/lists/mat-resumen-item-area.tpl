{foreach from=$iT.areas item=iA key=kA}
<tr id="area-{$iT.projItemId}" class="fila-{$iT.projItemId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
	<td align="left" colspan="{if $showPrecio}10{else}7{/if}">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows('{$iT.projItemId}-{$iA.projTypeId}')">
                <div id="icon_{$iT.projItemId}-{$iA.projTypeId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {$iA.name}
        </div> 
    </td>    
</tr>

{include file="{$DOC_ROOT}/templates/lists/mat-resumen-item-cat.tpl"}

{if $showPrecio}
    <tr id="area-{$iT.projItemId}-{$iA.projTypeId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}">
        <td style="border-bottom:1px solid #FFFFFF"></td>
        <td align="left" colspan="{if $showPrecio}8{else}5{/if}"><b>TOTAL {$iA.name}</b></td>	
        <td align="right"><b>${$iA.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td align="center">
        {if $item.total >0}
            {assign var="totRes" value="{($iA.total/$item.total) * 100}"}
            {$totRes|number_format:2:'.':','}
        {else}
            0.00
        {/if}
        </td>
    </tr>
{/if}

{/foreach}