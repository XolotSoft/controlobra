<table width="80%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" height=""><div align="center">Cuenta</div></td>
  <td align="center" width="110"><div align="center">Cantidad</div></td>  
  <td align="center" width="110"><div align="center">No. Cheque</div></td>
  <td align="center" width="80"><div align="center">Acciones</div></td>
</tr>
{foreach from=$cheques item=item key=key}
<tr>
  <td align="center" height="30">
  	<div align="center">
  		{include file="{$DOC_ROOT}/templates/lists/enumBankCancel.tpl"}
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="quantity[{$key}]" id="quantity_{$key}" value="{$item.quantity}" style="width:80px" />
  		<input type="hidden" name="idContCheques[{$key}]" value="{$item.contChequeId}" />
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="noCheque[{$key}]" id="noCheque_{$key}" value="{$item.noCheque}" style="width:80px" />
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		<a href="javascript:void(0)">
  		<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelCheque({$key})" />
        </a>
  	</div>
  </td>
</tr>
{foreachelse}
<tr>
	<td colspan="4" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>