<div id="divForm">
	<form id="addPersonalForm" name="addPersonalForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" maxlength="60"/>
        <hr />
        
        <div style="width:30%;float:left">Email:</div>
        <input class="smallInput medium" name="email" id="email" type="text" maxlength="80"/>
        <hr />
        
        <div style="width:30%;float:left">Usuario:</div>
        <input class="smallInput small" name="username" id="username" type="text" maxlength="25"/>
        <hr />
       
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" checked="checked" />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddPersonal"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddPersonal"/>
  	</fieldset>
	</form>
</div>
