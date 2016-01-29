<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['projP'];

switch($_POST['type'])
{
	case 'addProject': 
		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project-popup.tpl');
				
		break;
	
	case 'addProject2': 
		
		$info = $_SESSION['proyecto'];
		
		$abc = $util->LoadAbc();
		
		$smarty->assign('info', $info);
		$smarty->assign('abc', $abc);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-project2-popup.tpl');
				
		break;	

	case 'editAddress':
		
		$project->setProjectId($_POST['id']);
		$info = $project->Info();
		
		$info = $util->EncodeRow($info);
		
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-project-address-popup.tpl');
		
		break;
	
	case 'saveEditAddress':
			
			$project->setProjectId($_POST['id']);
			$project->setResponsable($_POST['responsable']);
			$project->setAddress($_POST['address']);
													
			if(!$project->UpdateAddress())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			
		break;
		
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
			
			$card['name'] = $_POST['name_'.$k];
			$card['levels'] = $_POST['levels_'.$k];
			$card['iniLevel'] = $_POST['iniLevel_'.$k];
			$card['deptos'] = $_POST['deptos_'.$k];
			$card['separacion'] = $_POST['separacion_'.$k];
			
			$infT[$k] = $card;
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
					
					$card['level'] = $nivel;
					$card['name'] = $name;
					$card['deptos'] = $deptos;
					
					$infN[$t][$l] = $card;
										
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
			
			$continue = true;
			$areaTypes = array();
			
			foreach($name as $key => $res){
				
				$card['name'] = $res;
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
				
					$card2['name'] = $res2;
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
				
			}//foreach

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
			$letter = $_POST['letter'];
			
			$ejes = array();
						
			if(!count($number))
				$number = array();
			
			$continue = true;
						
			foreach($number as $res){
				
				$res = str_replace("'",'A',$res);
				
				$projEje->setNumero($res);
								
				$ejes['N'][] = $res;
				
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
						
			foreach($letter as $res){				
				
				$res = str_replace("'",'1',$res);
				
				$projEje->setLetra($res);
				
				$ejes['L'][] = $res;
				
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
						
						$tipos[$t][$l][$d] = $typeId;
						$subTipos[$t][$l][$d] = $subTypeId;
						$depas[$t][$l][$d] = $depto;
												
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
						
			$cajon = $util->CheckArray($_POST['cajon']);
			$bodega = $util->CheckArray($_POST['bodega']);
			
			$continue = true;
			
			$cajones = array();
			foreach($cajon as $k => $res){
				$card['name'] = $cajon[$k];
				
				$projCajon->setName2($card['name']);
				if(!$projCajon->SaveTemp())					
					$continue = false;
				
				$cajones[] = $card;				
			}
			
			$_SESSION['cajones'] = $cajones;
			
			$bodegas = array();
			foreach($bodega as $k => $res){
				$card['name'] = $bodega[$k];
				
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
			$currMant = $_POST['currencyMant'];
			
			$qtyEquip = $_POST['qtyEquip'];		
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
				$card['currency'] = $currency;
						
				$mtoMant[] = $card;
				
				if(!$projMant->SaveTemp()){
					$continue = false;					
				}
				
			}
															
			//EQUIPAMIENTO
			
			if(!count($qtyEquip))
				$qtyEquip = array();			
			
			$mtoEquip = array();			
			foreach($qtyEquip as $k => $res){
				
				$currency = $currEquip[$k];
																
				$projEquip->setQuantity($res);
				$projEquip->setCurrency($currency);
				
				$card['quantity'] = $res;
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
								
				$project->setName($info['name']);
				$project->setItems($info['items']);
				$project->setSeparacion($info['separacion']);
				$project->setValPromM2($info['valPromM2']);
								
				$projectId = $project->Save();
				
				//Save History Data
				$user->setModule('Proyectos');
				$user->setAction('Agregar');
				$user->setItemId($projectId);
				$user->SaveHistory();
				
				//Guardamos los Cajones
				$cajones = $util->CheckArray($_SESSION['cajones']);
				foreach($cajones as $res){
					$projCajon->setProjectId($projectId);
					$projCajon->setName($res['name']);
					$projCajon->Save();
				}
				
				//Guardamos las Bodegas
				$bodegas = $util->CheckArray($_SESSION['bodegas']);
				foreach($bodegas as $res){
					$projBodega->setProjectId($projectId);
					$projBodega->setName($res['name']);
					$projBodega->Save();
				}
				
				//Guardamos los Montos de Mantenimiento
				foreach($mtoMant as $res){
					$projMant->setProjectId($projectId);
					$projMant->setQuantity($res['quantity']);
					$projMant->setCurrency($res['currency']);
					$projMant->Save();
				}
				
				//Guardamos los Montos de Equipamiento
				foreach($mtoEquip as $res){
					$projEquip->setProjectId($projectId);
					$projEquip->setQuantity($res['quantity']);
					$projEquip->setCurrency($res['currency']);
					$projEquip->Save();
				}
				
				//Guardamos los Tipos de Area
				$typeAreaId = array();
				$subTypeAreaId = array();
				$areaTypes = $util->CheckArray($_SESSION['tiposArea']);
				foreach($areaTypes as $k => $val){
					
					$projType->setProjectId($projectId);
					$projType->setName($val['name']);
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
					
					$projTypeId = $projType->Save();
					
					if(count($val['subTypes']) == 0)
						$val['subTypes'] = array();
					
					foreach($val['subTypes'] as $k2 => $val2){
						
						$projType->setProjTypeId($projTypeId);
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
						
						$projSubTypeId = $projType->SaveSubType();
						
						$subTypeAreaId[$k][$k2] = $projSubTypeId;
						
					}//foreach
					
					$typeAreaId[$k] = $projTypeId;
					
				}//foreach
				
				//Guardamos los Ejes
				$ejes = $_SESSION['ejes'];
				
				$ejes['L'] = $util->CheckArray($ejes['L']);
				foreach($ejes['L'] as $val){
					
					$val = str_replace("'",'1',$val);
					
					$projEje->setProjectId($projectId);
					$projEje->setLetra($val);
					
					$projEje->SaveL();
				}
				
				$ejes['N'] = $util->CheckArray($ejes['N']);
				foreach($ejes['N'] as $val){
					
					$val = str_replace("'",'A',$val);
				
					$projEje->setProjectId($projectId);
					$projEje->setNumero($val);
					
					$projEje->SaveN();
				}
				
				$torres = $util->CheckArray($_SESSION['torres']);
				$niveles = $_SESSION['niveles'];
				$tipos = $_SESSION['tipos'];
				$subTipos = $_SESSION['subTipos'];
				$depas = $_SESSION['depas'];
								
				foreach($torres as $t => $res){
					
					$projItem->setProjectId($projectId);
					$projItem->setName($res['name']);
					$projItemId = $projItem->Save();
					
					//Checamos el nombre por cada nivel	
					for($l=0; $l<$res['levels']; $l++){
					
						$nivel = $niveles[$t][$l]['level'];
						$name = $niveles[$t][$l]['name'];					
												
						$projLevel->setProjItemId($projItemId);
						$projLevel->setProjectId($projectId);
						$projLevel->setLevel($nivel);
						$projLevel->setName($name);
						
						$projLevelId = $projLevel->Save();
						
						$totalDeptos = $niveles[$t][$l]['deptos'];
						
						for($d=0; $d<$totalDeptos; $d++){
							
							$typeId = $tipos[$t][$l][$d];
							$subTypeId = $subTipos[$t][$l][$d];
							$depto = $depas[$t][$l][$d];
							
							$projDepto->setProjLevelId($projLevelId);
							$projDepto->setProjItemId($projItemId);
							$projDepto->setProjectId($projectId);				
							$projDepto->setProjTypeId($typeAreaId[$typeId]);							
							$projDepto->setProjSubTypeId($subTypeAreaId[$typeId][$subTypeId]);
							$projDepto->setName($depto);
							
							$projDepto->Save();
														
						}//for									
						
					}//for
					
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
				
				$_SESSION['msgOk'] = 1;
				echo 'ok[#]';
			}
						
		break;
	
	/*** TYPE AREAS ***/
	
	case 'addTypeArea':
			
			$info = $_SESSION['proyecto'];
			$areaTypes = $_SESSION['tiposArea'];
			
			$card['name'] = '';
			$card['redondeo'] = number_format($info['redondeo'],2);
			$card['comunArea'] = '0.00';
			$card['realArea'] = '0.00';
			$card['ventaArea'] = number_format($info['redondeo'],2);
			$card['terrazaReal'] = '0.00';
			$card['terrazaComun'] = number_format($info['redondeo'],2);
			$card['jardinReal'] = '0.00';
			$card['jardinComun'] = number_format($info['redondeo'],2);
			$card['color'] = '#FFFFFF';
			$card['abierta'] = 0;
			
			$areaTypes[] = $card;
			$_SESSION['tiposArea'] = $areaTypes;
			
			echo 'ok[#]';
			
			$smarty->assign('areaTypes', $areaTypes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projTypeArea.tpl');
			
		break;
	
	case 'delTypeArea':
			
			$id = $_POST['id'];
			
			$areaTypes = $_SESSION['tiposArea'];
			
			unset($areaTypes[$id]);
						
			$_SESSION['tiposArea'] = $areaTypes;
			
			echo 'ok[#]';
			
			$smarty->assign('areaTypes', $areaTypes);
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
		
		$projectId = $_POST['id'];
		$project->setProjectId($projectId);	
		
		$project->DeleteImage();
				
		if(!$project->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Proyectos');
			$user->setAction('Eliminar');
			$user->setItemId($projectId);
			$user->SaveHistory();
					
			$_SESSION['msgOk'] = 3;
			echo 'ok[#]';			
		}
			
		break;
	
	/*** EJES N ***/
	
	case 'addEjeN':
			
			$ejes = $_SESSION['ejes'];
						
			$ejes['N'][] = '';
			
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesN.tpl');
			
		break;
	
	case 'delEjeN':
			
			$id = $_POST['id'];
			
			$ejes = $_SESSION['ejes'];
			
			unset($ejes['N'][$id]);
						
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesN.tpl');
			
		break;
	
	case 'saveEjesN':		

			$number = $_POST['number'];
			$ejes = $_SESSION['ejes'];
						
			if(!count($number))
				$number = array();
			
			$continue = true;
			$ejes['N'] = array();
			
			foreach($number as $k => $res){
				
				$res = str_replace("'",'A',$res);
				
				$projEje->setNumero($res);
								
				$ejes['N'][$k] = $res;
				
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
						
			$ejes['L'][] = '';
			
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesL.tpl');
			
		break;
	
	case 'delEjeL':
			
			$id = $_POST['id'];
			
			$ejes = $_SESSION['ejes'];
			
			unset($ejes['L'][$id]);
						
			$_SESSION['ejes'] = $ejes;
			
			echo 'ok[#]';
			
			$smarty->assign('ejes', $ejes);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/projEjesL.tpl');
			
		break;
	
	case 'saveEjesL':		
			
			$letter = $_POST['letter'];
			$ejes = $_SESSION['ejes'];
									
			$continue = true;
			$ejes['L'] = array();
			
			if(!count($letter))
				$letter = array();
			
			foreach($letter as $k => $res){
				
				$val = str_replace("'",'1',$res);
																
				$projEje->setLetra($res);
				
				$ejes['L'][$k] = $res;
				
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
						
			if($id >= 0 && $id != ''){
				$areaTypes = $_SESSION['tiposArea'];			
				$info = $areaTypes[$id];
			}else{
				$info['color'] = '#FFFFFF';
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
			
			$typeId = $idType;
			$types[$idType]['subTypes'] = $areaSubTypes;			
			
			$smarty->assign('typeId', $typeId);			
			$smarty->assign('nom', $nom);
			$smarty->assign('types', $types);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumSubTypeGralDepto3.tpl');
			
		break;
	
	case 'getSubTypeAreaColor':
			
			$idType = $_POST['typeId'];
			$id = $_POST['subTypeId'];

			if($id == ''){			
				$areaTypes = $_SESSION['tiposArea'];			
				$info = $areaTypes[$idType];								
			}else{
				$areaTypes = $_SESSION['tiposArea'];			
				$areaSubTypes = $areaTypes[$idType]['subTypes'];
				$info = $areaSubTypes[$id];
			}
						
			echo 'ok[#]';			
			echo $info['color'];
		
		break;
	
}

?>
