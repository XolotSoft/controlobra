<div id="divForm">
	<form id="editFechaEntForm" name="editFechaEntForm" method="post">
    <fieldset>        
        
        <div style="width:30%;float:left"><b>No. Orden de Compra:</b></div>
        {$info.orderBuyId}
        <hr />
              
        <div style="width:30%;float:left"><b>Proveedor:</b></div>
		{$info.supplier}
        <hr />
                
        <div style="width:30%;float:left">* <b>Fecha:</b></div>
        <div style="float:left">
        <input type="text" class="smallInput" name="fecha" id="fecha" maxlength="10" style="width:80px" value="{$info.fechaEntrega}" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fecha','ddmmyyyy')">
        <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
        </div>
        <hr />
                        
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnSave"><span>Guardar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveFechaEnt"/>
        <input type="hidden" id="orderBuyId" name="orderBuyId" value="{$info.orderBuyId}"/>
  	</fieldset>
	</form>
</div>
