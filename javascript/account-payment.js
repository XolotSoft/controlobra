Event.observe(window, 'load', function() {
		
	AddEditPaymentListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeletePaymentPopup(id);
			return;
		}	
	}

	$('contenido').observe("click", AddEditPaymentListeners);																	 

});

function Confirm(id){
	
	var message = "Esta seguro de confirmar de revisado este pago?";
	if(!confirm(message))
  	{
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-payment.php',{
		  method:'post',
		  parameters: {type: "confirmRevisado", id: id},
		  onSuccess: function(transport){
			 	var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				if(splitResponse[0] == "ok")
				{
					ShowStatusPopUp(splitResponse[1]);
					$('contenido').innerHTML = splitResponse[2];
					TableKit.reloadTable('tblPayment');
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-payment.php',{
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

function ViewOrderBuy(id){
	
	var obj = $('orderBuy_'+id);
	var txt = $('det_'+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		txt.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		txt.innerHTML = "[+]";
	}
}

/******************/

function DeletePaymentPopup(id)
{
	
	var message = "Realmente deseas eliminar este pago?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-payment.php',{
			method:'post',
			parameters: {type: "deletePayment", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblPayment');
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}