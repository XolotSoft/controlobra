<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projP'];

switch($_POST['type'])
{	
	case 'saveStep1':				
		
		if(!$_POST['separacion'])
			$separacion = 1;
		else
			$separacion = $_POST['separacion'];
			
		if(!$_POST['deptos'])
			$deptos = 1;
		else
			$deptos = $_POST['deptos'];
		
		$noEjesL = ($_POST['noEjesL'] == '') ? 1 : $_POST['noEjesL'];
		$noEjesN = ($_POST['noEjesN'] == '') ? 1 : $_POST['noEjesN'];
		
		$project->setName($_POST['name']);
		$project->setItems($_POST['items']);
		$project->setLevels($_POST['levels']);
		$project->setIniLevel($_POST['iniLevel']);
		$project->setSeparacion($separacion);
		$project->setDeptos($deptos);
		$project->setNoEjesL($_POST['noEjesL']);
		$project->setNoEjesN($_POST['noEjesN']);
		$project->setRedondeo($_POST['redondeo']);
		$project->setCajonesEst($_POST['cajonesEst']);
		$project->setBodegas($_POST['bodegas']);
		$project->setValPromM2($_POST['valPromM2']);
										
		if(!$project->SaveStep1())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{			
			echo 'ok[#]';
		}		
		
		break;
	
	case 'saveStep2':	 	
		
		$info = $_SESSION['proyecto'];
		
		$separacion = $info['separacion'];	
		
		$continue = true;
		
		$infT = array();
		
		//Verificamos que tengan nombre las Torres
		
		for($k=0; $k<$info['items']; $k++){
				
			$projItem->setName($_POST['name_'.$k]);
			if(!$projItem->SaveTemp()){
				$continue = false;
			}
			
			$card['projItemId'] = $_POST['idProjItem_'.$k];
			$card['name'] = utf8_decode($_POST['name_'.$k]);
			$card['levels'] = $_POST['levels_'.$k];
			$card['iniLevel'] = $_POST['iniLevel_'.$k];
			$card['deptos'] = $_POST['deptos_'.$k];
			$card['separacion'] = $_POST['separacion_'.$k];
			
			$infT[] = $card;
		}
				
		if(!$continue)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			$_SESSION['torres'] = $infT;
			//$_SESSION['niveles'] = array();
			//unset($_SESSION['niveles']);
			echo 'ok[#]';
		}
			
		break;
	
	case 'saveStep3':
			
			$info = $_SESSION['proyecto'];
			$torres = $_SESSION['torres'];
			
			$continue = true;
			
			$infN = array();
			foreach($torres as $t => $res){
				
				//Checamos el nombre por cada nivel	
				for($l=0; $l<$res['levels']; $l++){							
					
					$projLevelId = $_POST['idProjLevel_'.$t.'_'.$l];
					$nivel = $_POST['level_'.$t.'_'.$l];
					$name = $_POST['name_'.$t.'_'.$l];
					$deptos = $_POST['deptos_'.$t.'_'.$l];
					
					$projLevel->setLevel($nivel);
					$projLevel->setName($name);
					$projLevel->setDeptos($deptos);
					
					if(!$projLevel->saveTemp()){
						$continue = false;
						break;
					}
					
					$card['projLevelId'] = $projLevelId;
					$card['level'] = $nivel;
					$card['name'] = $name;
					$card['deptos'] = $deptos;
					
					$infN[$t][] = $card;
										
				}//for
				
			}//foreach
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				$_SESSION['niveles'] = $infN;
				echo 'ok[#]';
			}
			
		break;
	
	case 'saveStep4':
						
			$name = $_POST['name'];
			$comunArea = $_POST['comunArea'];
			$realArea = $_POST['realArea'];
			$ventaArea = $_POST['ventaArea'];
			$terrazaReal = $_POST['terrazaReal'];
			$terrazaComun = $_POST['terrazaComun'];
			$jardinReal = $_POST['jardinReal'];
			$jardinComun = $_POST['jardinComun'];
			$color = $_POST['color'];
			$abierta = $_POST['abierta'];
			$idProjType = $_POST['idProjType'];
						
			$continue = true;
			$areaTypes = array();
			
			foreach($name as $key => $res){
				
				
				$card['name'] = utf8_decode($res);
				$card['typeId'] = $idProjType[$key];
				$card['redondeo'] = $redondeo[$key];
				$card['comunArea'] = $comunArea[$key];
				$card['realArea'] = $realArea[$key];
				$card['ventaArea'] = $ventaArea[$key];
				$card['terrazaReal'] = $terrazaReal[$key];
				$card['terrazaComun'] = $terrazaComun[$key];
				$card['jardinReal'] = $jardinReal[$key];
				$card['jardinComun'] = $jardinComun[$key];
				$card['color'] = $color[$key];
				$card['abierta'] = ($abierta[$key] == 1) ? 1 : 0;
				
				$projType->setName($card['name']);
				$projType->setRedondeo($card['redondeo']);
				$projType->setComunArea($card['comunArea']);
				$projType->setRealArea($card['realArea']);
				$projType->setVentaArea($card['ventaArea']);
				$projType->setTerrazaReal($card['terrazaReal']);
				$projType->setTerrazaComun($card['terrazaComun']);
				$projType->setJardinReal($card['jardinReal']);
				$projType->setJardinComun($card['jardinComun']);
				$projType->setAbierta($card['abierta']);
				
				/*** SubTypes ***/
				
				$name2 = $_POST['name'.$key];
				$idProjSubType2 = $_POST['idProjSubType'.$key];
				$comunArea2 = $_POST['comunArea'.$key];
				$realArea2 = $_POST['realArea'.$key];
				$ventaArea2 = $_POST['ventaArea'.$key];
				$terrazaReal2 = $_POST['terrazaReal'.$key];
				$terrazaComun2 = $_POST['terrazaComun'.$key];
				$jardinReal2 = $_POST['jardinReal'.$key];
				$jardinComun2 = $_POST['jardinComun'.$key];
				$color2 = $_POST['color'.$key];
				$abierta2 = $_POST['abierta'.$key];
				
				if(count($name2) == 0)
					$name2 = array();
				
				$subTypes = array();
				foreach($name2 as $k => $res2){
				
					$card2['name'] = utf8_decode($res2);
					$card2['projSubTypeId'] = $idProjSubType2[$k];
					$card2['redondeo'] = $redondeo2[$k];
					$card2['comunArea'] = $comunArea2[$k];
					$card2['realArea'] = $realArea2[$k];
					$card2['ventaArea'] = $ventaArea2[$k];
					$card2['terrazaReal'] = $terrazaReal2[$k];
					$card2['terrazaComun'] = $terrazaComun2[$k];
					$card2['jardinReal'] = $jardinReal2[$k];
					$card2['jardinComun'] = $jardinComun2[$k];
					$card2['color'] = $color2[$k];
					$card2['abierta'] = ($abierta2[$k] == 1) ? 1 : 0;
					
					$projType->setName($card2['name']);
					
					$subTypes[] = $card2;
					
				}//foreach
				
				$card['subTypes'] = $subTypes;
				
				/*** End SubTypes ***/
				
				$areaTypes[] = $card;
				
				if(!$projType->SaveTemp()){
					$continue = false;					
				}
				
			}
			
			$projType->setQtyType(count($areaTypes));
			if(!$projType->SaveTemp()){
				$continue = false;					
			}
			
			$_SESSION['tiposArea'] = $areaTypes;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{										
				echo 'ok[#]';
			}			
			
		break;
	
	case 'saveStep5':

			$number = $_POST['number'];
			$idProjEjeN = $_POST['idProjEjeN'];
			
			$letter = $_POST['letter'];
			$idProjEjeL = $_POST['idProjEjeL'];
			
			$ejes = array();
						
			if(!count($number))
				$number = array();
			
			$continue = true;
						
			foreach($number as $k => $res){
				
				$res = str_replace("'",'A',$res);
				
				$projEje->setNumero($res);
				
				$card['numero'] = $res;
				$card['projEjeNId'] = $idProjEjeN[$k];
				
				$ejes['N'][$k] = $card;
				
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
			
			if(!count($letter))
				$letter = array();
			
			$continue = true;
			
			$card = array();
			foreach($letter as $k => $res){				
				
				$res = str_replace("'",'1',$res);
				
				$projEje->setLetra($res);
				
				$card['letra'] = $res;
				$card['projEjeLId'] = $idProjEjeL[$k];
				
				$ejes['L'][$k] = $card;
				
				if(!$projEje->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			$_SESSION['ejes'] = $ejes;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{									
				echo 'ok[#]';
			}
						
		break;
	
	case 'saveStep6':
			
			$info = $_SESSION['proyecto'];
			$torres = $_SESSION['torres'];
			$niveles = $_SESSION['niveles'];
			
			$continue = true;
			
			foreach($torres as $t => $res){
				
				//Checamos el nombre por cada nivel	
				for($l=0; $l<$res['levels']; $l++){							
					
					$totalDeptos = $niveles[$t][$l]['deptos'];
					
					$continue2 = true;
					for($d=0; $d<$totalDeptos; $d++){
												
						$typeId = $_POST['typeId_'.$t.'_'.$l.'_'.$d];
						$subTypeId = $_POST['subTypeId_'.$t.'_'.$l.'_'.$d];
						$depto = $_POST['depto_'.$t.'_'.$l.'_'.$d];
						$projDeptoId = $_POST['idProjDepto_'.$t.'_'.$l.'_'.$d];
						
						$tipos[$t][$l][$d] = $typeId;
						$subTipos[$t][$l][$d] = $subTypeId;
						$depas[$t][$l][$d] = $depto;
						$projDeptoIds[$t][$l][$d] = $projDeptoId;
						
						$projDepto->setProjTypeId2($typeId);
						$projDepto->setName2($depto);					
						if(!$projDepto->saveTemp()){
							$continue2 = false;
							break;
						}
						
					}//for
					
					if(!$continue2){
						$continue = false;
						break;
					}//if						
					
				}//for
				
				$_SESSION['tipos'] = $tipos;
				$_SESSION['subTipos'] = $subTipos;
				$_SESSION['depas'] = $depas;
				$_SESSION['projDeptoIds'] = $projDeptoIds;
				
			}//foreach
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{					
				echo 'ok[#]';				
			}
			
		break;
		
	case 'saveStep7':
			
			$info = $_SESSION['proyecto'];
			
			$cajon = $_POST['cajon'];
			$idProjCajon = $_POST['idProjCajon'];
			
			$bodega = $_POST['bodega'];
			$idProjBodega = $_POST['idProjBodega'];
						
			$continue = true;
			
			if(count($cajon) == 0)
				$cajon = array();
				
			$cajones = array();
			foreach($cajon as $k => $res){
				$card['name'] = utf8_decode($cajon[$k]);
				$card['projCajonId'] = $idProjCajon[$k];
				
				$projCajon->setName2($card['name']);
				if(!$projCajon->SaveTemp())					
					$continue = false;
				
				$cajones[] = $card;				
			}
			
			$_SESSION['cajones'] = $cajones;
			
			if(count($bodega) == 0)
				$bodega = array();
			
			$bodegas = array();
			foreach($bodega as $k => $res){
				$card['name'] = utf8_decode($bodega[$k]);
				$card['projBodegaId'] = $idProjBodega[$k];
				
				$projBodega->setName2($card['name']);
				if(!$projBodega->SaveTemp())
					$continue = false;
				
				$bodegas[] = $card;
			}
			
			$_SESSION['bodegas'] = $bodegas;
									
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{				
				echo 'ok[#]';				
			}
			
		break;
	
	case 'saveStep8':
						
			$info = $_SESSION['proyecto'];
			
			$qtyMant = $_POST['qtyMant'];
			$idProjMant = $_POST['idProjMant'];
			$currMant = $_POST['currencyMant'];
			
			$qtyEquip = $_POST['qtyEquip'];
			$idProjEquip = $_POST['idProjEquip'];
			$currEquip = $_POST['currencyEquip'];
			
			//MANTENIMIENTO
									
			if(!count($qtyMant))
				$qtyMant = array();
			
			$continue = true;
			$mtoMant = array();			
			foreach($qtyMant as $k => $res){
				
				$currency = $currMant[$k];
																
				$projMant->setQuantity($res);
				$projMant->setCurrency($currency);
				
				$card['quantity'] = $res;
				$card['projMantId'] = $idProjMant[$k];
				$card['currency'] = $currency;
						
				$mtoMant[] = $card;
				
				if(!$projMant->SaveTemp()){
					$continue = false;					
				}
				
			}
															
			//EQUIPAMIENTO
			
			if(!count($qtyEquip))
				$qtyEquip = array();			
			
			$card = array();
			$mtoEquip = array();			
			foreach($qtyEquip as $k => $res){
				
				$currency = $currEquip[$k];
																
				$projEquip->setQuantity($res);
				$projEquip->setCurrency($currency);
				
				$card['quantity'] = $res;
				$card['projEquipId'] = $idProjEquip[$k];
				$card['currency'] = $currency;
						
				$mtoEquip[] = $card;
				
				if(!$projEquip->SaveTemp()){
					$continue = false;					
				}
				
			}
																			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				$projectId = $_SESSION['projEditId'];				
				
				$project->setProjectId($projectId);				
				$project->setName($info['name']);
				$project->setItems($info['items']);
				$project->setSeparacion($info['separacion']);
				$project->setValPromM2($info['valPromM2']);
								
				$project->Update();
				
				//Save History Data
				$user->setModule('Proyectos');
				$user->setAction('Editar');
				$user->setItemId($projectId);
				$user->SaveHistory();
				
				//Guardamos los Cajones
								
				$cajonesIds = array();
				$cajones = $util->CheckArray($_SESSION['cajones']);
				foreach($cajones as $res){
					$projCajonId = $res['projCajonId'];
				
					$projCajon->setProjectId($projectId);
					$projCajon->setProjCajonId($projCajonId);
					$projCajon->setName(utf8_encode($res['name']));
					
					if($projCajonId)
						$projCajon->Update();
					else
						$projCajonId = $projCajon->Save();
					
					$cajonesIds[] = $projCajonId;
				}
				
				//Eliminamos los Cajones no necesarios
				
				$projCajon->setProjectId($projectId);
				$resCajones = $projCajon->EnumerateAll();	
							
				foreach($resCajones as $res){
					
					if(!in_array($res['projCajonId'],$cajonesIds)){
						$projCajon->setProjCajonId($res['projCajonId']);
						$projCajon->Delete();
					}
					
				}//foreach
				
				//Guardamos las Bodegas
								
				$bodegasIds = array();
				$bodegas = $util->CheckArray($_SESSION['bodegas']);
				foreach($bodegas as $res){
					$projBodegaId = $res['projBodegaId'];
					
					$projBodega->setProjectId($projectId);
					$projBodega->setProjBodegaId($projBodegaId);
					$projBodega->setName(utf8_encode($res['name']));
					
					if($projBodegaId)
						$projBodega->Update();
					else
						$projBodegaId = $projBodega->Save();
					
					$bodegasIds[] = $projBodegaId;
				}
				
				//Eliminamos las Bodegas no necesarias
				
				$projBodega->setProjectId($projectId);
				$resBodegas = $projBodega->EnumerateAll();	
							
				foreach($resBodegas as $res){
					
					if(!in_array($res['projBodegaId'],$bodegasIds)){
						$projBodega->setProjBodegaId($res['projBodegaId']);
						$projBodega->Delete();
					}
					
				}//foreach
				
				//Guardamos los Montos de Mantenimiento
				
				$mtoMantIds = array();
				foreach($mtoMant as $res){
					$projMantId = $res['projMantId'];
					
					$projMant->setProjectId($projectId);
					$projMant->setProjMantId($projMantId);
					$projMant->setQuantity($res['quantity']);
					$projMant->setCurrency($res['currency']);
					
					if($projMantId)
						$projMant->Update();
					else
						$projMantId = $projMant->Save();
					
					$mtoMantIds[] = $projMantId;
					
				}//foreach
				
				//Eliminamos los Montos de Mantenimiento
				
				$projMant->setProjectId($projectId);
				$montosM = $projMant->Enumerate();	
							
				foreach($montosM as $res){
					
					if(!in_array($res['projMantId'],$mtoMantIds)){
						$projMant->setProjMantId($res['projMantId']);
						$projMant->Delete();
					}
					
				}//foreach				
				
				//Guardamos los Montos de Equipamiento
				
				$mtoEquipIds = array();
				foreach($mtoEquip as $res){
					$projEquipId = $res['projEquipId'];
					
					$projEquip->setProjectId($projectId);
					$projEquip->setProjEquipId($projEquipId);
					$projEquip->setQuantity($res['quantity']);
					$projEquip->setCurrency($res['currency']);
										
					if($projEquipId)
						$projEquip->Update();
					else
						$projEquipId = $projEquip->Save();
					
					$mtoEquipIds[] = $projEquipId;
					
				}//foreach
				
				//Eliminamos los Montos de Equipamiento
				
				$projEquip->setProjectId($projectId);
				$montosE = $projEquip->Enumerate();	
							
				foreach($montosE as $res){
					
					if(!in_array($res['projEquipId'],$mtoEquipIds)){
						$projEquip->setProjEquipId($res['projEquipId']);
						$projEquip->Delete();
					}
					
				}//foreach
								
				//Guardamos los Tipos de Area
				
				$typeAreaId = array();
				$subTypeAreaId = array();
				$idSubTypeArea = array();
				$areaTypes = $util->CheckArray($_SESSION['tiposArea']);
				foreach($areaTypes as $k => $val){
					
					$projTypeId = $val['typeId'];
										
					$projType->setProjectId($projectId);
					$projType->setProjTypeId($projTypeId);
					$projType->setName(utf8_encode($val['name']));
					$projType->setRedondeo($val['redondeo']);
					$projType->setComunArea($val['comunArea']);
					$projType->setRealArea($val['realArea']);
					$projType->setVentaArea($val['ventaArea']);
					$projType->setTerrazaReal($val['terrazaReal']);
					$projType->setTerrazaComun($val['terrazaComun']);
					$projType->setJardinReal($val['jardinReal']);
					$projType->setJardinComun($val['jardinComun']);
					$projType->setColor($val['color']);
					$projType->setAbierta($val['abierta']);
					
					if($projTypeId)
						$projType->Update();
					else
						$projTypeId = $projType->Save();
					
					/****************************/
					
					$areaSubTypes = $util->CheckArray($val['subTypes']);
					
					foreach($areaSubTypes as $k2 => $val2){
						
						$projSubTypeId = $val2['projSubTypeId'];
						
						$projType->setProjTypeId($projTypeId);
						$projType->setProjSubTypeId($projSubTypeId);
						$projType->setProjectId($projectId);
						$projType->setName($val2['name']);
						$projType->setRedondeo($val2['redondeo']);
						$projType->setComunArea($val2['comunArea']);
						$projType->setRealArea($val2['realArea']);
						$projType->setVentaArea($val2['ventaArea']);
						$projType->setTerrazaReal($val2['terrazaReal']);
						$projType->setTerrazaComun($val2['terrazaComun']);
						$projType->setJardinReal($val2['jardinReal']);
						$projType->setJardinComun($val2['jardinComun']);
						$projType->setColor($val2['color']);
						$projType->setAbierta($val2['abierta']);
						
						if($projSubTypeId)
							$projType->UpdateSubType();
						else
							$projSubTypeId = $projType->SaveSubType();
						
						$subTypeAreaId[] = $projSubTypeId;
						$idSubTypeArea[$projTypeId][$k2] = $projSubTypeId;
						
					}//foreach
					
					/***************************/
					
					$typeAreaId[$k] = $projTypeId;
					
				}//foreach
				
				//Eliminamos los Tipos de Areas no necesarios
				
				$projType->setProjectId($projectId);
				$tiposAreas = $projType->EnumerateAll();	
							
				foreach($tiposAreas as $res){
					
					if(!in_array($res['projTypeId'],$typeAreaId)){
						$projType->setProjTypeId($res['projTypeId']);
						$projType->Delete();
					}
					
				}//foreach
				
				//Eliminamos los SubTipos de Areas no necesarios
				
				$projType->setProjectId($projectId);
				$subTiposAreas = $projType->EnumSubTypesByProject();	
								
				foreach($subTiposAreas as $res){
					
					if(!in_array($res['projSubTypeId'],$subTypeAreaId)){
						$projType->setProjSubTypeId($res['projSubTypeId']);
						$projType->DeleteSubType();
					}
					
				}//foreach
												
				//Guardamos los Ejes L
				
				$ejes = $_SESSION['ejes'];
				
				$idsEjeL = array();
				$ejes['L'] = $util->CheckArray($ejes['L']);
				foreach($ejes['L'] as $val){
					
					$projEjeLId = $val['projEjeLId'];
					$letra = str_replace("'",'1',$val['letra']);
										
					$projEje->setProjectId($projectId);
					$projEje->setProjEjeLId($projEjeLId);
					$projEje->setLetra($letra);
					
					if($projEjeLId)
						$projEje->UpdateL();
					else
						$projEjeLId = $projEje->SaveL();
					
					$idsEjeL[] = $projEjeLId;
					
				}//foreach
				
				//Eliminamos los Ejes L
				
				$projEje->setProjectId($projectId);
				$ejesL = $projEje->EnumerateL();	
							
				foreach($ejesL as $res){
					
					if(!in_array($res['projEjeLId'],$idsEjeL)){
						$projEje->setProjEjeLId($res['projEjeLId']);
						$projEje->DeleteL();
					}
					
				}//foreach
				
				//Guardamos los Ejes N
				
				$idsEjeN = array();
				$ejes['N'] = $util->CheckArray($ejes['N']);
				foreach($ejes['N'] as $val){
					
					$projEjeNId = $val['projEjeNId'];
					$numero = str_replace("'",'A',$val['numero']);
				
					$projEje->setProjectId($projectId);
					$projEje->setProjEjeNId($projEjeNId);
					$projEje->setNumero($numero);
										
					if($projEjeNId)
						$projEje->UpdateN();
					else
						$projEjeNId = $projEje->SaveN();
					
					$idsEjeN[] = $projEjeNId;
					
				}//foreach
				
				//Eliminamos los Ejes N
				
				$projEje->setProjectId($projectId);
				$ejesN = $projEje->EnumerateN();	
							
				foreach($ejesN as $res){
					
					if(!in_array($res['projEjeNId'],$idsEjeN)){
						$projEje->setProjEjeNId($res['projEjeNId']);
						$projEje->DeleteN();
					}
					
				}//foreach
				
				$torres = $util->CheckArray($_SESSION['torres']);
				$niveles = $_SESSION['niveles'];
				$tipos = $_SESSION['tipos'];
				$subTipos = $_SESSION['subTipos'];
				$depas = $_SESSION['depas'];
				$projDeptoIds = $_SESSION['projDeptoIds'];
				
				$itemIds = array();
				foreach($torres as $t => $res){
					
					$projItemId = $res['projItemId'];
										
					$projItem->setProjItemId($projItemId);
					$projItem->setProjectId($projectId);
					$projItem->setName(utf8_encode($res['name']));
					
					if($projItemId)
						$projItem->Update();
					else
						$projItemId = $projItem->Save();
										
					$levelIds = array();
					for($l=0; $l<$res['levels']; $l++){
					
						$projLevelId = $niveles[$t][$l]['projLevelId'];
						$nivel = $niveles[$t][$l]['level'];
						$name = $niveles[$t][$l]['name'];					
						
						$projLevel->setProjLevelId($projLevelId);
						$projLevel->setProjItemId($projItemId);
						$projLevel->setProjectId($projectId);
						$projLevel->setLevel($nivel);
						$projLevel->setName($name);
						
						if($projLevelId)
							$projLevel->Update();
						else						
							$projLevelId = $projLevel->Save();
						
						$levelIds[] = $projLevelId;
						
						//Departamentos					
						
						$totalDeptos = $niveles[$t][$l]['deptos'];
						
						$deptoIds = array();
						for($d=0; $d<$totalDeptos; $d++){
							
							$typeId = $tipos[$t][$l][$d];
							$subTypeId = $subTipos[$t][$l][$d];
							$depto = $depas[$t][$l][$d];
							$projDeptoId = $projDeptoIds[$t][$l][$d];
							
							$projDepto->setProjDeptoId($projDeptoId);
							$projDepto->setProjLevelId($projLevelId);
							$projDepto->setProjItemId($projItemId);
							$projDepto->setProjectId($projectId);				
							$projDepto->setProjTypeId($typeAreaId[$typeId]);
							$projDepto->setProjSubTypeId($idSubTypeArea[$typeId][$subTypeId]);
							$projDepto->setName($depto);
							
							if($projDeptoId)
								$projDepto->Update();
							else
								$projDeptoId = $projDepto->Save();
							
							$deptoIds[] = $projDeptoId;
																						
						}//for
						
						//Eliminamos los deptos no necesarios
						
						$projDepto->setProjLevelId($projLevelId);
						$resDeptos = $projDepto->EnumerateAll();
						
						foreach($resDeptos as $r){
							
							if(!in_array($r['projDeptoId'],$deptoIds)){
								$projDepto->setProjDeptoId($r['projDeptoId']);
								$projDepto->Delete();							
							}
							
						}//foreach												
						
					}//for
					
					//Eliminamos los niveles no necesarios
					
					$projLevel->setProjItemId($projItemId);
					$resLevels = $projLevel->EnumerateAll();
					
					foreach($resLevels as $r){
						
						if(!in_array($r['projLevelId'],$levelIds)){
							$projLevel->setProjLevelId($r['projLevelId']);
							$projLevel->Delete();							
						}
						
					}//foreach
					
					$itemIds[] = $projItemId;
					
				}//foreach
				
				//Eliminamos las Torres no necesarias
						
				$projItem->setProjectId($projectId);
				$resItems = $projItem->EnumerateAll();
				
				foreach($resItems as $r){
					
					if(!in_array($r['projItemId'],$itemIds)){
						$projItem->setProjItemId($r['projItemId']);
						$projItem->Delete();							
					}
					
				}//foreach				
				
				//Limpiamos las variables de session
				$_SESSION['proyecto'] = array();
				$_SESSION['torres'] = array();
				$_SESSION['niveles'] = array();
				$_SESSION['tiposArea'] = array();
				$_SESSION['ejes'] = array();
				$_SESSION['bodegas'] = array();
				$_SESSION['cajones'] = array();
				$_SESSION['mtoMant'] = array();
				$_SESSION['mtoEquip'] = array();
				$_SESSION['tipos'] = array();
				$_SESSION['subTipos'] = array();
				$_SESSION['depas'] = array();
				
				unset($_SESSION['proyecto']);
				unset($_SESSION['torres']);
				unset($_SESSION['niveles']);
				unset($_SESSION['tiposArea']);
				unset($_SESSION['ejes']);
				unset($_SESSION['bodegas']);
				unset($_SESSION['cajones']);
				unset($_SESSION['mtoMant']);
				unset($_SESSION['mtoEquip']);
				unset($_SESSION['tipos']);
				unset($_SESSION['depas']);
				
				$_SESSION['msgOk'] = 2;
				echo 'ok[#]';
			}
						
		break;
	
	/*** TYPE AREAS ***/
	
	case 'addTypeArea':
			
			$info = $_SESSION['proyecto'];
			$areaTypes = $_SESSION['tiposArea'];
			
			$card['name'] = '';
			$card['typeId'] = '';
			$card['redondeo'] = number_format($info['redondeo'],2);
			$card['comunArea'] = '0.00';
			$card['realArea'] = '0.00';
			$card['ventaArea'] = number_format($info['redondeo'],2);
			$card['terrazaReal'] = '0.00';
			$card['terrazaComun'] = number_format($info['redondeo'],2);
			$card['jardinReal'] = '0.00';
			$card['jardinComun'] = number_format($info['redondeo'],2);
			$card['color'] = '#FFFFFF';
			
			$areaTypes[] = $card;
			$_SESSION['tiposArea'] = $areaTypes;
			
			if(count($areaTypes) == 0)
				$areaTypes = array();
			
			$areaTypes2 = array();	
			foreach($areaTypes as $key => $res){
				$res['name'] = utf8_encode($res['name']);				
				$areaTypes2[$key] = $res;
			}
			
			echo 'ok[#]';
			
			$smarty->assign('areaTypes', $areaTypes2);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projTypeArea.tpl');
			
		break;
	
	case 'delTypeArea':
			
			$id = $_POST['id'];
			
			$areaTypes = $_SESSION['tiposArea'];
			
			unset($areaTypes[$id]);
						
			$_SESSION['tiposArea'] = $areaTypes;
			
			if(count($areaTypes) == 0)
				$areaTypes = array();
			
			$areaTypes2 = array();	
			foreach($areaTypes as $key => $res){
				$res['name'] = utf8_encode($res['name']);				
				$areaTypes2[$key] = $res;
			}
			
			echo 'ok[#]';
			
			$smarty->assign('areaTypes', $areaTypes2);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projTypeArea.tpl');
			
		break;
	
	/*** SUB TYPE AREAS ***/
	
	case 'addSubTypeArea':

			$key = $_POST['key'];
			
			$info = $_SESSION['proyecto'];
			$areaTypes = $_SESSION['tiposArea'];
			
			$card = $areaTypes[$key];
			$subTypes = $card['subTypes'];
												
			$card2['name'] = '';
			$card2['redondeo'] = number_format($info['redondeo'],2);
			$card2['comunArea'] = '0.00';
			$card2['realArea'] = '0.00';
			$card2['ventaArea'] = number_format($info['redondeo'],2);
			$card2['terrazaReal'] = '0.00';
			$card2['terrazaComun'] = number_format($info['redondeo'],2);
			$card2['jardinReal'] = '0.00';
			$card2['jardinComun'] = number_format($info['redondeo'],2);
			$card2['color'] = '#FFFFFF';
			$card2['abierta'] = 0;
			
			$subTypes[] = $card2;
			$card['subTypes'] = $subTypes;
			
			$areaTypes[$key] = $card;
						
			$_SESSION['tiposArea'] = $areaTypes;			
			
			echo 'ok[#]';
			
			$smarty->assign('key', $key);
			$smarty->assign('item', $card);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projSubTypeArea.tpl');
			
		break;
	
	case 'delSubTypeArea':

			$k = $_POST['k'];
			$key = $_POST['key'];
			
			$areaTypes = $_SESSION['tiposArea'];
			
			$card = $areaTypes[$key];
			$subTypes = $card['subTypes'];
						
			unset($subTypes[$k]);
			
			$card['subTypes'] = $subTypes;
			
			$areaTypes[$key] = $card;
						
			$_SESSION['tiposArea'] = $areaTypes;			
			
			echo 'ok[#]';
			echo count($subTypes);
			
			echo '[#]';
			
			$smarty->assign('key', $key);
			$smarty->assign('item', $card);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projSubTypeArea.tpl');
			
		break;
	
	/*****************/
		
	case 'updateProject':	 	
		
		$project->setProjectId($_POST['projectId']);	
		$project->setName($_POST['name']);
											
		if(!$project->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			$_SESSION['msgOk'] = 2;
			echo 'ok[#]';			
		}
			
		break;
	
	case 'deleteProject':
		
		$project->setProjectId($_POST['id']);	
		
		$project->DeleteImage();
				
		if(!$project->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{			
			$_SESSION['msgOk'] = 3;
			echo 'ok[#]';			
		}
			
		break;
	
	/*** EJES N ***/
	
	case 'addEjeN':
			
			$ejes = $_SESSION['ejes'];
			
			$card['numero'] = '';
			$card['projEjeNId'] = '';
			
			$ejes['N'][] = $card;
			
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesN2.tpl');
			
		break;
	
	case 'delEjeN':
			
			$id = $_POST['id'];
			
			$ejes = $_SESSION['ejes'];
			
			unset($ejes['N'][$id]);
						
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesN2.tpl');
			
		break;
	
	case 'saveEjesN':		

			$number = $_POST['number'];
			$idProjEjeN = $_POST['idProjEjeN'];
			
			$ejes = $_SESSION['ejes'];
						
			if(!count($number))
				$number = array();
			
			$continue = true;
			$ejes['N'] = array();
			
			foreach($number as $k => $res){
				
				$res = str_replace("'",'A',$res);
				
				$projEje->setNumero($res);
				
				$card['numero'] = $res;
				$card['projEjeNId'] = $idProjEjeN[$k];
				
				$ejes['N'][$k] = $card;
				
				if(!$projEje->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			$_SESSION['ejes'] = $ejes;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{									
				echo 'ok[#]';
			}						
		
		break;
	
	/*** EJES L ***/
	
	case 'addEjeL':
			
			$ejes = $_SESSION['ejes'];
			
			$card['letra'] = '';
			$card['projEjeLId'] = '';
				
			$ejes['L'][] = $card;
			
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesL2.tpl');
			
		break;
	
	case 'delEjeL':
			
			$id = $_POST['id'];
			
			$ejes = $_SESSION['ejes'];
			
			unset($ejes['L'][$id]);
						
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesL2.tpl');
			
		break;
	
	case 'saveEjesL':		
			
			$letter = $_POST['letter'];
			$idProjEjeL = $_POST['idProjEjeL'];
			
			$ejes = $_SESSION['ejes'];
									
			$continue = true;
			$ejes['L'] = array();
			
			if(!count($letter))
				$letter = array();
			
			foreach($letter as $k => $res){
				
				$val = str_replace("'",'1',$res);
																
				$projEje->setLetra($res);
				
				$card['letra'] = $res;
				$card['projEjeLId'] = $idProjEjeL[$k];
				
				$ejes['L'][$k] = $card;
				
				if(!$projEje->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			$_SESSION['ejes'] = $ejes;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{									
				echo 'ok[#]';
			}						
		
		break;
	
	/*** MONTO MANT. ***/
	
	case 'addMontoMant':
			
			$mtoMant = $_SESSION['mtoMant'];
			
			$card['quantity'] = 0;
			$card['projMantId'] = '';
						
			$mtoMant[] = $card;
			
			$_SESSION['mtoMant'] = $mtoMant;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoMant', $mtoMant);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projMontoMant.tpl');
			
		break;
	
	case 'delMontoMant':
			
			$id = $_POST['id'];
			
			$mtoMant = $_SESSION['mtoMant'];
			
			unset($mtoMant[$id]);
						
			$_SESSION['mtoMant'] = $mtoMant;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoMant', $mtoMant);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projMontoMant.tpl');
			
		break;
	
	case 'saveMontoMant':		

			$qtyMant = $_POST['qtyMant'];
			$currMant = $_POST['currencyMant'];
			$idProjMant = $_POST['idProjMant'];
			$mtoMant = $_SESSION['mtoMant'];
			
			if(!count($qtyMant))
				$qtyMant = array();
			
			$continue = true;
			$mtoMant = array();			
			foreach($qtyMant as $k => $res){
				
				$currency = $currMant[$k];
																	
				$projMant->setQuantity($res);
				$projMant->setCurrency($currency);
				
				$card['quantity'] = $res;
				$card['projMantId'] = $idProjMant[$k];
				$card['currency'] = $currency;
								
				$mtoMant[$k] = $card;
				
				if(!$projMant->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			$_SESSION['mtoMant'] = $mtoMant;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{									
				echo 'ok[#]';
			}						
		
		break;
	
	/*** MONTO EQUIP. ***/
	
	case 'addMontoEquip':
			
			$mtoEquip = $_SESSION['mtoEquip'];
			
			$card['quantity'] = 0;
			$card['projEquipId'] = '';
						
			$mtoEquip[] = $card;
			
			$_SESSION['mtoEquip'] = $mtoEquip;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoEquip', $mtoEquip);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projMontoEquip.tpl');
			
		break;
	
	case 'delMontoEquip':
			
			$id = $_POST['id'];
			
			$mtoEquip = $_SESSION['mtoEquip'];
			
			unset($mtoEquip[$id]);
						
			$_SESSION['mtoEquip'] = $mtoEquip;
			
			echo 'ok[#]';
			
			$smarty->assign('mtoEquip', $mtoEquip);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projMontoEquip.tpl');
			
		break;
	
	case 'saveMontoEquip':		

			$qtyEquip = $_POST['qtyEquip'];
			$currEquip = $_POST['currencyEquip'];
			$idProjEquip = $_POST['idProjEquip'];
			$mtoEquip = $_SESSION['mtoEquip'];
						
			if(!count($qtyEquip))
				$qtyEquip = array();
			
			$continue = true;
			$mtoEquip = array();			
			foreach($qtyEquip as $k => $res){
																				
				$currency = $currEquip[$k];
				
				$projEquip->setQuantity($res);
				$projEquip->setCurrency($currency);
				
				$card['quantity'] = $res;
				$card['projEquipId'] = $idProjEquip[$k];
				$card['currency'] = $currency;
								
				$mtoEquip[$k] = $card;
				
				if(!$projEquip->SaveTemp()){
					$continue = false;					
				}
				
			}
						
			$_SESSION['mtoEquip'] = $mtoEquip;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{									
				echo 'ok[#]';
			}						
		
		break;
	
	/*****/
	
	case 'getTypeAreaColor':
			
			$id = $_POST['typeId'];
			
			if($id == ''){
				$info['color'] = '#FFFFFF';
			}else{
				$areaTypes = $_SESSION['tiposArea'];
			
				$info = $areaTypes[$id];				
			}
						
			echo 'ok[#]';			
			echo $info['color'];
		
		break;
	
	case 'getSubTypeAreaColor':
			
			$idType = $_POST['typeId'];
			$id = $_POST['subTypeId'];
			
			if($id == ''){
				$info['color'] = '#FFFFFF';
			}else{
				$areaTypes = $_SESSION['tiposArea'];
			
				$areaSubTypes = $areaTypes[$idType]['subTypes'];
				$info = $areaSubTypes[$id];
			}
						
			echo 'ok[#]';			
			echo $info['color'];
		
		break;
		
	case 'updateCurrentProj':
			
			$curProjId = $_POST['curProjId'];
			
			$_SESSION['curProjId'] = $curProjId;
			
		break;
	
	case 'checkSubTypeAreas':
			
			$idType = $_POST['typeId'];
			$nom = $_POST['nom'];
			
			$areaTypes = $_SESSION['tiposArea'];
			$areaSubTypes = $areaTypes[$idType]['subTypes'];
					
			echo 'ok[#]';
			echo count($areaSubTypes);
			
			echo '[#]';
			
			$iD['typeId'] = $idType;
			$types[$idType]['subTypes'] = $areaSubTypes;			
			
			$smarty->assign('iD', $iD);			
			$smarty->assign('nom', $nom);
			$smarty->assign('types', $types);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSubTypeGralDepto2.tpl');
			
		break;
	
}

?>
