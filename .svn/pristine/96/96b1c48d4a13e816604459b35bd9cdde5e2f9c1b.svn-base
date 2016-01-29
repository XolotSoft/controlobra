<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$customerId = intval($_REQUEST['customerId']);
	
	if($_POST['action'] == 'saveDoc'){
		
		if(trim($_POST['name']) == ''){
		
			$errMsg = 'Por favor, escriba el nombre del documento.';
			
		}elseif($_FILES["doc"]['name']){
			
			$val = $customer->SaveDoc();
		
			if($val == 1){
				$cmpMsg = 'El documento fue agregado correctamente.';
				
				//Save History Data
				$user->setModule('Clientes');
				$user->setAction('AgregarDoc');
				$user->setItemId($customerId);
				$user->SaveHistory();
				
			}elseif($val == 2)
				$errMsg = 'Error al subir el documento, debe ser tipo .pdf';
			elseif($val == 3)
				$errMsg = 'Ocurri&oacute; un error al guardar el documento.';
			elseif($val == 4)
				$errMsg = 'No se ha seleccionado ning&uacute;n documento.';
			elseif($val == 5)
				$errMsg = 'Por favor, escriba el nombre del documento.';
				
		}else{
			$errMsg = 'No se ha seleccionado ning&uacute;n documento.';
		}
		
	}elseif($_POST['action'] == 'deleteDoc'){
		
		$val = $customer->DeleteImg($customerId);
		
		if($val == 1)
			$cmpMsg = 'La imagen fue eliminada correctamente.';
		else			
			$errMsg = 'Ocurri&oacute; un error al eliminar la imagen.';
					
	}
	
	$customer->setCustomerId($customerId);
	$info = $customer->Info();	
	$docs = $customer->GetDocs();
	
	$smarty->assign('info', $info);
	$smarty->assign('docs', $docs);
	$smarty->assign('cmpMsg', $cmpMsg);
	$smarty->assign('errMsg', $errMsg);	
	$smarty->assign('mainMnu','catalogos');
			
?>