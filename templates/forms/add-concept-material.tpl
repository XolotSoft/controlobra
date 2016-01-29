<div id="divForm">
	<form id="addMaterialForm" name="addMaterialForm" method="post">    
    <fieldset>        
                
        <div style="width:30%;float:left">Categor&iacute;a:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumMatCat.tpl"}
        <hr />
        
        <div style="width:30%;float:left">Subcategor&iacute;a:</div>
        <div id="listSubcat">{include file="{$DOC_ROOT}/templates/lists/enumMatSubcat.tpl"}</div>
        <hr />
        
        <div style="width:30%;float:left">* Material:</div>
        <div id="listMaterial">{include file="{$DOC_ROOT}/templates/lists/enumMaterial.tpl"}</div>
        <hr />
        
        <div style="width:30%;float:left">* Cantidad:</div>
        <div style="float:left"><input class="smallInput small" name="quantity" id="quantity" type="text" size="50"/></div>
        <div style="float:left; padding-bottom:10px; padding-left:7px" id="unitMat"></div>
                      
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddMaterial"><span>Agregar</span></a>           
     	</div>
        
        <input type="hidden" id="type" name="type" value="saveAddMaterial"/>
        <input type="hidden" id="conceptId" name="conceptId" value="{$conceptId}" />
  	</fieldset>
	</form>
</div>
