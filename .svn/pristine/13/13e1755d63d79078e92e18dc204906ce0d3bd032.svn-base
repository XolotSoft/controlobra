<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	session_start();
	
	$projectId = $_SESSION['curProjId'];
	
	$contract->setProjectId($projectId);
	$resProjItems = $contract->GetItemsByProject();
	
	$resProjItems2 = array();
	foreach($resProjItems as $res){
	
		$contract->setProjItemId($res['projItemId']);
		$resContracts = $contract->EnumByItem();
		
		$accionista = false;
		foreach($resContracts as $val){
			
			$customer->setCustomerId($val['customerId']);
			$infC = $customer->Info();
			
			if($infC['category'] == 'accionista'){
				$accionista = true;
				break;
			}
		
		}//foreach
		
		if($accionista)
			$resProjItems2[] = $res;
		
	}//foreach
		
	$info['total'] = 0;
	$info['m2Depto'] = 0;
	$info['costoM2'] = 0;
	$info['totalPagos'] = 0;
	$info['saldoTotal'] = 0;
	
	$projItems = array();
	foreach($resProjItems2 as $res){
		
		$contract->setProjItemId($res['projItemId']);
		$resContracts = $contract->EnumByItem();
		
		$total = 0;
		$m2Depto = 0;
		$costoM2 = 0;
		$totalPagos = 0;
		$saldoVencido = 0;
		$saldoTotal = 0;
		$contracts = array();
		foreach($resContracts as $val){
			
			$customer->setCustomerId($val['customerId']);
			$val['customer'] = $customer->GetNameById();
			
			$customer->setCustomerId($val['customerId']);
			$infC = $customer->Info();
			if($infC['category'] != 'accionista')
				continue;
			
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
			
			$total += $val['total'];
			$m2Depto += $val['m2Depto'];
			$costoM2 += $val['priceM2'];
			$totalPagos += $val['totalPagos'];
			$saldoVencido += $val['saldoVencido'];
			$saldoTotal += $val['saldoTotal'];
			
			$contracts[] = $val;
		}				
		$res['contracts'] = $contracts;
		
		$res['total'] = $total;
		$res['m2Depto'] = $m2Depto;
		$res['costoM2'] = $costoM2;
		$res['totalPagos'] = $totalPagos;
		$res['saldoVencido'] = $saldoVencido;
		$res['saldoTotal'] = $saldoTotal;
		
		$info['total'] += $total;
		$info['m2Depto'] += $m2Depto;
		$info['costoM2'] += $costoM2;
		$info['totalPagos'] += $totalPagos;
		$info['saldoVencido'] += $saldoVencido;
		$info['saldoTotal'] += $saldoTotal;
		
		$projItems[] = $res;
		
	}//foreach

	$smarty->assign('info',$info);
	$smarty->assign('projItems',$projItems);
	$smarty->assign('mainMnu','resumenes');

?>