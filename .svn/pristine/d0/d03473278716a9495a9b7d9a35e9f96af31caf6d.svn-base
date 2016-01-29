<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
		
	$projectId = $_GET['projectId'];
	$_SESSION['projectId'] = $projectId;
	$projP = $_SESSION['projP'];
	
	if(!isset($_SESSION['ejesL'])){
	
		$projEje->setProjectId($projectId);	
		$resL = $projEje->EnumerateL();
		foreach($resL as $res){
			$card['id'] = $res['projEjeLId'];
			$card['letra'] = $res['letra'];
			
			$ejesL[] = $card;
		}
		
		$_SESSION['ejesL'] = $ejesL;
		
	}else{
		$ejesL = $_SESSION['ejesL'];
	}
	
	$card = array();
	
	if(!isset($_SESSION['ejesN'])){
		$resN = $projEje->EnumerateN();
		foreach($resN as $res){
			$card['id'] = $res['projEjeNId'];
			$card['numero'] = $res['numero'];
			
			$ejesN[] = $card;
		}
		
		$_SESSION['ejesN'] = $ejesN;
		
	}else{
		$ejesN = $_SESSION['ejesN'];
	}
	
	$project->setProjectId($projectId);
	$nomProyect = $project->GetNameById();
	
	$smarty->assign('nomProyect', $nomProyect);		
	$smarty->assign('ejesL', $ejesL);
	$smarty->assign('ejesN', $ejesN);
	$smarty->assign('projectId', $projectId);
	$smarty->assign('projP', $projP);
	$smarty->assign('mainMnu','proyectos');
						
?>