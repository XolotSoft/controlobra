<table width="40%" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center" width="110"><b>Fecha Entrega</b></td>
    <td align="center" width="110"><b>Status</b></td>
</tr>
<tr>   
    <td align="center">
    	<select name="vFechaEntrega" id="vFechaEntrega" class="smallInput" onchange="Refresh()">
        <option value="">Seleccione</option>
        <option value="2" {if $info.fechaEntrega == "2"}selected{/if}>No Asignada</option>
        <option value="1" {if $info.fechaEntrega == "1"}selected{/if}>Asignada</option>
        </select>
    </td>
    <td align="center">
        <select name="vStatus" id="vStatus" class="smallInput" onchange="Refresh()">
        <option value="">Seleccione</option>
        <option value="NoEnviado" {if $info.status == "NoEnviado"}selected{/if}>No Enviado</option>
        <option value="Enviado" {if $info.status == "Enviado"}selected{/if}>Enviado</option>
        </select>
    </td>
</tr>
</table>