<div id="divForm">
	<form id="editPersonalForm" name="editPersonalForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" maxlength="60" value="{$info.name}"/>
        <hr />
        
        <div style="width:30%;float:left">Email:</div>
        <input class="smallInput medium" name="email" id="email" type="text" maxlength="80" value="{$info.email}"/>
        <hr />
       
       <div style="width:30%;float:left">Usuario:</div>
        <input class="smallInput small" name="username" id="username" type="text" maxlength="25" value="{$info.username}"/>
        <hr />
        
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" {if $info.active}checked{/if} />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditPersonal"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditPersonal"/>
        <input type="hidden" id="id" name="id" value="{$info.personalId}" />
  	</fieldset>
	</form>
</div>