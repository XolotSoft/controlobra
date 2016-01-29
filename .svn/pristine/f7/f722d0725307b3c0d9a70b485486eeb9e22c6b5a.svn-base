<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['staP'];

switch($_POST['type'])
{
	case 'addState': 
			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-state-popup.tpl');
		
		break;	
		
	case 'saveAddState':
			
			$state->setName($_POST['name']);			
			
			$stateId = $state->Save();
											
			if(!$stateId)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data
				$user->setModule('Estados');
				$user->setAction('Agregar');
				$user->setItemId($stateId);
				$user->SaveHistory();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$states = $state->Enumerate();
				$states['items'] = $util->EncodeResult($states['items']);
				
				$smarty->assign('states', $states);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/state.tpl');
			}
			
		break;
		
	case 'deleteState':
			
			$stateId = $_POST['stateId'];
			
			$state->setStateId($stateId);
			if($state->Delete())
			{
				//Save History Data
				$user->setModule('Estados');
				$user->setAction('Eliminar');
				$user->setItemId($stateId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo '[#]';
				$state->SetPage($p);
				$states = $state->Enumerate();
				$states['items'] = $util->EncodeResult($states['items']);
				
				$smarty->assign('states', $states);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/state.tpl');
			}
			
		break;
		
	case 'editState':	 
			
			$state->setStateId($_POST['stateId']);
			$info = $state->Info();
				
			$smarty->assign('post', $info);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-state-popup.tpl');
		
		break;
		
	case 'saveEditState':
			
			$stateId = $_POST['stateId'];
			
			$state->setStateId($stateId);
			$state->setName($_POST['name']);			
									
			if(!$state->Update())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data
				$user->setModule('Estados');
				$user->setAction('Editar');
				$user->setItemId($stateId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$state->SetPage($p);
				$states = $state->Enumerate();
				$states['items'] = $util->EncodeResult($states['items']);
												
				$smarty->assign('states', $states);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/state.tpl');
			}
			
		break;
	
	case 'loadCities':
			
			$stateId = $_POST['stateId'];
			
			$city->setStateId($stateId);
			$result = $city->EnumerateAll();
			
			$cities = $util->EncodeResult($result);
			
			echo 'ok[#]';
			
			$smarty->assign('cities', $cities);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumCity.tpl');
			
		break;
	
	case 'addCities':
			
			$stateId = $_POST['stateId'];
			$_SESSION['idState'] = $stateId;
			
			echo 'ok[#]';
			
		break;
		
}
?>
