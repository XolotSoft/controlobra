<div id="divForm">
	<form id="addCuantificacionForm" name="addCuantificacionForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <input type="hidden" name="supplierId" id="supplierId" value="" />
    <fieldset>
                     	
        <div style="width:30%;float:left">* Concepto:</div>
        <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
        <tr>
        	<td style="border:0px" width="120">            
            <div style="float:left">{include file="{$DOC_ROOT}/templates/lists/enumConcept.tpl"}</div>
            <div style="float:left; padding:5px 5px 0 10px">Cant.</div>
            <div style="float:left">
            <input type="text" name="qtyConcept" id="qtyConcept" class="smallInput" style="width:50px" value="1" onchange="LoadEjes2('')" />
            </div>
            </td>
        </tr>
        </table> 
        <hr />
        
        <div style="width:30%;float:left">Es Extra:</div>       
        <input type="checkbox" name="isExtra" id="isExtra" value="1" />
        <hr />
        
        <div style="width:30%;float:left">Contratista:</div>       
        <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
        <tr>
        	<td style="border:0px" width="120">            
            <div id="txtSupplier"></div>            
            <div style="float:left; padding:5px 5px 0px 0px">No. de Presupuesto:</div>
            <div style="float:left">
            <input type="text" name="noPresupuesto" id="noPresupuesto" class="smallInput" style="width:50px" />
            </div>
            </td>
        </tr>
        </table> 
        
        <hr />
                
        <div style="width:30%;float:left">* Torre:</div>
        <div id="listItems" style="width:400px; padding-left:210px">
        {include file="{$DOC_ROOT}/templates/lists/enumProjItem.tpl"}</div>
        <hr />
        
        <div id="enumLevels">        
        {include file="{$DOC_ROOT}/templates/lists/enumProjLevels.tpl"}
        </div>        
        
        <div style="width:30%;float:left">* Tipo de Area:</div>
        <table width="300" cellpadding="0" cellspacing="0" border="1" style="border:1px">
        <tr>
        	<td style="border:0px" width="200" valign="top">
                <input type="hidden" name="projTypeId" id="projTypeId" value="" />
                {foreach from=$types item=item key=key}
                <input type="checkbox" name="projTypes[]" value="{$item.projTypeId}" onclick="GetTotalAreas2()" />{$item.name}
                <br />
                {foreachelse}
                Ningun &aacute;rea encontrada.
                {/foreach}
            </td>
            <td style="border:0px" width="160" valign="top">            	
                <input type="hidden" name="projTypeId" id="projTypeId" value="" />
                {foreach from=$types2 item=item key=key}
                <input type="checkbox" name="projTypes[]" value="{$item.projTypeId}" onclick="GetTotalAreas2()" />{$item.name}
                <br />
                {foreachelse}
                Ningun &aacute;rea encontrada.
                {/foreach}
            </td>
            <td style="border:0px" align="center" width="40" valign="top">Cant.</td>
            <td style="border:0px" valign="top">
            <input type="text" name="qtyArea" id="qtyArea" class="smallInput" style="width:50px" value="0" readonly="readonly" />
            </td>
        </tr>
        </table>                               
        <hr />
        
        <div style="width:30%;float:left">* Ejes:</div>
        	<div id="listEjes">{include file="{$DOC_ROOT}/templates/lists/enumEjesByArea.tpl"}</div>                
        <hr />
       
       <div style="width:30%;float:left">&nbsp;</div>
        <table width="400" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="15">B</td>
            <td align="center">
            <input type="text" name="b" id="b" class="smallInput" style="width:50px" onblur="UpdateSubtotal()" />
            </td>
            <td width="15">H</td>
            <td><div id="inpH" style="display:none">
            <input type="text" name="h" id="h" class="smallInput" style="width:50px" onblur="UpdateSubtotal()" />
            </div>
            </td>
            <td width="15">Z</td>
            <td><div id="inpZ" style="display:none">
            <input type="text" name="z" id="z" class="smallInput" style="width:50px" onblur="UpdateSubtotal()" />
            </div>
            </td>
            <td>
            {* include file="{$DOC_ROOT}/templates/lists/enumUnit.tpl" *}
            <input type="hidden" name="unitId" id="unitId" value="" />
            <div id="txtUnidad"></div>
            <div id="txtSubtot"></div>
            </td>
        </tr>
        </table>
        <hr />
        
        <div style="width:30%;float:left">Vano:</div>
        <table width="400" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="15">B</td>
            <td align="center"><div id="inpBV" style="display:none">
            	<input type="text" name="bV" id="bV" class="smallInput" style="width:50px" onblur="UpdateSubtotalV()" />
            </div>
            </td>
            <td width="15">H</td>
            <td><div id="inpHV" style="display:none">
            	<input type="text" name="hV" id="hV" class="smallInput" style="width:50px" onblur="UpdateSubtotalV()" />
            </div>
            </td>
            <td width="15">Z</td>
            <td><div id="inpZV" style="display:none">
            	<input type="text" name="zV" id="zV" class="smallInput" style="width:50px" onblur="UpdateSubtotalV()" />
            </div>
            </td>
            <td>
           		<div id="txtSubtotalV">0.00</div>
                <input type="hidden" name="subtotalV" id="subtotalV" value="0" />
            </td>
        </tr>
        </table>
        <hr />
        
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="250" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>SUBTOTAL</b></td>           
            <td width=""><b>TOTAL</b></td>          
        </tr>
        <tr>
        	<td>
            <div id="txtSubtotal">0</div>
            <input type="hidden" name="subtotal" id="subtotal" value="0" />
            </td>
            <td>
            <div id="txtTotal">0</div>
            <input type="hidden" name="total" id="total" value="0" />
            </td>
        </tr>
        </table>                


      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddCuantificacion"><span>Agregar</span></a>           
     	</div>
            
        <input type="hidden" id="type" name="type" value="saveAddCuantificacion"/>
        <input type="hidden" id="areasQty" name="areasQty" value=""/>
        <input type="hidden" id="ejesQty" name="ejesQty" value=""/>
  	</fieldset>
	</form>
</div>
