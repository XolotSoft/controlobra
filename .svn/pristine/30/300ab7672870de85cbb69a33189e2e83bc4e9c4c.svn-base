<table width="90%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
<tr>
    <td align="center"><div align="center"><b>No.</b></div></td>
    <td align="center"><div align="center"><b>Monto $</b></div></td>
    <td align="center"><div align="center"><b>Fecha</b></div></td>
    <td align="center"><div align="center"><b>Obs.</b></div></td>
    <td align="center" width="60"><div align="center"><b>Acci&oacute;n</b></div></td>
</tr>
{foreach from=$expiries item=item key=key}
<tr>
    <td align="center"><div align="center">
    <input class="smallInput small" name="noExpiry[{$key}]" type="text" style="width:90px" value="{$item.noExpiry}" /></div>
    <input type="hidden" name="expIds[{$key}]" value="{$item.contExpiryId}" />
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="monto[{$key}]" id="monto_{$key}" type="text" style="width:90px" value="{$item.monto}"  onblur="UpdateSaldoFinal()"/>    
    </div>
    </td>    
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fecha[{$key}]" id="fecha_{$key}" type="text" style="width:90px" value="{$item.fecha}" readonly="readonly" onchange="OrderDocs()"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal2('fecha_{$key}','ddmmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="obs[{$key}]" id="obs_{$key}" type="text" style="width:90px" value="{$item.obs}" />    
    </div>
    </td>
    <td align="center">
    <div align="center">
    <a href="javascript:void(0)" onclick="DelExpiry({$key})">
    <img src="{$WEB_ROOT}/images/icons/action_delete.gif" id="{$key}" title="Eliminar Documento"/></a>
    </div>
    </td>
</tr>
{foreachelse}
<tr><td colspan="5" align="center" height="30"><div align="center">Ning&uacute;n registro encontrado.</div></td></tr>
{/foreach}
</table>