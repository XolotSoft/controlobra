<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="catalogos">PDF :: {$info.supplier}</h1>
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
         <br />
         <div align="center"><h3>.:: {$info.project} ::.</h3></div>
         <br />
      	<div align="center">
        
            {if $errMsg}
                <span style="color:#F00">{$errMsg}</span>
                <br /><br />
            {elseif $cmpMsg}
                <span style="color:#090">{$cmpMsg}</span>
                <br /><br />
            {/if}
            
             {if $info.pdf != ''}
              <a href="{$WEB_ROOT}/archivos/pdf2/{$info.pdf}" target="_blank">
              <img src="{$WEB_ROOT}/images/pdf.png" border="0" /></a>
              {else}
                  Ning&uacute;n archivo encontrado.
              {/if}
                          
            {include file="{$DOC_ROOT}/templates/forms/add-supplier-pdf2.tpl"}
       
        </div>
        <br />
      </div>
      
      <br />
      <div align="center"><a href="{$WEB_ROOT}/supplier/p/{$p}">Regresar</a></div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>