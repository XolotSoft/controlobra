<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="materiales">Materiales</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addMaterialDiv">Agregar Material</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  
  		<div align="center">
        {include file="forms/search-material.tpl"}
        </div>
     	<br />
     	
        {include file="boxes/loader.tpl"}
        
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/material.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>