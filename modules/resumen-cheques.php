<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
		
	$projectId = $_SESSION['curProjId'];
	
	//Enlistamos los Pagos
	
	$accountPayment->setProjectId($projectId);
	$accountPayment->CreateViewCheques();
	
	$accountPayment->setProjectId($projectId);
	$resPagos = $accountPayment->EnumChequesAll();
	
	$total = 0;
	$pagos = array();
	foreach($resPagos as $val){
		$card2 = $val;
							
		$card2['quantity'] = number_format($val['quantity'],2,'.','');
		$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
		
		//Obtenemos el Concepto			
		if($val['seccion'] == 'R'){		
			$accountPayment->setOrderBuyId($val['orderBuyId']);
			$card2['concepto'] = $accountPayment->GetConcept();
		}
		
		$supplier->setSupplierId($val['supplierId']);
		$card2['proveedor'] = $supplier->GetNameById();
		
		$total += $val['quantity'];
					
		$pagos[] = $card2;
	}
		
	//Enlistamos los Bancos
	
	$resBanks = $bank->EnumerateAll();	
	
	$banks = array();
	foreach($resBanks as $res){
		
		$res['name'] = $res['bank'].'-'.$res['accountNumber'];
		
		$banks[] = $res;
	}
	
	$resSuppliers = $accountPayment->EnumAllSupplier();
	
	$suppliers = array();
	foreach($resSuppliers as $res){
	
		$supplier->setSupplierId($res['supplierId']);
		$infS = $supplier->Info();
		
		$res['name'] = $infS['name'];
		
		$suppliers[] = $res;
	}
	
	$smarty->assign('total',$total);
	$smarty->assign('banks',$banks);
	$smarty->assign('pagos',$pagos);
	$smarty->assign('suppliers',$suppliers);
	$smarty->assign('mainMnu','resumenes');
			
?>