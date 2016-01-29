function AddPedidoDiv(idConceptMat)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type:"addPedido", conceptMatId:idConceptMat},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				grayOut(true);
				$('fview').show();
				
				FViewOffSet(splitResponse[1]);
				Event.observe($('btnAddPedido'), "click", AddPedido);
				Event.observe($('fviewclose'), "click", function(){ HideFview(); });				
			}
			else
			{	
				ShowStatusPopUp(splitResponse[1]);
				HideFview();
			}
			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPedido()
{
	$("type").value = "saveAddPedido";

	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: $('addPedidoForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];				
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

function DeletePedidoPopup(id)
{
	var message = "Realmente deseas eliminar este pedido?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "deletePedido", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewPedidos(id){
	
	var obj = $('pedidos_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}