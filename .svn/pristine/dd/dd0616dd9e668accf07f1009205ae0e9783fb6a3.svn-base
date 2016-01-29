<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['cuantP'] = $p;
	
	$projectId = $_SESSION['curProjId'];
	
	$cuantificacion->setProjectId($projectId);	
	$resCategories = $cuantificacion->EnumCatsByProject();
	
	$categories = array();	
	foreach($resCategories as $res){
		$card = $res;
		
		$cuantificacion->setCategoryId($res['categoryId']);
		$resSubcats = $cuantificacion->EnumSubcatsByProj();
				
		$subcategories = array();
		foreach($resSubcats as $val){
			$cardS = $val;
			
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
					
					$cardC2['ejes'] = $ejes;
					
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
					
					$cardC2['ejes'] = $ejes;
					
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
		
		$card['subcategories2'] = $subcategories;
		
		/*****/
		
		$categories[] = $card;
		
	}//foreach resCategories
	
	$_SESSION['matsAcero'] = '';
	unset($_SESSION['matsAcero']);
	
	$categorias = $category->EnumerateAll();
	$suppliers = $supplier->EnumerateByType('Contratista');
	
	//Obtenemos las Torres
	$projItem->setProjectId($projectId);
	$items = $projItem->EnumerateAll();
	
	//Obtenemos los Tipos de Area		
	$projType->setProjectId($projectId);									
	$types = $projType->EnumerateAll();
		
	$smarty->assign('types',$types);
	$smarty->assign('items',$items);
	$smarty->assign('categorias',$categorias);
	$smarty->assign('suppliers',$suppliers);
	
	$smarty->assign('categories', $categories);
	$smarty->assign('mainMnu','cuantificacion');

?>