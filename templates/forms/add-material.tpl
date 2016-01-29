<div id="divForm">
	<form id="addMaterialForm" name="addMaterialForm" method="post">
    <input type="hidden" name="formName" id="formName" value="addMaterialForm" />
    <fieldset>
        
        <div style="width:30%;float:left">* Partida:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumCategory.tpl"}
        <hr />
        
        <div id="fieldSubcat" style="display:none">
            <div style="width:30%;float:left">Subpartida:</div>
            <div id="listSubcat">{include file="{$DOC_ROOT}/templates/lists/enumSubcategory.tpl"}</div>
            <hr />
        </div>
        
        <div id="fieldConcept" style="display:none">
            <div style="width:30%;float:left">Concepto:</div>
            <div id="listConcept">{include file="{$DOC_ROOT}/templates/lists/enumConceptCon.tpl"}</div>
            <hr />
        </div>
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">% Desperdicio:</div>
        <input class="smallInput small" name="waste" id="waste" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">* Unidad:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumUnit.tpl"}
        <hr />      
        
        <div style="width:30%;float:left">Acero:</div>
        <input type="checkbox" name="steel" id="steel" value="1" onclick="ToogleSteel()" />
        <hr />
        
        <div style="width:30%;float:left">Observaciones:</div>
        <textarea name="comment" id="comment" class="smallInput medium" rows="5"></textarea>
        <hr />
        
        <div id="fieldSteel" style="display:none">
        
        <div style="width:30%;float:left">Diametro (Pulgadas):</div>
        <input class="smallInput small" name="diameter" id="diameter" type="text" size="50" style="width:100px"/>
        <hr />
        
        <div style="width:30%;float:left">Peso (Kg):</div>
        <input class="smallInput small" name="weight" id="weight" type="text" size="50"/ style="width:100px">
        <hr />
        
        <div style="width:30%;float:left">Traslape:</div>
        <input class="smallInput small" name="traslape" id="traslape" type="text" size="50"/ style="width:100px" onblur="VerifyTraslape()">
        <hr />
        
        <div style="width:30%;float:left">Bulbos:</div>
        <input class="smallInput small" name="bulbos" id="bulbos" type="text" size="50"/ style="width:100px" onblur="VerifyBulbos()">
        <hr />
        
        </div>
             
      <div align="right" style="padding-right:10px">
      <a href="javascript:void(0)" onclick="AddPrice()">
      <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
      Agregar Nuevo Precio</a>
      </div>
      
      <div align="center" id="listPrice">
      {include file="{$DOC_ROOT}/templates/lists/material-prices.tpl"}
      </div>
      
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddMaterial"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddMaterial"/>
  	</fieldset>
	</form>
</div>
