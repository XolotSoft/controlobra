<?php
		
	include_once('../config.php');
	include_once(DOC_ROOT.'/classes/db.class.php');
	include_once(DOC_ROOT.'/classes/error.class.php');
	include_once(DOC_ROOT.'/classes/util.class.php');	
	include_once(DOC_ROOT.'/classes/main.class.php');
	include_once(DOC_ROOT.'/classes/phplot.class.php');
	include_once(DOC_ROOT.'/classes/projectEje.class.php');
	
	$phplot = new PHPlot;
	$projEje = new ProjectEje;
	
	$projectId = $_GET['projId'];
				
	$projEje->setProjectId($projectId);
	$ejes = $projEje->Enumerate();
		
	$data = array();
	foreach($ejes as $res)
		$data[] = array($res['letra'],$res['numero']);
		
	$phplot->SetDataValues($data);
	$phplot->SetTitle('GRAFICA');
	$phplot->DrawGraph();
	
			
?>