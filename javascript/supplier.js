Event.observe(window, 'load', function() {
	
	Event.observe($('addSupplierDiv'), "click", AddSupplierDiv);
	
	AddEditSupplierListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSupplierPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSupplierPopup(id);
		}
	}

	$('contenido').observe("click", AddEditSupplierListeners);																	 

});

function AddSupplierDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: {type: "addSupplier"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddSupplier'), "click", AddSupplier);
			Event.observe($('fviewclose'), "click", function(){ AddSupplierDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddSupplier()
{
	$("type").value = "saveAddSupplier";
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: $('addSupplierForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
		
			if(splitResponse[0] == "ok")
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblSupplier');
				AddSupplierDiv(0);
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSupplierPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: {type: "editSupplier", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditSupplierPopup(0); });
			Event.observe($('btnEditSupplier'), "click", EditSupplier);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSupplier()
{
	$("type").value = "saveEditSupplier";
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: $('editSupplierForm').serialize(true),
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
				TableKit.reloadTable('tblSupplier');
				AddSupplierDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteSupplierPopup(id)
{
	
	var message = "Realmente deseas eliminar este proveedor?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php',{
			method:'post',
			parameters: {type: "deleteSupplier", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblSupplier');
				AddSupplierDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function SearchSupplier()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php',{
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
					TableKit.reloadTable('tblSupplier');
				}
				else
				{
					ShowStatus(splitResponse[1]);					
					AddSupplierDiv(0);				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadCities()
{
	var idState = $("stateId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/state.php',{
			method:'post',
			parameters: {type: "loadCities", stateId: idState},
			onLoading: function(){
				  $('listCities').innerHTML = LOADER;
			  },
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok")
				{
					$('listCities').innerHTML = splitResponse[1];
				}else{
					alert("Ocurrio un error al cargar los datos");
				}
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewProjects(id){
	
	var obj = $('proj_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ViewProjectsProv(id){
	
	var obj = $('projProv_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ToogleProjects()
{
	var tipo = $("tipo").value;
	
	if(tipo == "contratista")
		$("listProj").show();
	else
		$("listProj").hide();
}

function DeletePdf(id)
{	
	var message = "Realmente deseas eliminar este archivo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php',{
			method:'post',
			parameters: {type: "deletePdf", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				AddSupplierDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function DeletePdf2(id)
{	
	var message = "Realmente deseas eliminar este archivo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php',{
			method:'post',
			parameters: {type: "deletePdf2", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				AddSupplierDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddPdf(idSupplier, idProject)
{
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php',{
			method:'post',
			parameters: {type: "addPdf", projectId: idProject},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				window.location.href = WEB_ROOT + "supplier-pdf/supplierId/" + idSupplier;
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}

/*** CONTACTS ***/

function AddContact()
{	
	var form = $("formName").value;
	
	$("type").value = "saveContacts";
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			AddContact2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddContact2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: {type:"addContact"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listContact').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelContact(id)
{	
	var form = $("formName").value;
	
	$("type").value = "saveContacts";
	
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelContact2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelContact2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/supplier.php', 
	{
		method:'post',
		parameters: {type:"delContact", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listContact').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}