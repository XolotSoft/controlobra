<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['supP'];

if(isset($_POST['action']))
	$_POST['type'] = $_POST['action'];

switch($_POST['type'])
{
	case 'addSupplier':
	
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states); 
		
		$projects = $project->EnumerateAll();
		$projects = $util->EncodeResult($projects);
		
		$smarty->assign('projects', $projects);
		$smarty->assign('states', $states);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-supplier-popup.tpl');
				
		break;	

	case 'editSupplier':
		
		$supplierId = $_POST['id'];
		
		$supplier->setSupplierId($supplierId);
		$info = $supplier->Info();		
		$info = $util->EncodeRow($info);
		
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states);
		
		if($info['stateId']){
			$city->setStateId($info['stateId']);
			$cities = $city->EnumerateAll();
			$cities = $util->EncodeResult($cities);
		}
		
		//Cargamos los precios
					
		$supplierContact->setSupplierId($supplierId);
		$resContacts = $supplierContact->EnumerateAll();
		
		$contacts = array();
		foreach($resContacts as $res){
			$card['supContId'] = $res['supContId'];
			$card['name'] = utf8_encode($res['name']);
			$card['puesto'] = utf8_encode($res['puesto']);
			$card['phone'] = $res['phone'];
			$card['email'] = $res['email'];
			
			$contacts[] = $card;
		}
		
		$_SESSION['supplierContacts'] = $contacts;
				
		//Cargamos los Proyectos
		
		$resProj = $project->EnumerateAll();
		
		$projects = array();
		$supplier->setSupplierId($supplierId);
		foreach($resProj as $res){
			$card = $res;
			$card['name'] = utf8_encode($res['name']);
						
			$supplier->setProjectId($res['projectId']);
			$supProjId = $supplier->ExistProject();			
						
			if($supProjId){
				$supplier->setSupProjId($supProjId);
				$infP = $supplier->InfoProject();
				
				$card['supProjId'] = $infP['supProjId'];
				$card['retencion'] = $infP['retencion'];
				$card['checked'] = 1;
			}else{
				$card['checked'] = 0;
			}
			
			$projects[] = $card;
		}
		
		$smarty->assign('info', $info);
		$smarty->assign('projects', $projects);
		$smarty->assign('contacts', $contacts);		
		$smarty->assign('states', $states);
		$smarty->assign('cities', $cities);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-supplier-popup.tpl');
		
		break;
		
	case 'saveAddSupplier':				
		
		$projIds = $_POST['projIds'];
		$retencion = $_POST['retencion'];
		$tipo = $_POST['tipo'];
		$retencion = $_POST['retencion'];
		
		if(count($projIds) == 0)
			$projIds = array();
		
		$supplier->setName($_POST['name']);
		$supplier->setRazonSocial($_POST['razonSocial']);
		$supplier->setRfc($_POST['rfc']);
		$supplier->setAddress($_POST['address']);
		$supplier->setColonia($_POST['colonia']);
		$supplier->setCityId($_POST['cityId']);
		$supplier->setStateId($_POST['stateId']);	
		$supplier->setPostalCode($_POST['postalCode']);		
		$supplier->setTipo($tipo);
		
		$supplierId = $supplier->Save();				
											
		if(!$supplierId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			
			if($tipo == 'contratista'){
				
				$supplier->setSupplierId($supplierId);
								
				//Guardamos los proyectos				
				foreach($projIds as $k => $id){					
					$supplier->setProjectId($id);
					$supplier->setRetencion($retencion[$k]);
					
					$supplier->SaveProject();
				}
							
			}
			
			//Contactos
			
			$nombres = $_POST['nombres'];
			$puestos = $_POST['puestos'];
			$telefonos = $_POST['telefonos'];
			$emails = $_POST['emails'];
						
			if(!count($nombres))
				$nombres = array();
			
			$contacts = array();			
			foreach($nombres as $k => $val){		
				$card['name'] = $val;
				$card['puesto'] = $puestos[$k];
				$card['phone'] = $telefonos[$k];
				$card['email'] = $emails[$k];
				
				$supplierContact->setSupplierId($supplierId);
				$supplierContact->setName($card['name']);
				$supplierContact->setPuesto($card['puesto']);
				$supplierContact->setPhone($card['phone']);
				$supplierContact->setEmail($card['email']);
				
				if(trim($val) != '')
					$supplierContact->Save();
												
			}
			
			//Save History Data
			$user->setModule('Proveedores');
			$user->setAction('Agregar');
			$user->setItemId($supplierId);
			$user->SaveHistory();
					
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$suppliers = $supplier->Enumerate();			
			$result = $suppliers['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
					
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
					
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
					
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		}		
		
		break;
		
	case 'saveEditSupplier':	 	
		
		$supplierId = $_POST['id'];		
		$projIds = $_POST['projIds'];
		$retencion = $_POST['retencion'];
		$tipo = $_POST['tipo'];
		$retencion = $_POST['retencion'];
		$idSupProjs = $_POST['idSupProjs'];
				
		if(count($projIds) == 0)
			$projIds = array();
		
		$supplier->setSupplierId($supplierId);	
		$supplier->setName($_POST['name']);
		$supplier->setRazonSocial($_POST['razonSocial']);
		$supplier->setRfc($_POST['rfc']);
		$supplier->setAddress($_POST['address']);
		$supplier->setColonia($_POST['colonia']);
		$supplier->setCityId($_POST['cityId']);
		$supplier->setStateId($_POST['stateId']);
		$supplier->setPostalCode($_POST['postalCode']);		
		$supplier->setTipo($tipo);
		
		$infS = $supplier->Info();
		
		if($tipo == 'contratista'){
			
			//Obtenemos los proyectos
			
			$idsProj = array();
			$projects = array();			
			foreach($projIds as $k => $id){
				$card['projectId'] = $id;
				$card['retencion'] = $retencion[$k];
				$card['supProjId'] = $idSupProjs[$k];
				
				$idsProj[] = $idSupProjs[$k];
				
				$projects[] = $card;
			}
			
		}//if
		
		//Contactos
		
		$nombres = $_POST['nombres'];
		$puestos = $_POST['puestos'];
		$telefonos = $_POST['telefonos'];
		$emails = $_POST['emails'];
		$idSupConts = $_POST['idSupConts'];
		
		if(!count($nombres))
			$nombres = array();
		
		$ids = array();
		$contacts = array();			
		foreach($nombres as $k => $val){		
			$card['name'] = $val;
			$card['puesto'] = $puestos[$k];
			$card['phone'] = $telefonos[$k];
			$card['email'] = $emails[$k];
			$card['supContId'] = $idSupConts[$k];
			
			$ids[] = $idSupConts[$k];
						
			$contacts[] = $card;											
		}							
		
		if(!$supplier->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			
			if($tipo == 'contratista'){
				
				$supplier->setSupplierId($supplierId);			
				$resProjects = $supplier->EnumProjects();
								
				//Eliminamos de la BD los registros que fueron eliminados fisicamente
				foreach($resProjects as $val){
					$supProjId = $val['supProjId'];
					
					if(!in_array($supProjId,$idsProj)){
						$supplier->setSupProjId($supProjId);
						$supplier->DeletePdf2();						
						$supplier->DeleteProject();
					}
				}
														
				//Guardamos los proyectos
				foreach($projects as $res){
					$supplier->setSupProjId($res['supProjId']);
					$supplier->setProjectId($res['projectId']);
					$supplier->setRetencion($res['retencion']);
					
					if($res['supProjId'])
						$supplier->UpdateProject();
					else					
						$supplier->SaveProject();
				}
								
			}
			
			//Guardamos los Precios
				
			$supplierContact->setSupplierId($supplierId);
			$resContacts = $supplierContact->EnumerateAll();
			
			//Eliminamos de la BD los precios que fueron eliminados fisicamente
			foreach($resContacts as $val){
				$supContId = $val['supContId'];
				
				if(!in_array($supContId,$ids)){
					$supplierContact->setSupContId($supContId);
					$supplierContact->Delete();
				}
			}
			
			//Guardamos / Actualizamos los precios
			
			foreach($contacts as $res){		
				
				$supplierContact->setSupContId($res['supContId']);
				$supplierContact->setSupplierId($supplierId);
				$supplierContact->setName($res['name']);
				$supplierContact->setPuesto($res['puesto']);
				$supplierContact->setPhone($res['phone']);
				$supplierContact->setEmail($res['email']);
				
				if($res['supContId'])
					$supplierContact->Update();
				else
					$supplierContact->Save();
			}
			
			//**************
								
			if($infS['tipo'] == 'contratista' && $tipo == 'proveedor'){
				$supplier->setSupplierId($supplierId);
				$resProjects = $supplier->EnumProjects();
				
				if($resProjects){
					foreach($resProjects as $res){
						$ruta = DOC_ROOT.'/archivos/pdf2';
						@unlink($ruta.'/'.$res['pdf']);
					}
				}
				
				//Eliminamos todos los proyectos
				$supplier->DeleteProjects();
				
			}elseif($infS['tipo'] == 'proveedor' && $tipo == 'contratista'){
				$supplier->setSupplierId($supplierId);
				$resProjects = $supplier->EnumProjects();
				
				if($resProjects){
					foreach($resProjects as $res){
						$ruta = DOC_ROOT.'/archivos/pdf';
						@unlink($ruta.'/'.$res['pdf']);
					}
				}
				
				//Eliminamos todos los proyectos
				$supplier->DeleteProjects();
			}
								
			//Save History Data
			$user->setModule('Proveedores');
			$user->setAction('Editar');
			$user->setItemId($supplierId);
			$user->SaveHistory();
			
			$util->setError(10070, 'complete');
			$util->PrintErrors();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$supplier->SetPage($p);
			$suppliers = $supplier->Enumerate();
			$result = $suppliers['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
					
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
					
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		}
			
		break;
	
	case 'deleteSupplier':
		
		$supplierId = $_POST['id'];
		
		$supplier->setSupplierId($supplierId);	
		$info = $supplier->Info();
		
		$projects = $supplier->EnumProjects();
						
		if(!$supplier->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Borramos el archivo Pdf			
			$ruta = DOC_ROOT.'/archivos/pdf';			
			$ruta2 = DOC_ROOT.'/archivos/pdf2';
			foreach($projects as $res){				
				@unlink($ruta.'/'.$res['pdf']);
				@unlink($ruta2.'/'.$res['pdf']);
			}
			
			//Save History Data
			$user->setModule('Proveedores');
			$user->setAction('Eliminar');
			$user->setItemId($supplierId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$supplier->SetPage($p);
			$suppliers = $supplier->Enumerate();
			$result = $suppliers['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
					
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
					
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		}
			
		break;
	
	case 'searchSupplier':
		
			$supplier->setTipo($_POST['tipo2']);
			$supplier->setName($_POST['name2']);
				
			echo 'ok[#]';
			
			$result = $supplier->Search();
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
					
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
					
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		
			
		break;
	
	case 'deletePdf':
		
		$supplier->setSupProjId($_POST['id']);	
		$info = $supplier->InfoProject();
		
		if(!$supplier->DeletePdf())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			
			//Save History Data
			$user->setModule('Proveedores');
			$user->setAction('EliminarPdf');
			$user->setItemId($info['supplierId']);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$supplier->SetPage($p);
			$suppliers = $supplier->Enumerate();
			$result = $suppliers['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
					
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
					
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		}
			
		break;
	
	case 'deletePdf2':
		
		$supplier->setSupProjId($_POST['id']);	
				
		if(!$supplier->DeletePdf2())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$supplier->SetPage($p);
			$suppliers = $supplier->Enumerate();
			$result = $suppliers['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $res;
				$card['name'] = utf8_encode($res['name']);
				
				$supplier->setSupplierId($res['supplierId']);
				$projects = $supplier->EnumProjects();
				$card['projects'] = $util->EncodeResult($projects);
				
				$resProjProv = $project->EnumerateAll();		
				$projProv = array();
				foreach($resProjProv as $val){
					$val['name'] = utf8_encode($val['name']);
									
					$supplier->setSupplierId($res['supplierId']);
					$supplier->setProjectId($val['projectId']);
					$inf = $supplier->GetSupProjInfo();
					
					$val['pdf'] = $inf['pdf'];
					$val['supProjId'] = $inf['supProjId'];
										
					$projProv[] = $val;
				}		
				$card['projProv'] = $projProv;
				
				$items[] = $card;
			}			
			$suppliers['items'] = $items;
			
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier.tpl');
		}
			
		break;
	
	case 'addPdf':
			
			$_SESSION['projId'] = $_POST['projectId'];
						
		break;
	
	/*** CONTACTS ***/
	
	case 'addContact':
			
			$contacts = $_SESSION['supplierContacts'];
			
			$card['supContId'] = '';
			$card['name'] = '';
			$card['puesto'] = '';
			$card['phone'] = '';
			$card['email'] = '';
			
			$contacts[] = $card;
			
			$_SESSION['supplierContacts'] = $contacts;
			
			echo 'ok[#]';
			
			$smarty->assign('contacts', $contacts);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier-contacts.tpl');
			
		break;
	
	case 'delContact':
			
			$k = $_POST['k'];
			
			$contacts = $_SESSION['supplierContacts'];
			
			unset($contacts[$k]);
			
			$_SESSION['supplierContacts'] = $contacts;
						
			echo 'ok[#]';
			
			$smarty->assign('contacts', $contacts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/supplier-contacts.tpl');
				
		break;
	
	case 'saveContacts':
			
			$nombres = $_POST['nombres'];
			$puestos = $_POST['puestos'];
			$telefonos = $_POST['telefonos'];
			$emails = $_POST['emails'];
			$idSupConts = $_POST['idSupConts'];
						
			if(!count($nombres))
				$nombres = array();
			
			$contacts = array();			
			foreach($nombres as $k => $val){
				$card['name'] = $val;
				$card['puesto'] = $puestos[$k];
				$card['phone'] = $telefonos[$k];
				$card['email'] = $emails[$k];
				$card['supContId'] = $idSupConts[$k];
				
				$contacts[$k] = $card;
			}
			
			$_SESSION['supplierContacts'] = $contacts;
			
		break;
	
}

?>
