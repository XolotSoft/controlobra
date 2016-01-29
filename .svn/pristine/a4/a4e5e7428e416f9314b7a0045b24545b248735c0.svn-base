<table width="80%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" height=""><div align="center"><b>Cuenta</b></div></td>
  <td align="center" width="110"><div align="center"><b>Cantidad</b></div></td>  
  <td align="center" width="110"><div align="center"><b>No. Cheque</b></div></td>
</tr>
{foreach from=$cheques item=item key=key}
<tr>
  <td align="center" height="30">
  	<div align="center">
  		{$item.bank}
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		${$item.quantity}
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		{$item.noCheque}
  	</div>
  </td>  
</tr>
{foreachelse}
<tr>
	<td colspan="3" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>