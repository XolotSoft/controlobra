<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$requisicionId = $_GET['reqId'];
	$_SESSION['reqId'] = $requisicionId;
	
	$requisicion->setRequisicionId($requisicionId);
	$info = $requisicion->Info();
	
	$concept->setConceptId($info['conceptId']);
	$info['concept'] = $concept->GetNameById();
	
	$conceptMat->setConceptId($info['conceptIdObra']);
	$resMats = $conceptMat->EnumerateAll();

	$materials = array();
	foreach($resMats as $res){
		$card = $res;
		
		//Obtenemos los Pedidos
		$reqMat->setRequisicionId($requisicionId);
		$reqMat->setConceptId($info['conceptIdObra']);
		$reqMat->setConceptMatId($res['conceptMatId']);
		$resPedidos = $reqMat->Enumerate();
		
		$pedidos = array();
		foreach($resPedidos as $val){		
			$card2 = $val;
			
			$supplier->setSupplierId($val['supplierId']);
	  		$card2['supplier'] = $supplier->GetNameById();
			
			$pedidos[] = $card2;			
			
		}
		$card['pedidos'] = $pedidos;
		
		$materials[] = $card;
	}
	
	$smarty->assign('info',$info);
	$smarty->assign('materials',$materials);
	$smarty->assign('mainMnu','requisicion');
			
?>