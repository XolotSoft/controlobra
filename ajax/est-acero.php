<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['estimP'];
$projectId = $_SESSION['curProjId'];

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
			
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$info['conceptId'] = $conceptId;
			
			//Obtenemos los Conceptos
			$cuantificacion->setProjectId($projectId);						
			$resConcepts = $cuantificacion->GetConceptsByProjId();
			
			$concepts = array();
			foreach($resConcepts as $res){
				$card = $res;
				
				$concept->setConceptId($res['conceptId']);
				$card['name'] = utf8_encode($concept->GetNameById());
				
				$concepts[] = $card;
			}
													
			$areas = 1;
			
			$smarty->assign('isSteel', 1);
			$smarty->assign('concepts', $concepts);	
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('areas', $areas);
			$smarty->assign('suppliers', $suppliers);
			
			echo 'ok[#]';
			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-est-acero-popup.tpl');
				
		break;
	
	case 'saveAddEstimacion':				
		
		$itemIds = $_POST['itemIds'];
					
		$estimacion->setProjectId($_POST['projectId']);		
		$estimacion->setConceptId($_POST['conceptId']);		
		$estimacion->setSupplierId($_POST['supplierId']);
		$estimacion->setQtyConcept($_POST['qtyConcept']);
		
		$continue = true;		
		$torres = $_POST['projItems'];
		if(!count($torres)){
			$estItem->setProjItemId('');
			
			if(!$estItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$levels = array();
			foreach($itemIds as $id){
				
				$subtotal = $_POST['subtotal_'.$id];
				$estima = $_POST['estima_'.$id];
				$saldo = $_POST['saldo_'.$id];
															
				$cuantItem->setCuantItemId($id);
				$infC = $cuantItem->Info();
														
				$card['cuantItemId'] = $id;
				$card['projItemId'] = $infC['projItemId'];
				$card['projLevelId'] = $infC['projLevelId'];
				$card['projLevelId2'] = $infC['projLevelId2'];
				$card['totalLevel'] = $infC['totalLevel'];
				$card['subtotal'] = $subtotal;
				$card['estimacion'] = $estima;
																													
				if($estima){
									
					if($estima > $saldo){						
						$util->setError(11000, 'error', '', '');
						$util->PrintErrors();
						$continue = false;
						break;
					}
				}
																		
				$estLevel->setProjLevelId($card['projLevelId']);
				$estLevel->setProjLevelId2($card['projLevelId2']);
				$estLevel->setTotalLevel($card['totalLevel']);
				
				if(!$estItem->SaveTemp())
					$continue = false;					
				
				$levels[] = $card;
				
			}
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
		$estimacion->setSteel(1);
		
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
			$estLevel->setEstimacionId($estimacionId);
			foreach($levels as $res){			
				
				if($estimacionId){
						
					$estLevel->setCuantItemId($res['cuantItemId']);
					$estLevel->setProjItemId($res['projItemId']);
					$estLevel->setProjLevelId($res['projLevelId']);
					$estLevel->setProjLevelId2($res['projLevelId2']);
					$estLevel->setTotalLevel($res['totalLevel']);
					$estLevel->setSubtotal($res['subtotal']);
					$estLevel->setEstimacion($res['estimacion']);
											
					$estLevelId = $estLevel->Save();					
					
				}
				
			}
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$resSuppliers = $estimacion->EnumSupByProj();

			$suppliers = array();
			foreach($resSuppliers as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
								
				$estimacion->setSupplierId($res['supplierId']);
				$resConcepts = $estimacion->EnumConceptsBySup();
				
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
					
					$projType->setProjTypeId($valC['projTypeId']);
					$cardC['type'] = utf8_encode($projType->GetNameById());
				
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
			
			$estLevel->setEstimacionId($estimacionId);
			$resItems = $estLevel->EnumerateAll();
	
			$items = array();
			$torres = array();
			foreach($resItems as $res){
				$card = $res;
			
				$projItem->setProjItemId($res['projItemId']);
				$name = $projItem->GetNameById();
				
				//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
				//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
				
				$projLevel->setProjLevelId($res['projLevelId']);
				$card['iniLevel'] = $projLevel->GetLevelById();
				
				$projLevel->setProjLevelId($res['projLevelId2']);
				$card['endLevel'] = $projLevel->GetLevelById();
								
				$items[] = $name;
				$card['name'] = $name;
				
				$torres[] = $card;
			}
			
			$info['torre'] = implode(', ',$items);
			
			$concept->setConceptId($info['conceptId']);
			$info['concept'] = $concept->GetNameById();
												
			$info = $util->EncodeRow($info);
					
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-est-acero-popup.tpl');
		
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
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItemAcero.tpl');
			
		break;
	
	case 'loadLevels':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];			
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
				$cuantificacion->setConceptId($conceptId);
				$cuantificacion->setSupplierId($supplierId);
				$resLevels = $cuantificacion->GetLevelsByProjItemIdAcero();
								
				$levels = array();
				foreach($resLevels as $lev){
					$cardL = $lev;

					$projLevel->setProjLevelId($lev['projLevelId']);
					$cardL['iniLevel'] = $projLevel->GetLevelById();
					
					$projLevel->setProjLevelId($lev['projLevelId2']);
					$cardL['endLevel'] = $projLevel->GetLevelById();
										
					$cuantificacion->setCuantificacionId($lev['cuantificacionId']);						
					$subtotal = $cuantificacion->GetSubtotalByCuantId();
					$cardL['subtotal'] = $subtotal;
					
					$estimacion->setCuantItemId($lev['cuantItemId']);
					$estimacion->setProjectId($projectId);
					$estimacion->setConceptId($conceptId);					
					$estTotal = $estimacion->GetEstTotalByLevel();
					
					$saldo = $subtotal - $estTotal;
					$cardL['saldo'] = number_format($saldo,2);
					
					$levels[] = $cardL;
				}
								
				$card['levels'] = $levels;
				
				$torres[] = $card;
												
			}
					
			echo 'ok[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsEstAcero.tpl');
			
		break;
	
	case 'getTotalConcept':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
			$supplierId = $_POST['supplierId'];
									
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
									
			//Obtenemos las Torres
			
			$cuantificacion->setSupplierId($supplierId);
			$resItems = $cuantificacion->EnumItems();
			
			if(count($resItems) == 0)
				$resItems = array();
			
			$subtotal = 0;
			$items = array();
			foreach($resItems as $res){
								
				$projItemId = $res['projItemId'];
												
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

					$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
					$subtotal += $cuantificacion->GetSubtotalByCuantId();						
								
				}																		
			}
			
			echo 'ok[#]';
			echo $subtotal;
			
		break;
	
}

?>
