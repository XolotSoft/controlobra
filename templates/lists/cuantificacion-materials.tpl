<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width=""><div align="center">Material</div></td>
  <td align="center" width="70"><div align="center">Traslape</div></td>
  <td align="center" width="70"><div align="center">Bulbos</div></td>
  <td align="center" width="70"><div align="center">Cantidad</div></td>
  <td align="center" width="80"><div align="center">Mts. Lin.</div></td>
  <td align="center" width="80"><div align="center">Peso (Kg)</div></td>
  <td align="center" width="80"><div align="center">Total Peso</div></td>
  <td align="center" width="50"><div align="center">Acci&oacute;n</div></td>
</tr>
{foreach from=$matsAcero item=item key=key}
<tr>
  <td align="center">
  <div id="listMaterial_{$key}" align="center">{include file="{$DOC_ROOT}/templates/lists/enumMaterialAcero.tpl"}</div>
  </td>  
  <td align="center"><div align="center" id="divTraslapes_{$key}" {if $item.bulbos > 0}style="display:none"{/if}>
  <input type="text" class="smallInput" name="traslapes[{$key}]" id="traslapes_{$key}" value="{$item.traslape}" maxlength="10" style="width:40px" onblur="UpdateWeight({$key})" />
  <input type="hidden" name="traslapeVal[{$key}]" id="traslapeVal_{$key}" value="{$item.traslapeVal}" />
  </div>
  </td>
  <td align="center"><div align="center" id="divBulbos_{$key}" {if $item.traslape > 0}style="display:none"{/if}>
  <input type="text" class="smallInput" name="bulbos[{$key}]" id="bulbos_{$key}" value="{$item.bulbos}" maxlength="10" style="width:40px" onblur="UpdateTotalWeight({$key})" />
  </div>
  </td>
  <td align="center"><div align="center">
  <input type="text" class="smallInput" name="quantity[{$key}]" id="quantity_{$key}" value="{$item.quantity}" maxlength="10" style="width:40px" onblur="UpdateTotalWeight({$key})" />
  <input type="hidden" name="idCuanMat[{$key}]" value="{$item.cuantMatId}" />
  </div>
  </td>
  <td align="center"><div align="center">
  <input type="text" class="smallInput" name="mtoLineal[{$key}]" id="mtoLineal_{$key}" value="{$item.mtoLineal}" maxlength="10" style="width:50px" onblur="UpdateWeight({$key})" />
  </div>
  </td>
  <td align="center"><div id="txtWeight_{$key}" align="center">{$item.weight}</div>
  <input type="hidden" name="weight[{$key}]" id="weight_{$key}" value="{$item.weight}" />
  </td>
  <td align="center"><div id="txtTotalWeight_{$key}" align="center">{$item.totalWeight}</div>
  <input type="hidden" name="totalWeight[{$key}]" id="totalWeight_{$key}" value="{$item.totalWeight}" />
  </td>
  <td align="center"><div align="center">
  <a href="javascript:void(0)" onclick="">
  <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelMaterial({$key})" /></a>
  </div></td>
</tr>
{foreachelse}
<tr>
	<td colspan="8" align="center" height="40"><div align="center">Ning&uacute;n registro encontrado.</div></td>
</tr>
{/foreach}
</table>