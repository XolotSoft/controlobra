<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="catalogos">Imagen :: {$info.name}</h1>
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
         <br /><br />
      	<div align="center">
        
            {if $errMsg}
                <span style="color:#F00">{$errMsg}</span>
                <br /><br />
            {elseif $cmpMsg}
                <span style="color:#090">{$cmpMsg}</span>
                <br /><br />
            {/if}
            
             {if $info.archivo != ''}
              <a href="{$WEB_ROOT}/images/customer/{$info.archivo}" target="_blank">
                  <img src="{$WEB_ROOT}/images/customer/{$info.archivo}" width="200" height="200" /></a>
              {else}
                  Ninguna imagen encontrada.
              {/if}
                          
            {include file="{$DOC_ROOT}/templates/forms/add-customer-img.tpl"}
       
        </div>
        <br />
      </div>
      
      <br />
      <div align="center"><a href="{$WEB_ROOT}/customer/p/{$p}">Regresar</a></div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>