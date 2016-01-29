<?php
	
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	if($_POST['action'] == 'update_img'){
	
		$projectId = $_POST['projectId'];
		$_SESSION['p'] = $_POST['p'];
				
		if($_POST['delete']){
			$project->setProjectId($projectId);
			$mensaje = $project->DeleteImage();
		}else		
			$mensaje = $project->SaveImage();
	
	}else{
		$projectId = $_REQUEST['projId'];
	}
		
	$project->setProjectId($projectId);
	$info = $project->Info();
	$info['name'] = strtoupper($info['name']);	
	
	//Link de Regreso por Pagina
	$p = $_SESSION['projP'];
				
	$smarty->assign('info',$info);
	$smarty->assign('mensaje',$mensaje);			
	$smarty->assign('p',$p);
	$smarty->assign('mainMnu','proyectos');
						
?>