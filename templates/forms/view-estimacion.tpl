<div id="divForm">
               
         <div style="width:30%;float:left"><b>Concepto:</b></div>
        <table width="60%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td>{$info.concept} &nbsp;&nbsp;&nbsp;
            	<b>Cant:</b> {$info.qtyConcept} &nbsp; &nbsp; &nbsp;
                <b>Unidad:</b> {$info.unit}
            </td>
        </tr>
        </table>
        <hr />
        
        <div style="width:30%;float:left"><b>Contratista:</b></div>
			{$info.supplier}
        <hr />
        
        <div style="width:30%;float:left"><b>Precio Concepto:</b></div>
			${$info.priceConcept|number_format:2:'.':','}
        <hr />
        
        <div style="width:30%;float:left"><b>Tipo de Area:</b></div>
        {$info.type}            
        <hr />
        
        <div style="width:30%;float:left"><b>Torre:</b></div>
        	{$info.torre}
        <hr />      
        
        {include file="{$DOC_ROOT}/templates/lists/enumProjLevelsEstView.tpl"}
                                        
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="450" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>Total por Rango</b></td>           
            <td width="150"><b>Estimaci&oacute;n Actual</b></td>
            <td><b>Saldo por Rango</b></td>          
        </tr>
        <tr>
        	<td>{$info.totalRango}</td>
            <td>{$info.estimActual}</td>
            <td>{$info.saldoRango}</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td>
        <tr>
        	<td><b>Total Concepto</b></td>           
            <td>&nbsp;</td>
            <td><b>Saldo Total Concepto</b></td>          
        </tr>
        <tr>
        	<td>{$info.totalConcept}</td>
            <td>&nbsp;</td>
            <td>{$info.saldoConcept}</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td>
        <tr>
        	<td><b>% Retenci&oacute;n</b></td>           
            <td>&nbsp;</td>
            <td><b>Total Retenido</b></td>          
        </tr>
        <tr>
        	<td>{$info.retencion}</td>
            <td>&nbsp;</td>
            <td>{$info.totalRetenido}</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td>
        <tr>
        	<td>&nbsp;</td>           
            <td>&nbsp;</td>
            <td><b>Total Estimaci&oacute;n</b></td>          
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>{$info.totalEst}</td>
        </tr>
        </table> 
		
        <div style="clear:both"></div>
			<hr />
        <div class="formLine" style="text-align:center; margin-left:300px;">            
            <a class="button_grey" id="btnCerrar"><span>Cerrar</span></a>           
     	</div> 
                          
      <div style="clear:both"></div>
      
      <div style="margin-bottom:10px"></div>
      
</div>
