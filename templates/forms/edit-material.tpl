<div id="divForm">
	<form id="editMaterialForm" name="editMaterialForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editMaterialForm" />
    <fieldset>
        
        <div style="width:30%;float:left">* Partida:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumCategory.tpl"}
        <hr />
        
        <div id="fieldSubcat" {if !$subcategorias}style="display:none"{/if}>
        <div style="width:30%;float:left">Subpartida:</div>
        <div id="listSubcat">{include file="{$DOC_ROOT}/templates/lists/enumSubcategory.tpl"}</div>
        <hr />
        </div>
        
        <div id="fieldConcept" {if !$concepts}style="display:none"{/if}>
            <div style="width:30%;float:left">Concepto:</div>
            <div id="listConcept">{include file="{$DOC_ROOT}/templates/lists/enumConceptCon.tpl"}</div>
            <hr />
        </div>
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
        
        <div style="width:30%;float:left">% Desperdicio:</div>
        <input class="smallInput small" name="waste" id="waste" type="text" size="50" value="{$info.waste}"/>
        <hr />
       
        <div style="width:30%;float:left">* Unidad:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumUnit.tpl"}
        <hr />
        
        <div style="width:30%;float:left">Acero:</div>
        <input type="checkbox" name="steel" id="steel" value="1" onclick="ToogleSteel()" {if $info.steel}checked{/if} />
        <hr />
        
        <div style="width:30%;float:left">Observaciones:</div>
        <textarea name="comment" id="comment" class="smallInput medium" rows="5">{$info.comment}</textarea>
        <hr />
       
       <div id="fieldSteel" style="display:{if $info.steel == 0}none{/if}">
        
        <div style="width:30%;float:left">Diametro (Pulgadas):</div>
        <input class="smallInput small" name="diameter" id="diameter" type="text" size="50" style="width:100px" value="{$info.diameter}"/>
        <hr />
        
        <div style="width:30%;float:left">Peso (Kg):</div>
        <input class="smallInput small" name="weight" id="weight" type="text" size="50"/ style="width:100px" value="{$info.weight}">
        <hr />
        
        <div style="width:30%;float:left">Traslape:</div>
        <input class="smallInput small" name="traslape" id="traslape" type="text" size="50"/ style="width:100px" value="{$info.traslape}" onblur="VerifyTraslape()">
        <hr />
        
        <div style="width:30%;float:left">Bulbos:</div>
        <input class="smallInput small" name="bulbos" id="bulbos" type="text" size="50"/ style="width:100px" value="{$info.bulbos}" onblur="VerifyBulbos()">
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
            <a class="button_grey" id="btnEditMaterial"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditMaterial"/>
        <input type="hidden" id="id" name="id" value="{$info.materialId}" />
  	</fieldset>
	</form>
</div>