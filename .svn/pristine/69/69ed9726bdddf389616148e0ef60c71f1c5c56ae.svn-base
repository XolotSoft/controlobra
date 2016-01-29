/*** CAJONES DE ESTACIONAMIENTO ***/

function AddCajon()
{	
	$("type").value = "saveCajon";

	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php',
	{
		method:'post',
		parameters: $('frmProyCajBod').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			AddCajon2();			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddCajon2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: {type:"addCajon"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listCajon").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelCajon(key)
{	
	$("type").value = "saveCajon";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: $('frmProyCajBod').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelCajon2(key);			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelCajon2(key)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: {type:"delCajon", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listCajon").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*** BODEGAS ***/

function AddBodega()
{
	$("type").value = "saveBodega";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: $('frmProyCajBod').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			AddBodega2();						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddBodega2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: {type:"addBodega"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listBodega").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelBodega(key)
{
	$("type").value = "saveBodega";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: $('frmProyCajBod').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelBodega2(key);						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelBodega2(key)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: {type:"delBodega", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listBodega").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function SaveCajBod()
{
	$("type").value = "saveCajBod";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-cajybod.php', 
	{
		method:'post',
		parameters: $('frmProyCajBod').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT + "project/p/" + splitResponse[1];
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				grayOut(false);				
			}
				
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}