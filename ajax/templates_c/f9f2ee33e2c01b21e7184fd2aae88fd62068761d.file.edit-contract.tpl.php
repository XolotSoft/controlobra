<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/forms/edit-contract.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13161358215699624a7b6267-37441819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9f2ee33e2c01b21e7184fd2aae88fd62068761d' => 
    array (
      0 => '/var/www//controlobra/templates/forms/edit-contract.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '13161358215699624a7b6267-37441819',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
	<form id="editContractForm" name="editContractForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editContractForm" />
    <input type="hidden" name="projectId" id="projectId" value="<?php echo $_smarty_tpl->getVariable('infP')->value['projectId'];?>
" />
    <fieldset>
        
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td align="center">* No. de Contrato</td>            
            <td align="center">Fecha Inicio Contrato</td>
            <td align="center">* Tipo Cliente</td>
        </tr>
        <tr>
        	<td align="center">
            <input class="smallInput small" name="noContract" id="noContract" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['noContract'];?>
"/>
            </td>            
            <td align="center">
            <div style="float:left">
              <input type="text" class="smallInput" name="fechaIniCont" id="fechaIniCont" maxlength="10" readonly="readonly" style="width:80px" value="<?php echo $_smarty_tpl->getVariable('info')->value['fechaIniCont'];?>
"/>
              </div>
              <div style="float:left">
              <a href="javascript:void(0)" onclick="NewCal('fechaIniCont','ddmmmyyyy')">
              <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
            </div>
            </td>
            <td align="center">
            <select class="smallInput" name="tipoClte" id="tipoClte">
            <option value="">Seleccione</option>
            <option value="Cliente" <?php if ($_smarty_tpl->getVariable('info')->value['tipoClte']=="Cliente"){?>selected<?php }?>>Cliente</option>
            <option value="Inversionista" <?php if ($_smarty_tpl->getVariable('info')->value['tipoClte']=="Inversionista"){?>selected<?php }?>>Inversionista</option>
            <option value="Accionista" <?php if ($_smarty_tpl->getVariable('info')->value['tipoClte']=="Accionista"){?>selected<?php }?>>Accionista</option>
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
                	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumProjItemCont.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
            </td>            
            <td align="center">
            	<div id="enumAreas">        
                	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumAreasCont.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
            </td>
            <td align="center">
                <div id="txtM2Depto"><?php echo $_smarty_tpl->getVariable('info')->value['m2Depto'];?>
</div>
                <input type="hidden" name="m2Depto" id="m2Depto" value="<?php echo $_smarty_tpl->getVariable('info')->value['m2Depto'];?>
" />
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
				<input class="smallInput small" name="total" id="total" type="text" size="50" onblur="FormatField('total')" value="<?php echo $_smarty_tpl->getVariable('info')->value['totalF'];?>
"/>
                <input type="hidden" name="abono" id="abono" value="<?php echo $_smarty_tpl->getVariable('info')->value['total'];?>
"/>
            </td>
            <td align="center">
            	<div id="txtSaldo"></div>
                <input type="hidden" name="saldo" id="saldo" value="<?php echo $_smarty_tpl->getVariable('info')->value['saldo'];?>
" />
            </td>
            <td align="center">
            	<div id="txtPriceM2">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['priceM2'],2,'.',',');?>
</div>            
            	<input name="priceM2" id="priceM2" type="hidden" value="0" value="<?php echo $_smarty_tpl->getVariable('info')->value['priceM2'];?>
"/>
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
				<input class="smallInput small" name="noTerrazas" id="noTerrazas" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['noTerrazas'];?>
"/>
            </td>
            <td align="center">
            	<input class="smallInput small" name="jardines" id="jardines" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['jardines'];?>
"/>
            </td>
            <td align="center">
            	<input class="smallInput small" name="noCajones" id="noCajones" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['noCajones'];?>
"/>
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
				<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumCustomer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </td>
            <td align="center">
                <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumCurrency.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </td>
            <td align="center">
            	<input class="smallInput small" name="noBodegas" id="noBodegas" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['noBodegas'];?>
"/>
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
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" /></a>
            </div>
            </td>
            <td align="center">&nbsp;</td>
            <td align="center">
            <div style="float:left">Bodegas</div>
            <div style="float:right">
            <a href="javascript:void(0)" onclick="AddBodega()" title="Agregar Bodega">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />
            </div>
            </td>
        </tr>
        <tr>
        	<td align="center" valign="top">
				<div id="listCajones"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/contract-cajones.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
            </td>
            <td align="center">&nbsp;</td>
            <td align="center" valign="top">
            	<div id="listBodegas"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/contract-bodegas.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
            </td>
        </tr>
        </table>        
        <br />
         
        <div align="center">        
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/contract-expiries-enganche.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

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
            <td><div align="center"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumPeriodos.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div></td>
            <td><div style="float:left">
              <input type="text" class="smallInput" name="fechaIniPagos" id="fechaIniPagos" maxlength="10" readonly="readonly" style="width:80px" value="<?php echo $_smarty_tpl->getVariable('info')->value['fechaIniPagos'];?>
"/>
              </div>
              <div style="float:left">
              <a href="javascript:void(0)" onclick="NewCal('fechaIniPagos','ddmmmyyyy')">
              <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
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
        		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />Agregar Documento
            </a>
        </div>
        <input type="hidden" name="ordDocs" id="ordDocs" value="0" />
        <div align="center" id="listExpiries">        
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/contract-expiries.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>       
        <br />
        
        <div align="center" id="txtSaldoFinal"><b>Saldo de Documentos:</b> $<?php echo $_smarty_tpl->getVariable('info')->value['saldoFinal'];?>
</div>
        <br />
        
        <div align="center" id="listExpiries">        
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/contract-expiries-ext.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>       
        <br />
        
        <div align="center" id="txtSaldoFinal"><b>Observaciones:</b></div>
        
        <div align="center">
        <textarea class="smallInput" style="width:400px" rows="5" name="notas" id="notas"><?php echo $_smarty_tpl->getVariable('info')->value['notas'];?>
</textarea>
        </div>

      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditContract"><span>Actualizar</span></a>           
     	</div>            
        <input type="hidden" id="type" name="type" value="saveEditContract"/>
        <input type="hidden" id="projLevelId" name="projLevelId" value="<?php echo $_smarty_tpl->getVariable('info')->value['projLevelId'];?>
" />
        <input type="hidden" id="contractId" name="contractId" value="<?php echo $_smarty_tpl->getVariable('info')->value['contractId'];?>
" />
  	</fieldset>
	</form>
</div>
