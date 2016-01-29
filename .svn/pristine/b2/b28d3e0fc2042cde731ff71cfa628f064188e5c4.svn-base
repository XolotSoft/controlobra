<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Pedidos :: {$nomProy}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" onclick="DoOrderBuy()" class="inline_add">Generar Orden de Compra</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  
  		<div align="center">
        <b>Status:</b>
        <select name="status" id="status" onchange="Refresh()">
        <option value="Pendiente" {if $stReqP == "Pendiente"}selected{/if}>Pendiente</option>
        <option value="Completo" {if $stReqP == "Completo"}selected{/if}>Completo</option>
        </select>
        </div>
     	<br />
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/requisicion-pedidos2.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>