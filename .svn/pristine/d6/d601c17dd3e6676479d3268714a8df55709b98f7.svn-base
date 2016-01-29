<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['curProjId'];
			
if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{
	case 'searchResumen': 
			
			$categoryId = $_POST['categoryId2'];
			$subcategoryId = $_POST['subcategoryId2'];
			$conceptConId = $_POST['conceptConId2'];
			$bankId = $_POST['bankId2'];
			$conIva = $_POST['conIva'];
			
			$estimacionPayment->setProjectId($projectId);	
			$estimacionPayment->setTipo('Cheque');
			$resCheques1 = $estimacionPayment->EnumPagosByTipo();
			
			$accountPayment->setProjectId($projectId);
			$accountPayment->setTipo('Cheque');
			$resCheques2 = $accountPayment->EnumPagosByTipo();
						
			$resCheques = array_merge($resCheques1, $resCheques2);
			
			$project->setProjectId($projectId);
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
					$res['descripcion'] = utf8_encode($infC['name']);
					
				}else{
					
					$res['categoryId'] = 0;
					$res['subcategoryId'] = 0;
					$res['conceptConId'] = 0;
									
				}//if
				
				$agregar = false;
				if($bankId == '' && $categoryId == '' && $subcategoryId == '' && $conceptConId == ''){
					$agregar = true;
				}else{
					
					if($categoryId > 0 && $res['categoryId'] == $categoryId){
											
						if($subcategoryId > 0){
							if($res['subcategoryId'] == $subcategoryId){								
								if($conceptConId > 0){									
									if($res['conceptConId'] == $conceptConId)
										$agregar = true;
									else
										$agregar = false;									
								}else{
									$agregar = true;
								}								
							}else{
								$agregar = false;
							}
						}else{
							$agregar = true;
						}						
					}else{
						$agregar = false;
					}					
				}
				
				if($bankId > 0 && $res['bankId'] == $bankId)
					$agregar = true;
				
				if($agregar)
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
						
						if($sub['subcategoryId'] == $res['subcategoryId']){
							
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
							
							if($res['conceptConId'] == $con['conceptConId']){							
							
								$card['name'] = $res['descripcion'];
								$card['noCheque'] = $res['noCheque'];
								$card['fecha'] = $res['fecha'];
								$card['noInvoice'] = $res['noInvoice'];
								$card['total'] = $res['quantity'];
								
								$totalInvoice = $card['total'];
								if($conIva == "0"){
									$totalInvoice = $totalInvoice - ($totalInvoice * 0.16);
									$card['total'] = number_format($totalInvoice,2,'.',''); 
								}
								
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
			
			echo 'ok[#]';
			
			$smarty->assign('projects', $projects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/concept-resumen-gastos.tpl');
		
		break;	
				
}
?>
