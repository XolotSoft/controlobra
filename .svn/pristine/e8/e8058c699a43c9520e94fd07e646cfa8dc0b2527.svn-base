<table width="100%" cellpadding="0" cellspacing="0" border="1" class="boxTable" id="tblEjes">
 <thead>
    <tr>
        <th class="tblTh">Nombre</th>              
        <th class="tblTh" width="60">Accion</th>
  </tr>
</thead>
<tbody>	
{foreach from=$cajones item=item key=key}
	<tr>       
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small2" name="cajon[{$key}]" id="" type="text" size="50" value="{$item.name}"/>
        <input type="hidden" name="idCajon[{$key}]" value="{$item.id}" />
        </td>       
        <td align="center" bgcolor="#FFFFFF">
        <a href="javascript:void(0)" onclick="DelCajon({$key})">
        <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" /></a>
        </td>
    </tr>
{foreachelse}
<tr><td align="center" colspan="2" height="30">Ning&uacute;n registro encontrado</td></tr>
{/foreach}
</tbody>
</table>