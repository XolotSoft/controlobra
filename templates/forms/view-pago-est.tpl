<div id="divForm">
        
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
        {$info.quantity|number_format:2:".":","} {$info.currency}
        <hr />
        
        {if $info.seccion != "E"}
            <div style="width:30%;float:left"><b>Concepto:</b></div>
            {$info.concepto}
            <hr />
        {/if}
        
        <div style="width:30%;float:left"><b>Fecha de Pago:</b></div>
        {$info.fecha}
        <hr />
        
        <div style="width:30%;float:left"><b>No. Factura:</b></div>
        {$info.noInvoice}
        <hr />
        
        <div style="width:30%;float:left"><b>Status:</b></div>
        {$info.status}
        <hr />
        
        {if $info.tipo == "Cheque" && $info.seccion != "E"}
        	<div style="width:30%;float:left"><b>Estado:</b></div>
        	{$info.statusCheque}
        	<hr />
        {/if}
        
        {if $info.tipo == "Cheque" && ($info.statusCheque == "Recogido" || $info.statusCheque == "Cobrado")}
        	<div style="width:30%;float:left"><b>Recepci&oacute;n:</b></div>
        	{$info.fechaRecoger} por {$info.personaRecoger}
        	<hr />
        {/if}
        
        {if $info.tipo == "Cheque" && $info.statusCheque == "Cobrado"}
        	<div style="width:30%;float:left"><b>Fecha de Cobro:</b></div>
        	{$info.fechaCobro}
        	<hr />
        {/if}
        
        {if $info.status == "Cancelado"}
        <div style="width:30%;float:left"><b>Fecha Cancelaci&oacute;n:</b></div>
        {$info.fechaCancel}
        <hr />
                
        <div style="width:30%;float:left"><b>{if $info.tipo == "Cheque"}Motivo Cancelaci&oacute;n{else}Observaciones{/if}:</b></div>
        <div style="width:70%; float:left">{$info.obsCancel}</div>
        <hr />
        {/if}
        
        {if $info.tipo == "Cheque" && $info.seccion != "E"}
        	<div style="width:30%;float:left"><b>Ver Pdf:</b></div>
            <a href="{$WEB_ROOT}/modules/estimacion-cheques-pdf2.php?id={$info.estimacionPagoId}" target="_blank" title="Ver Pdf">
        		<img src="{$WEB_ROOT}/images/pdf.png" width="27" height="32" border="0" />
            </a>
        	<hr />
        {/if}
                 
      <div style="clear:both"></div>

        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnClose"><span>Cerrar</span></a>           
     	</div> 
</div>
