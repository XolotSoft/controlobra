<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stReqP'] = 'Pendiente';
		header('Location: '.WEB_ROOT.'/requisicion-pedidos');
		exit;
	}
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stReqP']))
		$_SESSION['stReqP'] = 'Pendiente';
	$stReqP = $_SESSION['stReqP'];
	
	$requisicion->setProjectId($projectId);	
	$resPedidos = $requisicion->EnumPedidos($stReqP);

	$concepts = array();
	foreach($resPedidos as $val){
		$card = $val;
		
		$requisicion->setRequisicionId($val['requisicionId']);
		$infR = $requisicion->Info();
		
		$card['fecha'] = $infR['fecha'];
		
		$concept->setConceptId($infR['conceptId']);
		$card['name'] = $concept->GetNameById();
		
		$card['steel'] = $infR['steel'];
		
		if($infR['steel']){
			$reqLevel->setRequisicionId($val['requisicionId']);
			$resItems = $reqLevel->EnumerateAll();
		}else{			
			$reqItem->setRequisicionId($val['requisicionId']);
			$resItems = $reqItem->EnumAllGroup();
		}
		
		$areas = array();
		$torres = array();
		foreach($resItems as $resI){
			$cardI = $resI;
			
			$projItem->setProjItemId($resI['projItemId']);
			$cardI['name'] = $projItem->GetNameById();
						
			$reqItem->setRequisicionId($val['requisicionId']);
			$reqItem->setProjItemId($resI['projItemId']);
			$resLevels = $reqItem->EnumLevelsByItem();
			
			foreach($resLevels as $lev){
				$cardL = $lev;
								
				$reqDepto->setRequisicionId($val['requisicionId']);
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
						
		$card['torres'] = $torres;
		
		$projType->setProjTypeId($infR['projTypeId']);
		$card['type'] = $projType->GetNameById();
		
		$reqMat->setReqPedidoId($val['reqPedidoId']);
		$resMat = $reqMat->EnumByPedido();
		
		$idMats = array();
		$materials = array();
		foreach($resMat as $res){
			$cardM = $res;
			
			$supplier->setSupplierId($res['supplierId']);
			$cardM['supplier'] = $supplier->GetNameById();
			
			$conceptMat->setConceptMatId($res['conceptMatId']);
			$materialId = $conceptMat->GetMaterialId();
			
			$material->setMaterialId($materialId);
			$info = $material->Info();
			
			$cardM['material'] = $info['name'];
			
			$unit->setUnitId($info['unitId']);
			$cardM['unit'] = $unit->GetClaveById();
			
			$idMats[] = $res['reqMatId'];
			$materials[] = $cardM;
		}
		
		$card['idMats'] = implode('_',$idMats);
		$card['materials'] = $materials;
		
		$concepts[] = $card;
	}
					
	$smarty->assign('stReqP', $stReqP);
	$smarty->assign('concepts', $concepts);
	$smarty->assign('mainMnu','requisicion');
			
?>