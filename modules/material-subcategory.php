<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */

	$p = intval($_GET['p']);
	$matCatP = $_SESSION['matCatP'];
	$_SESSION['matSubcatP'] = $p;
	
	$matCatId = $_SESSION['matCatId'];
	
	$matCat->setMatCatId($matCatId);
	$nomCat = $matCat->GetNameById();
	
	$matSubcat->SetPage($p);
	$matSubcat->setMatCatId($matCatId);
	$subcategories = $matSubcat->Enumerate();	
		
	$smarty->assign('subcategories', $subcategories);				
	$smarty->assign('nomCat', $nomCat);
	$smarty->assign('matCatP', $matCatP);
	$smarty->assign('mainMnu','materiales');
			
?>