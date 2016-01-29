<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['perP'];

switch($_POST["type"])
{
	case "addPersonal": 
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-personal-popup.tpl');
				
		break;	

	case "editPersonal":
		
		$personal->setPersonalId($_POST['id']);
		$info = $personal->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-personal-popup.tpl');
		
		break;
		
	case "saveAddPersonal":				
		
		$personal->setName($_POST['name']);
		$personal->setEmail($_POST['email']);
		$personal->setUsername($_POST['username']);
				
		if($_POST['active'])
			$personal->setActive(1);
		else
			$personal->setActive(0);
		
		$personalId = $personal->Save();
		
		if(!$personalId)
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Personal');
			$user->setAction('Agregar');
			$user->setItemId($personalId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";			
			$personals = $personal->Enumerate();
			$personals['items'] = $util->EncodeResult($personals['items']);
					
			$smarty->assign("personals", $personals);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
		}		
		
		break;
		
	case "saveEditPersonal":	 	
		
		$personalId = $_POST['id'];
		
		$personal->setPersonalId($personalId);	
		$personal->setName($_POST['name']);
		$personal->setEmail($_POST['email']);
		$personal->setUsername($_POST['username']);
				
		if($_POST['active'])
			$personal->setActive(1);
		else
			$personal->setActive(0);
					
		if(!$personal->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Personal');
			$user->setAction('Editar');
			$user->setItemId($personalId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$personal->SetPage($p);
			$personals = $personal->Enumerate();
			$personals['items'] = $util->EncodeResult($personals['items']);
			
			$smarty->assign("personals", $personals);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
		}
			
		break;
	
	case "editPassword":
		
		$personal->setPersonalId($_POST['id']);
		$info = $personal->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-personal-passwd-popup.tpl');
		
		break;
	
	case "saveEditPasswd":	 	
		
		$personalId = $_POST['id'];
		
		$personal->setPersonalId($personalId);
		$personal->setPasswd($_POST['passwd']);
		$personal->setPasswd2($_POST['passwd2']);
				
		if(!$personal->UpdatePasswd())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Personal');
			$user->setAction('EditPasswd');
			$user->setItemId($personalId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$personal->SetPage($p);
			$personals = $personal->Enumerate();
			$personals['items'] = $util->EncodeResult($personals['items']);
			
			$smarty->assign("personals", $personals);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
		}
			
		break;
	
	case "saveDelPasswd":	 	
		
		$personalId = $_POST['id'];
		
		$personal->setPersonalId($personalId);
									
		if(!$personal->RemovePasswd())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Personal');
			$user->setAction('DelPasswd');
			$user->setItemId($personalId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$personal->SetPage($p);
			$personals = $personal->Enumerate();
			$personals['items'] = $util->EncodeResult($personals['items']);
			
			$smarty->assign("personals", $personals);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
		}
			
		break;
	
	case 'deletePersonal':
		
		$personalId = $_POST['id'];		
		$personal->setPersonalId($personalId);		
		$infP = $personal->Info();
		
		if(!$personal->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Personal');
			$user->setAction('Eliminar');
			$user->setItemId($personalId);
			$user->setDescription($infP['name']);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$personal->SetPage($p);
			$personals = $personal->Enumerate();
			$personals['items'] = $util->EncodeResult($personals['items']);
			
			$smarty->assign("personals", $personals);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
		}
			
		break;
		
	
}

?>
