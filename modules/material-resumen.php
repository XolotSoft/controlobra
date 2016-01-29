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
		$resCategories = $cuantificacion->EnumMatCatsByProject();
		
		$totCant2 = 0;
		$total2 = 0;
		$categories = array();	
		foreach($resCategories as $res2){
			$card2 = $res2;
			
			$cuantificacion->setCategoryId($res2['categoryId']);
			$resSubcats = $cuantificacion->EnumMatSubcatsByProj();
			
			$totCant3 = 0;
			$total3 = 0;
			$subcategories = array();
			foreach($resSubcats as $res3){
				$card3 = $res3;
				
				$cuantificacion->setSubcategoryId($res3['subcategoryId']);
				$resConcepts = $cuantificacion->EnumMatConceptsByProj();
				
				$totCant4 = 0;
				$total4 = 0;
				$concepts = array();
				foreach($resConcepts as $res4){
					$card4 = $res4;
					
					$cuantificacion->setConceptConId($res4['conceptConId']);
					$resDesc = $cuantificacion->EnumMatConceptsByProjRes();
										
					$totCant5 = 0;
					$total5 = 0;					
					$descriptions = array();
					foreach($resDesc as $res5){
											
						$matPrice->setMaterialId($res5['materialId']);
						$infMP = $matPrice->GetMatPriceDefault();
						$total = $infMP['price'];
						
						$material->setMaterialId($res5['materialId']);
						$infM = $material->Info();
						
						$unit->setUnitId($infM['unitId']);
						$res5['unit'] = $unit->GetClaveById();
						
						$res5['price'] = $infMP['price'];
						
						$cuantificacion->setMaterialId($res5['materialId']);
						$res5['cantidad'] = $cuantificacion->GetTotalMaterialRes2();
						
						$total *= $res5['cantidad'];
						
						$res5['total'] = $total;
						
						$total5 += $total;
						$totCant5 += $res5['cantidad'];
						
						$descriptions[] = $res5;
						
					}
					
					$total4 += $total5;
					$totCant4 += $totCant5;
															
					$card4['descriptions'] = $descriptions;
					$card4['cantidad'] = $totCant5;				
					$card4['total'] = $total5;
										
					$concepts[] = $card4;
					
				}//foreach resConcepts
				
				$card3['concepts'] = $concepts;				
				
				/************ Conceptos sin Conceptos *******************/
				
				$concepts = array();				
								
				$cuantificacion->setConceptConId($res4['conceptConId']);
				$resDesc = $cuantificacion->EnumMatConcepts0ByProjRes();
				
				$totCant5 = 0;						
				$total5 = 0;					
				$descriptions = array();
				foreach($resDesc as $res5){
					
					$matPrice->setMaterialId($res5['materialId']);
					$infMP = $matPrice->GetMatPriceDefault();
					$total = $infMP['price'];
					
					$material->setMaterialId($res5['materialId']);
					$infM = $material->Info();
					
					$unit->setUnitId($infM['unitId']);
					$res5['unit'] = $unit->GetClaveById();
					
					$res5['price'] = $infMP['price'];
					
					$cuantificacion->setMaterialId($res5['materialId']);
					$res5['cantidad'] = $cuantificacion->GetTotalMaterialRes2();
					
					$total *= $res5['cantidad'];
					
					$res5['total'] = $total;
					
					$total5 += $total;
					$totCant5 += $res5['cantidad'];
										
					$descriptions[] = $res5;
					
				}//foreach resDesc
				
				$total4 += $total5;
				$totCant4 += $totCant5;
				
				$card4['cantidad'] = $totCant5;	
				$card4['descriptions'] = $descriptions;					
				$card4['total'] = $total5;
									
				$concepts[] = $card4;			
				
				$total3 += $total4;
				$totCant3 += $totCant4;
				
				if(count($descriptions))
					$card3['concepts2'] = $concepts;			
				
				/************* Fin Conceptos Sin Conceptos **********/
				
				$card3['cantidad'] = $totCant4;
				$card3['total'] = $total4;
				$subcategories[] = $card3;
				
			}//foreach resSubcats
														
			$card2['subcategories'] = $subcategories;			
			
			/***** Conceptos Sin Subcategorias *****/
			
			$card3 = array();
			$subcategories = array();
			
			$totCant4 = 0;
			$total4 = 0;
			$concepts = array();
						
			$cuantificacion->setConceptConId($res4['conceptConId']);
			$resDesc = $cuantificacion->EnumMatConcepts00ByProjRes();
			
			$totCant5 = 0;
			$total5 = 0;					
			$descriptions = array();
			foreach($resDesc as $res5){
				
				$matPrice->setMaterialId($res5['materialId']);
				$infMP = $matPrice->GetMatPriceDefault();
				$total = $infMP['price'];
				
				$material->setMaterialId($res5['materialId']);
				$infM = $material->Info();
				
				$unit->setUnitId($infM['unitId']);
				$res5['unit'] = $unit->GetClaveById();
				
				$res5['price'] = $infMP['price'];
				
				$cuantificacion->setMaterialId($res5['materialId']);
				$res5['cantidad'] = $cuantificacion->GetTotalMaterialRes2();
				
				$total *= $res5['cantidad'];
				
				$res5['total'] = $total;
				
				$total5 += $total;
				$totCant5 += $res5['cantidad'];
				
				$descriptions[] = $res5;
				
			}//foreach resDesc
			
			$total4 += $total5;
			$totCant4 += $totCant5;
													
			$card4['descriptions'] = $descriptions;
			$card4['cantidad'] = $totCant5;					
			$card4['total'] = $total5;
								
			$concepts[] = $card4;			
			
			$total3 += $total4;
			$totCant3 += $totCant4;
											
			$card3['concepts2'] = $concepts;
			$card3['cantidad'] = $totCant4;
			$card3['total'] = $total4;			
			
			if(count($descriptions))
				$subcategories[] = $card3;			
			
			$total2 += $total3;
			$totCant2 += $totCant3;
									
			$card2['subcategories2'] = $subcategories;
			$card2['cantidad'] = $totCant3;				
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
	
	$smarty->assign('showPrecio', 1);
	$smarty->assign('categorias', $categorias);
	$smarty->assign('projects', $projects);
	$smarty->assign('mainMnu','resumenes');
			
?>