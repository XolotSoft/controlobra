<div id="divForm">
	<form id="editBankForm" name="editBankForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre del Banco:</div>
        <input class="smallInput medium" name="bank" id="bank" type="text" size="50" value="{$info.bank}"/>
        <hr />
        
        <div style="width:30%;float:left">* No. de Cuenta:</div>
        <input class="smallInput medium" name="accountNumber" id="accountNumber" type="text" size="50" value="{$info.accountNumber}"/>
        <hr />
        
        <div style="width:30%;float:left">Sucursal:</div>
        <input class="smallInput medium" name="branch" id="branch" type="text" size="50" value="{$info.branch}"/>
        <hr />
        
        <div style="width:30%;float:left">Titular:</div>
        <input class="smallInput medium" name="titular" id="titular" type="text" size="50" value="{$info.titular}"/>
        <hr />
        
        <div style="width:30%;float:left">CLABE:</div>
        <input class="smallInput medium" name="clabe" id="clabe" type="text" size="50" value="{$info.clabe}"/>
        <hr />
        
        <div style="width:30%;float:left">Saldo Inicial:</div>
        <div style="float:left">
        	<div id="inputSB" style="display:none">
        	<input class="smallInput small" name="startBalance" id="startBalance" type="text" size="50" value="{$info.startBalance}" />
            </div>
            <div id="txtSB">${$info.startBalanceF}</div>
        </div>
        <div style="float:left; padding-left:5px">
        	<input type="checkbox" id="editStartBalance" name="editStartBalance" value="1" onclick="EnableStartBalance()" />
            Modificar
        </div>
        <hr />
        
        <div style="width:30%;float:left">No. Consecutivo Cheque:</div>
        <input class="smallInput small" name="noCheque" id="noCheque" type="text" size="50" value="{$info.noCheque}" />
        <hr />
       
        <div style="width:30%;float:left">Proyecto:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumProject.tpl"}
        <a href="javascript:;" onclick="AddProject()">
        	<img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
        </a>
        <hr />
        
        <div align="center" id="enumBankProjects">
        {include file="{$DOC_ROOT}/templates/lists/bank-proyectos.tpl"}        
        </div>
        
        <div style="width:30%;float:left">Nombre de la Cuenta:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
        
        <div style="width:30%;float:left">* Tipo de Moneda:</div>
        {include file="{$DOC_ROOT}/templates/lists/enumCurrency.tpl"}
        <hr />
        
      <div style="clear:both"></div>

        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditBank"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditBank"/>
        <input type="hidden" id="id" name="id" value="{$info.bankId}" />
  	</fieldset>
	</form>
</div>