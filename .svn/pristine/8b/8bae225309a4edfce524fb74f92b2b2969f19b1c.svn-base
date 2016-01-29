<div id="divForm">
	<form id="cancelContractForm" name="cancelContractForm" method="post">
    <input type="hidden" name="totalCurrency" id="totalCurrency" value="{$info.currency}" />
    <fieldset>        
                
        <div align="center">
        	<b>&iquest;Qu&eacute; desea hacer con el dinero?</b>
        	<br /> TOTAL: ${$info.totalPayment} {$info.currency}
        </div>
        <hr />
                
        <div style="width:30%;float:left"><b>Monto Pena por Cancelaci&oacute;n:</b></div>
       
        <br /><br />
                       
        <div style="width:30%;float:left">Cantidad:</div>
        <input class="smallInput small" name="montoPena" id="montoPena" type="text" size="50" onblur="UpdateTotalNeto()" />        
        <hr />
        <div align="center">
        	<b>TOTAL NETO:</b>
            <div id="txtTotalNeto">$0.00 MXN</div>
        </div>
        <hr />
        
        <div style="width:30%;float:left"><b>Regresar en Cheque:</b></div>
        
        <br /><br />
        <div align="center">            
            <a href="javascript:void(0)" onclick="AddCheque()">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
            Agregar Nuevo Cheque</a>
        </div>
        
        <div id="listCheques" align="center">
        	{include file="{$DOC_ROOT}/templates/lists/cancelacion-cheques.tpl"}
        </div>
              
        <hr />
        
        <div style="width:30%;float:left"><b>Traspasar a otro Contrato:</b></div>
       
        <br /><br />
        
        <div style="width:30%;float:left">No. de Contrato:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumContract.tpl"}
        <br /><br />
               
        <div style="width:30%;float:left">Cantidad:</div>
        <input class="smallInput small" name="qtyTraspaso" id="qtyTraspaso" type="text" size="50" />
        <br />
                
        <div style="width:30%;float:left">Moneda:</div>
        {$info.currency}
        <input type="hidden" name="currency" id="currency" value="{$info.currency}" />
        <br /><br />
        
        <div style="width:30%;float:left">Cuenta:</div>
        <div id="enumBanks">
        {include file="{$DOC_ROOT}/templates/lists/enumBankPay.tpl"}
        </div>
        <hr />
                
        <div style="width:30%;float:left"><b>Observaciones:</b></div>
        <textarea name="details" id="details" style="width:300px" rows="5"></textarea>
        
        <hr />                 
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCancelContract"><span>Guardar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveCancelContract"/>
        <input type="hidden" name="totalPayment" id="totalPayment" value="{$info.totalPay}" />
        <input type="hidden" name="totalNeto" id="totalNeto" value="{$info.totalPay}" />
        <input type="hidden" name="projectId" id="projectId" value="{$info.projectId}" />
        <input type="hidden" name="id" id="id" value="{$info.contractId}" />
  	</fieldset>
	</form>
</div>
