<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['projectId'];
$p = $_SESSION['projP'];

switch($_POST['type'])
{
	
	/*** EJES N ***/
	
	case 'addEjeN':
			
			$ejesN = $_SESSION['ejesN'];
			
			$card['id'] = 0;
			$card['numero'] = '';
			
			$ejesN[] = $card;
			
			$_SESSION['ejesN'] = $ejesN;
			
			echo 'ok[#]';
			
			$smarty->assign('ejesN', $ejesN);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyEjesN.tpl');
			
		break;
	
	case 'delEjeN':
			
			$id = $_POST['id'];
			
			$ejesN = $_SESSION['ejesN'];
			
			unset($ejesN[$id]);
			
			$_SESSION['ejesN'] = $ejesN;
			
			echo 'ok[#]';
			
			$smarty->assign('ejesN', $ejesN);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyEjesN.tpl');
			
		break;
	
	case 'saveEjesN':		

			$number = $_POST['number'];
			$idNumber = $_POST['idNumber'];
									
			if(!count($number))
				$number = array();
			
			$ejes = array();			
			foreach($number as $k => $val){
				
				$val = str_replace("'",'A',$val);
				
				$card['id'] = $idNumber[$k];
				$card['numero'] = $val;
				
				$projEje->setNumero($val);
				
				$ejes[$k] = $card;												
			}
			
			$_SESSION['ejesN'] = $ejes;
						
		break;
	
	/*** EJES L ***/
	
	case 'addEjeL':
			
			$ejesL = $_SESSION['ejesL'];
			
			$card['id'] = 0;
			$card['letra'] = '';
			
			$ejesL[] = $card;
			
			$_SESSION['ejesL'] = $ejesL;
			
			echo 'ok[#]';
			
			$smarty->assign('ejesL', $ejesL);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyEjesL.tpl');
			
		break;
	
	case 'delEjeL':
			
			$id = $_POST['id'];
			
			$ejesL = $_SESSION['ejesL'];
			
			unset($ejesL[$id]);
						
			$_SESSION['ejesL'] = $ejesL;
			
			echo 'ok[#]';
			
			$smarty->assign('ejesL', $ejesL);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyEjesL.tpl');
			
		break;
	
	case 'saveEjesL':		
			
			$letter = $_POST['letter'];
			$idLetter = $_POST['idLetter'];
										
			if(!count($letter))
				$letter = array();
			
			$ejes = array();			
			foreach($letter as $k => $val){
				
				$card['id'] = $idLetter[$k];
				$card['letra'] = $val;
															
				$projEje->setLetra($val);
								
				$ejes[$k] = $card;							
			}
			
			$_SESSION['ejesL'] = $ejes;
							
		break;
	
	case 'saveEjes':
			
			$letter = $_POST['letter'];
			$idLetter = $_POST['idLetter'];
			
			$number = $_POST['number'];
			$idNumber = $_POST['idNumber'];
			
			if(!count($letter))
				$letter = array();
			
			if(!count($idLetter))
				$idLetter = array();
			
			if(!count($number))
				$number = array();
			
			if(!count($idNumber))
				$idNumber = array();
			
			$continue = true;
			$ejesL = array();
			
			//Verificamos los datos de las Letras
			
			foreach($letter as $k => $val){
				
				$val = str_replace("'",'1',$val);
				
				$card['id'] = $idLetter[$k];
				$card['letra'] = $val;
								
				$projEje->setLetra($val);
								
				$ejesL[$k] = $card;
				
				if(!$projEje->SaveTemp()){
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
			$ejesN = array();
			
			//Verificamos los datos de los Numeros
			
			foreach($number as $k => $val){
				
				$val = str_replace("'",'A',$val);
				
				$card['id'] = $idNumber[$k];
				$card['numero'] = $val;
															
				$projEje->setNumero($val);
								
				$ejesN[$k] = $card;
				
				if(!$projEje->SaveTemp()){
					$continue = false;					
				}
				
			}
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			$projEje->setProjectId($projectId);
			
			//EJE L
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resLetter = $projEje->EnumerateL();
			
			$delIds = array();
			foreach($resLetter as $res){				
				$idL = $res['projEjeLId'];
				
				if(!in_array($idL,$idLetter))
					$delIds[] = $idL;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($letter as $k => $val){
				$id = $idLetter[$k];
				
				$val = str_replace("'",'1',$val);
				
				$projEje->setLetra($val);
				
				if($id){
					$projEje->setProjEjeLId($id);
					$projEje->UpdateL();
				}else{
					$projEje->SaveL();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projEje->setProjEjeLId($id);
				$projEje->DeleteL();
			}
			
			//EJES N
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resNumber = $projEje->EnumerateN();
			
			$delIds = array();
			foreach($resNumber as $res){				
				$idN = $res['projEjeNId'];
				
				if(!in_array($idN,$idNumber))
					$delIds[] = $idN;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($number as $k => $val){
				$id = $idNumber[$k];
				
				$val = str_replace("'",'A',$val);
				
				$projEje->setNumero($val);
				
				if($id){
					$projEje->setProjEjeNId($id);
					$projEje->UpdateN();
				}else{
					$projEje->SaveN();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projEje->setProjEjeNId($id);
				$projEje->DeleteN();
			}
			
			$_SESSION['msgOk'] = 4;
			echo 'ok[#]';
			echo $p;
			
		break;	
		
}

?>
