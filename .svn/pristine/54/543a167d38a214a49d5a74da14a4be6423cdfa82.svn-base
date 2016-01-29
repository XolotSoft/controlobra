/*** MANTENIMIENTO ***/

function AddMant()
{	
	$("type").value = "saveMant";

	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php',
	{
		method:'post',
		parameters: $('frmProyMontos').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			AddMant2();			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddMant2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: {type:"addMant"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listMant").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelMant(key)
{	
	$("type").value = "saveMant";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: $('frmProyMontos').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelMant2(key);			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelMant2(key)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: {type:"delMant", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listMant").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*** EQUIPAMIENTO ***/

function AddEquip()
{
	$("type").value = "saveEquip";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: $('frmProyMontos').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			AddEquip2();						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddEquip2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: {type:"addEquip"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listEquip").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelEquip(key)
{
	$("type").value = "saveEquip";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: $('frmProyMontos').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelEquip2(key);						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelEquip2(key)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: {type:"delEquip", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listEquip").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function SaveMontos()
{
	$("type").value = "saveMontos";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-montos.php', 
	{
		method:'post',
		parameters: $('frmProyMontos').serialize(true),
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