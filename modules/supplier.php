<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['supP'] = $p;
	
	$supplier->SetPage($p);	
	$suppliers = $supplier->Enumerate();
	$result = $suppliers['items'];
	
	$items = array();
	foreach($result as $res){
		$card = $res;
		
		$supplier->setSupplierId($res['supplierId']);
		$card['projects'] = $supplier->EnumProjects();
		
		$resProjProv = $project->EnumerateAll();		
		$projProv = array();
		foreach($resProjProv as $val){
			
			$supplier->setSupplierId($res['supplierId']);
			$supplier->setProjectId($val['projectId']);
			$inf = $supplier->GetSupProjInfo();
			
			$val['pdf'] = $inf['pdf'];
			$val['supProjId'] = $inf['supProjId'];
			
			$projProv[] = $val;
		}		
		$card['projProv'] = $projProv;
		
		$items[] = $card;
	}
	$suppliers['items'] = $items;
	
	$smarty->assign('suppliers', $suppliers);
	$smarty->assign('mainMnu','catalogos');
			
?>