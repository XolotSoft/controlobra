<table width="100%" cellpadding="0" cellspacing="0" border="1" class="tblNoBorder tblCollapse">
{foreach from=$item.categories item=itC key=kS}
<tr>	
    <td align="left" width="106" height="25" bgcolor="#DDD9C4">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.projectId},{$itC.categoryId})">{$itC.name|upper}</a>
    </td>
    <td width="" class="colR" colspan="7"></td>
</tr>

<tr id="subcats_{$item.projectId}_{$itC.categoryId}">
    <td colspan="9" bgcolor="#FFFFFF" class="col">    
    	{* include file="{$DOC_ROOT}/templates/lists/concept-resumen-subcat.tpl" *}xx
    </td>
</tr>

<tr>
    <td align="left" class="colRT" colspan="7" height="20" bgcolor="#A6A6A6">
    &nbsp;<span class="txtTotal">Total {$itC.name}x</span>
    </td>
    <td width="100" class="" bgcolor="#A6A6A6" align="right" colspan="2">
    <span class="txtTotal">${$itC.total|number_format:2:'.':','}</span>&nbsp;
    </td>
</tr>
{foreachelse}
<tr>
	<td width="30" align="center" class="colTR2BL">  
    	>
    </td>
    <td align="left" class="colTRB" height="25" colspan="8">&nbsp;
		Ning&uacute;n registro encontrado.
    </td>
</tr>
{/foreach}
</table>