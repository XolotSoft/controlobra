<div id="divForm">
	<form id="editConceptForm" name="editConceptForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editConceptForm" />
    <fieldset>
        
        <div style="width:30%;float:left">* Tipo:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumConceptType.tpl"}
        <hr />
        
        <div style="width:30%;float:left">* Partida:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumCategory.tpl"}
        <hr />
        
        <div id="fieldSubcat" {if $item.matSubcatId}style="display:none"{/if}>
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
        
        <div style="width:30%;float:left">* Unidad:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumUnit.tpl"}
        <hr />
        
        <div style="width:30%;float:left">Acero:</div>
        <input type="checkbox" name="steel" id="steel" value="1" {if $info.steel}checked{/if} />
        <hr />
        
        <div style="width:30%;float:left">Observaciones:</div>
        <textarea name="comment" id="comment" class="smallInput medium" rows="5">{$info.comment}</textarea>
        <hr />
        
        <div id="subcontrato" {if $info.tipo != "Subcontrato"}style="display:none"{/if}>
         
        	  <div align="right" style="padding-right:10px">
              <a href="javascript:void(0)" onclick="AddPrice()">
              <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
              Agregar Nuevo Precio</a>
              </div>
              
              <div align="center" id="listPrice">
              {include file="{$DOC_ROOT}/templates/lists/concept-prices.tpl"}
              </div>  
        
        </div>
      
      <div id="obra" {if $info.tipo != "Obra"}style="display:none"{/if}>
               
      <div align="right" style="padding-right:25px">
      <a href="javascript:void(0)" onclick="AddMaterial()">
      <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
      Agregar Nuevo Material</a>
      </div>
            
      <div align="center" id="listMaterials">
      {include file="{$DOC_ROOT}/templates/lists/concept-materials.tpl"}
      </div>
      <hr />
      
      </div>
          
      <div style="clear:both"></div>
			
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditConcept"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditConcept"/>
        <input type="hidden" id="id" name="id" value="{$info.conceptId}" />
  	</fieldset>
	</form>
</div>