<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projItemP'];

switch($_POST['type'])
{
	case 'addItem': 
		
		$projectId = $_POST['projectId'];
		
		$project->setProjectId($projectId);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('projectId', $projectId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-item-popup.tpl');
				
		break;	

	case 'editItem':
		
		$projItem->setProjItemId($_POST['id']);
		$info = $projItem->Info();		
		$info = $util->EncodeRow($info);
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-item-popup.tpl');
		
		break;
		
	case 'saveAddItem':				
		
		$projectId = $_POST['projectId'];
		
		$projItem->setProjectId($projectId);
		$projItem->setName($_POST['name']);
									
		if(!$projItem->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			
			$project->setProjectId($projectId);
			$project->AddItemTotal();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projectId;
			echo '[#]';
			$projItem->setProjectId($projectId);			
			$items = $projItem->EnumerateAll();
			$item['items'] = $util->EncodeResult($items);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-item.tpl');
		}		
		
		break;
		
	case 'saveEditItem':	 	
		
		$projItem->setProjItemId($_POST['id']);	
		$projItem->setName($_POST['name']);
		
		$info = $projItem->Info();
		$projectId = $info['projectId'];
									
		if(!$projItem->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projectId;
			echo '[#]';
			$projItem->setProjectId($projectId);
			$items = $projItem->EnumerateAll();
			$item['items'] = $util->EncodeResult($items);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-item.tpl');
		}
			
		break;
	
	case 'deleteItem':
		
		$projItem->setProjItemId($_POST['id']);
		
		$info = $projItem->Info();
		$projectId = $info['projectId'];
				
		if(!$projItem->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			$project->setProjectId($projectId);
			$project->RemoveItemTotal();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projectId;
			echo '[#]';			
			$projItem->setProjectId($projectId);
			$items = $projItem->EnumerateAll();
			$item['items'] = $util->EncodeResult($items);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-item.tpl');
		}
			
		break;			
	
}

?>