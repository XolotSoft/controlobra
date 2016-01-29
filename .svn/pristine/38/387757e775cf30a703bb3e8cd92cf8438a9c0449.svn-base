function SendEmail(){
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $('frmSendEmail').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
				HideFview();
			}
			else
			{
				$("frmSendEmail").submit();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}