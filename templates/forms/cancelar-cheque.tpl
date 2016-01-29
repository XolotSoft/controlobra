<div id="divForm">
	<form id="cancelarChequeForm" name="cancelarChequeForm" method="post">
    <fieldset>        
            
        <div style="width:30%;float:left">* Motivo de Cancelaci&oacute;n:</div>
        <div style="float:left">
        <textarea class="smallInput" name="motivoCancel" id="motivoCancel" style="width:300px" rows="5" /></textarea>
        </div>       
        <hr />
      
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCancelCheque"><span>Guardar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveCancelarCheque"/>
        <input type="hidden" id="accountPagoId" name="accountPagoId" value="{$accountPagoId}"/>
  	</fieldset>
	</form>
</div>
