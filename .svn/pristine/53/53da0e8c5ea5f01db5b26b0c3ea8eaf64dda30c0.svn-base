function DetailsPagoPopup(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: {type: "detailsPago", accountPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnClose'), "click", function(){ HideFview(); });
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DetailsPagoEPopup(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/estimacion-dopayment.php', 
	{
		method:'post',
		parameters: {type: "detailsPago", estimacionPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnClose'), "click", function(){ HideFview(); });
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SearchCheques(){
		
	new Ajax.Request(WEB_ROOT+'/ajax/resumen-cheques.php',{
			method:'post',
			parameters: $('frmSearch').serialize(true),
			onLoading: function(){
				$("loader").show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
console.log(response);
				$("loader").hide();
				
				if(splitResponse[0] == "ok"){
					$("contenido").innerHTML = splitResponse[1];
					TableKit.reloadTable('tblCheques');
				}
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}