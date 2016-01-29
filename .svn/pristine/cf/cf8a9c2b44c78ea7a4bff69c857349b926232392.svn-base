<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stOrdBuyS'] = 'NoEnviado';
		$_SESSION['stFechaEntS'] = '';
		header('Location: '.WEB_ROOT.'/order-buy-send');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['ordBuyE'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stOrdBuyS']))
		$_SESSION['stOrdBuyS'] = 'Pendiente';
	$stOrdBuyS = $_SESSION['stOrdBuyS'];
	
	$fechaEnt = $_SESSION['stFechaEntS'];
	
	$orderBuy->setProjectId($projectId);
	$ordersBuy = $orderBuy->EnumerateSend($stOrdBuyS, $fechaEnt);
	
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
	
	$info['fechaEntrega'] = $fechaEnt;
	$info['status'] = $stOrdBuyS;
		
	$smarty->assign('info',$info);
	$smarty->assign('stOrdBuyS',$stOrdBuyS);
	$smarty->assign('ordersBuy',$ordersBuy);
	$smarty->assign('mainMnu','requisicion');
			
?>