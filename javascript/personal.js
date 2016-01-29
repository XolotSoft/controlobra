Event.observe(window, 'load', function() {
	
	Event.observe($('addPersonalDiv'), "click", AddPersonalDiv);
	
	AddEditPersonalListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeletePersonalPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditPersonalPopup(id);
		}
		
		del = el.hasClassName('spanPass');
		if(del == true)
		{
			EditPasswordPopup(id);
		}
	}

	$('contenido').observe("click", AddEditPersonalListeners);																	 

});

function AddPersonalDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "addPersonal"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddPersonal'), "click", AddPersonal);
			Event.observe($('fviewclose'), "click", function(){ AddPersonalDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPersonal()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('addPersonalForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
console.log(response);			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];				
				AddPersonalDiv(0);
				TableKit.reloadTable('tblPersonal');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditPersonalPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "editPersonal", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditPersonalPopup(0); });
			Event.observe($('btnEditPersonal'), "click", EditPersonal);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditPersonal()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('editPersonalForm').serialize(true),
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
				AddPersonalDiv(0);
				TableKit.reloadTable('tblPersonal');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditPasswordPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "editPassword", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditPasswordPopup(0); });
			if($('btnEditPasswd'))
				Event.observe($('btnEditPasswd'), "click", EditPassword);
			if($('btnDelPasswd'))
				Event.observe($('btnDelPasswd'), "click", DelPassword);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditPassword()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('editPasswdForm').serialize(true),
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
				AddPersonalDiv(0);
				TableKit.reloadTable('tblPersonal');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelPassword()
{
	
	if(!confirm("Esta seguro de eliminar la contrasena actual?"))
		return;
			
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('editPasswdForm').serialize(true),
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
				AddPersonalDiv(0);
				TableKit.reloadTable('tblPersonal');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeletePersonalPopup(id)
{
	
	var message = "Realmente deseas eliminar este usuario?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php',{
			method:'post',
			parameters: {type: "deletePersonal", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddPersonalDiv(0);
				TableKit.reloadTable('tblPersonal');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}