<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['projectId'];
$p = $_SESSION['projP'];

switch($_POST['type'])
{
	
	/*** CAJONES DE ESTACIONAMIENTO ***/
	
	case 'addCajon':
			
			$cajones = $_SESSION['cajones'];
			
			$card['id'] = 0;
			$card['name'] = '';
			
			$cajones[] = $card;
			
			$_SESSION['cajones'] = $cajones;
			
			echo 'ok[#]';
			
			$smarty->assign('cajones', $cajones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyCajonesEst.tpl');
			
		break;
	
	case 'delCajon':
			
			$id = $_POST['id'];
			
			$cajones = $_SESSION['cajones'];
			
			unset($cajones[$id]);
			
			$_SESSION['cajones'] = $cajones;
			
			echo 'ok[#]';
			
			$smarty->assign('cajones', $cajones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyCajonesEst.tpl');
			
		break;
	
	case 'saveCajon':		

			$cajon = $_POST['cajon'];
			$idCajon = $_POST['idCajon'];
									
			if(!count($cajon))
				$cajon = array();
			
			$montos = array();			
			foreach($cajon as $k => $val){				
								
				$card['id'] = $idCajon[$k];
				$card['name'] = $val;
				
				$projCajon->setName($val);
				
				$montos[$k] = $card;												
			}
			
			$_SESSION['cajones'] = $montos;
						
		break;
	
	/*** BODEGAS ***/
	
	case 'addBodega':
			
			$bodegas = $_SESSION['bodegas'];
			
			$card['id'] = 0;
			$card['name'] = '';
			
			$bodegas[] = $card;
			
			$_SESSION['bodegas'] = $bodegas;
			
			echo 'ok[#]';
			
			$smarty->assign('bodegas', $bodegas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyBodegas.tpl');
			
		break;
	
	case 'delBodega':
			
			$id = $_POST['id'];
			
			$bodegas = $_SESSION['bodegas'];
			
			unset($bodegas[$id]);
						
			$_SESSION['bodegas'] = $bodegas;
			
			echo 'ok[#]';
			
			$smarty->assign('bodegas', $bodegas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/proyBodegas.tpl');
			
		break;
	
	case 'saveBodega':		
			
			$bodega = $_POST['bodega'];
			$idBodega = $_POST['idBodega'];
										
			if(!count($bodega))
				$bodega = array();
			
			$montos = array();			
			foreach($bodega as $k => $val){
				
				$card['id'] = $idBodega[$k];
				$card['name'] = $val;
															
				$projBodega->setName($val);
								
				$montos[$k] = $card;							
			}
			
			$_SESSION['bodegas'] = $montos;
							
		break;
	
	case 'saveCajBod':
			
			$bodega = $_POST['bodega'];
			$idBodega = $_POST['idBodega'];
			
			$cajon = $_POST['cajon'];
			$idCajon = $_POST['idCajon'];
			
			if(!count($bodega))
				$bodega = array();
			
			if(!count($idBodega))
				$idBodega = array();
			
			if(!count($cajon))
				$cajon = array();
			
			if(!count($idCajon))
				$idCajon = array();
			
			$continue = true;
			$bodegas = array();
			
			//Verificamos las Cantidades
			
			foreach($bodega as $k => $val){
							
				$card['id'] = $idBodega[$k];
				$card['name'] = $val;
								
				$projBodega->setName($val);
								
				$bodegas[$k] = $card;
				
				if(!$projBodega->SaveTemp()){
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
			$cajones = array();
			
			//Verificamos las Cantidades
			
			foreach($cajon as $k => $val){
								
				$card['id'] = $idCajon[$k];
				$card['name'] = $val;
															
				$projCajon->setName($val);
								
				$cajones[$k] = $card;
				
				if(!$projCajon->SaveTemp()){
					$continue = false;					
				}
				
			}
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			$projBodega->setProjectId($projectId);
			
			//BODEGAS
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resBodega = $projBodega->EnumerateAll();
			
			$delIds = array();
			foreach($resBodega as $res){				
				$idBod = $res['projBodegaId'];
				
				if(!in_array($idBod,$idBodega))
					$delIds[] = $idBod;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($bodega as $k => $val){
				$id = $idBodega[$k];
								
				$projBodega->setName($val);
				
				if($id){
					$projBodega->setProjBodegaId($id);
					$projBodega->Update();
				}else{
					$projBodega->Save();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projBodega->setProjBodegaId($id);
				$projBodega->Delete();
			}
			
			//CAJONES DE EST.
			
			$projCajon->setProjectId($projectId);
			
			//Checamos cuales IDs han sido borrados para eliminar fisicamente
			$resCajon = $projCajon->EnumerateAll();
			
			$delIds = array();
			foreach($resCajon as $res){				
				$idCaj = $res['projCajonId'];
				
				if(!in_array($idCaj,$idCajon))
					$delIds[] = $idCaj;
			}
			
			//Guardamos o actualizamos los datos									
			foreach($cajon as $k => $val){
				$id = $idCajon[$k];
								
				$projCajon->setName($val);
				
				if($id){
					$projCajon->setProjCajonId($id);
					$projCajon->Update();
				}else{
					$projCajon->Save();
				}
				
			}
			
			//Eliminamos los datos
			foreach($delIds as $id){
				$projCajon->setProjCajonId($id);
				$projCajon->Delete();
			}
			
			$_SESSION['cajones'] = array();
			$_SESSION['bodegas'] = array();
			
			unset($_SESSION['cajones']);
			unset($_SESSION['bodegas']);
			
			$_SESSION['msgOk'] = 6;
			echo 'ok[#]';
			echo $p;
			
		break;	
		
}

?>
