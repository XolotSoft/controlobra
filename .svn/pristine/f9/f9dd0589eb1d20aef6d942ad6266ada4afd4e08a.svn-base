<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['curProjId'];

if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{	
	case 'searchConcept':
			
			$conIva = $_POST['conIva'];
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
			$projTypeId = $_POST['projTypeId'];
			$categoryId = $_POST['categoryId2'];
			$subcategoryId = $_POST['subcategoryId2'];
			$conceptConId = $_POST['conceptConId2'];
			$conceptId = $_POST['conceptId2'];			
			$showPrecio = $_POST['showPrecio'];
			
			echo 'ok[#]';
			
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
					
					if($projItemId != '' && $projItemId != $t['projItemId'])
						continue;
						
					$projItem->setProjItemId($t['projItemId']);
					$t['name'] = $projItem->GetNameById();
					
					//Obtenemos los Tipos de Area
					$cuantificacion->setProjItemId($t['projItemId']);
					$resAreas = $cuantificacion->EnumAreasByItemAndProj();
					
					$totalTorre = 0;
					$areas = array();
					foreach($resAreas as $a){
						
						if($projTypeId != '' && $projTypeId != $a['projTypeId'])
							continue;
						
						$projType->setProjTypeId($a['projTypeId']);
						$a['name'] = $projType->GetNameById();
						
						//Obtenemos las Categorias (Partidas)
						$cuantificacion->setProjTypeId($a['projTypeId']);
						$resPartidas = $cuantificacion->EnumAreasCatByItemAndProj();
						
						$totalPart = 0;
						$partidas = array();
						foreach($resPartidas as $p){
							
							if($categoryId != '' && $categoryId != $p['categoryId'])
								continue;
							
							$category->setCategoryId($p['categoryId']);
							$p['name'] = utf8_encode($category->GetNameById());
							
							//Obtenemos las Subcategorias (Subpartidas)
							$cuantificacion->setCategoryId($p['categoryId']);
							$resSubpartidas = $cuantificacion->EnumAreasSubcatByItemAndProj();
							
							$totalSub = 0;
							$subpartidas = array();
							foreach($resSubpartidas as $sp){
								
								if($subcategoryId != '' && $subcategoryId != $sp['subcategoryId'])
									continue;
								
								$subcategory->setSubcategoryId($sp['subcategoryId']);
								$sp['name'] = utf8_encode($subcategory->GetNameById());
								
								//Obtenemos los Conceptos
								$cuantificacion->setSubcategoryId($sp['subcategoryId']);
								$resConceptos = $cuantificacion->EnumAreasConceptByItemAndProj();
								
								$totalConcept = 0;
								$conceptos = array();
								foreach($resConceptos as $c){
									
									if($conceptConId != '' && $conceptConId != $c['conceptConId'])
										continue;
									
									$conceptCon->setConceptConId($c['conceptConId']);
									$c['name'] = utf8_encode($conceptCon->GetNameById());
									
									//Obtenemos las descripciones
									$cuantificacion->setConceptConId($c['conceptConId']);
									$resDescripciones = $cuantificacion->EnumDescripciones();
									
									$totalDesc = 0;
									$descripciones = array();
									foreach($resDescripciones as $d){
										
										if($conceptId != '' && $conceptId != $d['conceptId'])
											continue;
										
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
												
												if($conIva)
													$infP['price'] = $infP['total'];
									
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
											
											if($conIva)
												$infP['price'] = $infP['total'];
								
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
										
										$d['name'] = utf8_encode($d['name']);
										
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
			
			$smarty->assign('showPrecio', $showPrecio);
			$smarty->assign('projects', $projects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/mat-resumen-item.tpl');
						
		break;		
	
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
						
			//Obtenemos las Torres
			$project->setProjectId($projectId);
			$items = $project->EnumItem();
			if($items)
				$items = $util->EncodeResult($items);
			
			//Obtenemos los Tipos de Area
			$projType->setProjectId($projectId);									
			$areas = $projType->EnumerateAll();
			if($areas)
				$areas = $util->EncodeResult($areas);
			
			echo 'ok[#]';
			
			$smarty->assign('items', $items);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItemArea.tpl');
			
			echo '[#]';
			
			$smarty->assign('areas', $areas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumAreasArea.tpl');
			
		break;
	
	case 'resetForm':
			
			//Obtenemos las Torres
			$project->setProjectId($projectId);
			$items = $project->EnumItem();
			
			//Obtenemos los Tipos de Area
			$projType->setProjectId($projectId);									
			$areas = $projType->EnumerateAll();
	
			$categorias = $category->EnumerateAll();
			$categorias = $util->EncodeResult($categorias);
			
			echo 'ok[#]';
			
			$smarty->assign('items', $items);
			$smarty->assign('areas', $areas);
			$smarty->assign('categorias', $categorias);	
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/forms/search-concept-area.tpl');
			
		break;
				
}

?>
