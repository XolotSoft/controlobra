<div id="divForm">
	<form id="addSubTypeForm" name="addSubTypeForm" method="post">
    <fieldset>        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Factor de Redondeo:</div>
        <input class="smallInput small" name="redondeo" id="redondeo" type="text" size="50" onblur="UpdateAreas()"/>
        <hr />
        
        <div style="width:30%;float:left">Area Com&uacute;n:</div>
        <input class="smallInput small" name="comunArea" id="comunArea" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Area Real:</div>
        <input class="smallInput small" name="realArea" id="realArea" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">Area Venta:</div>
        <input class="smallInput small" name="ventaArea" id="ventaArea" type="text" size="50" onblur="UpdateAreaVenta()"/>
        <hr />
        
        <div style="width:30%;float:left">Area Terraza Real:</div>
        <input class="smallInput small" name="terrazaReal" id="terrazaReal" type="text" size="50" onblur="UpdateAreaTerraza()" />
        <hr />
        
        <div style="width:30%;float:left">Area Terraza Com&uacute;n:</div>
        <input class="smallInput small" name="terrazaComun" id="terrazaComun" type="text" size="50" />
        <hr />
        
        <div style="width:30%;float:left">Area Jard&iacute;n Real:</div>
        <input class="smallInput small" name="jardinReal" id="jardinReal" type="text" size="50" onblur="UpdateAreaJardin()" />
        <hr />
        
        <div style="width:30%;float:left">Area Jard&iacute;n Com&uacute;n:</div>
        <input class="smallInput small" name="jardinComun" id="jardinComun" type="text" size="50" />
        <hr />
        
        <div style="width:30%;float:left">Color:</div>
        <a href="javascript:void(0)" onclick="cp.select(document.addSubTypeForm.color,'pick');return false;" id="pick" style="border: 1px solid #000000; font-family:Verdana; font-size:10px; text-decoration: none; background-color:#FFFFFF">&nbsp;&nbsp;&nbsp;</a>
        <input id="color" size="7" type="hidden" name="color" value="#FFFFFF">
        <hr />
        
        <div style="width:30%;float:left">Abierta:</div>
        <input type="checkbox" name="abierta" id="abierta" value="1" />
        <hr />
                  
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddSubType"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddSubType"/>
        <input type="hidden" id="projectId" name="projectId" value="{$projectId}" />
        <input type="hidden" id="projTypeId" name="projTypeId" value="{$projTypeId}" />
  	</fieldset>
	</form>
</div>
