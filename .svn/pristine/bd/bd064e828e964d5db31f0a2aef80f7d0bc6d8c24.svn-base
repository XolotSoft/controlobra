Event.observe(window, 'load', function() {
	
	Event.observe($('addMaterialDiv'), "click", AddMaterialDiv);
	
	AddEditMaterialListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteMaterialPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditMaterialPopup(id);
		}
	}

	$('contenido').observe("click", AddEditMaterialListeners);																	 

});

function AddMaterialDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
	{
		method:'post',
		parameters: {type: "addMaterial"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddMaterial'), "click", AddMaterial);
			Event.observe($('fviewclose'), "click", function(){ AddMaterialDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddMaterial()
{	
	$("type").value = "saveAddMaterial";
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
	{
		method:'post',
		parameters: $('addMaterialForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
console.log(response);	
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblMaterial');
				AddMaterialDiv(0);				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditMaterialPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
	{
		method:'post',
		parameters: {type: "editMaterial", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditMaterialPopup(0); });
			Event.observe($('btnEditMaterial'), "click", EditMaterial);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditMaterial()
{	
	$("type").value = "saveEditMaterial";
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
	{
		method:'post',
		parameters: $('editMaterialForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblMaterial');
				AddMaterialDiv(0);
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);								
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteMaterialPopup(id)
{
	
	var message = "Realmente deseas eliminar este material?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php',{
			method:'post',
			parameters: {type: "deleteMaterial", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblMaterial');
				AddMaterialDiv(0);				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function SearchMaterial()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php',{
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
					TableKit.reloadTable('tblMaterial');
				}
				else
				{
					ShowStatus(splitResponse[1]);					
					AddMaterialDiv(0);				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadSubcats()
{
	var idCategory = $("categoryId").value;
	
	$('listSubcat').innerHTML = "";
	$("fieldSubcat").hide();
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats", categoryId: idCategory},
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

function AddPrice()
{	
	var form = $("formName").value;
	
	$("type").value = "savePrices";
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
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
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
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
	new Ajax.Request(WEB_ROOT+'/ajax/material.php', 
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

function ViewPrices(id){
	
	var obj = $('prices_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

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

function ToogleSteel()
{
	var obj = $("fieldSteel");
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function VerifyTraslape(){
	
	var traslape = $("traslape").value;		
	traslape = parseFloat(traslape);
		
	if(traslape > 0)
		$("bulbos").value = 0;
		
}

function VerifyBulbos(){
		
	var bulbos = $("bulbos").value;
	bulbos = parseFloat(bulbos);
	
	if(bulbos > 0)
		$("traslape").value = 0;
	
}