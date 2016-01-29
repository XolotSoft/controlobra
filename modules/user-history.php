<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['histP'] = $p;
	
	$user->SetPage($p);	
	$history = $user->EnumHistory();
	
	$items = array();
	foreach($history['items'] as $res){
		
		if($res['tipo'] == 'Personal'){
			$personal->setPersonalId($res['userId']);
			$res['user'] = $personal->GetNameById();
		}else{
			$user->setUserId($res['userId']);
			$res['user'] = $user->GetNameById();
		}
		
		$items[] = $res;
	}
	$history['items'] = $items;

	$smarty->assign('history', $history);
	$smarty->assign('mainMnu','catalogos');
			
?>