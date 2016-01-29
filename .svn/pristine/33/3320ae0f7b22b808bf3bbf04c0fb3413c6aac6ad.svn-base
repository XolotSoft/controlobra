Event.observe(window, 'load', function() {
	
	Event.observe($('addPaymentDiv'), "click", AddPaymentDiv);
	
	AddEditPaymentListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeletePaymentPopup(id);
			return;
		}
		
		del = el.hasClassName('spanView');
		if(del == true)
		{
			ViewPaymentPopup(id);
		}
	}

	$('contenido').observe("click", AddEditPaymentListeners);																	 

});

function AddPaymentDiv()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php', 
	{
		method:'post',
		parameters: {type: "addPayment"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddPayment'), "click", AddPayment);
				Event.observe($('fviewclose'), "click", function(){ HideFview(); });
				
				LoadItems();				
			}
			else
			{	
				ShowStatusPopUp(splitResponse[1]);
				HideFview();
			}
			
			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPayment()
{
	$("type").value = "saveAddPayment";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php', 
	{
		method:'post',
		parameters: $('addPaymentForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
				HideFview();
				TableKit.reloadTable('tblContract');				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function ViewPaymentPopup(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php', 
	{
		method:'post',
		parameters: {type: "viewPayment", contPaymentId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnCerrarPayment'), "click", function(){ HideFview(); });
				Event.observe($('fviewclose'), "click", function(){ HideFview(); });				
			}
			else
			{	
				ShowStatusPopUp(splitResponse[1]);
				HideFview();
			}
			
			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeletePaymentPopup(id)
{
	
	var message = "Realmente deseas eliminar este pago?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
			method:'post',
			parameters: {type: "deletePayment", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
		
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				HideFview();	
				TableKit.reloadTable('tblContract');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadItems()
{		
	var idProject = $("projectId").value;
	var idCustomer = $("customerId").value;
					
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadItems", projectId:idProject, customerId:idCustomer},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
 		      $('enumAreas').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('listItems').innerHTML = splitResponse[1];
			  $('enumAreas').innerHTML = splitResponse[2];
			  			  
			  UpdateData();				  
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadAreas()
{	
	var idProject = $("projectId").value;
	var idCustomer = $("customerId").value;
	var idProjItem = $("projItemId").value;
					
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadAreas", projectId:idProject, projItemId:idProjItem, customerId:idCustomer},
		  onLoading: function(){
			  $('enumAreas').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumAreas').innerHTML = splitResponse[1];
			  $("contractId").value = 0;
			  
			  UpdateData();
			  			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadAreas2()
{	
	var idProject = $("projectId").value;
	var idProjItem = $("projItemId2").value;
					
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadAreas2", projectId:idProject, projItemId:idProjItem},
		  onLoading: function(){
			  $('enumAreas2').innerHTML = LOADER;
			  $('enumClte').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumAreas2').innerHTML = splitResponse[1];
			  $('enumClte').innerHTML = splitResponse[2];
			  
	 	      UpdateData();			 			  
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadCustomer()
{	
	var idProject = $("projectId").value;
	var idProjItem = $("projItemId2").value;
	var idProjDepto = $("projDeptoId2").value;
				
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadCustomer", projectId:idProject, projItemId:idProjItem, projDeptoId:idProjDepto},
		  onLoading: function(){
			  $('enumClte').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumClte').innerHTML = splitResponse[1];
			  $("contractId").value = 0;			 			  
			  
			  UpdateData();	
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateData()
{	
	var idProject = $("projectId").value;
	var tipo = $("tipo").value;
	var vQuantity = $("quantity").value;
	
	if(tipo == "Clte"){
		var idCustomer = $("customerId").value;
		var idProjItem = $("projItemId").value;
		var idProjDepto = $("projDeptoId").value;
	}else{
		var idCustomer = $("customerId2").value;
		var idProjItem = $("projItemId2").value;
		var idProjDepto = $("projDeptoId2").value;
	}
		
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"updateData", projectId:idProject, projItemId:idProjItem, customerId:idCustomer, projDeptoId:idProjDepto, quantity:vQuantity},
		  onLoading: function(){
			  $('txtMant').innerHTML = LOADER;
			  $('txtEquip').innerHTML = LOADER;
			  $('txtSaldoVencido').innerHTML = LOADER;
			  $('txtSaldoVigente').innerHTML = LOADER;
			  $('txtSaldoFuturo').innerHTML = LOADER;
			  $('txtPago').innerHTML = LOADER;
			  $('txtOperacionTotal').innerHTML = LOADER;
			  $('saldoTotal').innerHTML = LOADER;
			  $('pagoTotal').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
		
			  $("contractId").value = splitResponse[1];
			  $('txtMant').innerHTML = splitResponse[2];
			  $('txtEquip').innerHTML = splitResponse[3];
			  $('txtSaldoVencido').innerHTML = splitResponse[4];
			  $('txtSaldoVigente').innerHTML = splitResponse[5];
			  $('txtSaldoFuturo').innerHTML = splitResponse[6];
			  $('txtPago').innerHTML = splitResponse[7];
			  $('txtOperacionTotal').innerHTML = splitResponse[8];
			  $('txtSaldoTotal').innerHTML = splitResponse[9];
			  $('txtPagoTotal').innerHTML = splitResponse[10];			  
			  $("currency").selectedIndex = splitResponse[11];
			  
			  LoadBanks();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function UpdatePagoTotal()
{	
	var idProject = $("projectId").value;
	var idContract = $("contractId").value;
	var valQuantity = $("quantity").value;
	
	var chkSaldoMant = 0;	
	if($("chkSaldoMant").checked == true)
		chkSaldoMant = 1;
		
	var chkSaldoEquip = 0;
	if($("chkSaldoEquip").checked == true)
		chkSaldoEquip = 1;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"updatePagoTotal", projectId:idProject, contractId:idContract, quantity:valQuantity, chkMant:chkSaldoMant, chkEquip:chkSaldoEquip},
		  onLoading: function(){
			  
			  $('txtPagoTotal').innerHTML = LOADER;
			  $('txtSaldoTotal').innerHTML = LOADER;
			  $('opMant').innerHTML = LOADER;
			  $('opEquip').innerHTML = LOADER;
			  $('opSaldoVencido').innerHTML = LOADER;
			  $('opSaldoVigente').innerHTML = LOADER;
			  $('opAbonoTotal').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtPagoTotal').innerHTML = splitResponse[1];
			  $('txtSaldoTotal').innerHTML = splitResponse[2];
			  $('opMant').innerHTML = splitResponse[3];
			  $('opEquip').innerHTML = splitResponse[4];
			  $('opSaldoVencido').innerHTML = splitResponse[5];
			  $('opSaldoVigente').innerHTML = splitResponse[6];
			  $('opSaldoFuturo').innerHTML = splitResponse[7];
			  $('opAbonoTotal').innerHTML = splitResponse[13];
			  
			  $('abonoMant').value = splitResponse[8];
			  $('abonoEquip').value = splitResponse[9];
			  $('abonoSaldoVencido').value = splitResponse[10];
			  $('abonoSaldoVigente').value = splitResponse[11];
			  $('abonoSaldoFuturo').value = splitResponse[12];			 
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadBanks(){
	
	var idProject = $("projectId").value;
	var vCurrency = $("currency").value;
	var vContractId = $("contractId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadBanks", projectId:idProject, currency:vCurrency, contractId:vContractId},
		  onLoading: function(){
			  $('enumBanks').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  if(splitResponse[1] == 1){
				  $("txtTipoCambio").show();
				  $("tipoCambio").show();
			  }else{
				  $("txtTipoCambio").hide();
				  $("currencyExchange").value = '';
				  $("tipoCambio").hide();
			  }
			
			  $('enumBanks').innerHTML = splitResponse[2];			 	
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function ToogleTipo(){
	
	var tipo = $("tipo").value;
	
	if(tipo == "Clte"){
		$("tipoClte").style.display = '';
		$("tipoDepto").style.display = 'none';
	}else{
		$("tipoClte").style.display = 'none';
		$("tipoDepto").style.display = '';
		LoadAreas2();
	}
	
	UpdateData();
}

function FormatField(field){
	
	var valor = $(field).value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"formatNumber", valor:valor},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$(field).value = splitResponse[1];
				
				if(field == "quantity")
					UpdatePagoTotal();				
	
			}
			else
			{
				alert("Ocurrio un error al formatear el valor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function ToogleObs(){
	
	var concepto = $("concepto").value;
	
	if(concepto == "Otros")
		$("divObs").style.display = '';
	else
		$("divObs").style.display = 'none';
		
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}