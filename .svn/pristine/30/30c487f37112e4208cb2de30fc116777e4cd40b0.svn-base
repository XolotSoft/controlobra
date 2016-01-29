Event.observe(window, 'load', function() {
	
	Event.observe($('addContractDiv'), "click", AddContractDiv);
	
	AddEditContractListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteContractPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditContractPopup(id);
		}
		
		del = el.hasClassName('spanCancel');
		if(del == true)
		{
			CancelContractPopup(id);
		}
	}

	$('contenido').observe("click", AddEditContractListeners);																	 

});

function AddContractDiv()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type: "addContract"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddContract'), "click", AddContract);
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

function AddContract()
{
	$("type").value = "saveAddContract";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $('addContractForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblContract');
				HideFview();				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditContractPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type: "editContract", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditContractPopup(0); });
			Event.observe($('btnEditContract'), "click", EditContract);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditContract()
{
	$("type").value = "saveEditContract";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $('editContractForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
		
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblContract');
				HideFview();
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);								
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function CancelContractPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type: "cancelContract", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditContractPopup(0); });
			Event.observe($('btnCancelContract'), "click", function(){ CancelContract(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function ViewCancelContractPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type: "viewCancelContract", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditContractPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ EditContractPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function CancelContract()
{	
	$("type").value = "saveCancelContract";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $('cancelContractForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblContract');
				HideFview();
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);								
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteContractPopup(id)
{
	
	var message = "Realmente deseas eliminar este contrato?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
			method:'post',
			parameters: {type: "deleteContract", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblContract');
				HideFview();	
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadAreas()
{	
	var idProject = $("projectId").value;
	var idProjItem = $("projItemId").value;
		
	$('enumAreas').innerHTML = "";
			
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',
		  parameters: {type:"loadAreas", projectId:idProject, projItemId:idProjItem},
		  onLoading: function(){
			  $('enumAreas').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumAreas').innerHTML = splitResponse[1];				  
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateSaldo()
{
	var saldo = 0;
	var valTotal = $("total").value;
	var valAbono = $("abono").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',		 
		  parameters: {type:"getSaldo", abono:valAbono, total:valTotal},
		  onLoading: function(){
			  //$('txtSaldo').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  //$("txtSaldo").innerHTML = splitResponse[1];
			  //$("saldo").value = splitResponse[2];
			 			  
			  UpdatePriceM2();
			  UpdateSaldoFinal();		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateSaldoFinal()
{
	var form = $("formName").value;
	
	$("type").value = "getSaldoFinal";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
		  onLoading: function(){
			  $('txtSaldoFinal').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			 			 
			  $("txtSaldoFinal").innerHTML = "<b>Saldo de Documentos:</b> " + splitResponse[2];
			  		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	 
}

function UpdateAbonoVal(k){
	var monto = $("montoEng").value;
		
	UpdateSaldo();
}

function UpdatePriceM2()
{
	var idProjDepto = $("projDeptoId").value;
	var totalVal = $("total").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',		 
		  parameters: {type:"getPriceM2", projDeptoId:idProjDepto, total:totalVal},
		  onLoading: function(){
			  $('txtPriceM2').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtPriceM2').innerHTML = splitResponse[1];
			  $('priceM2').value = splitResponse[2];
			  		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function UpdateM2Depto()
{
	var idProjDepto = $("projDeptoId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',		 
		  parameters: {type:"getM2Depto", projDeptoId:idProjDepto},
		  onLoading: function(){
			  $('txtM2Depto').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtM2Depto').innerHTML = splitResponse[1];
			  $('m2Depto').value = splitResponse[2];
			  $('projLevelId').value = splitResponse[3];
			  
			  UpdatePriceM2();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function UpdateQtyCheque(){
	
	var valTotalPayment = $("totalPayment").value;
	var valQtyCheque = $("qtyCheque").value;
			
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',		 
		  parameters: {type:"updateQtyCheque", qtyCheque:valQtyCheque, totalPayment:valTotalPayment},		  
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
		  
			  	if(splitResponse[0] == "ok")
				{
					$('qtyTraspaso').value = splitResponse[1];			
				}
				else
				{
					ShowStatusPopUp(splitResponse[1]);				
				}
			  
			 		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function UpdateQtyTraspaso(){
	
	var valTotalPayment = $("totalPayment").value;
	var valQtyTraspaso = $("qtyTraspaso").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php',{
		  method:'post',		 
		  parameters: {type:"updateQtyTraspaso", qtyTraspaso:valQtyTraspaso, totalPayment:valTotalPayment},		  
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok")
				{
					$('qtyCheque').value = splitResponse[1];			
				}
				else
				{
					ShowStatusPopUp(splitResponse[1]);				
				}
			  			 		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadBanks(){
	
	var idProject = $("projectId").value;
	var vCurrency = $("currency").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract-payment.php',{
		  method:'post',
		  parameters: {type:"loadBanks", projectId:idProject, currency:vCurrency},
		  onLoading: function(){
			  $('enumBanks').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumBanks').innerHTML = splitResponse[2];			 	
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}

/*** CAJONES EST. ***/

function AddCajon()
{	
	var form = $("formName").value;
	
	$("type").value = "saveCajones";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
		
			AddCajon2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddCajon2()
{	
	var formName = $("formName").value;
	var idContract = 0;
	
	if(formName == "editContractForm")
		idContract = $("contractId").value;
	
	var noCajones = $("noCajones").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"addCajon", contractId:idContract, noCajones:noCajones},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok"){
				$('listCajones').innerHTML = splitResponse[1];
			}else if(splitResponse[0] == "fail"){
				ShowStatusPopUp(splitResponse[1]);
			}else{
				alert("Ocurrio un error al agregar el cajon");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelCajon(id)
{	
	var form = $("formName").value;
	
	$("type").value = "saveCajones";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelCajon2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelCajon2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"delCajon", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listCajones').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el cajon");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

/*** BODEGAS ***/

function AddBodega()
{	
	var form = $("formName").value;
	
	$("type").value = "saveBodegas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
		
			AddBodega2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddBodega2()
{
	var formName = $("formName").value;
	var idContract = 0;
	
	if(formName == "editContractForm")
		idContract = $("contractId").value;
	
	var noBodegas = $("noBodegas").value;

	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"addBodega", contractId:idContract, noBodegas:noBodegas},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok"){
				$('listBodegas').innerHTML = splitResponse[1];
			}else if(splitResponse[0] == "fail"){
				ShowStatusPopUp(splitResponse[1]);
			}else{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelBodega(id)
{	
	var form = $("formName").value;
	
	$("type").value = "saveBodegas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelBodega2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelBodega2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"delBodega", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listBodegas').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar la bodega");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

/*** EXPIRIES ***/

function LoadExpiries(){
	
	var form = $("formName").value;
	
	$("type").value = "saveExpiry";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			LoadExpiries2();

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function LoadExpiries2()
{
	var docsNo = $("noDocs").value;
	var montoVal = $("monto").value;
	var plazoVal = $("plazo").value;
	var periodoVal = $("periodo").value;
	var fechaIniPagosVal = $("fechaIniPagos").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"loadExpiries", noDocs:docsNo, montoDocs:montoVal, plazo:plazoVal, periodo:periodoVal, fechaIniPagos:fechaIniPagosVal},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok"){			
				$("listExpiries").innerHTML = splitResponse[1];
				OrdenarDocs2();
				UpdateSaldoFinal();
			}else if(splitResponse[0] == "fail"){			
				ShowStatusPopUp(splitResponse[1]);											
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddExpiry()
{
	var form = $("formName").value;
	
	$("type").value = "saveExpiry";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			AddExpiry2();

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddExpiry2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"addExpiry"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			$("listExpiries").innerHTML = splitResponse[1];

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelExpiry(id)
{
	var form = $("formName").value;
	
	$("type").value = "saveExpiry";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelExpiry2(id);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelExpiry2(id)
{
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"delExpiry", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			$("listExpiries").innerHTML = splitResponse[1];
			
			UpdateSaldoFinal();

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

/*** CHEQUES ***/

function AddCheque()
{	
	var form = "cancelContractForm";
	
	$("type").value = "saveCheques";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			AddCheque2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddCheque2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"addCheque"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listCheques').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelCheque(id)
{	
	var form = "cancelContractForm";
	
	$("type").value = "saveCheques";
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelCheque2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelCheque2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"delCheque", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listCheques').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}


/*******************/

function UpdateTotalNeto(){
	
	var montoPena = $("montoPena").value;
	var totalPayment = $("totalPayment").value;
	var totalCurrency = $("totalCurrency").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: {type:"updateTotalNeto", montoPena:montoPena, totalPayment:totalPayment, totalCurrency:totalCurrency},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('txtTotalNeto').innerHTML = splitResponse[1];
				$('totalNeto').value = splitResponse[2];
			}
			else
			{
				alert("Ocurrio un error al actualizar el total neto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function FormatField(field){
	
	var valor = $(field).value;
	
	if(valor == "")
		return;
	
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
				
				if(field == "total")
					UpdateSaldo();
				else if(field == "montoEng"){
					$("abono").value = valor;
					UpdateAbonoVal();					
				}
	
			}
			else
			{
				alert("Ocurrio un error al formatear el valor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function NewCal2(id,formato){
	
	$("ordDocs").value = 1;	
	NewCal(id,formato);
}

function OrdenarDocs(id, fecha){
	
	var form = $("formName").value;

	$("type").value = "saveExpiry";
	$(id).value = fecha;
	
	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
		
			OrdenarDocs2();

		},
    onFailure: function(){ alert('Something went wrong...') }
  });

}

function OrdenarDocs2(){	

	new Ajax.Request(WEB_ROOT+'/ajax/contract.php', {
		
		method:'post',
		parameters: {type:"orderDocs"},		
		onLoading: function(){
			$("listExpiries").innerHTML = LOADER;
		},	
    	onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
				$("listExpiries").innerHTML = splitResponse[1];
			
			$("ordDocs").value = 0;

		},
    	onFailure: function(){ alert('Something went wrong...') }
  });
	
}