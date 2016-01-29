<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['perP'] = $p;
	
	$personal->SetPage($p);	
	$personals = $personal->Enumerate();
	$smarty->assign('personals', $personals);
	$smarty->assign('mainMnu','catalogos');
			
?>