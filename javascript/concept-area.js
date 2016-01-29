function SearchConcept()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/concept-area.php',{
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
					AddConceptDiv(0);				
				}
								
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function LoadSubcats2()
{
	var idCat = $("categoryId2").value;
			
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats2", categoryId: idCat, todos:1},
		  onLoading: function(){
			  $("enumSubcat").innerHTML = LOADER;
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
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConceptCons3", subcategoryId: idSubcategory},
		  onLoading: function(){
			  $('enumConcept').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
	  
			  $('enumConcept').innerHTML = splitResponse[1];
			  
			  LoadConcept2();
			 		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadConcept2()
{
	var idConceptCon = $("conceptConId2").value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadConcept2", conceptConId: idConceptCon},
		  onLoading: function(){
			  $('enumDesc').innerHTML = LOADER;
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumDesc').innerHTML = splitResponse[1];
			 		  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
}

function LoadItems()
{		
	var idProject = $("projectId").value;
					
	new Ajax.Request(WEB_ROOT+'/ajax/concept-area.php',{
		  method:'post',
		  parameters: {type:"loadItems", projectId:idProject},
		  onLoading: function(){
			  $('enumItems').innerHTML = LOADER;
 		      $('enumAreas').innerHTML = LOADER;			 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");

			  $('enumItems').innerHTML = splitResponse[1];
			  $('enumAreas').innerHTML = splitResponse[2];
			  			  			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
	
}

function ResetForm()
{	
/*
	new Ajax.Request(WEB_ROOT+'/ajax/concept-area.php',{
		  method:'post',
		  parameters: {type:"resetForm"},
		  onLoading: function(){
			  $('divFrm').innerHTML = LOADER; 		     	 			 
		  },
		  onSuccess: function(transport){
			  var response = transport.responseText || "no response text";			  
			  var splitResponse = response.split("[#]");
			  
			  if(splitResponse[0] == "ok"){
			  	$('divFrm').innerHTML = splitResponse[1];
				SearchConcept();
			  }
			  
		  },
	  onFailure: function(){ alert('Something went wrong...') }
	});
*/
	$("frmSearch").reset();
	SearchConcept();

}

//*****************

function ToggleRows(id){
	
	var myId;
	var icon = $("icon_"+id);
	var ocultar;
	
	if(icon.innerHTML == "[-]"){
		icon.innerHTML = "[+]";
		ocultar = true;
	}else{
		icon.innerHTML = "[-]";
		ocultar = false;
	}
	
 	$$('#contenido tr').each(function(e){
  		myId = e.identify();
		var found = myId.search(id);
				
		if(found >= 0)
			if(ocultar == true)
				e.hide();
			else
				e.show();
 	});
}