<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" height=""><div align="center">Nombre</div></td>
  <td align="center" width="135"><div align="center">Puesto</div></td>  
  <td align="center" width="135"><div align="center">Tel&eacute;fono</div></td>
  <td align="center" width="135"><div align="center">Email</div></td>
  <td align="center" width="40">&nbsp;</td>
</tr>
{foreach from=$contacts item=item key=key}
<tr>
  <td align="center" height="30">
  	<div align="center">
  		<input type="text" class="smallInput" name="nombres[{$key}]" id="nombres_{$key}" value="{$item.name}" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="puestos[{$key}]" id="puestos_{$key}" value="{$item.puesto}" style="width:80px" />
  		<input type="hidden" name="idSupConts[{$key}]" value="{$item.supContId}" />
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="telefonos[{$key}]" id="telefonos_{$key}" value="{$item.phone}" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="emails[{$key}]" id="emails_{$key}" value="{$item.email}" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<a href="javascript:void(0)">
  		<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" onclick="DelContact({$key})" />
        </a>
  	</div>
  </td>
</tr>
{foreachelse}
<tr>
	<td colspan="5" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
{/foreach}
</table>