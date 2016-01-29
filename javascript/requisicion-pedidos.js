function DoOrderBuy(){
	
	var chk_arr =  document.getElementsByName("matId[]");
	var chklength = chk_arr.length;             
	var k = 0;
	var total = 0;
	var values = new Array();
	
	for(k=0; k<chklength; k++){
		if(chk_arr[k].checked == true){
			values.push(chk_arr[k].value);
			total++;
		}
	} 
	
	var itemsString = values.join();
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type: "doOrderBuy", items:itemsString},
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
				TableKit.reloadTable('tblRequisicion');
			}
			HideFview();

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

function ViewPedidosPopup(id){
		
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php', 
	{
		method:'post',
		parameters: {type: "viewPedidos", reqPedidoId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ HideFview(); });
			Event.observe($('btnCerrar'), "click", function(){ HideFview(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
		
}

function DeletePedidosPopup(idReqPedido)
{	
	var message = "Realmente deseas eliminar este pedido?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
			method:'post',
			parameters: {type: "deletePedidos", reqPedidoId: idReqPedido},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");

				ShowStatusPopUp(splitResponse[1]);
				$('contenido').innerHTML = splitResponse[2];
				TableKit.reloadTable('tblRequisicion');
				HideFview();				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function Refresh(){
	
	var status = $("status").value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/requisicion-material.php',{
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

function SelAllMats(reqPedidoId){
	
	var objP = $("sel_" + reqPedidoId);
	var idMats = objP.value;	
	var mats = idMats.split("_");
	var k = 0;
	var id = 0;
	var checked = false;
	
	if(objP.checked)
		checked = true;
		
	for(k=0; k<mats.length; k++){
		id = mats[k];
		
		var objM = $("mat_" + reqPedidoId + "_" + id);
		
		if(objM != undefined)
			objM.checked = checked;
	}//for
	
}

function HideFview(){
	$('fview').hide();
	grayOut(false);
}