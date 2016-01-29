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

function AddPagoDiv(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php', 
	{
		method:'post',
		parameters: {type: "addPago", accountPaymentId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddPago'), "click", AddPago);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPago()
{
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php', 
	{
		method:'post',
		parameters: $('addPagoForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				ShowStatus(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
				HideFview();
				TableKit.reloadTable('tblPayment');	
				
				if(splitResponse[3]){
					var url =  WEB_ROOT + "/modules/account-payment-pdf.php?id=" + splitResponse[3];
					window.open(url , "Cheque");
				}
				
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeletePagoPopup(id)
{
	
	var message = "Realmente deseas eliminar este pago?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php',{
			method:'post',
			parameters: {type: "deletePago", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
		
				var id = splitResponse[1];
				$('txtAbonos_'+id).innerHTML = splitResponse[2];
				$('txtSaldo_'+id).innerHTML = splitResponse[3];
				ShowStatusPopUp(splitResponse[4]);
				$('contPagos_'+id).innerHTML = splitResponse[5];
				$('txtPagado_'+id).innerHTML = "Pendiente";
				$('btnPago2_'+id).style.display = '';
				$('btnPago_'+id).style.display = 'none';
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}


function CancelPagoPopup(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php', 
	{
		method:'post',
		parameters: {type: "cancelPago", accountPagoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnCancelPago'), "click", SaveCancelPago);
			Event.observe($('fviewclose'), "click", function(){ HideFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DetailsPagoPopup(id)
{
	grayOut(true);	
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php', 
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

function SaveCancelPago(){
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php', 
	{
		method:'post',
		parameters: $('cancelPagoForm').serialize(true),
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

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php',{
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

function CheckTipo(){
	
	var tipo = $("tipo").value;
	
	if(tipo == "Cheque"){
		$("cheque").show();
		GetNextNoCheque();
	}else{		
		$("cheque").hide();
	}
	
}

function GetNextNoCheque(){
	
	var tipo = $("tipo").value;
	var idBank = $("bankId").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php',{
			method:'post',
			parameters: {type: "getNextNoCheque", bankId:idBank},
			onLoading: function(){
				$("txtNoCheque").innerHTML = LOADER;
				$("txtSaldoCta").innerHTML = LOADER;
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok"){
					$("txtNoCheque").innerHTML = splitResponse[1];
					$("noCheque").value = splitResponse[1];
					$("txtSaldoCta").innerHTML = splitResponse[2];
				}
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewPagos(id){
	
	var obj = $('pagos_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/account-dopayment.php',{
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