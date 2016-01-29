<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itD.materials item=itM key=kM}
<tr>
	<td width="30" class="colRB"></td>
    <td width="96" class="colB"></td>
    <td width="96" class="colB"></td>
    <td width="96" class="colB"></td>
    <td width="25" class="colRB" align="center"> > </td>
    <td width="" class="colRB" height="25">&nbsp;
    	{$itM.material}
    </td>
    <td width="76" class="colB" align="center">{$itM.quantity|number_format:2:'.':','}</td>
    <td width="56" class="col" align="center">{$itM.unit}</td>
    <td width="76" class="col" align="center">{$itM.price}</td>
    <td width="100" class="col" align="right">${$itM.total|number_format:2:'.':','}&nbsp;</td>
    <td width="50" align="center">
    	{assign var="totMat" value="{($itM.total/$item.total) * 100}"}
        {$totMat|number_format:2:'.':','}        
    </td>
</tr>
{foreachelse}
<tr>
	<td width="30" class="colR2"></td>
    <td width="96" class="colR"></td>
    <td width="96" class="colR"></td>
    <td width="96" class="colR"></td>
    <td width="25" class="colR2B" align="center"> > </td>
    <td width="" class="colRB" height="25" colspan="5">&nbsp;
    	Ning&uacute;n registro encontrado.
    </td>  
</tr>
{/foreach}
</table>