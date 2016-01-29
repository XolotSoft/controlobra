<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['custP'];

switch($_POST['type'])
{
	case 'addAddress': 
		
		$customerId = $_POST['customerId'];
		
		$customer->setCustomerId($customerId);
		$nomCust = utf8_encode($customer->GetNameById());
		
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states);
				
		$smarty->assign('states', $states);
		$smarty->assign('nomCust', $nomCust);
		$smarty->assign('customerId', $customerId);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-customer-address-popup.tpl');
				
		break;	

	case 'editAddress':
		
		$custAddress->setCustAddressId($_POST['id']);
		$info = $custAddress->Info();		
		$info = $util->EncodeRow($info);
		
		$customer->setCustomerId($info['customerId']);
		$nomCust = utf8_encode($customer->GetNameById());
		
		$states = $state->EnumerateAll();
		$states = $util->EncodeResult($states);
		
		$city->setStateId($info['stateId']);
		$cities = $city->EnumerateAll();
		$cities = $util->EncodeResult($cities);
		
		$smarty->assign('cities', $cities);	
		$smarty->assign('states', $states);
		$smarty->assign('nomCust', $nomCust);
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-customer-address-popup.tpl');
		
		break;
		
	case 'saveAddAddress':				
		
		$customerId = $_POST['customerId'];
		
		$custAddress->setCustomerId($customerId);
		$custAddress->setStreet($_POST['street']);
		$custAddress->setNoExt($_POST['noExt']);
		$custAddress->setNoInt($_POST['noInt']);
		$custAddress->setPostalCode($_POST['postalCode']);
		$custAddress->setColonia($_POST['colonia']);
		$custAddress->setCityId($_POST['cityId']);
		$custAddress->setStateId($_POST['stateId']);
									
		if(!$custAddress->Save())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Clientes');
			$user->setAction('AgregarDir');
			$user->setItemId($customerId);
			$user->SaveHistory();
									
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $customerId;
			echo '[#]';
			$custAddress->setCustomerId($customerId);		
			$resAddress = $custAddress->EnumerateAll();
		
			$address = array();
			foreach($resAddress as $val){
				$card2 = $val;
				
				$state->setStateId($val['stateId']);
				$card2['state'] = strtoupper($state->GetNameById());
				
				$city->setCityId($val['cityId']);
				$card2['city'] = strtoupper($city->GetNameById());
				
				$address[] = $card2;
			}			
			$item['address'] = $util->EncodeResult($address);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer-address.tpl');
		}		
		
		break;
		
	case 'saveEditAddress':	 	
		
		$custAddress->setCustAddressId($_POST['id']);	
		$custAddress->setStreet($_POST['street']);
		$custAddress->setNoExt($_POST['noExt']);
		$custAddress->setNoInt($_POST['noInt']);
		$custAddress->setPostalCode($_POST['postalCode']);
		$custAddress->setColonia($_POST['colonia']);
		$custAddress->setCityId($_POST['cityId']);
		$custAddress->setStateId($_POST['stateId']);
		
		$info = $custAddress->Info();
		$customerId = $info['customerId'];
									
		if(!$custAddress->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data
			$user->setModule('Clientes');
			$user->setAction('EditarDir');
			$user->setItemId($customerId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $customerId;
			echo '[#]';
			$custAddress->setCustomerId($customerId);
			$resAddress = $custAddress->EnumerateAll();
		
			$address = array();
			foreach($resAddress as $val){
				$card2 = $val;
				
				$state->setStateId($val['stateId']);
				$card2['state'] = strtoupper($state->GetNameById());
				
				$city->setCityId($val['cityId']);
				$card2['city'] = strtoupper($city->GetNameById());
				
				$address[] = $card2;
			}			
			$item['address'] = $util->EncodeResult($address);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer-address.tpl');
		}
			
		break;
	
	case 'deleteAddress':
		
		$custAddress->setCustAddressId($_POST['id']);
		
		$info = $custAddress->Info();
		$customerId = $info['customerId'];
				
		if(!$custAddress->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{				
			//Save History Data
			$user->setModule('Clientes');
			$user->setAction('EliminarDir');
			$user->setItemId($customerId);
			$user->setDescription($info['custAddressId']);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			echo $customerId;
			echo '[#]';			
			$custAddress->setCustomerId($customerId);
			$resAddress = $custAddress->EnumerateAll();
		
			$address = array();
			foreach($resAddress as $val){
				$card2 = $val;
				
				$state->setStateId($val['stateId']);
				$card2['state'] = strtoupper($state->GetNameById());
				
				$city->setCityId($val['cityId']);
				$card2['city'] = strtoupper($city->GetNameById());
				
				$address[] = $card2;
			}			
			$item['address'] = $util->EncodeResult($address);
					
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/customer-address.tpl');
		}
			
		break;			
	
}

?>