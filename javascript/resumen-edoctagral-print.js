function ViewDesglosado(id){
	
	var obj = $('desg_'+id);
	var icon = $("iconDesg_"+id);
	
	if(obj.style.display == "none"){
		obj.style.display = "";
		icon.innerHTML = "[-]";
	}else{
		obj.style.display = "none";
		icon.innerHTML = "[+]";
	}		
}