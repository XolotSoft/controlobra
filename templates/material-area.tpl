<div class="grid_16" id="content">
    
  <div class="grid_9" style="width:410px">
  <h1 class="resumenes">Materiales por Area</h1>
  </div>
  
   <div style="float:left; margin-top:18px">
  	<a href="{$WEB_ROOT}/resumen-presupuestos-menu"><< Regresar</a>
  </div>
    
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center" id="divFrm">
        {include file="forms/search-concept-area.tpl"}
        </div>
     	<br />
        
        {include file="boxes/loader.tpl"}
        
      <div class="portlet-content nopadding" id="contenido" style="width:900px; height:300px; overflow:scroll">
          
          {include file="lists/mat-resumen-item.tpl"}
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>
  
  <br />
  <div align="center"><a href="{$WEB_ROOT}/resumen-presupuestos-menu"><< Regresar</a></div>

</div>