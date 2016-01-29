<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Ordenes de Compra Enviadas :: {$nomProy}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
      <div align="center">
      {include file="{$DOC_ROOT}/templates/forms/search-ord-comp-env.tpl"}
      </div>
      
      <div id="loader" align="center" style="padding:10px; display:none">
      	<img src="{$WEB_ROOT}/images/loading.gif" />
        <br />
        Cargando...
      </div>
      <br />
      
        <div align="center">
        <table width="80%" cellpadding="0" cellspacing="0" border="0">
        <tr>
        	<td align="center">Status:</td>
            <td align="center">Fecha de Entrega:</td>
        </tr>
        </table>
        <b>Status:</b>
        <select name="status" id="status" onchange="Refresh()">
        <option value="NoEnviado" {if $stOrdBuyS == "NoEnviado"}selected{/if}>No Enviado</option>
        <option value="Enviado" {if $stOrdBuyS == "Enviado"}selected{/if}>Enviado</option>
        </select>
        </div>
     	<br />
        
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/order-buy-send.tpl"}            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>