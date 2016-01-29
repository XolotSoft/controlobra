function AddDocDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}

}

function DeleteDoc(id)
{	
	var message = "Realmente deseas eliminar este documento?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/customer.php',{
			method:'post',
			parameters: {type: "deleteDoc", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");
				
				ShowStatusPopUp(splitResponse[1])
				$('listDocs').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblDocs');
				AddDocDiv(0);				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}