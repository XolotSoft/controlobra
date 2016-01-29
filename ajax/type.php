<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['typeP'];

switch($_POST["type"])
{
	case "addType": 
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-type-popup.tpl');
				
		break;	

	case "editType":
		
		$type->setTypeId($_POST['id']);
		$info = $type->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-type-popup.tpl');
		
		break;
		
	case "saveAddType":				
		
		$type->setName($_POST['name']);
		$type->setComunArea($_POST['comunArea']);
		$type->setRealArea($_POST['realArea']);
		$type->setTotalArea($_POST['totalArea']);
				
		if($_POST['active'])
			$type->setActive(1);
		else
			$type->setActive(0);
							
		if(!$type->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";			
			$types = $type->Enumerate();
			$types['items'] = $util->EncodeResult($types['items']);
					
			$smarty->assign("types", $types);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/type.tpl');
		}		
		
		break;
		
	case "saveEditType":	 	
		
		$type->setTypeId($_POST['id']);	
		$type->setName($_POST['name']);
		$type->setComunArea($_POST['comunArea']);
		$type->setRealArea($_POST['realArea']);
		$type->setTotalArea($_POST['totalArea']);
				
		if($_POST['active'])
			$type->setActive(1);
		else
			$type->setActive(0);
					
		if(!$type->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$type->SetPage($p);
			$types = $type->Enumerate();
			$types['items'] = $util->EncodeResult($types['items']);
			
			$smarty->assign("types", $types);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/type.tpl');
		}
			
		break;
	
	case 'deleteType':
		
		$type->setTypeId($_POST['id']);	
				
		if(!$type->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$type->SetPage($p);
			$types = $type->Enumerate();
			$types['items'] = $util->EncodeResult($types['items']);
			
			$smarty->assign("types", $types);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/type.tpl');
		}
			
		break;
		
	
}

?>
