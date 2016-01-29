<div class="grid_16" id="content">
   
  <div class="grid_9" style="width:410px">
  <h1 class="resumenes">Materiales</h1>
  </div>
  
  <div style="float:left; margin-top:18px">
  	<a href="{$WEB_ROOT}/resumen-gastos-menu"><< Regresar</a>
  </div>
  {*}
  <div class="grid_6" id="eventbox">
      <a href="{$WEB_ROOT}/material-print" class="inline_print" target="_blank">Imprimir Resumen</a>
  </div>
  {*}
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
     
     	<div align="center">
        {include file="forms/search-material-resumen-gastos.tpl"}
        </div>
     	<br />
        
        {include file="boxes/loader.tpl"}
     
      <div class="portlet-content nopadding" id="contenido">
          
          {include file="lists/material-resumen-gastos.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>
  
  <br />
  <div align="center"><a href="{$WEB_ROOT}/resumen-gastos-menu"><< Regresar</a></div>

</div>