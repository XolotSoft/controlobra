Event.observe(window, 'load', function() {
	
	Event.observe($('addCustomerDiv'), "click", AddCustomerDiv);
	
	AddEditCustomerListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteCustomerPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditCustomerPopup(id);
		}
	}

	$('contenido').observe("click", AddEditCustomerListeners);																	 

});

function AddCustomerDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php', 
	{
		method:'post',
		parameters: {type: "addCustomer"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddCustomer'), "click", AddCustomer);
			Event.observe($('fviewclose'), "click", function(){ AddCustomerDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddCustomer()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php', 
	{
		method:'post',
		parameters: $('addCustomerForm').serialize(true),
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
				TableKit.reloadTable('tblCustomer');
				AddCustomerDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCustomerPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php', 
	{
		method:'post',
		parameters: {type: "editCustomer", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditCustomerPopup(0); });
			Event.observe($('btnEditCustomer'), "click", EditCustomer);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCustomer()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php', 
	{
		method:'post',
		parameters: $('editCustomerForm').serialize(true),
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
				TableKit.reloadTable('tblCustomer');
				AddCustomerDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteCustomerPopup(id)
{
	
	var message = "Realmente deseas eliminar este cliente?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php',{
			method:'post',
			parameters: {type: "deleteCustomer", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblCustomer');
				AddCustomerDiv(0);				
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

/** ADDRESS **/

function AddAddressDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer-address.php', 
	{
		method:'post',
		parameters: {type: "addAddress", customerId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddAddress'), "click", AddAddress);
			Event.observe($('fviewclose'), "click", function(){ AddAddressDiv(0); });			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddAddress()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer-address.php', 
	{
		method:'post',
		parameters: $('addAddressForm').serialize(true),
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
				id = splitResponse[2];
				$('contAddress_'+id).innerHTML = splitResponse[3];
				AddAddressDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditAddressPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer-address.php', 
	{
		method:'post',
		parameters: {type: "editAddress", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditAddressPopup(0); });
			Event.observe($('btnEditAddress'), "click", EditAddress);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditAddress()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/customer-address.php', 
	{
		method:'post',
		parameters: $('editAddressForm').serialize(true),
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
				id = splitResponse[2];
				$('contAddress_'+id).innerHTML = splitResponse[3];
				AddAddressDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteAddressPopup(id)
{	
	var message = "Realmente deseas eliminar esta direccion?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer-address.php',{
			method:'post',
			parameters: {type: "deleteAddress", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contAddress_'+id).innerHTML = splitResponse[3];
				AddAddressDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function CheckReligion(){

	var religion = $("religion").value;
	var status;
	
	if(religion == "Otra")
		status = "";
	else
		status = "none";
	
	$("txtOtraReligion").style.display = status;
	$("inputOtraReligion").style.display = status;
	
}

function ViewAddress(id){
	
	var obj = $('address_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}