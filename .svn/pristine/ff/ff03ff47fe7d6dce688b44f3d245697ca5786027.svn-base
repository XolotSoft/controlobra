<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['catP'] = $p;
	
	$category->SetPage($p);
	$categories = $category->Enumerate();	
	
	$items = array();
	foreach($categories['items'] as $res){
		$card = $res;
		
		$subcategory->setCategoryId($res['categoryId']);
		$resSubcats = $subcategory->EnumerateAll();
				
		$subcategories = array();
		foreach($resSubcats as $res){
			
			$conceptCon->setsubcategoryId($res['subcategoryId']);
			$res['concepts'] = $conceptCon->EnumerateAll();
			
			$subcategories[] = $res;
		}		
		$card['subcategories'] = $subcategories;
		
		$items[] = $card;
	}
	$categories['items'] = $items;
					
	$smarty->assign('categories', $categories);
	$smarty->assign('mainMnu','catalogos');
			
?>