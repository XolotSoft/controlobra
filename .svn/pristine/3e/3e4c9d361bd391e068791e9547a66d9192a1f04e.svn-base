Event.observe(window, 'load', function() {
	
	Event.observe($('addItemDiv'), "click", AddItemDiv);
	
	AddEditItemListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteItemPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditItemPopup(id);
		}
	}

	$('contenido').observe("click", AddEditItemListeners);																	 

});

function AddItemDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: {type: "addItem"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddItem'), "click", AddItem);
			Event.observe($('fviewclose'), "click", function(){ AddItemDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddItem()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: $('addItemForm').serialize(true),
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
				AddItemDiv(0);
				TableKit.reloadTable('tblItem');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditItemPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: {type: "editItem", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditItemPopup(0); });
			Event.observe($('btnEditItem'), "click", EditItem);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditItem()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: $('editItemForm').serialize(true),
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
				AddItemDiv(0);
				TableKit.reloadTable('tblItem');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteItemPopup(id)
{
	
	var message = "Realmente deseas eliminar este edificio?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php',{
			method:'post',
			parameters: {type: "deleteItem", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddItemDiv(0);
				TableKit.reloadTable('tblItem');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddLevel(id){
		
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php',{
			method:'post',
			parameters: {type: "addLevel", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				window.location.href = WEB_ROOT + "project-level";
			},
		onFailure: function(){ alert('Something went wrong...') }
	 });
	 	
}