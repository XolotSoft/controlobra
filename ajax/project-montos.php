<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['projectId'];
$p = $_SESSION['projP'];

switch($_POST['type'])
{
	
	/*** MANTENIMIENTO ***/
	
	case 'addMant':
			
			$mtoMant = $_SESSION['mtoMant'];
			
			$card['id'] = 0;
			$card['quantity'] = '';
			$card['currency'] = '';
			
			$mtoMant[] = $card;
			
			$_SESSION['mtoMant'] = $mtoMant;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoMant', $mtoMant);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyMontoMant.tpl');
			
		break;
	
	case 'delMant':
			
			$id = $_POST['id'];
			
			$mtoMant = $_SESSION['mtoMant'];
			
			unset($mtoMant[$id]);
			
			$_SESSION['mtoMant'] = $mtoMant;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoMant', $mtoMant);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyMontoMant.tpl');
			
		break;
	
	case 'saveMant':		

			$qtyMant = $_POST['qtyMant'];
			$currMant = $_POST['currencyMant'];
			$idQtyMant = $_POST['idQtyMant'];
									
			if(!count($qtyMant))
				$qtyMant = array();
			
			$montos = array();			
			foreach($qtyMant as $k => $val){				
				
				$currency = $currMant[$k];
				
				$card['id'] = $idQtyMant[$k];
				$card['quantity'] = $val;
				$card['currency'] = $currency;
				
				$projMant->setQuantity($val);
				$projMant->setCurrency($currency);
				
				$montos[$k] = $card;												
			}
			
			$_SESSION['mtoMant'] = $montos;
						
		break;
	
	/*** EQUIPAMIENTO ***/
	
	case 'addEquip':
			
			$mtoEquip = $_SESSION['mtoEquip'];
			
			$card['id'] = 0;
			$card['quantity'] = '';
			$card['currency'] = '';
			
			$mtoEquip[] = $card;
			
			$_SESSION['mtoEquip'] = $mtoEquip;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoEquip', $mtoEquip);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyMontoEquip.tpl');
			
		break;
	
	case 'delEquip':
			
			$id = $_POST['id'];
			
			$mtoEquip = $_SESSION['mtoEquip'];
			
			unset($mtoEquip[$id]);
						
			$_SESSION['mtoEquip'] = $mtoEquip;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoEquip', $mtoEquip);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyMontoEquip.tpl');
			
		break;
	
	case 'saveEquip':		
			
			$qtyEquip = $_POST['qtyEquip'];
			$currEquip = $_POST['currencyEquip'];
			$idQtyEquip = $_POST['idQtyEquip'];
										
			if(!count($qtyEquip))
				$qtyEquip = array();
			
			$montos = array();			
			foreach($qtyEquip as $k => $val){
				
				$currency = $currEquip[$k];
				
				$card['id'] = $idQtyEquip[$k];
				$card['quantity'] = $val;
				$card['currency'] = $currency;
															
				$projEquip->setQuantity($val);
				$projEquip->setCurrency($currency);
								
				$montos[$k] = $card;							
			}
			
			$_SESSION['mtoEquip'] = $montos;
							
		break;
	
	case 'saveMontos':
			
			$qtyEquip = $_POST['qtyEquip'];
			$currEquip = $_POST['currencyEquip'];
			$idQtyEquip = $_POST['idQtyEquip'];
			
			$qtyMant = $_POST['qtyMant'];
			$currMant = $_POST['currencyMant'];
			$idQtyMant = $_POST['idQtyMant'];
			
			if(!count($qtyEquip))
				$qtyEquip = array();
			
			if(!count($idQtyEquip))
				$idQtyEquip = array();
			
			if(!count($qtyMant))
				$qtyMant = array();
			
			if(!count($idQtyMant))
				$idQtyMant = array();
			
			$continue = true;
			$mtoEquip = array();
			
			//Verificamos las Cantidades
			
			foreach($qtyEquip as $k => $val){
				
				$currency = $currEquip[$k];			
							
				$card['id'] = $idQtyEquip[$k];
				$card['quantity'] = $val;
								
				$projEquip->setQuantity($val);
				$projEquip->setCurrency($currency);
								
				$mtoEquip[$k] = $card;
				
				if(!$projEquip->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			$continue = true;
			$mtoMant = array();
			
			//Verificamos las Cantidades
			
			foreach($qtyMant as $k => $val){
				
				$currency = $currMant[$k];
								
				$card['id'] = $idQtyMant[$k];
				$card['quantity'] = $val;
															
				$projMant->setQuantity($val);
				$projMant->setCurrency($currency);
								
				$mtoMant[$k] = $card;
				
				if(!$projMant->SaveTemp()){
					$continue = false;					
				}
				
			}
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			$projEquip->setProjectId($projectId);
			
			//EQUIPAMIENTO
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resEquip = $projEquip->Enumerate();
			
			$delIds = array();
			foreach($resEquip as $res){				
				$idEquip = $res['projEquipId'];
				
				if(!in_array($idEquip,$idQtyEquip))
					$delIds[] = $idEquip;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($qtyEquip as $k => $val){
				$id = $idQtyEquip[$k];
								
				$projEquip->setQuantity($val);
				$projEquip->setCurrency($currEquip[$k]);
				
				if($id){
					$projEquip->setProjEquipId($id);
					$projEquip->Update();
				}else{
					$projEquip->Save();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projEquip->setProjEquipId($id);
				$projEquip->Delete();
			}
			
			//MANTENIMIENTO
			
			$projMant->setProjectId($projectId);
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resMant = $projMant->Enumerate();
			
			$delIds = array();
			foreach($resMant as $res){				
				$idMant = $res['projMantId'];
				
				if(!in_array($idMant,$idQtyMant))
					$delIds[] = $idMant;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($qtyMant as $k => $val){
				$id = $idQtyMant[$k];
								
				$projMant->setQuantity($val);
				$projMant->setCurrency($currMant[$k]);
				
				if($id){
					$projMant->setProjMantId($id);
					$projMant->Update();
				}else{
					$projMant->Save();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projMant->setProjMantId($id);
				$projMant->Delete();
			}
			
			$_SESSION['mtoMant'] = array();
			$_SESSION['mtoEquip'] = array();
			
			unset($_SESSION['mtoMant']);
			unset($_SESSION['mtoEquip']);
			
			$_SESSION['msgOk'] = 5;
			echo 'ok[#]';
			echo $p;
			
		break;	
		
}

?>
