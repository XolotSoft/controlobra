<div id="divForm">
	<form id="editAddressForm" name="editAddressForm" method="post">
    <fieldset>        
                
        <div style="width:30%;float:left">* Calle:</div>
        <input class="smallInput medium" name="street" id="street" type="text" size="50" value="{$info.street}"/>
        <hr />
        
        <div style="width:30%;float:left">No. Exterior:</div>
        <input class="smallInput small" name="noExt" id="noExt" type="text" size="50" value="{$info.noExt}"/>
        <hr />
        
        <div style="width:30%;float:left">No. Interior:</div>
        <input class="smallInput small" name="noInt" id="noInt" type="text" size="50" value="{$info.noInt}"/>
        <hr />
        
        <div style="width:30%;float:left">C&oacute;digo Postal:</div>
        <input class="smallInput small" name="postalCode" id="postalCode" type="text" size="50" value="{$info.postalCode}"/>
        <hr />
        
        <div style="width:30%;float:left">Colonia:</div>
        <input class="smallInput small" name="colonia" id="colonia" type="text" size="50" value="{$info.colonia}"/>
        <hr />
        
        <div style="width:30%;float:left">Estado:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumState.tpl"}
        <hr />        
        
        <div style="width:30%;float:left">Ciudad:</div>
        <div id="listCities">{include file="{$DOC_ROOT}/templates/lists/enumCity.tpl"}</div>
        
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditAddress"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditAddress"/>
        <input type="hidden" id="id" name="id" value="{$info.custAddressId}" />
  	</fieldset>
	</form>
</div>