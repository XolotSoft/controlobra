<div id="divForm">
	<form id="editUnitForm" name="editUnitForm" method="post">
    <fieldset>
        
        <div style="width:30%;float:left">* Clave:</div>
        <input class="smallInput small" name="clave" id="clave" type="text" size="50" value="{$info.clave}"/>
        <hr />
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
       
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" {if $info.active}checked{/if} />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditUnit"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditUnit"/>
        <input type="hidden" id="id" name="id" value="{$info.unitId}" />
  	</fieldset>
	</form>
</div>