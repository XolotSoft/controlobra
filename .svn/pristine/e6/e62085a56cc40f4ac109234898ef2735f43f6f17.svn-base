<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$project->setProjectId($_SESSION['curProjId']);
	$projects = $project->EnumOne();	
	
	$items = array();
	foreach($projects['items'] as $res){
		$card = $res;
					
		$cuantificacion->setProjectId($res['projectId']);
		$resCategories = $cuantificacion->EnumCatsByProject();
				
		$total2 = 0;
		$categories = array();	
		foreach($resCategories as $res2){
			$card2 = $res2;
			
			$cuantificacion->setCategoryId($res2['categoryId']);
			$resSubcats = $cuantificacion->EnumSubcatsByProj();
			
			$total3 = 0;
			$subcategories = array();
			foreach($resSubcats as $res3){
				$card3 = $res3;
				
				$cuantificacion->setSubcategoryId($res3['subcategoryId']);
				$resConcepts = $cuantificacion->EnumConcepts2ByProj();
				
				$total4 = 0;
				$concepts = array();
				foreach($resConcepts as $res4){
					$card4 = $res4;
					
					$cuantificacion->setConceptConId($res4['conceptConId']);
					$resDesc = $cuantificacion->EnumConceptsByProjRes();
					
					$totCant5 = 0;
					$total5 = 0;					
					$descriptions = array();
					foreach($resDesc as $res5){
						
						$cuantificacion->setConceptId($res5['conceptId']);
						$cantidad = $cuantificacion->GetTotalQtyConcept2();
												
						$concept->setConceptId($res5['conceptId']);
						$infC = $concept->Info();
						
						$unit->setUnitId($infC['unitId']);
						$res5['unit'] = $unit->GetClaveById();
						
						if($res5['tipo'] == 'Obra'){
						
							$conceptMat->setConceptId($res5['conceptId']);
							$total = $conceptMat->GetTotalPrice();
							
							$res5['price'] = $total;
							
							$total *= $cantidad;
							$res5['total'] = $total;
							
							$resMaterials = $conceptMat->EnumerateAll();
							
							$materials = array();
							foreach($resMaterials as $m){
								$matPrice->setMaterialId($m['materialId']);
								$infP = $matPrice->GetMatPriceDefault();
								
								$material->setMaterialId($m['materialId']);
								$infM = $material->Info();
								
								$unit->setUnitId($infM['unitId']);
								$m['unit'] = $unit->GetClaveById();
								
								$m['price'] = '$'.$infP['price'];
								
								$totalM = $infP['price'] * $m['quantity'];
								$totalM *= $cantidad;
								
								$m['quantity'] *= $cantidad;
								
								$m['total'] = $totalM;
																
								$materials[] = $m;
							}
							$res5['materials'] = $materials;
						
						}elseif($res5['tipo'] == 'Servicio'){
						
							$cuantificacion->setProjectId($res['projectId']);
							$cuantificacion->setConceptId($res5['conceptId']);
							$infP = $cuantificacion->InfoByConceptId();
	
							$price = $infP['unitPrice'];
							$res5['price'] = $price;
							
							$total = $price * $cantidad;						
							$res5['total'] = $total;
														
						}else{
							
							$conceptPrice->setConceptId($res5['conceptId']);
							$infP = $conceptPrice->GetPriceDefault();
											
							$total = $infP['price'];
							
							$res5['price'] = $total;
							
							$materials = array();
							
							$supplier->setSupplierId($infP['supplierId']);
							$card['material'] = $supplier->GetNameById();
							
							$card['quantity'] = 1;
							
							$card['price'] = $infP['price'];
							
							$totalM = $infP['price'] * $card['quantity'];
							$totalM *= $cantidad;
							
							$total = $totalM;
							
							$card['quantity'] *= $cantidad;
							
							$card['total'] = $totalM;
							
							$materials[] = $card;
							
							$res5['materials'] = $materials;
							$res5['total'] = $totalM;
							
						}
						
						$res5['cantidad'] = $cantidad;
						
						$totCant5 += $cantidad;
						
						$total5 += $total;
						$descriptions[] = $res5;
						
					}
					
					$total4 += $total5;
															
					$card4['descriptions'] = $descriptions;					
					$card4['total'] = $total5;
										
					$concepts[] = $card4;
					
				}//foreach resConcepts
								
				$card3['concepts'] = $concepts;				
				
				/************ Conceptos sin Conceptos *******************/
				
				$concepts = array();				
								
				$cuantificacion->setConceptConId($res4['conceptConId']);
				$resDesc = $cuantificacion->EnumConcepts0ByProjRes();
				
				$totCant5 = 0;						
				$total5 = 0;					
				$descriptions = array();
				foreach($resDesc as $res5){
					
					$cuantificacion->setConceptId($res5['conceptId']);
					$cantidad = $cuantificacion->GetTotalQtyConcept2();
					
					$concept->setConceptId($res5['conceptId']);
					$infC = $concept->Info();
					
					$unit->setUnitId($infC['unitId']);
					$res5['unit'] = $unit->GetClaveById();
					
					if($res5['tipo'] == 'Obra'){
					
						$conceptMat->setConceptId($res5['conceptId']);
						$total = $conceptMat->GetTotalPrice();
						
						$res5['price'] = $total;
						
						$total *= $cantidad;
						$res5['total'] = $total;
						
						$resMaterials = $conceptMat->EnumerateAll();
						
						$materials = array();
						foreach($resMaterials as $m){
							$matPrice->setMaterialId($m['materialId']);
							$infP = $matPrice->GetMatPriceDefault();
							
							$material->setMaterialId($m['materialId']);
							$infM = $material->Info();
							
							$unit->setUnitId($infM['unitId']);
							$m['unit'] = $unit->GetClaveById();
							
							$m['price'] = '$'.$infP['price'];
							
							$totalM = $infP['price'] * $m['quantity'];
							$totalM *= $cantidad;
							
							$m['quantity'] *= $cantidad;
							
							$m['total'] = $totalM;
															
							$materials[] = $m;
						}
						$res5['materials'] = $materials;
					
					}elseif($res5['tipo'] == 'Servicio'){
						
						$cuantificacion->setProjectId($res['projectId']);
						$cuantificacion->setConceptId($res5['conceptId']);
						$infP = $cuantificacion->InfoByConceptId();

						$price = $infP['unitPrice'];
						$res5['price'] = $price;
						
						$total = $price * $cantidad;						
						$res5['total'] = $total;
														
					}else{
						
						$conceptPrice->setConceptId($res5['conceptId']);
						$infP = $conceptPrice->GetPriceDefault();
										
						$total = $infP['price'];
						
						$res5['price'] = $total;
						
						$materials = array();
						
						$supplier->setSupplierId($infP['supplierId']);
						$card['material'] = $supplier->GetNameById();
						
						$card['quantity'] = 1;
						
						$card['price'] = '$'.$infP['price'];
						
						$totalM = $infP['price'] * $card['quantity'];
						$totalM *= $cantidad;
						
						$total = $totalM;
						
						$card['quantity'] *= $cantidad;
						
						$card['total'] = $totalM;
						
						$materials[] = $card;
						
						$res5['materials'] = $materials;
						$res5['total'] = $totalM;
						
					}
					
					$res5['cantidad'] = $cantidad;
					
					$totCant5 += $cantidad;
					
					$total5 += $total;
					$descriptions[] = $res5;
					
				}//foreach resDesc
				
				$total4 += $total5;
				
				$card4['descriptions'] = $descriptions;					
				$card4['total'] = $total5;
									
				$concepts[] = $card4;			
				
				$total3 += $total4;
				
				if(count($descriptions))
					$card3['concepts2'] = $concepts;			
				
				/************* Fin Conceptos Sin Conceptos **********/
				
				$card3['total'] = $total4;
				$subcategories[] = $card3;
				
			}//foreach resSubcats
														
			$card2['subcategories'] = $subcategories;			
			
			/***** Conceptos Sin Subcategorias *****/
			
			$card3 = array();
			$subcategories = array();
			
			$total4 = 0;
			$concepts = array();
						
			$cuantificacion->setConceptConId($res4['conceptConId']);
			$resDesc = $cuantificacion->EnumConcepts00ByProjRes();
			
			$totCant5 = 0;
			$total5 = 0;					
			$descriptions = array();
			foreach($resDesc as $res5){
				
				$cuantificacion->setConceptId($res5['conceptId']);
				$cantidad = $cuantificacion->GetTotalQtyConcept2();
				
				$concept->setConceptId($res5['conceptId']);
				$infC = $concept->Info();
				
				$unit->setUnitId($infC['unitId']);
				$res5['unit'] = $unit->GetClaveById();
				
				if($res5['tipo'] == 'Obra'){
				
					$conceptMat->setConceptId($res5['conceptId']);
					$total = $conceptMat->GetTotalPrice();
					
					$res5['price'] = $total;
					
					$total *= $cantidad;
					$res5['total'] = $total;
					
					$resMaterials = $conceptMat->EnumerateAll();
					
					$materials = array();
					foreach($resMaterials as $m){
						$matPrice->setMaterialId($m['materialId']);
						$infP = $matPrice->GetMatPriceDefault();
						
						$material->setMaterialId($m['materialId']);
						$infM = $material->Info();
						
						$unit->setUnitId($infM['unitId']);
						$m['unit'] = $unit->GetClaveById();
						
						$m['price'] = '$'.$infP['price'];
						
						$totalM = $infP['price'] * $m['quantity'];
						$totalM *= $cantidad;
						
						$m['quantity'] *= $cantidad;
						
						$m['total'] = $totalM;
														
						$materials[] = $m;
					}
					$res5['materials'] = $materials;
				
				}elseif($res5['tipo'] == 'Servicio'){
					
					$cuantificacion->setProjectId($res['projectId']);
					$cuantificacion->setConceptId($res5['conceptId']);
					$infP = $cuantificacion->InfoByConceptId();

					$price = $infP['unitPrice'];
					$res5['price'] = $price;
					
					$total = $price * $cantidad;						
					$res5['total'] = $total;
					
				}else{
					
					$conceptPrice->setConceptId($res5['conceptId']);
					$infP = $conceptPrice->GetPriceDefault();
									
					$total = $infP['price'];
					
					$res5['price'] = $total;
					
					$materials = array();
					
					$supplier->setSupplierId($infP['supplierId']);
					$card['material'] = $supplier->GetNameById();
					
					$card['quantity'] = 1;
					
					$card['price'] = $infP['price'];
					
					$totalM = $infP['price'] * $card['quantity'];
					$totalM *= $cantidad;
					
					$total = $totalM;
					
					$card['quantity'] *= $cantidad;
					
					$card['total'] = $totalM;
					
					$materials[] = $card;
					
					$res5['materials'] = $materials;
					$res5['total'] = $totalM;
					
				}
				
				$res5['cantidad'] = $cantidad;
				
				$totCant5 += $cantidad;
				
				$total5 += $total;
				$descriptions[] = $res5;
				
			}//foreach resDesc
			
			$total4 += $total5;
													
			$card4['descriptions'] = $descriptions;					
			$card4['total'] = $total5;
								
			$concepts[] = $card4;			
			
			$total3 += $total4;
											
			$card3['concepts2'] = $concepts;				
			$card3['total'] = $total4;			
			
			if(count($descriptions))
				$subcategories[] = $card3;			
			
			$total2 += $total3;			
									
			$card2['subcategories2'] = $subcategories;			
			$card2['total'] = $total3;
			
			/*** Fin Conceptos Sin Subcategorias ***/
			
			$categories[] = $card2;
			
		}//foreach resCategories
		
		$card['categories'] = $categories;
		$card['cantidad'] = $totCant2;
		$card['total'] = $total2;
		
		$items[] = $card;
		
	}//foreach projects['items']
	$projects['items'] = $items;
	
	$categorias = $category->EnumerateAll();
	
	$project->setProjectId($_SESSION['curProjId']);
	$info = $project->Info();
	
	$smarty->assign('showPrecio', 1);
	$smarty->assign('info', $info);
	$smarty->assign('categorias', $categorias);
	$smarty->assign('projects', $projects);
	$smarty->assign('mainMnu','resumenes');
			
?>