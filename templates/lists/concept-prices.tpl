<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width="20"><div align="center">D</div></td>
  <td align="center" height=""><div align="center">Contratista</div></td>
  <td align="center" width="100"><div align="center">Precio Unitario</div></td>
  <td align="center" width="90"><div align="center">Iva</div></td>
  <td align="center" width="100"><div align="center">Total</div></td>
  <td align="center" width="110"><div align="center">Fecha</div></td>
  <td align="center" width="60"><div align="center">Acci&oacute;n</div></td>
</tr>
{foreach from=$conceptPrices item=item key=key}
<tr>
  <td><input type="radio" name="supMain" id="supMain" value="{$key}" {if $item.supMain == 1}checked{/if} /></td>
  <td align="center" height="30"><div align="center">
  {include file="{$DOC_ROOT}/templates/lists/enumConceptSupplier.tpl"}
  </div></td>
  <td align="center"><div align="center">
  <input type="text" class="smallInput" name="precios[{$key}]" id="precios_{$key}" value="{$item.precio}" style="width:80px" onchange="UpdateTotal({$key})" />
  <input type="hidden" name="idConceptPrices[{$key}]" value="{$item.conceptPriceId}" />
  </div></td>
  <td align="center"><div align="center">
  {include file="{$DOC_ROOT}/templates/lists/enumConceptIva.tpl"}
  </div></td>
  <td align="center"><div align="center">
  <input type="text" class="smallInput" name="totals[{$key}]" id="totals_{$key}" value="{$item.total}" style="width:80px; background-color:#F0F0F0" readonly="readonly" />
  </div></td>
  <td align="center"><div style="float:left">
  <input type="text" class="smallInput" name="fechas[{$key}]" id="fechaP_{$key}" value="{$item.fecha}" maxlength="10" readonly="readonly" style="width:80px" />
  </div>
  <div style="float:left">
  <a href="javascript:void(0)" onclick="NewCal('fechaP_{$key}','ddmmyyyy')">
  <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
  </div>
  </td>
  <td align="center"><div align="center">
  <a href="javascript:void(0)" onclick="">
  <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelPrice({$key})" /></a>
  </div></td>
</tr>
{foreachelse}
<tr>
	<td colspan="7" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>