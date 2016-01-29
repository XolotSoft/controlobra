function confirmDel()
{
	
	var message = "Realmente deseas eliminar esta imagen?";
	if(confirm(message))
  	{
		$("frmImg").submit();
	}	
		
}