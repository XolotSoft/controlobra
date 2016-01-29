<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
				
	$projectId = $_SESSION['curProjId'];
						
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
	$smarty->assign('mainMnu','resumenes');
			
?>