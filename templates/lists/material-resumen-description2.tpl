<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.descriptions item=itD key=kD}
<tr>
	<td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="96" class="colB"></td>
    <td width="70" class="colRB"></td>    
    <td width="25" class="colB"></td>
    <td class="col" align="left" height="25">&nbsp;    	
		> {$itD.name}
    </td>    
    <td width="76" class="col" align="center">{$itD.cantidad|number_format:2:'.':','}</td>
    <td width="56" class="col" align="center">{$itD.unit}</td>   
</tr>

{foreachelse}
<tr>
	<td width="30" class="colR2"></td>
    <td width="96" class="colR"></td>
    <td width="96" class="colR"></td>
    <td width="70" class="colR2"></td>    
    <td width="25" class="colR"></td>
    <td class="colRB" align="left" height="25" colspan="4">&nbsp;
 		> Ning&uacute;n registro encontrado.   	
    </td>    
</tr>
{/foreach}
</table>