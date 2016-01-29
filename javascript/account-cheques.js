function RecogerChequeDiv(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: {type: "recogerCheque", accountPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnRecogerCheque'), "click", RecogerCheque);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function RecogerCheque()
{
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: $('recogerChequeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				ShowStatus(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
				HideFview();
				TableKit.reloadTable('tblPayment');				
				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function CancelarChequeDiv(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: {type: "cancelarCheque", accountPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnCancelCheque'), "click", CancelarCheque);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function CancelarCheque(){
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: $('cancelarChequeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				ShowStatus(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
				HideFview();
				TableKit.reloadTable('tblPayment');				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function CobrarChequeDiv(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: {type: "cobrarCheque", accountPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnCobrarCheque'), "click", CobrarCheque);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function CobrarCheque()
{
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php', 
	{
		method:'post',
		parameters: $('cobrarChequeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				ShowStatus(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
				HideFview();
				TableKit.reloadTable('tblPayment');				
				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

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

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php',{
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

function SearchCheques(){
		
	new Ajax.Request(WEB_ROOT+'/ajax/account-cheques.php',{
			method:'post',
			parameters: $('frmSearch').serialize(true),
			onLoading: function(){
				$("loader").show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");

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