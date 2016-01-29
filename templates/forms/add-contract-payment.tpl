<div id="divForm">
	<form id="addPaymentForm" name="addPaymentForm" method="post">
    <input type="hidden" name="formName" id="formName" value="addPaymentForm" />
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><div align="center">Buscar por</div></td>
        </tr>
        <tr>
        	<td align="center">
            <div align="center">
            <select name="tipo" id="tipo" class="smallInput" onchange="ToogleTipo()">
            <option value="Clte">Cliente</option>
            <option value="Depto">Departamento</option>
            </select>
            </div>
            </td>            
        </tr>
        </table>
        <br />
        
        <div id="tipoClte">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">        
        <tr>
        	<td align="center">Cliente</td>
            <td align="center">* Torre</td>
            <td align="center">* Departamento</td>
        </tr>
        <tr>
        	<td align="center">
				{include file="{$DOC_ROOT}/templates/lists/enumCustomerPay.tpl"}
            </td>
            <td align="center">
                <div id="listItems">
                	{include file="{$DOC_ROOT}/templates/lists/enumProjItemCont.tpl"}
                </div>
            </td>
            <td align="center">
            	<div id="enumAreas">        
                	{include file="{$DOC_ROOT}/templates/lists/enumAreasPay.tpl"}
                </div>
            </td>
        </tr>
        </table>        
        <br />
        </div>
                
        <div id="tipoDepto" style="display:none">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">        
        <tr>        	
            <td align="center">* Torre</td>
            <td align="center">* Departamento</td>
            <td align="center">Cliente</td>
        </tr>
        <tr>        	
            <td align="center">                
                {include file="{$DOC_ROOT}/templates/lists/enumProjItemCont2.tpl"}               
            </td>
            <td align="center">
            	<div id="enumAreas2">        
                	{include file="{$DOC_ROOT}/templates/lists/enumAreasPay2.tpl"}
                </div>
            </td>
            <td align="center">
            	<div id="enumClte">
				<select name="customerId2" id="customerId2" class="smallInput">
                <option value="">Seleccione</option>
                </select>
                </div>
            </td>
        </tr>
        </table>        
        <br />
        </div>
                                
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">* Cantidad</td>
            <td align="center">* Moneda</td>
            <td align="center">* Fecha</td>
        </tr>
        <tr>
        	<td align="center">
				<input class="smallInput small" name="quantity" id="quantity" type="text" size="50" onblur="FormatField('quantity')"/>              
            </td>
            <td align="center">
            	{include file="{$DOC_ROOT}/templates/lists/enumCurrencyPay.tpl"}
            </td>
            <td align="center">
            <div style="float:left">
              <input type="text" class="smallInput" name="fecha" id="fecha" maxlength="10" readonly="readonly" value="{$dateNow}" style="width:80px" />
              </div>
              <div style="float:left">
              <a href="javascript:void(0)" onclick="NewCal('fecha','ddmmyyyy')">
              <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
            </div>
            </td>
        </tr>
        </table>        
        <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>        	
            <td align="center">* Cuenta</td>
            <td align="center"><div id="txtTipoCambio" style="display:none">* Tipo de Cambio</div></td>
            <td align="center"></td>
        </tr>
        <tr>        	
            <td align="center">
            	<div id="enumBanks">
               	{include file="{$DOC_ROOT}/templates/lists/enumBankPay.tpl"}
               	</div>
            </td>            
            <td align="center">
            	<div id="tipoCambio" style="display:none">
            	<input class="smallInput small" name="currencyExchange" id="currencyExchange" type="text" size="50"/>
                </div>
            </td>
            <td align="center">
            <input type="hidden" name="concepto" id="concepto" value="Otros" />            
            </td>            
        </tr>
        </table>        
        <br />
        
        <div id="divObs">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>        	
            <td align="center">* Observaciones</td>
            <td align="center"></td>
            <td align="center"></td>
        </tr>
        <tr>        	
            <td align="center">
            	<textarea name="observaciones" id="observaciones" style="width:200px; height:50px"></textarea>
            </td>
            <td align="center"></td>
            <td align="center"></td>            
        </tr>
        </table>        
        <br />
         </div>
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Saldo Vencido</b></td>
        	<td align="center"><b>Saldo Vigente</b></td>
            <td align="center"><b>Saldo (Vencido + Vigente)</b></td>            
        </tr>
        <tr>
        	<td align="center">
            	<div id="txtSaldoVencido">$0.00</div>
            </td>
        	<td align="center">
				<div id="txtSaldoVigente">$0.00</div>
            </td>
            <td align="center">
              <div id="txtPago">$0.00</div>
            </td>            
        </tr>
        </table>        
        <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Saldo Futuro</b></td>
            <td align="center"></td>
            <td align="center"></td>            
        </tr>
        <tr>
        	<td align="center">
            	<div id="txtSaldoFuturo">$0.00</div>
            </td>
        	<td align="center"></td>
            <td align="center"></td>            
        </tr>
        </table>        
        <hr />   
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Operaci&oacute;n Total</b></td>
        	<td align="center"><b>Total de Pagos</b></td>
            <td align="center"><b>Saldo Total</b></td>            
        </tr>
        <tr>
        	<td align="center">
				<div id="txtOperacionTotal">$0.00</div>
            </td>
        	<td align="center">
				<div id="txtPagoTotal">$0.00</div>            
            </td>
            <td align="center">
              <div id="txtSaldoTotal">$0.00</div>
            </td>            
        </tr>
        </table>        
        <hr />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">
            	<input type="checkbox" name="chkSaldoMant" id="chkSaldoMant" onclick="UpdatePagoTotal()" />
                <b>Saldo Mantenimiento</b>
            </td>
            <td align="center">
            	<input type="checkbox" name="chkSaldoEquip" id="chkSaldoEquip" onclick="UpdatePagoTotal()" />
            	<b>Saldo Equipamiento</b>
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td align="center">
				<div id="txtMant" style="padding-left:25px">$0.00</div>
            </td>
            <td align="center">
              <div id="txtEquip" style="padding-left:25px">$0.00</div>
            </td>
            <td align="center">&nbsp;</td>
        </tr>
        </table>        
        <hr />       
        
        
        <div align="center"><b>RESUMEN DE OPERACIONES</b></div>
        <br />
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Abono Saldo Vencido</b></td>
            <td align="center"><b>Abono Saldo Vigente</b></td>
            <td><b>Abono Saldo Futuro</b></td>
        </tr>
        <tr>
        	<td align="center">
				<div id="opSaldoVencido">$0.00</div>
                <input type="hidden" name="abonoSaldoVencido" id="abonoSaldoVencido" value="" />
            </td>
            <td align="center">
              <div id="opSaldoVigente">$0.00</div>
              <input type="hidden" name="abonoSaldoVigente" id="abonoSaldoVigente" value="" />
            </td>
            <td align="center">
            <div id="opSaldoFuturo">$0.00</div>
            <input type="hidden" name="abonoSaldoFuturo" id="abonoSaldoFuturo" value="" />
            </td>
        </tr>
        </table>        
        <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Abono Mantenimiento</b></td>
            <td align="center"><b>Abono Equipamiento</b></td>
            <td align="center"><b>Abono Total</b></td>
        </tr>
        <tr>
        	<td align="center">
				<div id="opMant">$0.00</div>
                <input type="hidden" name="abonoMant" id="abonoMant" value="" />
            </td>
            <td align="center">
              <div id="opEquip">$0.00</div>
              <input type="hidden" name="abonoEquip" id="abonoEquip" value="" />
            </td>
            <td align="center">
            	<div id="opAbonoTotal">$0.00</div>
            </td>
        </tr>
        </table>        
        <br />       
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddPayment"><span>Agregar</span></a>           
     	</div>            
        <input type="hidden" id="type" name="type" value="saveAddPayment"/>
        <input type="hidden" id="projLevelId" name="projLevelId" value="" />
        <input type="hidden" id="contractId" name="contractId" value="" />
  	</fieldset>
	</form>
</div>
