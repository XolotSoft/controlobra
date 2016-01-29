<div id="divForm">
	<form id="addPagoForm" name="addPagoForm" method="post">
    <fieldset>        
        
        <div style="width:30%;float:left">* Tipo de Pago:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumTipoPayment.tpl"}
        <hr />
        
        <div style="width:30%;float:left">* Cuenta Bancaria:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumBankPay.tpl"}
        <hr />
        
        <div style="width:30%;float:left">Saldo en Cuenta Bancaria:</div>
        <div id="txtSaldoCta">0.00</div>
        <hr />
        
        <div style="width:30%;float:left">* Cantidad:</div>
        <input class="smallInput small" name="quantity" id="quantity" type="text" size="50" value="{$info.saldo}"/>
        <hr />
                
        <div style="width:30%;float:left">* Fecha:</div>
        <div style="float:left">
        <input type="text" class="smallInput" name="fecha" id="fecha" maxlength="10" readonly="readonly" style="width:80px" value="{$info.fecha}" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fecha','ddmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
        <hr />
        
        <div id="cheque" style="display:none">
            <div style="width:30%;float:left">No. de Cheque:</div>
            <div id="txtNoCheque">0</div>
            <input name="noCheque" id="noCheque" type="hidden" />
            <hr />
        </div>
        
        
        <div style="width:30%;float:left">No. de Factura:</div>
        <input class="smallInput small" name="noInvoice" id="noInvoice" type="text" size="50"/>
        <hr />
                 
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddPago"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddPago"/>
        <input type="hidden" id="estimacionPaymentId" name="estimacionPaymentId" value="{$estimacionPaymentId}"/>
  	</fieldset>
	</form>
</div>
