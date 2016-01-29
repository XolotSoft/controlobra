Event.observe(window, 'load', function() {
	
	Event.observe($('addEstimacionDiv'), "click", AddEstimacionDiv);
		
	AddEditEstimacionListeners = function(e) {
		var el = e.element();
		
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteEstimacionPopup(id);
			return;
		}
		
		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditEstimacionPopup(id);
		}
		
		del = el.hasClassName('spanView');
		if(del == true)
		{
			ViewEstimacionPopup(id);
		}
	}

	$('contenido').observe("click", AddEditEstimacionListeners);																	 

});

function AddEstimacionDiv(idConcept)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
	{
		method:'post',
		parameters: {type:"addEstimacion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddEstimacion'), "click", AddEstimacion);
				Event.observe($('fviewclose'), "click", function(){ HideFview(); });
				LoadSuppliers();
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

function AddEstimacion()
{
	$("type").value = "saveAddEstimacion";

	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
	{
		method:'post',
		parameters: $('addEstimacionForm').serialize(true),
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

function EditEstimacionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
	{
		method:'post',
		parameters: {type: "editEstimacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditEstimacionPopup(0); });
			Event.observe($('btnEditEstimacion'), "click", EditEstimacion);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditEstimacion()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
	{
		method:'post',
		parameters: $('editEstimacionForm').serialize(true),
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

function DeleteEstimacionPopup(id)
{
	
	var message = "Realmente deseas eliminar esta estimacion?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
			method:'post',
			parameters: {type: "deleteEstimacion", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ConfirmPayment(id)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
			method:'post',
			parameters: {type: "confirmEstimacion", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");
				
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewEstimacionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
	{
		method:'post',
		parameters: {type: "viewEstimacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewEstimacionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewEstimacionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}



function LoadSuppliers()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
	
	$('listSuppliers').innerHTML = "";
	$('listTypeAreas').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',
		  parameters: {type: "loadSuppliers", projectId: idProj, conceptId:idConcept},
		  onLoading: function(){			
			  $('listSuppliers').innerHTML = LOADER;
			  $('listTypeAreas').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $("qtyConcept").value = splitResponse[1];
			  $("txtQtyConcept").innerHTML = splitResponse[1];
			  $("retencion").value = splitResponse[2];
  		      $('listSuppliers').innerHTML = splitResponse[3];
			  $("listTypeAreas").innerHTML = splitResponse[4];
			  
			  if(splitResponse[5] > 0){
			  	$("supPrice").show();
				$("cPrice").value = splitResponse[6];
			  }else{
			    $("supPrice").hide();
				$("cPrice").value = "";
			  }
				
			  LoadItems();
			  ResetTotales();	  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadItems()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
	var idSupplier = $("supplierId").value;
	
	$('listItems').innerHTML = "";	
		
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',
		  parameters: {type: "loadItems", projectId: idProj, conceptId:idConcept, supplierId:idSupplier},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
	 
	 		  $("retencion").value = splitResponse[1];
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
		
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',		 
		  parameters: $('addEstimacionForm').serialize(true),
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

function LoadLevels2()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels2";
		
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',		 
		  parameters: $('addEstimacionForm').serialize(true),
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
		
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',
		  parameters: $('addEstimacionForm').serialize(true),
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
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
	var estimActual = $("estimActual").value;
	var saldoRango = 0;
	
	saldoRango = totalLev - estimActual;
	
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

function UpdateTotales()
{
	var i;
	var k;
	var subtotal = 0;
	var estimacion = 0;
	var totalEst = 0;
	var subtotals;
	var saldoRango = 0;
	var totalRetenido = 0;
	var porcRetencion;
	var totalConcept;
	var items = document.getElementsByName('itemIds[]');
	
	//Obtenemos las Torres
	for(i=0; i<items.length; i++){
		
		//Obtenemos el Subtotal		
		idI = items[i].value;
		
		subtotals = document.getElementsByName('subtotals_'+idI+'[]');
		estimas = document.getElementsByName('estimas_'+idI+'[]');
		
		for(k=0; k<subtotals.length; k++){
			
			estimacion = parseFloat(estimas[k].value);
			
			if(estimacion > 0){
				subtotal += parseFloat(subtotals[k].value);
				totalEst += estimacion;				
			}
		}
		
	}
	
	porcRetencion = $("retencion").value;
	totalConcept = $("totalConcept").value;
	
	porcRetencion = parseFloat(porcRetencion);
	totalConcept = parseFloat(totalConcept);
	
	saldoRango = subtotal - totalEst;
	saldoConcept = totalConcept - totalEst;
	totalRetenido = totalEst * (porcRetencion/100);	
	totalRetenido = totalRetenido.toFixed(2);
	estTotal = totalEst - totalRetenido;
	estTotal = estTotal.toFixed(2)
	
	$("txtTotalRango").innerHTML = subtotal;
	$("totalRango").value = subtotal;
	
	$("txtEstimActual").innerHTML = totalEst.toFixed(2);
	$("estimActual").value = totalEst.toFixed(2);
	
	$("txtSaldoRango").innerHTML = saldoRango.toFixed(2);
	$("saldoRango").value = saldoRango.toFixed(2);
	
	$("txtSaldoConcept").innerHTML = saldoConcept.toFixed(2);
	$("saldoConcept").value = saldoConcept.toFixed(2);
	
	$("txtTotalRetenido").innerHTML = totalRetenido;
	$("totalRetenido").value = totalRetenido;
	
	$("txtTotalEst").innerHTML = estTotal;
	$("totalEst").value = estTotal;
		
}

function GetTotalConcept()
{
	$("type").value = "getTotalConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',
		  parameters: $('addEstimacionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){
			  	$("txtTotalConcept").innerHTML = splitResponse[1];
				$("totalConcept").value = splitResponse[1];
			  }
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function ResetTotales()
{
	
	$("txtTotalRango").innerHTML = 0;
	$("totalRango").value = 0;
	
	$("txtEstimActual").innerHTML = 0;
	$("estimActual").value = 0;
	
	$("txtSaldoRango").innerHTML = 0;
	$("saldoRango").value = 0;
	
	$("txtSaldoConcept").innerHTML = 0;
	$("saldoConcept").value = 0;
	
	$("txtTotalRetenido").innerHTML = 0;
	$("totalRetenido").value = 0;
	
	$("txtTotalEst").innerHTML = 0;
	$("totalEst").value = 0;
		
}

function ToogleAcero(isSteel)
{
	var idConcept = $("conceptId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php', 
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
						AddEstAceroDiv(idConcept);
					}else{
						LoadSuppliersAcero();
					}
				}else{
					if(isSteel == 1){
						$('fview').hide();
						AddEstimacionDiv(idConcept);
					}else{
						LoadSuppliers();
					}
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

/*** ACERO ***/

function AddEstAceroDiv(idConcept)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php', 
	{
		method:'post',
		parameters: {type:"addEstimacion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddEstimacion'), "click", AddEstAcero);
				Event.observe($('fviewclose'), "click", function(){ HideFview(); });
				LoadSuppliersAcero();
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

function AddEstAcero()
{
	$("type").value = "saveAddEstimacion";

	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php', 
	{
		method:'post',
		parameters: $('addEstimacionForm').serialize(true),
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

function ViewEstAceroPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php', 
	{
		method:'post',
		parameters: {type: "viewEstimacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewEstimacionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewEstimacionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function LoadSuppliersAcero()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
	
	$('listSuppliers').innerHTML = "";
			
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
		  method:'post',
		  parameters: {type: "loadSuppliers", projectId: idProj, conceptId:idConcept},
		  onLoading: function(){			
			  $('listSuppliers').innerHTML = LOADER;			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
  			  
			  $("qtyConcept").value = splitResponse[1];
			  $("txtQtyConcept").innerHTML = splitResponse[1];
			  $("retencion").value = splitResponse[2];
  		      $('listSuppliers').innerHTML = splitResponse[3];
			  			  
			  LoadItemsAcero();
			  //ResetTotales();	  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadItemsAcero()
{
	var idProj = $("projectId").value;
	var idConcept = $("conceptId").value;
	var idSupplier = $("supplierId").value;
	
	$('listItems').innerHTML = "";	
		
	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php',{
		  method:'post',
		  parameters: {type: "loadItems", projectId: idProj, conceptId:idConcept, supplierId:idSupplier},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
	 
	 		  $("retencion").value = splitResponse[1];
			  $('listItems').innerHTML = splitResponse[2];
			  
			  LoadLevelsAcero();
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevelsAcero()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels";
		
	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php',{
		  method:'post',		 
		  parameters: $('addEstimacionForm').serialize(true),
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
	var estimacion = 0;
	var totalEst = 0;
	var subtotals = 0;
	var saldoRango = 0;
	var totalRetenido = 0;
	var porcRetencion;
	var totalConcept;
	var items = document.getElementsByName('itemIds[]');
	
	//Obtenemos las Torres
	for(i=0; i<items.length; i++){
		
		//Obtenemos el Subtotal		
		idI = items[i].value;
		
		subtotal = $('subtotal_'+idI).value;
		subtotal = parseFloat(subtotal);
		
		estimacion = $('estima_'+idI).value;
		estimacion = parseFloat(estimacion);
			
		if(estimacion > 0){
			subtotals += subtotal;
			totalEst += estimacion;				
		}
		
		
	}
	
	porcRetencion = $("retencion").value;
	totalConcept = $("totalConcept").value;
	
	porcRetencion = parseFloat(porcRetencion);
	totalConcept = parseFloat(totalConcept);
	
	saldoRango = subtotals - totalEst;
	saldoConcept = totalConcept - totalEst;
	totalRetenido = totalEst * (porcRetencion/100);	
	totalRetenido = totalRetenido.toFixed(2);
	estTotal = totalEst - totalRetenido;
	estTotal = estTotal.toFixed(2)
	
	$("txtTotalRango").innerHTML = subtotals;
	$("totalRango").value = subtotals;
	
	$("txtEstimActual").innerHTML = totalEst;
	$("estimActual").value = totalEst;
	
	$("txtSaldoRango").innerHTML = saldoRango;
	$("saldoRango").value = saldoRango;
	
	$("txtSaldoConcept").innerHTML = saldoConcept;
	$("saldoConcept").value = saldoConcept;
	
	$("txtTotalRetenido").innerHTML = totalRetenido;
	$("totalRetenido").value = totalRetenido;
	
	$("txtTotalEst").innerHTML = estTotal;
	$("totalEst").value = estTotal;
		
}

function GetTotalConceptAcero()
{
	$("type").value = "getTotalConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/est-acero.php',{
		  method:'post',
		  parameters: $('addEstimacionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){
			  	$("txtTotalConcept").innerHTML = splitResponse[1];
				$("totalConcept").value = splitResponse[1];
			  }
						 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

/*** END ACERO ***/

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion.php',{
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