Event.observe(window, 'load', function() {
	
	Event.observe($('addCuantificacionDiv'), "click", AddCuantificacionDiv);
	
	AddEditCuantificacionListeners = function(e) {
		var el = e.element();
		
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteCuantificacionPopup(id);
			return;
		}
		
		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditCuantificacionPopup(id);
		}
		
		del = el.hasClassName('spanView');
		if(del == true)
		{
			ViewCuantificacionPopup(id);
		}
		
	}

	$('contenido').observe("click", AddEditCuantificacionListeners);																	 

});

function AddCuantificacionDiv(idConcept)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type: "addCuantificacion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddCuantificacion'), "click", AddCuantificacion);
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

function AddCuantificacion()
{
	$("type").value = "saveAddCuantificacion";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: $('addCuantificacionForm').serialize(true),
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

function EditCuantificacionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type: "editCuantificacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditCuantificacionPopup(0); });
			Event.observe($('btnEditCuantificacion'), "click", EditCuantificacion);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCuantificacion()
{
	$("type").value = "saveEditCuantificacion";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: $('addCuantificacionForm').serialize(true),
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

function EditCuantServPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type: "editCuantServ", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditCuantServPopup(0); });
			Event.observe($('btnEditCuantServ'), "click", EditCuantServ);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCuantServ()
{
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: $('editCuantificacionForm').serialize(true),
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

function DeleteCuantificacionPopup(id)
{
	
	var message = "Realmente deseas eliminar esta cuantificacion?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
			method:'post',
			parameters: {type: "deleteCuantificacion", id: id},
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

function ViewCuantificacionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type: "viewCuantificacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewCuantificacionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewCuantificacionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function ViewCuantAceroPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type: "viewCuantificacion", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ ViewCuantificacionPopup(0); });
			Event.observe($('btnCerrar'), "click", function(){ ViewCuantificacionPopup(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function LoadItems()
{
	var idProj = $("projectId").value;
	
	$('listItems').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "loadItems", projectId: idProj},
		  onLoading: function(){
			  $('listItems').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('listItems').innerHTML = splitResponse[1];
			  LoadEjes2('');
			  LoadTypeAreas();
			  
			  $("enumLevels").innerHTML = splitResponse[2];;
			  
			  UpdateTotal('');
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevels()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',		 
		  parameters: $('addCuantificacionForm').serialize(true),
		  onLoading: function(){
			  $('enumLevels').innerHTML = LOADER;
			  $('listEjes').innerHTML = LOADER;			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumLevels').innerHTML = splitResponse[1];	
			  $('listEjes').innerHTML = splitResponse[2];		  
			  $('qtyArea').value = 0;
			  UpdateTotal('');
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevelsSearch()
{	
	var projItemId = $("vProjItemId").value;

	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',		 
		  parameters: {action:"loadLevelSearch", projItemId:projItemId},
		  onLoading: function(){
			  $('level1').innerHTML = LOADER;
			  $('level2').innerHTML = LOADER;			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('level1').innerHTML = splitResponse[1];	
			  $('level2').innerHTML = splitResponse[2];		  
			 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadEjes()
{
	$("type").value = "loadEjes";	
	$('listEjes').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: $('addCuantificacionForm').serialize(true),
		  onLoading: function(){
			  $('listEjes').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $("areasQty").value = splitResponse[1];
			  $('listEjes').innerHTML = splitResponse[2];
			  $("ejesQty").value = splitResponse[3];
			 
  			  UpdateTotal('');
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadEjes2(funcion)
{
	$("type").value = "loadEjes2";	
	$('listEjes').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: $('addCuantificacionForm').serialize(true),
		  onLoading: function(){
			  $('listEjes').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
				
			  $("areasQty").value = splitResponse[1];
			  $('listEjes').innerHTML = splitResponse[2];			  
			  $("ejesQty").value = splitResponse[3];
			 
  			  UpdateTotal(funcion);
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadTypeAreas()
{
	var idProj = $("projectId").value;
		
	$('listTypeAreas').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "loadTypeAreas", projectId: idProj},
		  onLoading: function(){
			  $('listTypeAreas').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('listTypeAreas').innerHTML = splitResponse[1];		  
  			 
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotalLevel(id,autoSel)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	
	if(autoSel == 1){
		var level1Index = $("projLevelId_"+id).selectedIndex;	
		$("projLevelId2_"+id).selectedIndex = level1Index;
	}
	
	var level2 = $("projLevelId2_"+id).value;
	var idProjType = $("projTypeId").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel", projectId: idProj, projLevelId:level1, projLevelId2:level2, projTypeId:idProjType},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");			  
			  var totalLevel = splitResponse[1];
			 
			  if(totalLevel >= 0){
			  	$('txtTotalLevel_'+id).innerHTML = totalLevel;
				$('totalLevel_'+id).value = totalLevel;
			  }else{
				$('txtTotalLevel_'+id).innerHTML = 0;
				$('totalLevel_'+id).value = 0;
			  }
			  
			  $("totalA_"+id).innerHTML = splitResponse[2];
			   $("totAreas_"+id).value = splitResponse[2];
			  
			  UpdateTotal('');
			  GetTotalAreas2('');
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateSubtotal()
{
	var vQtyConcept = $("qtyConcept").value;
	var vSubtotalV = $("subtotalV").value;
	
	if($('b')!= undefined)
		var vB = $("b").value;
	
	if($('h')!= undefined)
		var vH = $("h").value;
	
	if($('z')!= undefined)
		var vZ = $("z").value;
	
	if(vB != ''){
		$('inpH').style.display = '';
		$('inpBV').style.display = '';
	}else{
		$('bV').value = '';
		$('inpBV').style.display = 'none';
		
		$('h').value = '';
		$('inpH').style.display = 'none';
		$('inpHV').style.display = 'none';
		
		if($('z')!= undefined){
			$('z').value = '';
			$('inpZ').style.display = 'none';
		}
		
		if($('zV')!= undefined){
			$('zV').value = '';
			$('inpZV').style.display = 'none';
		}
	}
	
	if(vH != ''){
		$('inpZ').style.display = '';
		$('inpHV').style.display = '';	
	}else{
		$('z').value = '';
		$('inpZ').style.display = 'none';
		
		$('hV').value = '';
		$('inpHV').style.display = 'none';
	}
	
	if(vZ != ''){
		$('inpZV').style.display = '';
	}else{
		$('zV').value = '';
		$('inpZV').style.display = 'none';
	}
	
	//Subtotal V
	if($('bV')!= undefined)
		var vBV = $("bV").value;
	
	if($('hV')!= undefined)
		var vHV = $("hV").value;
	
	if($('zV')!= undefined)
		var vZV = $("zV").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "updateSubtotal", b:vB, h:vH, z:vZ, bV:vBV, hV:vHV, zV:vZV, qtyConcept:vQtyConcept},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtSubtotal').innerHTML = splitResponse[1];
			  $('subtotal').value = splitResponse[2];
			  $('unitId').value = splitResponse[3];
			  $('txtSubtot').innerHTML = splitResponse[4];
			  
			  $('txtSubtotalV').innerHTML = splitResponse[5];
			  $('subtotalV').value = splitResponse[6];
			  
			  /*
			  var cboUnit = document.getElementById('unitId');
			  cboUnit.selectedIndex = splitResponse[3];	  
		  
			  UpdateSubtotalV();
			  */
			  
			  UpdateTotal('');		  
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateSubtotalV()
{
	var vQtyConcept = $("qtyConcept").value;
	
	if($('b')!= undefined)
		var vB = $("b").value;
	
	if($('h')!= undefined)
		var vH = $("h").value;
	
	if($('z')!= undefined)
		var vZ = $("z").value;
		
	if($('bV')!= undefined)
		var vBV = $("bV").value;
	
	if($('hV')!= undefined)
		var vHV = $("hV").value;
	
	if($('zV')!= undefined)
		var vZV = $("zV").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "updateSubtotalV", b:vB, h:vH, z:vZ, bV:vBV, hV:vHV, zV:vZV, qtyConcept:vQtyConcept},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtSubtotalV').innerHTML = splitResponse[1];
			  $('subtotalV').value = splitResponse[2];
			  $('txtSubtotal').innerHTML = splitResponse[3];
			  $('subtotal').value = splitResponse[4];
			  			  
			  UpdateTotal('');
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotal(funcion)
{	
	$("type").value = "updateTotal";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: $('addCuantificacionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('txtTotal').innerHTML = splitResponse[1];
			  $('total').value = splitResponse[2];
			  
			  if(funcion == 'UpdateTotalAreasByType')
			  	UpdateTotalAreasByType();
			 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function GetTotalAreas()
{
	$("type").value = "getTotalAreas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: $('addCuantificacionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('qtyArea').value = splitResponse[1];
			  LoadEjes();
			  UpdateTotalAreasByType();		  
			 			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function GetTotalAreas2()
{
	$("type").value = "getTotalAreas2";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: $('addCuantificacionForm').serialize(true),
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('qtyArea').value = splitResponse[1];
			  LoadEjes2('UpdateTotalAreasByType');
			  //UpdateTotalAreasByType();		  
			 			  
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
			UpdateTotalLevel2(id,'UpdateTotalByType');
			//UpdateTotalByType(id);
		}
		
	}
}

function UpdateTotalLevel2(id, funcion)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	var level2 = $("projLevelId2_"+id).value;
	var idProjType = $("projTypeId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel", projectId: idProj, projLevelId:level1, projLevelId2:level2, projTypeId:idProjType},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");			  
			  var totalLevel = splitResponse[1];
		 			  			  
			  $("totalA_"+id).innerHTML = splitResponse[2];
			  $("totAreas_"+id).value = splitResponse[2];
			  
			  if(funcion == 'UpdateTotalByType')
			  	UpdateTotalByType(id);
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotalByType(id)
{
	var chks = document.getElementsByName('projTypes[]'); 
	var idProjTypes = '';
	var idP;
	
	for(var i=0; i<chks.length; i++){
		
		if(chks[i].checked){
			idP = chks[i].value;
			idProjTypes = idProjTypes + idP + ',';
			
		}
		
	}
	
	UpdateTotalLevel3(id, idProjTypes);
}

function UpdateTotalLevel3(id, idProjTypes)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	var level2 = $("projLevelId2_"+id).value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel2", projectId: idProj, projLevelId:level1, projLevelId2:level2, projTypeIds:idProjTypes},
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

function ViewSubcats(id){
	
	var obj = $('subcats_'+id);
	var icon = $("iconSubcat_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}		
}

function ViewConcepts(id){
	
	var obj = $('conc_'+id);
	var icon = $("iconConc_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

function ViewCuants(id){

	var obj = $('cuant_'+id);
	var icon = $("iconCuant_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

/**** SERVICIO ****/

function AddCuantServDiv(idConcept)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type: "addCuantServ", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddCuantServ'), "click", AddCuantServ);
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

function AddCuantServ()
{
	$("type").value = "saveAddCuantServ";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: $('addCuantificacionForm').serialize(true),
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

function UpdateTotalServ(){
	
	var vQuantity = $("qtyConcept").value;
	var vUnitPrice = $("unitPrice").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type:"getTotalServ",quantity:vQuantity, unitPrice:vUnitPrice},
	onLoading: function(){
		$("txtTotal").innerHTML = LOADER;
	},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				$('total').value = splitResponse[1];
				$('txtTotal').innerHTML = splitResponse[2];
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/**** ACERO ****/

function AddCuantAceroDiv(idConcept)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type: "addCuantificacion", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddCuantAcero'), "click", AddCuantAcero);
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

function AddCuantAcero()
{
	$("type").value = "saveAddCuantificacion";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: $('addCuantificacionForm').serialize(true),
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

function EditCuantAceroDiv(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type: "editCuantificacion", cuantificacionId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnEditCuantAcero'), "click", EditCuantAcero);
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

function EditCuantAcero(){
		
	$("type").value = "saveEditCuantificacion";
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: $('addCuantificacionForm').serialize(true),
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

function LoadEjesAcero()
{
	var idProj = $("projectId").value;
	var conceptQty = $("qtyConcept").value;
	
	var chks = document.getElementsByName('projItems[]'); 
	var i = 0;
	var torres = 0;
	
	for(i=0; i<chks.length; i++){		
		if(chks[i].checked)
			torres++;		
	}
		
	$('listEjes').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php',{
		  method:'post',
		  parameters: {type:"loadEjes", qtyConcept:conceptQty, projectId:idProj, numTorres:torres},
		  onLoading: function(){
			  $('listEjes').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('listEjes').innerHTML = splitResponse[2];
			  $("areasQty").value = splitResponse[1];
			  
			  UpdateSubtotalAcero();
			 
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadLevelsAcero()
{			
	$('enumLevels').innerHTML = "";
	$("type").value = "loadLevels";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php',{
		  method:'post',		 
		  parameters: $('addCuantificacionForm').serialize(true),
		  onLoading: function(){
			  $('enumLevels').innerHTML = LOADER;			  		 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumLevels').innerHTML = splitResponse[1];	  
			  
			  LoadEjesAcero();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateTotalLevelAcero(id,autoSel)
{
	var idProj = $("projectId").value;
	var level1 = $("projLevelId_"+id).value;
	
	if(autoSel == 1){
		var level1Index = $("projLevelId_"+id).selectedIndex;	
		$("projLevelId2_"+id).selectedIndex = level1Index;
	}
	
	var level2 = $("projLevelId2_"+id).value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
		  method:'post',
		  parameters: {type: "getTotalLevel", projectId: idProj, projLevelId:level1, projLevelId2:level2},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");			  
			  var totalLevel = splitResponse[1];
			 
			  if(totalLevel >= 0){
			  	$('txtTotalLevel_'+id).innerHTML = totalLevel;
				$('totalLevel_'+id).value = totalLevel;
			  }else{
				$('txtTotalLevel_'+id).innerHTML = 0;
				$('totalLevel_'+id).value = 0;
			  }
			 			  			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function UpdateWeight(id)
{
	var idConceptMat = $("conceptMatId_"+id).value;
	var mtoLineal = $("mtoLineal_"+id).value;
	var bulbos = 0;
	var traslapes = 0;
	var tipo = '';
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type:"getWeight", conceptMatId:idConceptMat, mtoLineal:mtoLineal},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('txtWeight_'+id).innerHTML = splitResponse[1];
				$('weight_'+id).value = splitResponse[1];
				
				bulbos = parseFloat(splitResponse[2]);
				traslapes = parseFloat(splitResponse[3]);
				tipo = splitResponse[4];
				traslapeVal = parseFloat(splitResponse[5]);
				
				if(idConceptMat){
											
					if(tipo == "T"){				
						$("divTraslapes_"+id).style.display = '';
						$("traslapes_"+id).value = traslapes;
						$("traslapeVal_"+id).value = traslapeVal;
						$("bulbos_"+id).value = 0;
						$("divBulbos_"+id).style.display = 'none';
					}else if(tipo == "B"){
						$("divBulbos_"+id).style.display = '';
						$("bulbos_"+id).value = bulbos;
						$("traslapes_"+id).value = 0;
						$("traslapeVal_"+id).value = 0;
						$("divTraslapes_"+id).style.display = 'none';
					}else{
						$("divBulbos_"+id).style.display = 'none';
						$("bulbos_"+id).value = 0;
						$("traslapes_"+id).value = 0;
						$("traslapeVal_"+id).value = 0;
						$("divTraslapes_"+id).style.display = 'none';
					}
					
				}else{
					$("divTraslapes_"+id).style.display = '';
					$("divBulbos_"+id).style.display = '';
					$("bulbos_"+id).value = 0;
					$("traslapes_"+id).value = 0;
					$("traslapeVal_"+id).value = 0;
				}
				
				UpdateTotalWeight(id);
			}
			else
			{
				alert("Ocurrio un error al actualizar el peso del material");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function UpdateTotalWeight(id)
{
	var quantity = $("quantity_"+id).value;
	var mtoLineal = $("mtoLineal_"+id).value;
	var weight = $("weight_"+id).value;
	var totalWeight = 0;
	var pesoExtra = 0;
	var traslape;
	
	quantity = parseFloat(quantity);
	mtoLineal = parseFloat(mtoLineal);
	weight = parseFloat(weight);
	
	if(mtoLineal > 12){
		if($('traslapes_'+id) != undefined){
			traslapes = $("traslapes_"+id).value;
			traslapeVal = $("traslapeVal_"+id).value;
			pesoExtra = quantity * parseFloat(traslapes) * traslapeVal * weight;
			pesoExtra = pesoExtra * 2;
		}
	}
	
	totalWeight = quantity * mtoLineal * weight;
	totalWeight = totalWeight + pesoExtra;		
	totalWeight = totalWeight.toFixed(2);
	
	$("txtTotalWeight_"+id).innerHTML = totalWeight;
	$("totalWeight_"+id).value = totalWeight;
	
		
	UpdateSubtotalAcero();
	
}

function UpdateSubtotalAcero()
{		
	var form = $("formName").value;
	
	$("type").value = "getSubtotal";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");	
			
			$("txtSubtotal").innerHTML = splitResponse[1];
			$("subtotal").value = splitResponse[1];
			
			$("txtTotal").innerHTML = splitResponse[2];
			$("total").value = splitResponse[2];
			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

/*** MATERIALS ***/

function AddMaterial()
{		
	var form = $("formName").value;
	
	$("type").value = "saveMaterials";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");	
						
			AddMaterial2();	
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddMaterial2()
{	
	var idConcept = $("conceptId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type:"addMaterial", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listMaterials').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el material");
			}
		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelMaterial(key)
{		
	var form = $("formName").value;
	
	$("type").value = "saveMaterials";
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");	
			
			DelMaterial2(key);	
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelMaterial2(id)
{	
	var idConcept = $("conceptId").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/cuant-acero.php', 
	{
		method:'post',
		parameters: {type:"delMaterial", k:id, conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listMaterials').innerHTML = splitResponse[1];
				UpdateSubtotalAcero();
			}
			else
			{
				alert("Ocurrio un error al agregar el material");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function ToogleAcero(isSteel)
{
	var idConcept = $("conceptId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
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
						AddCuantAceroDiv(idConcept);
					}
				}else{
					if(isSteel == 1){
						$('fview').hide();
						AddCuantificacionDiv(idConcept);
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

function ToogleTipo(cIsSteel, cTipo){
	
	var idConcept = $("conceptId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php', 
	{
		method:'post',
		parameters: {type:"getTipoConcept", conceptId:idConcept},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			var tipo = splitResponse[1];
			var isSteel = splitResponse[2];
			
			if(splitResponse[0] == "ok")
			{												
				if(tipo == "Servicio" && cTipo != "Servicio"){
					$('fview').hide();
					AddCuantServDiv(idConcept);	
				}else{
					
					if(isSteel == 1){
						if(cIsSteel == 0){
							$('fview').hide();
							AddCuantAceroDiv(idConcept);
						}
					}else{
						if(cIsSteel == 1){
							$('fview').hide();
							AddCuantificacionDiv(idConcept);
						}
						$("txtUnidad").innerHTML = splitResponse[5];
					}
					
					$("supplierId").value = splitResponse[3];
					$("txtSupplier").innerHTML = splitResponse[4];
					
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

function SearchCuantificacion()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/cuantificacion.php',{
			method:'post',
			parameters: $('frmSearch').serialize(true),
			onLoading: function(){
				$("loader").show();	
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");

				$("loader").hide();
				
				if(splitResponse[0] == "ok")
				{
					$('contenido').innerHTML = splitResponse[1];					
				}
				else
				{
					ShowStatus(splitResponse[1]);					
					HideFview();				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadSubcats2()
{
	var idCategory = $("categoryId2").value;
	
	$('enumSubcat').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats2", categoryId: idCategory},
		  onLoading: function(){
			  	$('enumSubcat').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('enumSubcat').innerHTML = splitResponse[1];
			  
			  LoadConceptCons2();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadSubcatsSearch()
{
	var idCategory = $("vCategoryId").value;
	
	$('vEnumSubcat').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcatsSearch", categoryId: idCategory},
		  onLoading: function(){
			  	$('vEnumSubcat').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('vEnumSubcat').innerHTML = splitResponse[1];
			  
			  LoadConceptCons2();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadConceptCons2()
{
	var idSubcategory = $("subcategoryId2").value;
	
	$('enumConcept').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConceptCons2", subcategoryId: idSubcategory},
		  onLoading: function(){
			  	$('enumConcept').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('enumConcept').innerHTML = splitResponse[1];
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadConceptConsSearch()
{
	var idSubcategory = $("vSubcategoryId").value;
	
	$('vEnumConcept').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConceptConsSearch", subcategoryId: idSubcategory},
		  onLoading: function(){
			  	$('vEnumConcept').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('vEnumConcept').innerHTML = splitResponse[1];
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}