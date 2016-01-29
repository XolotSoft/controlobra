<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stAdoP'] = '0';
		header('Location: '.WEB_ROOT.'/account-dopayment');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['cheqP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stCheqP']))
		$_SESSION['stCheqP'] = '0';
	$stAdoP = $_SESSION['stCheqP'];
	
	//Checamos pagos para ver si hay con vencimientos para cancelar el cheque
	$accountPayment->setProjectId($projectId);
	$accountPayment->setPage($_GET['p']);
	$resPagos = $accountPayment->EnumCheques($stAdoP);
	
	foreach($resPagos['items'] as $val){
		$card2 = $val;
							
		$card2['dias'] = $util->GetDiffDates($val['fecha'],date('Y-m-d'));
		
		//Checamos si pasaron los días para poder cancelar el cheque
		if($card2['dias'] > 15 && $card2['statusCheque'] == 'Emitido' && $card2['status'] == 'Activo'){
			
			$accountPagoId = $val['accountPagoId'];
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$accountPayment->setMotivoCancel('Cancelado por Vencimiento');
			$accountPayment->setFecha(date('Y-m-d'));
			
			if($accountPayment->CancelCheque()){
					
				$infP = $accountPayment->InfoPago();
				
				//Actualizamos el Saldo en la Cuenta Bancaria
				$bank->setBankId($infP['bankId']);
				$bank->setQuantity($infP['quantity']);
				$bank->RemoveQuantity();
				
				$accountPayment->setAccountPaymentId($infP['accountPaymentId']);
				$info = $accountPayment->Info();
				
				//Quitamos el status de Pagado
				$accountPayment->setPagado(0);
				$accountPayment->UpdatePagado();
				
				//Actualizamos el status a Confirmado de la Orden de Compra
				$orderBuy->setOrderBuyId($info['orderBuyId']);
				$orderBuy->setStatus('Confirmado');
				$orderBuy->UpdateStatus();	
					
			}//if
			
		}//if		
	
	}
		
	//Enlistamos los Pagos
	
	$accountPayment->setProjectId($projectId);
	$accountPayment->setPage($_GET['p']);
	$resPagos = $accountPayment->EnumCheques($stAdoP);
	
	$items = array();
	foreach($resPagos['items'] as $val){
		$card2 = $val;
					
		$bank->setBankId($val['bankId']);
		$card2['bank'] = $bank->GetCuentaById();
		
		$card2['quantity'] = number_format($val['quantity'],2,'.','');
		$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
		
		//Obtenemos el Concepto			
		$accountPayment->setOrderBuyId($val['orderBuyId']);
		$card2['concepto'] = $accountPayment->GetConcept();
					
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
	$smarty->assign('mainMnu','requisicion');
			
?>