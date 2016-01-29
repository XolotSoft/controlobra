<div id="divForm">
	<form id="editEntMatForm" name="editEntMatForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editEntMatForm" />
    <fieldset>
        
        <div align="center">
        <table width="500" cellpadding="0" cellspacing="0">
        <tr>
        	<td valign="top">
            <b>Orden de Compra No:</b> {$info.orderBuyId}
            <br /><b>Requisici&oacute;n No:</b> {$info.requisicionId}
            <br /><b>Concepto:</b> {$info.concept}
            </td>
            <td valign="top">
            <b>Torre: </b> {$info.torre}
            {foreach from=$info.torres item=itT key=kT}
            <br /><b>Nivel Torre {$itT.name}:</b> {$itT.level} AL {$itT.level2}
            {/foreach}
            
            {if $info.steel == 0}
            <br /><b>Tipo de Area:</b> {$info.type}
            {/if}
            </td>
        </tr>
        </table>
        </div>
        
        <hr />
        
        <div style="width:30%;float:left"><b>Material:</b></div>
        {$info.material}
        <hr />
                                             
        <div style="width:30%;float:left"><b>Solicitado:</b></div>
        {$info.quantity} {$info.unit}
        <hr />
        
        <div style="width:30%;float:left"><b>Recibido:</b></div>
        {$info.recibido} {$info.unit}
        <hr />
        
        <div style="width:30%;float:left"><b>Saldo:</b></div>
        {$info.saldo} {$info.unit}
        <hr />
                     
      <div align="center">
      <a href="javascript:void(0)" onclick="AddEntrega()">
      <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
      Agregar Nueva Entrega</a>
      </div>
      
      <div align="center" id="listEntrega">
      {include file="{$DOC_ROOT}/templates/lists/material-entregas.tpl"}
      </div>
      
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnSave"><span>Guardar</span></a>           
     	</div>
        <input type="hidden" id="ordBuyItemId" name="ordBuyItemId" value="{$info.ordBuyItemId}" />
        <input type="hidden" id="type" name="type" value="saveEditEntrega"/>
  	</fieldset>
	</form>
</div>
