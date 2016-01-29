<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['matP'] = $p;
	
	if(!isset($_SESSION['itemsPg']))
		$_SESSION['itemsPg'] = 25;
	
	$itemsPage = $_SESSION['itemsPg'];
	
	$material->setPage($p);
	$material->setItemsPage($itemsPage);
	$materials = $material->Enumerate();	
	$result = $materials['items'];
	
	$items = array();
	foreach($result as $res){
		$card = $res;
		
		$category->setCategoryId($res['categoryId']);
		$infC = $category->Info();
		
		$card['noCat'] = $infC['noCat'];
		$card['category'] = $infC['name'];
		
		$subcategory->setSubcategoryId($res['subcategoryId']);
		$card['subcategory'] = $subcategory->GetNameById();
		
		$conceptCon->setConceptConId($res['conceptConId']);
		$card['concept'] = $conceptCon->GetNameById();
		
		$unit->setUnitId($res['unitId']);
		$card['unit'] = $unit->GetClaveById();
		
		$matPrice->setMaterialId($res['materialId']);
		$resPrices = $matPrice->EnumerateAll();
		
		$precios = array();
		foreach($resPrices as $val){
			$cardP = $val;
			
			$supplier->setSupplierId($val['supplierId']);
			$cardP['supplier'] = $supplier->GetNameById();
			
			$cardP['fecha'] = date('d-m-Y',strtotime($val['fecha']));
			
			$precios[] = $cardP;
		}
		$card['prices'] = $precios;
				
		$items[] = $card;
	}			
	$materials['items'] = $items;
	
	$categorias = $category->EnumerateAll();
	
	$smarty->assign('categorias',$categorias);
	$smarty->assign('materials', $materials);
	$smarty->assign('itemsPage', $itemsPage);
	$smarty->assign('mainMnu','materiales');
			
?>