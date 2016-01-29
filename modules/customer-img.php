<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$customerId = intval($_REQUEST['customerId']);
	$p = $_SESSION['custP'];
	
	if($_POST['action'] == 'saveImg'){
		
		if($_FILES["img"]['name']){
			
			$val = $customer->SaveImg();
		
			if($val == 1){
				$cmpMsg = 'La imagen fue agregada correctamente.';
				
				//Save History Data			
				$user->setModule('Clientes');
				$user->setAction('AgregarImg');
				$user->setItemId($customerId);
				$user->SaveHistory();
				
			}elseif($val == 2)
				$errMsg = 'Error al subir la imagen, debe ser tipo .jpg, .gif o .png';
			elseif($val == 3)
				$errMsg = 'Ocurri&oacute; un error al guardar la imagen.';
			elseif($val == 4)
				$errMsg = 'No se ha seleccionado ninguna imagen.';
				
		}else{
			$errMsg = 'No se ha seleccionado ninguna imagen.';
		}
	}elseif($_POST['action'] == 'deleteImg'){
		
		$val = $customer->DeleteImg($customerId);
		
		if($val == 1){
			$cmpMsg = 'La imagen fue eliminada correctamente.';
			
			//Save History Data			
			$user->setModule('Clientes');
			$user->setAction('EliminarImg');
			$user->setItemId($customerId);
			$user->SaveHistory();
		}else			
			$errMsg = 'Ocurri&oacute; un error al eliminar la imagen.';
					
	}
	
	$customer->setCustomerId($customerId);
	$info = $customer->Info();
	
	$smarty->assign('p', $p);
	$smarty->assign('cmpMsg', $cmpMsg);
	$smarty->assign('errMsg', $errMsg);
	$smarty->assign('info', $info);
	$smarty->assign('mainMnu','catalogos');
			
?>