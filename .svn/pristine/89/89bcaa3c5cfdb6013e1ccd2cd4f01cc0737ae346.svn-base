<table width="100%" cellpadding="0" cellspacing="0" border="1" class="boxTable" id="tblEjes">
 <thead>
    <tr>
        <th class="tblTh">Cantidad</th>
        <th class="tblTh">Moneda</th>              
        <th class="tblTh" width="60">Accion</th>
  </tr>
</thead>
<tbody>
{foreach from=$mtoMant item=item key=key}
	<tr>       
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small2" name="qtyMant[{$key}]" id="" type="text" size="50" value="{$item.quantity}" onblur="SaveMontoMant()" />
        <input type="hidden" name="idProjMant[{$key}]" value="{$item.projMantId}" />
        </td>
        <td align="center" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/enumCurrencyMant.tpl"}
        </td>       
        <td align="center" bgcolor="#FFFFFF">
        <a href="javascript:void(0)" onclick="DelMontoMant({$key})">
        <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" /></a>
        </td>
    </tr>
{foreachelse}
<tr><td align="center" colspan="3" height="30">Ning&uacute;n registro encontrado</td></tr>
{/foreach}
</tbody>
</table>