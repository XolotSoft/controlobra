<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['projP'] = $p;
	
	$okMsg = $_SESSION['msgOk'];
	$_SESSION['msgOk'] = 0;
	
	$project->SetPage($p);	
	$projects = $project->Enumerate();
	
	$items = array();
	foreach($projects['items'] as $res){
		$card = $res;
		
		$projType->setProjectId($res['projectId']);
		$resTypes = $projType->EnumerateAll();
		
		$types = array();
		foreach($resTypes as $t){
			
			$projType->setProjTypeId($t['projTypeId']);
			$subtypes = $projType->EnumSubTypesAll();

			$t['subtypes'] = $subtypes;
			
			$types[] = $t;
		}
		$card['types'] = $types;
		
		$projItem->setProjectId($res['projectId']);
		$resTorres = $projItem->EnumerateAll();
		
		$torres = array();
		foreach($resTorres as $val){
			$inf = $val;
			
			$projLevel->setProjItemId($val['projItemId']);
			$resLevels = $projLevel->EnumerateAll();
			
			$levels = array();
			foreach($resLevels as $lev){
				$infL = $lev;
				
				$projDepto->setProjLevelId($lev['projLevelId']);
				$resDeptos = $projDepto->EnumerateAll();
				
				$deptos = array();
				foreach($resDeptos as $dep){					
					$infD = $dep;
					
					$projType->setProjTypeId($dep['projTypeId']);
					$infD['type'] = $projType->GetNameById();
					
					$deptos[] = $infD;
				}				
				$infL['deptos'] = $deptos;
				
				$levels[] = $infL;
			}
			$inf['levels'] = $levels;
			
			$torres[] = $inf;
		}
		
		$card['items'] = $torres;
		
		$items[] = $card;
	}
	$projects['items'] = $items;
	
	//Limpiamos las variables de session
	
	$_SESSION['proyecto'] = array();
	$_SESSION['torres'] = array();
	$_SESSION['niveles'] = array();
	$_SESSION['tiposArea'] = array();
	$_SESSION['ejes'] = array();
	$_SESSION['ejesL'] = array();
	$_SESSION['ejesN'] = array();
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
	unset($_SESSION['ejesL']);
	unset($_SESSION['ejesN']);
	unset($_SESSION['bodegas']);
	unset($_SESSION['cajones']);
	unset($_SESSION['mtoMant']);
	unset($_SESSION['mtoEquip']);
	unset($_SESSION['tipos']);
	unset($_SESSION['depas']);
	
	$smarty->assign('msgOk', $okMsg);
	$smarty->assign('projects', $projects);
	$smarty->assign('mainMnu','proyectos');
			
?>