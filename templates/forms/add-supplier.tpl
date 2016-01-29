<div id="divForm">
	<form id="addSupplierForm" name="addSupplierForm" method="post">
    <input type="hidden" name="formName" id="formName" value="addSupplierForm" />
    <fieldset>        
        
        <div style="width:30%;float:left">* Tipo:</div> 
        {include file="{$DOC_ROOT}/templates/lists/enumTipoSup.tpl"}
        <hr />
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50"/>
        <hr />
                
        <div style="width:30%;float:left">Raz&oacute;n Social:</div>
        <input class="smallInput medium" name="razonSocial" id="razonSocial" type="text" size="50"/>
        <hr />
       
        <div style="width:30%;float:left">RFC:</div>
        <input class="smallInput medium" name="rfc" id="rfc" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Direcci&oacute;n:</div>
        <input class="smallInput medium" name="address" id="address" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Colonia:</div>
        <input class="smallInput medium" name="colonia" id="colonia" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Estado:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumState.tpl"}
        <hr />
        
        <div style="width:30%;float:left">Ciudad:</div>
        	<div id="listCities">{include file="{$DOC_ROOT}/templates/lists/enumCity.tpl"}</div>
        <hr />
        
        <div style="width:30%;float:left">C&oacute;digo Postal:</div>
        <input class="smallInput small" name="postalCode" id="postalCode" type="text" size="50"/>
        <hr />
        
        <div id="contacts">        
               
          <div align="right" style="padding-right:10px">
          <a href="javascript:void(0)" onclick="AddContact()">
          <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
          Agregar Nuevo Contacto</a>
          </div>
          
          <div align="center" id="listContact">
          {include file="{$DOC_ROOT}/templates/lists/supplier-contacts.tpl"}
          </div>      
        
        </div>
        
        <br />
        
        <div id="listProj" style="display:none">
        
        <div style="width:30%;float:left">Proyectos:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumSupProj.tpl"}
        <hr />
               
        </div>
        
      <div style="clear:both"></div>
			
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddSupplier"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddSupplier"/>
  	</fieldset>
	</form>
</div>
