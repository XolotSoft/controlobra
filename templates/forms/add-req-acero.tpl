<div id="divForm">
	<form id="addRequisicionForm" name="addRequisicionForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
                
        <div style="width:30%;float:left">* Concepto:</div>        	
        <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
        <tr>
        	<td style="border:0px" width="120">            
            <div style="float:left" id="listConcepts">{include file="{$DOC_ROOT}/templates/lists/enumConceptReq.tpl"}</div>
            <div style="float:left; padding:5px 5px 0 10px">Cant:</div>
            <div style="float:left; padding-top:5px;">
            <div id="txtQtyConcept">0</div>
            <input type="hidden" name="qtyConcept" id="qtyConcept" value="0" />
            </div>
            </td>
        </tr>
        </table> 
        <hr />
                                
        <div style="width:30%;float:left">* Torre:</div>
        <div id="listItems" style="width:400px; padding-left:210px">
        {include file="{$DOC_ROOT}/templates/lists/enumProjItemAcero.tpl"}</div>
        <hr />      
        
        <div id="enumLevels">        
        {include file="{$DOC_ROOT}/templates/lists/enumProjLevelsReqAcero.tpl"}
        </div>
                
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="450" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>Total por Rango</b></td>           
            <td width="150"><b>Requisici&oacute;n Actual</b></td>
            <td><b>Saldo por Rango</b></td>          
        </tr>
        <tr>
        	<td><div id="txtTotalRango">0.00</div>
            <input type="hidden" name="totalRango" id="totalRango" value="0" /></td>
            <td><div id="txtRequiActual">0.00</div>
            <input type="hidden" name="requiActual" id="requiActual" value="0" /></td>
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
        	<td>&nbsp;</td>           
            <td>&nbsp;</td>
            <td><b>Total Requisici&oacute;n</b></td>          
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div id="txtTotalReq">0.00</div>
            <input type="hidden" name="totalReq" id="totalReq" value="0" /></td>
        </tr>
        </table>                

                          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddRequisicion"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddRequisicion"/>
  	</fieldset>
	</form>
</div>
