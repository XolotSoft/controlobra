Event.observe(window, 'load', function() {
	
	Event.observe($('addCategoryDiv'), "click", AddCategoryDiv);
	
	AddEditCategoryListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteCategoryPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditCategoryPopup(id);
		}

	}

	$('contenido').observe("click", AddEditCategoryListeners);																	 

});

function AddCategoryDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/category.php', 
	{
		method:'post',
		parameters: {type:"addCategory", categoryId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddCategory'), "click", AddCategory);
			Event.observe($('fviewclose'), "click", function(){ AddCategoryDiv(0); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddCategory()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/category.php', 
	{
		method:'post',
		parameters: $('addCategoryForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];				
				AddCategoryDiv(0);
				TableKit.reloadTable('tblCategory');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCategoryPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/category.php', 
	{
		method:'post',
		parameters: {type: "editCategory", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditCategoryPopup(0); });
			Event.observe($('btnEditCategory'), "click", EditCategory);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCategory()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/category.php', 
	{
		method:'post',
		parameters: $('editCategoryForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddCategoryDiv(0);
				TableKit.reloadTable('tblCategory');
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteCategoryPopup(id)
{
	
	var message = "Realmente deseas eliminar esta partida?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/category.php',{
			method:'post',
			parameters: {type: "deleteCategory", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('contenido').innerHTML = splitResponse[2];
				AddCategoryDiv(0);
				TableKit.reloadTable('tblCategory');
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function ViewSubcategory(id){
	
	var obj = $('subcat_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

function ViewConcept(id){
	
	var obj = $('concept_'+id);
	
	if(obj.style.display == "none")
		obj.style.display = "";
	else
		obj.style.display = "none";
}

/** SUBCATEGORIES **/

function AddSubcategoryDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/subcategory.php', 
	{
		method:'post',
		parameters: {type: "addSubcategory", categoryId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('btnAddSubcategory'), "click", AddSubcategory);
			Event.observe($('fviewclose'), "click", function(){ AddSubcategoryDiv(0); });
			$('subcat_'+id).style.display = '';
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddSubcategory()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/subcategory.php', 
	{
		method:'post',
		parameters: $('addSubcategoryForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";

			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				id = splitResponse[2];
				$('contSubcat_'+id).innerHTML = splitResponse[3];
				AddSubcategoryDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSubcategoryPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/subcategory.php', 
	{
		method:'post',
		parameters: {type: "editSubcategory", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditSubcategoryPopup(0); });
			Event.observe($('btnEditSubcategory'), "click", EditSubcategory);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSubcategory()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/subcategory.php', 
	{
		method:'post',
		parameters: $('editSubcategoryForm').serialize(true),
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
				$('contSubcat_'+id).innerHTML = splitResponse[3];
				AddSubcategoryDiv(0);				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteSubcategoryPopup(id)
{
	
	var message = "Realmente deseas eliminar esta subpartida?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/subcategory.php',{
			method:'post',
			parameters: {type: "deleteSubcategory", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contSubcat_'+id).innerHTML = splitResponse[3];
				AddSubcategoryDiv(0);				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

/** CONCEPTS **/

function AddConceptDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-concept.php', 
	{
		method:'post',
		parameters: {type: "addConcept", subcategoryId:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
	
			FViewOffSet(response);
			Event.observe($('btnAddConcept'), "click", AddConcept);
			Event.observe($('fviewclose'), "click", function(){ AddConceptDiv(0); });
			$('subcat_'+id).style.display = '';
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddConcept()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-concept.php', 
	{
		method:'post',
		parameters: $('addConceptForm').serialize(true),
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
				$('contConcept_'+id).innerHTML = splitResponse[3];
				AddConceptDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditConceptPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-concept.php', 
	{
		method:'post',
		parameters: {type: "editConcept", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditConceptPopup(0); });
			Event.observe($('btnEditConcept'), "click", EditConcept);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditConcept()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/concept-concept.php', 
	{
		method:'post',
		parameters: $('editConceptForm').serialize(true),
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
				$('contConcept_'+id).innerHTML = splitResponse[3];
				AddConceptDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteConceptPopup(id)
{
	
	var message = "Realmente deseas eliminar este concepto?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-concept.php',{
			method:'post',
			parameters: {type: "deleteConcept", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1]);
				id = splitResponse[2];
				$('contConcept_'+id).innerHTML = splitResponse[3];
				AddConceptDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}