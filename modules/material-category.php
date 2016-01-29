<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['matCatP'] = $p;
	
	$matCat->SetPage($p);
	$categories = $matCat->Enumerate();	
	
	$items = array();
	foreach($categories['items'] as $res){
		$card = $res;
		
		$matSubcat->setMatCatId($res['matCatId']);
		$resSubcats = $matSubcat->EnumerateAll();
		
		$subcategories = array();
		foreach($resSubcats as $res){
			
			$matConcept->setMatSubcatId($res['matSubcatId']);
			$res['concepts'] = $matConcept->EnumerateAll();
			
			$subcategories[] = $res;
		}
		
		$card['subcategories'] = $subcategories;
		
		$items[] = $card;
	}
	$categories['items'] = $items;
	
	$smarty->assign('categories', $categories);
	$smarty->assign('mainMnu','materiales');
			
?>