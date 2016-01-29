Event.observe(window, 'load', function() {
	
	Event.observe($('addModelDiv'), "click", AddModelDiv);
	
	AddEditModelListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteModelPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditModelPopup(id);
		}
	}

	$('content').observe("click", AddEditModelListeners);																	 

});

function AddModelDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/model.php', 
	{
		method:'post',
		parameters: {type: "addModel"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addModel'), "click", AddModel);
			Event.observe($('fviewclose'), "click", function(){ AddModelDiv(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddModel()
{
		
	new Ajax.Request(WEB_ROOT+'/ajax/model.php', 
	{
		method:'post',
		parameters: $('addModelForm').serialize(true),
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
				$('content').innerHTML = splitResponse[2];				
				AddModelDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditModelPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/model.php', 
	{
		method:'post',
		parameters: {type: "editModel", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditModelPopup(0); });
			Event.observe($('editModel'), "click", EditModel);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditModel()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/model.php', 
	{
		method:'post',
		parameters: $('editModelForm').serialize(true),
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
				$('content').innerHTML = splitResponse[2];
				AddModelDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteModelPopup(id)
{
	
	var message = "Realmente deseas eliminar este modelo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/model.php',{
			method:'post',
			parameters: {type: "deleteModel", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
			
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddModelDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}