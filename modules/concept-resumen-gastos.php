<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$projectId = $_SESSION['curProjId'];
	
	$vista = $_GET['vista'];
	
	$estimacionPayment->setProjectId($projectId);	
	$estimacionPayment->setTipo('Cheque');
	$resCheques1 = $estimacionPayment->EnumPagosByTipo();
	
	$accountPayment->setProjectId($projectId);
	$accountPayment->setTipo('Cheque');
	$resCheques2 = $accountPayment->EnumPagosByTipo();
	
	$resCheques = array_merge($resCheques1, $resCheques2);

	if($vista == 'anterior'){
		
		$total = 0;
		$cheques = array();
		foreach($resCheques as $res){
			
			//Si viene de la Estimacion
			if($res['estimacionId']){
				$estimacion->setEstimacionId($res['estimacionId']);
				$infE = $estimacion->Info();
				
				$concept->setConceptId($infE['conceptId']);
				$infC = $concept->Info();
				
				$category->setCategoryId($infC['categoryId']);
				$res['partida'] = $category->GetNameById();
				
				$subcategory->setSubcategoryId($infC['subcategoryId']);
				$res['subpartida'] = $subcategory->GetNameById();
				
				$conceptCon->setConceptConId($infC['conceptConId']);
				$res['concept'] = $conceptCon->GetNameById();
				
				$res['descripcion'] = $infC['name'];
			}
						
			$supplier->setSupplierId($res['supplierId']);
			$res['supplier'] = $supplier->GetNameById();
			
			$total += $res['quantity'];
			
			$cheques[] = $res;
		}
		
		$categorias = $category->EnumerateAll();
		
		$smarty->assign('vista', $vista);
		$smarty->assign('total', $total);
		$smarty->assign('cheques', $cheques);
		$smarty->assign('categorias', $categorias);
		
	}else{
		
		$project->setProjectId($_SESSION['curProjId']);
		$projects = $project->EnumOne();	
		
		$cheques = array();
		foreach($resCheques as $res){
			
			$cat = array();
			if($res['estimacionId']){
				
				$estimacion->setEstimacionId($res['estimacionId']);
				$infE = $estimacion->Info();
				
				$concept->setConceptId($infE['conceptId']);
				$infC = $concept->Info();
								
				$res['categoryId'] = $infC['categoryId'];
				$res['subcategoryId'] = $infC['subcategoryId'];
				$res['conceptConId'] = $infC['conceptConId'];
				$res['descripcion'] = $infC['name'];
				
			}elseif($res['orderBuyId']){

				$accountPayment->setOrderBuyId($res['orderBuyId']);				
				$conceptId = $accountPayment->GetConceptId();
				
				$concept->setConceptId($conceptId);
				$infC = $concept->Info();
								
				$res['categoryId'] = $infC['categoryId'];
				$res['subcategoryId'] = $infC['subcategoryId'];
				$res['conceptConId'] = $infC['conceptConId'];
				$res['descripcion'] = $infC['name'];
								
			}else{
				
				$res['categoryId'] = 0;
				$res['subcategoryId'] = 0;
				$res['conceptConId'] = 0;
								
			}//if
			
			$cheques[] = $res;
			
		}//foreach
		
		$idCats = array();
		$categories = array();
		foreach($cheques as $res){
			
			$categoryId = $res['categoryId'];			
			$card['categoryId'] = $categoryId;
			
			$category->setCategoryId($categoryId);
			$card['name'] = $category->GetNameById();
			
			if(!in_array($categoryId,$idCats)){
				$idCats[] = $categoryId;
				$categories[] = $card;
			}
			
		}//foreach
		
		$card = array();
		$categories2 = array();
		foreach($categories as $cat){
			
			$idSubcats = array();
			$subcategories = array();
			foreach($cheques as $res){
				
				if($res['categoryId'] == $cat['categoryId']){
					
					$subcategoryId = $res['subcategoryId'];										
					$card['subcategoryId'] = $subcategoryId;
					
					$subcategory->setSubcategoryId($subcategoryId);
					$card['name'] = $subcategory->GetNameById();
					
					if(!in_array($subcategoryId, $idSubcats)){
						$idSubcats[] = $subcategoryId;
						$subcategories[] = $card;
					}
					
				}//if
			
			}//foreach
			$cat['subcategories'] = $subcategories;
			
			$categories2[] = $cat;
			
		}//foreach
		
		$card = array();
		$categories3 = array();
		foreach($categories2 as $cat){
			
			$subcategories = array();
			foreach($cat['subcategories'] as $sub){
				
				$idConcepts = array();
				$concepts = array();
				foreach($cheques as $res){
					
					if($res['categoryId'] == $cat['categoryId'] && $sub['subcategoryId'] == $res['subcategoryId']){
						
						$conceptConId = $res['conceptConId'];						
						$card['conceptConId'] = $conceptConId;
						
						$conceptCon->setConceptConId($conceptConId);
						$card['name'] = $conceptCon->GetNameById();
						
						if(!in_array($conceptConId, $idConcepts)){
							$idConcepts[] = $conceptConId;
							$concepts[] = $card;
						}
						
					}//if
					
				}//foreach
				$sub['concepts'] = $concepts;
				
				$subcategories[] = $sub;
			}//foreach
			
			$cat['subcategories'] = $subcategories;
			$categories3[] = $cat;
			
		}//foreach
		
		$total = 0;
		$card = array();
		$categories4 = array();
		foreach($categories3 as $cat){
						
			$totCat = 0;
			$subcategories = array();
			foreach($cat['subcategories'] as $sub){
				
				$totSub = 0;
				$concepts = array();
				foreach($sub['concepts'] as $con){
					
					$totCon = 0;
					$descriptions = array();
					foreach($cheques as $res){
						
						if($res['categoryId'] == $cat['categoryId'] && $sub['subcategoryId'] == $res['subcategoryId'] && $res['conceptConId'] == $con['conceptConId']){							
						
							$card['name'] = $res['descripcion'];
							$card['noCheque'] = $res['noCheque'];
							$card['fecha'] = $res['fecha'];
							$card['noInvoice'] = $res['noInvoice'];
							$card['total'] = $res['quantity'];
							
							$totCon += $card['total'];
							
							$descriptions[] = $card;
						}//if
						
					}//foreach
					$con['descriptions'] = $descriptions;					
					$con['total'] = $totCon;
					
					$totSub += $totCon;
					
					$concepts[] = $con;
					
				}//foreach
				$sub['concepts'] = $concepts;
				$sub['total'] = $totSub;
				
				$totCat += $totSub;
				
				$subcategories[] = $sub;
				
			}//foreach			
			$cat['subcategories'] = $subcategories;
			$cat['total'] = $totCat;
			
			$total += $totCat;
			
			$categories4[] = $cat;
			
		}//foreach
		
		$items = array();
		foreach($projects['items'] as $res){
			$card = $res;			
			
			$card['categories'] = $categories4;			
			$card['total'] = $total;
			
			$items[] = $card;
			
		}//foreach items
		$projects['items'] = $items;
		
		$smarty->assign('projects', $projects);
		
	}//else
	
	$categorias = $category->EnumerateAll();
	
	$bank->setProjectId($projectId);
	$banks = $bank->EnumByProject();

	$smarty->assign('banks', $banks);
	$smarty->assign('categorias', $categorias);
	$smarty->assign('mainMnu','resumenes');
	
?>