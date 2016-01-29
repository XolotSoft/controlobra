function ConfirmPago(id){
	
	var message = "Esta seguro de confirmar esta orden de compra para pago?";
	if(!confirm(message))
  	{
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
		  method:'post',
		  parameters: {type: "confirmOrderPago", id: id},
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

function EditEntrega(id)
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
		parameters: {type: "editEntrega", ordBuyItemId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnSave'), "click", SaveEntrega);
			Event.observe($('fviewclose'), "click", function(){ HideFview(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SaveEntrega(){
	
	$("type").value = "saveEditEntrega";
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $('editEntMatForm').serialize(true),
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

function RecibirMaterials(id){
	
	var message = "Esta seguro de recibir todos los materiales?";
	if(!confirm(message))
  	{
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type: "recibirTodoMat", orderBuyId:id},
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

function RecibirAllMaterials(id)
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
		parameters: {type: "recibirAllMaterials", orderBuyId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('btnSave'), "click", SaveAllMaterials);
			Event.observe($('fviewclose'), "click", function(){ HideFview(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SaveAllMaterials(){
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $('editAllMatForm').serialize(true),
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


function RecibirMaterialsAll(id){
	
	var message = "Esta seguro de recibir todos los materiales?";
	if(!confirm(message))
  	{
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type: "recibirTodoMat", orderBuyId:id},
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

function ViewMaterials(id){
	
	var obj = $('materials_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}

/*** ENTREGAS ***/

function AddEntrega()
{	
	var form = $("formName").value;
	
	$("type").value = "saveEntregas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			AddEntrega2();
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddEntrega2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type:"addEntrega"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listEntrega').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function DelEntrega(id)
{	
	var form = $("formName").value;
	
	$("type").value = "saveEntregas";
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: $(form).serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";		
			var splitResponse = response.split("[#]");
			
			DelEntrega2(id);
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelEntrega2(id)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php', 
	{
		method:'post',
		parameters: {type:"delEntrega", k:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$('listEntrega').innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el proveedor");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });	
}

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/order-buy.php',{
			method:'post',
			parameters: {type: "doRefreshEnt", status: status},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok")
					window.location.reload();
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}