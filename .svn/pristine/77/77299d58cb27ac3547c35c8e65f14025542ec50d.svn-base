<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['cheqP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	/*
	if(!isset($_SESSION['stCheqP']))
		$_SESSION['stCheqP'] = '0';
	$stAdoP = $_SESSION['stCheqP'];
	*/
	//Enlistamos los Pagos
	
	$estimacionPayment->setProjectId($projectId);
	$estimacionPayment->setPage($_GET['p']);
	$resPagos = $estimacionPayment->EnumCheques($stAdoP);
	
	$items = array();
	foreach($resPagos['items'] as $val){
		$card2 = $val;
					
		$bank->setBankId($val['bankId']);
		$card2['bank'] = $bank->GetCuentaById();
		
		$card2['quantity'] = number_format($val['quantity'],2,'.','');
		$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
		//Obtenemos el Concepto			
		$estimacion->setEstimacionId($val['estimacionId']);
		$infC = $estimacion->Info();
		
		$concept->setConceptId($infC['conceptId']);
		$card2['concepto'] = $concept->GetNameById();
					
		$items[] = $card2;
	}
	$resPagos['items'] = $items;
	
	//Enlistamos los Bancos
	
	$resBanks = $bank->EnumerateAll();	
	
	$banks = array();
	foreach($resBanks as $res){
		
		$res['name'] = $res['bank'].'-'.$res['accountNumber'];
		
		$banks[] = $res;
	}
	
	$smarty->assign('stAdoP', $stAdoP);
	$smarty->assign('banks',$banks);
	$smarty->assign('resPagos',$resPagos);
	$smarty->assign('mainMnu','estimacion');
			
?>