<?php
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	session_start();
	
	$projectId = $_SESSION['curProjId'];
	
	$project->setProjectId($projectId);
	$info = $project->Info();
	
	$project->setProjectId($projectId);
	$info['mtsTotVta'] = $project->GetMtsTotalesVta();	
	$info['mtsTotVen'] = $project->GetMtsTotalesVen();
	$info['mtsTotXVen'] = $info['mtsTotVta'] - $info['mtsTotVen'];
	$info['avanceVtas1'] = ($info['mtsTotVen'] / $info['mtsTotVta']) * 100;
	
	$projDepto->setProjectId($projectId);
	$info['totDeptos'] = $projDepto->GetTotalDeptosVta();
	$contract->setProjectId($projectId);
	$info['totDeptosVen'] = $contract->GetTotalDeptosVen();
	$info['totDeptosXVen'] = $info['totDeptos'] - $info['totDeptosVen'];
	$info['avanceVtas2'] = ($info['totDeptosVen'] / $info['totDeptos']) * 100;
	
	$contract->setProjectId($projectId);
	$info['totalVend'] = $contract->GetTotalVendido();
	$info['promVtaM2'] = $info['totalVend'] / $info['mtsTotVen'];
	
	$info['totVtaProy'] = $info['valPromM2'] * $info['mtsTotVta'];	
	$info['vtaAlcMeta'] = ($info['totVtaProy'] - $info['totalVend']) /  $info['mtsTotXVen'];	
	$info['totVtaProm'] = $info['totalVend'] + ($info['promVtaM2'] * $info['mtsTotXVen']);
	$info['difMeta'] = $info['totVtaProm']  - $info['totVtaProy'];	
	
	$smarty->assign('info', $info);
	$smarty->assign('mainMnu','resumenes');

?>