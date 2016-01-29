<div id="divForm">
	<form id="addConceptForm" name="addConceptForm" method="post">
    <fieldset>        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50"/>
        <hr />
       
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" checked="checked" />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddConcept"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddConcept"/>
        <input type="hidden" id="subcategoryId" name="subcategoryId" value="{$subcategoryId}"/>
  	</fieldset>
	</form>
</div>
