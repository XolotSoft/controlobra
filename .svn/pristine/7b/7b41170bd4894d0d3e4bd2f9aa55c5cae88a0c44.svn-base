function SaveStep1()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep1').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/2";			
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

function SaveStep2()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep2').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/3";
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

function SaveStep3()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep3').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/4";
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

function SaveStep4()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/5";				
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

function SaveStep5()
{	
	$("type").value = "saveStep5";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep5').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/6";				
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

function SaveStep6()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep6').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT + "project-edit/step/7";
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

function SaveStep7()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep7').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "ok")
			{
				window.location.href = WEB_ROOT +  "project-edit/step/8";
				
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

function SaveStep8()
{	
	$("type").value = "saveStep8";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
console.log(response);	
			if(splitResponse[0] == "ok")
			{				
				window.location.href = WEB_ROOT +  "project";
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

function SetType(t,d){
	
	var indexType = $("typeId_"+t).selectedIndex;
	var levels = $('levels_'+t).value;	
	var idType = $("typeId_"+t).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"getTypeAreaColor", typeId:idType},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{								
				for(l=0;l<=levels;l++){
					if($('typeId_'+t+'_'+l+'_'+d) != undefined){
						$('typeId_'+t+'_'+l+'_'+d).selectedIndex = indexType;
						$('area_'+t+'_'+l+'_'+d).style.backgroundColor = splitResponse[1];
					}
				}
								
			}			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
	
	
}

function GoStep(no)
{
	window.location.href = WEB_ROOT +  "project-edit/step/" + no;
}

function AddTypeArea()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			AddTypeArea2();
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddTypeArea2()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"addTypeArea"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
console.log(response);			
			if(splitResponse[0] == "ok")
			{
				$("listTypeAreas").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el Tipo de Area");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelTypeArea(key)
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelTypeArea2(key);
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelTypeArea2(key)
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"delTypeArea", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listTypeAreas").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el Tipo de Area");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function SaveTypeAreas()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

/****** SUB TYPE AREAS *******/

function AddSubTypeArea(key){
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			AddSubTypeArea2(key);
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddSubTypeArea2(key){
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"addSubTypeArea", key:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			$("subTypes_"+key).show();
			$("listSubTypes_"+key).innerHTML = splitResponse[1];
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelSubTypeArea(key, k){

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep4').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelSubTypeArea2(key, k);
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelSubTypeArea2(key, k){

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"delSubTypeArea", key:key, k:k},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[1] > 0)
				$("subTypes_"+key).show();
			else
				$("subTypes_"+key).hide();
			$("listSubTypes_"+key).innerHTML = splitResponse[2];
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*** EJES N ***/

function AddEjeN()
{	
	$("type").value = "saveEjesN";

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep5').serialize(true),
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
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep5').serialize(true),
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
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep5').serialize(true),
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
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
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
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep5').serialize(true),
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
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
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

/*** MONTOS MANTENIMIENTO ***/

function SaveMontoMant()
{	
	$("type").value = "saveMontoMant";

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddMontoMant()
{	
	$("type").value = "saveMontoMant";

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			AddMontoMant2();			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddMontoMant2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"addMontoMant"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listMontoMant").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el monto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelMontoMant(key)
{	
	$("type").value = "saveMontoMant";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelMontoMant2(key);			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelMontoMant2(key)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"delMontoMant", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listMontoMant").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el monto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*** MONTOS EQUIPAMIENTO ***/

function SaveMontoEquip()
{	
	$("type").value = "saveMontoEquip";

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddMontoEquip()
{	
	$("type").value = "saveMontoEquip";

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");

			AddMontoEquip2();			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddMontoEquip2()
{
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"addMontoEquip"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{
				$("listMontoEquip").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al agregar el monto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DelMontoEquip(key)
{	
	$("type").value = "saveMontoEquip";
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: $('frmStep8').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			DelMontoEquip2(key);			
						
	},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function DelMontoEquip2(key)
{		
	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"delMontoEquip", id:key},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok")
			{				
				$("listMontoEquip").innerHTML = splitResponse[1];
			}
			else
			{
				alert("Ocurrio un error al eliminar el monto");
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/*********************/

function UpdateAreas(k){
	
	UpdateAreaVenta(k);
	UpdateAreaTerraza(k);
	UpdateAreaJardin(k);
	
}

function UpdateAreaVenta(k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+k).value;
	var areaReal = $("areaReal_"+k).value;
	var areaComun = $("areaComun_"+k).value;
	var areaReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	areaReal = parseFloat(areaReal);
	areaComun = parseFloat(areaComun);
	
	areaReal2 = Math.round(areaReal);
	
	totalVenta = redondeo + areaReal2;
	
	if(areaComun > 0){
		totalVenta = 0;
		areaReal = 0;
	}
	
	$("areaVenta_"+k).value = totalVenta.toFixed(2);
	
	//Formateando a 2 decimales
	$("factorRed_"+k).value = redondeo.toFixed(2);
	$("areaReal_"+k).value = areaReal.toFixed(2);
	$("areaComun_"+k).value = areaComun.toFixed(2);
	
}

function UpdateAreaTerraza(k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+k).value;
	var terrazaReal = $("realTerraza_"+k).value;
	var terrazaReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	terrazaReal = parseFloat(terrazaReal);	
	terrazaReal2 = Math.round(terrazaReal);
	
	totalVenta = redondeo + terrazaReal2;
		
	$("comunTerraza_"+k).value = totalVenta.toFixed(2);
	$("realTerraza_"+k).value = terrazaReal.toFixed(2);	
	
}

function UpdateAreaJardin(k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+k).value;
	var jardinReal = $("realJardin_"+k).value;
	var jardinReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	jardinReal = parseFloat(jardinReal);	
	jardinReal2 = Math.round(jardinReal);
	
	totalVenta = redondeo + jardinReal2;
		
	$("comunJardin_"+k).value = totalVenta.toFixed(2);
	$("realJardin_"+k).value = jardinReal.toFixed(2);	
	
}

function UpdateColorArea(id)
{	
	var idType = $("typeId_"+id).value;

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"getTypeAreaColor", typeId:idType},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				$("area_"+id).style.backgroundColor = splitResponse[1];
			}
			
			CheckSubTypeAreas(id);
			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });

	
}

function UpdateColorAreaSub(id)
{	
	var idType = $("typeId_"+id).value;
	var idSubType = $("subTypeId_"+id).value;

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"getSubTypeAreaColor", typeId:idType, subTypeId:idSubType},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{				
				$("area_"+id).style.backgroundColor = splitResponse[1];
			}			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });

	
}

function CheckSubTypeAreas(id){
	
	var idType = $("typeId_"+id).value;

	new Ajax.Request(WEB_ROOT+'/ajax/project-edit.php', 
	{
		method:'post',
		parameters: {type:"checkSubTypeAreas", typeId:idType, nom:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "ok")
			{	
				if(splitResponse[1] > 0)
					$("divSubTypes_"+id).show();
				else
					$("divSubTypes_"+id).hide();
				
				$("divSubTypes_"+id).innerHTML = splitResponse[2];
			}			
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

/**** OPERACIONES SUBTYPE AREAS	****/

function UpdateAreasS(key,k){
	
	UpdateAreaVentaS(key,k);
	UpdateAreaTerrazaS(key,k);
	UpdateAreaJardinS(key,k);
	
}

function UpdateAreaVentaS(key,k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+key+"_"+k).value;
	var areaReal = $("areaReal_"+key+"_"+k).value;
	var areaComun = $("areaComun_"+key+"_"+k).value;
	var areaReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	areaReal = parseFloat(areaReal);
	areaComun = parseFloat(areaComun);
	
	areaReal2 = Math.round(areaReal);
	
	totalVenta = redondeo + areaReal2;
	
	if(areaComun > 0){
		totalVenta = 0;
		areaReal = 0;
	}
	
	$("areaVenta_"+key+"_"+k).value = totalVenta.toFixed(2);
	
	//Formateando a 2 decimales
	$("factorRed_"+key+"_"+k).value = redondeo.toFixed(2);
	$("areaReal_"+key+"_"+k).value = areaReal.toFixed(2);
	$("areaComun_"+key+"_"+k).value = areaComun.toFixed(2);
	
}

function UpdateAreaTerrazaS(key,k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+key+"_"+k).value;
	var terrazaReal = $("realTerraza_"+key+"_"+k).value;
	var terrazaReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	terrazaReal = parseFloat(terrazaReal);	
	terrazaReal2 = Math.round(terrazaReal);
	
	totalVenta = redondeo + terrazaReal2;
		
	$("comunTerraza_"+key+"_"+k).value = totalVenta.toFixed(2);
	$("realTerraza_"+key+"_"+k).value = terrazaReal.toFixed(2);	
	
}

function UpdateAreaJardinS(key,k)
{
	var totalVenta = 0;
	var redondeo = $("factorRed_"+key+"_"+k).value;
	var jardinReal = $("realJardin_"+key+"_"+k).value;
	var jardinReal2 = 0;
	
	redondeo = parseFloat(redondeo);
	jardinReal = parseFloat(jardinReal);	
	jardinReal2 = Math.round(jardinReal);
	
	totalVenta = redondeo + jardinReal2;
		
	$("comunJardin_"+key+"_"+k).value = totalVenta.toFixed(2);
	$("realJardin_"+key+"_"+k).value = jardinReal.toFixed(2);	
	
}