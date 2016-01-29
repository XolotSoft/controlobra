<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['subcatP'];

switch($_POST['type'])
{
	case 'addSubcategory':
		
		$categoryId = $_POST['categoryId']; 
		
		$category->setCategoryId($categoryId);
		$nomCat = utf8_encode($category->GetNameById());
		
		$smarty->assign('nomCat', $nomCat);
		$smarty->assign('categoryId', $categoryId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-subcategory-popup.tpl');
				
		break;	

	case 'editSubcategory':
		
		$subcategory->setSubcategoryId($_POST['id']);
		$info = $subcategory->Info();		
		$info = $util->EncodeRow($info);
		
		$category->setCategoryId($info['categoryId']);
		$nomCat = utf8_encode($category->GetNameById());
		
		$smarty->assign('nomCat', $nomCat);
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-subcategory-popup.tpl');
		
		break;
		
	case 'saveAddSubcategory':				
		
		$categoryId = $_POST['categoryId'];
		
		$subcategory->setName($_POST['name']);
		$subcategory->setCategoryId($categoryId);
						
		if($_POST['active'])
			$subcategory->setActive(1);
		else
			$subcategory->setActive(0);
		
		$subcategoryId = $subcategory->Save();
		
		if(!$subcategoryId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Subpartidas');
			$user->setAction('Agregar');
			$user->setItemId($subcategoryId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $categoryId;
			echo '[#]';
			
			$subcategory->setCategoryId($categoryId);
			$resSubcats = $subcategory->EnumerateAll();
			
			$subcategories = array();
			foreach($resSubcats as $res){
				
				$res = $util->EncodeRow($res);
				
				$conceptCon->setSubcategoryId($res['subcategoryId']);
				$concepts = $conceptCon->EnumerateAll();				
				$res['concepts'] = $util->EncodeResult($concepts);
				
				$subcategories[] = $res;
			}
			$item['subcategories'] = $subcategories;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subcategory.tpl');
		}		
		
		break;
		
	case 'saveEditSubcategory':	 	
		
		$subcategoryId = $_POST['id'];
		
		$subcategory->setSubcategoryId($subcategoryId);	
		$subcategory->setName($_POST['name']);
		
		$info = $subcategory->Info();
		$categoryId = $info['categoryId'];
						
		if($_POST['active'])
			$subcategory->setActive(1);
		else
			$subcategory->setActive(0);
					
		if(!$subcategory->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Subpartidas');
			$user->setAction('Editar');
			$user->setItemId($subcategoryId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $categoryId;
			echo '[#]';			
			$subcategory->setCategoryId($categoryId);
			$resSubcats = $subcategory->EnumerateAll();
			
			$subcategories = array();
			foreach($resSubcats as $res){
				
				$res = $util->EncodeRow($res);
				
				$conceptCon->setSubcategoryId($res['subcategoryId']);
				$concepts = $conceptCon->EnumerateAll();				
				$res['concepts'] = $util->EncodeResult($concepts);
				
				$subcategories[] = $res;
			}
			$item['subcategories'] = $subcategories;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subcategory.tpl');
		}
			
		break;
	
	case 'deleteSubcategory':
		
		$subcategoryId = $_POST['id'];
		
		$subcategory->setSubcategoryId($subcategoryId);	
		$info = $subcategory->Info();
		
		$categoryId = $info['categoryId'];
				
		if(!$subcategory->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Subpartidas');
			$user->setAction('Eliminar');
			$user->setItemId($subcategoryId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $categoryId;
			echo '[#]';			
			$subcategory->setCategoryId($categoryId);
			$resSubcats = $subcategory->EnumerateAll();
			
			$subcategories = array();
			foreach($resSubcats as $res){
				
				$res = $util->EncodeRow($res);
				
				$conceptCon->setSubcategoryId($res['subcategoryId']);
				$concepts = $conceptCon->EnumerateAll();				
				$res['concepts'] = $util->EncodeResult($concepts);
				
				$subcategories[] = $res;
			}
			$item['subcategories'] = $subcategories;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subcategory.tpl');
		}
			
		break;		
	
}

?>
