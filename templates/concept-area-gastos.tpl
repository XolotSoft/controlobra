<div class="grid_16" id="content">
    
  <div class="grid_9" style="width:410px">
  <h1 class="resumenes">Conceptos por Area</h1>
  </div>
  
  <div style="float:left; margin-top:18px">
  	<a href="{$WEB_ROOT}/resumen-gastos-menu"><< Regresar</a>
  </div>
    
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center">
        {include file="forms/search-concept-area.tpl"}
        </div>
     	<br />
        
        {include file="boxes/loader.tpl"}
        
      <div class="portlet-content nopadding" id="contenido" style="width:900px; height:300px; overflow:scroll">
          
          {include file="lists/concept-area-gastos-item.tpl"}
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>
  
  <br />
  <div align="center"><a href="{$WEB_ROOT}/resumen-gastos-menu"><< Regresar</a></div>

</div>