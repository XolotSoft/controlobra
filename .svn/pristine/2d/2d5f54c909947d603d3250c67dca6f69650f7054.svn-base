<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$expiries = $_SESSION['expiries'];			
	$expiries2 = $util->orderMultiDimensionalArray($expiries, 'date', true); 
				
	echo '<pre>';
	print_r($expiries2);
	echo '</pre>';
	
	exit;
			
?>