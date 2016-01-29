<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$p = intval($_GET['p']);
	$_SESSION['custP'] = $p;
	
	$customer->SetPage($p);	
	$resCustomers = $customer->Enumerate();
	
	$customers = array();
	foreach($resCustomers['items'] as $res){
		$card = $res;
		
		$custAddress->setCustomerId($res['customerId']);
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
		
		$card['address'] = $address;
		
		$customers[] = $card;
	}
	$resCustomers['items'] = $customers;

	$smarty->assign('customers', $resCustomers);
	$smarty->assign('mainMnu','catalogos');
			
?>