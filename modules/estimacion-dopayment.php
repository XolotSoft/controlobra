<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stEdoP'] = '0';
		header('Location: '.WEB_ROOT.'/estimacion-dopayment');
		exit;
	}
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stEdoP']))
		$_SESSION['stEdoP'] = '0';
	$stEdoP = $_SESSION['stEdoP'];
	
	if(!isset($_SESSION['stTipo']))
		$_SESSION['stTipo'] = 'N';
	$stTipo = $_SESSION['stTipo'];
	
	$estimacionPayment->setProjectId($projectId);
	$estimacionPayment->setTipo($stTipo);
	$result = $estimacionPayment->Enumerate($stEdoP);
	
	$payments = array();
	foreach($result as $res){
		$card = $res;
		
		$supplier->setSupplierId($res['supplierId']);
		$card['supplier'] = $supplier->GetNameById();
		
		$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
		
		$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
		$card['abonos'] = $estimacionPayment->GetTotalPagos();
		
		$saldo = $card['total'] - $card['abonos'];
		$card['saldo'] = number_format($saldo,2);
		
		$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
		$resPagos = $estimacionPayment->EnumPagos();
		
		$pagos = array();
		foreach($resPagos as $val){
			$card2 = $val;
						
			$bank->setBankId($val['bankId']);
			$card2['bank'] = $bank->GetCuentaById();
			
			$card2['quantity'] = number_format($val['quantity'],2);
			$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
			
			$pagos[] = $card2;
		}
		
		$card['pagos'] = $pagos;
		
		//Detalles de la Estimacion
		
		$estimacion->setEstimacionId($res['estimacionId']);
		$infE = $estimacion->Info();
		
		$concept->setConceptId($infE['conceptId']);
		$infC = $concept->Info();
		$card['concept'] = $infC['name'];
		$card['steel'] = $infC['steel'];
		
		/***/
		
		if($infC['steel']){			
			$estLevel->setEstimacionId($res['estimacionId']);
			$resItems = $estLevel->EnumerateAll();				
		}else{
			$estItem->setEstimacionId($res['estimacionId']);
			$resItems = $estItem->EnumerateAll();
		}
		
		$items = array();
		$torres = array();
		foreach($resItems as $resI){
			$cardI = $resI;
			
			$projItem->setProjItemId($resI['projItemId']);
			$name = $projItem->GetNameById();
			
			$projLevel->setProjLevelId($resI['projLevelId']);
			$cardI['level'] = $projLevel->GetLevelById();
			
			$projLevel->setProjLevelId($resI['projLevelId2']);
			$cardI['level2'] = $projLevel->GetLevelById();
			
			$cardI['name'] = $name;
			$items[] = $name;
			
			$torres[] = $cardI;
		}
						
		$card['torre'] = implode(', ',$items);
		$card['torres'] = $torres;
		
		$projType->setProjTypeId($infE['projTypeId']);
		$card['type'] = $projType->GetNameById();
			
		/***/	
		
		$payments[] = $card;
	}

	$smarty->assign('stEdoP',$stEdoP);
	$smarty->assign('stTipo',$stTipo);	
	$smarty->assign('payments',$payments);
	$smarty->assign('mainMnu','estimacion');
				
?>