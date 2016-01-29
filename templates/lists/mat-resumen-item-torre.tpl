{foreach from=$item.torres item=iT key=kT}
<tr>
	<td align="left" colspan="{if $showPrecio}11{else}8{/if}">
    	<div style="float:left; width:20px;">  
            <a href="javascript:void(0)" onclick="ToggleRows({$iT.projItemId})">
                <div id="icon_{$iT.projItemId}">[-]</div>
            </a>
        </div>
        <div style="float:left; width:70px; text-align:left">
        {$iT.name}
        </div> 
    </td>	
</tr>

{include file="{$DOC_ROOT}/templates/lists/mat-resumen-item-area.tpl"}

{if $showPrecio}
<tr id="torre-{$iT.projItemId}" class="fila-{$iT.projItemId}">
	<td align="left" colspan="{if $showPrecio}9{else}6{/if}"><b>TOTAL {$iT.name}</b></td>
    <td align="right"><b>${$iT.total|number_format:2:'.':','}</b>&nbsp;</td>
    <td align="center">
    {if $item.total >0}
    	{assign var="totRes" value="{($iT.total/$item.total) * 100}"}
    	{$totRes|number_format:2:'.':','}
    {else}
    	0.00
    {/if}
    </td>
</tr>
{/if}

{/foreach}