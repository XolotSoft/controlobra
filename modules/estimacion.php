<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stEst'] = 'Pendiente';
		header('Location: '.WEB_ROOT.'/estimacion');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['estimP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stEst']))
		$_SESSION['stEst'] = 'Pendiente';
	$stEst = $_SESSION['stEst'];
	
	$estimacion->setProjectId($projectId);
	$resSuppliers = $estimacion->EnumSupByProj($stEst);

	$suppliers = array();
	foreach($resSuppliers as $res){
		$card = $res;
		
		$estimacion->setSupplierId($res['supplierId']);
		$resConcepts = $estimacion->EnumConceptsBySup($stEst);
		
		$concepts = array();
		foreach($resConcepts as $valC){
			$cardC = $valC;
			
			if($valC['steel']){			
				$estLevel->setEstimacionId($valC['estimacionId']);
				$resItems = $estLevel->EnumerateAll();				
			}else{
				$estItem->setEstimacionId($valC['estimacionId']);
				$resItems = $estItem->EnumAllGroup();
			}
			
			$torres = array();
			foreach($resItems as $resI){
				$cardI = $resI;
				
				$projItem->setProjItemId($resI['projItemId']);								
				$cardI['name'] = $projItem->GetNameById();
				
				$estItem->setProjItemId($resI['projItemId']);
				$resLevels = $estItem->EnumLevelsByItem();
				
				$areas = array();
				foreach($resLevels as $lev){
					$cardL = $lev;
										
					$estDepto->setEstimacionId($valC['estimacionId']);
					$estDepto->setEstItemId($lev['estItemId']);
					$resAreas = $estDepto->EnumAreasByItem();
										
					$areas = array();
					foreach($resAreas as $res){
						$cardA = $res;
						
						$projDepto->setProjDeptoId($res['projDeptoId']);
						$cardA['name'] = $projDepto->GetNameById();
											
						$areas[] = $cardA;
					}									
					
					$cardI['areas'] = $areas;												
					
				}//foreach
												
				$torres[] = $cardI;
				
			}//foreach
							
			$cardC['torres'] = $torres;		
			
			$concept->setConceptId($valC['conceptId']);
			$infC = $concept->Info();
						
			$unit->setUnitId($infC['unitId']);
			$cardC['unit'] = $unit->GetClaveById();
			
			$concepts[] = $cardC;
			
		}//foreach
		
		$card['concepts'] = $concepts;
		
		$suppliers[] = $card;
		
	}//foreach
		
	$smarty->assign('stEst', $stEst);
	$smarty->assign('suppliers', $suppliers);
	$smarty->assign('mainMnu','estimacion');
			
?>