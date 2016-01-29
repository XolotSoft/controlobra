<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['custP'];

switch($_POST['type'])
{
	case 'addCustomer': 
		
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states);
		
		$cYear = date('Y');
		
		$smarty->assign('cYear', $cYear);
		$smarty->assign('states', $states);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-customer-popup.tpl');
				
		break;	

	case 'editCustomer':
		
		$customer->setCustomerId($_POST['id']);
		$info = $customer->Info();		
		$info = $util->EncodeRow($info);
		
		if($info['birthdate']){		
			$info['day'] = date('d',strtotime($info['birthdate']));
			$info['month'] = date('m',strtotime($info['birthdate']));
			$info['year'] = date('Y',strtotime($info['birthdate']));
		}
		
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states);
		
		$city->setStateId($info['stateId']);
		$cities = $city->EnumerateAll();
		$cities = $util->EncodeResult($cities);
		
		$cYear = date('Y');
		
		$smarty->assign('cYear', $cYear);
		$smarty->assign('info', $info);
		$smarty->assign('states', $states);
		$smarty->assign('cities', $cities);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-customer-popup.tpl');
		
		break;
		
	case 'saveAddCustomer':				
		
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$religion = $_POST['religion'];
				
		$customer->setName($_POST['name']);
		$customer->setCategory($_POST['category']);
		$customer->setRfc($_POST['rfc']);
		$customer->setStreet($_POST['street']);
		$customer->setNoExt($_POST['noExt']);
		$customer->setNoInt($_POST['noInt']);
		$customer->setPostalCode($_POST['postalCode']);
		$customer->setColonia($_POST['colonia']);
		$customer->setCityId($_POST['cityId']);
		$customer->setStateId($_POST['stateId']);		
		$customer->setPhone($_POST['phone']);
		$customer->setEmail($_POST['e_mail']);
		$customer->setEdoCivil($_POST['edoCivil']);
		$customer->setRegimenMat($_POST['regimenMat']);		
		
		if($day != '' && $month != '' && $year != ''){
			$birthdate = $year.'-'.$month.'-'.$day;
			$customer->setBirthdate($birthdate);
		}elseif($day != '' || $month != '' || $year != ''){
			$customer->setBirthdate2();
		}
			
		$customer->setReligion($religion);
		
		if($religion == 'Otra')
			$customer->setOtraReligion($_POST['otraReligion']);
		
		$customer->setNotes($_POST['notes']);
		$customer->setCompany($_POST['company']);
		$customer->setPosition($_POST['position']);
				
		if($_POST['active'])
			$customer->setActive(1);
		else
			$customer->setActive(0);
		
		$customerId = $customer->Save();
		
		if(!$customerId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Clientes');
			$user->setAction('Agregar');
			$user->setItemId($customerId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$resCustomers = $customer->Enumerate();
			$customers = array();
			foreach($resCustomers['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$custAddress->setCustomerId($res['customerId']);
				$resAddress = $custAddress->EnumerateAll();
				
				$address = array();
				foreach($resAddress as $val){
					$card2 = $val;
					
					$state->setStateId($val['stateId']);
					$card2['state'] = strtoupper($state->GetNameById());
					
					$city->setCityId($val['cityId']);
					$card2['city'] = strtoupper($city->GetNameById());
					
					$address[] = $util->EncodeRow($card2);
				}
				
				$card['address'] = $address;
				
				$customers[] = $card;
			}
			$resCustomers['items'] = $customers;
								
			$smarty->assign('customers', $resCustomers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer.tpl');
		}		
		
		break;
		
	case 'saveEditCustomer':	 	
		
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$religion = $_POST['religion'];
		
		$customerId = $_POST['id'];
		
		$customer->setCustomerId($customerId);	
		$customer->setName($_POST['name']);
		$customer->setCategory($_POST['category']);
		$customer->setRfc($_POST['rfc']);
		$customer->setStreet($_POST['street']);
		$customer->setNoExt($_POST['noExt']);
		$customer->setNoInt($_POST['noInt']);
		$customer->setPostalCode($_POST['postalCode']);
		$customer->setColonia($_POST['colonia']);
		$customer->setCityId($_POST['cityId']);
		$customer->setStateId($_POST['stateId']);		
		$customer->setPhone($_POST['phone']);
		$customer->setEmail($_POST['e_mail']);
		$customer->setEdoCivil($_POST['edoCivil']);
		$customer->setRegimenMat($_POST['regimenMat']);
		
		if($day != '' && $month != '' && $year != ''){
			$birthdate = $year.'-'.$month.'-'.$day;
			$customer->setBirthdate($birthdate);
		}elseif($day != '' || $month != '' || $year != ''){
			$customer->setBirthdate2();
		}
		
		$customer->setReligion($religion);
		
		if($religion == 'Otra')
			$customer->setOtraReligion($_POST['otraReligion']);
		
		$customer->setNotes($_POST['notes']);
		$customer->setCompany($_POST['company']);
		$customer->setPosition($_POST['position']);
				
		if($_POST['active'])
			$customer->setActive(1);
		else
			$customer->setActive(0);
					
		if(!$customer->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Clientes');
			$user->setAction('Editar');
			$user->setItemId($customerId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$customer->SetPage($p);
			$resCustomers = $customer->Enumerate();
			$customers = array();
			foreach($resCustomers['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$custAddress->setCustomerId($res['customerId']);
				$resAddress = $custAddress->EnumerateAll();
				
				$address = array();
				foreach($resAddress as $val){
					$card2 = $val;
					
					$state->setStateId($val['stateId']);
					$card2['state'] = strtoupper($state->GetNameById());
					
					$city->setCityId($val['cityId']);
					$card2['city'] = strtoupper($city->GetNameById());
					
					$address[] = $util->EncodeRow($card2);
				}
				
				$card['address'] = $address;
				
				$customers[] = $card;
			}
			$resCustomers['items'] = $customers;
								
			$smarty->assign('customers', $resCustomers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer.tpl');
		}
			
		break;
	
	case 'deleteCustomer':
		
		$customerId = $_POST['id'];
		
		$customer->setCustomerId($customerId);	
				
		if(!$customer->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Clientes');
			$user->setAction('Eliminar');
			$user->setItemId($customerId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$customer->SetPage($p);
			$resCustomers = $customer->Enumerate();
			$customers = array();
			foreach($resCustomers['items'] as $res){
				$card = $util->EncodeRow($res);
				
				$custAddress->setCustomerId($res['customerId']);
				$resAddress = $custAddress->EnumerateAll();
				
				$address = array();
				foreach($resAddress as $val){
					$card2 = $val;
					
					$state->setStateId($val['stateId']);
					$card2['state'] = strtoupper($state->GetNameById());
					
					$city->setCityId($val['cityId']);
					$card2['city'] = strtoupper($city->GetNameById());
					
					$address[] = $util->EncodeRow($card2);
				}
				
				$card['address'] = $address;
				
				$customers[] = $card;
			}
			$resCustomers['items'] = $customers;
								
			$smarty->assign('customers', $resCustomers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer.tpl');
		}
			
		break;
	
	case 'deleteDoc':
						
			$customer->setCustDocId($_POST['id']);
			$info = $customer->InfoDoc();
			
			$customerId = $info['customerId'];
			
			if(!$customer->DeleteDoc())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Clientes');
				$user->setAction('EliminarDoc');
				$user->setItemId($customerId);
				$user->setDescription($info['name']);
				$user->SaveHistory();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$customer->setCustomerId($info['customerId']);
				$docs = $customer->GetDocs();
				
				$docs = $util->EncodeResult($docs);
				
				$smarty->assign('docs', $docs);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/customer-doc.tpl');
			}
			
		break;
	
}//Customer

?>
