<div id="divForm">
	<form id="editCuantificacionForm" name="editCuantificacionForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$info.projectId}" />
    <input type="hidden" name="cuantificacionId" id="cuantificacionId" value="{$info.cuantificacionId}" />
    <fieldset>
                     	
        <div style="width:30%;float:left">* Concepto:</div>           
		{$info.concept}
        <hr />
        
        <div style="width:30%;float:left">* Cantidad:</div>
        <input type="text" name="qtyConcept" id="qtyConcept" class="smallInput" value="{$info.qtyConcept}" onblur="UpdateTotalServ()" />
        <hr />
       
        <div style="width:30%;float:left">* Precio Unitario:</div>
        <input type="text" name="unitPrice" id="unitPrice" class="smallInput" value="{$info.unitPrice}" onblur="UpdateTotalServ()" />
        <hr />
       
       <div style="width:30%;float:left"><b>Total:</b></div>
       <div id="txtTotal">{$info.total}</div>
       <input type="hidden" name="total" id="total" value="{$info.total}" />
       
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditCuantServ"><span>Actualizar</span></a>           
     	</div>
            
        <input type="hidden" id="type" name="type" value="saveEditCuantServ"/>
  	</fieldset>
	</form>
</div>
