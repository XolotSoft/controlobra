<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
			
	$projectId = intval($_GET['projId']);
	
	if($projectId){
		$_SESSION['projEditId'] = $projectId;
		header('Location: '.WEB_ROOT.'/project-edit');
		exit;
	}
	
	$projectId = $_SESSION['projEditId'];
	
	if(!$projectId){
		header('Location: '.WEB_ROOT.'/project');
		exit;
	}
	
	$step = intval($_GET['step']);
	if($step == 0)
		$step = 1;
		
	if($step == 1){
		
		if(!isset($_SESSION['proyecto'])){
		
			$project->setProjectId($projectId);
			$infP = $project->Info();
			
			$info['name'] = $infP['name'];
			$info['items'] = $infP['items'];
			$info['separacion'] = $infP['separacion'];
			$info['valPromM2'] = $infP['valPromM2'];
					
			$projItem->setProjectId($projectId);
			$resItems = $projItem->EnumerateAll();
					
			$levels = 0;
			foreach($resItems as $res){
				$projLevel->setProjItemId($res['projItemId']);
				$info['iniLevel'] = $projLevel->GetIniLevel();
				
				$resLevels = $projLevel->EnumerateAll();
				
				$deptos = 0;
				foreach($resLevels as $val){
					$projDepto->setProjLevelId($val['projLevelId']);
					$noDeptos = count($projDepto->EnumerateAll());
					
					if($noDeptos > $deptos)
						$deptos = $noDeptos;
				}			
				
				$info['deptos'] = $deptos;
				
				$niveles = count($resLevels);
				if($niveles > $levels)
					$levels = $niveles;			
				
			}//foreach
			
			$info['levels'] = $levels;
			
			$projEje->setProjectId($projectId);
			$info['noEjesL'] = count($projEje->EnumerateL());
			$info['noEjesN'] = count($projEje->EnumerateN());
			
			$projType->setProjectId($projectId);
			$resTypes = $projType->EnumerateAll();
			
			$redondeo = 0;
			foreach($resTypes as $res){
				$redondeo = $res['redondeo'];
			}
			
			$info['redondeo'] = $redondeo;
			
			$projCajon->setProjectId($projectId);
			$info['cajonesEst'] = count($projCajon->EnumerateAll());
			
			$projBodega->setProjectId($projectId);
			$info['bodegas'] = count($projBodega->EnumerateAll());
			
			$_SESSION['proyecto'] = $info;
			
		}else{
			$info = $_SESSION['proyecto'];
		}
				
		//$_SESSION['torres'] = '';
		//unset($_SESSION['torres']);
		
		$smarty->assign('info', $info);
				
	}elseif($step == 2){
		
		$info = $_SESSION['proyecto'];		
		$isBack = 0;
		
		if(!isset($_SESSION['torres'])){
		
			$projItem->setProjectId($projectId);
			$resTorres = $projItem->EnumerateAll();
			
			$i = 1;
			$torres = array();
			foreach($resTorres as $res){
				
				$projLevel->setProjItemId($res['projItemId']);
				$resLevels = $projLevel->EnumerateAll();
				
				$deptos = 0;
				$separacion = 0;
				$sigLevel = 0;
				$iniLevel = 0;
				foreach($resLevels as $val){
					$projDepto->setProjLevelId($val['projLevelId']);
					$totDeptos = count($projDepto->EnumerateAll());
					
					if($sigLevel == 0)
						$sigLevel = $val['level'];
					elseif($separacion == 0)
						$separacion = $sigLevel - $val['level'];
					
					if($totDeptos > $deptos)
						$deptos = $totDeptos;
					
					$iniLevel = $val['level'];
				}
				
				$res['levels'] = count($resLevels);
				$res['deptos'] = $deptos;
				$res['iniLevel'] = $iniLevel;
				$res['separacion'] = $separacion;
				
				if($i <= $info['items'])
					$torres[] = $res;
				
				$i++;
			}
			
			$card = array();
			if($info['items'] > count($torres)){
			
				$extItems = $info['items'] - count($torres);
				
				for($i=1; $i<=$extItems; $i++){
					$card['levels'] = $info['levels'];
					$card['deptos'] = $info['deptos'];
					$card['iniLevel'] = $info['iniLevel'];
					$card['separacion'] = $info['separacion'];
					
					$torres[] = $card;
				}
				
			}//if
			
			//$_SESSION['torres'] = $torres;
			
		}else{
		
			$torres = $_SESSION['torres'];
			
			//Eliminamos Torres si hay demas
			$noTorres = count($torres);
			if($noTorres > $info['items']){
				$sobrantes = $noTorres - $info['items'];
				
				for($k=1; $k<=$sobrantes; $k++)
					array_pop($torres);
			}
			
			//Agregamos Torres si faltan
			
			$card = array();
			if($info['items'] > $noTorres){
			
				$extItems = $info['items'] - $noTorres;
				
				for($i=1; $i<=$extItems; $i++){
					$card['levels'] = $info['levels'];
					$card['deptos'] = $info['deptos'];
					$card['iniLevel'] = $info['iniLevel'];
					$card['separacion'] = $info['separacion'];
					
					$torres[] = $card;
				}
				
			}//if
			
		}//else
		
		//$_SESSION['niveles'] = '';
		//unset($_SESSION['niveles']);
		
		$smarty->assign('torres', $torres);
		
	}elseif($step == 3){
		
		$info = $_SESSION['proyecto'];
		$torres = $_SESSION['torres'];
		
		$isBack = 0;
		
		if(!isset($_SESSION['niveles'])){
			
			$niveles = array();
			foreach($torres as $k => $res){
			
				if($res['projItemId']){
									
					$projLevel->setProjItemId($res['projItemId']);
					$resNiveles = $projLevel->EnumerateAll();
					
					$totNiveles = count($resNiveles);
					
					$i = 0;
					$levels = array();
					foreach($resNiveles as $val){
						
						$projDepto->setProjLevelId($val['projLevelId']);
						$val['deptos'] = count($projDepto->EnumerateAll());
					
						$val['level'] = ($totNiveles * $res['separacion']) - ($res['separacion'] - $res['iniLevel']) - ($i * $res['separacion']);
						
						$levels[] = $val;
						$i++;
					}
					
					if($totNiveles > $res['levels']){
					
						$extLevels = $totNiveles - $res['levels'];
						$resLevels = $levels;
						
						$i = 1;
						$levels = array();
						foreach($resLevels as $r){
							
							if($i > $extLevels)				
								$levels[] = $r;
							
							$i++;
						}//foreach
						
					}elseif($totNiveles < $res['levels']){
						
						$extLevels = $res['levels'] - $totNiveles;
						
						$card = array();
						for($l=0; $l<$extLevels; $l++){
							
							$card['projLevelId'] = '';
							$card['level'] = ($totNiveles * $res['separacion']) + ($l * $res['separacion']);
							$card['name'] = 'Piso '.($totNiveles + $l);
							$card['deptos'] = $res['deptos'];
							
							$levels[] = $card;
						}//for
						
						$levels = $util->orderMultiDimensionalArray($levels,'level', true);
						
					}//else
				
				}else{
					
					$card = array();
					$levels = array();
					for($l=1; $l<=$res['levels']; $l++){
						$card['projLevelId'] = '';
						$card['level'] = ($l * $res['separacion']);
						$card['name'] = 'Piso '.($l-1);
						$card['deptos'] = $res['deptos'];
							
						$levels[] = $card;
					}
					
					$levels = $util->orderMultiDimensionalArray($levels,'level', true);
					
				}
				
				$niveles[$k] = $levels;
				
			}//foreach
		
			$_SESSION['niveles'] = $niveles;
		
		}else{
			
			$niveles = $_SESSION['niveles'];
			
			foreach($torres as $k => $res){
				
				$noNiveles = count($niveles[$k]);
				
				$levels = $niveles[$k];
				
				//Eliminamos Niveles demas
				
				if($noNiveles > $res['levels']){
					$sobrantes = $noNiveles - $res['levels'];
					
					for($i=1; $i<=$sobrantes; $i++)
						array_shift($levels);
						
				}
				
				//Agregamos Niveles si faltan
			
				$card = array();				
				if($res['levels'] > $noNiveles){
				
					$extLevels = $res['levels'] - $noNiveles;
					
					$totNiveles = $noNiveles;
					
					$card = array();					
					for($l=0; $l<$extLevels; $l++){
						
						$card['projLevelId'] = '';
						$card['level'] = ($totNiveles * $res['separacion']) + ($l * $res['separacion']);
						$card['name'] = 'Piso '.($totNiveles + $l);
						$card['deptos'] = $res['deptos'];
						
						$levels[] = $card;
					}//for
					
					$levels = $util->orderMultiDimensionalArray($levels,'level', true);
					
				}//if
				
				$niveles[$k] = $levels;
				
			}//foreach
			
		}//else
		
		$_SESSION['depas'] = array();
		unset($_SESSION['depas']);
					
		$smarty->assign('niveles', $niveles);
		$smarty->assign('torres', $torres);
		
	}elseif($step == 4){
		
		$info = $_SESSION['proyecto'];
				
		if(!isset($_SESSION['tiposArea'])){
			
			$projType->setProjectId($projectId);
			$resAreaTypes = $projType->EnumerateAll();
			
			$areaTypes = array();
			foreach($resAreaTypes as $key => $res){
				$res['typeId'] = $res['projTypeId'];
				
				$projType->setProjTypeId($res['projTypeId']);
				$res['subTypes'] = $projType->EnumSubTypesAll();
								
				$areaTypes[$key] = $res;
			}//foreach

			$_SESSION['tiposArea'] = $areaTypes;
			
		}else{				
			$areaTypes = $_SESSION['tiposArea'];
		}
		
		$smarty->assign('areaTypes',$areaTypes);
	
	}elseif($step == 5){
					
		$info = $_SESSION['proyecto'];
		
		if(!isset($_SESSION['ejes'])){
			
			//Eje L
			
			$projEje->setProjectId($projectId);
			$ejesL = $projEje->EnumerateL();
						
			$totEjesL = count($ejesL);
			
			if($info['noEjesL'] > $totEjesL){
				
				$ejesExt = $info['noEjesL'] - $totEjesL;
				
				for($k=1; $k<=$ejesExt; $k++){
					$card['letra'] = '';
					$card['projEjeLId'] = '';
					$ejesL[] = $card;
				}//for
				
			}elseif($info['noEjesL'] < $totEjesL){
				
				$i = 0;
				$resEjes = $ejesL;
				$ejesL = array();
				foreach($resEjes as $res){
					
					$ejesL[] = $res;
					
					$i++;
					if($i == $info['noEjesL'])
						break;
					
				}//foreach
				
			}//elseif
			 
			$ejes['L'] = $ejesL;
			
			//Eje N
			
			$projEje->setProjectId($projectId);
			$ejesN = $projEje->EnumerateN();
			
			$totEjesN = count($ejesN);
			
			if($info['noEjesN'] > $totEjesN){
				
				$ejesExt = $info['noEjesN'] - $totEjesN;
				
				$card = array();
				for($k=1; $k<=$ejesExt; $k++){
					$card['numero'] = '';
					$card['projEjeNId'] = '';
					$ejesN[] = $card;
				}//for
				
			}elseif($info['noEjesN'] < $totEjesN){
				
				$i = 0;
				$resEjes = $ejesN;
				$ejesN = array();
				foreach($resEjes as $res){
					
					$ejesN[] = $res;
					
					$i++;
					if($i == $info['noEjesN'])
						break;
					
				}//foreach
				
			}//elseif
			
			$ejes['N'] = $ejesN;
			
		}else{
			$ejes = $_SESSION['ejes'];
		}		

		$smarty->assign('ejes',$ejes);
	
	}elseif($step == 6){
		
		$info = $_SESSION['proyecto'];
		$torres = $_SESSION['torres'];
		$niveles = $_SESSION['niveles'];
				
		//$existTipos = 0;
		if(isset($_SESSION['tipos'])){
			$tipos = $_SESSION['tipos'];
			//$existTipos = 1;			
		}
		
		//$existSubTipos = 0;
		if(isset($_SESSION['subTipos'])){
			$subTipos = $_SESSION['subTipos'];
			//$existSubTipos = 1;			
		}
		
		if(isset($_SESSION['projDeptoIds']))
			$projDeptoIds = $_SESSION['projDeptoIds'];
		
		/*
		$existDepas = 0;
		if(isset($_SESSION['depas'])){
			$depas = $_SESSION['depas'];
			$existDepas = 1;			
		}
		*/
		
		$types = $_SESSION['tiposArea'];

		if(!isset($_SESSION['depas'])){
						
			$deptos = array();
			foreach($torres as $t => $res){
				
				$nivL = count($niveles[$t]);
				foreach($niveles[$t] as $n => $val){
										
					$projLevelId = $val['projLevelId'];				
					
					$projDepto->setProjLevelId($projLevelId);
					$resDeptos2 = $projDepto->EnumerateAll();				
										
					$d = 1;
					$resDeptos = array();
					foreach($resDeptos2 as $dep){
											
						foreach($types as $kt => $val2){
							
							$dep['typeId'] = '';
							if($val2['typeId'] == $dep['projTypeId']){
								$dep['typeId'] = $kt;
								
								foreach($val2['subTypes'] as $kt2 => $val3){
									
									$dep['subTypeId'] = '';
									if($val3['projSubTypeId'] == $dep['projSubTypeId']){
										$dep['subTypeId'] = $kt2;
										break;
									}
									
								}
								
								break;
							}
							
						}//foreach
						
						//Si hay menos deptos. de la cantidad original no agregar los restantes
						
						if($d <= $val['deptos'])
							$resDeptos[] = $dep;
						
						$d++;
						
					}//foreach
															
					//Si es nivel Nuevo -> Generar los Deptos.
					
					if(!$projLevelId){
						
						//Torres Existentes
						if($res['projItemId']){
					
							$card = array();
							for($k=1; $k<=$val['deptos']; $k++){
								$card['projTypeId'] = '';
								$card['typeId'] = '';
								$card['name'] = '';
								$resDeptos[] = $card;
							}
							
						}else{
							
							$resDeptos = array();
							$card = array();
							for($k=1; $k<=$val['deptos']; $k++){
								$card['projTypeId'] = '';
								$card['typeId'] = '';
								$card['name'] = $k + ($nivL * 100);
								$resDeptos[] = $card;
							}
							
						}//else
						
					}else{
						
						//Generar los Deptos. Nuevos si aplican en cada Nivel
					
						$totDeps = count($resDeptos);				
						if($val['deptos'] > $totDeps){
							$extDeptos = $val['deptos'] - $totDeps;
							for($k=1; $k<=$extDeptos; $k++){
								$card['projTypeId'] = '';
								$card['typeId'] = '';
								$card['name'] = '';
								$resDeptos[] = $card;
							}
						}
						
					}
										
					$deptos[$t][$n] = $resDeptos;
					
					$nivL--;
					
				}//foreach
				
			}//foreach
			
			//Obtenemos el No. Maximo de Deptos.
			
			$maxDeptos = 0;
			foreach($torres as $t => $res){
				foreach($niveles[$t] as $n => $val){
					if($maxDeptos < $val['deptos'])
						$maxDeptos = $val['deptos'];
				}
			}
						
			//Obtenemos los Deptos. Vacios para rellenar las filas de cada Nivel.
			
			$deptosVacios = array();
			foreach($torres as $t => $res){
				foreach($niveles[$t] as $n => $val){
					$deptosVacios[$t][$n] = $maxDeptos - count($deptos[$t][$n]);
				}
			}
			
			$_SESSION['deptosVacios'] = $deptosVacios;
			$_SESSION['maxDeptos'] = $maxDeptos;
						
		}else{
			
			$resDeptos = $_SESSION['depas'];
			
			$deptos = array();
			foreach($torres as $t => $res){				
			
				foreach($niveles[$t] as $n => $val){					
				
					foreach($resDeptos[$t][$n] as $d => $v){
						
						$card['name'] = $v;
						if($tipos[$t][$n][$d] >= 0)
							$card['typeId'] = $tipos[$t][$n][$d];
						else
							$card['typeId'] = '';
						
						if($subTipos[$t][$n][$d] >= 0)
							$card['subTypeId'] = $subTipos[$t][$n][$d];
						else
							$card['subTypeId'] = '';	
							
						$card['projDeptoId'] = $projDeptoIds[$t][$n][$d];
						
						$deptos[$t][$n][$d] = $card;
					}					
					
				}				
				
			}//foreach	
			
			$deptosVacios = $_SESSION['deptosVacios'];
			$maxDeptos = $_SESSION['maxDeptos'];		
			
		}//else
		
		$smarty->assign('types', $types);
		$smarty->assign('torres', $torres);
		$smarty->assign('niveles', $niveles);
		$smarty->assign('deptos', $deptos);
		$smarty->assign('maxDeptos', $maxDeptos);
		$smarty->assign('deptosVacios', $deptosVacios);
		
		//$smarty->assign('tipos', $tipos);		
		//$smarty->assign('existTipos', $existTipos);
		//$smarty->assign('existDepas', $existDepas);
		
	}elseif($step == 7){
		
		$info = $_SESSION['proyecto'];
		
		if(!isset($_SESSION['cajones'])){
		
			$projCajon->setProjectId($projectId);
			$cajones = $projCajon->EnumerateAll();
			$totCajones = count($cajones);

			if($info['cajonesEst'] > $totCajones){
				
				$cajonesExt = $info['cajonesEst'] - $totCajones;
				
				for($k=1; $k<=$cajonesExt; $k++){
					$card['name'] = '';
					$card['projCajonId'] = '';
					$cajones[] = $card;
				}//for
				
			}elseif($info['cajonesEst'] < $totCajones){
								
				$i = 0;
				$resCajones = $cajones;
				$cajones = array();
				foreach($resCajones as $res){
					
					$cajones[] = $res;
					
					$i++;
					if($i == $info['cajonesEst'])
						break;
						
				}//foreach
				
			}
						
			if(count($cajones))
				$cajones = $util->orderMultiDimensionalArray($cajones, 'name');
						
			$_SESSION['cajones'] = $cajones;
			
		}else{
			$cajones = $_SESSION['cajones'];
		}
		
		
		if(!isset($_SESSION['bodegas'])){
		
			$projBodega->setProjectId($projectId);
			$bodegas = $projBodega->EnumerateAll();			
			$totBodegas = count($bodegas);

			if($info['bodegas'] > $totBodegas){
				
				$bodegasExt = $info['bodegas'] - $totBodegas;
				
				for($k=1; $k<=$bodegasExt; $k++){
					$card['name'] = '';
					$card['projBodegaId'] = '';
					$bodegas[] = $card;
				}
				
			}elseif($info['bodegas'] < $totBodegas){
								
				$i = 0;
				$resBodegas = $bodegas;
				$bodegas = array();
				foreach($resBodegas as $res){
					
					$bodegas[] = $res;
					
					$i++;
					if($i == $info['bodegas'])
						break;
						
				}//foreach
				
			}
			
			$_SESSION['bodegas'] = $bodegas;
			
		}else{
			$bodegas = $_SESSION['bodegas'];
		}
				
		$smarty->assign('cajones', $cajones);
		$smarty->assign('bodegas', $bodegas);
		
	}elseif($step == 8){
		
		if(!isset($_SESSION['mtoMant'])){		
			$projMant->setProjectId($projectId);
			$mtoMant = $projMant->Enumerate();
			
			$_SESSION['mtoMant'] = $mtoMant;
		}else{
			$mtoMant = $_SESSION['mtoMant'];
		}
		
		if(!isset($_SESSION['mtoEquip'])){
			$projEquip->setProjectId($projectId);
			$mtoEquip = $projEquip->Enumerate();
			
			$_SESSION['mtoEquip'] = $mtoEquip;
		}else{
			$mtoEquip = $_SESSION['mtoEquip'];
		}
								
		$smarty->assign('mtoMant', $mtoMant);
		$smarty->assign('mtoEquip', $mtoEquip);
		
	}
	
	$project->setProjectId($projectId);	
	$info['nomProj'] = $project->GetNameById();
	
	$smarty->assign('info', $info);
	$smarty->assign('step', $step);
	$smarty->assign('mainMnu','proyectos');
			
?>