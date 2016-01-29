<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['cuantP'];
$projectId = $_SESSION['curProjId'];

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
		
		$concept->setConceptId($conceptId);
		$infC = $concept->Info();
		$tipo = $infC['tipo'];
		
		$conceptPrice->setConceptId($conceptId);
		$infPr = $conceptPrice->GetPriceDefault();
		$info['supplierId'] = $infPr['supplierId'];
		
		if($info['supplierId']){
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
		}
		
		//Obtenemos los Conceptos de Acero
		$concepts = $concept->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
		
		//Obtenemos las Unidades
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
				
		//Obtenemos las Torres
		$project->setProjectId($projectId);
		$items = $project->EnumItem();
		if($items)
			$items = $util->EncodeResult($items);
				
			
				
		$smarty->assign('isSteel', 1);
		$smarty->assign('tipo', $tipo);														
		$smarty->assign('items', $items);			
		$smarty->assign('units', $units);		
		$smarty->assign('concepts', $concepts);
		$smarty->assign('suppliers', $suppliers);
		$smarty->assign('infP', $infP);
		$smarty->assign('info', $info);
		
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-cuant-acero-popup.tpl');
				
		break;
	
	case 'saveAddCuantificacion':				
		
		$qtyArea = $_POST['qtyConcept'];
		$areasQty = $_POST['areasQty'];
		
		$cuantificacion->setSteel(1);
		$cuantificacion->setProjectId($_POST['projectId']);
		$cuantificacion->setSupplierId($_POST['supplierId']);	
		$cuantificacion->setConceptId($_POST['conceptId']);
		$cuantificacion->setQtyConcept($_POST['qtyConcept']);
				
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
				$resCuants = $cuantificacion->ExistCuantificacion();
								
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
				
				$projLevel->setProjItemId($id);
				$resLevels = $projLevel->GetLevelsByLimit($card['projLevelId'],$card['projLevelId2']);
				foreach($resLevels as $lev){
					if(in_array($lev['projLevelId'],$levels)){						
						$util->setError(10026, 'error', '', '');
						$util->PrintErrors();
						$continue = false;
						break;
					}
				}
												
				$cuantItem->setProjLevelId($card['projLevelId']);
				$cuantItem->setProjLevelId2($card['projLevelId2']);
				$cuantItem->setTotalLevel($card['totalLevel']);
								
				if(!$cuantItem->SaveTemp())
					$continue = false;
				
				$items[] = $card;
			}
			
			//Guardamos los materiales
								
			$conceptMatId = $_POST['conceptMatId'];
			$traslapes = $_POST['traslapes'];
			$bulbos = $_POST['bulbos'];
			$quantity = $_POST['quantity'];
			$mtoLineal = $_POST['mtoLineal'];
			$weight = $_POST['weight'];
			$totalWeight = $_POST['totalWeight'];
						
			if(!count($conceptMatId))
				$conceptMatId = array();
			
			$continue = true;
			$materials = array();			
			foreach($conceptMatId as $k => $val){
				
				$card['conceptMatId'] = $conceptMatId[$k];
				$card['traslape'] = $traslapes[$k];
				$card['bulbos'] = $bulbos[$k];
				$card['quantity'] = $quantity[$k];
				$card['mtoLineal'] = $mtoLineal[$k];
				$card['weight'] = $weight[$k];
				$card['totalWeight'] = $totalWeight[$k];
															
				$cuantMat->setConceptMatId($card['conceptMatId']);
				$cuantMat->setQuantity($card['quantity']);
				$cuantMat->setMtoLineal($card['mtoLineal']);
				
				if(!$cuantMat->SaveTemp())
					$continue = false;
				
				$materials[$k] = $card;
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
		for($k=0; $k<$areasQty; $k++){
			
			$projEjeLId = $_POST['projEjeLId_'.$k];
			$projEjeL2Id = $_POST['projEjeL2Id_'.$k];
			
			if($projEjeLId == '' && $projEjeL2Id == ''){				
				$cuantificacion->setProjEjeId('');
				break;				
			}
			
			$projEjeNId = $_POST['projEjeNId_'.$k];
			$projEjeN2Id = $_POST['projEjeN2Id_'.$k];
			
			if($projEjeNId == '' && $projEjeN2Id == ''){
				$cuantificacion->setProjEjeId('');
				break;				
			}
			
			$card['projEjeNId'] = $projEjeNId;
			$card['projEjeLId'] = $projEjeLId;
			
			$card['projEjeN2Id'] = $projEjeN2Id;
			$card['projEjeL2Id'] = $projEjeL2Id;
			
			$ejes[] = $card;						
		}
		
		$cuantificacion->setEjes($ejes);
		
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
						
			//Guardamos los materiales
			$cuantMat->setCuantificacionId($cuantificacionId);
			foreach($materials as $val){
																			
				$cuantMat->setConceptMatId($val['conceptMatId']);
				$cuantMat->setTraslape($val['traslape']);
				$cuantMat->setBulbos($val['bulbos']);
				$cuantMat->setQuantity($val['quantity']);
				$cuantMat->setMtoLineal($val['mtoLineal']);
				$cuantMat->setWeight($val['weight']);
				$cuantMat->setTotalWeight($val['totalWeight']);
				
				$cuantMat->Save();
							
			}
			
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
	
	case 'editCuantificacion': 
		
		if(!$projectId){			
			$util->setError(10024, 'error', '', $field);
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;		  
		}
		
		$cuantificacionId = $_POST['cuantificacionId'];		
		
		$cuantificacion->setCuantificacionId($cuantificacionId);
		$info = $cuantificacion->Info();
		
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
		
		if($info['supplierId']){
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
		}
		
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
		
		$concept->setConceptId($info['conceptId']);
		$infC = $concept->Info();
		$tipo = $infC['tipo'];
		
		//Obtenemos los Conceptos de Acero
		$concepts = $concept->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
		
		//Obtenemos las Unidades
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
				
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
		
		//Obtenemos los Ejes
		
		$projEje->setProjectId($projectId);									
		$ejes = $projEje->EnumerateL();
		$ejesL = $util->EncodeResult($ejes);
		
		$ejes = $projEje->EnumerateN();
		$ejesN = $util->EncodeResult($ejes);
			
		$ejes = $cuantificacion->InfoEjes();		
		$areas = count($ejes);
		
		//Obtenemos los Materiales
		
		$matsAcero = $cuantificacion->EnumMaterials();		
		$_SESSION['matsAcero'] = $matsAcero;
		
		$conceptMat->setConceptId($info['conceptId']);
		$mats = $conceptMat->EnumerateAll();
		$materials = $util->EncodeResult($mats);	
		
		//Obtenemos los Contratistas para el proyecto
		
		$supplier->setProjectId($projectId);
		$suppliers = $supplier->GetSupplierByProj();			
		if($suppliers)
			$suppliers = $util->EncodeResult($suppliers);		
		
		$smarty->assign('isSteel', 1);
		$smarty->assign('tipo', $tipo);														
		$smarty->assign('items', $items);			
		$smarty->assign('units', $units);		
		$smarty->assign('concepts', $concepts);
		$smarty->assign('suppliers', $suppliers);
		$smarty->assign('infP', $infP);
		$smarty->assign('info', $info);
		$smarty->assign('torres',$torres);					
		$smarty->assign('levels', $levels);
		$smarty->assign('areas', $areas);
		$smarty->assign('ejes', $ejes);
		$smarty->assign('ejesL', $ejesL);
		$smarty->assign('ejesN', $ejesN);
		$smarty->assign('matsAcero', $matsAcero);
		$smarty->assign('materials', $materials);
		
		echo 'ok[#]';
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-cuant-acero-popup.tpl');
				
		break;
	
	case 'saveEditCuantificacion';
			
			$cuantificacionId = $_POST['id'];
			$qtyArea = $_POST['qtyConcept'];
			$areasQty = $_POST['areasQty'];
			
			$cuantificacion->setSteel(1);
			$cuantificacion->setCuantificacionId($cuantificacionId);
			$cuantificacion->setProjectId($_POST['projectId']);
			$cuantificacion->setSupplierId($_POST['supplierId']);	
			$cuantificacion->setConceptId($_POST['conceptId']);
			$cuantificacion->setQtyConcept($_POST['qtyConcept']);
			
			$cuantificacion->setSubtotal($_POST['subtotal']);
			$cuantificacion->setTotal($_POST['total']);
									
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
					$resCuants = $cuantificacion->ExistCuantificacion();
									
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
					
					$projLevel->setProjItemId($id);
					$resLevels = $projLevel->GetLevelsByLimit($card['projLevelId'],$card['projLevelId2']);
					foreach($resLevels as $lev){
						if(in_array($lev['projLevelId'],$levels)){						
							$util->setError(10026, 'error', '', '');
							$util->PrintErrors();
							$continue = false;
							break;
						}
					}
													
					$cuantItem->setProjLevelId($card['projLevelId']);
					$cuantItem->setProjLevelId2($card['projLevelId2']);
					$cuantItem->setTotalLevel($card['totalLevel']);
									
					if(!$cuantItem->SaveTemp())
						$continue = false;
					
					$items[] = $card;
				}
				
				//Guardamos los materiales
									
				$idCuanMat = $_POST['idCuanMat'];
				$conceptMatId = $_POST['conceptMatId'];
				$traslapes = $_POST['traslapes'];
				$bulbos = $_POST['bulbos'];
				$quantity = $_POST['quantity'];
				$mtoLineal = $_POST['mtoLineal'];
				$weight = $_POST['weight'];
				$totalWeight = $_POST['totalWeight'];
							
				if(!count($conceptMatId))
					$conceptMatId = array();
				
				$continue = true;
				$card = array();
				$materials = array();			
				foreach($conceptMatId as $k => $val){
					
					$card['cuantMatId'] = $idCuanMat[$k];
					$card['conceptMatId'] = $conceptMatId[$k];
					$card['traslape'] = $traslapes[$k];
					$card['bulbos'] = $bulbos[$k];
					$card['quantity'] = $quantity[$k];
					$card['mtoLineal'] = $mtoLineal[$k];
					$card['weight'] = $weight[$k];
					$card['totalWeight'] = $totalWeight[$k];
																
					$cuantMat->setConceptMatId($card['conceptMatId']);
					$cuantMat->setQuantity($card['quantity']);
					$cuantMat->setMtoLineal($card['mtoLineal']);
					
					if(!$cuantMat->SaveTemp())
						$continue = false;
					
					$materials[$k] = $card;
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
			for($k=0; $k<$areasQty; $k++){
				
				$projEjeLId = $_POST['projEjeLId_'.$k];
				$projEjeL2Id = $_POST['projEjeL2Id_'.$k];
				
				if($projEjeLId == '' && $projEjeL2Id == ''){				
					$cuantificacion->setProjEjeId('');
					break;				
				}
				
				$projEjeNId = $_POST['projEjeNId_'.$k];
				$projEjeN2Id = $_POST['projEjeN2Id_'.$k];
				
				if($projEjeNId == '' && $projEjeN2Id == ''){
					$cuantificacion->setProjEjeId('');
					break;				
				}
				
				$card['projEjeNId'] = $projEjeNId;
				$card['projEjeLId'] = $projEjeLId;
				
				$card['projEjeN2Id'] = $projEjeN2Id;
				$card['projEjeL2Id'] = $projEjeL2Id;
				
				$ejes[] = $card;						
			}
			
			$cuantificacion->setEjes($ejes);
			
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
				
				//Guardamos los materiales
				$idsCuantMat = array();
				$cuantMat->setCuantificacionId($cuantificacionId);
				foreach($materials as $val){
					
					$cuantMatId = $val['idCuantMat'];
					
					$cuantMat->setCuantMatId($cuantMatId);
					$cuantMat->setConceptMatId($val['conceptMatId']);
					$cuantMat->setTraslape($val['traslape']);
					$cuantMat->setBulbos($val['bulbos']);
					$cuantMat->setQuantity($val['quantity']);
					$cuantMat->setMtoLineal($val['mtoLineal']);
					$cuantMat->setWeight($val['weight']);
					$cuantMat->setTotalWeight($val['totalWeight']);
					
					if($cuantMatId)
						$cuantMat->Update();
					else
						$cuantMatId = $cuantMat->Save();
					
					$idsCuantMat[] = $cuantMatId;		
				}
				
				//Borramos los Materiales que no fueron usados
				$cuantMatIds = implode(',',$idsCuantMat);
				$cuantMat->DeleteItems($cuantMatIds);
				
			}
			
			$util->setError(10073,'complete');
			$util->PrintErrors();
			
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
		$info['concept'] = $concept->GetNameById();
		
		$projLevel->setProjLevelId($info['projLevelId']);
		$info['level'] = $projLevel->GetLevelById();
		
		$projLevel->setProjLevelId($info['projLevelId2']);
		$info['level2'] = $projLevel->GetLevelById();
				
		$unit->setUnitId($info['unitId']);
		$info['unit'] = $unit->GetClaveById();
		
		//Obtenemos los Materiales
		
		$resMats = $cuantificacion->EnumMaterials();
		
		$matsAcero = array();
		foreach($resMats as $res){
			$card = $res;
			
			$conceptMat->setConceptMatId($res['conceptMatId']);
			$inf2 = $conceptMat->Info();
			
			$material->setMaterialId($inf2['materialId']);
			$card['material'] = $material->GetNameById();
			
			$matsAcero[] = $card;
		}
		
		//Obtenemos los Ejes
		
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
		
		$info = $util->EncodeRow($info);
				
		$smarty->assign('info', $info);
		$smarty->assign('infP', $infP);
		$smarty->assign('torres', $torres);
		$smarty->assign('ejes', $ejes);
		$smarty->assign('matsAcero', $matsAcero);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/view-cuant-acero-popup.tpl');
		
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
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjLevelsAcero.tpl');
						
		break;
	
	case 'loadEjes':
			
			$projectId = $_POST['projectId'];					
			$qtyConcept = $_POST['qtyConcept'];
			$numTorres = $_POST['numTorres'];
											
			$projEje->setProjectId($projectId);									
			$ejes = $projEje->EnumerateL();
			$ejesL = $util->EncodeResult($ejes);
			
			$ejes = $projEje->EnumerateN();
			$ejesN = $util->EncodeResult($ejes);
						
			$areas = $qtyConcept * $numTorres;
						
			echo 'ok[#]';
			echo $areas;
			
			echo '[#]';
									
			$smarty->assign('areas', $areas);
			$smarty->assign('ejesL', $ejesL);
			$smarty->assign('ejesN', $ejesN);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumEjesByArea.tpl');
									
		break;
	
	case 'getWeight':
			
			$conceptMatId = $_POST['conceptMatId'];
			$mtoLineal = $_POST['mtoLineal'];
			
			$conceptMat->setConceptMatId($conceptMatId);
			$info = $conceptMat->Info();
			
			$material->setMaterialId($info['materialId']);
			$infM = $material->Info();
			
			$tipo = 'B';
			$traslape = 0;
			if($infM['traslape'] > 0){
				$traslape = floor($mtoLineal / 12);
				$tipo = 'T';
			}
			
			echo 'ok[#]';
			
			echo ($conceptMatId > 0) ? $infM['weight'] : 0;
						
			echo '[#]';	
			echo ($conceptMatId > 0) ? $infM['bulbos'] : 0;
			
			echo '[#]';
			echo ($conceptMatId > 0) ? $traslape : 0;
			
			echo '[#]';
			echo $tipo;
			
			echo '[#]';
			echo $infM['traslape'];
							
		break;
	
	/*** MATERIALS ***/
	
	case 'addMaterial':
			
			$conceptId = $_POST['conceptId'];
			$matsAcero = $_SESSION['matsAcero'];			
						
			$conceptMat->setConceptId($conceptId);
			$mats = $conceptMat->EnumerateAll();
			$materials = $util->EncodeResult($mats);				
			
			$card['conceptMatId'] = '';
			$card['traslape'] = 0;
			$card['traslapeVal'] = 0;
			$card['bulbos'] = 0;
			$card['quantity'] = 0;
			$card['mtoLineal'] = 0;
			$card['weight'] = 0;
			$card['totalWeight'] = 0;
			
			$matsAcero[] = $card;
			
			$_SESSION['matsAcero'] = $matsAcero;
						
			echo 'ok[#]';
			
			$smarty->assign('matsAcero', $matsAcero);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion-materials.tpl');
			
		break;
	
	case 'delMaterial':
			
			$k = $_POST['k'];
			$conceptId = $_POST['conceptId'];
			$matsAcero = $_SESSION['matsAcero'];
			
			unset($matsAcero[$k]);
			
			$_SESSION['matsAcero'] = $matsAcero;
			
			$conceptMat->setConceptId($conceptId);
			$mats = $conceptMat->EnumerateAll();
			$materials = $util->EncodeResult($mats);
						
			echo 'ok[#]';
			
			$smarty->assign('matsAcero', $matsAcero);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cuantificacion-materials.tpl');
				
		break;
	
	case 'saveMaterials':
			
			$idCuanMat = $_POST['idCuanMat'];			
			$conceptMatId = $_POST['conceptMatId'];
			$traslapes = $_POST['traslapes'];
			$traslapeVal = $_POST['traslapeVal'];
			$bulbos = $_POST['bulbos'];
			$quantity = $_POST['quantity'];
			$mtoLineal = $_POST['mtoLineal'];
			$weight = $_POST['weight'];
			$totalWeight = $_POST['totalWeight'];
						
			if(!count($conceptMatId))
				$conceptMatId = array();
					
			$materials = array();			
			foreach($conceptMatId as $k => $val){
				$card['conceptMatId'] = $val;
				$card['cuantMatId'] = $idCuanMat[$k];
				$card['traslape'] = $traslapes[$k];
				$card['traslapeVal'] = $traslapeVal[$k];
				$card['bulbos'] = $bulbos[$k];
				$card['quantity'] = $quantity[$k];
				$card['mtoLineal'] = $mtoLineal[$k];
				$card['weight'] = $weight[$k];
				$card['totalWeight'] = $totalWeight[$k];
								
				$materials[$k] = $card;
			}
			
			$_SESSION['matsAcero'] = $materials;
						
		break;
	
	case 'getSubtotal':
			
			$qtyConcept = $_POST['qtyConcept'];
			$totalWeight = $_POST['totalWeight'];			
			
			if(count($totalWeight) == 0)
				$totalWeight = array();
			
			$subtotal = 0;
			foreach($totalWeight as $val){
				$subtotal += $val;
			}
			
			$total = $subtotal * $qtyConcept;
			
			echo 'ok[#]';
			echo number_format($subtotal,2,'.','');
			
			echo '[#]';
			echo number_format($total,2,'.','');
			
		break;
		
}

?>
