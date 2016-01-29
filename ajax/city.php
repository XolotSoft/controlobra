<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['cityP'];

switch($_POST['type'])
{
	case 'addCity': 
			
			$stateId = $_SESSION['idState'];
			
			$smarty->assign('stateId', $stateId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-city-popup.tpl');
		
		break;	
		
	case 'saveAddCity':
			
			$stateId = $_SESSION['idState'];
			
			$city->setStateId($stateId);
			$city->setName($_POST['name']);			
			
			$cityId = $city->Save();
			
			if(!$cityId)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data
				$user->setModule('Municipios');
				$user->setAction('Agregar');
				$user->setItemId($cityId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$city->setStateId($stateId);
				$cities = $city->Enumerate();
				$cities['items'] = $util->EncodeResult($cities['items']);
				
				$smarty->assign('cities', $cities);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/city.tpl');
			}
			
		break;
		
	case 'deleteCity':
			
			$stateId = $_SESSION['idState'];
			$cityId = $_POST['cityId'];
			
			$city->setCityId($cityId);
			
			if($city->Delete())
			{
				//Save History Data
				$user->setModule('Municipios');
				$user->setAction('Eliminar');
				$user->setItemId($cityId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo '[#]';								
				$city->SetPage($p);
				$city->setStateId($stateId);
				$cities = $city->Enumerate();
				$cities['items'] = $util->EncodeResult($cities['items']);
				
				$smarty->assign('cities', $cities);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/city.tpl');
			}
			
		break;
		
	case 'editCity':	 
			
			$city->setCityId($_POST['cityId']);
			$info = $city->Info();
				
			$smarty->assign('post', $info);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-city-popup.tpl');
		
		break;
		
	case 'saveEditCity':
			
			$stateId = $_SESSION['idState'];
			$cityId = $_POST['cityId'];
			
			$city->setCityId($cityId);
			$city->setName($_POST['name']);			
									
			if(!$city->Update())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data
				$user->setModule('Municipios');
				$user->setAction('Editar');
				$user->setItemId($cityId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$city->SetPage($p);
				$city->setStateId($stateId);
				$cities = $city->Enumerate();
				$cities['items'] = $util->EncodeResult($cities['items']);
				
				$smarty->assign('cities', $cities);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/city.tpl');
			}
			
		break;
		
}
?>
