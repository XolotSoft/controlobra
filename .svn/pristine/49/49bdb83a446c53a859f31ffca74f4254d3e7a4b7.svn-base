Event.observe(window, 'load', function() {
	
	Event.observe($('addBankDiv'), "click", AddBankDiv);
	
	AddEditBankListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteBankPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditBankPopup(id);
		}
	}

	$('contenido').observe("click", AddEditBankListeners);																	 

});

function AddBankDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php', 
	{
		method:'post',
		parameters: {type: "addBank"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddBank'), "click", AddBank);
			Event.observe($('fviewclose'), "click", function(){ AddBankDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddBank()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php', 
	{
		method:'post',
		parameters: $('addBankForm').serialize(true),
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
				AddBankDiv(0);
				TableKit.reloadTable('tblBank');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditBankPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php', 
	{
		method:'post',
		parameters: {type: "editBank", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditBankPopup(0); });
			Event.observe($('btnEditBank'), "click", EditBank);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditBank()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php', 
	{
		method:'post',
		parameters: $('editBankForm').serialize(true),
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
				AddBankDiv(0);
				TableKit.reloadTable('tblBank');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteBankPopup(id)
{
	
	var message = "Realmente deseas eliminar este banco?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php',{
			method:'post',
			parameters: {type: "deleteBank", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddBankDiv(0);
				TableKit.reloadTable('tblBank');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddProject(){
	
	var projectId = $("projectId").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php',{
		method:'post',
		parameters: {type: "addProject", projectId: projectId},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok"){
				$('enumBankProjects').innerHTML = splitResponse[1];
			}else{
				ShowStatusPopUp(splitResponse[1]);				
			}//else
			
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
}//AddProject

function DeleteProject(k){
		
	new Ajax.Request(WEB_ROOT+'/ajax/bank.php',{
		method:'post',
		parameters: {type: "deleteProject", k:k},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok"){
				$('enumBankProjects').innerHTML = splitResponse[1];
			}else{
				ShowStatusPopUp(splitResponse[1]);				
			}//else
			
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
}//DeleteProject

function EnableStartBalance(){
	
	if($("editStartBalance").checked){
		$("inputSB").show();
		$("txtSB").hide();
	}else{
		$("txtSB").show();
		$("inputSB").hide();
	}		
	
}