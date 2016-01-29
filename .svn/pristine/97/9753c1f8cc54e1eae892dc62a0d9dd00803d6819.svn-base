function EditFechaEntrega(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type: "editFechaEntrega", orderBuyId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnSave'), "click", SaveFechaEnt);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SaveFechaEnt(){
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $('editFechaEntForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblOrderBuy');
				HideFview();				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function Refresh(){
	
	var status = $("vStatus").value;
	var fechaEntrega = $("vFechaEntrega").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
			method:'post',
			parameters: {type: "doRefreshSend", status: status, fechaEntrega: fechaEntrega},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok")
					window.location.reload();
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}