<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['typeP'] = $p;
	
	$type->SetPage($p);	
	$types = $type->Enumerate();

	$smarty->assign('types', $types);
	$smarty->assign('mainMnu','catalogos');
			
?>