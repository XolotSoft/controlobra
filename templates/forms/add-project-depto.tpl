<div id="divForm">
	<form id="addDeptoForm" name="addDeptoForm" method="post">
    <fieldset>
        
        <div style="width:30%;float:left">* Tipo:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumProjType.tpl"}
        <hr />
        
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50"/>
                          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddDepto"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddDepto"/>
        <input type="hidden" id="projLevelId" name="projLevelId" value="{$projLevelId}" />
  	</fieldset>
	</form>
</div>
