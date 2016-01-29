<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itS.concepts item=itC key=kC}
<tr>     
    <td align="center" height="40" width="195" bgcolor="#FFFFFF"> >> </td>       
    <td align="center" bgcolor="#FFFFFF">
    	<a href="javascript:void(0)" onclick="ViewCuants({$itC.conceptId})">{$itC.name}</a>
    </td>     
    <td align="center" bgcolor="#FFFFFF" width="95">            
     	<a href="javascript:void(0)" onclick="ViewCuants({$itC.conceptId})">
        	<div id="iconCuant_{$itC.conceptId}">[+]</div>
        </a>
    </td>
</tr>

<tr id="cuant_{$itC.conceptId}" style="display:none">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF">
    	{include file="{$DOC_ROOT}/templates/lists/cuant-cuantificacion.tpl"}
    </td>
</tr>

{foreachelse}
<tr>
    <td align="center" bgcolor="#FFFFFF" width="194"> >> </td>
	<td bgcolor="#FFFFFF" align="center" height="40">Ning&uacute;n concepto encontrado.</td>
</tr>
{/foreach}
</table>