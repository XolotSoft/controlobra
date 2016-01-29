<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$customerId = intval($_REQUEST['customerId']);
	$p = $_SESSION['custP'];
	
	$customer->setCustomerId($customerId);
	$info = $customer->Info();
	
	$smarty->assign('p', $p);
	$smarty->assign('cmpMsg', $cmpMsg);
	$smarty->assign('errMsg', $errMsg);
	$smarty->assign('info', $info);
	$smarty->assign('mainMnu','catalogos');
			
?>