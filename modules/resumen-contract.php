<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['contP'] = $p;
	
	$projectId = $_SESSION['curProjId'];	
	
	$project->setProjectId($projectId);
	$nomProy = $project->GetNameById();
	$nomProy = strtoupper($nomProy);
	
	$contract->SetPage($p);
	$contract->setProjectId($projectId);
	$contracts = $contract->EnumByTipoClte();	
	$result = $contracts['items'];
	
	$items = array();
	foreach($result as $res){
		$card = $res;
		
		$customer->setCustomerId($res['customerId']);
		$infC = $customer->Info();
				
		$card['customer'] = $infC['name'];
		
		$projItem->setProjItemId($res['projItemId']);
		$card['item'] = $projItem->GetNameById();
		
		$projLevel->setProjLevelId($res['projLevelId']);
		$card['level'] = $projLevel->GetNameById();
		
		$projDepto->setProjDeptoId($res['projDeptoId']);
		$card['area'] = $projDepto->GetNameById();
		
		//Acumulado de Pagos
		$contPayment->setContractId($res['contractId']);
		$card['pagos'] = $contPayment->GetTotalPayment();
		
		$card['saldo'] = $res['total'] - $card['pagos'];		
		
		$items[] = $card;
	}
	$contracts['items'] = $items;
		
	$smarty->assign('nomProy', $nomProy);
	$smarty->assign('contracts', $contracts);
	$smarty->assign('mainMnu','resumenes');
			
?>