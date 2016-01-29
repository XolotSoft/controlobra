<div id="divForm">
             
        <div id="tipoClte">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">        
        <tr>
        	<td align="center"><b>Cliente</b></td>
            <td align="center"><b>Torre</b></td>
            <td align="center"><b>Departamento</b></td>
        </tr>
        <tr>
        	<td align="center">
				{$info.customer}
            </td>
            <td align="center">
                {$info.torre}
            </td>
            <td align="center">
            	{$info.depto}
            </td>
        </tr>
        </table>        
        <br />
        </div>
                                                
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center"><b>Cantidad</b></td>
            <td align="center"><b>Moneda</b></td>
            <td align="center"><b>Fecha</b></td>
        </tr>
        <tr>
        	<td align="center">
				${$info.quantity}
            </td>
            <td align="center">
            	{$info.currency}
            </td>
            <td align="center">
            	{$info.fecha}
            </td>
        </tr>
        </table>        
        <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>        	
            <td align="center"><b>Cuenta</b></td>            
            <td align="center">
            {if $info.showTipo}<b>Tipo de Cambio</b>{/if}
            </td>
            <td align="center"></td>
        </tr>
        <tr>        	
            <td align="center">
            	{$info.bank}
            </td>            
            <td align="center">
            	 {if $info.showTipo}${$info.currencyExchange}{/if}
            </td>
            <td align="center"></td>            
        </tr>
        </table>        
        <br />
        
        {if $info.concepto == "Otros"}
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>        	
            <td align="center"><b>Observaciones</b></td>           
        </tr>
        <tr>        	
            <td align="center">
            	{$info.observaciones}
            </td>                       
        </tr>
        </table>        
        <br />
        {/if}
               
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine"></div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnCerrarPayment"><span>Cerrar</span></a>           
     	</div>            
        
</div>
