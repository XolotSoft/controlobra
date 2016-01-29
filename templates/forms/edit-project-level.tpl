<div id="divForm">
	<form id="editLevelForm" name="editLevelForm" method="post">
    <fieldset>        
                
        <div style="width:30%;float:left">* Nivel:</div>
        <input class="smallInput small" name="level" id="level" type="text" size="50" value="{$info.level}"/>
        <hr />
                     
        <div style="width:30%;float:left">Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
                          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditLevel"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditLevel"/>
        <input type="hidden" id="id" name="id" value="{$info.projLevelId}"/>
  	</fieldset>
	</form>
</div>
