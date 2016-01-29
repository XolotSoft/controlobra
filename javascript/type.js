Event.observe(window, 'load', function() {
	
	Event.observe($('addTypeDiv'), "click", AddTypeDiv);
	
	AddEditTypeListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteTypePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditTypePopup(id);
		}
	}

	$('contenido').observe("click", AddEditTypeListeners);																	 

});

function AddTypeDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/type.php', 
	{
		method:'post',
		parameters: {type: "addType"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddType'), "click", AddType);
			Event.observe($('fviewclose'), "click", function(){ AddTypeDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddType()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/type.php', 
	{
		method:'post',
		parameters: $('addTypeForm').serialize(true),
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
				AddTypeDiv(0);
				TableKit.reloadTable('tblType');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditTypePopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/type.php', 
	{
		method:'post',
		parameters: {type: "editType", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditTypePopup(0); });
			Event.observe($('btnEditType'), "click", EditType);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditType()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/type.php', 
	{
		method:'post',
		parameters: $('editTypeForm').serialize(true),
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
				AddTypeDiv(0);
				TableKit.reloadTable('tblType');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteTypePopup(id)
{
	
	var message = "Realmente deseas eliminar este tipo de area?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/type.php',{
			method:'post',
			parameters: {type: "deleteType", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddTypeDiv(0);
				TableKit.reloadTable('tblType');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}