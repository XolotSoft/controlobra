<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
				
	$projectId = $_SESSION['curProjId'];
	
	$project->setProjectId($projectId);
	$projects = $project->EnumOne();	
	
	$items = array();
	foreach($projects['items'] as $res){
		$card = $res;
		
		//Obtenemos las Torres
		$cuantificacion->setProjectId($projectId);
		$resItems = $cuantificacion->EnumItemsByProj();
		
		$totalGral = 0;
		$torres = array();
		foreach($resItems as $t){
			
			$projItem->setProjItemId($t['projItemId']);
			$t['name'] = $projItem->GetNameById();
			
			//Obtenemos los Tipos de Area
			$cuantificacion->setProjItemId($t['projItemId']);
			$resAreas = $cuantificacion->EnumAreasByItemAndProj();
			
			$totalTorre = 0;
			$areas = array();
			foreach($resAreas as $a){
				
				$projType->setProjTypeId($a['projTypeId']);
				$a['name'] = $projType->GetNameById();
				
				//Obtenemos las Categorias (Partidas)
				$cuantificacion->setProjTypeId($a['projTypeId']);
				$resPartidas = $cuantificacion->EnumAreasCatByItemAndProj();
				
				$totalPart = 0;
				$partidas = array();
				foreach($resPartidas as $p){
					
					$category->setCategoryId($p['categoryId']);
					$p['name'] = $category->GetNameById();
					
					//Obtenemos las Subcategorias (Subpartidas)
					$cuantificacion->setCategoryId($p['categoryId']);
					$resSubpartidas = $cuantificacion->EnumAreasSubcatByItemAndProj();
					
					$totalSub = 0;
					$subpartidas = array();
					foreach($resSubpartidas as $sp){
						
						$subcategory->setSubcategoryId($sp['subcategoryId']);
						$sp['name'] = $subcategory->GetNameById();
						
						//Obtenemos los Conceptos
						$cuantificacion->setSubcategoryId($sp['subcategoryId']);
						$resConceptos = $cuantificacion->EnumAreasConceptByItemAndProj();
						
						$totalConcept = 0;
						$conceptos = array();
						foreach($resConceptos as $c){
							
							$conceptCon->setConceptConId($c['conceptConId']);
							$c['name'] = $conceptCon->GetNameById();
							
							//Obtenemos las descripciones
							$cuantificacion->setConceptConId($c['conceptConId']);
							$resDescripciones = $cuantificacion->EnumDescripciones();
							
							$totalDesc = 0;
							$descripciones = array();
							foreach($resDescripciones as $d){
								
								//**********************************
								
								$cuantificacion->setConceptId($d['conceptId']);
								$cantidad = $cuantificacion->GetTotalQtyConcept();
								
								$d['cantidad'] = $cantidad;
								
								$concept->setConceptId($d['conceptId']);
								$infC = $concept->Info();
								
								$unit->setUnitId($infC['unitId']);
								$d['unit'] = $unit->GetClaveById();								
								
								if($d['tipo'] == 'Obra'){
								
									$conceptMat->setConceptId($d['conceptId']);
									$total = $conceptMat->GetTotalPrice();
									
									$d['price'] = $total;
									
									$total *= $cantidad;
									$d['total'] = $total;
									
									$resMaterials = $conceptMat->EnumerateAll();
									$materiales = array();
									foreach($resMaterials as $m){
										$matPrice->setMaterialId($m['materialId']);
										$infP = $matPrice->GetMatPriceDefault();
										
										$material->setMaterialId($m['materialId']);
										$infM = $material->Info();
										
										$unit->setUnitId($infM['unitId']);
										$m['unit'] = $unit->GetClaveById();
										
										$m['price'] = $infP['price'];
										
										$totalM = $infP['price'] * $m['quantity'];
										$totalM *= $cantidad;
										
										$m['quantity'] *= $cantidad;
										
										$m['total'] = $totalM;
																		
										$materiales[] = $m;
										
										
									}
									$d['materiales'] = $materiales;
								
								}elseif($d['tipo'] == 'Servicio'){
				
									$cuantificacion->setProjectId($projectId);
									$cuantificacion->setConceptId($d['conceptId']);
									$infP = $cuantificacion->InfoByConceptId();
			
									$price = $infP['unitPrice'];
									$d['price'] = $price;
									
									$total = $price * $cantidad;						
									$d['total'] = $total;
								
								}else{
									
									$conceptPrice->setConceptId($d['conceptId']);
									$infP = $conceptPrice->GetPriceDefault();
													
									$total = $infP['price'];
									
									$d['price'] = $total;
									
									$materiales = array();
									
									$supplier->setSupplierId($infP['supplierId']);
									$card['material'] = utf8_encode($supplier->GetNameById());
									
									$card['quantity'] = 1;
									
									$card['price'] = $infP['price'];
									
									$totalM = $infP['price'] * $card['quantity'];
									$totalM *= $cantidad;
									
									$total = $totalM;
									
									$card['quantity'] *= $cantidad;
									
									$card['total'] = $totalM;
									
									$materiales[] = $card;
									
									$d['materiales'] = $materiales;
									$d['total'] = $totalM;
									
								}
								
								$totalDesc += $total;
								
								//**********************************
								
								$descripciones[] = $d;
								
							}//foreach > resDescripciones
							
							$totalConcept += $totalDesc;
							
							$c['descripciones'] = $descripciones;
							$c['total'] = $totalDesc;
							
							$conceptos[] = $c;
							
						}//foreach resConceptos
						
						$totalSub += $totalConcept;
						
						$sp['conceptos'] = $conceptos;
						$sp['total'] = $totalConcept;
												
						$subpartidas[] = $sp;
						
					}//foreach > resSubpartidas	
					
					$totalPart += $totalSub;
					
					$p['subpartidas'] = $subpartidas;
					$p['total'] = $totalSub;
					
					$partidas[] = $p;
					
				}//foreach > resPartidas
				
				$totalTorre += $totalPart;
				
				$a['partidas'] = $partidas;
				$a['total'] = $totalPart;
				
				$areas[] = $a;
				
			}//foreach > resAreas
			
			$totalGral += $totalTorre;
			
			$t['areas'] = $areas;
			$t['total'] = $totalTorre;
			
			$torres[] = $t;
						
		}//foreach > resItems		
		
		$card['torres'] = $torres;
		$card['total'] = $totalGral;
		
		$items[] = $card;
				
	}//foreach projects['items']
	
	$projects['items'] = $items;
	
	//Obtenemos las Torres
	$project->setProjectId($projectId);
	$items = $project->EnumItem();
	
	//Obtenemos los Tipos de Area
	$projType->setProjectId($projectId);									
	$areas = $projType->EnumerateAll();
	
	$categorias = $category->EnumerateAll();
			
	$smarty->assign('showPrecio', 1);
	$smarty->assign('items', $items);
	$smarty->assign('areas', $areas);
	$smarty->assign('categorias', $categorias);	
	$smarty->assign('projectId', $projectId);
	$smarty->assign('projects', $projects);
	$smarty->assign('mainMnu','resumenes');
			
?>