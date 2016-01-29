<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	session_start();
	
	$projectId = $_SESSION['curProjId'];
	
	$contract->setProjectId($projectId);
	$resProjItems = $contract->GetItemsByProject();
	
	$info['total'] = 0;
	$info['m2Depto'] = 0;
	$info['costoM2'] = 0;
	$info['totalPagos'] = 0;
	$info['saldoVencido'] = 0;
	$info['saldoExtra'] = 0;
	$info['saldoTotal'] = 0;	
		
	$projItems = array();
	foreach($resProjItems as $res){
				
		$contract->setProjItemId($res['projItemId']);
		$resContracts = $contract->EnumByItem();
		
		$total = 0;
		$m2Depto = 0;
		$costoM2 = 0;
		$totalPagos = 0;
		$saldoVencido = 0;
		$saldoExtra = 0;
		$saldoTotal = 0;
		$contracts = array();
		foreach($resContracts as $val){
			
			$customer->setCustomerId($val['customerId']);
			$val['customer'] = $customer->GetNameById();
			
			$projDepto->setProjDeptoId($val['projDeptoId']);
			$val['depto'] = $projDepto->GetNameById();
			
			$contPayment->setContractId($val['contractId']);
			$val['totalPagos'] = $contPayment->GetTotalPayment();
			
			$val['saldoTotal'] = $val['total'] - $val['totalPagos'];
			
			//Docs. Vencidos
			
			$contract->setContractId($val['contractId']);
			$contract->setFecha(date('Y-m-d'));
			$resDocs = $contract->GetDocsVencidos();
			
			$val['saldoVencido'] = 0;
			$docs = array();
			foreach($resDocs as $doc){
				
				$val['saldoVencido'] += $doc['monto'];
				$doc['fecha'] = $util->FormatDateUnixDMMMY($doc['fecha']);
				
				$docs[] = $doc;
			}
			$val['docs'] = $docs;
			
			//Saldos Docs. Extras
				
			$resExpiries = $contract->EnumExpiryByFecha();
			
			$docMontos = array();
			$montoDocs = 0;
			foreach($resExpiries as $res2){
				
				if($res2['noExpiry'] == 'Equipamiento')
					$saldoEquip = $res2['monto'];
				elseif($res2['noExpiry'] == 'Mantenimiento')
					$saldoMant = $res2['monto'];
								
			}//foreach
			
			$val['saldoExtra'] = $saldoMant + $saldoEquip;
			
			$total += $val['total'];
			$m2Depto += $val['m2Depto'];
			$costoM2 += $val['priceM2'];
			$totalPagos += $val['totalPagos'];
			$saldoVencido += $val['saldoVencido'];
			$saldoExtra += $val['saldoExtra'];
			
			$val['saldoTotal'] += $val['saldoExtra'];
			
			$saldoTotal += $val['saldoTotal'];
			
			$contracts[] = $val;
		}				
		$res['contracts'] = $contracts;
		
		$res['total'] = $total;
		$res['m2Depto'] = $m2Depto;
		$res['costoM2'] = $costoM2;
		$res['totalPagos'] = $totalPagos;
		$res['saldoVencido'] = $saldoVencido;
		$res['saldoExtra'] = $saldoExtra;
		$res['saldoTotal'] = $saldoTotal;
		
		$info['total'] += $total;
		$info['m2Depto'] += $m2Depto;
		$info['costoM2'] += $costoM2;
		$info['totalPagos'] += $totalPagos;
		$info['saldoVencido'] += $saldoVencido;
		$info['saldoExtra'] += $saldoExtra;
		$info['saldoTotal'] += $saldoTotal;
		
		$projItems[] = $res;
		
	}//foreach
	
	$info['costoM2'] = $info['total'] / $info['m2Depto'];	
	
	$smarty->assign('info',$info);
	$smarty->assign('projItems',$projItems);
	$smarty->assign('mainMnu','resumenes');

?>