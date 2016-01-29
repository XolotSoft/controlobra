<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="catalogos">Documentos :: {$info.name}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      &nbsp;
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
         
      	<div align="center">
        
            {if $errMsg}
            	<br />
                <span style="color:#F00">{$errMsg}</span>
            {elseif $cmpMsg}
            	<br />
                <span style="color:#090">{$cmpMsg}</span>
            {/if}
                                      
            {include file="{$DOC_ROOT}/templates/forms/add-customer-doc.tpl"}
       
        </div>
        <br />
      </div>
      <br />
      
      <div id="listDocs">
      {include file="{$DOC_ROOT}/templates/lists/customer-doc.tpl"}
      </div>
      
      <br />
      <div align="center"><a href="{$WEB_ROOT}/customer/p/{$p}">Regresar</a></div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>