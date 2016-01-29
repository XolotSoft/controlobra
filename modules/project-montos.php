<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
		
	$projectId = $_GET['projectId'];
	$_SESSION['projectId'] = $projectId;
	$projP = $_SESSION['projP'];
	
	//Equipamiento
	
	if(!isset($_SESSION['mtoEquip'])){
	
		$projEquip->setProjectId($projectId);	
		$resEquip = $projEquip->Enumerate();
		foreach($resEquip as $res){
			$card['id'] = $res['projEquipId'];
			$card['quantity'] = $res['quantity'];
			$card['currency'] = $res['currency'];
			
			$mtoEquip[] = $card;
		}
		
		$_SESSION['mtoEquip'] = $mtoEquip;
		
	}else{
		$mtoEquip = $_SESSION['mtoEquip'];
	}
	
	//Mantenimiento
	
	$card = array();	
	if(!isset($_SESSION['mtoMant'])){
		$projMant->setProjectId($projectId);
		$resMant = $projMant->Enumerate();
		foreach($resMant as $res){
			$card['id'] = $res['projMantId'];
			$card['quantity'] = $res['quantity'];
			$card['currency'] = $res['currency'];
			
			$mtoMant[] = $card;
		}
		
		$_SESSION['mtoMant'] = $mtoMant;
		
	}else{
		$mtoMant = $_SESSION['mtoMant'];
	}
	
	$project->setProjectId($projectId);
	$nomProyect = $project->GetNameById();
	
	$smarty->assign('nomProyect', $nomProyect);		
	$smarty->assign('mtoEquip', $mtoEquip);
	$smarty->assign('mtoMant', $mtoMant);
	$smarty->assign('projectId', $projectId);
	$smarty->assign('projP', $projP);
	$smarty->assign('mainMnu','proyectos');
						
?>