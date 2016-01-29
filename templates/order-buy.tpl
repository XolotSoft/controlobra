<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Ordenes de Compra :: {$nomProy}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center">
        <b>Status:</b>
        <select name="status" id="status" onchange="Refresh()">
        <option value="Pendiente" {if $stOrdBuy == "Pendiente"}selected{/if}>Pendiente</option>
        <option value="Confirmado" {if $stOrdBuy == "Confirmado"}selected{/if}>Confirmado</option>
        <option value="Completo" {if $stOrdBuy == "Completo"}selected{/if}>Completo</option>
        </select>
        </div>
     	<br />
        
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/order-buy.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>