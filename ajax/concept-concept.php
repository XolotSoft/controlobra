<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST['type'])
{
	case 'addConcept':
	
		$subcategoryId = $_POST['subcategoryId'];
				
		$subcategory->setSubcategoryId($subcategoryId);
		$infS = $subcategory->Info();
		
		$nomSubcat = utf8_encode($infS['name']);
		
		$category->setCategoryId($infS['categoryId']);
		$nomCat = utf8_encode($category->GetNameById());
		
		$smarty->assign('nomCat', $nomCat);
		$smarty->assign('nomSubcat', $nomSubcat);
		$smarty->assign('subcategoryId', $subcategoryId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-concept-concept-popup.tpl');
				
		break;	

	case 'editConcept':
		
		$conceptCon->setConceptConId($_POST['id']);
		$info = $conceptCon->Info();		
		$info = $util->EncodeRow($info);
		
		$subcategory->setSubcategoryId($info['subcategoryId']);
		$infS = $subcategory->Info();
		
		$nomSubcat = utf8_encode($infS['name']);
		
		$category->setCategoryId($infS['categoryId']);
		$nomCat = utf8_encode($category->GetNameById());
		
		$smarty->assign('nomCat', $nomCat);	
		$smarty->assign('nomSubcat', $nomSubcat);	
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-concept-concept-popup.tpl');
		
		break;
		
	case 'saveAddConcept':
	
		$subcategoryId = $_POST['subcategoryId'];
		
		$subcategory->setSubcategoryId($subcategoryId);
		$info = $subcategory->Info();
		
		$conceptCon->setName($_POST['name']);
		$conceptCon->setCategoryId($info['categoryId']);
		$conceptCon->setSubcategoryId($subcategoryId);
						
		if($_POST['active'])
			$conceptCon->setActive(1);
		else
			$conceptCon->setActive(0);
							
		if(!$conceptCon->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $subcategoryId;
			echo '[#]';
			
			$conceptCon->setSubcategoryId($subcategoryId);
			$concepts = $conceptCon->EnumerateAll();
			$it['concepts'] = $util->EncodeResult($concepts);

			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-concept.tpl');
		}		
		
		break;
		
	case 'saveEditConcept':	 	
		
		$conceptCon->setConceptConId($_POST['id']);	
		$conceptCon->setName($_POST['name']);
		
		$info = $conceptCon->Info();		
		$subcategoryId = $info['subcategoryId'];
						
		if($_POST['active'])
			$conceptCon->setActive(1);
		else
			$conceptCon->setActive(0);
					
		if(!$conceptCon->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $subcategoryId;
			echo '[#]';
				
			$conceptCon->setSubcategoryId($subcategoryId);
			$concepts = $conceptCon->EnumerateAll();
			$it['concepts'] = $util->EncodeResult($concepts);

			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-concept.tpl');
		}
			
		break;
	
	case 'deleteConcept':
		
		$conceptCon->setConceptConId($_POST['id']);
		$info = $conceptCon->Info();
		
		$subcategoryId = $info['subcategoryId'];
				
		if(!$conceptCon->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $subcategoryId;
			echo '[#]';
			
			$conceptCon->setSubcategoryId($subcategoryId);
			$concepts = $conceptCon->EnumerateAll();
			$it['concepts'] = $util->EncodeResult($concepts);

			$smarty->assign('it', $it);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-concept.tpl');
		}
			
		break;		
	
}

?>
