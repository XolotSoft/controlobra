<div id="divForm">
	<form id="editTypeForm" name="editTypeForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
               
        <div style="width:30%;float:left">Area Com&uacute;n:</div>
        <input class="smallInput small" name="comunArea" id="comunArea" type="text" size="50" value="{$info.comunArea}"/>
        <hr />
        
        <div style="width:30%;float:left">Area Real:</div>
        <input class="smallInput small" name="realArea" id="realArea" type="text" size="50" value="{$info.realArea}"/>
        <hr />
        
        <div style="width:30%;float:left">Area Total:</div>
        <input class="smallInput small" name="totalArea" id="totalArea" type="text" size="50" value="{$info.totalArea}"/>
        <hr />
        
        <div style="width:30%;float:left">Activo:</div> 
        <input type="checkbox" value="1" name="active" id="active" {if $info.active}checked{/if} />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditType"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditType"/>
        <input type="hidden" id="id" name="id" value="{$info.typeId}" />
  	</fieldset>
	</form>
</div>