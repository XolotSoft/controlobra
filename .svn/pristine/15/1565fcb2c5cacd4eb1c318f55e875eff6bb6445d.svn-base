<div id="divForm">
	
    <fieldset>        
                
        <div align="center">
        	<b>TOTAL:</b>
            <br /> ${$info.total} {$info.currency}
        </div>
        <hr />
        
        <div style="width:30%;float:left"><b>Monto Pena por Cancelaci&oacute;n:</b></div>
       
        <br /><br />
                       
        <div style="width:30%;float:left">Cantidad:</div>
        ${$info.montoPena}        
        <hr />
        <div align="center">
        	<b>TOTAL NETO:</b>
            <br />
            ${$info.totalNeto} MXN
        </div>
        <hr />
        
        <div style="width:30%;float:left"><b>Regresar en Cheque:</b></div>
        
        <br /><br />
        
        <div align="center">
        {include file="{$DOC_ROOT}/templates/lists/cancelacion-cheques-view.tpl"}
        </div>
        
        <hr />
        {if $info.contractId2}
        <div style="width:30%;float:left"><b>Traspasar a otro Contrato:</b></div>
       
        <br /><br />
        
        <div style="width:30%;float:left">No. de Contrato:</div>
        {$info.noContractD}
        <br /><br />
               
        <div style="width:30%;float:left">Cantidad:</div>
        ${$info.qtyTraspaso}
        <br /><br />
                
        <div style="width:30%;float:left">Moneda:</div>
        {$info.currencyD}
        <br /><br />
        
        <div style="width:30%;float:left">Cuenta:</div>
        {$info.bank}
        <hr />
        {/if}
        
        {if $info.details}
        <div style="width:30%;float:left"><b>Observaciones:</b></div>
        <div style="width:400px;float:left">{$info.details}</div>
        <hr />
        {/if}
                         
      <div style="clear:both"></div>


        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCerrar"><span>Cerrar</span></a>           
     	</div> 
     	
</div>
