<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['conP'] = $p;
	
	if(!isset($_SESSION['itemsPg']))
		$_SESSION['itemsPg'] = 25;
	
	$itemsPage = $_SESSION['itemsPg'];
	
	$concept->setPage($p);
	$concept->setItemsPage($itemsPage);
	$concepts = $concept->Enumerate();	
	$result = $concepts['items'];

	$items = array();
	foreach($result as $res){
		$card = $res;
		
		$category->setCategoryId($res['categoryId']);
		$card['category'] = $category->GetNameById();
		
		$subcategory->setSubcategoryId($res['subcategoryId']);
		$card['subcategory'] = $subcategory->GetNameById();
		
		if($card['conceptConId']){
			$conceptCon->setConceptConId($res['conceptConId']);
			$card['concept'] = $conceptCon->GetNameById();
		}
		
		$unit->setUnitId($res['unitId']);
		$card['unit'] = $unit->GetClaveById();
		
		if($res['tipo'] == 'Subcontrato'){
			
			$conceptPrice->setConceptId($res['conceptId']);
			$resPrices = $conceptPrice->EnumerateAll();
			
			$totalP = 0;
			$prices = array();
			foreach($resPrices as $val){
				$cardP = $val;
				
				$cardP['fecha'] = date('d-m-Y',strtotime($cardP['fecha']));
				
				$supplier->setSupplierId($val['supplierId']);
				$cardP['supplier'] = $supplier->GetNameById();
				
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
			
			$card['materials'] = $materials;		
			$card['total'] = number_format($total,2);
			
		}
				
		$items[] = $card;
	}			
	$concepts['items'] = $items;
	
	$_SESSION['materiales'] = '';
	unset($_SESSION['materiales']);
	
	$_SESSION['conceptPrices'] = '';
	unset($_SESSION['conceptPrices']);
	
	$categorias = $category->EnumerateAll();
	
	$smarty->assign('categorias', $categorias);
	$smarty->assign('concepts', $concepts);
	$smarty->assign('itemsPage', $itemsPage);
	$smarty->assign('mainMnu','conceptos');
			
?>