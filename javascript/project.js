Event.observe(window, 'load', function() {
	
	Event.observe($('addProjectDiv'), "click", AddProjectDiv);
	
	AddEditProjectListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteProjectPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditProjectPopup(id);
		}
	}

	$('contenido').observe("click", AddEditProjectListeners);																	 

});

function AddProjectDiv(id)
{
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	window.location.href = WEB_ROOT + "project-new";
}

function EditAddressDiv(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project.php', 
	{
		method:'post',
		parameters: {type: "editAddress", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditAddressDiv(0); });
			Event.observe($('btnEditAddress'), "click", SaveEditAddress);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function SaveEditAddress()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project.php', 
	{
		method:'post',
		parameters: $('editAddressForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");

			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				EditAddressDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteProjectPopup(id)
{
	
	var message = "Realmente deseas eliminar este proyecto?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project.php',{
			method:'post',
			parameters: {type: "deleteProject", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == "ok"){
					window.location.href = WEB_ROOT + "project";
				}
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewTypes(id){
	
	var obj = $('type_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ViewItems(id){
	
	var obj = $('item_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/** TIPOS DE AREA **/

function AddTypeDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: {type: "addType", projectId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddType'), "click", AddType);
			Event.observe($('fviewclose'), "click", function(){ AddTypeDiv(0); });
			$('type_'+id).style.display = '';
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddType()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: $('addTypeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
				id = splitResponse[2];
				$('contType_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditTypePopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: {type: "editType", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditTypePopup(0); });
			Event.observe($('btnEditType'), "click", EditType);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditType()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: $('editTypeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contType_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteTypePopup(id)
{
	
	var message = "Realmente deseas eliminar este tipo de area?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php',{
			method:'post',
			parameters: {type: "deleteType", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contType_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

/** SUBTIPOS DE AREA **/

function AddSubTypePopup(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: {type: "addSubType", projTypeId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddSubType'), "click", AddSubType);
			Event.observe($('fviewclose'), "click", function(){ AddSubTypePopup(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddSubType()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: $('addSubTypeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
				id = splitResponse[2];
				$('listSubtipo_'+id).show();
				$('listSubtipo_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSubTypePopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: {type: "editSubType", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditSubTypePopup(0); });
			Event.observe($('btnEditSubType'), "click", EditSubType);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSubType()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php', 
	{
		method:'post',
		parameters: $('editSubTypeForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
				id = splitResponse[2];
				$('listSubtipo_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteSubTypePopup(id)
{
	
	var message = "Realmente deseas eliminar este subtipo de area?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-type.php',{
			method:'post',
			parameters: {type: "deleteSubType", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");
				
				ShowStatus(splitResponse[1]);				
				id = splitResponse[2];
				$('listSubtipo_'+id).innerHTML = splitResponse[3];
				AddTypeDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

/** ITEMS :: TORRES **/

function AddItemDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: {type: "addItem", projectId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddItem'), "click", AddItem);
			Event.observe($('fviewclose'), "click", function(){ AddItemDiv(0); });
			$('item_'+id).style.display = '';
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddItem()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: $('addItemForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);				
				id = splitResponse[2];
				$('contItem_'+id).innerHTML = splitResponse[3];
				AddItemDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditItemPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: {type: "editItem", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditItemPopup(0); });
			Event.observe($('btnEditItem'), "click", EditItem);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditItem()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php', 
	{
		method:'post',
		parameters: $('editItemForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contItem_'+id).innerHTML = splitResponse[3];
				AddItemDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteItemPopup(id)
{
	
	var message = "Realmente deseas eliminar esta torre?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-item.php',{
			method:'post',
			parameters: {type: "deleteItem", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contItem_'+id).innerHTML = splitResponse[3];
				AddItemDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewLevels(id){
	
	var obj = $('level_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/** LEVELS **/


function AddLevelDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: {type: "addLevel", projItemId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddLevel'), "click", AddLevel);
			Event.observe($('fviewclose'), "click", function(){ AddLevelDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddLevel()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: $('addLevelForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contLevel_'+id).innerHTML = splitResponse[3];
				AddLevelDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditLevelPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: {type: "editLevel", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditLevelPopup(0); });
			Event.observe($('btnEditLevel'), "click", EditLevel);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditLevel()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php', 
	{
		method:'post',
		parameters: $('editLevelForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contLevel_'+id).innerHTML = splitResponse[3];
				AddLevelDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteLevelPopup(id)
{
	
	var message = "Realmente deseas eliminar este nivel?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-level.php',{
			method:'post',
			parameters: {type: "deleteLevel", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contLevel_'+id).innerHTML = splitResponse[3];
				AddLevelDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewDeptos(id){
	
	var obj = $('depto_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/** DEPTOS **/

function AddDeptoDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-depto.php', 
	{
		method:'post',
		parameters: {type: "addDepto", projLevelId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddDepto'), "click", AddDepto);
			Event.observe($('fviewclose'), "click", function(){ AddDeptoDiv(0); });
			$('level_'+id).style.display = '';
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddDepto()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-depto.php', 
	{
		method:'post',
		parameters: $('addDeptoForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contDepto_'+id).innerHTML = splitResponse[3];
				AddDeptoDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditDeptoPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-depto.php', 
	{
		method:'post',
		parameters: {type: "editDepto", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditDeptoPopup(0); });
			Event.observe($('btnEditDepto'), "click", EditDepto);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditDepto()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/project-depto.php', 
	{
		method:'post',
		parameters: $('editDeptoForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contDepto_'+id).innerHTML = splitResponse[3];
				AddDeptoDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteDeptoPopup(id)
{
	
	var message = "Realmente deseas eliminar este departamento?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/project-depto.php',{
			method:'post',
			parameters: {type: "deleteDepto", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";

				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contDepto_'+id).innerHTML = splitResponse[3];
				AddDeptoDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

/** OTHER FUNCIONTS **/

function hideMessage(){
	$("success").style.display = "none";	
}

function UpdateAreas(){
	
	UpdateAreaVenta();
	UpdateAreaTerraza();
	UpdateAreaJardin();
	
}

function UpdateAreaVenta()
{
	var totalVenta = 0;
	var redondeo = $("redondeo").value;
	var areaReal = $("realArea").value;
	var areaComun = $("comunArea").value;
	var areaReal2 = 0;
	
	if(redondeo == "")
		redondeo = 0;
	else
		redondeo = parseFloat(redondeo);
	
	if(areaComun == "")
		areaComun = 0;
	else
		areaComun = parseFloat(areaComun);
		
	if(areaReal == "")
		areaReal = 0;
	else	
		areaReal = parseFloat(areaReal);
	
	areaReal2 = Math.round(areaReal);
	
	totalVenta = redondeo + areaReal2;
	
	if(areaComun > 0){
		totalVenta = 0;
		areaReal = 0;
	}
		
	$("ventaArea").value = totalVenta.toFixed(2);
	
	//Formateando a 2 decimales
	$("redondeo").value = redondeo.toFixed(2);
	$("realArea").value = areaReal.toFixed(2);
	$("comunArea").value = areaComun.toFixed(2);
	
}

function UpdateAreaTerraza()
{
	var totalVenta = 0;
	var redondeo = $("redondeo").value;
	var terrazaReal = $("terrazaReal").value;
	var terrazaReal2 = 0;
	
	if(redondeo == "")
		redondeo = 0;
	else
		redondeo = parseFloat(redondeo);
			
	if(terrazaReal == "")
		terrazaReal = 0;
	else	
		terrazaReal = parseFloat(terrazaReal);
	
	terrazaReal2 = Math.round(terrazaReal);
	
	totalVenta = redondeo + terrazaReal2;
		
	//Formateando a 2 decimales
	$("terrazaReal").value = terrazaReal.toFixed(2);
	$("terrazaComun").value = totalVenta.toFixed(2);
	
}

function UpdateAreaJardin()
{
	var totalVenta = 0;
	var redondeo = $("redondeo").value;
	var jardinReal = $("jardinReal").value;
	var jardinReal2 = 0;
	
	if(redondeo == "")
		redondeo = 0;
	else
		redondeo = parseFloat(redondeo);
			
	if(jardinReal == "")
		jardinReal = 0;
	else	
		jardinReal = parseFloat(jardinReal);
	
	jardinReal2 = Math.round(jardinReal);
	
	totalVenta = redondeo + jardinReal2;
		
	//Formateando a 2 decimales
	$("jardinReal").value = jardinReal.toFixed(2);
	$("jardinComun").value = totalVenta.toFixed(2);
	
}

function ShowSubTypes(id){
	
	var obj = $('listSubtipo_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}