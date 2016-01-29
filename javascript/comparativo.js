function LoadSubcats2()
{
	var idCat = $("categoryId2").value;
			
	new Ajax.Request(WEB_ROOT+'/ajax/concept.php',{
		  method:'post',
		  parameters: {type: "loadSubcats2", categoryId: idCat},
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

function SearchConcept()
{	
	new Ajax.Request(WEB_ROOT+'/ajax/comparativo.php',{
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