<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="type" id="type" value="searchCheques" />
<table width="100%" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center" width="150"><b>Tipo</b></td>
    <td align="center" width="150"><b>No. Cheque</b></td>
    <td align="center" width="180"><b>Cuenta</b></td>
    <td align="center" width="150"><b>Status Factura</b></td>
    <td align="center" width=""><b>No. Factura</b></td>
    
</tr>
<tr>
    <td align="center">
    <select name="vSeccion" id="vSeccion" class="smallInput">
    <option value="">Todos</option>
    <option value="R">R</option>
    <option value="E">E</option>
    </select>
    </td>
    <td align="center">
    	<input type="text" class="smallInput" name="vNoCheque" id="vNoCheque" style="width:70px" />
    </td>
    <td align="center">
        <select name="vBankId" id="vBankId" class="smallInput">
        <option value="{$item.bankId}">Todos</option>
        {foreach from=$banks item=item key=key}
        <option value="{$item.bankId}">{$item.name}</option>
        {/foreach}
        </select>
    </td>
    <td align="center">
    	<select name="stFactura" id="stFactura" class="smallInput">
        <option value="">Todos</option>
        <option value="Facturado">Facturados</option>
        <option value="NoFacturado">No Facturados</option>
        </select>
    </td>
    <td align="center">
        <input type="text" class="smallInput" name="vNoFactura" id="vNoFactura" style="width:70px" />
    </td>       
</tr>

<tr>
	<td align="center"><b>Fecha Inicial</b></td>
    <td align="center"><b>Fecha Final</b></td>
	<td align="center"><b>Status</b></td>
    <td align="center"><b>Estado</b></td>
    <td align="center"><b>Proveedor</b></td>        
</tr>
<tr>
	<td align="center">
    	<div style="float:left; padding-left:30px">
        <input type="text" class="smallInput" name="vFechaIni" id="vFechaIni" style="width:70px" maxlength="10" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('vFechaIni','ddmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </td>
    <td align="center">
    	<div style="float:left; padding-left:20px">
        <input type="text" class="smallInput" name="vFechaFin" id="vFechaFin" style="width:70px" maxlength="10" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('vFechaFin','ddmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
    </td> 
    <td align="center">
        <select name="vStatus" id="vStatus" class="smallInput">
        <option value="">Todos</option>
        <option value="Activo">Activo</option>
        <option value="Cancelado">Caancelado</option>
        </select>
    </td>
    <td align="center">
        <select name="vEstado" id="vEstado" class="smallInput">
        <option value="">Todos</option>
        <option value="Emitido">Emitido</option>
        <option value="Recogido">Recogido</option>
        <option value="Cobrado">Cobrado</option>
        </select>
    </td>
    <td align="center">
    	<select name="vSupplierId" id="vSupplierId" class="smallInput">
        <option value="">Todos</option>
        {foreach from=$suppliers item=item key=key}
        <option value="{$item.supplierId}">{$item.name}</option>
        {/foreach}
        </select>
    </td>
</tr>

<tr><td colspan="5" height="10"></td></tr>
<tr>
    <td align="center" colspan="5">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchCheques()" />
    </td>
</tr>
</table>
</form>