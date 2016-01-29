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
		
		$info['conceptId'] = $conceptId;
		
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
		
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
		
		$smarty->assign('isSteel', 0);
		$smarty->assign('concepts', $concepts);			
		$smarty->assign('infP', $infP);
		$smarty->assign('info', $info);
		$smarty->assign('areas', $areas);
				
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-requisicion-popup.tpl');
				
		break;	

	case 'editRequisicion':
		
		$requisicion->setRequisicionId($_POST['id']);
		$info = $requisicion->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-requisicion-popup.tpl');
		
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
				
		$requisicion->setRequisicionId($requisicionId);
		$resItems = $requisicion->GetItems();

		$items = array();
		$torres = array();
		foreach($resItems as $res){
			$card = $res;
			
			$projItem->setProjItemId($res['projItemId']);
			$name = $projItem->GetNameById();
			
			//Obtenemos los Niveles por Torre, una Torre puede tener 2 rangos de niveles cuantificados
			//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 1 al 5
			//Torre A - Dep. 1 - Muro Tablaroca - Del nivel 6 al 7
			$reqItem->setRequisicionId($requisicionId);
			$reqItem->setProjItemId($res['projItemId']);
			$resLevels = $reqItem->EnumLevelsByItem();
			
			$levels = array();
			foreach($resLevels as $lev){
				$cardL = $lev;

				$projLevel->setProjLevelId($lev['projLevelId']);
				$cardL['iniLevel'] = $projLevel->GetLevelById();
				
				$projLevel->setProjLevelId($lev['projLevelId2']);
				$cardL['endLevel'] = $projLevel->GetLevelById();
								
				$reqDepto->setRequisicionId($requisicionId);
				$reqDepto->setReqItemId($lev['reqItemId']);
				$resAreas = $reqDepto->EnumAreasByItem();
									
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
		$info['concept'] = $concept->GetNameById();
		
		$concept->setConceptId($info['conceptIdObra']);
		$info['conceptObra'] = $concept->GetNameById();
			
		$requisicion->setRequisicionId($requisicionId);
		$projTypes = $requisicion->GetProjTypes();			
		
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
		$smarty->display(DOC_ROOT.'/templates/boxes/view-requisicion-popup.tpl');
		
		break;
			
	case 'saveAddRequisicion':				
		
		$itemIds = $_POST['itemIds'];
		$projTypes = $_POST['projTypes'];
		$torres = $_POST['projItems'];
		
		if($projTypes)
			$projTypeIds = implode(',',$projTypes);
		
		if($torres)
			$projItemIds = implode(',',$torres);
					
		$requisicion->setProjectId($_POST['projectId']);		
		$requisicion->setConceptId($_POST['conceptId']);
		$requisicion->setConceptIdObra($_POST['conceptId']);
		$requisicion->setQtyConcept($_POST['qtyConcept']);
		$requisicion->setProjTypeId($projTypeIds);
		$requisicion->setProjItemId($projItemIds);
		
		if(!$requisicion->SaveTemp())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$continue = true;		
		
		if(!count($torres)){
			$reqItem->setProjItemId('');
			
			if(!$reqItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$totalDeptos = 0;
			$items = array();
			foreach($itemIds as $id){
				
				$aDeptos = $_POST['deptos_'.$id];
				$subtotals = $_POST['subtotals_'.$id];
				$requis = $_POST['requis_'.$id];
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
						
						$requi = $requis[$k];
						$saldo = $saldos[$k];
																		
						if($requi){
							$cardA['projDeptoId'] = $projDeptoId;
							$cardA['subtotal'] = $subtotals[$k];
							$cardA['requisicion'] = $requi;
							
							$deptos[] = $cardA;
								
							if($requi > $saldo){						
								$util->setError(11000, 'error', '', '');
								$util->PrintErrors();
								$continue = false;
								break;
							}
						}					
						
					}
												
					$card['deptos'] = $deptos;
					
					$totalDeptos += count($deptos);
					
					$reqItem->setProjLevelId($card['projLevelId']);
					$reqItem->setProjLevelId2($card['projLevelId2']);
					$reqItem->setTotalLevel($card['totalLevel']);
					
					if(!$reqItem->SaveTemp())
						$continue = false;
					
					$items[] = $card;
					
				}
			}
		}
		
		if($totalDeptos == 0){			
			$reqDepto->setProjDeptoId('');
			$reqDepto->SaveTemp();
			$continue = false;
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
		$requisicion->setProjTypeId(0);
		$requisicion->setSteel(0);
		
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
			$reqItem->setRequisicionId($requisicionId);
			foreach($items as $res){
				$reqItem->setCuantItemId($res['cuantItemId']);
				$reqItem->setProjItemId($res['projItemId']);
				$reqItem->setProjLevelId($res['projLevelId']);
				$reqItem->setProjLevelId2($res['projLevelId2']);
				$reqItem->setTotalLevel($res['totalLevel']);
				$reqItem->setTotalAreas($res['totalAreas']);
				
				$reqItemId = $reqItem->Save();
				
				if($requisicionId){
					
					foreach($res['deptos'] as $val){
						$reqDepto->setRequisicionId($requisicionId);
						$reqDepto->setReqItemId($reqItemId);
						$reqDepto->setProjDeptoId($val['projDeptoId']);
						$reqDepto->setSubtotal($val['subtotal']);
						$reqDepto->setRequisicion($val['requisicion']);
						
						$reqDepto->Save();
					}
					
				}
				
			}
			
			//Guardamos los Tipos de Area
			foreach($projTypes as $id){
				
				$requisicion->setRequisicionId($requisicionId);
				$requisicion->setProjTypeId($id);
				$requisicion->SaveProjType();
				
			}
			
			//Save History Data			
			$user->setModule('Requisiciones');
			$user->setAction('Agregar');
			$user->setItemId($requisicionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			
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
							$cardA['name'] = utf8_encode($projDepto->GetNameById());
												
							$areas[] = $cardA;
						}										
						
					}//foreach
		
					$cardI['areas'] = $areas;
								
					$torres[] = $cardI;
								
				}//foreach
								
				$cardC['torres'] = $torres;
						
				$concepts[] = $cardC;
				
			}//foreach
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/requisicion.tpl');
		}		
		
		break;
		
	case 'saveEditRequisicion':	 	
				
		$requisicion->setRequisicionId($_POST['id']);
		$requisicion->setProjectId($_POST['projectId']);
		$requisicion->setConceptId($_POST['conceptId']);
		$requisicion->setProjLevelId($_POST['projLevelId']);
		$requisicion->setName($_POST['name']);
				
		if($_POST['active'])
			$requisicion->setActive(1);
		else
			$requisicion->setActive(0);
					
		if(!$requisicion->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$requisicion->SetPage($p);
			$requisiciones = $requisicion->Enumerate();
			
			$items = array();
			foreach($requisiciones['items'] as $res){
				$card = $res;
				
				$project->setProjectId($res['projectId']);
				$card['project'] = $project->GetNameById();
												
				$concept->setConceptId($res['conceptId']);
				$card['concept'] = $concept->GetNameById();
				
				$items[] = $card;
			}
			$requisiciones['items'] = $util->EncodeResult($items);
			
			$smarty->assign('requisiciones', $requisiciones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/requisicion.tpl');
		}
			
		break;
	
	case 'deleteRequisicion':
		
		$requisicionId = $_POST['id'];
		$requisicion->setRequisicionId($requisicionId);	
				
		if(!$requisicion->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Requisiciones');
			$user->setAction('Eliminar');
			$user->setItemId($requisicionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
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
							$cardA['name'] = utf8_encode($projDepto->GetNameById());
												
							$areas[] = $cardA;
						}										
						
					}//foreach
		
					$cardI['areas'] = $areas;
								
					$torres[] = $cardI;
								
				}//foreach
								
				$cardC['torres'] = $torres;
						
				$concepts[] = $cardC;
				
			}//foreach
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/requisicion.tpl');
		}
			
		break;
		
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
			$conceptId = $_POST['conceptId'];
			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			
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
			
			$smarty->assign('items', $items);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItem.tpl');
			
		break;
	
	case 'loadLevels':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			$conceptId = $_POST['conceptId'];
			$projTypes = $_POST['projTypes'];
						
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
				$resLevels = $cuantificacion->GetLevelsByProjItemIdReq($projTypeIds);
				
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
					
					$requisicion->setProjectId($projectId);
					$requisicion->setConceptId($conceptId);
					$requisicion->setProjTypeId($projTypeId);					
					
					$areas = array();
					foreach($resAreas as $res){
						$cardA = $res;
						
						$cuantificacion->setCuantificacionId($lev['cuantificacionId']);
						$subtotal = $cuantificacion->GetSubtotalByCuantId();
						$cardA['subtotal'] = $subtotal;
												
						$requisicion->setProjDeptoId($res['projDeptoId']);
						$estTotal = $requisicion->GetReqTotalByArea($projTypeIds);
												
						$saldo = $subtotal - $estTotal;
						$cardA['saldo'] = number_format($saldo,2);
						
						if($cardA['saldo'] != 0)
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
					
					if(count($areas))				
						$levels[] = $cardL;
				}
								
				$card['levels'] = $levels;
				
				$torres[] = $card;
												
			}
					
			echo 'ok[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsReq.tpl');
			
		break;
		
	case 'loadTypeAreas':
			
			$projectId = $_POST['projectId'];
			$conceptId = $_POST['conceptId'];
						
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			$types = $cuantificacion->EnumTypesByConcept();
			$types = $util->EncodeResult($types);			
					
			$qtyConcept = $cuantificacion->GetQtyConcept();
						
			echo 'ok[#]';
			echo $qtyConcept;
			
			echo '[#]';
						
			$smarty->assign('types', $types);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjTypeReq2.tpl');
						
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
						
			/****/
						
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
									
			//Obtenemos las Torres
			
			$cuantificacion->setSupplierId($supplierId);
			$resItems = $cuantificacion->EnumItemsReq();
			
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
				$resLevels = $cuantificacion->GetLevelsByProjItemIdReq($projTypeIds);
				
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
			echo '[#]';
			echo number_format($subtotal,2);
			
		break;
	
	case 'getQtyConcept':
			
			$cuantificacion->setProjectId($projectId);
			$cuantificacion->setConceptId($conceptId);
			$qtyConcept = $cuantificacion->GetQtyConcept();
			
			echo 'ok[#]';
			echo $qtyConcept;
			
		break;
		
	case 'isSteel':
			
			echo 'ok[#]';
			
			$concept->setConceptId($_POST['conceptId']);			
			echo $concept->IsSteel();
			
		break;
	
	case 'getUnitPrice':
			
			$conceptMatId = $_POST['conceptMatId'];
			$supplierId = $_POST['supplierId'];
			
			$conceptMat->setConceptMatId($conceptMatId);
			$materialId = $conceptMat->GetMaterialId();
			
			$matPrice->setMaterialId($materialId);
			$matPrice->setSupplierId($supplierId);
			$matPriceId = $matPrice->GetMatPriceId();
			
			$matPrice->setMatPriceId($matPriceId);
			$info = $matPrice->Info();
			
			echo 'ok[#]';
			echo number_format($info['price'],2);
			
		break;
	
	case 'loadMatPrices':
			
			$requisicionId = $_POST['requisicionId'];
			$supplierId = $_POST['supplierId'];
		
			$requisicion->setRequisicionId($requisicionId);
			$info = $requisicion->Info();
					
			$conceptMat->setConceptId($info['conceptIdObra']);
			$resMats = $conceptMat->EnumerateAll();
	
			$materials = array();
			foreach($resMats as $resM){
				$cardM = $resM;
				
				$conceptMatId = $resM['conceptMatId'];
				
				$matPrice->setMaterialId($resM['materialId']);
				$matPrice->setSupplierId($supplierId);
				$matPriceId = $matPrice->GetMatPriceId();
				
				$matPrice->setMatPriceId($matPriceId);
				$infM = $matPrice->Info();
				
				$price = $infM['price'];
				
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptMatId($conceptMatId);
				$qtySolicitada = $reqMat->GetTotalQtySolicitado();
				
				$saldo = $resM['quantity'] - $qtySolicitada;
				$total = $price * $saldo;
				
				$cardM['solicitado'] = $qtySolicitada;
				$cardM['saldo'] = $saldo;
				$cardM['solicitar'] = $saldo;
				$cardM['unitPrice'] = number_format($price,2);
				$cardM['total'] = number_format($total,2);
				
				$materials[] = $cardM;
			}
						
			echo 'ok[#]';
			
			$smarty->assign('materials', $materials);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumMatPedidos.tpl');
			
		break;
	
	case 'getTotalPedido':
			
			$price = $_POST['price'];
			$qty = $_POST['qty'];
			
			$total = $price * $qty;
			
			echo 'ok[#]';
			echo '$'.number_format($total,2);
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stReq'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
		
}

?>
