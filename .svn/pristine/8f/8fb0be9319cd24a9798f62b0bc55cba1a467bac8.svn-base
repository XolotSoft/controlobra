<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['catP'];

switch($_POST['type'])
{
	case 'addCategory':
	
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-category-popup.tpl');
				
		break;	

	case 'editCategory':
		
		$category->setCategoryId($_POST['id']);
		$info = $category->Info();		
		$info = $util->EncodeRow($info);
		
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-category-popup.tpl');
		
		break;
		
	case 'saveAddCategory':				
		
		$category->setNoCat($_POST['noCat']);
		$category->setName($_POST['name']);
		
		$continue = true;
			
		if($category->ExistName())
			$continue = false;
		
		if(!$category->SaveTemp())
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$category->setName($_POST['name']);
								
		if($_POST['active'])
			$category->setActive(1);
		else
			$category->setActive(0);
		
		$categoryId = $category->Save();
		
		if(!$categoryId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Partidas');
			$user->setAction('Agregar');
			$user->setItemId($categoryId);
			$user->SaveHistory();
				
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$categories = $category->Enumerate();
			
			$items = array();
			foreach($categories['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$subcategory->setCategoryId($res['categoryId']);
				$resSubcats = $subcategory->EnumerateAll();
				
				$subcategories = array();
				foreach($resSubcats as $val){					
					$val['name'] = utf8_encode($val['name']);
					
					$conceptCon->setSubcategoryId($val['subcategoryId']);
					$concepts = $conceptCon->EnumerateAll();
					$val['concepts'] = $util->EncodeResult($concepts);
					
					$subcategories[] = $val;
				}				
				$card['subcategories'] = $subcategories;
				
				$items[] = $card;
			}
			$categories['items'] = $items;
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/category.tpl');
		}		
		
		break;
		
	case 'saveEditCategory':	 	
		
		$categoryId = $_POST['id'];
		
		$category->setCategoryId($categoryId);
		$category->setNoCat($_POST['noCat']);
		$category->setName($_POST['name']);
		
		$continue = true;
			
		if($category->ExistName())
			$continue = false;
		
		if(!$category->SaveTemp())
			$continue = false;
		
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		$category->setName($_POST['name']);
		
		if($_POST['active'])
			$category->setActive(1);
		else
			$category->setActive(0);
					
		if(!$category->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Partidas');
			$user->setAction('Editar');
			$user->setItemId($categoryId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$category->SetPage($p);
			$categories = $category->Enumerate();
			
			$items = array();
			foreach($categories['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$subcategory->setCategoryId($res['categoryId']);
				$resSubcats = $subcategory->EnumerateAll();
				
				$subcategories = array();
				foreach($resSubcats as $val){					
					$val['name'] = utf8_encode($val['name']);
					
					$conceptCon->setSubcategoryId($val['subcategoryId']);
					$concepts = $conceptCon->EnumerateAll();
					$val['concepts'] = $util->EncodeResult($concepts);
					
					$subcategories[] = $val;
				}				
				$card['subcategories'] = $subcategories;
				
				$items[] = $card;
			}
			$categories['items'] = $items;
						
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/category.tpl');
		}
			
		break;
	
	case 'deleteCategory':
		
		$categoryId = $_POST['id'];
		
		$category->setCategoryId($categoryId);
				
		if(!$category->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Partidas');
			$user->setAction('Eliminar');
			$user->setItemId($categoryId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$category->SetPage($p);
			$categories = $category->Enumerate();
			
			$items = array();
			foreach($categories['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$subcategory->setCategoryId($res['categoryId']);
				$resSubcats = $subcategory->EnumerateAll();
				
				$subcategories = array();
				foreach($resSubcats as $val){					
					$val['name'] = utf8_encode($val['name']);
					
					$conceptCon->setSubcategoryId($val['subcategoryId']);
					$concepts = $conceptCon->EnumerateAll();
					$val['concepts'] = $util->EncodeResult($concepts);
					
					$subcategories[] = $val;
				}				
				$card['subcategories'] = $subcategories;
				
				$items[] = $card;
			}
			$categories['items'] = $items;
			
			$smarty->assign('categories', $categories);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/category.tpl');
		}
			
		break;
			
}

?>
