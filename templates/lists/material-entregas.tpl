<table width="50%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width="100"><div align="center">Cantidad</div></td>  
  <td align="center" width="110"><div align="center">Fecha</div></td>
  <td align="center" width="40">&nbsp;</td>
</tr>
{foreach from=$entregas item=item key=key}
<tr>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="quantity[{$key}]" id="quantity_{$key}" value="{$item.quantity}" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div style="float:left">
  		<input type="text" class="smallInput" name="fechas[{$key}]" id="fechaP_{$key}" value="{$item.fecha}" maxlength="10" readonly="readonly" style="width:80px" />
  	</div>
  	<div style="float:left">
  		<a href="javascript:void(0)" onclick="NewCal('fechaP_{$key}','ddmmyyyy')">
  			<img src="{$WEB_ROOT}/images/icons/calendar.gif" />
        </a>
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<a href="javascript:void(0)">
  		<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelEntrega({$key})" />
        </a>
  	</div>
  </td>
</tr>
{foreachelse}
<tr>
	<td colspan="3" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>