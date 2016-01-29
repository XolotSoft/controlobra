<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$supProjId = intval($_REQUEST['supProjId']);
	$p = $_SESSION['supP'];
	
	if($_POST['action'] == 'savePdf'){
		
		if($_FILES['pdf']['name']){
			
			$val = $supplier->SavePdf2();
		
			if($val == 1)
				$cmpMsg = 'El archivo fue agregado correctamente.';
			elseif($val == 2)
				$errMsg = 'Error al subir el archivo, debe ser tipo .pdf';
			elseif($val == 3)
				$errMsg = 'Ocurri&oacute; un error al guardar el archivo.';
			elseif($val == 4)
				$errMsg = 'No se ha seleccionado ning&uacute;n archivo.';
				
		}else{
			$errMsg = 'No se ha seleccionado ning&uacute;n archivo.';
		}
	}elseif($_POST['action'] == 'deletePdf'){
		
		$supplier->setSupProjId($supProjId);
		$val = $supplier->DeletePdf2();
		
		if($val == 1)
			$cmpMsg = 'El archivo fue eliminado correctamente.';
		else			
			$errMsg = 'Ocurri&oacute; un error al eliminar el archivo.';
					
	}
	
	$supplier->setSupProjId($supProjId);
	$info = $supplier->InfoProject();
	
	$supplier->setSupplierId($info['supplierId']);
	$info['supplier'] = $supplier->GetNameById();
	
	$project->setProjectId($info['projectId']);
	$info['project'] = $project->GetNameById();
		
	$smarty->assign('p', $p);
	$smarty->assign('cmpMsg', $cmpMsg);
	$smarty->assign('errMsg', $errMsg);
	$smarty->assign('info', $info);
	$smarty->assign('mainMnu','catalogos');
			
?>