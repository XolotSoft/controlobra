<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{				
	case 'updatePrice':	 	
				
		$price = $_POST['price'];
		
		$price = str_replace(',','',$price);
		
		$project->setPrice($price);
		$project->setProjectId($projectId);
					
		if(!$project->UpdatePrice())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			echo number_format($price,2);
			echo '[#]';
			
		}
			
		break;		
}

?>
