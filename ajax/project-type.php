<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projTypeP'];

switch($_POST['type'])
{
	case 'addType': 
		
		$projectId = $_POST['projectId'];
		
		$project->setProjectId($projectId);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('projectId', $projectId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-type-popup.tpl');
				
		break;	

	case 'editType':
		
		$projType->setProjTypeId($_POST['id']);
		$info = $projType->Info();		
		$info = $util->EncodeRow($info);
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-type-popup.tpl');
		
		break;
		
	case 'saveAddType':				
		
		$projectId = $_POST['projectId'];
		
		$projType->setProjectId($projectId);
		$projType->setName($_POST['name']);
		$projType->setRedondeo($_POST['redondeo']);
		$projType->setComunArea($_POST['comunArea']);
		$projType->setRealArea($_POST['realArea']);
		$projType->setVentaArea($_POST['ventaArea']);
		$projType->setTerrazaReal($_POST['terrazaReal']);
		$projType->setTerrazaComun($_POST['terrazaComun']);
		$projType->setJardinReal($_POST['jardinReal']);
		$projType->setJardinComun($_POST['jardinComun']);
		$projType->setColor($_POST['color']);
		$projType->setAbierta($_POST['abierta']);
		
		if(!$projType->Save())
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
			$projType->setProjectId($projectId);			
			$types = $projType->EnumerateAll();
			$item['types'] = $util->EncodeResult($types);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-type.tpl');
		}		
		
		break;
		
	case 'saveEditType':	 	
		
		$projType->setProjTypeId($_POST['id']);	
		$projType->setName($_POST['name']);
		$projType->setRedondeo($_POST['redondeo']);
		$projType->setComunArea($_POST['comunArea']);
		$projType->setRealArea($_POST['realArea']);
		$projType->setVentaArea($_POST['ventaArea']);
		$projType->setTerrazaReal($_POST['terrazaReal']);
		$projType->setTerrazaComun($_POST['terrazaComun']);
		$projType->setJardinReal($_POST['jardinReal']);
		$projType->setJardinComun($_POST['jardinComun']);
		$projType->setColor($_POST['color']);
		$projType->setAbierta($_POST['abierta']);
		
		$info = $projType->Info();
		$projectId = $info['projectId'];
									
		if(!$projType->Update())
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
			$projType->setProjectId($projectId);
			$types = $projType->EnumerateAll();
			$item['types'] = $util->EncodeResult($types);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-type.tpl');
		}
			
		break;
	
	case 'deleteType':
		
		$projType->setProjTypeId($_POST['id']);
		
		$info = $projType->Info();
		$projectId = $info['projectId'];
				
		if(!$projType->Delete())
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
			$projType->setProjectId($projectId);
			$types = $projType->EnumerateAll();
			$item['types'] = $util->EncodeResult($types);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-type.tpl');
		}
			
		break;
	
	/*** SUBTYPES ***/
	
	case 'addSubType': 
		
		$projTypeId = $_POST['projTypeId'];
		
		$projType->setProjTypeId($projTypeId);
		$info = $projType->Info();
		
		$projectId = $info['projectId'];
		
		$project->setProjectId($projectId);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('projTypeId', $projTypeId);
		$smarty->assign('projectId', $projectId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-subtype-popup.tpl');
				
		break;
	
	case 'saveAddSubType':				
		
		$projectId = $_POST['projectId'];
		$projTypeId = $_POST['projTypeId'];
		
		$projType->setProjectId($projectId);
		$projType->setProjTypeId($projTypeId);
		$projType->setName($_POST['name']);
		$projType->setRedondeo($_POST['redondeo']);
		$projType->setComunArea($_POST['comunArea']);
		$projType->setRealArea($_POST['realArea']);
		$projType->setVentaArea($_POST['ventaArea']);
		$projType->setTerrazaReal($_POST['terrazaReal']);
		$projType->setTerrazaComun($_POST['terrazaComun']);
		$projType->setJardinReal($_POST['jardinReal']);
		$projType->setJardinComun($_POST['jardinComun']);
		$projType->setColor($_POST['color']);
		$projType->setAbierta($_POST['abierta']);
		
		if(!$projType->SaveSubType())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{					
			$util->setError(10117,'complete');
			$util->PrintErrors();
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projTypeId;
			echo '[#]';
			$projType->setProjTypeId($projTypeId);			
			$subtypes = $projType->EnumSubTypesAll();
			$it['subtypes'] = $util->EncodeResult($subtypes);
					
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-subtype.tpl');
		}		
		
		break;	
	
	case 'editSubType':
		
		$projType->setProjSubTypeId($_POST['id']);
		$info = $projType->InfoSubType();		
		$info = $util->EncodeRow($info);
		
		$project->setProjectId($info['projectId']);
		$nomProy = $project->GetNameById();
		
		$smarty->assign('nomProy', $nomProy);
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-subtype-popup.tpl');
		
		break;
	
	case 'saveEditSubType':	 	
		
		$projSubTypeId = $_POST['id'];
				
		$projType->setProjSubTypeId($projSubTypeId);	
		$projType->setName($_POST['name']);
		$projType->setRedondeo($_POST['redondeo']);
		$projType->setComunArea($_POST['comunArea']);
		$projType->setRealArea($_POST['realArea']);
		$projType->setVentaArea($_POST['ventaArea']);
		$projType->setTerrazaReal($_POST['terrazaReal']);
		$projType->setTerrazaComun($_POST['terrazaComun']);
		$projType->setJardinReal($_POST['jardinReal']);
		$projType->setJardinComun($_POST['jardinComun']);
		$projType->setColor($_POST['color']);
		$projType->setAbierta($_POST['abierta']);
		
		$info = $projType->InfoSubType();
		$projectId = $info['projectId'];
		$projTypeId = $info['projTypeId'];
		
		if(!$projType->UpdateSubType())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			$util->setError(10118,'complete');
			$util->PrintErrors();
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $projTypeId;
			echo '[#]';
			$projType->setProjTypeId($projTypeId);			
			$subtypes = $projType->EnumSubTypesAll();
			$it['subtypes'] = $util->EncodeResult($subtypes);
					
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-subtype.tpl');
		}
			
		break;		
	
	case 'deleteSubType':				
		
		$projSubTypeId = $_POST['id'];
		
		$projType->setProjSubTypeId($projSubTypeId);
		$info = $projType->InfoSubType();
		
		$projTypeId = $info['projTypeId'];
				
		if(!$projType->DeleteSubType())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{					
			$util->setError(10119,'complete');
			$util->PrintErrors();
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo '[#]';
			echo $projTypeId;
			echo '[#]';
			$projType->setProjTypeId($projTypeId);			
			$subtypes = $projType->EnumSubTypesAll();
			$it['subtypes'] = $util->EncodeResult($subtypes);
					
			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/project-subtype.tpl');
		}		
		
		break;
	
}//switch

?>