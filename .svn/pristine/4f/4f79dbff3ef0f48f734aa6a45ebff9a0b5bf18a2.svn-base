<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$supplierId = intval($_REQUEST['supplierId']);
	$p = $_SESSION['supP'];
	
	$projectId = $_SESSION['projId'];
	
	if($_POST['action'] == 'savePdf'){
		
		if($_FILES['pdf']['name']){
			
			$val = $supplier->SavePdf();
		
			if($val == 1){
				$cmpMsg = 'El archivo fue agregado correctamente.';
				
				//Save History Data
				$user->setModule('Proveedores');
				$user->setAction('AgregarPdf');
				$user->setItemId($supplierId);
				$user->SaveHistory();
				
			}elseif($val == 2)
				$errMsg = 'Error al subir el archivo, debe ser tipo .pdf';
			elseif($val == 3)
				$errMsg = 'Ocurri&oacute; un error al guardar el archivo.';
			elseif($val == 4)
				$errMsg = 'No se ha seleccionado ning&uacute;n archivo.';
				
		}else{
			$errMsg = 'No se ha seleccionado ning&uacute;n archivo.';
		}
	}elseif($_POST['action'] == 'deletePdf'){
		
		$supplier->setSupProjId($_POST['supProjId']);
		$info = $supplier->InfoProject();
		
		$val = $supplier->DeletePdf();
		
		if($val == 1){
			$cmpMsg = 'El archivo fue eliminado correctamente.';
			
			//Save History Data
			$user->setModule('Proveedores');
			$user->setAction('EliminarPdf');
			$user->setItemId($info['supplierId']);
			$user->SaveHistory();
			
		}else			
			$errMsg = 'Ocurri&oacute; un error al eliminar el archivo.';
					
	}
	
	$supplier->setSupplierId($supplierId);
	$supplier->setProjectId($projectId);
	$supProjId = $supplier->GetSupProjId();
	
	if($supProjId){
		$supplier->setSupProjId($supProjId);
		$info = $supplier->InfoProject();
	}
		
	$supplier->setSupplierId($supplierId);
	$infS = $supplier->Info();
	
	$info['name'] = $infS['name'];
	$info['supplierId'] = $infS['supplierId'];
	
	$project->setProjectId($projectId);
	$info['project'] = $project->GetNameById();
	
	$info['projectId'] = $projectId;
		
	$smarty->assign('p', $p);
	$smarty->assign('cmpMsg', $cmpMsg);
	$smarty->assign('errMsg', $errMsg);
	$smarty->assign('info', $info);
	$smarty->assign('mainMnu','catalogos');
			
?>