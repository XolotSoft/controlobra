function EditOrderBuyPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type: "editOrderBuy", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditOrderBuyPopup(0); });
			Event.observe($('btnEditOrderBuy'), "click", EditOrderBuy);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditOrderBuy()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $('editOrderBuyForm').serialize(true),
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
				EditOrderBuyPopup(0);
				TableKit.reloadTable('tblBank');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteOrderBuyPopup(id)
{
	var message = "Realmente deseas eliminar esta orden de compra?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
			method:'post',
			parameters: {type: "deleteOrderBuy", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblOrderBuy');
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function Confirm(id){
	
	var message = "Esta seguro de confirmar esta orden de compra?";
	if(!confirm(message))
  	{
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
		  method:'post',
		  parameters: {type: "confirmOrder", id: id},
		  onSuccess: function(transport){
			 	var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				if(splitResponse[0] == "ok")
				{
					ShowStatusPopUp(splitResponse[1]);
					$('contenido').innerHTML = splitResponse[2];
					TableKit.reloadTable('tblOrderBuy');
					HideFview();
				}
				else
				{
					ShowStatusPopUp(splitResponse[1]);										
				}			
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
		
}

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
			method:'post',
			parameters: {type: "doRefresh", status: status},
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