<table width="80%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width=""><div align="center">Material</div></td>
  <td align="center" width="120"><div align="center">Cantidad</div></td>
  <td align="center" width="100"><div align="center">Acci&oacute;n</div></td>
</tr>
{foreach from=$materiales item=item key=key}
<tr>
  <td align="center">
  <div id="listMaterial_{$key}" align="center">{include file="{$DOC_ROOT}/templates/lists/enumMaterial.tpl"}</div>
  </td>
  <td align="center"><div align="center">
  <input type="text" class="smallInput" name="quantity[{$key}]" value="{$item.quantity}" maxlength="10" style="width:60px" />
  <input type="hidden" name="idConMat[{$key}]" value="{$item.conceptMatId}" />
  </div><div id="unitMat_{$key}" style="float:left;padding-left:5px; padding-top:5px"></div>
  </td>
  <td align="center"><div align="center">
  <a href="javascript:void(0)" onclick="">
  <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelMaterial({$key})" /></a>
  </div></td>
</tr>
{foreachelse}
<tr>
	<td colspan="3" align="center" height="40"><div align="center">Ning&uacute;n registro encontrado.</div></td>
</tr>
{/foreach}
</table>