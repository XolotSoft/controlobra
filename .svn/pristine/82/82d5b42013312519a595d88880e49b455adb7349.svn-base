<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['custP'] = $p;
	
	$unit->SetPage($p);	
	$units = $unit->Enumerate();

	$smarty->assign('units', $units);
	$smarty->assign('mainMnu','catalogos');
			
?>