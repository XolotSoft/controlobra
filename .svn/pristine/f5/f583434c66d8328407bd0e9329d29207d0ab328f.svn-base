<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stOrdBuy'] = 'Pendiente';
		header('Location: '.WEB_ROOT.'/order-buy');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['ordBuyP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stOrdBuy']))
		$_SESSION['stOrdBuy'] = 'Pendiente';
	$stOrdBuy = $_SESSION['stOrdBuy'];
	
	$orderBuy->setProjectId($projectId);
	$ordersBuy = $orderBuy->Enumerate($stOrdBuy);
	
	$items = array();
	foreach($ordersBuy['items'] as $res){
		$card = $res;
		
		$orderBuy->setOrderBuyId($res['orderBuyId']);
		$resReq = $orderBuy->GetRequisicionIds();
		
		$reqIds = array();
		foreach($resReq as $val)
			$reqIds[] = $val['requisicionId'];		
		
		$card['requisicion'] = implode(', ',$reqIds);
		
		$supplier->setSupplierId($res['supplierId']);
		$card['supplier'] = $supplier->GetNameById();
		
		$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
		
		$items[] = $card;
	}
	
	$items = $util->orderMultiDimensionalArray($items,'requisicion');
	
	$ordersBuy['items'] = $items;
	
	$smarty->assign('stOrdBuy',$stOrdBuy);
	$smarty->assign('ordersBuy',$ordersBuy);
	$smarty->assign('mainMnu','requisicion');
			
?>