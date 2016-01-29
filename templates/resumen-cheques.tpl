<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Cheques :: {$nomProy}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  	
      <div align="center">
      {include file="{$DOC_ROOT}/templates/forms/search-resumen-cheques.tpl"}
      </div>
      
      <div id="loader" align="center" style="padding:10px; display:none">
      	<img src="{$WEB_ROOT}/images/loading.gif" />
        <br />
        Cargando...
      </div>
      <br />
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/resumen-cheques.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>