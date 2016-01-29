<div id="divForm">
	<form id="editAllMatForm" name="editAllMatForm" method="post">
    <fieldset>
                
     	<div align="center">
        <table width="500" cellpadding="0" cellspacing="0">
        <tr>
        	<td valign="top" width="150">
            <b>Orden de Compra No:</b> 
            <br />
            <b>Proveedor:</b> 
            </td>
            <td>
            &nbsp;{$info.orderBuyId}
            <br />
            &nbsp;{$info.supplier}
            </td>         
        </tr>
        </table>
        </div>   
        
        <br />           
     
      
      <div align="center" id="listEntrega">
      {include file="{$DOC_ROOT}/templates/lists/material-all-entregas.tpl"}
      </div>
      
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnSave"><span>Guardar</span></a>           
     	</div>
        <input type="hidden" id="orderBuyId" name="orderBuyId" value="{$info.orderBuyId}" />
        <input type="hidden" id="type" name="type" value="saveAllMaterials"/>
  	</fieldset>
	</form>
</div>
