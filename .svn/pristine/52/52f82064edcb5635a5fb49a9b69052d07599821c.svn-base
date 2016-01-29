<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projLevelP'];

switch($_POST['type'])
{
	case 'addLevel': 
		
		$projItemId = $_POST['projItemId'];
		
		$projItem->setProjItemId($projItemId);
		$info = $projItem->Info();
		$nomTorre = $info['name'];
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();	
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('nomTorre', $nomTorre);
		$smarty->assign('projItemId', $projItemId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-level-popup.tpl');
				
		break;	

	case 'editLevel':
		
		$projLevel->setProjLevelId($_POST['id']);
		$info = $projLevel->Info();		
		$info = $util->EncodeRow($info);
		
		$projItem->setProjItemId($info['projItemId']);
		$infoI = $projItem->Info();
		$nomTorre = $infoI['name'];
		
		$project->setProjectId($infoI['projectId']);
		$nomProy = $project->GetNameById();	
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('nomTorre', $nomTorre);				
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-level-popup.tpl');
		
		break;
		
	case 'saveAddLevel':				
		
		$projItemId = $_POST['projItemId'];
		
		$projItem->setProjItemId($projItemId);
		$info = $projItem->Info();		
		$projectId = $info['projectId'];
		
		$projLevel->setProjItemId($projItemId);
		$projLevel->setProjectId($projectId);
		$projLevel->setLevel($_POST['level']);
		$projLevel->setName($_POST['name']);		
									
		if(!$projLevel->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projItemId;
			echo '[#]';
			$projLevel->setProjItemId($projItemId);			
			$it['levels'] = $projLevel->EnumerateAll();		
									
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-level.tpl');
		}		
		
		break;
		
	case 'saveEditLevel':	 	
		
		$projLevel->setProjLevelId($_POST['id']);	
		$projLevel->setLevel($_POST['level']);
		$projLevel->setName($_POST['name']);
				
		$info = $projLevel->Info();
		$projItemId = $info['projItemId'];
		
		if(!$projLevel->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projItemId;
			echo '[#]';
			$projLevel->setProjItemId($projItemId);			
			$it['levels'] = $projLevel->EnumerateAll();		
									
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-level.tpl');
		}
			
		break;
	
	case 'deleteLevel':
		
		$projLevel->setProjLevelId($_POST['id']);	
		$info = $projLevel->Info();
		$projItemId = $info['projItemId'];
		
		if(!$projLevel->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projItemId;
			echo '[#]';
			$projLevel->setProjItemId($projItemId);			
			$it['levels'] = $projLevel->EnumerateAll();		
									
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-level.tpl');
		}
			
		break;	
	
}

?>
