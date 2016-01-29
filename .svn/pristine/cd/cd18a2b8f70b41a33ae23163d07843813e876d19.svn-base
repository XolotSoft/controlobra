<div id="divForm">
	<form id="addPedidoForm" name="addPedidoForm" method="post">
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
                
        <div style="width:30%;float:left">Material:</div>        	
        {$info.material}
        <hr />
        
        <div style="width:30%;float:left">Cantidad:</div>
        {$info.quantity} {$info.unit}
        <hr />
        
        <div style="width:30%;float:left">Saldo:</div>
        {$info.saldo} {$info.unit}
        <hr />
                        
		<div style="width:30%;float:left">* Solicitado:</div>
        <input class="smallInput small" name="pedido" id="pedido" type="text" size="50"/>
        <hr />
        
        <div style="width:30%;float:left">* Proveedor:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumSupplierReq.tpl"}       
        <hr />
        
        <div style="width:30%;float:left">* Precio Unitario:</div>
        <input class="smallInput small" name="price" id="price" type="text" size="50"/>
       
                          
      <div style="clear:both"></div>
			 <hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddPedido"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddPedido"/>
        <input type="hidden" id="conceptId" name="conceptId" value="{$info.conceptId}"/>
        <input type="hidden" id="requisicionId" name="requisicionId" value="{$info.requisicionId}"/>
        <input type="hidden" id="conceptMatId" name="conceptMatId" value="{$info.conceptMatId}"/>
        <input type="hidden" id="saldo" name="saldo" value="{$info.saldo}" />
  	</fieldset>
	</form>
</div>
