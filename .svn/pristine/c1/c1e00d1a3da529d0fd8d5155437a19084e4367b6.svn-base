<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['contPayP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	$contPayment->SetPage($p);	
	$contPayment->setProjectId($projectId);
	$payments = $contPayment->Enumerate();
	
	$result = $payments['items'];
			
	$items = array();
	foreach($result as $res){
		$card = $res;		
		
		$customer->setCustomerId($res['customerId']);
		$card['customer'] = $customer->GetNameById();
				
		$projItem->setProjItemId($res['projItemId']);
		$card['item'] = $projItem->GetNameById();
		
		$projLevel->setProjLevelId($res['projLevelId']);
		$card['level'] = $projLevel->GetNameById();
		
		$projDepto->setProjDeptoId($res['projDeptoId']);
		$card['area'] = $projDepto->GetNameById();
		
		$card['quantity'] = number_format($res['quantity'],2);
		
		$card['fecha'] = $util->FormatDateUnixDMMMY($res['fecha']);			
		
		$items[] = $card;
	}			

	$payments['items'] = $items;
	
	$smarty->assign('payments', $payments);
	$smarty->assign('mainMnu','contratos');
			
?>