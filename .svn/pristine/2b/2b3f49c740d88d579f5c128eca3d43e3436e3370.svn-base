<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess('city');	
	/* End Session Control */
	
	session_start();
	
	$p = intval($_GET['p']);
	$_SESSION['cityP'] = $p;
	
	$staP = intval($_SESSION['staP']);
	
	$stateId = $_SESSION['idState'];
		
	$state->setStateId($stateId);
	$nomState = $state->GetNameById();
	
	$city->SetPage($p);
	$city->setStateId($stateId);
	$cities = $city->Enumerate();
		
	$smarty->assign('staP', $staP);
	$smarty->assign('nomState', $nomState);
	$smarty->assign('cities', $cities);
	$smarty->assign('mainMnu','catalogos');

?>