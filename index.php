<?php

	include_once('init.php');
		
	if (!isset($_SESSION)) 
	{
	  session_start();
	}
	if($_GET['page'] == 'login2'){
		$_SESSION['curBD'] = 'Demo';
		header('Location: '.WEB_ROOT.'/login');
		exit;
	}
		
	include_once('config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	$User = $_SESSION['User'];
	$pages = array(	
		'registro',
		'login',
		'logout',
		'homepage',
		'city',
		'state',
		'personal',
		'customer',
		'customer-email',
		'customer-img',
		'customer-doc',
		'bank',
		'material',
		'product',
		'material',
		'material-resumen',
		'material-area',
		'material-print',
		'concept',
		'concept-resumen',
		'concept-resumen-2',
		'concept-print',
		'concept-area',
		'type',
		'project',
		'project-img',
		'project-new',
		'project-edit',
		'project-ejes',
		'project-montos',
		'project-cajybod',
		'unit',
		'category',
		'supplier',
		'supplier-pdf',
		'supplier-pdf2',
		'cuantificacion',
		'estimacion',
		'estimacion-payment',
		'estimacion-dopayment',
		'estimacion-retencion',
		'estimacion-cheques',
		'requisicion',
		'requisicion-pedidos',
		'requisicion-material',
		'order-buy',
		'order-buy-send',
		'order-buy-email',
		'order-buy-entregas',
		'account-payment',
		'account-dopayment',
		'account-cheques',
		'contract',
		'contract-payment',
		'backup',
		'resumen-contract',
		'resumen-edoctagral',
		'resumen-edoctagral-print',
		'resumen-ventas',
		'resumen-ventas-print',
		'resumen-edoctaclte',
		'resumen-gastos',
		'resumen-ventas-menu',
		'resumen-presupuestos-menu',
		'resumen-cheques',
		'resumen-gastos-menu',
		'resumen-accionistas',
		'resumen-edocta-accionistas',
		'resumen-accionistas-print',
		'user-history',
		'concept-resumen-gastos',
		'material-resumen-gastos',
		'concept-area-gastos',
		'material-area-gastos',
		'comparativo',
		'debug'
	);
			
	$page = $_GET['page'];
	
	if(!in_array($page, $pages))
	{
		$page = "homepage";
	}
		
	// include_once(DOC_ROOT.'/modules/'.$page.'.php');
	
	$smarty->assign('page', $page);
	$smarty->assign('section', $_GET['section']);
	$smarty->assign('User',$User);
	
	//Enumeramos los Proyectos
	// $listProys = $project->EnumerateAll();
	$smarty->assign('listProys',$listProys);
	
	//Obtenemos el proyecto actual seleccionado
	$curProjId = $_SESSION['curProjId'];
	
	if($curProjId){
		$project->setProjectId($curProjId);
		$nomProy = $project->GetNameById();
	}else{
		$nomProy = '';
	}
	
	$smarty->assign('curProjId',$curProjId);
	$smarty->assign('nomProy',$nomProy);
	
	$includedTpl =  $page;
	if($_GET['section'])
	{
		$includedTpl =  $_GET['page']."_".$_GET['section'];
	}
	$smarty->assign('includedTpl', $includedTpl);
	$smarty->assign('lang', $lang);
	
	if ($page == 'concept-print' || $page == 'material-print' || $page == 'resumen-edoctagral-print' || $page == 'resumen-ventas-print' || $page == 'resumen-accionistas-print') {
		$smarty->display(DOC_ROOT.'/templates/index-print.tpl');
	} elseif ($page == 'registro') {
		$smarty->display(DOC_ROOT.'/templates/registro.tpl');
	} else {
		$smarty->display(DOC_ROOT.'/templates/index.tpl');
	}
	
?>