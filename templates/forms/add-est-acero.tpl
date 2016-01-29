<div id="divForm">
	<form id="addEstimacionForm" name="addEstimacionForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
                
        <div style="width:30%;float:left">* Concepto:</div>        	
        <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
        <tr>
        	<td style="border:0px" width="120">            
            <div style="float:left" id="listConcepts">{include file="{$DOC_ROOT}/templates/lists/enumConceptEst.tpl"}</div>
            <div style="float:left; padding:5px 5px 0 10px">Cant:</div>
            <div style="float:left; padding-top:5px;">
            <div id="txtQtyConcept">0</div>
            <input type="hidden" name="qtyConcept" id="qtyConcept" value="0" />
            </div>
            </td>
        </tr>
        </table> 
        <hr />
        
        <div style="width:30%;float:left">* Contratista:</div>
        <div id="listSuppliers">{include file="{$DOC_ROOT}/templates/lists/enumSupEst.tpl"}</div>
        <hr />
                
        <div style="width:30%;float:left">* Torre:</div>
        <div id="listItems" style="width:400px; padding-left:210px">
        {include file="{$DOC_ROOT}/templates/lists/enumProjItemAcero.tpl"}</div>
        <hr />      
        
        <div id="enumLevels">        
        {include file="{$DOC_ROOT}/templates/lists/enumProjLevelsEstAcero.tpl"}
        </div>
                
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="450" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>Total por Rango</b></td>           
            <td width="150"><b>Estimaci&oacute;n Actual</b></td>
            <td><b>Saldo por Rango</b></td>          
        </tr>
        <tr>
        	<td><div id="txtTotalRango">0.00</div>
            <input type="hidden" name="totalRango" id="totalRango" value="0" /></td>
            <td><div id="txtEstimActual">0.00</div>
            <input type="hidden" name="estimActual" id="estimActual" value="0" /></td>
            <td><div id="txtSaldoRango">0.00</div>
            <input type="hidden" name="saldoRango" id="saldoRango" value="0" /></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td>
        <tr>
        	<td><b>Total Concepto</b></td>           
            <td>&nbsp;</td>
            <td><b>Saldo Total Concepto</b></td>          
        </tr>
        <tr>
        	<td><div id="txtTotalConcept">0.00</div>
            <input type="hidden" name="totalConcept" id="totalConcept" value="0" /></td>
            <td>&nbsp;</td>
            <td><div id="txtSaldoConcept">0.00</div>
            <input type="hidden" name="saldoConcept" id="saldoConcept" value="0" /></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td>
        <tr>
        	<td><b>% Retenci&oacute;n</b></td>           
            <td>&nbsp;</td>
            <td><b>Total Retenido</b></td>          
        </tr>
        <tr>
        	<td><input type="text" name="retencion" id="retencion" class="smallInput" style="width:60px" value="0" onblur="UpdateTotalesAcero()" /></td>
            <td>&nbsp;</td>
            <td><div id="txtTotalRetenido">0.00</div>
            <input type="hidden" name="totalRetenido" id="totalRetenido" value="0" /></td>
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
            <td><div id="txtTotalEst">0.00</div>
            <input type="hidden" name="totalEst" id="totalEst" value="0" /></td>
        </tr>
        </table>                

                          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddEstimacion"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddEstimacion"/>
  	</fieldset>
	</form>
</div>
