<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_GET['status'] == 'pendiente'){
		$_SESSION['stEnt'] = 'Pendiente';
		header('Location: '.WEB_ROOT.'/order-buy-entregas');
		exit;
	}
	
	$p = intval($_GET['p']);
	$_SESSION['ordBuyP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	if(!isset($_SESSION['stEnt']))
		$_SESSION['stEnt'] = 'Pendiente';
	$stEnt = $_SESSION['stEnt'];
	
	$orderBuy->setProjectId($projectId);
	$ordersBuy = $orderBuy->EnumerateEnt($stEnt);
	
	$items = array();
	foreach($ordersBuy['items'] as $res){
		$card = $res;
		
		$orderBuy->setOrderBuyId($res['orderBuyId']);
		$resReq = $orderBuy->GetRequisicionIds();
		
		$reqIds = array();
		foreach($resReq as $val){
			$reqIds[] = $val['requisicionId'];
			
			/***/
			
			$reqItem->setRequisicionId($val['requisicionId']);
			$resItems = $reqItem->EnumAllGroup();
			
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
												
					foreach($resAreas as $res2){
						$cardA = $res2;
						
						$projDepto->setProjDeptoId($res2['projDeptoId']);
						$cardA['name'] = $projDepto->GetNameById();
											
						$areas[] = $cardA;
					}										
					
				}//foreach
	
				$cardI['areas'] = $areas;
							
				$torres[] = $cardI;
							
			}//foreach
					
			$card['torres'] = $torres;
			
			/***/
			
		}//foreach
		
		$card['requisicion'] = implode(', ',$reqIds);
		
		$supplier->setSupplierId($res['supplierId']);
		$card['supplier'] = $supplier->GetNameById();
		
		$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
		
		$orderBuy->setOrderBuyId($res['orderBuyId']);
		$resMat = $orderBuy->EnumItems();
		
		$materials = array();
		foreach($resMat as $val){

			$conceptMat->setConceptMatId($val['conceptMatId']);
			$materialId = $conceptMat->GetMaterialId();
			
			$material->setMaterialId($materialId);
			$infM = $material->Info();			
			$val['material'] = $infM['name'];
			
			$unit->setUnitId($infM['unitId']);
			$val['unit'] = $unit->GetClaveById();
			
			$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
			$recibido = $orderBuy->GetTotalRecibido();
			
			$val['recibido'] = $recibido;
			$val['saldo'] = $val['quantity'] - $recibido;
						
			$materials[] = $val;			
			
		}//foreach
		
		$card['materials'] = $materials;
		
		$items[] = $card;
		
	}//foreach
	
	$ordersBuy['items'] = $items;
	
	$smarty->assign('stEnt',$stEnt);
	$smarty->assign('ordersBuy',$ordersBuy);
	$smarty->assign('mainMnu','requisicion');
			
?>