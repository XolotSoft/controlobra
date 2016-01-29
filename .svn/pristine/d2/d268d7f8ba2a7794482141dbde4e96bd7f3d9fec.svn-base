<div id="divForm">
	<form id="editPasswdForm" name="editPasswdForm" method="post">
    <fieldset>
        <div style="width:30%;float:left">Nombre:</div>
        {$info.name}
        <hr /> 
        {if $info.passwd}
        <div style="width:30%;float:left">* Contrase&ntilde;a:</div>
        ******
        <hr />       
        <div style="width:30%;float:left">* Confirmar Contrase&ntilde;a:</div>
        ******        
        {else}                
        <div style="width:30%;float:left">* Contrase&ntilde;a:</div>
        <input class="smallInput small" name="passwd" id="passwd" type="password" maxlength="30" />
        <hr />       
       <div style="width:30%;float:left">* Confirmar Contrase&ntilde;a:</div>
        <input class="smallInput small" name="passwd2" id="passwd2" type="password" maxlength="30" />        
       {/if}           
      <div style="clear:both"></div>
	   <hr />
        <div class="formLine">* Campos requeridos</div>
        
        {if $info.passwd}
        <div class="formLine" style="text-align:center; margin-left:250px">            
            <a class="button_grey" id="btnDelPasswd"><span>Eliminar Contrase&ntilde;a Actual</span></a>           
     	</div>
        <input type="hidden" id="type" name="type" value="saveDelPasswd"/>
        {else}
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditPasswd"><span>Actualizar</span></a>           
     	</div>
        <input type="hidden" id="type" name="type" value="saveEditPasswd"/>
        {/if}         
        
        <input type="hidden" id="id" name="id" value="{$info.personalId}" />
  	</fieldset>
	</form>
</div>