<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST['type'])
{
	case 'addMaterial': 
		
		$conceptId = $_POST['conceptId'];
		
		$categories = $matCat->EnumerateAll(1);
		$categories = $util->EncodeResult($categories);
		
		$smarty->assign('categories', $categories);
		$smarty->assign('conceptId', $conceptId);		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-concept-material-popup.tpl');
				
		break;	

	case 'editMaterial':
		
		$conceptMat->setConceptMatId($_POST['id']);
		$info = $conceptMat->Info();		
		$info = $util->EncodeRow($info);
		
		$material->setMaterialId($info['materialId']);
		$infM = $material->Info();
		
		$unit->setUnitId($infM['unitId']);
		$info['unit'] = $unit->GetClaveById();
				
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-concept-material-popup.tpl');
		
		break;
		
	case 'saveAddMaterial':
		
		$conceptId = $_POST['conceptId'];
			
		$conceptMat->setConceptId($conceptId);
		$conceptMat->setMaterialId($_POST['materialId']);
		$conceptMat->setQuantity($_POST['quantity']);
													
		if(!$conceptMat->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $conceptId;
			echo '[#]';			
			$result = $conceptMat->EnumerateAll();
						
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);
				
				$material->setMaterialId($res['materialId']);
				$infM = $material->Info();
				$card['material'] = utf8_encode($infM['name']);
				
				$unit->setUnitId($infM['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
								
				$items[] = $card;
			}			
			
			$item['materials'] = $items;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-material.tpl');
		}		
		
		break;
		
	case 'saveEditMaterial':	 	
		
		$conceptMat->setConceptMatId($_POST['id']);		
		$conceptMat->setQuantity($_POST['quantity']);
				
		$info = $conceptMat->Info();
		$conceptId = $info['conceptId'];
		
		if(!$conceptMat->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $conceptId;
			echo '[#]';	
			$conceptMat->setConceptId($conceptId);
			$result = $conceptMat->EnumerateAll();
						
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);
				
				$material->setMaterialId($res['materialId']);
				$infM = $material->Info();
				$card['material'] = utf8_encode($infM['name']);
				
				$unit->setUnitId($infM['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
								
				$items[] = $card;
			}			
			
			$item['materials'] = $items;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-material.tpl');
		}
			
		break;
	
	case 'deleteMaterial':
		
		$conceptMat->setConceptMatId($_POST['id']);	
		$info = $conceptMat->Info();
		
		$conceptId = $info['conceptId'];
				
		if(!$conceptMat->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $conceptId;
			echo '[#]';
			$conceptMat->setConceptId($conceptId);	
			$result = $conceptMat->EnumerateAll();
						
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);
				
				$material->setMaterialId($res['materialId']);
				$infM = $material->Info();
				$card['material'] = utf8_encode($infM['name']);
				
				$unit->setUnitId($infM['unitId']);
				$card['unit'] = utf8_encode($unit->GetClaveById());
												
				$items[] = $card;
			}			
			
			$item['materials'] = $items;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-material.tpl');
		}
			
		break;
	
	case 'loadMatSubcats':
			
			$matCatId = $_POST['matCatId'];
			$key = $_POST['key'];		
						
			$matSubcat->setMatCatId($matCatId);
			$subcats = $matSubcat->EnumerateAll(1);
			$subcategories[$key] = $util->EncodeResult($subcats);
			
			$materials = array();
			$material->setMatCatId($matCatId);
			$mats = $material->Search();
			$materials[$key] = $util->EncodeResult($mats);
						
			echo 'ok[#]';
						
			$smarty->assign('key', $key);
			$smarty->assign('subcategories', $subcategories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumMatSubcat.tpl');
			
			echo '[#]';
			
			$smarty->assign('key', $key);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumMaterial.tpl');
			
		break;
	
	case 'loadMaterials':
			
			$matCatId = $_POST['matCatId'];
			$matSubcatId = $_POST['matSubcatId'];
			$key = $_POST['key'];
			
			$materials = array();			
			$material->setMatCatId($matCatId);
			$material->setMatSubcatId($matSubcatId);
			$mats = $material->Search();
			$materials[$key] = $util->EncodeResult($mats);
						
			echo 'ok[#]';
			
			$smarty->assign('key', $key);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumMaterial.tpl');
			
		break;
	
	case 'loadInfoMaterial':
			
			$materialId = $_POST['materialId'];
			
			$material->setMaterialId($materialId);
			$info = $material->Info();
			
			$unit->setUnitId($info['unitId']);
			$unitName = $unit->GetClaveById();
			
			echo 'ok[#]';
			
			echo utf8_encode($unitName);
			
			echo '[#]';
			
			echo $info['unitPrice'];
			
		break;
	
}

?>
