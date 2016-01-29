<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
{foreach from=$enumCajones item=item key=key}
<tr>
  <td align="left" height="30">
  {include file="{$DOC_ROOT}/templates/lists/enumCajonesEst.tpl"}
  </td>
  <td align="center" width="50"><div align="center">
  <a href="javascript:void(0)" onclick="DelCajon({$key})">
  <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar Caj&oacute;n" /></a>
  </div></td>
</tr>
{foreachelse}
<tr>
	<td colspan="2" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>