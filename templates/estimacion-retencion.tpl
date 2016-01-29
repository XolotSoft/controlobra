<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="estimacion">&nbsp;Pagos de Retenciones :: {$nomProy}</h1>
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
        <option value="0" {if $stER == "0"}selected{/if}>Pendiente</option>
        <option value="1" {if $stER == "1"}selected{/if}>Revisado</option>
        </select>
        </div>
     	<br />
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/estimacion-payment.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>