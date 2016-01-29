Event.observe(window, 'load', function() {
	
	Event.observe($('addLevelDiv'), "click", AddLevelDiv);
	
	AddEditLevelListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteLevelPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditLevelPopup(id);
		}
	}

	$('contenido').observe("click", AddEditLevelListeners);																	 

});

function AddLevelDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: {type: "addLevel"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddLevel'), "click", AddLevel);
			Event.observe($('fviewclose'), "click", function(){ AddLevelDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddLevel()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: $('addLevelForm').serialize(true),
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
				AddLevelDiv(0);
				TableKit.reloadTable('tblLevel');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditLevelPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: {type: "editLevel", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditLevelPopup(0); });
			Event.observe($('btnEditLevel'), "click", EditLevel);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditLevel()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: $('editLevelForm').serialize(true),
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
				AddLevelDiv(0);
				TableKit.reloadTable('tblLevel');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteLevelPopup(id)
{
	
	var message = "Realmente deseas eliminar este nivel?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php',{
			method:'post',
			parameters: {type: "deleteLevel", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddLevelDiv(0);
				TableKit.reloadTable('tblLevel');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}