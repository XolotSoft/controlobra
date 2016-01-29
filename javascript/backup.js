function Generate()
{
	var message = "Realmente deseas generar un nuevo respaldo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/backup.php',{
		method:'post',
		parameters: {type: "generateBackup"},
		onLoading: function(){
			$("loader").show();
		},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			$("loader").hide();
			
			if(splitResponse[0] == "ok"){
				ShowStatus(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				grayOut(false);
			}else{
				ShowStatus(splitResponse[1]);
			}
			
		},
	onFailure: function(){ alert('Something went wrong...') }
  });
	
}