<table width="100%" cellpadding="0" cellspacing="0" border="1" class="tblNoBorder tblCollapse">
{foreach from=$item.categories item=itC key=kS}
<tr>
	<td width="30" align="center" class="colR">  
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.projectId},{$itC.categoryId})">
        	<div id="iconSubcat_{$item.projectId}_{$itC.categoryId}">[-]</div>
        </a>
    </td>
    <td align="left" class="colR" height="25" colspan="4">&nbsp;
    	<a href="javascript:void(0)" onclick="ViewSubcats({$item.projectId},{$itC.categoryId})">{$itC.name}</a>
    </td>
    <td width="76" class="colR"></td>
    <td width="56" class="colR"></td>    
</tr>

<tr id="subcats_{$item.projectId}_{$itC.categoryId}">
    <td colspan="7" bgcolor="#FFFFFF" class="colB">    
    	{include file="{$DOC_ROOT}/templates/lists/concept-resumen-subcat2.tpl"}
    </td>
</tr>

<tr>
    <td colspan="7" bgcolor="#FFFFFF">&nbsp;</td>
</tr>

{foreachelse}
<tr>
	<td width="30" align="center" class="colTR2BL">  
    	>
    </td>
    <td align="left" class="colTRB" height="25" colspan="6">&nbsp;
		Ning&uacute;n registro encontrado.
    </td>
</tr>
{/foreach}
</table>