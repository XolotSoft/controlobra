<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center" width=""><div align="center"><b>Producto</b></div></td>  
  	<td align="center" width="80"><div align="center"><b>Solicitado</b></div></td>
    <td align="center" width="80"><div align="center"><b>Recibido</b></div></td>
    <td align="center" width="60"><div align="center"><b>Saldo</b></div></td>
    <td align="center" width="80"><div align="center"><b>Cantidad</b></div></td>  
  	<td align="center" width="100"><div align="center"><b>Fecha</b></div></td>  	
</tr>
{foreach from=$materials item=item key=key}
<tr>
	<td align="center">&nbsp;{$item.name}</td>
    <td align="center"><div align="center">{$item.quantity}</div></td>
    <td align="center"><div align="center">{$item.recibido}</div></td>
    <td align="center">
    	<div align="center">{$item.saldo}</div>
    	<input type="hidden" name="saldo_{$item.ordBuyItemId}" value="{$item.saldo}" />
    </td>
  	<td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="quantity_{$item.ordBuyItemId}" style="width:60px" />
  	</div>
  </td>
  <td align="center">
  	<div style="float:left">
  		<input type="text" class="smallInput" name="fecha_{$item.ordBuyItemId}" id="fecha_{$item.ordBuyItemId}" maxlength="10" readonly="readonly" style="width:70px" />
  	</div>
  	<div style="float:left">
  		<a href="javascript:void(0)" onclick="NewCal('fecha_{$item.ordBuyItemId}','ddmmyyyy')">
  			<img src="{$WEB_ROOT}/images/icons/calendar.gif" />
        </a>
  	</div>
  </td>  
</tr>
{foreachelse}
<tr>
	<td colspan="6" align="center" height="30">
	<div align="center">Ning&uacute;n registro encontado.</div>
	</td>
</tr>
{/foreach}
</table>