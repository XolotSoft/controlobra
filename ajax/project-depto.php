<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projDeptoP'];

switch($_POST['type'])
{
	case 'addDepto': 
		
		$projLevelId = $_POST['projLevelId'];
		
		$projLevel->setProjLevelId($projLevelId);
		$info = $projLevel->Info();
		
		$projectId = $info['projectId'];
		
		$projType->setProjectId($projectId);
		$types = $projType->EnumerateAll();
		$types = $util->EncodeResult($types);
		
		//Nombres
		
		$projLevel->setProjLevelId($projLevelId);
		$infoL = $projLevel->Info();
		$nomNivel = $infoL['level'].' - '.$infoL['name'];
		
		$projItem->setProjItemId($info['projItemId']);
		$info = $projItem->Info();
		$nomTorre = $info['name'];
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();	
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('nomTorre', $nomTorre);
		$smarty->assign('nomNivel', $nomNivel);
		$smarty->assign('projLevelId', $projLevelId);
		$smarty->assign('types', $types);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-depto-popup.tpl');
				
		break;	

	case 'editDepto':
		
		$projDepto->setProjDeptoId($_POST['id']);
		$info = $projDepto->Info();		
		$info = $util->EncodeRow($info);
		
		$projectId = $info['projectId'];
		
		$projType->setProjectId($projectId);
		$types = $projType->EnumerateAll();
		$types = $util->EncodeResult($types);
		
		//Nombres
		
		$projLevel->setProjLevelId($info['projLevelId']);
		$infoL = $projLevel->Info();
		$nomNivel = $infoL['level'].' - '.$infoL['name'];
		
		$projItem->setProjItemId($info['projItemId']);
		$infoI = $projItem->Info();
		$nomTorre = $infoI['name'];
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();	
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('nomTorre', $nomTorre);
		$smarty->assign('nomNivel', $nomNivel);
		$smarty->assign('types', $types);		
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-depto-popup.tpl');
		
		break;
		
	case 'saveAddDepto':				
		
		$projLevelId = $_POST['projLevelId'];
		
		$projLevel->setProjLevelId($projLevelId);
		$info = $projLevel->Info();
		$projItemId = $info['projItemId'];	
		$projectId = $info['projectId'];
		
		$projDepto->setProjLevelId($projLevelId);
		$projDepto->setProjItemId($projItemId);
		$projDepto->setProjectId($projectId);
		$projDepto->setProjTypeId($_POST['projTypeId']);
		$projDepto->setName($_POST['name']);		
									
		if(!$projDepto->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projLevelId;
			echo '[#]';
			$projDepto->setProjLevelId($projLevelId);						
			$resDeptos = $projDepto->EnumerateAll();
				
			$deptos = array();
			foreach($resDeptos as $dep){					
				$infD = $dep;
				
				$projType->setProjTypeId($dep['projTypeId']);
				$infD['type'] = $projType->GetNameById();
				
				$deptos[] = $infD;
			}				
			$itm['deptos'] = $util->EncodeResult($deptos);
			
			$smarty->assign('itm', $itm);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-depto.tpl');
		}		
		
		break;
		
	case 'saveEditDepto':	 	
		
		$projDepto->setProjDeptoId($_POST['id']);
		$projDepto->setProjTypeId($_POST['projTypeId']);
		$projDepto->setName($_POST['name']);
				
		$info = $projDepto->Info();
		$projLevelId = $info['projLevelId'];
		
		if(!$projDepto->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projLevelId;
			echo '[#]';
			$projDepto->setProjLevelId($projLevelId);			
			$resDeptos = $projDepto->EnumerateAll();
				
			$deptos = array();
			foreach($resDeptos as $dep){					
				$infD = $dep;
				
				$projType->setProjTypeId($dep['projTypeId']);
				$infD['type'] = $projType->GetNameById();
				
				$deptos[] = $infD;
			}				
			$itm['deptos'] = $util->EncodeResult($deptos);
									
			$smarty->assign('itm', $itm);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-depto.tpl');
		}
			
		break;
	
	case 'deleteDepto':
		
		$projDepto->setProjDeptoId($_POST['id']);	
		$info = $projDepto->Info();
		$projLevelId = $info['projLevelId'];
		
		if(!$projDepto->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projLevelId;
			echo '[#]';
			$projDepto->setProjLevelId($projLevelId);			
			$resDeptos = $projDepto->EnumerateAll();
				
			$deptos = array();
			foreach($resDeptos as $dep){					
				$infD = $dep;
				
				$projType->setProjTypeId($dep['projTypeId']);
				$infD['type'] = $projType->GetNameById();
				
				$deptos[] = $infD;
			}				
			$itm['deptos'] = $util->EncodeResult($deptos);
									
			$smarty->assign('itm', $itm);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-depto.tpl');
		}
			
		break;	
	
}

?>
