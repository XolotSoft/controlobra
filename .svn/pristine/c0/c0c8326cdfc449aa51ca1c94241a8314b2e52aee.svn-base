<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stEP'] = '0';
		header('Location: '.WEB_ROOT.'/estimacion-payment');
		exit;
	}
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stEP']))
		$_SESSION['stEP'] = '0';
	$stEP = $_SESSION['stEP'];
	
	$estimacionPayment->setProjectId($projectId);
	$estimacionPayment->setTipo('N');
	$result = $estimacionPayment->EnumRevisado($stEP);
	
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
			$resItems = $estItem->EnumAllGroup();
		}
		
		$torres = array();
		foreach($resItems as $resI){
			$cardI = $resI;
			
			$projItem->setProjItemId($resI['projItemId']);								
			$cardI['name'] = $projItem->GetNameById();
			
			$estItem->setProjItemId($resI['projItemId']);
			$resLevels = $estItem->EnumLevelsByItem();
			
			$areas = array();
			foreach($resLevels as $lev){
				$cardL = $lev;
									
				$estDepto->setEstimacionId($res['estimacionId']);
				$estDepto->setEstItemId($lev['estItemId']);
				$resAreas = $estDepto->EnumAreasByItem();
									
				$areas = array();
				foreach($resAreas as $res2){
					$cardA = $res2;
					
					$projDepto->setProjDeptoId($res2['projDeptoId']);
					$cardA['name'] = $projDepto->GetNameById();
										
					$areas[] = $cardA;
				}									
				
				$cardI['areas'] = $areas;												
				
			}//foreach
			
			$torres[] = $cardI;
			
		}//foreach
		$card['torres'] = $torres;
		
		$projType->setProjTypeId($infE['projTypeId']);
		$card['type'] = $projType->GetNameById();
			
		/***/	
		
		$payments[] = $card;
	}
	
	$smarty->assign('stEP',$stEP);	
	$smarty->assign('payments',$payments);
	$smarty->assign('mainMnu','estimacion');
				
?>