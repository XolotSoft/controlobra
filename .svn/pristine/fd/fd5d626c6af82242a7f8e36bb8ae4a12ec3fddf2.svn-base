<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="estimacion">&nbsp;Ejecuci&oacute;n de Pagos :: {$nomProy}</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center">
        <table width="300" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td>
                <div align="center">
                <b>Tipo:</b>
                <select name="stTipo" id="stTipo" onchange="RefreshTipo()">
                <option value="N" {if $stTipo == "N"}selected{/if}>Normal</option>
                <option value="R" {if $stTipo == "R"}selected{/if}>Retenci&oacute;n</option>
                </select>
                </div>
            </td>
        	<td>            
                <div align="center">
                <b>Status:</b>
                <select name="status" id="status" onchange="Refresh()">
                <option value="0" {if $stEdoP == "0"}selected{/if}>Pendiente</option>
                <option value="1" {if $stEdoP == "1"}selected{/if}>Pagado</option>
                </select>
                </div>
            </td>
        </tr>
        </table>
        </div>
        
        <br />
        
        <div class="portlet-content nopadding borderGray" id="contenido">
          
          {include file="lists/estimacion-dopayment.tpl"}            
        
        </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>