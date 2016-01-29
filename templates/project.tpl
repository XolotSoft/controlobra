<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="proyectos">Proyectos</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="{$WEB_ROOT}/project-new" class="inline_add" id="addProjectDiv">Agregar Proyecto</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
   {if $msgOk}
   <p class="info" id="success" style="width:915px; margin-left:10px" onclick="hideMessage()">
   	<span class="info_inner">
    	{if $msgOk == 1}
    	El proyecto ha sido creado correctamente.
        {elseif $msgOk == 2}
        El proyecto ha sido actulizado correctamente.
        {elseif $msgOk == 3}
        El proyecto ha sido eliminado correctamente.
        {elseif $msgOk == 4}
        Los ejes fueron actualizados correctamente.
        {elseif $msgOk == 5}
        Los montos fueron actualizados correctamente.
        {elseif $msgOk == 6}
        Los cajones de est. y bodegas fueron actualizados correctamente.
        {/if}
    </span>
   </p>
   {/if}
   
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/project.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>