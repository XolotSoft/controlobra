Event.observe(window, 'load', function() {
	
	Event.observe($('addConceptDiv'), "click", AddConceptDiv);
	
	AddEditConceptListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteConceptPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditConceptPopup(id);
		}
	}

	$('contenido').observe("click", AddEditConceptListeners);																	 

});

function AddConceptDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type: "addConcept"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddConcept'), "click", AddConcept);
			Event.observe($('fviewclose'), "click", function(){ AddConceptDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddConcept()
{
	$("type").value = "saveAddConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: $('addConceptForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblConcept');
				AddConceptDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditConceptPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type: "editConcept", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditConceptPopup(0); });
			Event.observe($('btnEditConcept'), "click", EditConcept);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditConcept()
{
	$("type").value = "saveEditConcept";
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: $('editConceptForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblConcept');
				AddConceptDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteConceptPopup(id)
{	
	var message = "Realmente deseas eliminar este concepto?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
			method:'post',
			parameters: {type: "deleteConcept", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblConcept');
				AddConceptDiv(0);				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function SearchConcept()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
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
					TableKit.reloadTable('tblConcept');
				}
				else
				{
					ShowStatus(splitResponse[1]);
					AddConceptDiv(0);				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadSubcats()
{
	var idCat = $("categoryId").value;
	
	$('listSubcat').innerHTML = "";
	$("fieldSubcat").hide();
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats", categoryId: idCat},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('listSubcat').innerHTML = splitResponse[1];
			  
			  if(splitResponse[0] > 0)
				$("fieldSubcat").show();  
			  		  
			  LoadConceptCons();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadSubcats2()
{
	var idCat = $("categoryId2").value;
			
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats2", categoryId: idCat},
		  onLoading: function(){
			  $("enumSubcat").innerHTML = LOADER;
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

function LoadConceptCons()
{
	var idSubcategory = $("subcategoryId").value;

	$('listConcept').innerHTML = "";
	$("fieldConcept").hide();
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConceptCons", subcategoryId: idSubcategory},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
	  
			  $('listConcept').innerHTML = splitResponse[1];
			  
			  if(splitResponse[0] > 0)
				$("fieldConcept").show();  			  	
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadConceptCons2()
{
	var idSubcategory = $("subcategoryId2").value;
		
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

function ViewMaterial(id){
	
	var obj = $('mat_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ViewPrice(id){
	
	var obj = $('price_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/*** MATERIALS ***/

function LoadMatSubcats(k)
{
	var idMatCat = $("matCatId_"+k).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-material.php',{
		  method:'post',
		  parameters: {type: "loadMatSubcats", matCatId: idMatCat, key:k},
		  onLoading: function(){
			  $('listSubcats_'+k).innerHTML = LOADER;
			  $('listMaterial_'+k).innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  if(splitResponse[0] == "ok"){				  	
			  		$('listSubcats_'+k).innerHTML = splitResponse[1];
			  		$('listMaterial_'+k).innerHTML = splitResponse[2];
			  }else{
				  alert("Ocurrio un error al cargar los datos");
			  }
				
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function LoadMaterials(k)
{
	var idMatCat = $("matCatId_"+k).value;
	var idMatSubcat = $("matSubcatId_"+k).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-material.php',{
		  method:'post',
		  parameters: {type: "loadMaterials", matCatId:idMatCat, matSubcatId:idMatSubcat, key:k},
		  onLoading: function(){
			  $('listMaterial_'+k).innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  if(splitResponse[0] == "ok"){			  		
			  		$('listMaterial_'+k).innerHTML = splitResponse[1];
			  }else{
				  alert("Ocurrio un error al cargar los datos");
			  }
				
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadInfoMat(k)
{
	var idMat = $("materialId_"+k).value;

	new Ajax.Request(WEB_ROOT+'/ajax/concept-material.php',{
		  method:'post',
		  parameters: {type: "loadInfoMaterial", materialId:idMat},
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  if(splitResponse[0] == "ok"){			  		
			  		$('unitMat_'+k).innerHTML = '';//splitResponse[1];					
			  }else{
				  alert("Ocurrio un error al cargar la unidad del material");
			  }				
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});

}

/*** MATERIALS ***/

function AddMaterial()
{		
	var form = $("formName").value;
	
	$("type").value = "saveMaterials";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
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
	var steel = 0;
	var chkSteel = $("steel").checked;
		
	if(chkSteel == true)
		steel = 1;
				
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type:"addMaterial", isSteel:steel},
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
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
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
	var steel = 0;
	var chkSteel = $("steel").checked;
		
	if(chkSteel == true)
		steel = 1;
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type:"delMaterial", k:id, isSteel:steel},
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

/*** PRICES ***/

function AddPrice()
{	
	var form = $("formName").value;
	
	$("type").value = "savePrices";
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			AddPrice2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPrice2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type:"addPrice"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listPrice').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelPrice(id)
{	
	var form = $("formName").value;
	
	$("type").value = "savePrices";
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelPrice2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelPrice2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php', 
	{
		method:'post',
		parameters: {type:"delPrice", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listPrice').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}


/****************/

function UpdateTotal(k)
{
	var iva = $("iva_"+k).value;
	var price = $("precios_"+k).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
	{
		method:'post',
		parameters: {type:"updateTotal", iva:iva, price:price},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('totals_'+k).value = splitResponse[1];
			}			

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function ToogleExtraInfo()
{
	var tipo = $("tipo").value;
	
	if(tipo == "Subcontrato"){
		$("subcontrato").show();
		$("obra").hide();
	}else if(tipo == "Obra"){
		$("subcontrato").hide();
		$("obra").show();
	}else{
		$("subcontrato").hide();
		$("obra").hide();
	}
}

function RemoveMaterials()
{
	var acero = $("steel").checked;
	var tipo = $("tipo").value;
	
	if(acero == true)
		$("obra").style.display = 'none';
	else{
		if(tipo == "Obra")
			$("obra").style.display = '';
	}
		
}