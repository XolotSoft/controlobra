<div id="divForm">
	<form id="addCuantificacionForm" name="addCuantificacionForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
                     	
        <div style="width:30%;float:left">* Concepto:</div>           
		{include file="{$DOC_ROOT}/templates/lists/enumConcept.tpl"}
        <hr />
       
        <div style="width:30%;float:left">Unidad:</div>
        <div id="txtUnidad">{$info.unidad}</div>
        <hr />
        
        <div style="width:30%;float:left">* Cantidad:</div>
        <input type="text" name="qtyConcept" id="qtyConcept" class="smallInput" value="1" onblur="UpdateTotalServ()" />
        <hr />
       
        <div style="width:30%;float:left">* Precio Unitario:</div>
        <input type="text" name="unitPrice" id="unitPrice" class="smallInput" value="" onblur="UpdateTotalServ()" />
        <hr />
       
       <div style="width:30%;float:left"><b>Total:</b></div>
       <div id="txtTotal">0.00</div>
       <input type="hidden" name="total" id="total" value="0" />
       
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddCuantServ"><span>Agregar</span></a>           
     	</div>
            
        <input type="hidden" id="type" name="type" value="saveAddCuantServ"/>
  	</fieldset>
	</form>
</div>
