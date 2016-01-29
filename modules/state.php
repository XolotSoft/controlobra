<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess('state');	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['staP'] = $p;
	
	$state->SetPage($p);
	$states = $state->Enumerate();
		
	$smarty->assign('states', $states);
	$smarty->assign('mainMnu','catalogos');

?>