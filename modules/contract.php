<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['contP'] = $p;
	
	$projectId = $_SESSION['curProjId'];	
	
	$contract->SetPage($p);
	$contract->setProjectId($projectId);
	$contracts = $contract->Enumerate();	
	$result = $contracts['items'];
	
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
				
		$card['total'] = number_format($res['total'],2);
		$card['abono'] = number_format($res['abono'],2);
				
		//Obtenemos los Vencimientos
		
		//$contract->setContractId($res['contractId']);
		//$infE = $contract->GetEnganche();
			
		//Pagos Anteriores
		$contPayment->setContractId($res['contractId']);
		$resPayments = $contPayment->GetPayments();
							
		$pagosAnt = 0;
		foreach($resPayments as $val){
			$pagosAnt += $val['quantity'];
		}
		$card['pagos'] = number_format($pagosAnt,2);
		
		$saldo = $res['total'] - $infE['monto'] - $pagosAnt;
		
		$card['saldo'] = number_format($saldo,2);
		
		$items[] = $card;
	}
	$contracts['items'] = $items;
	
	$_SESSION['enumCajones'] = '';
	unset($_SESSION['enumCajones']);
	
	$_SESSION['enumBodegas'] = '';
	unset($_SESSION['enumBodegas']);
	
	$_SESSION['expiries'] = '';
	unset($_SESSION['expiries']);
	
	$smarty->assign('contracts', $contracts);
	$smarty->assign('mainMnu','contratos');
			
?>