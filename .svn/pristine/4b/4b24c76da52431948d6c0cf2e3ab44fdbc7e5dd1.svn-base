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
	$_SESSION['adpP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stAdoP']))
		$_SESSION['stAdoP'] = '0';
	$stAdoP = $_SESSION['stAdoP'];
	
	$accountPayment->setProjectId($projectId);
	$payments = $accountPayment->Enumerate($stAdoP);
	
	$items = array();
	foreach($payments['items'] as $res){
		$card = $res;
		
		$supplier->setSupplierId($res['supplierId']);
		$card['supplier'] = $supplier->GetNameById();
				
		$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
		
		$accountPayment->setAccountPaymentId($res['accountPaymentId']);
		$card['abonos'] = $accountPayment->GetTotalPagos();

		$saldo = $card['total'] - $card['abonos'];
		$card['saldo'] = number_format($saldo,2,'.','');
		
		//Obtenemos los Pagos
		
		$accountPayment->setAccountPaymentId($res['accountPaymentId']);
		$resPagos = $accountPayment->EnumPagos();
		
		$pagos = array();
		foreach($resPagos as $val){
			$card2 = $val;
						
			$bank->setBankId($val['bankId']);
			$card2['bank'] = $bank->GetCuentaById();
			
			$card2['quantity'] = number_format($val['quantity'],2,'.','');
			$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
			
			$pagos[] = $card2;
		}
		
		$card['pagos'] = $pagos;
		
		//Obtenemos los detalles de la Orden de Compra
		
		$orderBuy->setOrderBuyId($res['orderBuyId']);
		$resReq = $orderBuy->GetRequisicionIds();
		
		$reqIds = array();
		foreach($resReq as $val)
			$reqIds[] = $val['requisicionId'];		
		
		$card['requisicion'] = implode(', ',$reqIds);
		
		$orderBuy->setOrderBuyId($res['orderBuyId']);
		$resMat = $orderBuy->EnumItems();
		
		$materials = array();
		foreach($resMat as $val){

			$conceptMat->setConceptMatId($val['conceptMatId']);
			$materialId = $conceptMat->GetMaterialId();
			
			$material->setMaterialId($materialId);
			$infM = $material->Info();			
			$val['material'] = $infM['name'];
			
			$val['unitPrice'] = $val['total'] / $val['quantity'];
			
			$unit->setUnitId($infM['unitId']);
			$val['unit'] = $unit->GetClaveById();
			
			$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
			$recibido = $orderBuy->GetTotalRecibido();
			
			$val['recibido'] = $recibido;
			$val['saldo'] = $val['quantity'] - $recibido;
						
			$materials[] = $val;			
		}
		
		$card['orderBuy'] = $materials;
		
		$items[] = $card;
	}
	$payments['items'] = $items;
	
	$smarty->assign('stAdoP', $stAdoP);
	$smarty->assign('payments',$payments);
	$smarty->assign('mainMnu','requisicion');
			
?>