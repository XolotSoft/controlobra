<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['matP'];

if(!isset($_SESSION['itemsPg']))
	$_SESSION['itemsPg'] = 25;
	
$itemsPage = $_SESSION['itemsPg'];

if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{
	case 'addMaterial': 
		
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
		
		$categorias = $category->EnumerateAll(1);
		$categorias = $util->EncodeResult($categorias);
				
		$_SESSION['unitPrices'] = array();
		
		$smarty->assign('units', $units);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-material-popup.tpl');
				
		break;	

	case 'editMaterial':
		
		$materialId = $_POST['id'];
		
		$material->setMaterialId($materialId);
		$info = $material->Info();		
		$info = $util->EncodeRow($info);
		
		$units = $unit->EnumerateAll();
		$units = $util->EncodeResult($units);
		
		$categorias = $category->EnumerateAll(1);
		$categorias = $util->EncodeResult($categorias);
		
		$subcategory->setCategoryId($info['categoryId']);
		$subcategorias = $subcategory->EnumerateAll();
		$subcategorias = $util->EncodeResult($subcategorias);
		
		$conceptCon->setSubcategoryId($info['subcategoryId']);
		$concepts = $conceptCon->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
		
		$suppliers = $supplier->EnumerateByType('proveedor');
		$suppliers = $util->EncodeResult($suppliers);
		
		$matPrice->setMaterialId($materialId);
		$resPrices = $matPrice->EnumerateAll();
		
		$prices = array();
		foreach($resPrices as $res){
			$card['supMain'] = $res['supMain'];
			$card['matPriceId'] = $res['matPriceId'];
			$card['supplierId'] = $res['supplierId'];
			$card['precio'] = $res['price'];
			$card['iva'] = $res['iva'];
			$card['total'] = $res['total'];
			$card['currency'] = $res['currency'];
			$card['fecha'] = $util->FormatDateDmy($res['fecha']);
			
			$prices[] = $card;
		}
		
		$_SESSION['unitPrices'] = $prices;
						
		$smarty->assign('unitPrices', $prices);
		$smarty->assign('suppliers', $suppliers);
		$smarty->assign('units', $units);
		$smarty->assign('info', $info);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('subcategorias', $subcategorias);
		$smarty->assign('concepts', $concepts);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-material-popup.tpl');
		
		break;
		
	case 'saveAddMaterial':				
		
		$material->setCategoryId($_POST['categoryId']);
		$material->setSubcategoryId($_POST['subcategoryId']);
		$material->setConceptConId($_POST['conceptConId']);
		$material->setName($_POST['name']);
		$material->setWaste($_POST['waste']);
		$material->setUnitId($_POST['unitId']);
		$material->setComment($_POST['comment']);
		
		if($_POST['steel']){
			$material->setSteel(1);
			$material->setDiameter($_POST['diameter']);
			$material->setWeight($_POST['weight']);
			$material->setTraslape($_POST['traslape']);
			$material->setBulbos($_POST['bulbos']);
		}else{
			$material->setSteel(0);
			$material->setDiameter(0);
			$material->setWeight(0);
			$material->setTraslape(0);
			$material->setBulbos(0);
		}
		
		$supMain = $_POST['supMain'];
		$precios = $_POST['precios'];
		$currencies = $_POST['currencies'];
		$suppliers = $_POST['suppliers'];
		$iva = $_POST['iva'];
		$totals = $_POST['totals'];
		$fechas = $_POST['fechas'];
				
		if(!count($precios))
			$precios = array();
		
		$continue = true;
		$prices = array();			
		foreach($precios as $k => $val){
		
			$card['precio'] = $val;
			$card['currency'] = $currencies[$k];
			$card['supplierId'] = $suppliers[$k];
			$card['fecha'] = $fechas[$k];
			$card['iva'] = $iva[$k];
			$card['total'] = $totals[$k];
			
			if($supMain == $k)
				$card['supMain'] = 1;
			else
				$card['supMain'] = 0;
			
			$matPrice->setSupMain($card['supMain']);
			$matPrice->setSupplierId($card['supplierId']);
			$matPrice->setPrice($card['precio']);
			$matPrice->setFecha($card['fecha']);
			
			if(!$matPrice->SaveTemp())
				$continue = false;
			
			$prices[] = $card;
			
		}//foreach
		
		if(count($prices) > 0 && $supMain == ''){
			$util->setError(11030,'error','','');
			$util->PrintErrors();
			$continue = false;
		}
				
		if($continue)
			$materialId = $material->Save();
				
		if(!$materialId)
			$continue = false;
				
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			foreach($prices as $res){		
				
				$matPrice->setMaterialId($materialId);
				$matPrice->setSupMain($res['supMain']);
				$matPrice->setSupplierId($res['supplierId']);
				$matPrice->setPrice($res['precio']);
				$matPrice->setCurrency($res['currency']);
				$matPrice->setIva($res['iva']);
				$matPrice->setTotal($res['total']);
				$matPrice->setFecha($util->FormatDateYmd($res['fecha']));
				
				$matPrice->Save();							
			}
			
			//Save History Data
			$user->setModule('Materiales');
			$user->setAction('Agregar');
			$user->setItemId($materialId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$materials = $material->Enumerate();
			$result = $materials['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);				
				
				$category->setCategoryId($res['categoryId']);
				$infC = $category->Info();
				
				$card['noCat'] = $infC['noCat'];
				$card['category'] = utf8_encode($infC['name']);
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				$conceptCon->setConceptConId($res['conceptConId']);
				$card['concept'] = utf8_encode($conceptCon->GetNameById());
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				$matPrice->setMaterialId($res['materialId']);
				$resPrices = $matPrice->EnumerateAll();
				
				$precios = array();
				foreach($resPrices as $res){
					$cardP = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$cardP['supplier'] = utf8_encode($supplier->GetNameById());
					$cardP['fecha'] = $util->FormatDateDmy($res['fecha']);
					
					$precios[] = $cardP;
				}
				$card['prices'] = $precios;				
				
				$items[] = $card;
			}			
			$materials['items'] = $items;
			
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material.tpl');
		}
		
		break;
		
	case 'saveEditMaterial':	 	
		
		$materialId = $_POST['id'];
		
		$material->setMaterialId($materialId);	
		$material->setCategoryId($_POST['categoryId']);
		$material->setSubcategoryId($_POST['subcategoryId']);
		$material->setConceptConId($_POST['conceptConId']);
		$material->setName($_POST['name']);
		$material->setWaste($_POST['waste']);
		$material->setUnitId($_POST['unitId']);
		$material->setComment($_POST['comment']);
		
		if($_POST['steel']){
			$material->setSteel(1);
			$material->setDiameter($_POST['diameter']);
			$material->setWeight($_POST['weight']);
			$material->setTraslape($_POST['traslape']);
			$material->setBulbos($_POST['bulbos']);
		}else{			
			$material->setSteel(0);
			$material->setDiameter(0);
			$material->setWeight(0);
			$material->setTraslape(0);
			$material->setBulbos(0);
		}
		
		$supMain = $_POST['supMain'];
		$precios = $_POST['precios'];
		$currencies = $_POST['currencies'];
		$suppliers = $_POST['suppliers'];
		$idMatPrices = $_POST['idMatPrices'];
		$fechas = $_POST['fechas'];
		$iva = $_POST['iva'];
		$totals = $_POST['totals'];
		
		if(!count($precios))
			$precios = array();
		
		$continue = true;
		$ids = array();
		$prices = array();			
		foreach($precios as $k => $val){		
			$card['precio'] = $val;
			$card['currency'] = $currencies[$k];
			$card['supplierId'] = $suppliers[$k];
			$card['matPriceId'] = $idMatPrices[$k];
			$card['iva'] = $iva[$k];
			$card['total'] = $totals[$k];
			$card['fecha'] = $fechas[$k];
			
			$ids[] = $idMatPrices[$k];
			
			if($supMain == $k)
				$card['supMain'] = 1;
			else
				$card['supMain'] = 0;
			
			$matPrice->setSupMain($card['supMain']);
			$matPrice->setSupplierId($card['supplierId']);
			$matPrice->setPrice($card['precio']);
			$matPrice->setFecha($card['fecha']);
			
			if(!$matPrice->SaveTemp())
				$continue = false;
									
			$prices[] = $card;
		}
		
		if(count($prices) > 0 && $supMain == ''){
			$util->setError(11030,'error','','');
			$util->PrintErrors();
			$continue = false;
		}
		
		if($continue)
			if(!$material->Update())
				$continue = false;
				
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{			
			$matPrice->setMaterialId($materialId);
			$resPrices = $matPrice->EnumerateAll();
			
			//Eliminamos de la BD los registros que fueron eliminados fisicamente
			foreach($resPrices as $val){
				$matPriceId = $val['matPriceId'];
				
				if(!in_array($matPriceId,$ids)){
					$matPrice->setMatPriceId($matPriceId);
					$matPrice->Delete();
				}
			}
						
			foreach($prices as $res){		
				
				$matPrice->setSupMain($res['supMain']);
				$matPrice->setMatPriceId($res['matPriceId']);
				$matPrice->setMaterialId($materialId);
				$matPrice->setSupplierId($res['supplierId']);
				$matPrice->setPrice($res['precio']);
				$matPrice->setCurrency($res['currency']);
				$matPrice->setFecha($util->FormatDateYmd($res['fecha']));
				$matPrice->setIva($res['iva']);
				$matPrice->setTotal($res['total']);
				
				if($res['matPriceId'])
					$matPrice->Update();
				else
					$matPrice->Save();
			}
			
			//Save History Data
			$user->setModule('Materiales');
			$user->setAction('Editar');
			$user->setItemId($materialId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$material->setPage($p);
			$material->setItemsPage($itemsPage);
			$materials = $material->Enumerate();
			$result = $materials['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$infC = $category->Info();
				
				$card['noCat'] = $infC['noCat'];
				$card['category'] = utf8_encode($infC['name']);
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				$conceptCon->setConceptConId($res['conceptConId']);
				$card['concept'] = utf8_encode($conceptCon->GetNameById());
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				$matPrice->setMaterialId($res['materialId']);
				$resPrices = $matPrice->EnumerateAll();
				
				$precios = array();
				foreach($resPrices as $res){
					$cardP = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$cardP['supplier'] = utf8_encode($supplier->GetNameById());
					$cardP['fecha'] = $util->FormatDateDmy($res['fecha']);
					
					$precios[] = $cardP;
				}
				$card['prices'] = $precios;				
				
				
				$items[] = $card;
			}			
			$materials['items'] = $items;
			
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material.tpl');
		}
			
		break;
	
	case 'deleteMaterial':
		
		$materialId = $_POST['id'];
		
		$material->setMaterialId($materialId);	
				
		if(!$material->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Materiales');
			$user->setAction('Eliminar');
			$user->setItemId($materialId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$material->setPage($p);
			$material->setItemsPage($itemsPage);
			$materials = $material->Enumerate();
			$result = $materials['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$infC = $category->Info();
				
				$card['noCat'] = $infC['noCat'];
				$card['category'] = utf8_encode($infC['name']);
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				$conceptCon->setConceptConId($res['conceptConId']);
				$card['concept'] = utf8_encode($conceptCon->GetNameById());
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
							
				$matPrice->setMaterialId($res['materialId']);
				$resPrices = $matPrice->EnumerateAll();
				
				$precios = array();
				foreach($resPrices as $res){
					$cardP = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$cardP['supplier'] = utf8_encode($supplier->GetNameById());
					$cardP['fecha'] = $util->FormatDateDmy($res['fecha']);
					
					$precios[] = $cardP;
				}
				$card['prices'] = $precios;	
				
				$items[] = $card;
			}			
			$materials['items'] = $items;
			
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material.tpl');
		}
			
		break;
	
	case 'searchMaterial':
																		
			$material->setCategoryId($_POST['categoryId2']);
			$material->setSubcategoryId($_POST['subcategoryId2']);
			$material->setConceptConId($_POST['conceptConId2']);
			$material->setName($_POST['name2']);
						
			$result = $material->Search();
						
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$infC = $category->Info();
				
				$card['noCat'] = $infC['noCat'];
				$card['category'] = utf8_encode($infC['name']);
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				$conceptCon->setConceptConId($res['conceptConId']);
				$card['concept'] = utf8_encode($conceptCon->GetNameById());
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
							
				$matPrice->setMaterialId($res['materialId']);
				$resPrices = $matPrice->EnumerateAll();
				
				$precios = array();
				foreach($resPrices as $res){
					$cardP = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$cardP['supplier'] = utf8_encode($supplier->GetNameById());
					$cardP['fecha'] = $util->FormatDateDmy($res['fecha']);
					
					$precios[] = $cardP;
				}
				$card['prices'] = $precios;	
				
				$items[] = $card;
			}			
			$materials['items'] = $items;
					
			echo 'ok[#]';
						
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material.tpl');
						
		break;
		
	case 'addPrice':
			
			$prices = $_SESSION['unitPrices'];
			
			$card['matPriceId'] = '';
			$card['supplierId'] = '';
			$card['precio'] = '';
			$card['iva'] = 16;
			$card['total'] = '';
			$card['currency'] = 'MXN';
			$card['fecha'] = date('d-m-Y');
			
			$prices[] = $card;
			
			$_SESSION['unitPrices'] = $prices;
			
			$suppliers = $supplier->EnumerateByType('proveedor');
			$suppliers = $util->EncodeResult($suppliers);
			
			echo 'ok[#]';
			
			$smarty->assign('unitPrices', $prices);
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material-prices.tpl');
			
		break;
	
	case 'delPrice':
			
			$k = $_POST['k'];
			
			$prices = $_SESSION['unitPrices'];
			
			unset($prices[$k]);
			
			$_SESSION['unitPrices'] = $prices;
			
			$suppliers = $supplier->EnumerateByType('proveedor');
			$suppliers = $util->EncodeResult($suppliers);
			
			echo 'ok[#]';
			
			$smarty->assign('unitPrices', $prices);
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material-prices.tpl');
				
		break;
	
	case 'savePrices':
			
			$supMain = $_POST['supMain'];
			$precios = $_POST['precios'];
			$currencies = $_POST['currencies'];
			$suppliers = $_POST['suppliers'];
			$totals = $_POST['totals'];
			$iva = $_POST['iva'];
			$idMatPrices = $_POST['idMatPrices'];
			$fechas = $_POST['fechas'];
			
			if(!count($precios))
				$precios = array();
			
			$prices = array();			
			foreach($precios as $k => $val){
				
				if($supMain == $k)
					$card['supMain'] = 1;
				else
					$card['supMain'] = 0;
			
				$card['precio'] = $val;
				$card['currency'] = $currencies[$k];
				$card['total'] = $totals[$k];
				$card['iva'] = $iva[$k];
				$card['supplierId'] = $suppliers[$k];
				$card['matPriceId'] = $idMatPrices[$k];
				$card['fecha'] = $fechas[$k];
				
				$prices[$k] = $card;
			}
			
			$_SESSION['unitPrices'] = $prices;
			
		break;
	
	case 'updateTotal':
			
			$price = ($_POST['price'] == '') ? 0 : $_POST['price'];
			$iva = intval($_POST['iva']);
			
			$total = $price * (1 + ($iva/100));
			
			echo 'ok[#]';
			
			echo number_format($total,2);
			
		break;
		
	case 'searchResumen':
			
			$conIva = $_POST['conIva'];
			
			$categoryId = $_POST['categoryId2'];
			$subcategoryId = $_POST['subcategoryId2'];
			$conceptConId = $_POST['conceptConId2'];
			$showPrecio = $_POST['showPrecio'];
						
			$project->setProjectId($_SESSION['curProjId']);
			$projects = $project->EnumOne();
			
			$items = array();
			foreach($projects['items'] as $res){
				$card = $util->EncodeRow($res);
							
				$cuantificacion->setProjectId($res['projectId']);
				$resCategories = $cuantificacion->EnumMatCatsByProject();
				
				$totCant2 = 0;
				$total2 = 0;
				$categories = array();	
				foreach($resCategories as $res2){
					$card2 = $util->EncodeRow($res2);
					
					if($categoryId != '' && $res2['categoryId'] != $categoryId)
						continue;
								
					$cuantificacion->setCategoryId($res2['categoryId']);
					$resSubcats = $cuantificacion->EnumMatSubcatsByProj();
					
					$totCant3 = 0;
					$total3 = 0;
					$subcategories = array();
					foreach($resSubcats as $res3){
						$card3 = $util->EncodeRow($res3);
						
						if($subcategoryId != '' && $res3['subcategoryId'] != $subcategoryId)
							continue;
						
						$cuantificacion->setSubcategoryId($res3['subcategoryId']);
						$resConcepts = $cuantificacion->EnumMatConceptsByProj();
						
						$totCant4 = 0;
						$total4 = 0;
						$concepts = array();
						foreach($resConcepts as $res4){
							$card4 = $util->EncodeRow($res4);
							
							if($conceptConId != '' && $res4['conceptConId'] != $conceptConId)
								continue;
							
							$cuantificacion->setConceptConId($res4['conceptConId']);
							$resDesc = $cuantificacion->EnumMatConceptsByProjRes();
												
							$totCant5 = 0;
							$total5 = 0;					
							$descriptions = array();
							foreach($resDesc as $res5){
								
								$res5 = $util->EncodeRow($res5);
								
								$matPrice->setMaterialId($res5['materialId']);
								$infMP = $matPrice->GetMatPriceDefault();
								
								if($conIva)
									$infMP['price'] = $infMP['total'];
								
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
							
							$res5 = $util->EncodeRow($res5);
							
							$matPrice->setMaterialId($res5['materialId']);
							$infMP = $matPrice->GetMatPriceDefault();
							
							if($conIva)
								$infMP['price'] = $infMP['total'];
									
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
						
						$res5 = $util->EncodeRow($res5);
						
						$matPrice->setMaterialId($res5['materialId']);
						$infMP = $matPrice->GetMatPriceDefault();
						
						if($conIva)
							$infMP['price'] = $infMP['total'];
									
						$total = $infMP['price'];
						
						$material->setMaterialId($res5['materialId']);
						$infM = $material->Info();
						
						$unit->setUnitId($infM['unitId']);
						$res5['unit'] = $unit->GetClaveById();
						
						$res5['price'] = '$'.$infMP['price'];
						
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
			
			echo 'ok[#]';
			
			$smarty->assign('showPrecio', $showPrecio);
			$smarty->assign('projects', $projects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			
			if($showPrecio)
				$smarty->display(DOC_ROOT.'/templates/lists/material-resumen.tpl');
			else
				$smarty->display(DOC_ROOT.'/templates/lists/material-resumen2.tpl');
			
		break;
	
}

?>