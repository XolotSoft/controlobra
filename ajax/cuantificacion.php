<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['cuantP'];
$projectId = $_SESSION['curProjId'];

if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{
	case 'addCuantificacion': 
		
		if(!$projectId){			
			$util->setError(10024, 'error', '', $field);
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;		  
		}
		
		$conceptId = $_POST['conceptId'];		
		$info['conceptId'] = $conceptId;
		
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
		
		$conceptPrice->setConceptId($conceptId);
		$infPr = $conceptPrice->GetPriceDefault();
		$info['supplierId'] = $infPr['supplierId'];
		
		if($info['supplierId']){
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
		}
		
		//Obtenemos los Conceptos
		
		$concepts = $concept->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
		
		//Obtenemos las Unidades
		
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
		
		$areas = 0;
		
		//Obtenemos las Torres
		
		$project->setProjectId($projectId);
		$items = $project->EnumItem();
		if($items)
			$items = $util->EncodeResult($items);
		
		//Obtenemos los Tipos de Area
		
		$projType->setProjectId($projectId);									
		$resTypes = $projType->EnumerateAll();
	
		$cantTypes = count($resTypes);
	
		if($cantTypes){
		
			$resTypes = $util->EncodeResult($resTypes);			
			$cociente = round($cantTypes / 2);
			
			$k = 1;
			$types = array();
			$types2 = array();
			foreach($resTypes as $res){
				
				if($k <= $cociente)
					$types[] = $res;
				else
					$types2[] = $res;
				
				$k++;
				
			}//foreach
			
		}//if
				
		$smarty->assign('isSteel', 0);
		$smarty->assign('tipo', 'Obra');
		$smarty->assign('types', $types);
		$smarty->assign('types2', $types2);
		$smarty->assign('items', $items);			
		$smarty->assign('areas', $areas);
		$smarty->assign('units', $units);		
		$smarty->assign('concepts', $concepts);
		$smarty->assign('infP', $infP);
		$smarty->assign('info',$info);
		
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-cuantificacion-popup.tpl');
				
		break;
	
	case 'addCuantServ': 
		
		if(!$projectId){			
			$util->setError(10024, 'error', '', $field);
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;		  
		}
		
		$conceptId = $_POST['conceptId'];		
		$info['conceptId'] = $conceptId;
				
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
		
		$concept->setConceptId($conceptId);
		$infC = $concept->Info();
		$tipo = $infC['tipo'];
		
		$unit->setUnitId($infC['unitId']);
		$info['unidad'] = $unit->GetClaveById();
		
		//Obtenemos los Conceptos
		$concepts = $concept->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
			
		$smarty->assign('isSteel', 0);
		$smarty->assign('tipo', $tipo);		
		$smarty->assign('concepts', $concepts);		
		$smarty->assign('infP', $infP);
		$smarty->assign('info',$info);
		
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-cuant-serv-popup.tpl');
				
		break;

	case 'editCuantificacion':
		
		$cuantificacionId = $_POST['id'];
		
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$info = $cuantificacion->Info();
		
		if($info['supplierId']){
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
		}
		
		$project->setProjectId($info['projectId']);
		$infP = $project->Info();
		$infP = $util->EncodeRow($infP);
				
		$cuantItem->setCuantificacionId($cuantificacionId);
		$resItems = $cuantItem->EnumerateAll();
		
		$projItems = array();
		$projLevelIds = array();
		$projItemIds = array();
		foreach($resItems as $res){
			$projItemId = $res['projItemId'];
			
			$projItemIds[] = $projItemId;
						
			$card['projLevelId'] = $res['projLevelId'];
			$card['projLevelId2'] = $res['projLevelId2'];
			
			$projLevelIds[$projItemId] = $card;
			
			$projItems[$projItemId] = $res;
		}
			
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$resTypeAreas = $cuantificacion->GetTypeAreas();

		$projTypeIds = array();
		foreach($resTypeAreas as $res)
			$projTypeIds[] = $res['projTypeId'];
		
		//Obtenemos los Conceptos
		
		$concepts = $concept->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
				
		//Obtenemos las Torres
		
		$project->setProjectId($projectId);
		$resItems = $project->EnumItem();
		if($resItems)
			$resItems = $util->EncodeResult($resItems);
		
		$items = array();
		foreach($resItems as $res){
			if(in_array($res['projItemId'], $projItemIds))
				$res['checked'] = 1;
			else
				$res['checked'] = 0;
								
			$items[] = $res;
		}
		
		//Obtenemos los Niveles
		
		$projectId = $info['projectId'];
				
		$torres = array();
		foreach($items as $res){
			$card = $res;
			
			$projItemId = $res['projItemId'];
			
			if($res['checked']){
			
				$project->setProjectId($projectId);
				$project->setProjItemId($projItemId);				
				$resLevels = $project->EnumLevel();
				
				$lev = $projLevelIds[$projItemId];
				
				$levels = array();
				foreach($resLevels as $val){
					
					if($lev['projLevelId'] == $val['projLevelId'])
						$val['selected1'] = 1;
					else
						$val['selected1'] = 0;
					
					if($lev['projLevelId2'] == $val['projLevelId'])
						$val['selected2'] = 1;
					else
						$val['selected2'] = 0;
				
					$levels[] = $val;
				}

				$levels = $util->EncodeResult($levels);
				$card['levels'] = $levels;
				
				$infI = $projItems[$projItemId];
				$card['totalLevel'] = $infI['totalLevel'];
				$card['totalAreas'] = $infI['totalAreas'];
				
				$torres[] = $card;
			
			}
		}		
		
		//Obtenemos los Tipos de Area
		
		$projType->setProjectId($projectId);									
		$types = $projType->EnumerateAll();
		
		$resTypes = array();
		foreach($types as $res){
			if(in_array($res['projTypeId'], $projTypeIds))
				$res['checked'] = 1;
			else
				$res['checked'] = 0;
		
			$resTypes[] = $res;
		}
		
		$cantTypes = count($resTypes);
	
		if($cantTypes){
		
			$resTypes = $util->EncodeResult($resTypes);			
			$cociente = round($cantTypes / 2);
			
			$k = 1;
			$types = array();
			$types2 = array();
			foreach($resTypes as $res){
				
				if($k <= $cociente)
					$types[] = $res;
				else
					$types2[] = $res;
				
				$k++;
				
			}//foreach
			
		}//if
		
		//Obtenemos los Ejes
		
		$projEje->setProjectId($projectId);									
		$ejes = $projEje->EnumerateL();
		$ejesL = $util->EncodeResult($ejes);
		
		$ejes = $projEje->EnumerateN();
		$ejesN = $util->EncodeResult($ejes);
			
		$ejes = $cuantificacion->InfoEjes();		
		$areas = count($ejes);
		
		//Obtenemos los Totales
		
		if($info['b'] > 0 && $info['h'] > 0 && $info['z'] > 0)
			$subtot = $info['b'] * $info['h'] * $info['z'];
		elseif($info['b'] > 0 && $info['h'] > 0)
			$subtot = $info['b'] * $info['h'];
		elseif($info['b'] > 0)
			$subtot = $info['b'];
		
		$info['subtot'] = $subtot;
		
		if($info['bV'] > 0 && $info['hV'] > 0 && $info['zV'] > 0)
			$subtotalV = $info['bV'] * $info['hV'] * $info['zV'];
		elseif($info['bV'] > 0 && $info['hV'] > 0)
			$subtotalV = $info['bV'] * $info['hV'];
		elseif($info['bV'] > 0)
			$subtotalV = $info['bV'];
			
		$info['subtotalV'] = number_format($subtotalV,2);
					
			
		$smarty->assign('isSteel', 0);
		$smarty->assign('tipo', 'Obra');
		$smarty->assign('items', $items);
		$smarty->assign('types', $types);
		$smarty->assign('types2', $types2);
		$smarty->assign('concepts', $concepts);
		$smarty->assign('ejesL', $ejesL);
		$smarty->assign('ejesN', $ejesN);
		$smarty->assign('ejes', $ejes);	
		
		$smarty->assign('areas', $areas);
		$smarty->assign('info', $info);
		$smarty->assign('infP', $infP);	
		$smarty->assign('torres',$torres);					
		$smarty->assign('levels', $levels);
				
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-cuantificacion-popup.tpl');
		
		break;
	
	case 'editCuantServ':
		
		$cuantificacionId = $_POST['id'];
		
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$info = $cuantificacion->Info();
		
		$project->setProjectId($info['projectId']);
		$infP = $project->Info();
		$infP = $util->EncodeRow($infP);
				
		$concept->setConceptId($info['conceptId']);
		$info['concept'] = $concept->GetNameById();
				
		$info = $util->EncodeRow($info);
					
		$smarty->assign('info', $info);
		$smarty->assign('infP', $infP);		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-cuant-serv-popup.tpl');
		
		break;
	
	case 'viewCuantificacion':
		
		$cuantificacionId = $_POST['id'];
		
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$info = $cuantificacion->Info();
		
		$project->setProjectId($info['projectId']);
		$infP = $project->Info();
		$infP = $util->EncodeRow($infP);
		
		$cuantItem->setCuantificacionId($cuantificacionId);
		$resItems = $cuantItem->EnumerateAll();
		
		$items = array();
		$torres = array();
		foreach($resItems as $res){
			$card = $res;
			
			$projItem->setProjItemId($res['projItemId']);
			$name = $projItem->GetNameById();
			
			$projLevel->setProjLevelId($res['projLevelId']);
			$card['level'] = $projLevel->GetLevelById();
			
			$projLevel->setProjLevelId($res['projLevelId2']);
			$card['level2'] = $projLevel->GetLevelById();
			
			$card['name'] = $name;
			$items[] = $name;
			
			$torres[] = $card;
		}
		
		$info['torre'] = implode(',',$items);
		
		$supplier->setSupplierId($info['supplierId']);
		$info['supplier'] = $supplier->GetNameById();
		
		$concept->setConceptId($info['conceptId']);
		$infC = $concept->Info();
		$info['concept'] = $infC['name'];
		
		$unit->setUnitId($infC['unitId']);
		$info['unit'] = $unit->GetClaveById();
		
		$projLevel->setProjLevelId($info['projLevelId']);
		$info['level'] = $projLevel->GetLevelById();
		
		$projLevel->setProjLevelId($info['projLevelId2']);
		$info['level2'] = $projLevel->GetLevelById();
		
		$cuantificacion->setCuantificacionId($info['cuantificacionId']);
		$resTypeAreas = $cuantificacion->GetTypeAreas();

		$nomTypes = array();
		foreach($resTypeAreas as $a){					
			$projType->setProjTypeId($a['projTypeId']);
			$nomTypes[] = $projType->GetNameById();
		}
		
		$info['type'] = implode(', ',$nomTypes);
						
		$resEjes = $cuantificacion->InfoEjes();
		
		$ejes = array();
		foreach($resEjes as $res){
			
			$projEje->setProjEjeLId($res['projEjeLId']);
			$card['letter'] = $projEje->GetLetterById();						
			$projEje->setProjEjeNId($res['projEjeNId']);
			$card['number'] = $projEje->GetNumberById();
			
			$projEje->setProjEjeLId($res['projEjeL2Id']);
			$card['letter2'] = $projEje->GetLetterById();
			$projEje->setProjEjeNId($res['projEjeN2Id']);
			$card['number2'] = $projEje->GetNumberById();
			
			$ejes[] = $card;
		}
			
		if($info['bV'] > 0 && $info['hV'] > 0 && $info['zV'] > 0)
			$subtotalV = $info['bV'] * $info['hV'] * $info['zV'];
		elseif($info['bV'] > 0 && $info['hV'] > 0)
			$subtotalV = $info['bV'] * $info['hV'];
		elseif($info['bV'] > 0)
			$subtotalV = $info['bV'];
			
		$info['subtotalV'] = number_format($subtotalV,2);
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign('info', $info);
		$smarty->assign('infP', $infP);
		$smarty->assign('torres', $torres);
		$smarty->assign('ejes', $ejes);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/view-cuantificacion-popup.tpl');
		
		break;
		
	case 'saveAddCuantificacion':				
		
		$qtyArea = $_POST['qtyArea'];
		$areasQty = $_POST['areasQty'];
		$ejesQty = $_POST['ejesQty'];
		$typesAreas = $_POST['projTypes'];
		$isExtra = ($_POST['isExtra'] == 1) ? '1':'0';
		
		$cuantificacion->setSteel(0);
		$cuantificacion->setProjectId($_POST['projectId']);
		$cuantificacion->setSupplierId($_POST['supplierId']);	
		$cuantificacion->setConceptId($_POST['conceptId']);
		$cuantificacion->setQtyConcept(intval($_POST['qtyConcept']));
		$cuantificacion->setNoPresupuesto($_POST['noPresupuesto']);
		$cuantificacion->setIsExtra($isExtra);
		
		$continue = true;		
		$torres = $_POST['projItems'];
		if(!count($torres)){
			$cuantItem->setProjItemId('');
			
			if(!$cuantItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$items = array();
			foreach($torres as $id){
								
				$cuantificacion->setProjItemId($id);				
				$resCuants = $cuantificacion->ExistCuantificacion2();
				
				$levels = array();
				foreach($resCuants as $res){
					$projLevel->setProjItemId($id);
					$resLevels = $projLevel->GetLevelsByLimit($res['projLevelId'],$res['projLevelId2']);
					
					foreach($resLevels as $lev)
						$levels[] = $lev['projLevelId'];
				}
													
				$card['projItemId'] = $id;
				$card['projLevelId'] = $_POST['projLevelId_'.$id];
				$card['projLevelId2'] = $_POST['projLevelId2_'.$id];
				$card['totalLevel'] = $_POST['totalLevel_'.$id];
				$card['totalAreas'] = $_POST['totAreas_'.$id];
																
				$cuantItem->setProjLevelId($card['projLevelId']);
				$cuantItem->setProjLevelId2($card['projLevelId2']);
				$cuantItem->setTotalLevel($card['totalLevel']);
								
				if(!$cuantItem->SaveTemp())
					$continue = false;
				
				$items[] = $card;
			}
			
		}
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$cuantificacion->setQtyArea($qtyArea);
				
		$ejes = array();
		$card = array();
		for($k=0; $k<$ejesQty; $k++){
			
			$projEjeLId = $_POST['projEjeLId_'.$k];
			$projEjeL2Id = $_POST['projEjeL2Id_'.$k];
						
			$projEjeNId = $_POST['projEjeNId_'.$k];
			$projEjeN2Id = $_POST['projEjeN2Id_'.$k];
						
			$card['projEjeNId'] = $projEjeNId;
			$card['projEjeLId'] = $projEjeLId;
			
			$card['projEjeN2Id'] = $projEjeN2Id;
			$card['projEjeL2Id'] = $projEjeL2Id;
			
			$ejes[] = $card;						
		}
		
		$cuantificacion->setEjes($ejes);
		
		//Checamos si ya existe alguna cuantificacion con los mismos datos
		if($cuantificacion->ExistCuant($items, $typesAreas, $ejes)){
			$util->setError(11041,'error','');
			$util->PrintErrors();
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');			
		}
		
		$cuantificacion->setB($_POST['b']);
		$cuantificacion->setH($_POST['h']);
		$cuantificacion->setZ($_POST['z']);
		$cuantificacion->setBV($_POST['bV']);
		$cuantificacion->setHV($_POST['hV']);
		$cuantificacion->setZV($_POST['zV']);
		$cuantificacion->setUnitId($_POST['unitId']);
		$cuantificacion->setSubtotal($_POST['subtotal']);
		$cuantificacion->setTotal($_POST['total']);
		
		$cuantificacionId = $cuantificacion->Save();
		
		if(!$cuantificacionId)
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			
			//Guardamos los niveles de las torres
			
			$cuantItem->setCuantificacionId($cuantificacionId);
			foreach($items as $res){
				$cuantItem->setProjItemId($res['projItemId']);
				$cuantItem->setProjLevelId($res['projLevelId']);
				$cuantItem->setProjLevelId2($res['projLevelId2']);
				$cuantItem->setTotalLevel($res['totalLevel']);
				$cuantItem->setTotalAreas($res['totalAreas']);
				
				$cuantItem->Save();
			}
			
			//Guardamos los Tipos de Areas
			
			foreach($typesAreas as $projTypeId){
				$cuantificacion->setCuantificacionId($cuantificacionId);
				$cuantificacion->setProjTypeId($projTypeId);
				$cuantificacion->SaveProjTypes();
			}
			
			//Save History Data
			$user->setModule('Cuantificacion');
			$user->setAction('Agregar');
			$user->setItemId($cuantificacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$resCategories = $cuantificacion->EnumCatsByProject();
		
			$categories = array();	
			foreach($resCategories as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcatsByProj();
				
				$subcategories = array();
				foreach($resSubcats as $val){
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$cuantificacion->setSubcategoryId($val['subcategoryId']);					
					$resConcepts = $cuantificacion->EnumConceptsByProj();
			
					$concepts = array();
					foreach($resConcepts as $valC){
						
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept();
						
						$cuants = array();
						foreach($resCuants as $v){
							
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
														
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}
						
						$cardC['cuants'] = $cuants;
						
						$concepts[] = $cardC;
						
					}
					
					$cardS['concepts'] = $concepts;				
					
					$subcategories[] = $cardS;
				}
				$card['subcategories'] = $subcategories;
				
				/********************************************************/
				/****** Obtenemos los Conceptos SIN Cuantificacion ******/
				/********************************************************/
						
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcats0ByProj();
					
				$cardS = array();
				$subcategories = array();
				foreach($resSubcats as $val){			
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$resConcepts = $cuantificacion->EnumConcepts0ByProj();
					
					$cardC = array();
					$concepts = array();
					foreach($resConcepts as $valC){				
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept0();
						
						$cuants = array();
						foreach($resCuants as $v){					
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}//foreach resCuants
						
						$cardC['cuants'] = $cuants;				
						$concepts[] = $cardC;
										
					}//foreach resConcepts	
												
					$cardS['concepts'] = $concepts;			
					$subcategories[] = $cardS;
					
				}//foreach resSubcats
				
				$card['subcategories2'] = $subcategories;
				
				/*****/
				
				$categories[] = $card;
			}
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
		}		
		
		break;
		
	case 'saveEditCuantificacion':	 	
		
		$cuantificacionId = $_POST['id'];
		$qtyArea = $_POST['qtyArea'];
		$areasQty = $_POST['areasQty'];
		$ejesQty = $_POST['ejesQty'];
		$typesAreas = $_POST['projTypes'];
		$isExtra = ($_POST['isExtra'] == 1) ? '1':'0';
		
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$cuantificacion->setProjectId($projectId);
		$cuantificacion->setConceptId($_POST['conceptId']);
		$cuantificacion->setQtyConcept($_POST['qtyConcept']);
		$cuantificacion->setSupplierId($_POST['supplierId']);
		$cuantificacion->setNoPresupuesto($_POST['noPresupuesto']);
		$cuantificacion->setIsExtra($isExtra);
		
		$continue = true;		
		$torres = $_POST['projItems'];
		if(!count($torres)){
			$cuantItem->setProjItemId('');
			
			if(!$cuantItem->SaveTemp())
				$continue = false;
			
		}else{		
			
			$items = array();
			foreach($torres as $id){
								
				$cuantificacion->setProjItemId($id);				
				$resCuants = $cuantificacion->ExistCuantificacion2();
				
				$levels = array();
				foreach($resCuants as $res){
					$projLevel->setProjItemId($id);
					$resLevels = $projLevel->GetLevelsByLimit($res['projLevelId'],$res['projLevelId2']);
					
					foreach($resLevels as $lev)
						$levels[] = $lev['projLevelId'];
				}
				
				$card['projItemId'] = $id;
				$card['projLevelId'] = $_POST['projLevelId_'.$id];
				$card['projLevelId2'] = $_POST['projLevelId2_'.$id];
				$card['totalLevel'] = $_POST['totalLevel_'.$id];
				$card['totalAreas'] = $_POST['totAreas_'.$id];
																
				$cuantItem->setProjLevelId($card['projLevelId']);
				$cuantItem->setProjLevelId2($card['projLevelId2']);
				$cuantItem->setTotalLevel($card['totalLevel']);
								
				if(!$cuantItem->SaveTemp())
					$continue = false;
				
				$items[] = $card;
			}
			
		}
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$cuantificacion->setQtyArea($qtyArea);
		
		$ejes = array();
		for($k=0; $k<$ejesQty; $k++){
			
			$projEjeLId = $_POST['projEjeLId_'.$k];
			$projEjeL2Id = $_POST['projEjeL2Id_'.$k];
					
			$projEjeNId = $_POST['projEjeNId_'.$k];
			$projEjeN2Id = $_POST['projEjeN2Id_'.$k];
						
			$card['projEjeNId'] = $projEjeNId;
			$card['projEjeLId'] = $projEjeLId;
			
			$card['projEjeN2Id'] = $projEjeN2Id;
			$card['projEjeL2Id'] = $projEjeL2Id;
			
			$ejes[] = $card;						
		}
		
		$cuantificacion->setEjes($ejes);
		
		//Checamos si ya existe alguna cuantificacion con los mismos datos
		if($cuantificacion->ExistCuant($items, $typesAreas, $ejes)){
			$util->setError(11041,'error','');
			$util->PrintErrors();
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');			
		}
		
		$cuantificacion->setB($_POST['b']);
		$cuantificacion->setH($_POST['h']);
		$cuantificacion->setZ($_POST['z']);
		$cuantificacion->setBV($_POST['bV']);
		$cuantificacion->setHV($_POST['hV']);
		$cuantificacion->setZV($_POST['zV']);
		$cuantificacion->setSubtotal($_POST['subtotal']);
		$cuantificacion->setTotal($_POST['total']);
		
		if(!$cuantificacion->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Eliminamos los Ejes
			$cuantificacion->DeleteEjes();
			
			//Guardamos los Nuevos Ejes
			$cuantificacion->SaveEjes();
			
			//Guardamos los niveles de las torres
			
			$cuantItem->setCuantificacionId($cuantificacionId);
			foreach($items as $res){
				$cuantItem->setProjItemId($res['projItemId']);
				$cuantItem->setProjLevelId($res['projLevelId']);
				$cuantItem->setProjLevelId2($res['projLevelId2']);
				$cuantItem->setTotalLevel($res['totalLevel']);
				$cuantItem->setTotalAreas($res['totalAreas']);
				
				$cuantItemId = $cuantItem->ExistItem();
				
				if($cuantItemId){
					$cuantItem->setCuantItemId($cuantItemId);
					$cuantItem->Update();
				}else{
					$cuantItem->Save();
				}
				
			}//foreach
			
			//Borramos las Torres que ya no fueron seleccionadas
			
			$itemIds = implode(',',$torres);
			$cuantItem->DeleteItems($itemIds);
			
			//Eliminamos los Tipos de Area
			$cuantificacion->DeleteProjTypes();
			
			//Guardamos los Tipos de Areas
			
			foreach($typesAreas as $projTypeId){
				$cuantificacion->setCuantificacionId($cuantificacionId);
				$cuantificacion->setProjTypeId($projTypeId);
				$cuantificacion->SaveProjTypes();
			}
			
			//Save History Data
			$user->setModule('Cuantificacion');
			$user->setAction('Editar');
			$user->setItemId($cuantificacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$cuantificacion->setProjectId($projectId);
			$resCategories = $cuantificacion->EnumCatsByProject();
		
			$categories = array();	
			foreach($resCategories as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcatsByProj();
				
				$subcategories = array();
				foreach($resSubcats as $val){
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$cuantificacion->setSubcategoryId($val['subcategoryId']);
					$resConcepts = $cuantificacion->EnumConceptsByProj();
			
					$concepts = array();
					foreach($resConcepts as $valC){
						
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept();
						
						$cuants = array();
						foreach($resCuants as $v){
							
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
														
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}
						
						$cardC['cuants'] = $cuants;
						
						$concepts[] = $cardC;
						
					}
					
					$cardS['concepts'] = $concepts;						
					
					$subcategories[] = $cardS;
				}
				$card['subcategories'] = $subcategories;
				
				/********************************************************/
				/****** Obtenemos los Conceptos SIN Cuantificacion ******/
				/********************************************************/
						
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcats0ByProj();
					
				$cardS = array();
				$subcategories = array();
				foreach($resSubcats as $val){			
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$resConcepts = $cuantificacion->EnumConcepts0ByProj();
					
					$cardC = array();
					$concepts = array();
					foreach($resConcepts as $valC){				
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept0();
						
						$cuants = array();
						foreach($resCuants as $v){					
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}//foreach resCuants
						
						$cardC['cuants'] = $cuants;				
						$concepts[] = $cardC;
										
					}//foreach resConcepts	
												
					$cardS['concepts'] = $concepts;			
					$subcategories[] = $cardS;
					
				}//foreach resSubcats
				
				$card['subcategories2'] = $subcategories;
				
				/*****/
				
				$categories[] = $card;
			}
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
		}
			
		break;
	
	case 'deleteCuantificacion':
		
		$cuantificacionId = $_POST['id'];
		$cuantificacion->setCuantificacionId($cuantificacionId);	
				
		if(!$cuantificacion->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Cuantificacion');
			$user->setAction('Eliminar');
			$user->setItemId($cuantificacionId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$cuantificacion->setProjectId($projectId);
			$resCategories = $cuantificacion->EnumCatsByProject();
		
			$categories = array();	
			foreach($resCategories as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcatsByProj();
				
				$subcategories = array();
				foreach($resSubcats as $val){
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$cuantificacion->setSubcategoryId($val['subcategoryId']);
					$resConcepts = $cuantificacion->EnumConceptsByProj();
			
					$concepts = array();
					foreach($resConcepts as $valC){
						
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept();
						
						$cuants = array();
						foreach($resCuants as $v){
							
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}
						
						$cardC['cuants'] = $cuants;
						
						$concepts[] = $cardC;
						
					}
					
					$cardS['concepts'] = $concepts;						
					
					$subcategories[] = $cardS;
				}
				$card['subcategories'] = $subcategories;
				
				/********************************************************/
				/****** Obtenemos los Conceptos SIN Cuantificacion ******/
				/********************************************************/
						
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcats0ByProj();
					
				$cardS = array();
				$subcategories = array();
				foreach($resSubcats as $val){			
					$cardS = $val;
					
					$cardS['name'] = utf8_encode($val['name']);
					
					$resConcepts = $cuantificacion->EnumConcepts0ByProj();
					
					$cardC = array();
					$concepts = array();
					foreach($resConcepts as $valC){				
						$cardC = $valC;
						
						$cardC['name'] = utf8_encode($valC['name']);
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept0();
						
						$cuants = array();
						foreach($resCuants as $v){					
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
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
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = utf8_encode($projType->GetNameById());
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = utf8_encode($unit->GetClaveById());
							
							$cuants[] = $cardC2;
							
						}//foreach resCuants
						
						$cardC['cuants'] = $cuants;				
						$concepts[] = $cardC;
										
					}//foreach resConcepts	
												
					$cardS['concepts'] = $concepts;			
					$subcategories[] = $cardS;
					
				}//foreach resSubcats
				
				$card['subcategories2'] = $subcategories;
				
				/*****/
				
				$categories[] = $card;
			}
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
		}
			
		break;
	
	case 'saveAddCuantServ':				
					
			$total = $_POST['qtyConcept'] * $_POST['unitPrice'];
					
			$cuantificacion->setProjectId($_POST['projectId']);	
			$cuantificacion->setConceptId($_POST['conceptId']);
			$cuantificacion->setQtyConcept($_POST['qtyConcept']);
			$cuantificacion->setUnitPrice($_POST['unitPrice']);			
			$cuantificacion->setTotal($total);			
						
			if(!$cuantificacion->SaveServ()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}else{
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$cuantificacion->setProjectId($projectId);
				$resCategories = $cuantificacion->EnumCatsByProject();
				
				$categories = array();	
				foreach($resCategories as $res){
					$card = $res;
					
					$card['name'] = utf8_encode($res['name']);
					
					$cuantificacion->setCategoryId($res['categoryId']);
					$resSubcats = $cuantificacion->EnumSubcatsByProj();
					
					$subcategories = array();
					foreach($resSubcats as $val){
						$cardS = $val;
						
						$cardS['name'] = utf8_encode($val['name']);
						
						$cuantificacion->setSubcategoryId($val['subcategoryId']);					
						$resConcepts = $cuantificacion->EnumConceptsByProj();
				
						$concepts = array();
						foreach($resConcepts as $valC){
							
							$cardC = $valC;
							
							$cardC['name'] = utf8_encode($valC['name']);
							
							$cuantificacion->setConceptId($valC['conceptId']);
							$resCuants = $cuantificacion->EnumCuantByConcept();
							
							$cuants = array();
							foreach($resCuants as $v){
								
								$cardC2 = $v;
								
								$cuantItem->setCuantificacionId($v['cuantificacionId']);
								$resItems = $cuantItem->EnumerateAll();
													
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
												
								$cardC2['torre'] = implode(', ',$items);
								$cardC2['torres'] = $torres;
								
								$supplier->setSupplierId($v['supplierId']);
								$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
								
								$cuantificacion->setCuantificacionId($v['cuantificacionId']);
								$resTypeAreas = $cuantificacion->GetTypeAreas();
			
								$nomTypes = array();
								foreach($resTypeAreas as $a){					
									$projType->setProjTypeId($a['projTypeId']);
									$nomTypes[] = utf8_encode($projType->GetNameById());
								}
								
								$cardC2['type'] = implode(', ',$nomTypes);
															
								$concept->setConceptId($valC['conceptId']);
								$infCC = $concept->Info();
								$cardC2['tipo'] = $infCC['tipo'];
								
								$unit->setUnitId($infCC['unitId']);
								$cardC2['unit'] = utf8_encode($unit->GetClaveById());
								
								$cuants[] = $cardC2;
								
							}
							
							$cardC['cuants'] = $cuants;
							
							$concepts[] = $cardC;
							
						}
						
						$cardS['concepts'] = $concepts;				
						
						$subcategories[] = $cardS;
					}
					$card['subcategories'] = $subcategories;
					
					/********************************************************/
					/****** Obtenemos los Conceptos SIN Cuantificacion ******/
					/********************************************************/
							
					$cuantificacion->setCategoryId($res['categoryId']);
					$resSubcats = $cuantificacion->EnumSubcats0ByProj();
						
					$cardS = array();
					$subcategories = array();
					foreach($resSubcats as $val){			
						$cardS = $val;
						
						$cardS['name'] = utf8_encode($val['name']);
						
						$resConcepts = $cuantificacion->EnumConcepts0ByProj();
						
						$cardC = array();
						$concepts = array();
						foreach($resConcepts as $valC){				
							$cardC = $valC;
							
							$cardC['name'] = utf8_encode($valC['name']);
							
							$cuantificacion->setConceptId($valC['conceptId']);
							$resCuants = $cuantificacion->EnumCuantByConcept0();
							
							$cuants = array();
							foreach($resCuants as $v){					
								$cardC2 = $v;
								
								$cuantItem->setCuantificacionId($v['cuantificacionId']);
								$resItems = $cuantItem->EnumerateAll();
													
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
												
								$cardC2['torre'] = implode(', ',$items);
								$cardC2['torres'] = $torres;
								
								$supplier->setSupplierId($v['supplierId']);
								$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
								
								$cuantificacion->setCuantificacionId($v['cuantificacionId']);
								$resTypeAreas = $cuantificacion->GetTypeAreas();
			
								$nomTypes = array();
								foreach($resTypeAreas as $a){					
									$projType->setProjTypeId($a['projTypeId']);
									$nomTypes[] = utf8_encode($projType->GetNameById());
								}
								
								$cardC2['type'] = implode(', ',$nomTypes);
								
								$concept->setConceptId($valC['conceptId']);
								$infCC = $concept->Info();
								$cardC2['tipo'] = $infCC['tipo'];
								
								$unit->setUnitId($infCC['unitId']);
								$cardC2['unit'] = utf8_encode($unit->GetClaveById());
								
								$cuants[] = $cardC2;
								
							}//foreach resCuants
							
							$cardC['cuants'] = $cuants;				
							$concepts[] = $cardC;
											
						}//foreach resConcepts	
													
						$cardS['concepts'] = $concepts;			
						$subcategories[] = $cardS;
						
					}//foreach resSubcats
					
					$card['subcategories2'] = $subcategories;
					
					/*****/
					
					$categories[] = $card;
				}
				
				$smarty->assign('categories', $categories);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
			}
			
		break;
	
	case 'saveEditCuantServ':				
			
			$projectId = $_POST['projectId'];
			
			$total = $_POST['qtyConcept'] * $_POST['unitPrice'];
			
			$cuantificacion->setCuantificacionId($_POST['cuantificacionId']);
			$cuantificacion->setQtyConcept($_POST['qtyConcept']);
			$cuantificacion->setUnitPrice($_POST['unitPrice']);
			$cuantificacion->setTotal($total);			
						
			if(!$cuantificacion->UpdateServ()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}else{
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$cuantificacion->setProjectId($projectId);
				$resCategories = $cuantificacion->EnumCatsByProject();
			
				$categories = array();	
				foreach($resCategories as $res){
					$card = $res;
					
					$card['name'] = utf8_encode($res['name']);
					
					$cuantificacion->setCategoryId($res['categoryId']);
					$resSubcats = $cuantificacion->EnumSubcatsByProj();
					
					$subcategories = array();
					foreach($resSubcats as $val){
						$cardS = $val;
						
						$cardS['name'] = utf8_encode($val['name']);
						
						$cuantificacion->setSubcategoryId($val['subcategoryId']);					
						$resConcepts = $cuantificacion->EnumConceptsByProj();
				
						$concepts = array();
						foreach($resConcepts as $valC){
							
							$cardC = $valC;
							
							$cardC['name'] = utf8_encode($valC['name']);
							
							$cuantificacion->setConceptId($valC['conceptId']);
							$resCuants = $cuantificacion->EnumCuantByConcept();
							
							$cuants = array();
							foreach($resCuants as $v){
								
								$cardC2 = $v;
								
								$cuantItem->setCuantificacionId($v['cuantificacionId']);
								$resItems = $cuantItem->EnumerateAll();
													
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
												
								$cardC2['torre'] = implode(', ',$items);
								$cardC2['torres'] = $torres;
								
								$supplier->setSupplierId($v['supplierId']);
								$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
								
								$cuantificacion->setCuantificacionId($v['cuantificacionId']);
								$resTypeAreas = $cuantificacion->GetTypeAreas();
			
								$nomTypes = array();
								foreach($resTypeAreas as $a){					
									$projType->setProjTypeId($a['projTypeId']);
									$nomTypes[] = utf8_encode($projType->GetNameById());
								}
								
								$cardC2['type'] = implode(', ',$nomTypes);
															
								$concept->setConceptId($valC['conceptId']);
								$infCC = $concept->Info();
								$cardC2['tipo'] = $infCC['tipo'];
								
								$unit->setUnitId($infCC['unitId']);
								$cardC2['unit'] = utf8_encode($unit->GetClaveById());
								
								$cuants[] = $cardC2;
								
							}
							
							$cardC['cuants'] = $cuants;
							
							$concepts[] = $cardC;
							
						}
						
						$cardS['concepts'] = $concepts;				
						
						$subcategories[] = $cardS;
					}
					$card['subcategories'] = $subcategories;
					
					/********************************************************/
					/****** Obtenemos los Conceptos SIN Cuantificacion ******/
					/********************************************************/
							
					$cuantificacion->setCategoryId($res['categoryId']);
					$resSubcats = $cuantificacion->EnumSubcats0ByProj();
						
					$cardS = array();
					$subcategories = array();
					foreach($resSubcats as $val){			
						$cardS = $val;
						
						$cardS['name'] = utf8_encode($val['name']);
						
						$resConcepts = $cuantificacion->EnumConcepts0ByProj();
						
						$cardC = array();
						$concepts = array();
						foreach($resConcepts as $valC){				
							$cardC = $valC;
							
							$cardC['name'] = utf8_encode($valC['name']);
							
							$cuantificacion->setConceptId($valC['conceptId']);
							$resCuants = $cuantificacion->EnumCuantByConcept0();
							
							$cuants = array();
							foreach($resCuants as $v){					
								$cardC2 = $v;
								
								$cuantItem->setCuantificacionId($v['cuantificacionId']);
								$resItems = $cuantItem->EnumerateAll();
													
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
												
								$cardC2['torre'] = implode(', ',$items);
								$cardC2['torres'] = $torres;
								
								$supplier->setSupplierId($v['supplierId']);
								$cardC2['supplier'] = utf8_encode($supplier->GetNameById());
								
								$cuantificacion->setCuantificacionId($v['cuantificacionId']);
								$resTypeAreas = $cuantificacion->GetTypeAreas();
			
								$nomTypes = array();
								foreach($resTypeAreas as $a){					
									$projType->setProjTypeId($a['projTypeId']);
									$nomTypes[] = utf8_encode($projType->GetNameById());
								}
								
								$cardC2['type'] = implode(', ',$nomTypes);
								
								$concept->setConceptId($valC['conceptId']);
								$infCC = $concept->Info();
								$cardC2['tipo'] = $infCC['tipo'];
								
								$unit->setUnitId($infCC['unitId']);
								$cardC2['unit'] = utf8_encode($unit->GetClaveById());
								
								$cuants[] = $cardC2;
								
							}//foreach resCuants
							
							$cardC['cuants'] = $cuants;				
							$concepts[] = $cardC;
											
						}//foreach resConcepts	
													
						$cardS['concepts'] = $concepts;			
						$subcategories[] = $cardS;
						
					}//foreach resSubcats
					
					$card['subcategories2'] = $subcategories;
					
					/*****/
					
					$categories[] = $card;
				}
				
				$smarty->assign('categories', $categories);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
			}
			
		break;
	
	case 'getTotalServ':
			
			$quantity = $_POST['quantity'];
			$unitPrice = $_POST['unitPrice'];
			
			$total = $quantity * $unitPrice;
			
			echo 'ok[#]';
			echo number_format($total,2,'.','');
			echo '[#]';
			echo number_format($total,2);
			
		break;
	
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
												
			$project->setProjectId($projectId);
			$items = $project->EnumItem();
			$items = $util->EncodeResult($items);
									
			echo 'ok[#]';
			
			$smarty->assign('items', $items);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItem.tpl');
			
			echo '[#]';
			
			$smarty->assign('torres', $torres);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevels.tpl');
					
		break;
	
	case 'loadLevels':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projItems = $_POST['projItems'];
			
			$torres = array();
			foreach($projItems as $projItemId){
				$card['projItemId'] = $projItemId;
				
				$projItem->setProjItemId($projItemId);
				$card['name'] = $projItem->GetNameById();
				
				$project->setProjectId($projectId);
				$project->setProjItemId($projItemId);

				$levels = $project->EnumLevel();
				$levels = $util->EncodeResult($levels);
				$card['levels'] = $levels;
							
				$torres[] = $card;
			}
						
			echo 'ok[#]';
			
			$smarty->assign('torres',$torres);					
			$smarty->assign('levels', $levels);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevels.tpl');
			
			echo '[#]';
						
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumEjesByArea.tpl');
			
		break;
	
	case 'loadLevelSearch':
			
			$projItemId = $_POST['projItemId'];
															
			$project->setProjectId($projectId);
			$project->setProjItemId($projItemId);

			$levels = $project->EnumLevel();
			$levels = $util->EncodeResult($levels);
									
			echo 'ok[#]';
							
			$smarty->assign('levels', $levels);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumLevelCuant.tpl');
			
			echo '[#]';
							
			$smarty->assign('levels', $levels);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumLevelCuant2.tpl');
						
		break;
	
	case 'loadEjes':
	case 'loadEjes2':
			
			$projectId = $_POST['projectId'];			
			$projItems = $_POST['projItems'];
			$projTypes = $_POST['projTypes'];
			$qtyConcept = $_POST['qtyConcept'];
			$qtyArea = $_POST['qtyArea'];
			
			if(count($projItems) == 0)
				$projItems = array();
			
			if(count($projTypes) == 0)
				$projTypes = array();
			
			$totalLevel = 0;		
			$totAreas = array();
			foreach($projItems as $id){
								
				$totalLevel = $_POST['totalLevel_'.$id];
				
				$projLevelId = $_POST['projLevelId_'.$id];
				$projLevelId2 = $_POST['projLevelId2_'.$id];
				
				if($projLevelId == '')
					continue;
					
				if($projLevelId2 == '')
					continue;
				
				//Obtenemos los niveles
				$projLevel->setProjItemId($id);
				$levels = $projLevel->GetLevelsByLimit($projLevelId,$projLevelId2);
				
				$totalAreas = 0;
				
				$totA = array();
				//Buscamos el tipo por cada area dentro del nivel
				foreach($levels as $res){
					
					//Checamos cada Tipo de Area
					foreach($projTypes as $idProjType){
					
						$projDepto->setProjLevelId($res['projLevelId']);
						$projDepto->setProjTypeId($idProjType);
						$totalA = $projDepto->GetTotalAreasByTypeId();
						$totalAreas += $totalA;
												
						if($totalA > $totA[$idProjType]){
							$totA[$idProjType] = $totalA;
							$totAreas[$id][$idProjType] = $totalA;
						}
					
					}					
					
				}//foreach
										
			}//foreach
			
			$projEje->setProjectId($projectId);									
			$ejes = $projEje->EnumerateL();
			$ejesL = $util->EncodeResult($ejes);
			
			$ejes = $projEje->EnumerateN();
			$ejesN = $util->EncodeResult($ejes);
						
			$areas = $qtyArea;
			
			$total = 0;
			foreach($totAreas as $totLevel){
				foreach($totLevel as $subtotal)
					$total += $subtotal;
			}
			
			$total *= $qtyConcept;
			
			echo 'ok[#]';
			echo $areas;
			
			echo '[#]';						
			$smarty->assign('areas', $total);
			$smarty->assign('ejesL', $ejesL);
			$smarty->assign('ejesN', $ejesN);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumEjesByArea.tpl');
			
			echo '[#]';
			echo $total;
									
		break;
	
	case 'loadTypeAreas':
			
			$projectId = $_POST['projectId'];
						
			$projType->setProjectId($projectId);									
			$types = $projType->EnumerateAll();
			$types = $util->EncodeResult($types);			
						
			echo 'ok[#]';
						
			$smarty->assign('types', $types);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjType2.tpl');
						
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
	
	case 'getTotalLevel2':
						
			$projectId = $_POST['projectId'];
			$projLevelId = $_POST['projLevelId'];
			$projLevelId2 = $_POST['projLevelId2'];
			$projTypeIds = $_POST['projTypeIds'];
			
			$idProjTypes = explode(',',$projTypeIds);
			
			if(count($idProjTypes) == 0)
				$idProjTypes = array();
			
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
					
					//Checamos cada Tipo de Area
					foreach($idProjTypes as $projTypeId){
					
						if($projTypeId > 0){
							$projDepto->setProjLevelId($res['projLevelId']);
							$projDepto->setProjTypeId($projTypeId);
							$totalA = $projDepto->GetTotalAreasByTypeId();
							
							$total += $totalA;
						}
					}
					
				}	
			
			}
			
			echo 'ok[#]';
			
			echo $levels;
			
			echo '[#]';
			echo $total;
	
		break;
	
	case 'updateSubtotal':
			
			$b = floatval($_POST['b']);
			$h = floatval($_POST['h']);
			$z = floatval($_POST['z']);
			
			$bV = floatval($_POST['bV']);
			$hV = floatval($_POST['hV']);
			$zV = floatval($_POST['zV']);
			
			$qtyConcept = floatval($_POST['qtyConcept']);
			
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
			
			$totalV = 0;
			if($b != 0 && $h != 0 && $z != 0)
				$totalV = $bV * $hV * $zV;				
			elseif($b != 0 && $h != 0)
				$totalV = $bV * $hV;
			elseif($b != 0)
				$totalV = $bV;
			
			$units = $unit->EnumerateAll();
			foreach($units as $key => $val){
				if($val['unitId'] == $unitId){
					$unitIndex = $key;
					break;
				}
			}
			
			$total2 = $total - $totalV;
			
			$total2 *= $qtyConcept;
			
			echo 'ok[#]';			
			echo number_format($total2,2,'.',',');
			
			echo '[#]';			
			echo number_format($total2,2,'.','');
			
			echo '[#]';			
			echo $unitIndex;
			
			echo '[#]';			
			echo number_format($total,2,'.',',');
			
			echo '[#]';			
			echo number_format($totalV,2,'.',',');
			
			echo '[#]';			
			echo number_format($totalV,2,'.','');
			
		break;
	
	case 'updateSubtotalV':
			
			$qtyConcept = floatval($_POST['qtyConcept']);
			
			$b = floatval($_POST['b']);
			$h = floatval($_POST['h']);
			$z = floatval($_POST['z']);
			
			$bV = floatval($_POST['bV']);
			$hV = floatval($_POST['hV']);
			$zV = floatval($_POST['zV']);
			
			if($b != 0 && $h != 0 && $z != 0)
				$total = $b * $h * $z;				
			elseif($b != 0 && $h != 0)
				$total = $b * $h;
			elseif($b != 0)
				$total = $b;
			
			$totalV = 0;
			if($b != 0 && $h != 0 && $z != 0)
				$totalV = $bV * $hV * $zV;				
			elseif($b != 0 && $h != 0)
				$totalV = $bV * $hV;
			elseif($b != 0)
				$totalV = $bV;
			
			$total = $total - $totalV;
			
			$total *= $qtyConcept;
			
			echo 'ok[#]';			
			echo number_format($totalV,2,'.',',');
			echo '[#]';
			echo number_format($totalV,2,'.','');
			echo '[#]';
			echo number_format($total,2,'.',',');
			echo '[#]';
			echo number_format($total,2,'.','');
						
		break;
	
	case 'updateTotal':
			
			$qtyArea = intval($_POST['qtyArea']);
			$qtyConcept = intval($_POST['qtyConcept']);
			$subtotal = floatval($_POST['subtotal']);
									
			//$total = $qtyConcept * $subtotal * $qtyArea;
			$total = $subtotal * $qtyArea;
			
			echo 'ok[#]';			
			echo number_format($total,2,'.',',');
			
			echo '[#]';			
			echo number_format($total,2,'.','');
			
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
	
	case 'getTotalAreas2':
			
			$projTypes = $_POST['projTypes'];			
			$projItems = $_POST['projItems'];
			
			if(!count($projTypes))
				$projTypes = array();
			
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
					
					//Checamos cada Tipo de Area
					foreach($projTypes as $idProjType){
					
						$projDepto->setProjLevelId($res['projLevelId']);
						$projDepto->setProjTypeId($idProjType);
						$totalA = $projDepto->GetTotalAreasByTypeId();
						
						$total += $totalA;
					
					}
					
				}				
			}
			
			echo 'ok[#]';
			echo $total;
			
		break;
	
	case 'isSteel':
			
			echo 'ok[#]';
			
			$concept->setConceptId($_POST['conceptId']);			
			echo $concept->IsSteel();
			
		break;
	
	case 'getTipoConcept':
			
			$conceptId = $_POST['conceptId'];
			
			$concept->setConceptId($conceptId);			
			$info = $concept->Info();
			
			$supplierId = 0;
			if($info['tipo'] == 'Subcontrato'){
				$conceptPrice->setConceptId($conceptId);
				$infP = $conceptPrice->GetPriceDefault();
				$supplierId = $infP['supplierId'];
				
				$supplier->setSupplierId($supplierId);
				$nomSupplier = $supplier->GetNameById();
			}elseif($info['tipo'] == 'Servicio'){
				$unit->setUnitId($info['unitId']);
				$unidad = $unit->GetClaveById();
			}
			
			echo 'ok[#]';
			echo $info['tipo'];
			echo '[#]';
			echo $info['steel'];
			echo '[#]';
			echo $supplierId;
			echo '[#]';
			echo utf8_encode($nomSupplier);
			echo '[#]';
			echo $unidad;
			
		break;
	
	case 'searchCuantificacion':
			
			$categoryId = $_POST['vCategoryId'];
			$subcategoryId = $_POST['vSubcategoryId'];
			
			$cuantificacion->setProjectId($projectId);	
			$resCategories = $cuantificacion->EnumCatsByProject();
			
			$categories = array();	
			foreach($resCategories as $res){
			
				if($categoryId){
					if($res['categoryId'] != $categoryId)
						continue;
				}
			
				$card = $res;
				
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcatsByProj();
						
				$subcategories = array();
				foreach($resSubcats as $val){
					$cardS = $val;
					
					if($subcategoryId){
						if($val['subcategoryId'] != $subcategoryId)
							continue;
					}
					
					$cuantificacion->setSubcategoryId($val['subcategoryId']);
					$resConcepts = $cuantificacion->EnumConceptsByProj();
					
					$concepts = array();
					foreach($resConcepts as $valC){
						
						$cardC = $valC;
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept();
						
						$cuants = array();
						foreach($resCuants as $v){
							
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
							$items = array();
							$torres = array();
							foreach($resItems as $resI){
								$cardI = $resI;
								
								$projItem->setProjItemId($resI['projItemId']);
								$name = $projItem->GetNameById();
								
								$projLevel->setProjLevelId($resI['projLevelId']);
								$cardI['level'] = $projLevel->GetLevelById();
								
								$projLevel->setProjLevelId($resI['projLevelId2']);
								$cardI['level2'] = $projLevel->GetLevelById();
								
								$cardI['name'] = $name;
								$items[] = $name;
								
								$torres[] = $cardI;					
							}
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = $supplier->GetNameById();
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = $projType->GetNameById();
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
							/*
							$unit->setUnitId($v['unitId']);
							$cardC2['unit'] = $unit->GetClaveById();
							*/
							
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = $unit->GetClaveById();
							
							$cuants[] = $cardC2;
							
						}//foreach resCuants
						
						$cardC['cuants'] = $cuants;
						
						$concepts[] = $cardC;
						
					}//foreach resConcepts
								
					$cardS['concepts'] = $concepts;
					
					$subcategories[] = $cardS;
				
				}//foreach resSubcats
				
				$card['subcategories'] = $subcategories;
				
				/********************************************************/
				/****** Obtenemos los Conceptos SIN Cuantificacion ******/
				/********************************************************/
						
				$cuantificacion->setCategoryId($res['categoryId']);
				$resSubcats = $cuantificacion->EnumSubcats0ByProj();
					
				$cardS = array();
				$subcategories = array();
				foreach($resSubcats as $val){			
					$cardS = $val;
					
					$resConcepts = $cuantificacion->EnumConcepts0ByProj();
					
					$cardC = array();
					$concepts = array();
					foreach($resConcepts as $valC){				
						$cardC = $valC;
						
						$cuantificacion->setConceptId($valC['conceptId']);
						$resCuants = $cuantificacion->EnumCuantByConcept0();
						
						$cuants = array();
						foreach($resCuants as $v){					
							$cardC2 = $v;
							
							$cuantItem->setCuantificacionId($v['cuantificacionId']);
							$resItems = $cuantItem->EnumerateAll();
												
							$items = array();
							$torres = array();
							foreach($resItems as $resI){
								$cardI = $resI;
								
								$projItem->setProjItemId($resI['projItemId']);
								$name = $projItem->GetNameById();
								
								$projLevel->setProjLevelId($resI['projLevelId']);
								$cardI['level'] = $projLevel->GetLevelById();
								
								$projLevel->setProjLevelId($resI['projLevelId2']);
								$cardI['level2'] = $projLevel->GetLevelById();
								
								$cardI['name'] = $name;
								$items[] = $name;
								
								$torres[] = $cardI;					
							}
											
							$cardC2['torre'] = implode(', ',$items);
							$cardC2['torres'] = $torres;
							
							$supplier->setSupplierId($v['supplierId']);
							$cardC2['supplier'] = $supplier->GetNameById();
							
							$cuantificacion->setCuantificacionId($v['cuantificacionId']);
							$resTypeAreas = $cuantificacion->GetTypeAreas();
		
							$nomTypes = array();
							foreach($resTypeAreas as $a){					
								$projType->setProjTypeId($a['projTypeId']);
								$nomTypes[] = $projType->GetNameById();
							}
							
							$cardC2['type'] = implode(', ',$nomTypes);
							
														
							$concept->setConceptId($valC['conceptId']);
							$infCC = $concept->Info();
							$cardC2['tipo'] = $infCC['tipo'];
							
							$unit->setUnitId($infCC['unitId']);
							$cardC2['unit'] = $unit->GetClaveById();
							
							$cuants[] = $cardC2;
							
						}//foreach resCuants
						
						$cardC['cuants'] = $cuants;				
						$concepts[] = $cardC;
										
					}//foreach resConcepts	
												
					$cardS['concepts'] = $concepts;			
					$subcategories[] = $cardS;
					
				}//foreach resSubcats
				
				$card['subcategories2'] = $subcategories;
				
				/*****/
				
				$categories[] = $card;
				
			}//foreach resCategories
			
			
			echo 'ok[#]';
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion.tpl');
			
		break;
	
}

?>
