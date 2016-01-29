<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
		
	$projectId = $_GET['projectId'];
	$_SESSION['projectId'] = $projectId;
	$projP = $_SESSION['projP'];
	
	//Bodegas
	
	if(!isset($_SESSION['bodegas'])){
	
		$projBodega->setProjectId($projectId);	
		$resBodega = $projBodega->EnumerateAll();
		foreach($resBodega as $res){
			$card['id'] = $res['projBodegaId'];
			$card['name'] = $res['name'];
			
			$bodegas[] = $card;
		}
		
		$_SESSION['bodegas'] = $bodegas;
		
	}else{
		$bodegas = $_SESSION['bodegas'];
	}
	
	//Cajones de Est.
	
	$card = array();	
	if(!isset($_SESSION['cajones'])){
		$projCajon->setProjectId($projectId);
		$resCajon = $projCajon->EnumerateAll();
		foreach($resCajon as $res){
			$card['id'] = $res['projCajonId'];
			$card['name'] = $res['name'];
			
			$cajones[] = $card;
		}
		
		if(count($cajones))
			$cajones = $util->orderMultiDimensionalArray($cajones, 'name');
		
		$_SESSION['cajones'] = $cajones;
		
	}else{
		$cajones = $_SESSION['cajones'];
	}
	
	$project->setProjectId($projectId);
	$nomProyect = $project->GetNameById();
	
	$smarty->assign('nomProyect', $nomProyect);		
	$smarty->assign('bodegas', $bodegas);
	$smarty->assign('cajones', $cajones);
	$smarty->assign('projectId', $projectId);
	$smarty->assign('projP', $projP);
	$smarty->assign('mainMnu','proyectos');
						
?>