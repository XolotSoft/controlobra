<div id="divForm">
	<form id="addCuantificacionForm" name="addCuantificacionForm" method="post">
    <input type="hidden" name="formName" id="formName" value="addCuantificacionForm" />
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <input type="hidden" name="supplierId" id="supplierId" value="{$info.supplierId}" />
    <fieldset>
                     	
        <div style="width:30%;float:left">* Concepto:</div>
        <table width="300" cellpadding="0" cellspacing="0" border="0" style="border:0px">
        <tr>
        	<td style="border:0px" width="120">            
            <div style="float:left">{include file="{$DOC_ROOT}/templates/lists/enumConcept.tpl"}</div>
            <div style="float:left; padding:5px 5px 0 10px">Cant.</div>
            <div style="float:left">
            <input type="text" name="qtyConcept" id="qtyConcept" class="smallInput" style="width:50px" value="1" onchange="LoadEjesAcero()" />
            </div>
            </td>
        </tr>
        </table> 
        <hr />
        
        <div style="width:30%;float:left">Contratista:</div>
        	<div id="txtSupplier">{$info.supplier}</div>
        <hr />
                
        <div style="width:30%;float:left">* Torre:</div>
        <div id="listItems" style="width:400px; padding-left:210px">
        {include file="{$DOC_ROOT}/templates/lists/enumProjItemAcero.tpl"}</div>
        <hr />
        
        <div id="enumLevels">        
        {include file="{$DOC_ROOT}/templates/lists/enumProjLevelsAcero.tpl"}
        </div>        
        
        <div style="width:30%;float:left">* Materiales:</div>
         
        <div align="right" style="padding-right:20px">
        <a href="javascript:void(0)" onclick="AddMaterial()">
        <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
        Agregar Nuevo Material</a>
        </div>
      
       
        <div align="center" id="listMaterials">
      	{include file="{$DOC_ROOT}/templates/lists/cuantificacion-materials.tpl"}
      	</div>               
        <hr />
        
        <div style="width:30%;float:left">* Ejes:</div>
        	<div id="listEjes">{include file="{$DOC_ROOT}/templates/lists/enumEjesByArea.tpl"}</div>                
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
            <a class="button_grey" id="btnAddCuantAcero"><span>Agregar</span></a>           
     	</div>
             
        <input type="hidden" id="type" name="type" value="saveAddCuantificacion"/>
        <input type="hidden" id="areasQty" name="areasQty" value=""/>
  	</fieldset>
	</form>
</div>
