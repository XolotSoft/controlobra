<div id="divForm">
        
        <form id="addPedidosForm" name="addPedidosForm" method="post">
    	<fieldset>                       
        <div style="width:30%;float:left"><b>Concepto:</b></div>
        <div style="float:left">{$info.concepto}</div>
        <br style="clear:both" />
        <hr />
        
        <div align="center"><b>MATERIALES</b></div>
                     
        {include file="{$DOC_ROOT}/templates/lists/enumMatPedidos.tpl"}        
               
        <input type="hidden" id="type" name="type" value=""/>
        <input type="hidden" id="requisicionId" name="requisicionId" value="{$info.requisicionId}"/>
        </fieldset>
        </form>                                
        		
        <div style="clear:both"></div>
			<hr />
        <div class="formLine" style="text-align:center; margin-left:300px;">            
            <a class="button_grey" id="btnSave"><span>Guardar</span></a>           
     	</div> 
                          
      <div style="clear:both"></div>
      
      <div style="margin-bottom:10px"></div>
      
</div>
