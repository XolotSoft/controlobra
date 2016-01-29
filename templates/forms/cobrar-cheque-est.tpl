<div id="divForm">
	<form id="cobrarChequeForm" name="cobrarChequeForm" method="post">
    <fieldset>        
            
        <div style="width:30%;float:left">* Fecha:</div>
        <div style="float:left">
        <input type="text" class="smallInput" name="fecha" id="fecha" maxlength="10" readonly="readonly" style="width:80px" value="{$info.fecha}" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fecha','ddmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
        <hr />
                                 
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCobrarCheque"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveCobrarCheque"/>
        <input type="hidden" id="estimacionPagoId" name="estimacionPagoId" value="{$estimacionPagoId}"/>
  	</fieldset>
	</form>
</div>
