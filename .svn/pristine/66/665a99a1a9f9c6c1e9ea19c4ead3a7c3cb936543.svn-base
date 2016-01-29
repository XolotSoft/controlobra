<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	session_start();
	
	$projectId = $_SESSION['curProjId'];
		
	$contractId = intval($_GET['contractId']);
	
	$contract->setContractId($contractId);
	$resCajones = $contract->EnumCajones();
	$resBodegas = $contract->EnumBodegas();
	$info = $contract->Info();
	
	$cajones = array();
	foreach($resCajones as $res){
		$projCajon->setProjCajonId($res['projCajonId']);
		$cajones[] = $projCajon->GetNameById();
	}
	$info['cajones'] = implode(', ',$cajones);
	
	$bodegas = array();
	foreach($resBodegas as $res){
		$projBodega->setProjBodegaId($res['projBodegaId']);
		$bodegas[] = $projBodega->GetNameById();
	}
	$info['bodegas'] = implode(', ',$bodegas);
	
	$project->setProjectId($info['projectId']);
	$info['project'] = $project->GetNameById();
	
	$customer->setCustomerId($info['customerId']);
	$info['customer'] = $customer->GetNameById();
	
	$projDepto->setProjDeptoId($info['projDeptoId']);
	$info['depto'] = $projDepto->GetNameById();
	
	$projItem->setProjItemId($info['projItemId']);
	$info['item'] = $projItem->GetNameById();
	
	$info['fecha'] = $util->FormatDateUnixDMMMY($info['fechaIniCont']);
	
	//Expiry
	
	$resExpiries = $contract->EnumExpiryByFecha();
	
	$docMontos = array();
	$montoDocs = 0;
	foreach($resExpiries as $res){
		
		if($res['noExpiry'] == 'Equipamiento')
			$info['equipamiento'] = $res['monto'];
		elseif($res['noExpiry'] == 'Mantenimiento')
			$info['mantenimiento'] = $res['monto'];
		elseif($res['noExpiry'] == 'Enganche'){
			$info['enganche'] = $res['monto'];
			$info['fechaEng'] = $util->FormatDateUnixDMMMY($res['fecha']);
			
			$contPayment->setContExpiryId($res['contExpiryId']);
			$info['pagosEng'] = $contPayment->GetTotalPagoByDoc();
			$fechaPagoEng = $contPayment->GetFechaPagoByDoc();
			
			if($fechaPagoEng)
				$info['fechaPagoEng'] = $util->FormatDateUnixDMMMY($fechaPagoEng);
			
			$info['saldoEng'] = $res['monto'] - $info['pagosEng'];
			
		}else{
			
			$monto = $res['monto'];
			if(!in_array($monto, $docMontos))
				$docMontos[] = $monto;
		
			$montoDocs += $res['monto'];
		}
		
	}//foreach
	
	$card['acumulado'] = $info['enganche'];
	
	$documentos = array();
	foreach($docMontos as $k => $monto){
		
		$card['monto'] = $monto;
		
		$contract->setMonto($monto);
		$card['noDocs'] = $contract->GetNoDocsByMonto();
		
		$card['total'] = $monto * $card['noDocs'];
		
		$fechaIni = $contract->GetFechaIniDocByMonto();
		$fechaIni =  $util->FormatDateUnixDMMMY($fechaIni);
				
		if($card['noDocs'] > 1){
			
			$fechaFin = $contract->GetFechaFinDocByMonto();
			$fechaFin =  $util->FormatDateUnixDMMMY($fechaFin);
			
			$fechaIni .= ' AL '.$fechaFin;
		}
		
		$card['fecha'] = $fechaIni;
		
		$card['acumulado'] += $card['total'];
		
		$documentos[] = $card;
	}
	
	//Acumulado de Pagos
	$contPayment->setContractId($contractId);
	$acumPagos = $contPayment->GetTotalPayment();
	
	$info['acumPagos'] = $acumPagos;
	
	$contract->setContractId($contractId);
	$contract->setFecha(date('Y-m-d'));
	$info['saldoVenc'] = $contract->GetTotalDocsVencidos();
	
	$info['saldoTot'] = $info['total'] - $info['acumPagos'];
	$info['saldoExtra'] = $info['mantenimiento'] + $info['equipamiento'];
	
	$fechaHoy = date('Y-m-d');
	$info['fechaHoy'] =  $util->FormatDateUnixDMMMY($fechaHoy);
	
	$resDocs = $contract->EnumDocs();
	
	$totalDep = $info['pagosEng'];
	$saldoDep = $info['saldoEng'];

	$total = 0;	
	$docs = array();
	foreach($resDocs as $res){
		$res['fecha'] = $util->FormatDateUnixDMMMY($res['fecha']);
		
		$contPayment->setContExpiryId($res['contExpiryId']);
		$res['pagosDep'] = $contPayment->GetTotalPagoByDoc();
		$fechaDep = $contPayment->GetFechaPagoByDoc();
		
		if($fechaDep)
			$res['fechaDep'] = $util->FormatDateUnixDMMMY($fechaDep);
		
		$res['saldoDep'] = $res['monto'] - $res['pagosDep'];
		
		$totalDep += $res['pagosDep'];
		$saldoDep += $res['saldoDep'];
		
		$total += $res['monto'];
		
		$docs[] = $res;
	}
	$info['totalDep'] = $totalDep;
	$info['saldoDep'] = $saldoDep;
	$info['totalValDoc'] = $total + $info['enganche'];
	
	//Porccentaje de Participacion
	
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
	
	$totalAccion = 0;
	foreach($resProjItems2 as $res){
		
		$contract->setProjItemId($res['projItemId']);
		$resContracts = $contract->EnumByItem();

		$total = 0;		
		foreach($resContracts as $val){	
			$customer->setCustomerId($val['customerId']);
			$infC = $customer->Info();
			if($infC['category'] != 'accionista')
				continue;
				
			$totalAccion += $val['total'];			
		}	
						
	}//foreach
	
	$info['participacion'] = ($info['total'] * 100) / $totalAccion;
	
	$smarty->assign('docs',$docs);
	$smarty->assign('info',$info);
	$smarty->assign('documentos',$documentos);
	$smarty->assign('mainMnu','resumenes');

?>