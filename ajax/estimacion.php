<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['estimP'];
$projectId = $_SESSION['curProjId'];

$stEst = $_SESSION['stEst'];

switch($_POST['type'])
{
	case 'addEstimacion': 
		
		$conceptId = $_POST['conceptId'];
		
		if(!$projectId){			
			$util->setError(10024, 'error', '', $field);
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;		  
		}
		
		$info['conceptId'] = $conceptId;
		
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
		
		//Obtenemos los Conceptos
		$cuantificacion->setProjectId($projectId);						
		$resConcepts = $cuantificacion->GetConceptsSubcontServ();
		
		$concepts = array();
		foreach($resConcepts as $res){
			$card = $res;
			
			$concept->setConceptId($res['conceptId']);
			$card['name'] = utf8_encode($concept->GetNameById());
			
			$concepts[] = $card;
		}
												
		$areas = 1;
		
		$smarty->assign('isSteel', 0);
		$smarty->assign('concepts', $concepts);	
		$smarty->assign('infP', $infP);
		$smarty->assign('info', $info);
		$smarty->assign('areas', $areas);
				
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-estimacion-popup.tpl');
				
		break;	

	case 'editEstimacion':
		
		$estimacion->setEstimacionId($_POST['id']);
		$info = $estimacion->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-estimacion-popup.tpl');
		
		break;
	
	case 'viewEstimacion':
		
		$estimacionId = $_POST['id'];
		
		$project->setProjectId($projectId);
		$infP = $project->Info();
		$infP = $util->EncodeRow($infP);
		
		$estimacion->setEstimacionId($estimacionId);
		$info = $estimacion->Info();
		
		$project->setProjectId($info['projectId']);
		$info['project'] = $project->GetNameById();
		
		$supplier->setSupplierId($info['supplierId']);
		$info['supplier'] = $supplier->GetNameById();
		
		$estItem->setEstimacionId($estimacionId);
		$resItems = $estItem->EnumerateAll();

		$items = array();
		$torres = array();
		foreach($resItems as $res){
			$card = $res;
			
			$projItem->setProjItemId($res['projItemId']);
			$name = $projItem->GetNameById();
			
			//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
			//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
			//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
			$estItem->setProjItemId($res['projItemId']);
			$resLevels = $estItem->EnumLevelsByItem();
			
			$levels = array();
			foreach($resLevels as $lev){
				$cardL = $lev;

				$projLevel->setProjLevelId($lev['projLevelId']);
				$cardL['iniLevel'] = $projLevel->GetLevelById();
				
				$projLevel->setProjLevelId($lev['projLevelId2']);
				$cardL['endLevel'] = $projLevel->GetLevelById();
								
				$estDepto->setEstimacionId($estimacionId);
				$estDepto->setEstItemId($lev['estItemId']);
				$resAreas = $estDepto->EnumAreasByItem();
									
				$areas = array();
				foreach($resAreas as $res){
					$cardA = $res;
					
					$projDepto->setProjDeptoId($res['projDeptoId']);
					$cardA['name'] = $projDepto->GetNameById();
										
					$areas[] = $cardA;
				}
								
				if($areas){
					$limAreas = count($areas) / 2;
				
					foreach($areas as $k => $a){
						
						if($k < $limAreas)
							$cardL['areas'][] = $a;
						else
							$cardL['areas2'][] = $a;
						
					}
				}
												
				$levels[] = $cardL;
			}
							
			$card['levels'] = $levels;
			
			$items[] = $name;
			$card['name'] = $name;
			
			$torres[] = $card;
		}
		
		$info['torre'] = implode(', ',$items);
		
		$concept->setConceptId($info['conceptId']);
		$infC = $concept->Info();
		
		$info['concept'] = $info['name'];
		
		$unit->setUnitId($infC['unitId']);
		$info['unit'] = $unit->GetClaveById();
			
		$estimacion->setEstimacionId($info['estimacionId']);
		$projTypes = $estimacion->GetProjTypes();			
		
		$types = array();			
		foreach($projTypes as $t){			
			$projType->setProjTypeId($t['projTypeId']);
			$types[] = $projType->GetNameById();
		}
		
		$info['type'] = implode(', ',$types);
						
		$info = $util->EncodeRow($info);
				
		$smarty->assign('info', $info);
		$smarty->assign('infP', $infP);
		$smarty->assign('torres', $torres);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/view-estimacion-popup.tpl');
		
		break;
		
	case 'saveAddEstimacion':				
		
		$itemIds = $_POST['itemIds'];
		$projTypes = $_POST['projTypes'];
		$torres = $_POST['projItems'];
		
		if($projTypes)
			$projTypeIds = implode(',',$projTypes);
		
		if($torres)
			$projItemIds = implode(',',$torres);
		
		$estimacion->setProjectId($_POST['projectId']);		
		$estimacion->setConceptId($_POST['conceptId']);		
		$estimacion->setSupplierId($_POST['supplierId']);
		$estimacion->setQtyConcept($_POST['qtyConcept']);
		$estimacion->setPriceConcept($_POST['cPrice']);
		$estimacion->setProjTypeId($projTypeIds);
		$estimacion->setProjItemId($projItemIds);
		
		if(!$estimacion->SaveTemp())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$continue = true;		
		
		if(!count($torres)){
			$estItem->setProjItemId('');
			
			if(!$estItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$totalDeptos = 0;
			$items = array();
			foreach($itemIds as $id){
				
				$aDeptos = $_POST['deptos_'.$id];
				$subtotals = $_POST['subtotals_'.$id];
				$estimas = $_POST['estimas_'.$id];
				$saldos = $_POST['saldos_'.$id];
								
				if(count($aDeptos)){
							
					$cuantItem->setCuantItemId($id);
					$infC = $cuantItem->Info();
															
					$card['cuantItemId'] = $id;
					$card['projItemId'] = $infC['projItemId'];
					$card['projLevelId'] = $infC['projLevelId'];
					$card['projLevelId2'] = $infC['projLevelId2'];
					$card['totalLevel'] = $infC['totalLevel'];
					
					$deptos = array();
					foreach($aDeptos as $k => $projDeptoId){
						
						$estima = $estimas[$k];
						$saldo = $saldos[$k];
																		
						if($estima){
							$cardA['projDeptoId'] = $projDeptoId;
							$cardA['subtotal'] = $subtotals[$k];
							$cardA['estimacion'] = $estima;
							
							$deptos[] = $cardA;
								
							if($estima > $saldo){						
								$util->setError(10029, 'error', '', '');
								$util->PrintErrors();
								$continue = false;
								break;
							}
						}					
						
					}
												
					$card['deptos'] = $deptos;
					
					$totalDeptos += count($deptos);
					
					$estItem->setProjLevelId($card['projLevelId']);
					$estItem->setProjLevelId2($card['projLevelId2']);
					$estItem->setTotalLevel($card['totalLevel']);
					
					if(!$estItem->SaveTemp())
						$continue = false;
					
					$items[] = $card;
					
				}
			}
		}
		
		if($totalDeptos == 0){			
			$estDepto->setProjDeptoId('');
			$estDepto->SaveTemp();
			$continue = false;
		}
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$estimacion->setEstimActual($_POST['estimActual']);
		$estimacion->setTotalRango($_POST['totalRango']);		
		$estimacion->setSaldoRango($_POST['saldoRango']);
		$estimacion->setTotalConcept($_POST['totalConcept']);
		$estimacion->setSaldoConcept($_POST['saldoConcept']);
		$estimacion->setRetencion($_POST['retencion']);
		$estimacion->setTotalEst($_POST['totalEst']);
		$estimacion->setTotalRetenido($_POST['totalRetenido']);
		$estimacion->setProjTypeId(0);
		$estimacion->setSteel(0);
				
		$estimacionId = $estimacion->Save();
		
		if(!$estimacionId)
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Guardamos los niveles de las torres
			$estItem->setEstimacionId($estimacionId);
			foreach($items as $res){
				$estItem->setCuantItemId($res['cuantItemId']);
				$estItem->setProjItemId($res['projItemId']);
				$estItem->setProjLevelId($res['projLevelId']);
				$estItem->setProjLevelId2($res['projLevelId2']);
				$estItem->setTotalLevel($res['totalLevel']);
				$estItem->setTotalAreas($res['totalAreas']);
				
				$estItemId = $estItem->Save();
				
				if($estimacionId){
					
					foreach($res['deptos'] as $val){
						$estDepto->setEstimacionId($estimacionId);
						$estDepto->setEstItemId($estItemId);
						$estDepto->setProjDeptoId($val['projDeptoId']);
						$estDepto->setSubtotal($val['subtotal']);
						$estDepto->setEstimacion($val['estimacion']);
						
						$estDepto->Save();
					}
					
				}
				
			}
			
			//Guardamos los Tipos de Area
			foreach($projTypes as $id){
				
				$estimacion->setEstimacionId($estimacionId);
				$estimacion->setProjTypeId($id);
				$estimacion->SaveProjType();
				
			}
			
			//Save History Data
			$user->setModule('Estimacion');
			$user->setAction('Agregar');
			$user->setItemId($estimacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$resSuppliers = $estimacion->EnumSupByProj();

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
						$cardI['name'] = utf8_encode($projItem->GetNameById());
						
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
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion.tpl');
		}		
		
		break;
		
	case 'saveEditEstimacion':	 	
		
		$estimacionId = $_POST['id'];
		
		$estimacion->setEstimacionId($estimacionId);
		$estimacion->setProjectId($_POST['projectId']);
		$estimacion->setConceptId($_POST['conceptId']);
		$estimacion->setProjLevelId($_POST['projLevelId']);
		$estimacion->setName($_POST['name']);
		
		if($_POST['active'])
			$estimacion->setActive(1);
		else
			$estimacion->setActive(0);
					
		if(!$estimacion->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{			
			//Save History Data
			$user->setModule('Estimacion');
			$user->setAction('Editar');
			$user->setItemId($estimacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$estimacion->SetPage($p);
			$estimaciones = $estimacion->Enumerate();
			
			$items = array();
			foreach($estimaciones['items'] as $res){
				$card = $res;
				
				$project->setProjectId($res['projectId']);
				$card['project'] = $project->GetNameById();
												
				$concept->setConceptId($res['conceptId']);
				$card['concept'] = $concept->GetNameById();
				
				$items[] = $card;
			}
			$estimaciones['items'] = $util->EncodeResult($items);
			
			$smarty->assign('estimaciones', $estimaciones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion.tpl');
		}
			
		break;
	
	case 'deleteEstimacion':
		
		$estimacionId = $_POST['id'];
		
		$estimacion->setEstimacionId($estimacionId);
				
		if(!$estimacion->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Estimacion');
			$user->setAction('Eliminar');
			$user->setItemId($estimacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$estimacion->setProjectId($projectId);
			$resSuppliers = $estimacion->EnumSupByProj();

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
						$cardI['name'] = utf8_encode($projItem->GetNameById());
						
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
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion.tpl');
		}
			
		break;
	
	case 'confirmEstimacion':
		
		$estimacionId = $_POST['id'];
		
		$estimacion->setEstimacionId($estimacionId);	
		$info = $estimacion->Info();
		
		//Pago Normal
		$estimacionPayment->setProjectId($projectId);
		$estimacionPayment->setEstimacionId($estimacionId);
		$estimacionPayment->setSupplierId($info['supplierId']);
		$estimacionPayment->setTotal($info['totalEst']);
		$estimacionPayment->setFecha(date('Y-m-d'));
		$estimacionPayment->setTipo('N');
		$estPaymentId = $estimacionPayment->Save();
		
		//Pago Retencion
		$estimacionPayment->setTotal($info['totalRetenido']);
		$estimacionPayment->setTipo('R');
		$estPaymentId = $estimacionPayment->Save();
		
		$continue = true;
		if($estPaymentId){
			$estimacion->setStatus('Proceso');
			$estimacion->UpdateStatus();			
		}else{
			$continue = false;
		}
				
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Estimacion');
			$user->setAction('Confirmar');
			$user->setItemId($estimacionId);
			$user->SaveHistory();
			
			$util->setError(11022,'complete');
			$util->PrintErrors();
		
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$stEst = $_SESSION['stEst'];
			$estimacion->setProjectId($projectId);
			$resSuppliers = $estimacion->EnumSupByProj($stEst);

			$suppliers = array();
			foreach($resSuppliers as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
								
				$estimacion->setSupplierId($res['supplierId']);
				$resConcepts = $estimacion->EnumConceptsBySup($stEst);
				
				$concepts = array();
				foreach($resConcepts as $valC){
					$cardC = $valC;
					
					$cardC['name'] = utf8_encode($valC['name']);
					
					$estItem->setEstimacionId($valC['estimacionId']);
					$resItems = $estItem->EnumerateAll();
					
					$items = array();
					$torres = array();
					foreach($resItems as $resI){
						$cardI = $resI;
						
						$projItem->setProjItemId($resI['projItemId']);
						$name = utf8_encode($projItem->GetNameById());
						
						$projLevel->setProjLevelId($resI['projLevelId']);
						$cardI['level'] = $projLevel->GetLevelById();
						
						$projLevel->setProjLevelId($resI['projLevelId2']);
						$cardI['level2'] = $projLevel->GetLevelById();
						
						$cardI['name'] = $name;
						$items[] = $name;
						
						$torres[] = $cardI;
					}
									
					$cardC['torre'] = implode(', ',$items);
					$cardC['torres'] = $torres;
					
					$estimacion->setEstimacionId($valC['estimacionId']);
					$projTypes = $estimacion->GetProjTypes();			
					
					$types = array();			
					foreach($projTypes as $t){			
						$projType->setProjTypeId($t['projTypeId']);
						$types[] = utf8_encode($projType->GetNameById());
					}
					
					$cardC['type'] = implode(', ',$types);
				
					$supplier->setSupplierId($valC['supplierId']);
					$cardC['supplier'] = utf8_encode($supplier->GetNameById());
											
					$concepts[] = $cardC;
				}
				
				$card['concepts'] = $concepts;
				
				$suppliers[] = $card;
			}
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion.tpl');
		}
			
		break;
	
	case 'loadSuppliers':
			
			$projectId = $_POST['projectId'];
			$conceptId = $_POST['conceptId'];
			$supplierId = $_POST['supplierId'];
			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			
			//Obtenemos los Contratistas
			
			$suppliers = $cuantificacion->GetSupplierByConcept();			
			if($suppliers){
				$suppliers = $util->EncodeResult($suppliers);
				$supplierId = $suppliers[0]['supplierId'];
			}
			
			$qtyConcept = $cuantificacion->GetQtyConcept();
						
			$supplier->setProjectId($projectId);
			$supplier->setSupplierId($supplierId);			
			$retencion = $supplier->GetRetencionByProject();
			
			$conceptPrice->setConceptId($conceptId);
			$conceptPrice->setSupplierId($supplierId);
			$infP = $conceptPrice->GetPriceBySupplier();
											
			echo 'ok[#]';			
			echo $qtyConcept;
			
			echo '[#]';
			echo $retencion;
						
			echo '[#]';			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSupEst.tpl');
							
			echo '[#]';			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			$resTypes = $cuantificacion->EnumTypesByConcept();
			
			$types = array();
			foreach($resTypes as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				$types[] = $card;
			}
									
			$smarty->assign('types', $types);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjType3.tpl');
			
			echo '[#]';
			echo count($suppliers);
			
			echo '[#]';
			echo $infP['total'];
					
		break;
	
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
			$conceptId = $_POST['conceptId'];
			$supplierId = $_POST['supplierId'];
			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
									
			//Obtenemos las Torres
			
			$cuantificacion->setSupplierId($supplierId);
			$resItems = $cuantificacion->EnumItems();
			
			$items = array();
			foreach($resItems as $res){
				$card = $res;
				
				$projItem->setProjItemId($res['projItemId']);				
				$info = $projItem->Info();
				
				$res['name'] = utf8_encode($info['name']);
				
				$items[] = $res;
			}			
			
			$supplier->setProjectId($projectId);
			$supplier->setSupplierId($supplierId);			
			$retencion = $supplier->GetRetencionByProject();	
			
			echo 'ok[#]';
			echo $retencion;
			
			echo '[#]';
			
			$smarty->assign('items', $items);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItem2.tpl');
			
		break;
	
	case 'loadLevels':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
			$projTypeId = $_POST['projTypeId'];
			$supplierId = $_POST['supplierId'];
			
			if(!$projItems)
				$projItems = array();
			
			$torres = array();
			foreach($projItems as $projItemId){
				
				$projItem->setProjItemId($projItemId);
				$card['name'] = $projItem->GetNameById();
				
				//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
				$cuantificacion->setProjItemId($projItemId);
				$cuantificacion->setProjectId($projectId);
				$cuantificacion->setProjTypeId($projTypeId);
				$cuantificacion->setConceptId($conceptId);
				$cuantificacion->setSupplierId($supplierId);
				$resLevels = $cuantificacion->GetLevelsByProjItemId();
				
				$levels = array();
				foreach($resLevels as $lev){
					$cardL = $lev;

					$projLevel->setProjLevelId($lev['projLevelId']);
					$cardL['iniLevel'] = $projLevel->GetLevelById();
					
					$projLevel->setProjLevelId($lev['projLevelId2']);
					$cardL['endLevel'] = $projLevel->GetLevelById();
					
					$cuantificacion->setProjectId($projectId);
					$cuantificacion->setProjTypeId($projTypeId);
					$cuantificacion->setProjLevelId($lev['projLevelId']);
					$cuantificacion->setProjLevelId2($lev['projLevelId2']);
					$resAreas = $cuantificacion->GetAreasByLevel();
					
					$estimacion->setProjectId($projectId);
					$estimacion->setConceptId($conceptId);
					$estimacion->setProjTypeId($projTypeId);					
					
					$areas = array();
					foreach($resAreas as $res){
						$cardA = $res;
						
						$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
						$subtotal = $cuantificacion->GetSubtotalByCuantId();
						$cardA['subtotal'] = $subtotal;
												
						$estimacion->setProjDeptoId($res['projDeptoId']);
						$estTotal = $estimacion->GetEstTotalByArea();
						
						$saldo = $subtotal - $estTotal;
						$cardA['saldo'] = number_format($saldo,2);
						
						$areas[] = $cardA;
					}
					
					if($areas){
						$limAreas = count($areas) / 2;
					
						foreach($areas as $k => $a){
							
							if($k < $limAreas)
								$cardL['areas'][] = $a;
							else
								$cardL['areas2'][] = $a;
							
						}
					}
										
					$levels[] = $cardL;
				}
								
				$card['levels'] = $levels;
				
				$torres[] = $card;
												
			}
					
			echo 'ok[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsEst.tpl');
			
		break;
	
	case 'loadLevels2':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
			$projTypes = $_POST['projTypes'];
			$supplierId = $_POST['supplierId'];
			
			if(!$projItems)
				$projItems = array();
			
			if($projTypes)
				$projTypeIds = implode(',',$projTypes);
			
			$torres = array();
			foreach($projItems as $projItemId){
				
				$projItem->setProjItemId($projItemId);
				$card['name'] = $projItem->GetNameById();
				
				//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
				$cuantificacion->setProjItemId($projItemId);
				$cuantificacion->setProjectId($projectId);
				$cuantificacion->setProjTypeId($projTypeId);
				$cuantificacion->setConceptId($conceptId);
				$cuantificacion->setSupplierId($supplierId);
				$resLevels = $cuantificacion->GetLevelsByProjItemId2($projTypeIds);
								
				$levels = array();
				foreach($resLevels as $lev){
					$cardL = $lev;

					$projLevel->setProjLevelId($lev['projLevelId']);
					$cardL['iniLevel'] = $projLevel->GetLevelById();
					
					$projLevel->setProjLevelId($lev['projLevelId2']);
					$cardL['endLevel'] = $projLevel->GetLevelById();
					
					$cuantificacion->setProjectId($projectId);
					$cuantificacion->setProjTypeId($projTypeId);
					$cuantificacion->setProjLevelId($lev['projLevelId']);
					$cuantificacion->setProjLevelId2($lev['projLevelId2']);
					$resAreas = $cuantificacion->GetAreasByLevel2($projTypeIds);
					
					$estimacion->setProjectId($projectId);
					$estimacion->setConceptId($conceptId);
					$estimacion->setProjTypeId($projTypeId);					
					
					$areas = array();
					foreach($resAreas as $res){
						$cardA = $res;
						
						$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
						$subtotal = $cuantificacion->GetSubtotalByCuantId();
						$cardA['subtotal'] = $subtotal;
						
						$estimacion->setProjDeptoId($res['projDeptoId']);
						$estTotal = $estimacion->GetEstTotalByArea($projTypeIds);					
						
						$saldo = $subtotal - $estTotal;
						$cardA['saldo'] = number_format($saldo,2);
						
						$areas[] = $cardA;
					}
					
					if($areas){
						$limAreas = count($areas) / 2;
					
						foreach($areas as $k => $a){
							
							if($k < $limAreas)
								$cardL['areas'][] = $a;
							else
								$cardL['areas2'][] = $a;
							
						}
					}
										
					$levels[] = $cardL;
				}
								
				$card['levels'] = $levels;
				
				$torres[] = $card;
												
			}
					
			echo 'ok[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsEst.tpl');
			
		break;
			
	case 'loadConcepts':
			
			$projectId = $_POST['projectId'];
						
			$cuantificacion->setProjectId($projectId);						
			$resConcepts = $cuantificacion->GetConceptsByProjId();
			
			$concepts = array();
			foreach($resConcepts as $res){
				$card = $res;
				
				$concept->setConceptId($res['conceptId']);
				$card['name'] = utf8_encode($concept->GetNameById());
				
				$concepts[] = $card;
			}
						
			echo 'ok[#]';
						
			$smarty->assign('concepts', $concepts);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConceptEst.tpl');
						
		break;
	
	case 'getTotalLevel':
			
			$projectId = $_POST['projectId'];
			$projLevelId = $_POST['projLevelId'];
			$projLevelId2 = $_POST['projLevelId2'];
			$projTypeId = $_POST['projTypeId'];
			
			$project->setProjectId($projectId);
			$info = $project->Info();
			
			$separacion = $info['separacion'];
			
			$projLevel->setProjLevelId($projLevelId);
			$level1 = $projLevel->GetLevelById();
			
			$projLevel->setProjLevelId($projLevelId2);
			$level2 = $projLevel->GetLevelById();
			
			$levels = $level2 - $level1;
			$levels = @intval($levels / $separacion) + 1;
			
			//Obtenemos la cantidad de Area
			$projLevel->setProjLevelId($projLevelId);
			$infoL = $projLevel->Info();
			$projItemId = $infoL['projItemId'];
			
			$continue = true;
			if($projLevelId == '')
				$continue = false;
			
			if($projLevelId2 == '')
				$continue = false;
			
			$total = 0;
			
			if($continue){
				
				//Obtenemos los niveles
				$projLevel->setProjItemId($projItemId);
				$levels2 = $projLevel->GetLevelsByLimit($projLevelId,$projLevelId2);
				
				//Buscamos el tipo por cada area dentro del nivel
				foreach($levels2 as $res){
										
					$projDepto->setProjLevelId($res['projLevelId']);
					$projDepto->setProjTypeId($projTypeId);
					$totalA = $projDepto->GetTotalAreasByTypeId();
					
					$total += $totalA;
					
				}	
			
			}
			
			echo 'ok[#]';			
			echo $levels;
			
			echo '[#]';
			echo $total;
	
		break;
	
	case 'updateSubtotal':
			
			$b = intval($_POST['b']);
			$h = intval($_POST['h']);
			$z = intval($_POST['z']);
			
			$total = 0;
			$unitId = 0;
			$unitIndex = 0;
			
			if($b != 0 && $h != 0 && $z != 0){
				$total = $b * $h * $z;
				$unitId = 6;
			}elseif($b != 0 && $h != 0){
				$total = $b * $h;
				$unitId = 5;
			}elseif($b != 0){
				$total = $b;
				$unitId = 1;
			}
			
			$units = $unit->EnumerateAll();
			foreach($units as $key => $val){
				if($val['unitId'] == $unitId){
					$unitIndex = $key;
					break;
				}
			}
			
			echo 'ok[#]';
			
			echo $total;
			
			echo '[#]';
			
			echo $unitIndex;
			
		break;
	
	case 'updateTotal':
			
			$totalLevel = intval($_POST['totalLevel']);
			$qtyArea = intval($_POST['qtyArea']);
			$subtotal = intval($_POST['subtotal']);
			
			$total = $totalLevel * $qtyArea * $subtotal;
			
			echo 'ok[#]';
			
			echo $total;
			
		break;
	
	case 'getTotalAreas':
			
			$projItems = $_POST['projItems'];
			
			if(!count($projItems))
				$projItems = array();
			
			$total = 0;
			foreach($projItems as $id){
				$projLevelId = $_POST['projLevelId_'.$id];
				$projLevelId2 = $_POST['projLevelId2_'.$id];
				
				if($projLevelId == '')
					continue;
					
				if($projLevelId2 == '')
					continue;
				
				//Obtenemos los niveles
				$projLevel->setProjItemId($id);
				$levels = $projLevel->GetLevelsByLimit($projLevelId,$projLevelId2);
				
				//Buscamos el tipo por cada area dentro del nivel
				foreach($levels as $res){
										
					$projDepto->setProjLevelId($res['projLevelId']);
					$projDepto->setProjTypeId($_POST['projTypeId']);
					$totalA = $projDepto->GetTotalAreasByTypeId();
					
					$total += $totalA;
					
				}				
			}
			
			echo 'ok[#]';
			echo $total;
			
		break;
	
	case 'getTotalConcept':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
			$projTypes = $_POST['projTypes'];
			$supplierId = $_POST['supplierId'];
			
			/****/
						
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
									
			//Obtenemos las Torres
			
			$cuantificacion->setSupplierId($supplierId);
			$resItems = $cuantificacion->EnumItems();
			
			if(count($resItems) == 0)
				$resItems = array();
			
			if($projTypes)
				$projTypeIds = implode(',',$projTypes);
			
			$subtotal = 0;
			$items = array();
			foreach($resItems as $res){
								
				$projItemId = $res['projItemId'];
				
				$projItem->setProjItemId($projItemId);
				$card['name'] = $projItem->GetNameById();
				
				//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
				$cuantificacion->setProjItemId($projItemId);
				$cuantificacion->setProjectId($projectId);
				$cuantificacion->setProjTypeId($projTypeId);
				$cuantificacion->setConceptId($conceptId);
				$cuantificacion->setSupplierId($supplierId);
				$resLevels = $cuantificacion->GetLevelsByProjItemId2($projTypeIds);
				
				$levels = array();
				foreach($resLevels as $lev){
					$cardL = $lev;

					$projLevel->setProjLevelId($lev['projLevelId']);
					$cardL['iniLevel'] = $projLevel->GetLevelById();
					
					$projLevel->setProjLevelId($lev['projLevelId2']);
					$cardL['endLevel'] = $projLevel->GetLevelById();
					
					$cuantificacion->setProjectId($projectId);
					$cuantificacion->setProjTypeId($projTypeId);
					$cuantificacion->setProjLevelId($lev['projLevelId']);
					$cuantificacion->setProjLevelId2($lev['projLevelId2']);
					$resAreas = $cuantificacion->GetAreasByLevel2($projTypeIds);
										
					$areas = array();
					foreach($resAreas as $res){
						$cardA = $res;
						
						$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
						$subtotal += $cuantificacion->GetSubtotalByCuantId();
						
					}				
				}																		
			}
			
			echo 'ok[#]';
			echo $subtotal;
			
		break;
		
	case 'isSteel':
			
			echo 'ok[#]';
			
			$concept->setConceptId($_POST['conceptId']);			
			echo $concept->IsSteel();
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stEst'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
}

?>
