<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stReq'] = 'Pendiente';
		header('Location: '.WEB_ROOT.'/requisicion');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['reqP'] = $p;
	
	$projectId = $_SESSION['curProjId'];	
	
	if(!isset($_SESSION['stReq']))
		$_SESSION['stReq'] = 'Pendiente';
	$stReq = $_SESSION['stReq'];
	
	$requisicion->setProjectId($projectId);	
	$resConcepts = $requisicion->EnumConcepts($stReq);

	$concepts = array();
	foreach($resConcepts as $valC){
		$cardC = $valC;
		
		if($valC['steel']){
			$reqLevel->setRequisicionId($valC['requisicionId']);
			$resItems = $reqLevel->EnumerateAll();
		}else{			
			$reqItem->setRequisicionId($valC['requisicionId']);
			$resItems = $reqItem->EnumAllGroup();
		}
		
		$areas = array();
		$torres = array();
		foreach($resItems as $resI){
			$cardI = $resI;
			
			$projItem->setProjItemId($resI['projItemId']);
			$cardI['name'] = $projItem->GetNameById();
						
			$reqItem->setRequisicionId($valC['requisicionId']);
			$reqItem->setProjItemId($resI['projItemId']);
			$resLevels = $reqItem->EnumLevelsByItem();
			
			foreach($resLevels as $lev){
				$cardL = $lev;
								
				$reqDepto->setRequisicionId($valC['requisicionId']);
				$reqDepto->setReqItemId($lev['reqItemId']);
				$resAreas = $reqDepto->EnumAreasByItem();
											
				foreach($resAreas as $res){
					$cardA = $res;
					
					$projDepto->setProjDeptoId($res['projDeptoId']);
					$cardA['name'] = $projDepto->GetNameById();
										
					$areas[] = $cardA;
				}										
				
			}//foreach

			$cardI['areas'] = $areas;
						
			$torres[] = $cardI;
						
		}//foreach
						
		$cardC['torres'] = $torres;
		
		/****/
		
		$requisicion->setRequisicionId($valC['requisicionId']);
		$info = $requisicion->Info();
				
		$conceptMat->setConceptId($info['conceptIdObra']);
		$resMats = $conceptMat->EnumerateAll();

		$materials = array();
		foreach($resMats as $resM){
			
			$resM['quantity'] = $resM['quantity'] * $info['totalReq'];			
			$resM['quantity'] = ceil($resM['quantity']);
						
			$reqMat->setRequisicionId($valC['requisicionId']);
			$reqMat->setConceptMatId($resM['conceptMatId']);
			$qtySolicitada = $reqMat->GetTotalQtySolicitado();
							
			$saldo = $resM['quantity'] - $qtySolicitada;
					
			if($saldo > 0)
				$materials[] = $cardM;
		}//foreach
		
		$cardC['materials'] = count($materials);
		
		/**************************/
		
		$concepts[] = $cardC;
		
	}//foreach
			
	$smarty->assign('stReq', $stReq);
	$smarty->assign('concepts', $concepts);
	$smarty->assign('mainMnu','requisicion');
			
?>