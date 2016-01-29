<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['bnkP'] = $p;
	
	$bank->SetPage($p);	
	$banks = $bank->Enumerate();	
	$result = $banks['items'];
			
	$items = array();
	foreach($result as $res){
		$card = $res;
		
		$saldo = $res['startBalance'] - $res['currentBalance'];
		$card['saldo'] = number_format($saldo,2);
		
		$card['startBalance'] = number_format($res['startBalance'],2);
		
		$bank->setBankId($res['bankId']);
		$resProjects = $bank->GetProjects();
		
		$projects = array();
		foreach($resProjects as $proj){
			$project->setProjectId($proj['projectId']);
			$projects[] = $project->GetNameById();
		}		
		$card['projects'] = $projects;
		
		$items[] = $card;
	}
	$banks['items'] = $items;
	
	$smarty->assign('banks', $banks);
	$smarty->assign('mainMnu','catalogos');
			
?>