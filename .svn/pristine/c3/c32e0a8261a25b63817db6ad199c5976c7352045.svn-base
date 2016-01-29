<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$step = intval($_GET['step']);
	if($step == 0)
		$step = 1;
	
	$p = $_SESSION['projP'];
	
	if($step == 1){
		
		$info = $_SESSION['proyecto'];
				
		$_SESSION['torres'] = '';
		unset($_SESSION['torres']);
		
		$smarty->assign('info', $info);
				
	}elseif($step == 2){
		
		$info = $_SESSION['proyecto'];		
		$isBack = 0;
		
		if(isset($_SESSION['torres'])){
			$torres = $_SESSION['torres'];
			$isBack = 1;
			$smarty->assign('torres', $torres);
		}
		
		$abc = $util->LoadAbc();		
		
		$smarty->assign('isBack', $isBack);
		$smarty->assign('info', $info);
		$smarty->assign('abc', $abc);
				
	}elseif($step == 3){
		
		$info = $_SESSION['proyecto'];
		$torres = $_SESSION['torres'];
				
		$isBack = 0;
		$isSet = 0;
		
		if(isset($_SESSION['niveles'])){
			$niveles = $_SESSION['niveles'];
			$isBack = 1;
			$isSet = 1;
			$smarty->assign('niveles', $niveles);
		}
				
		$smarty->assign('isBack', $isBack);
		$smarty->assign('isSet', $isSet);
		//$smarty->assign('maxDeptos', $maxDeptos);
		$smarty->assign('torres', $torres);
		
	}elseif($step == 4){
		
		$info = $_SESSION['proyecto'];
		
		//unset($_SESSION['tiposArea']);		
		//print_r($_SESSION['tiposArea']);
		
		if(!isset($_SESSION['tiposArea'])){
			
			$card['name'] = '';
			$card['redondeo'] = number_format($info['redondeo'],2);
			$card['comunArea'] = '0.00';
			$card['realArea'] = '0.00';
			$card['ventaArea'] = number_format($info['redondeo'],2);
			$card['terrazaReal'] = '0.00';
			$card['terrazaComun'] = number_format($info['redondeo'],2);
			$card['jardinReal'] = '0.00';
			$card['jardinComun'] = number_format($info['redondeo'],2);
			
			$areaTypes[] = $card;
			$_SESSION['tiposArea'] = $areaTypes;
		}
		
		$areaTypes = $_SESSION['tiposArea'];

		$smarty->assign('areaTypes',$areaTypes);
	
	}elseif($step == 5){
		
		if(!isset($_SESSION['ejes'])){
		
			$info = $_SESSION['proyecto'];
			
			$noEjesL = $info['noEjesL'];
			
			$l = 65;
			$l2 = 65;
			$ejes = array();
			for($i=0; $i<$noEjesL; $i++){
							
				if($l == 91){
					$l = 65;
					$letter2 = chr($l2);
					$l2++;
				}
				
											
				$letter = $letter2.chr($l++);
							
				$ejes['L'][] = $letter;
			}
			
			$noEjesN = $info['noEjesN'];
			
			for($i=1; $i<=$noEjesN; $i++){
				$ejes['N'][] = $i;
			}
			
			$_SESSION['ejes'] = $ejes;
		}else{
			$ejes = $_SESSION['ejes'];
		}
		
		$smarty->assign('ejes',$ejes);
	
	}elseif($step == 6){
				
		$info = $_SESSION['proyecto'];
		$torres = $_SESSION['torres'];
		$niveles = $_SESSION['niveles'];
		
		$existTipos = 0;
		if(isset($_SESSION['tipos'])){
			$tipos = $_SESSION['tipos'];
			$existTipos = 1;			
		}
		
		$existSubTipos = 0;
		if(isset($_SESSION['subTipos'])){
			$subTipos = $_SESSION['subTipos'];
			$existSubTipos = 1;			
		}

		$existDepas = 0;
		if(isset($_SESSION['depas'])){
			$depas = $_SESSION['depas'];
			$existDepas = 1;			
		}

		$deptos = array();
		foreach($torres as $t => $res){
			$depTemp = array();
			foreach($niveles[$t] as $val){
				$deptos[] = $val['deptos'];
				$depTemp[] = $val['deptos'];
			}
			$maxDeptos[$t] = max($depTemp);
		}
		$maxDeptos['total'] = max($deptos);
		
		$types = $_SESSION['tiposArea'];

		$smarty->assign('maxDeptos', $maxDeptos);
		$smarty->assign('types', $types);
		$smarty->assign('torres', $torres);
		$smarty->assign('niveles', $niveles);
		$smarty->assign('tipos', $tipos);
		$smarty->assign('subTipos', $subTipos);
		$smarty->assign('depas', $depas);
		$smarty->assign('existTipos', $existTipos);
		$smarty->assign('existSubTipos', $existSubTipos);
		$smarty->assign('existDepas', $existDepas);
		
	}elseif($step == 7){
		
		$info = $_SESSION['proyecto'];
		
		if(isset($_SESSION['cajones'])){
			
			$cajones = $_SESSION['cajones'];
			
		}else{
		
			$cajones = array();
			for($k=0; $k<$info['cajonesEst']; $k++){
				$card['name'] = $k+1;
				$cajones[] = $card;
			}
			
		}//else
		
		if(isset($_SESSION['cajones'])){
			
			$bodegas = $_SESSION['bodegas'];
			
		}else{
			
			$bodegas = array();
			for($k=0; $k<$info['bodegas']; $k++){
				$card['name'] = $k+1;
				$bodegas[] = $card;
			}
			
		}//else
				
		$smarty->assign('cajones', $cajones);
		$smarty->assign('bodegas', $bodegas);
	
	}elseif($step == 8){
		
		if(isset($_SESSION['mtoMant']))
			$mtoMant = $_SESSION['mtoMant'];
				
		if(isset($_SESSION['mtoEquip']))		
			$mtoEquip = $_SESSION['mtoEquip'];
								
		$smarty->assign('mtoMant', $mtoMant);
		$smarty->assign('mtoEquip', $mtoEquip);	
		
	}//elseif
	
	$smarty->assign('step', $step);
	$smarty->assign('mainMnu','proyectos');
			
?>