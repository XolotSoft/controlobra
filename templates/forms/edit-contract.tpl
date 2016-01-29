<div id="divForm">
	<form id="editContractForm" name="editContractForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editContractForm" />
    <input type="hidden" name="projectId" id="projectId" value="{$infP.projectId}" />
    <fieldset>
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">* No. de Contrato</td>            
            <td align="center">Fecha Inicio Contrato</td>
            <td align="center">* Tipo Cliente</td>
        </tr>
        <tr>
        	<td align="center">
            <input class="smallInput small" name="noContract" id="noContract" type="text" size="50" value="{$info.noContract}"/>
            </td>            
            <td align="center">
            <div style="float:left">
              <input type="text" class="smallInput" name="fechaIniCont" id="fechaIniCont" maxlength="10" readonly="readonly" style="width:80px" value="{$info.fechaIniCont}"/>
              </div>
              <div style="float:left">
              <a href="javascript:void(0)" onclick="NewCal('fechaIniCont','ddmmmyyyy')">
              <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
            </div>
            </td>
            <td align="center">
            <select class="smallInput" name="tipoClte" id="tipoClte">
            <option value="">Seleccione</option>
            <option value="Cliente" {if $info.tipoClte == "Cliente"}selected{/if}>Cliente</option>
            <option value="Inversionista" {if $info.tipoClte == "Inversionista"}selected{/if}>Inversionista</option>
            <option value="Accionista" {if $info.tipoClte == "Accionista"}selected{/if}>Accionista</option>
            </select>
            </td>
        </tr>
        </table>        
         <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">Torre</td>            
            <td align="center">Departamento</td>
            <td align="center">m2 Depto.</td>
        </tr>
        <tr>
        	<td align="center">
                <div id="listItems">
                	{include file="{$DOC_ROOT}/templates/lists/enumProjItemCont.tpl"}
                </div>
            </td>            
            <td align="center">
            	<div id="enumAreas">        
                	{include file="{$DOC_ROOT}/templates/lists/enumAreasCont.tpl"}
                </div>
            </td>
            <td align="center">
                <div id="txtM2Depto">{$info.m2Depto}</div>
                <input type="hidden" name="m2Depto" id="m2Depto" value="{$info.m2Depto}" />
            </td>
        </tr>
        </table>        
         <br /> 
               
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">* Valor Total</td>
            <td align="center"></td>
            <td align="center">Precio m2</td>
        </tr>
        <tr>
        	<td align="center">
				<input class="smallInput small" name="total" id="total" type="text" size="50" onblur="FormatField('total')" value="{$info.totalF}"/>
                <input type="hidden" name="abono" id="abono" value="{$info.total}"/>
            </td>
            <td align="center">
            	<div id="txtSaldo"></div>
                <input type="hidden" name="saldo" id="saldo" value="{$info.saldo}" />
            </td>
            <td align="center">
            	<div id="txtPriceM2">${$info.priceM2|number_format:2:'.':','}</div>            
            	<input name="priceM2" id="priceM2" type="hidden" value="0" value="{$info.priceM2}"/>
            </td>
        </tr>
        </table>        
        <br />
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">m2 de Terrazas</td>
            <td align="center">m2 de Jardines</td>
            <td align="center">No. de Cajones de Est.</td>
        </tr>
        <tr>
        	<td align="center">
				<input class="smallInput small" name="noTerrazas" id="noTerrazas" type="text" size="50" value="{$info.noTerrazas}"/>
            </td>
            <td align="center">
            	<input class="smallInput small" name="jardines" id="jardines" type="text" size="50" value="{$info.jardines}"/>
            </td>
            <td align="center">
            	<input class="smallInput small" name="noCajones" id="noCajones" type="text" size="50" value="{$info.noCajones}"/>
            </td>
        </tr>
        </table>        
        <br />
        
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">* Cliente</td>
            <td align="center">* Moneda</td>
            <td align="center">No. de Bodegas</td>
        </tr>
        <tr>
        	<td align="center">
				{include file="{$DOC_ROOT}/templates/lists/enumCustomer.tpl"}
            </td>
            <td align="center">
                {include file="{$DOC_ROOT}/templates/lists/enumCurrency.tpl"}
            </td>
            <td align="center">
            	<input class="smallInput small" name="noBodegas" id="noBodegas" type="text" size="50" value="{$info.noBodegas}"/>
            </td>
        </tr>
        </table>        
        <br />
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
        <tr>
        	<td align="center">
            <div style="float:left">Cajones de Est.</div>
            <div style="float:right">
            <a href="javascript:void(0)" onclick="AddCajon()" title="Agregar Caj&oacute;n">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" /></a>
            </div>
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">
            <div style="float:left">Bodegas</div>
            <div style="float:right">
            <a href="javascript:void(0)" onclick="AddBodega()" title="Agregar Bodega">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />
            </div>
            </td>
        </tr>
        <tr>
        	<td align="center" valign="top">
				<div id="listCajones">{include file="{$DOC_ROOT}/templates/lists/contract-cajones.tpl"}</div>
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" valign="top">
            	<div id="listBodegas">{include file="{$DOC_ROOT}/templates/lists/contract-bodegas.tpl"}</div>
            </td>
        </tr>
        </table>        
        <br />
         
        <div align="center">        
        {include file="{$DOC_ROOT}/templates/lists/contract-expiries-enganche.tpl"}
        </div>       
        <br />
         
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td colspan="6" align="center"><div align="center"><b>DOCUMENTOS</b></div></td>
        </tr>
        <tr><td colspan="6" height="8"></td></tr>
        <tr>
        	<td><div align="center">No. de Docs.</div></td>
            <td><div align="center">Monto $</div></td>
            <td><div align="center">Plazo.</div></td>
            <td><div align="center">Periodo</div></td>
            <td><div align="center">Fecha Ini. Pagos</div></td>
            <td></td>
        </tr>
        <tr>
        	<td><div align="center">
            <input class="smallInput small" name="noDocs" id="noDocs" type="text" style="width:80px"/></div></td>
            <td><div align="center">
            <input class="smallInput small" name="monto" id="monto" type="text" style="width:80px" onblur="FormatField('monto')"/></div></td>
            <td><div align="center">
            <input class="smallInput small" name="plazo" id="plazo" type="text" style="width:80px"/></div></td>
            <td><div align="center">{include file="{$DOC_ROOT}/templates/lists/enumPeriodos.tpl"}</div></td>
            <td><div style="float:left">
              <input type="text" class="smallInput" name="fechaIniPagos" id="fechaIniPagos" maxlength="10" readonly="readonly" style="width:80px" value="{$info.fechaIniPagos}"/>
              </div>
              <div style="float:left">
              <a href="javascript:void(0)" onclick="NewCal('fechaIniPagos','ddmmmyyyy')">
              <img src="{$WEB_ROOT}/images/icons/calendar.gif" /></a>
            </div>
            </td>
            <td><div align="center">
            <input type="button" name="addDocs" value="Generar" onclick="LoadExpiries()" style="width:70px; height:30px" /></div>
            </td>            
        </tr>
        </table>
        <br />
        
        <div align="center">
        	<a href="javascript:void(0)" onclick="AddExpiry()">            
        		<img src="{$WEB_ROOT}/images/icons/add.png" border="0" />Agregar Documento
            </a>
        </div>
        <input type="hidden" name="ordDocs" id="ordDocs" value="0" />
        <div align="center" id="listExpiries">        
        {include file="{$DOC_ROOT}/templates/lists/contract-expiries.tpl"}
        </div>       
        <br />
        
        <div align="center" id="txtSaldoFinal"><b>Saldo de Documentos:</b> ${$info.saldoFinal}</div>
        <br />
        
        <div align="center" id="listExpiries">        
        {include file="{$DOC_ROOT}/templates/lists/contract-expiries-ext.tpl"}
        </div>       
        <br />
        
        <div align="center" id="txtSaldoFinal"><b>Observaciones:</b></div>
        
        <div align="center">
        <textarea class="smallInput" style="width:400px" rows="5" name="notas" id="notas">{$info.notas}</textarea>
        </div>

      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditContract"><span>Actualizar</span></a>           
     	</div>            
        <input type="hidden" id="type" name="type" value="saveEditContract"/>
        <input type="hidden" id="projLevelId" name="projLevelId" value="{$info.projLevelId}" />
        <input type="hidden" id="contractId" name="contractId" value="{$info.contractId}" />
  	</fieldset>
	</form>
</div>
