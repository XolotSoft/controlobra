{foreach from=$iD.materiales item=iM key=kM}
<tr id="cat-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}-{$iD.conceptId}" class="fila-{$iT.projItemId}-{$iA.projTypeId}-{$iP.categoryId}-{$iSp.subcategoryId}-{$iC.conceptConId}-{$iD.conceptId}">
	<td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td>
    <td style="border-bottom:1px solid #FFFFFF"></td> 
	<td align="left">{$iM.material}</td>
    <td class="" align="center">{$iM.quantity|number_format:2:'.':','}</td>
    <td class="" align="center">{$iM.unit}</td>
    {if $showPrecio}
    <td class="" align="center">${$iM.price}</td>
    <td class="" align="right">${$iM.total|number_format:2:'.':','}&nbsp;</td>
    <td class="" align="center">
    	{assign var="totMat" value="{($iM.total/$item.total) * 100}"}
        {$totMat|number_format:2:'.':','}
    </td>
    {/if}
</tr>
{/foreach}