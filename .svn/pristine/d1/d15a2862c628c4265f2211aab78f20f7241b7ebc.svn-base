<div id="divForm">
	<form id="cancelPagoForm" name="cancelPagoForm" method="post">
    <fieldset>        
        
        <div style="width:30%;float:left"><b>Tipo:</b></div>
        {$info.tipo}
        <hr />
        
        {if $info.tipo == "Cheque"}
        <div style="width:30%;float:left"><b>Cheque No.:</b></div>
        {$info.noCheque}
        <hr />
        {/if}
              
        <div style="width:30%;float:left"><b>Cuenta Bancaria:</b></div>
        {$info.bank}
        <hr />
        
        <div style="width:30%;float:left"><b>Cantidad:</b></div>
        {$info.quantity} {$info.currency}
        <hr />
        
        <div style="width:30%;float:left"><b>Fecha Pago:</b></div>
        {$info.fecha}
        <hr />
        
        <div style="width:30%;float:left"><b>No. Factura:</b></div>
        {$info.noInvoice}
        <hr />
        
        <div style="width:30%;float:left"><b>Motivo Cancelaci&oacute;n:</b></div>
        <textarea class="smallInput" name="obs" id="obs" rows="5" style="width:400px"></textarea>
        <hr />      
                 
      <div style="clear:both"></div>

        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCancelPago"><span>Cancelar Pago</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveCancelPago"/>
        <input type="hidden" id="accountPagoId" name="accountPagoId" value="{$info.accountPagoId}"/>
  	</fieldset>
	</form>
</div>
