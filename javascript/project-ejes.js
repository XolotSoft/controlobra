/*** EJES N ***/

function AddEjeN()
{	
	$("type").value = "saveEjesN";

	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php',
	{
		method:'post',
		parameters: $('frmProyEjes').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			AddEjeN2();
			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddEjeN2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: {type:"addEjeN"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listEjesN").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelEjeN(key)
{	
	$("type").value = "saveEjesN";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: $('frmProyEjes').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelEjeN2(key);			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelEjeN2(key)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: {type:"delEjeN", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listEjesN").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*** EJES L ***/

function AddEjeL()
{
	$("type").value = "saveEjesL";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: $('frmProyEjes').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			AddEjeL2();						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddEjeL2()
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: {type:"addEjeL"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listEjesL").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelEjeL(key)
{
	$("type").value = "saveEjesL";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: $('frmProyEjes').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelEjeL2(key);						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelEjeL2(key)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: {type:"delEjeL", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listEjesL").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Eje");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function SaveEjes()
{
	$("type").value = "saveEjes";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-ejes.php', 
	{
		method:'post',
		parameters: $('frmProyEjes').serialize(true),
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