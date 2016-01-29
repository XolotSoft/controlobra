<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width="20"><div align="center">D</div></td>
  <td align="center"><div align="center">Proveedor</div></td>
  <td align="center" width="100"><div align="center">Precio Unitario</div></td>  
  <td align="center" width="70"><div align="center">Iva</div></td>
  <td align="center" width="100"><div align="center">Total</div></td>
  <td align="center" width="70"><div align="center">Moneda</div></td>
  <td align="center" width="85"><div align="center">Fecha</div></td>
  <td align="center" width="40">&nbsp;</td>
</tr>
{foreach from=$unitPrices item=item key=key}
<tr>
  <td><input type="radio" name="supMain" id="supMain" value="{$key}" {if $item.supMain == 1}checked{/if} /></td>
  <td align="center" height="30">
  	<div align="center">
  		{include file="{$DOC_ROOT}/templates/lists/enumMatSupplier.tpl"}
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="precios[{$key}]" id="precios_{$key}" value="{$item.precio}" style="width:80px" onchange="UpdateTotal({$key})" />
  		<input type="hidden" name="idMatPrices[{$key}]" value="{$item.matPriceId}" />
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		{include file="{$DOC_ROOT}/templates/lists/enumMatIva.tpl"}
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="totals[{$key}]" id="totals_{$key}" value="{$item.total}" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div align="center">
    	{include file="{$DOC_ROOT}/templates/lists/enumCurrencyMat.tpl"}
    </div>
  </td>
  <td align="center">
  	<div style="float:left">
  		<input type="text" class="smallInput" name="fechas[{$key}]" id="fechaP_{$key}" value="{$item.fecha}" maxlength="10" readonly="readonly" style="width:60px" />
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
  		<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelPrice({$key})" />
        </a>
  	</div>
  </td>
</tr>
{foreachelse}
<tr>
	<td colspan="8" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>