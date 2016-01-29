function ViewCats(id){
	
	var obj = $('cats_'+id);
	var icon = $("iconCat_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}		
}

function ViewSubcats(idP,id){
	
	var obj = $('subcats_'+idP+'_'+id);
	var icon = $("iconSubcat_"+idP+'_'+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}		
}

function ViewConcepts(idP,id){
	
	var obj = $('conc_'+idP+'_'+id);
	var icon = $("iconConc_"+idP+'_'+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

function ViewCuants(idP,id){

	var obj = $('cuant_'+idP+'_'+id);
	var icon = $("iconCuant_"+idP+'_'+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}
}

function SearchMaterial()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/material.php',{
			method:'post',
			parameters: $('frmSearch').serialize(true),
			onLoading: function(){
				$("loader").show();	
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";				
				var splitResponse = response.split("[#]");

				$("loader").hide();
				
				if(splitResponse[0] == "ok")
				{
					$('contenido').innerHTML = splitResponse[1];
				}
				else
				{
					ShowStatus(splitResponse[1]);					
					AddMaterialDiv(0);				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadSubcats2()
{
	var idCategory = $("categoryId2").value;
	
	$('enumSubcat').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats2", categoryId: idCategory},
		  onLoading: function(){
			  	$('enumSubcat').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('enumSubcat').innerHTML = splitResponse[1];
			  
			  LoadConceptCons2();
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadConceptCons2()
{
	var idSubcategory = $("subcategoryId2").value;
	
	$('enumConcept').innerHTML = "";
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConceptCons2", subcategoryId: idSubcategory},
		  onLoading: function(){
			  	$('enumConcept').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  $('enumConcept').innerHTML = splitResponse[1];
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}