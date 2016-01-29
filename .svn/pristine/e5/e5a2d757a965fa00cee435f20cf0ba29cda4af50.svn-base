Event.observe(window, 'load', function() {
	
	Event.observe($('addRequisicionDiv'), "click", AddRequisicionDiv);
		
	AddEditRequisicionListeners = function(e) {
		var el = e.element();
		
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteRequisicionPopup(id);
			return;
		}
		
		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditRequisicionPopup(id);
		}
		
		del = el.hasClassName('spanView');
		if(del == true)
		{
			ViewRequisicionPopup(id);
		}
	}

	$('contenido').observe("click", AddEditRequisicionListeners);																	 

});

function AddRequisicionDiv(idConcept)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: {type:"addRequisicion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddRequisicion'), "click", AddRequisicion);
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

function AddRequisicion()
{
	$("type").value = "saveAddRequisicion";

	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: $('addRequisicionForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
		
			if(splitResponse[0] == "ok")
			{				
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblRequisicion');
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

function EditRequisicionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: {type: "editRequisicion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditRequisicionPopup(0); });
			Event.observe($('btnEditRequisicion'), "click", EditRequisicion);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditRequisicion()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: $('editRequisicionForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				HideFview();				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteRequisicionPopup(id)
{
	
	var message = "Realmente deseas eliminar esta requisicion?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
			method:'post',
			parameters: {type: "deleteRequisicion", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblRequisicion');
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewRequisicionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: {type: "viewRequisicion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewRequisicionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewRequisicionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function LoadTypeAreas()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
			
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type: "loadTypeAreas", projectId: idProj, conceptId:idConcept},
		  onLoading: function(){
			  $('listTypeAreas').innerHTML = LOADER;
		  },	  
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
  			  
			  $("qtyConcept").value = splitResponse[1];
			  $("txtQtyConcept").innerHTML = splitResponse[1];
			  $('listTypeAreas').innerHTML = splitResponse[2];			
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadItems()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
	
	$('listItems').innerHTML = "";	
		
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type: "loadItems", projectId: idProj, conceptId:idConcept},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
	 	 		 
			  $('listItems').innerHTML = splitResponse[2];
			  
			  LoadLevels();			 
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevels()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels";
		
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',		 
		  parameters: $('addRequisicionForm').serialize(true),
		  onLoading: function(){
			  $('enumLevels').innerHTML = LOADER;			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumLevels').innerHTML = splitResponse[1];
			  GetTotalConcept();
			  ResetTotales();
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadConcepts()
{
	var idProj = $("projectId").value;
		
	$('listConcepts').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type: "loadConcepts", projectId: idProj},
		  onLoading: function(){
			  $('listConcepts').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('listConcepts').innerHTML = splitResponse[1];		  
  			 
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotalLevel(id)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	var level2 = $("projLevelId2_"+id).value;
	var idProjType = $("projTypeId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel", projectId: idProj, projLevelId:level1, projLevelId2:level2, projTypeId:idProjType},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  var totalLevel = splitResponse[1];
				
			   if(totalLevel >= 0)
			  	 $('totalLevel_'+id).value = totalLevel;
			   else
				 $('totalLevel_'+id).value = 0;
			  
			  $("totalA_"+id).innerHTML = splitResponse[2];
			  $("totAreas_"+id).value = splitResponse[2];
			  
			  GetTotalAreas();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function GetTotalAreas()
{
	$("type").value = "getTotalAreas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: $('addRequisicionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('qtyArea').value = splitResponse[1];
			  UpdateTotalAreasByType();
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function UpdateTotalAreasByType()
{
	var chks = document.getElementsByName('projItems[]'); 
	var id = 0;
	
	for(var i=0; i<chks.length; i++){
		
		if(chks[i].checked){
			id = chks[i].value;
			UpdateTotalLevel2(id);
		}
		
	}
}

function UpdateTotalLevel2(id)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	var level2 = $("projLevelId2_"+id).value;
	var idProjType = $("projTypeId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel", projectId: idProj, projLevelId:level1, projLevelId2:level2, projTypeId:idProjType},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");			  
			  var totalLevel = splitResponse[1];
			 			  			  
			  $("totalA_"+id).innerHTML = splitResponse[2];
			  $("totAreas_"+id).value = splitResponse[2];
			  			 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateSaldoRango()
{
	var totalLev = $("totalLev").value;
	var requiActual = $("requiActual").value;
	var saldoRango = 0;
	
	saldoRango = totalLev - requiActual;
	
	$("txtSaldoRango").innerHTML = saldoRango;
	$("saldoRango").value = saldoRango;
}

function ViewConcepts(id){
	
	var obj = $('sup_'+id);
	var icon = $("iconSup_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

function ViewPedidosAll(id){
	
	var obj = $('pedidosAll_'+id);
		
	if(obj.style.display == "none")
		obj.style.display = "";		
	else
		obj.style.display = "none";	
}

function UpdateTotales()
{
	var i;
	var k;
	var subtotal = 0;
	var requisicion = 0;
	var totalReq = 0;
	var subtotals;
	var saldoRango = 0;	
	var totalConcept = 0;
	var reqTotal = 0;
	var items = document.getElementsByName('itemIds[]');
	
	//Obtenemos las Torres
	for(i=0; i<items.length; i++){
		
		//Obtenemos el Subtotal		
		idI = items[i].value;
		
		subtotals = document.getElementsByName('subtotals_'+idI+'[]');
		requis = document.getElementsByName('requis_'+idI+'[]');
		
		for(k=0; k<subtotals.length; k++){
			
			requisicion = parseFloat(requis[k].value);
			
			if(requisicion > 0){
				subtotal += parseFloat(subtotals[k].value);
				totalReq += requisicion;				
			}
		}
		
	}
	
	totalConcept = $("totalConcept").value;
	totalConcept = parseFloat(totalConcept);
	
	saldoRango = subtotal - totalReq;
	saldoConcept = totalConcept - totalReq;	
	reqTotal = totalReq;
		
	$("txtTotalRango").innerHTML = subtotal.formatMoney(2,'.',',');
	$("totalRango").value = subtotal.formatMoney(2,'.','');
	
	$("txtRequiActual").innerHTML = totalReq.formatMoney(2,'.',',');
	$("requiActual").value = totalReq.formatMoney(2,'.','');
	
	$("txtSaldoRango").innerHTML = saldoRango.formatMoney(2,'.',',');
	$("saldoRango").value = saldoRango.formatMoney(2,'.','');
	
	$("txtSaldoConcept").innerHTML = saldoConcept.formatMoney(2,'.',',');
	$("saldoConcept").value = saldoConcept.formatMoney(2,'.','');
	
	$("txtTotalReq").innerHTML = reqTotal.formatMoney(2,'.',',');
	$("totalReq").value = reqTotal.formatMoney(2,'.','');
		
}

function GetTotalConcept()
{
	$("type").value = "getTotalConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: $('addRequisicionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){			  	
				$("totalConcept").value = splitResponse[1];
				$("txtTotalConcept").innerHTML = splitResponse[2];
			  }
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function ResetTotales()
{
	
	$("txtTotalRango").innerHTML = 0;
	$("totalRango").value = 0;
	
	$("txtRequiActual").innerHTML = 0;
	$("requiActual").value = 0;
	
	$("txtSaldoRango").innerHTML = 0;
	$("saldoRango").value = 0;
	
	$("txtSaldoConcept").innerHTML = 0;
	$("saldoConcept").value = 0;
	
	$("txtTotalReq").innerHTML = 0;
	$("totalReq").value = 0;
		
}

function LoadUnitPrice(){
	
	var vConceptMatId = $("conceptMatId").value;
	var vSupplierId = $("supplierId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type:"getUnitPrice", supplierId:vSupplierId, conceptMatId:vConceptMatId},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok")
				$("price").value = splitResponse[1];
			  						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadMatPrices(){
	
	$("type").value = "loadMatPrices";
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: $('addPedidosForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok")
			  	$("materials").innerHTML = splitResponse[1];
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
		
}


function GetMatPrice(id){
	
	var vSupplierId = $("supplierId_"+id).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
		  method:'post',
		  parameters: {type:"getMatPrice", supplierId:vSupplierId, conceptMatId:id},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){
			  	$("unitPrice_"+id).value = splitResponse[1];
				UpdateTotalPricePed(id);
			  }
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
		
}

function UpdateTotalPricePed(id){
	
	var vPrice = $("unitPrice_"+id).value;
	var vQty = $("solicitar_"+id).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
		  method:'post',
		  parameters: {type:"getTotalPedido", price:vPrice, qty:vQty},
		  onLoading: function(){
			 $("total_"+id).innerHTML = LOADER; 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok")
			  	$("total_"+id).innerHTML  = splitResponse[1];
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
	
}

function ToogleAcero(isSteel)
{
	var idConcept = $("conceptId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php', 
	{
		method:'post',
		parameters: {type:"isSteel", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{												
				if(splitResponse[1] == 1){
					if(isSteel == 0){
						$('fview').hide();						
						AddReqAceroDiv(idConcept);
					}
					LoadItemsAcero();
				}else{
					if(isSteel == 1){
						$('fview').hide();						
						AddRequisicionDiv(idConcept);
					}
					LoadTypeAreas();
				}				
			}
			else
			{
				alert("Ocurrio un error al verificar el concepto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function ViewMaterials(id){
	
	var obj = $('materials_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ToogleTorre(id){

	var obj = $('torre_'+id);
	var icon = $("iconTorre_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}

/*** PEDIDOS ***/

function AddPedidosPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type: "addPedidos", requisicionId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewRequisicionPopup(0); });
			Event.observe($('btnSave'), "click", function(){ SaveAddPedidos(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SaveAddPedidos(){
	
	$("type").value = 'saveAddPedidos';
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: $('addPedidosForm').serialize(true),
    onSuccess: function(transport){
			 var response = transport.responseText || "no response text";			  
			 var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
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

function ViewPedidosPopup(id){
		
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type: "viewPedidos", reqPedidoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewRequisicionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewRequisicionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
		
}

function ConfirmPedidos(idReqPedido, idRequisicion)
{
	var message = "Realmente deseas confirmar este pedido?";
	
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "confirmPedidos", id: idReqPedido},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				$('contPedidosAll_'+idRequisicion).innerHTML = splitResponse[2];
				HideFview();
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function DeletePedidosPopup(idReqPedido, idRequisicion)
{	
	var message = "Realmente deseas eliminar este pedido?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "deletePedidos", reqPedidoId: idReqPedido, requisicionId:idRequisicion},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");

				ShowStatusPopUp(splitResponse[1]);
				$('contPedidosAll_'+idRequisicion).innerHTML = splitResponse[2];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

/*** ACERO ***/

function AddReqAceroDiv(idConcept)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php', 
	{
		method:'post',
		parameters: {type:"addRequisicion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddRequisicion'), "click", AddReqAcero);
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

function AddReqAcero()
{
	$("type").value = "saveAddRequisicion";

	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php', 
	{
		method:'post',
		parameters: $('addRequisicionForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
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

function ViewReqAceroPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php', 
	{
		method:'post',
		parameters: {type: "viewRequisicion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewRequisicionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewRequisicionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function LoadItemsAcero()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
		
	$('listItems').innerHTML = "";	
		
	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php',{
		  method:'post',
		  parameters: {type: "loadItems", projectId: idProj, conceptId:idConcept},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
 	 		 			  
			  $('txtQtyConcept').innerHTML = splitResponse[2];
			  $('qtyConcept').value = splitResponse[2];
			  $('listItems').innerHTML = splitResponse[3];
			  
			  LoadLevelsAcero();
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevelsAcero()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels";
		
	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php',{
		  method:'post',		 
		  parameters: $('addRequisicionForm').serialize(true),
		  onLoading: function(){
			  $('enumLevels').innerHTML = LOADER;			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumLevels').innerHTML = splitResponse[1];
			  GetTotalConceptAcero();
			  ResetTotales();
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotalesAcero(id)
{
	var i;
	var subtotal = 0;
	var requisicion = 0;
	var totalReq = 0;
	var subtotals = 0;
	var saldoRango = 0;	
	var totalConcept = 0;
	var reqTotal = 0;
	var items = document.getElementsByName('itemIds[]');
	
	//Obtenemos las Torres
	for(i=0; i<items.length; i++){
		
		//Obtenemos el Subtotal		
		idI = items[i].value;
		
		subtotal = $('subtotal_'+idI).value;
		subtotal = parseFloat(subtotal);
		
		requisicion = $('requi_'+idI).value;
		requisicion = parseFloat(requisicion);
			
		if(requisicion > 0){
			subtotals += subtotal;
			totalReq += requisicion;				
		}		
		
	}
		
	totalConcept = $("totalConcept").value;
	totalConcept = parseFloat(totalConcept);
	
	saldoRango = subtotals - totalReq;
	saldoConcept = totalConcept - totalReq;	
	reqTotal = totalReq;
	
	$("txtTotalRango").innerHTML = subtotals.formatMoney(2,'.',',');
	$("totalRango").value = subtotals.formatMoney(2,'.','');
	
	$("txtRequiActual").innerHTML = totalReq.formatMoney(2,'.',',');
	$("requiActual").value = totalReq.formatMoney(2,'.','');
	
	$("txtSaldoRango").innerHTML = saldoRango.formatMoney(2,'.',',');
	$("saldoRango").value = saldoRango.formatMoney(2,'.','');
	
	$("txtSaldoConcept").innerHTML = saldoConcept.formatMoney(2,'.',',');
	$("saldoConcept").value = saldoConcept.formatMoney(2,'.','');
	
	$("txtTotalReq").innerHTML = reqTotal.formatMoney(2,'.',',');
	$("totalReq").value = reqTotal.formatMoney(2,'.','');
		
}

function GetTotalConceptAcero()
{
	$("type").value = "getTotalConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/req-acero.php',{
		  method:'post',
		  parameters: $('addRequisicionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){			  	
				$("totalConcept").value = splitResponse[1];
				$("txtTotalConcept").innerHTML = splitResponse[2];
			  }
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

/*** END ACERO ***/

/*** PEDIDOS ***/

function AddPedidoDiv(idConceptMat, idRequisicion)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type:"addPedido", conceptMatId:idConceptMat, requisicionId:idRequisicion},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddPedido'), "click", AddPedido);
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

function AddPedido()
{
	var conceptMatId = 0;
	var requisicionId = 0;
	
	$("type").value = "saveAddPedido";

	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: $('addPedidoForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				ShowStatusPopUp(splitResponse[1]);
				conceptMatId = splitResponse[2];
				requisicionId = splitResponse[3];
				$('saldo_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[4];
				$('solicitado_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[5];
				$('contPedidos_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[6];
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

function DeletePedidoPopup(id)
{
	var message = "Realmente deseas eliminar este pedido?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "deletePedido", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				conceptMatId = splitResponse[2];
				requisicionId = splitResponse[3];
				$('saldo_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[4];
				$('solicitado_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[5];
				$('contPedidos_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[6];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ConfirmPedido(id)
{
	var message = "Realmente deseas confirmar este pedido?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "confirmPedido", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				conceptMatId = splitResponse[2];
				requisicionId = splitResponse[3];				
				$('contPedidos_'+requisicionId+'_'+conceptMatId).innerHTML = splitResponse[4];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewPedidos(conceptMatId, requisicionId){
	
	var obj = $('pedidos_' + requisicionId + '_' + conceptMatId);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/*** END PEDIDOS ***/

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion.php',{
			method:'post',
			parameters: {type: "doRefresh", status: status},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok")
					window.location.reload();
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}