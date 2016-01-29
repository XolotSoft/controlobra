<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['reqP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{
	case 'addRequisicion': 
		
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
			
			//Obtenemos los Conceptos de Obra
			$cuantificacion->setProjectId($projectId);
			$resConcepts = $cuantificacion->GetConceptsObraByProjId();
			
			$concepts = array();
			$conceptsObra = array();
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
						
			echo 'ok[#]';
			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-req-acero-popup.tpl');
				
		break;
	
	case 'saveAddRequisicion':				
		
		$itemIds = $_POST['itemIds'];
					
		$requisicion->setProjectId($_POST['projectId']);		
		$requisicion->setConceptId($_POST['conceptId']);
		$requisicion->setConceptIdObra($_POST['conceptId']);		
		$requisicion->setQtyConcept($_POST['qtyConcept']);
		
		$continue = true;		
		$torres = $_POST['projItems'];
		if(!count($torres)){
			$reqItem->setProjItemId('');
			
			if(!$reqItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$levels = array();
			foreach($itemIds as $id){
				
				$subtotal = $_POST['subtotal_'.$id];
				$requi = $_POST['requi_'.$id];
				$saldo = $_POST['saldo_'.$id];
															
				$cuantItem->setCuantItemId($id);
				$infC = $cuantItem->Info();
														
				$card['cuantItemId'] = $id;
				$card['projItemId'] = $infC['projItemId'];
				$card['projLevelId'] = $infC['projLevelId'];
				$card['projLevelId2'] = $infC['projLevelId2'];
				$card['totalLevel'] = $infC['totalLevel'];
				$card['subtotal'] = $subtotal;
				$card['requisicion'] = $requi;
																													
				if($requi){
									
					if($requi > $saldo){						
						$util->setError(11000, 'error', '', '');
						$util->PrintErrors();
						$continue = false;
						break;
					}
				}
																		
				$reqLevel->setProjLevelId($card['projLevelId']);
				$reqLevel->setProjLevelId2($card['projLevelId2']);
				$reqLevel->setTotalLevel($card['totalLevel']);
				
				if(!$reqItem->SaveTemp())
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
		
		$requisicion->setRequiActual($_POST['requiActual']);
		$requisicion->setTotalRango($_POST['totalRango']);		
		$requisicion->setSaldoRango($_POST['saldoRango']);
		$requisicion->setTotalConcept($_POST['totalConcept']);
		$requisicion->setSaldoConcept($_POST['saldoConcept']);		
		$requisicion->setTotalReq($_POST['totalReq']);		
		$requisicion->setSteel(1);
		
		$requisicionId = $requisicion->Save();
		
		if(!$requisicionId)
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Guardamos los niveles de las torres
			$reqLevel->setRequisicionId($requisicionId);
			foreach($levels as $res){			
				
				if($requisicionId){
						
					$reqLevel->setCuantItemId($res['cuantItemId']);
					$reqLevel->setProjItemId($res['projItemId']);
					$reqLevel->setProjLevelId($res['projLevelId']);
					$reqLevel->setProjLevelId2($res['projLevelId2']);
					$reqLevel->setTotalLevel($res['totalLevel']);
					$reqLevel->setSubtotal($res['subtotal']);
					$reqLevel->setRequisicion($res['requisicion']);
											
					$reqLevelId = $reqLevel->Save();					
					
				}
				
			}
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$resConcepts = $requisicion->EnumConcepts();

			$concepts = array();
			foreach($resConcepts as $valC){
				$cardC = $valC;
				$cardC['name'] = utf8_encode($valC['name']);
				
				if($valC['steel']){
					$reqLevel->setRequisicionId($valC['requisicionId']);
					$resItems = $reqItem->EnumerateAll();
				}else{			
					$reqItem->setRequisicionId($valC['requisicionId']);
					$resItems = $reqItem->EnumerateAll();
				}
								
				$items = array();
				$torres = array();
				foreach($resItems as $resI){
					$cardI = $resI;
					
					$projItem->setProjItemId($resI['projItemId']);
					$name = utf8_encode($projItem->GetNameById());
					
					$projLevel->setProjLevelId($resI['projLevelId']);
					$cardI['level'] = utf8_encode($projLevel->GetLevelById());
					
					$projLevel->setProjLevelId($resI['projLevelId2']);
					$cardI['level2'] = utf8_encode($projLevel->GetLevelById());
					
					$cardI['name'] = $name;
					$items[] = $name;
					
					$torres[] = $cardI;
				}
								
				$cardC['torre'] = implode(', ',$items);
				$cardC['torres'] = $torres;
				
				$projType->setProjTypeId($valC['projTypeId']);
				$cardC['type'] = utf8_encode($projType->GetNameById());
													
				$concepts[] = $cardC;
			}
			
			$smarty->assign('concepts', $concepts);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/requisicion.tpl');
		}		
		
		break;
	
	case 'viewRequisicion':
		
			$requisicionId = $_POST['id'];
			
			$project->setProjectId($projectId);
			$infP = $project->Info();
			$infP = $util->EncodeRow($infP);
			
			$requisicion->setRequisicionId($requisicionId);
			$info = $requisicion->Info();
			
			$project->setProjectId($info['projectId']);
			$info['project'] = $project->GetNameById();
			
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = $supplier->GetNameById();
			
			$reqLevel->setRequisicionId($requisicionId);
			$resItems = $reqLevel->EnumerateAll();
	
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
			$smarty->display(DOC_ROOT.'/templates/boxes/view-req-acero-popup.tpl');
		
		break;
	
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
			$conceptId = $_POST['conceptId'];
			$supplierId = $_POST['supplierId'];
			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			
			$qtyConcept = $cuantificacion->GetQtyConcept();						
									
			//Obtenemos las Torres			
			$resItems = $cuantificacion->EnumItemsReq();
			
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
			echo $qtyConcept;
			
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
				$resLevels = $cuantificacion->GetLevelsByProjItemIdAceroReq();
								
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
					
					$requisicion->setCuantItemId($lev['cuantItemId']);
					$requisicion->setProjectId($projectId);
					$requisicion->setConceptId($conceptId);					
					$estTotal = $requisicion->GetReqTotalByLevel();
					
					$saldo = $subtotal - $estTotal;
					$cardL['saldo'] = number_format($saldo,2,'.','');
					
					$levels[] = $cardL;
				}
								
				$card['levels'] = $levels;
				
				$torres[] = $card;
												
			}
					
			echo 'ok[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsReqAcero.tpl');
			
		break;
	
	case 'getTotalConcept':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
												
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
									
			//Obtenemos las Torres
			
			$cuantificacion->setSupplierId($supplierId);
			$resItems = $cuantificacion->EnumItemsReq();
			
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
				$resLevels = $cuantificacion->GetLevelsByProjItemIdReq();
				
				$levels = array();
				foreach($resLevels as $lev){
					$cardL = $lev;

					$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
					$subtotal += $cuantificacion->GetSubtotalByCuantId();						
								
				}																		
			}
			
			echo 'ok[#]';
			echo $subtotal;
			echo '[#]';
			echo number_format($subtotal,2);
			
		break;
	
}

?>
