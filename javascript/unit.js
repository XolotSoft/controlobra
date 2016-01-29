Event.observe(window, 'load', function() {
	
	Event.observe($('addUnitDiv'), "click", AddUnitDiv);
	
	AddEditUnitListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteUnitPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditUnitPopup(id);
		}
	}

	$('contenido').observe("click", AddEditUnitListeners);																	 

});

function AddUnitDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/unit.php', 
	{
		method:'post',
		parameters: {type: "addUnit"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddUnit'), "click", AddUnit);
			Event.observe($('fviewclose'), "click", function(){ AddUnitDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddUnit()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/unit.php', 
	{
		method:'post',
		parameters: $('addUnitForm').serialize(true),
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
				AddUnitDiv(0);
				TableKit.reloadTable('tblUnit');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditUnitPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/unit.php', 
	{
		method:'post',
		parameters: {type: "editUnit", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditUnitPopup(0); });
			Event.observe($('btnEditUnit'), "click", EditUnit);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditUnit()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/unit.php', 
	{
		method:'post',
		parameters: $('editUnitForm').serialize(true),
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
				AddUnitDiv(0);
				TableKit.reloadTable('tblUnit');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteUnitPopup(id)
{
	
	var message = "Realmente deseas eliminar esta unidad?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/unit.php',{
			method:'post',
			parameters: {type: "deleteUnit", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddUnitDiv(0);
				TableKit.reloadTable('tblUnit');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}