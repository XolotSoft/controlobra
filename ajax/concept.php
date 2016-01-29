<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['conP'];

if(!isset($_SESSION['itemsPg']))
	$_SESSION['itemsPg'] = 25;

$itemsPage = $_SESSION['itemsPg'];

if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{
	case 'addConcept': 
		
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
		
		$categorias = $category->EnumerateAll(1);
		$categorias = $util->EncodeResult($categorias);
		
		$_SESSION['materiales'] = array();
		$_SESSION['conceptPrices'] = array();
		
		$smarty->assign('units', $units);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-concept-popup.tpl');
				
		break;	

	case 'editConcept':
		
		$conceptId = $_POST['id'];
		
		$concept->setConceptId($conceptId);
		$info = $concept->Info();		
		$info = $util->EncodeRow($info);
		
		$categorias = $category->EnumerateAll();
		$categorias = $util->EncodeResult($categorias);
		
		$subcategory->setCategoryId($info['categoryId']);
		$subcategorias = $subcategory->EnumerateAll();
		$subcategorias = $util->EncodeResult($subcategorias);
		
		$conceptCon->setSubcategoryId($info['subcategoryId']);
		$concepts = $conceptCon->EnumerateAll();
		$concepts = $util->EncodeResult($concepts);
		
		$units = $unit->EnumerateAll(1);
		$units = $util->EncodeResult($units);
		
		if($info['tipo'] == 'Subcontrato'){
			
			//Cargamos los precios
			
			$suppliers = $supplier->EnumerateByType('contratista');
			$suppliers = $util->EncodeResult($suppliers);
			
			$conceptPrice->setConceptId($conceptId);
			$resPrices = $conceptPrice->EnumerateAll();
			
			$prices = array();
			foreach($resPrices as $res){
				$card['supMain'] = $res['supMain'];
				$card['conceptPriceId'] = $res['conceptPriceId'];
				$card['supplierId'] = $res['supplierId'];
				$card['precio'] = $res['price'];
				$card['iva'] = $res['iva'];
				$card['total'] = $res['total'];
				$card['fecha'] = $util->FormatDateDmy($res['fecha']);
				
				$prices[] = $card;
			}
			
			$_SESSION['conceptPrices'] = $prices;
			
			$smarty->assign('conceptPrices', $prices);
			$smarty->assign('suppliers', $suppliers);
			
		}else{
			
			//Cargamos los materiales
					
			$conceptMat->setConceptId($conceptId);
			$resMats = $conceptMat->EnumerateAll();
			
			$material->setSteel($info['steel']);			
			$mats = $material->EnumerateAll();
			$materials = $util->EncodeResult($mats);
			
			$materiales = array();
			foreach($resMats as $val){			
				$k = $val['conceptMatId'];
				
				$card['conceptMatId'] = $val['conceptMatId'];
				$card['materialId'] = $val['materialId'];
				$card['quantity'] = $val['quantity'];
									
				$materiales[$k] = $card;
			}
			
			$_SESSION['materiales'] = $materiales;
			
			$smarty->assign('materiales', $materiales);
			$smarty->assign('materials', $materials);	
		}	
		
		$smarty->assign('info', $info);
		$smarty->assign('units', $units);
		$smarty->assign('categorias', $categorias);
		$smarty->assign('subcategorias', $subcategorias);
		$smarty->assign('concepts', $concepts);			
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-concept-popup.tpl');
		
		break;
		
	case 'saveAddConcept':				
		
		$tipo = $_POST['tipo'];
		
		$steel = ($_POST['steel'] == 1) ? 1 : 0;
				
		$concept->setTipo($tipo);
		$concept->setCategoryId($_POST['categoryId']);
		$concept->setSubcategoryId($_POST['subcategoryId']);
		$concept->setConceptConId($_POST['conceptConId']);
		$concept->setName($_POST['name']);
		$concept->setUnitId($_POST['unitId']);
		$concept->setSteel($steel);
		$concept->setComment($_POST['comment']);
		
		$continue = true;
		
		if($concept->ExistName())
			$continue = false;
		
		if(!$conceptMat->SaveTemp())
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$concept->setName($_POST['name']);
		
		$numError = ($steel == 1) ? 10027 :10028;
		
		if($tipo == 'Subcontrato'){			
			
			$supMain = $_POST['supMain'];
			$precios = $_POST['precios'];
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
				$card['supplierId'] = $suppliers[$k];
				$card['fecha'] = $fechas[$k];
				$card['iva'] = $iva[$k];
				$card['total'] = $totals[$k];
				
				if($supMain == $k)
					$card['supMain'] = 1;
				else
					$card['supMain'] = 0;
				
				$conceptPrice->setSupMain($card['supMain']);
				$conceptPrice->setSupplierId($card['supplierId']);
				$conceptPrice->setPrice($card['precio']);
				$conceptPrice->setFecha($card['fecha']);
				
				if(!$conceptPrice->SaveTemp())
					$continue = false;
				
				$prices[] = $card;
			}
			
		}elseif($tipo == 'Obra'){		
		
			//Guardamos los materiales		
			$matCatId = $_POST['matCatId'];
			$matSubcatId = $_POST['matSubcatId'];			
			$materialId = $_POST['materialId'];
			$quantity = $_POST['quantity'];
			
			if(!count($materialId))
				$materialId = array();
			
			$continue = true;
			$materials = array();			
			foreach($materialId as $k => $val){
				
				$card['materialId'] = $materialId[$k];
				$card['quantity'] = $quantity[$k];
				
				$material->setMaterialId($card['materialId']);
				$isSteel = $material->IsSteel();
				
				if($isSteel != $steel){					
					$util->setError($numError, 'error', '', '');
					$util->PrintErrors();
					$continue = false;
					break;
				}
											
				$conceptMat->setMaterialId($card['materialId']);
				$conceptMat->setQuantity($card['quantity']);
				
				if(!$conceptMat->SaveTemp())
					$continue = false;
				
				$materials[$k] = $card;
			}
		
		}
		
		if(count($prices) > 0 && $supMain == ''){
			$util->setError(11030,'error','','');
			$util->PrintErrors();
			$continue = false;
		}
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$conceptId = $concept->Save();
		
		if(!$conceptId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{		
			if($tipo == 'Subcontrato'){
				
				$conceptPrice->setConceptId($conceptId);
				
				//Guardamos los precios
				foreach($prices as $res){
					$conceptPrice->setSupMain($res['supMain']);								
					$conceptPrice->setSupplierId($res['supplierId']);
					$conceptPrice->setPrice($res['precio']);
					$conceptPrice->setIva($res['iva']);
					$conceptPrice->setTotal($res['total']);
					$conceptPrice->setFecha($util->FormatDateYmd($res['fecha']));
					
					$conceptPrice->Save();							
				}
			
			}elseif($tipo == 'Obra'){
				
				$conceptMat->setConceptId($conceptId);
				
				//Guardamos los materiales
				foreach($materials as $res){				
					$conceptMat->setMatCatId($res['matCatId']);
					$conceptMat->setMatSubcatId($res['matSubcatId']);
					$conceptMat->setMaterialId($res['materialId']);
					$conceptMat->setQuantity($res['quantity']);
					
					$conceptMat->Save();				
				}
			
			}
			
			//Save History Data
			$user->setModule('Conceptos');
			$user->setAction('Agregar');
			$user->setItemId($conceptId);
			$user->SaveHistory();
			
			$util->setError(10057, "complete");
			$util->PrintErrors();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$concept->setPage($p);
			$concept->setItemsPage($itemsPage);
			$concepts = $concept->Enumerate();
			$result = $concepts['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$card['category'] = utf8_encode($category->GetNameById());
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());			
								
				if($card['conceptConId']){
					$conceptCon->setConceptConId($res['conceptConId']);
					$card['concept'] = utf8_encode($conceptCon->GetNameById());
				}
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				if($res['tipo'] == 'Subcontrato'){
					
					$conceptPrice->setConceptId($res['conceptId']);
					$resPrices = $conceptPrice->EnumerateAll();
					
					$totalP = 0;
					$prices = array();
					foreach($resPrices as $val){
						$cardP = $val;
						
						$cardP['fecha'] = date('d-m-Y',strtotime($cardP['fecha']));
						
						$supplier->setSupplierId($val['supplierId']);
						$cardP['supplier'] = utf8_encode($supplier->GetNameById());
						
						$totalP += $cardP['total'];
						
						$prices[] = $cardP;
					}
					
					$card['prices'] = $prices;
					$card['totalP'] = number_format($totalP,2);
					
				}elseif($res['tipo'] == 'Obra'){
					
					$conceptMat->setConceptId($res['conceptId']);										
					$resMaterials = $conceptMat->EnumerateAll();
					
					$total = 0;
					$materials = array();
					foreach($resMaterials as $res){
						
						$matPrice->setMaterialId($res['materialId']);
						$infP = $matPrice->GetMatPriceDefault();
						
						$price = ($infP['price'] == '') ? '0.00' :  $infP['price'];
										
						$res['price'] = $price;
						$subtotal = $price * $res['quantity'];
						$res['total'] = number_format($subtotal,2);
						
						$total += $subtotal;
						
						$materials[] = $res;
					}
					
					$card['materials'] = $util->EncodeResult($materials);
					$card['total'] = number_format($total,2);
					
				}//else
								
				$items[] = $card;
				
			}//foreach
			
			$concepts['items'] = $items;
					
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept.tpl');
		}		
		
		break;
		
	case 'saveEditConcept':	 	
						
		$conceptId = $_POST['id'];
		$tipo = $_POST['tipo'];
		$steel = $_POST['steel'];
		
		$concept->setConceptId($conceptId);
		$concept->setTipo($tipo);
		$concept->setCategoryId($_POST['categoryId']);
		$concept->setSubcategoryId($_POST['subcategoryId']);
		$concept->setConceptConId($_POST['conceptConId']);
		$concept->setName($_POST['name']);
		$concept->setUnitId($_POST['unitId']);
		$concept->setSteel($steel);
		$concept->setComment($_POST['comment']);
		
		$continue = true;
		
		if($concept->ExistName())
			$continue = false;
		
		if(!$conceptMat->SaveTemp())
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$concept->setName($_POST['name']);
		
		$numError = ($steel == 1) ? 10027 :10028;
			
		if($tipo == 'Subcontrato'){
			
			$supMain = $_POST['supMain'];	
			$precios = $_POST['precios'];
			$suppliers = $_POST['suppliers'];
			$idConceptPrices = $_POST['idConceptPrices'];
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
				$card['supplierId'] = $suppliers[$k];
				$card['conceptPriceId'] = $idConceptPrices[$k];
				$card['iva'] = $iva[$k];
				$card['total'] = $totals[$k];
				$card['fecha'] = $fechas[$k];
				
				$ids[] = $idConceptPrices[$k];
				
				if($supMain == $k)
					$card['supMain'] = 1;
				else
					$card['supMain'] = 0;
				
				$conceptPrice->setSupMain($card['supMain']);
				$conceptPrice->setSupplierId($card['supplierId']);
				$conceptPrice->setPrice($card['precio']);
				$conceptPrice->setFecha($card['fecha']);
				
				if(!$conceptPrice->SaveTemp())
					$continue = false;
										
				$prices[] = $card;
			}
		
		}elseif($tipo == 'Obra'){
					
			//Guardamos los materiales
			
			$idConMat = $_POST['idConMat'];
			$matCatId = $_POST['matCatId'];
			$matSubcatId = $_POST['matSubcatId'];			
			$materialId = $_POST['materialId'];
			$quantity = $_POST['quantity'];
						
			if(!count($materialId))
				$materialId = array();
			
			$continue = true;
			$ids = array();
			$materials = array();			
			foreach($materialId as $k => $val){			
				$card['conceptMatId'] = $idConMat[$k];			
				$card['materialId'] = $materialId[$k];
				$card['quantity'] = $quantity[$k];
				
				$material->setMaterialId($card['materialId']);
				$isSteel = $material->IsSteel();
				
				if($isSteel != $steel){					
					$util->setError($numError, 'error', '', '');
					$util->PrintErrors();
					$continue = false;
					break;
				}
				
				$ids[] = $idConMat[$k];
				
				$conceptMat->setMaterialId($card['materialId']);
				$conceptMat->setQuantity($card['quantity']);
				
				if(!$conceptMat->SaveTemp())
					$continue = false;
				
				$materials[$k] = $card;
			}
		
		}
		
		if(count($prices) > 0 && $supMain == ''){
			$util->setError(11030,'error','','');
			$util->PrintErrors();
			$continue = false;
		}
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
			
		if(!$concept->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			$conceptMat->setConceptId($conceptId);
			
			if($tipo == 'Obra'){
				
				//Eliminamos de la BD los materiales que fueron eliminados fisicamente
				
				$resMats = $conceptMat->EnumerateAll();				
				foreach($resMats as $val){
					$conceptMatId = $val['conceptMatId'];
					
					if(!in_array($conceptMatId,$ids)){
						$conceptMat->setConceptMatId($conceptMatId);
						$conceptMat->Delete();
					}
				}
				
				//Guardamos / Actualizamos los materiales
					
				foreach($materials as $res){
					
					$conceptMat->setConceptMatId($res['conceptMatId']);				
					$conceptMat->setMaterialId($res['materialId']);
					$conceptMat->setQuantity($res['quantity']);
					
					if($res['conceptMatId'])
						$conceptMat->Update();
					else
						$conceptMat->Save();
					
				}
			
			}elseif($tipo == 'Subcontrato'){
				
				//Eliminamos de la BD los materiales que fueron guardados anteriormente
				
				$resMats = $conceptMat->EnumerateAll();					
				foreach($resMats as $val){
					$conceptMatId = $val['conceptMatId'];					
					$conceptMat->setConceptMatId($conceptMatId);
					$conceptMat->Delete();
					
				}
				
				//Guardamos los Precios
				
				$conceptPrice->setConceptId($conceptId);
				$resPrices = $conceptPrice->EnumerateAll();
				
				//Eliminamos de la BD los precios que fueron eliminados fisicamente
				foreach($resPrices as $val){
					$conceptPriceId = $val['conceptPriceId'];
					
					if(!in_array($conceptPriceId,$ids)){
						$conceptPrice->setConceptPriceId($conceptPriceId);
						$conceptPrice->Delete();
					}
				}
				
				//Guardamos / Actualizamos los precios
				
				foreach($prices as $res){		
					
					$conceptPrice->setSupMain($res['supMain']);
					$conceptPrice->setConceptPriceId($res['conceptPriceId']);
					$conceptPrice->setConceptId($conceptId);
					$conceptPrice->setSupplierId($res['supplierId']);
					$conceptPrice->setPrice($res['precio']);
					$conceptPrice->setFecha($util->FormatDateYmd($res['fecha']));
					$conceptPrice->setIva($res['iva']);
					$conceptPrice->setTotal($res['total']);
					
					if($res['conceptPriceId'])
						$conceptPrice->Update();
					else
						$conceptPrice->Save();
				}
				
			}
			
			//Save History Data
			$user->setModule('Conceptos');
			$user->setAction('Editar');
			$user->setItemId($conceptId);
			$user->SaveHistory();
			
			$util->setError(10058, "complete");
			$util->PrintErrors();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$concept->setPage($p);
			$concept->setItemsPage($itemsPage);
			$concepts = $concept->Enumerate();
			$result = $concepts['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$card['category'] = utf8_encode($category->GetNameById());
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				if($card['conceptConId']){
					$conceptCon->setConceptConId($res['conceptConId']);
					$card['concept'] = utf8_encode($conceptCon->GetNameById());
				}
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				if($res['tipo'] == 'Subcontrato'){
					
					$conceptPrice->setConceptId($res['conceptId']);
					$resPrices = $conceptPrice->EnumerateAll();
					
					$totalP = 0;
					$prices = array();
					foreach($resPrices as $val){
						$cardP = $val;
						
						$cardP['fecha'] = date('d-m-Y',strtotime($cardP['fecha']));
						
						$supplier->setSupplierId($val['supplierId']);
						$cardP['supplier'] = utf8_encode($supplier->GetNameById());
						
						$totalP += $cardP['total'];
						
						$prices[] = $cardP;
					}
			
					$card['prices'] = $prices;
					$card['totalP'] = number_format($totalP,2);
					
				}elseif($res['tipo'] == 'Obra'){
					
					$conceptMat->setConceptId($res['conceptId']);										
					$resMaterials = $conceptMat->EnumerateAll();
					
					$total = 0;
					$materials = array();
					foreach($resMaterials as $res){
						
						$matPrice->setMaterialId($res['materialId']);
						$infP = $matPrice->GetMatPriceDefault();
						
						$price = ($infP['price'] == '') ? '0.00' :  $infP['price'];
										
						$res['price'] = $price;
						$subtotal = $price * $res['quantity'];
						$res['total'] = number_format($subtotal,2);
						
						$total += $subtotal;
						
						$materials[] = $res;
					}
					
					$card['materials'] = $util->EncodeResult($materials);
					$card['total'] = number_format($total,2);
					
				}//else
								
				$items[] = $card;
				
			}//foreach
					
			$concepts['items'] = $items;
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept.tpl');
		}
			
		break;
	
	case 'deleteConcept':
		
		$conceptId = $_POST['id'];
		
		$concept->setConceptId($conceptId);	
				
		if(!$concept->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Conceptos');
			$user->setAction('Eliminar');
			$user->setItemId($conceptId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$concept->setPage($p);
			$concept->setItemsPage($itemsPage);
			$concepts = $concept->Enumerate();
			$result = $concepts['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$card['category'] = utf8_encode($category->GetNameById());
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				if($card['conceptConId']){
					$conceptCon->setConceptConId($res['conceptConId']);
					$card['concept'] = utf8_encode($conceptCon->GetNameById());
				}
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				if($res['tipo'] == 'Subcontrato'){
					
					$conceptPrice->setConceptId($res['conceptId']);
					$resPrices = $conceptPrice->EnumerateAll();
					
					$totalP = 0;
					$prices = array();
					foreach($resPrices as $val){
						$cardP = $val;
						
						$cardP['fecha'] = date('d-m-Y',strtotime($cardP['fecha']));
						
						$supplier->setSupplierId($val['supplierId']);
						$cardP['supplier'] = utf8_encode($supplier->GetNameById());
						
						$totalP += $cardP['total'];
						
						$prices[] = $cardP;
					}
			
					$card['prices'] = $prices;
					$card['totalP'] = number_format($totalP,2);
					
				}elseif($res['tipo'] == 'Obra'){
					
					$conceptMat->setConceptId($res['conceptId']);
					$resMaterials = $conceptMat->EnumerateAll();
					
					$total = 0;
					$materials = array();
					foreach($resMaterials as $res){
						
						$matPrice->setMaterialId($res['materialId']);
						$infP = $matPrice->GetMatPriceDefault();
						
						$price = ($infP['price'] == '') ? '0.00' :  $infP['price'];
										
						$res['price'] = $price;
						$subtotal = $price * $res['quantity'];
						$res['total'] = number_format($subtotal,2);
						
						$total += $subtotal;
						
						$materials[] = $res;
					}
					
					$card['materials'] = $util->EncodeResult($materials);
					$card['total'] = number_format($total,2);
					
				}//else
								
				$items[] = $card;
				
			}//foreach	
				
			$concepts['items'] = $items;
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept.tpl');
		}
			
		break;
	
	case 'searchConcept':
						
			$concept->setTipo($_POST['tipo2']);
			$concept->setCategoryId($_POST['categoryId2']);
			$concept->setSubcategoryId($_POST['subcategoryId2']);
			$concept->setConceptConId($_POST['conceptConId2']);
			$concept->setName($_POST['name2']);
			
			$result = $concept->Search();
						
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$category->setCategoryId($res['categoryId']);
				$card['category'] = utf8_encode($category->GetNameById());
				
				$subcategory->setSubcategoryId($res['subcategoryId']);
				$card['subcategory'] = utf8_encode($subcategory->GetNameById());
				
				if($card['conceptConId']){
					$conceptCon->setConceptConId($res['conceptConId']);
					$card['concept'] = utf8_encode($conceptCon->GetNameById());
				}
				
				$unit->setUnitId($res['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
				
				if($res['tipo'] == 'Subcontrato'){
					
					$conceptPrice->setConceptId($res['conceptId']);
					$resPrices = $conceptPrice->EnumerateAll();
					
					$totalP = 0;
					$prices = array();
					foreach($resPrices as $val){
						$cardP = $val;
						
						$cardP['fecha'] = date('d-m-Y',strtotime($cardP['fecha']));
						
						$supplier->setSupplierId($val['supplierId']);
						$cardP['supplier'] = utf8_encode($supplier->GetNameById());
						
						$totalP += $cardP['total'];
						
						$prices[] = $cardP;
					}
			
					$card['prices'] = $prices;
					$card['totalP'] = number_format($totalP,2);
					
				}elseif($res['tipo'] == 'Obra'){
					
					$conceptMat->setConceptId($res['conceptId']);										
					$resMaterials = $conceptMat->EnumerateAll();
					
					$total = 0;
					$materials = array();
					foreach($resMaterials as $res){
						
						$matPrice->setMaterialId($res['materialId']);
						$infP = $matPrice->GetMatPriceDefault();
						
						$price = ($infP['price'] == '') ? '0.00' :  $infP['price'];
										
						$res['price'] = $price;
						$subtotal = $price * $res['quantity'];
						$res['total'] = number_format($subtotal,2);
						
						$total += $subtotal;
						
						$materials[] = $res;
					}
					
					$card['materials'] = $util->EncodeResult($materials);
					$card['total'] = number_format($total,2);
					
				}//else
								
				$items[] = $card;
				
			}//foreach
			
			$concepts['items'] = $items;
			
			echo 'ok[#]';
					
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept.tpl');
						
		break;
	
	case 'loadSubcats':
									
			$subcategory->setCategoryId($_POST['categoryId']);
			$subcategorias = $subcategory->EnumerateAll(1);
			$subcategorias = $util->EncodeResult($subcategorias);
						
			echo count($subcategorias);
			
			echo '[#]';
			
			$smarty->assign('subcategorias', $subcategorias);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSubcategory.tpl');
			
		break;
	
	case 'loadSubcats2':
			
			$todos = $_POST['todos'];
			
			$subcategory->setCategoryId($_POST['categoryId']);
			$subcategorias = $subcategory->EnumerateAll();
			$subcategorias = $util->EncodeResult($subcategorias);
						
			echo count($subcategorias);
			
			echo '[#]';
			
			$smarty->assign('todos', $todos);
			$smarty->assign('subcategorias', $subcategorias);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSubcategory2.tpl');
			
		break;
	
	case 'loadSubcatsSearch':
									
			$subcategory->setCategoryId($_POST['categoryId']);
			$subcategorias = $subcategory->EnumerateAll();
			$subcategorias = $util->EncodeResult($subcategorias);
						
			echo count($subcategorias);
			
			echo '[#]';
			
			$smarty->assign('subcategorias', $subcategorias);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSubcatSearch.tpl');
			
		break;
	
	case 'loadConceptCons':
	
			$conceptCon->setSubcategoryId($_POST['subcategoryId']);
			$concepts = $conceptCon->EnumerateAll();
			$concepts = $util->EncodeResult($concepts);
						
			echo count($concepts);
			
			echo '[#]';
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConceptCon.tpl');
			
		break;
	
	case 'loadConceptCons2':
	
			$conceptCon->setSubcategoryId($_POST['subcategoryId']);
			$concepts = $conceptCon->EnumerateAll();
			$concepts = $util->EncodeResult($concepts);
									
			echo '[#]';
			
			$smarty->assign('conceptsCon', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConceptCon2.tpl');
			
		break;
	
	case 'loadConceptCons3':
	
			$conceptCon->setSubcategoryId($_POST['subcategoryId']);
			$concepts = $conceptCon->EnumerateAll();
			$concepts = $util->EncodeResult($concepts);
									
			echo '[#]';
			
			$smarty->assign('conceptsCon', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConceptCon3.tpl');
			
		break;
	
	case 'loadConceptConsSearch':
	
			$conceptCon->setSubcategoryId($_POST['subcategoryId']);
			$concepts = $conceptCon->EnumerateAll();
			$concepts = $util->EncodeResult($concepts);
									
			echo '[#]';
			
			$smarty->assign('conceptsCon', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConceptConSearch.tpl');
			
		break;
	
	case 'loadConcept2':
			
			if($_POST['conceptConId']){			
				$concept->setConceptConId($_POST['conceptConId']);			
				$concepts = $concept->EnumByConceptConId();
				
				if(count($concepts))
				$concepts = $util->EncodeResult($concepts);
				
			}else{
				$concepts = array();
			}
											
			echo '[#]';
			
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumConcept2.tpl');
			
		break;	
		
	/*** MATERIALS ***/
	
	case 'addMaterial':
			
			$materiales = $_SESSION['materiales'];
			
			$material->setSteel($isSteel);
			$mats = $material->EnumerateAll();
			$materials = $util->EncodeResult($mats);				
			
			$card['conceptMatId'] = 0;
			$card['materialId'] = 0;
			$card['quantity'] = 0;
						
			$materiales[] = $card;
			
			$_SESSION['materiales'] = $materiales;
						
			echo 'ok[#]';
			
			$smarty->assign('materiales', $materiales);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-materials.tpl');
			
		break;
	
	case 'delMaterial':
			
			$k = $_POST['k'];
						
			$materiales = $_SESSION['materiales'];
			
			unset($materiales[$k]);
			
			$_SESSION['materiales'] = $materiales;
			
			$material->setSteel($isSteel);
			$mats = $material->EnumerateAll();
			$materials = $util->EncodeResult($mats);
						
			echo 'ok[#]';
			
			$smarty->assign('materiales', $materiales);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-materials.tpl');
				
		break;
	
	case 'saveMaterials':
			
			$idConMat = $_POST['idConMat'];			
			$materialId = $_POST['materialId'];
			$quantity = $_POST['quantity'];
						
			if(!count($materialId))
				$materialId = array();
			
			$materials = array();			
			foreach($materialId as $k => $val){
				$card['conceptMatId'] = $idConMat[$k];
				$card['materialId'] = $materialId[$k];
				$card['quantity'] = $quantity[$k];
								
				$materials[$k] = $card;
			}

			$_SESSION['materiales'] = $materials;
						
		break;
	
	/*** PRICES ***/
	
	case 'addPrice':
			
			$prices = $_SESSION['conceptPrices'];
			
			$card['matPriceId'] = '';
			$card['supplierId'] = '';
			$card['precio'] = '';
			$card['iva'] = 16;
			$card['total'] = '';
			$card['fecha'] = date('d-m-Y');
			
			$prices[] = $card;
			
			$_SESSION['conceptPrices'] = $prices;
			
			$suppliers = $supplier->EnumerateByType('contratista');
			$suppliers = $util->EncodeResult($suppliers);
			
			echo 'ok[#]';
			
			$smarty->assign('conceptPrices', $prices);
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-prices.tpl');
			
		break;
	
	case 'delPrice':
			
			$k = $_POST['k'];
			
			$prices = $_SESSION['conceptPrices'];
			
			unset($prices[$k]);
			
			$_SESSION['conceptPrices'] = $prices;
			
			$suppliers = $supplier->EnumerateByType('contratista');
			$suppliers = $util->EncodeResult($suppliers);
			
			echo 'ok[#]';
			
			$smarty->assign('conceptPrices', $prices);
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-prices.tpl');
				
		break;
	
	case 'savePrices':
			
			$supMain = $_POST['supMain'];
			$precios = $_POST['precios'];
			$suppliers = $_POST['suppliers'];
			$totals = $_POST['totals'];
			$iva = $_POST['iva'];
			$idConceptPrices = $_POST['idConPrices'];
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
				$card['total'] = $totals[$k];
				$card['iva'] = $iva[$k];
				$card['supplierId'] = $suppliers[$k];
				$card['conceptPriceId'] = $idConceptPrices[$k];
				$card['fecha'] = $fechas[$k];
				
				$prices[$k] = $card;
			}
			
			$_SESSION['conceptPrices'] = $prices;
			
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
				$card = $res;
				
				$cuantificacion->setProjectId($res['projectId']);
				$resCategories = $cuantificacion->EnumCatsByProject();
								
				$total2 = 0;
				$categories = array();	
				foreach($resCategories as $res2){
					$card2 = $util->EncodeRow($res2);
					
					if($categoryId != '' && $res2['categoryId'] != $categoryId)
						continue;
					
					$cuantificacion->setCategoryId($res2['categoryId']);
					$resSubcats = $cuantificacion->EnumSubcatsByProj();
										
					$total3 = 0;
					$subcategories = array();
					foreach($resSubcats as $res3){
						$card3 = $util->EncodeRow($res3);
						
						if($subcategoryId != '' && $res3['subcategoryId'] != $subcategoryId)
							continue;
						
						$cuantificacion->setSubcategoryId($res3['subcategoryId']);
						$resConcepts = $cuantificacion->EnumConcepts2ByProj();
												
						$total4 = 0;
						$concepts = array();
						foreach($resConcepts as $res4){
							$card4 = $util->EncodeRow($res4);
							
							if($conceptConId != '' && $res4['conceptConId'] != $conceptConId)
								continue;
							
							$cuantificacion->setConceptConId($res4['conceptConId']);
							$resDesc = $cuantificacion->EnumConceptsByProjRes();
							
							$totCant5 = 0;
							$total5 = 0;					
							$descriptions = array();
							foreach($resDesc as $res5){
								
								$res5 = $util->EncodeRow($res5);
								
								$cuantificacion->setConceptId($res5['conceptId']);
								$cantidad = $cuantificacion->GetTotalQtyConcept2();
								
								$concept->setConceptId($res5['conceptId']);
								$infC = $concept->Info();
								
								$unit->setUnitId($infC['unitId']);
								$res5['unit'] = $unit->GetClaveById();
								
								$sumPrice = 0;
								if($res5['tipo'] == 'Obra'){
								
									$conceptMat->setConceptId($res5['conceptId']);
									$total = $conceptMat->GetTotalPrice();
									$total *= $cantidad;
									
									$totalInvoice = $total;
									if($conIva == "0"){
										$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
										$total = number_format($totalInvoice,2,'.',''); 
									}
									
									$res5['total'] = $total;
									
									$resMaterials = $conceptMat->EnumerateAll();
									
									$materials = array();
									foreach($resMaterials as $m){
									
										$matPrice->setMaterialId($m['materialId']);
										$infP = $matPrice->GetMatPriceDefault();
										
										//$infP['price'] = $infP['total'];
										
										$totalInvoice = $infP['price'];
										if($conIva == "0"){
											$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
											$infP['price'] = number_format($totalInvoice,2,'.',''); 
										}
										
										$material->setMaterialId($m['materialId']);
										$infM = $material->Info();
										
										$unit->setUnitId($infM['unitId']);
										$m['unit'] = $unit->GetClaveById();
										$m['price'] = $infP['price'];
										
										$sumPrice += $infP['price'];
										
										$totalM = $infP['price'] * $m['quantity'];
										$totalM *= $cantidad;
										
										$m['quantity'] *= $cantidad;
										
										if($showPrecio)
											$m['total'] = $totalM;
										
										$materials[] = $m;
									}
									$res5['materials'] = $materials;
								
								}elseif($res5['tipo'] == 'Servicio'){
				
									$cuantificacion->setProjectId($res['projectId']);
									$cuantificacion->setConceptId($res5['conceptId']);
									$infP = $cuantificacion->InfoByConceptId();
									
									$sumPrice = $infP['unitPrice'];
									
									$price = $infP['unitPrice'];
									
									$totalInvoice = $price;
									if($conIva == "0"){
										$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
										$price = number_format($totalInvoice,2,'.',''); 
									}
									
									$res5['price'] = $price;
									
									$total = $price * $cantidad;						
									$res5['total'] = $total;
																
								}else{
									
									$conceptPrice->setConceptId($res5['conceptId']);
									$infP = $conceptPrice->GetPriceDefault();
									
									//$infP['price'] = $infP['total'];
									
									$totalInvoice = $infP['price'];
									if($conIva == "0"){
										$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
										$infP['price'] = number_format($totalInvoice,2,'.',''); 
									}
									
									$sumPrice = $infP['price'];	
									$total = $infP['price'];
									
									$materials = array();
									
									$supplier->setSupplierId($infP['supplierId']);
									$card['material'] = utf8_encode($supplier->GetNameById());
									
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
									
								}//else
								
								$res5['cantidad'] = $cantidad;
								$res5['price'] = $sumPrice;
								$totCant5 += $cantidad;
								
								$total5 += $total;
								$descriptions[] = $res5;
								
							}//foreach resDesc
							
							$total4 += $total5;
																					
							$card4['descriptions'] = $descriptions;
							$card4['total'] = $total5;
												
							$concepts[] = $card4;
							
						}//foreach resConceps
																								
						$card3['concepts'] = $concepts;
						
						/************ Conceptos sin Conceptos *******************/
						
						$concepts = array();
												
						$cuantificacion->setConceptConId($res4['conceptConId']);
						$resDesc = $cuantificacion->EnumConcepts0ByProjRes();
						
						$totCant5 = 0;
						$total5 = 0;					
						$descriptions = array();
						foreach($resDesc as $res5){
							
							$res5 = $util->EncodeRow($res5);
							
							$cuantificacion->setConceptId($res5['conceptId']);
							$cantidad = $cuantificacion->GetTotalQtyConcept();
																					
							$concept->setConceptId($res5['conceptId']);
							$infC = $concept->Info();
							
							$unit->setUnitId($infC['unitId']);
							$res5['unit'] = $unit->GetClaveById();
							
							$sumPrice = 0;
							if($res5['tipo'] == 'Obra'){
							
								$conceptMat->setConceptId($res5['conceptId']);
								$total = $conceptMat->GetTotalPrice();
								$total *= $cantidad;
								
								$totalInvoice = $total;
								if($conIva == "0"){
									$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
									$total = number_format($totalInvoice,2,'.',''); 
								}
								
								$res5['total'] = $total;
								
								$resMaterials = $conceptMat->EnumerateAll();
								
								$materials = array();
								foreach($resMaterials as $m){
									$matPrice->setMaterialId($m['materialId']);
									$infP = $matPrice->GetMatPriceDefault();
									
									//$infP['price'] = $infP['total'];
									
									$totalInvoice = $infP['price'];
									if($conIva == "0"){
										$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
										$infP['price'] = number_format($totalInvoice,2,'.',''); 
									}
											
									$material->setMaterialId($m['materialId']);
									$infM = $material->Info();
									
									$unit->setUnitId($infM['unitId']);
									$m['unit'] = $unit->GetClaveById();
									$m['price'] = $infP['price'];
									
									$sumPrice += $infP['price'];
									
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
								
								$sumPrice = $infP['unitPrice'];
		
								$price = $infP['unitPrice'];
								
								$totalInvoice = $price;
								if($conIva == "0"){
									$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
									$price = number_format($totalInvoice,2,'.',''); 
								}
								
								$res5['price'] = $price;
								
								$total = $price * $cantidad;						
								$res5['total'] = $total;
															
							}else{
								
								$conceptPrice->setConceptId($res5['conceptId']);
								$infP = $conceptPrice->GetPriceDefault();
								
								//$infP['price'] = $infP['total'];
								
								$totalInvoice = $infP['price'];
								if($conIva == "0"){
									$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
									$infP['price'] = number_format($totalInvoice,2,'.',''); 
								}
										
								$sumPrice = $infP['price'];	
								$total = $infP['price'];
								
								$materials = array();
								
								$supplier->setSupplierId($infP['supplierId']);
								$card['material'] = utf8_encode($supplier->GetNameById());
								
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
								
							}//else
							
							$res5['cantidad'] = $cantidad;
							$res5['price'] = $sumPrice;
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
						
						$res5 = $util->EncodeRow($res5);
						
						$cuantificacion->setConceptId($res5['conceptId']);
						$cantidad = $cuantificacion->GetTotalQtyConcept2();
						
						$concept->setConceptId($res5['conceptId']);
						$infC = $concept->Info();
						
						$unit->setUnitId($infC['unitId']);
						$res5['unit'] = $unit->GetClaveById();
						
						$sumPrice = 0;
						if($res5['tipo'] == 'Obra'){
						
							$conceptMat->setConceptId($res5['conceptId']);
							$total = $conceptMat->GetTotalPrice();
							$total *= $cantidad;
							
							$totalInvoice = $total;
							if($conIva == "0"){
								$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
								$total = number_format($totalInvoice,2,'.',''); 
							}
							
							$res5['total'] = $total;
							
							$resMaterials = $conceptMat->EnumerateAll();
							
							$materials = array();
							foreach($resMaterials as $m){
								$matPrice->setMaterialId($m['materialId']);
								$infP = $matPrice->GetMatPriceDefault();
								
								//$infP['price'] = $infP['total'];
								
								$totalInvoice = $infP['price'];
								if($conIva == "0"){
									$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
									$infP['price'] = number_format($totalInvoice,2,'.',''); 
								}
											
								$material->setMaterialId($m['materialId']);
								$infM = $material->Info();
								
								$unit->setUnitId($infM['unitId']);
								$m['unit'] = $unit->GetClaveById();
								$m['price'] = $infP['price'];
								
								$sumPrice += $infP['price'];
								
								$totalM = $infP['price'] * $m['quantity'];
								$totalM *= $cantidad;
								
								$m['quantity'] *= $cantidad;
								
								if($showPrecio)
									$m['total'] = $totalM;
								
								$materials[] = $m;
							}
							$res5['materials'] = $materials;
						
						}elseif($res5['tipo'] == 'Servicio'){
				
							$cuantificacion->setProjectId($res['projectId']);
							$cuantificacion->setConceptId($res5['conceptId']);
							$infP = $cuantificacion->InfoByConceptId();
							
							$sumPrice = $infP['unitPrice'];
							
							$price = $infP['unitPrice'];
														
							$totalInvoice = $price;
							if($conIva == "0"){
								$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
								$price = number_format($totalInvoice,2,'.',''); 
							}
							
							$res5['price'] = $price;
							
							$total = $price * $cantidad;						
							$res5['total'] = $total;
														
						}else{
							
							$conceptPrice->setConceptId($res5['conceptId']);
							$infP = $conceptPrice->GetPriceDefault();
							
							//$infP['price'] = $infP['total'];
							
							$totalInvoice = $infP['price'];
							if($conIva == "0"){
								$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
								$infP['price'] = number_format($totalInvoice,2,'.',''); 
							}
							
							$total = $infP['price'];
							
							$sumPrice = $infP['price'];
							
							$materials = array();
							
							$supplier->setSupplierId($infP['supplierId']);
							$card['material'] = utf8_encode($supplier->GetNameById());
							
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
							
						}//else
						
						$res5['cantidad'] = $cantidad;
						$res5['price'] = $sumPrice;
						$totCant5 += $cantidad;
						
						$total5 += $total;
						$descriptions[] = $res5;
						
					}//foreach resDesc
					
					$total4 += $total5;
																			
					$card4['descriptions'] = $descriptions;
					$card4['total'] = $total5;
										
					$concepts[] = $card4;				
					
					$total3 += $total4;
																	
					$card3['concepts'] = $concepts;						
					$card3['total'] = $total4;
					
					if(count($descriptions))
						$subcategories[] = $card3;				
					
					$total2 += $total3;
															
					$card2['subcategories2'] = $subcategories;
					$card2['total'] = $total3;
					
					/*** Fin Conceptos Sin Subcategorias ***/
					
					$categories[] = $card2;
					
				}//foreach	
				
				$card['categories'] = $categories;								
				$card['total'] = $total2;
				
				$items[] = $card;
				
			}//foreach
			$projects['items'] = $items;
			
			echo 'ok[#]';
			
			$smarty->assign('showPrecio', $showPrecio);
			$smarty->assign('projects', $projects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			
			if($showPrecio)
				$smarty->display(DOC_ROOT.'/templates/lists/concept-resumen.tpl');
			else
				$smarty->display(DOC_ROOT.'/templates/lists/concept-resumen2.tpl');
			
		break;
	
	case 'loadItemsPage':
			
			$_SESSION['itemsPg'] = $_POST['items'];
			
			echo 'ok[#]';
			
		break;
			
}

?>
