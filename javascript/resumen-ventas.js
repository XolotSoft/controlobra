function UpdatePrice()
{
	var price = $("price").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/resumen-ventas.php', 
	{
		method:'post',
		parameters: "type=updatePrice&price="+price,
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				$("price").value = splitResponse[1];
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}