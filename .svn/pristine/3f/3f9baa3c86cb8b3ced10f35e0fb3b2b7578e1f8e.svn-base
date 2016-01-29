<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['custP'];

switch($_POST["type"])
{
	case "addUnit": 
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-unit-popup.tpl');
				
		break;	

	case "editUnit":
		
		$unit->setUnitId($_POST['id']);
		$info = $unit->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-unit-popup.tpl');
		
		break;
		
	case "saveAddUnit":				
		
		$unit->setClave($_POST['clave']);
		$unit->setName($_POST['name']);
				
		if($_POST['active'])
			$unit->setActive(1);
		else
			$unit->setActive(0);
		
		$unitId = $unit->Save();
		
		if(!$unitId)
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Unidades');
			$user->setAction('Agregar');
			$user->setItemId($unitId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";			
			$units = $unit->Enumerate();
			$units['items'] = $util->EncodeResult($units['items']);
					
			$smarty->assign("units", $units);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/unit.tpl');
		}		
		
		break;
		
	case "saveEditUnit":	 	
		
		$unitId = $_POST['id'];
		
		$unit->setUnitId($unitId);	
		$unit->setClave($_POST['clave']);	
		$unit->setName($_POST['name']);
				
		if($_POST['active'])
			$unit->setActive(1);
		else
			$unit->setActive(0);
					
		if(!$unit->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Unidades');
			$user->setAction('Editar');
			$user->setItemId($unitId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$unit->SetPage($p);
			$units = $unit->Enumerate();
			$units['items'] = $util->EncodeResult($units['items']);
			
			$smarty->assign("units", $units);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/unit.tpl');
		}
			
		break;
	
	case 'deleteUnit':
		
		$unitId = $_POST['id'];
		$unit->setUnitId($unitId);	
				
		if(!$unit->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Unidades');
			$user->setAction('Eliminar');
			$user->setItemId($unitId);
			$user->SaveHistory();
			
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$unit->SetPage($p);
			$units = $unit->Enumerate();
			$units['items'] = $util->EncodeResult($units['items']);
			
			$smarty->assign("units", $units);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/unit.tpl');
		}
			
		break;
		
	
}

?>
