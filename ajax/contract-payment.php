<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['contPayP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{
	case 'addPayment': 
		
			if(!$projectId){			
				$util->setError(10024, 'error', '', $field);
				$util->PrintErrors();
				
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;		  
			}
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			//Obtenemos las Torres
			$contract->setProjectId($projectId);
			$contract->setStatus('Activo');
			$resTorres = $contract->EnumItems();
			
			$torres = array();
			foreach($resTorres as $res){
				$card['projItemId'] = $res['projItemId'];
				$projItem->setProjItemId($res['projItemId']);
				$card['name'] = utf8_encode($projItem->GetNameById());
				
				$torres[] = $card;
			}
			
			if(count($torres) == 1)
				$info['projItemId'] = $torres[0]['projItemId'];				
						
			//Obtenemos los Clientes
			$contract->setProjectId($projectId);
			$contract->setStatus('Activo');
			$customers = $contract->EnumCustPayment();
			$customers = $util->EncodeResult($customers);
			$dateNow=$util->Validatecurrentdate($dateNow);
			if(count($customers) == 1)
				$info['customerId'] = $customers[0]['customerId'];			
			
			$dateNow = date('d-m-Y');
					
			echo 'ok[#]';
 			/*  if(!$dateNow){
				$util->setError(10024, 'error', '', $field);
				$util->PrintErrors();			 							
				echo "pase";
				print_r("pase");
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;		  
			} */
			$smarty->assign('infP', $infP);
			$smarty->assign('info',$info);
			$smarty->assign('torres', $torres);
			$smarty->assign('dateNow', $dateNow);
			$smarty->assign('customers', $customers);		
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-contract-payment-popup.tpl');
				
		break;
		
	case 'saveAddPayment':
			
			$tipo = $_POST['tipo'];
			$concepto = $_POST['concepto'];
			$contractId = $_POST['contractId'];
			$currency = $_POST['currency'];
			$quantity = $util->RemoveFormat($_POST['quantity']);
			
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
			$fechaHoy = date('Y-m-d');
			
			if($fecha > $fechaHoy){		
				$util->setError(11040, 'error', '', $value);
				$util->PrintErrors();
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;		  
			}
			
			if($tipo == 'Clte'){
				$projItemId = $_POST['projItemId'];
				$projDeptoId = $_POST['projDeptoId'];
				$customerId = $_POST['customerId'];
			}else{
				$projItemId = $_POST['projItemId2'];
				$projDeptoId = $_POST['projDeptoId2'];
				$customerId = $_POST['customerId2'];
			}
			
			$contract->setContractId($contractId);
			$info = $contract->Info();
			
			$projLevelId = $info['projLevelId'];
			
			$contPayment->setProjectId($_POST['projectId']);
			$contPayment->setContractId($contractId);		
			$contPayment->setProjItemId($projItemId);
			$contPayment->setProjLevelId($projLevelId);
			$contPayment->setProjDeptoId($projDeptoId);
			$contPayment->setBankId($_POST['bankId']);
			$contPayment->setCustomerId($customerId);
			$contPayment->setCurrency($currency);
			$contPayment->setFecha($fecha);
			$contPayment->setQuantity($quantity);
			$contPayment->setConcepto($concepto);
			
			if($info['currency'] != $currency)
				$contPayment->setCurrencyExchange($_POST['currencyExchange']);
			
			if($concepto == 'Otros')
				$contPayment->setObservaciones($_POST['observaciones']);			
											
			$contPaymentId = $contPayment->Save();
						
			if(!$contPaymentId)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{			
				//Guardamos los Pagos de cada Documento
				$docs = $_SESSION['abonos'];
				
				$contPayment->setContractId($contractId);
				$contPayment->setContPaymentId($contPaymentId);
				foreach($docs as $res){
					$contPayment->setContExpiryId($res['contExpiryId']);
					$contPayment->setMonto($res['monto']);
					$contPayment->SavePago();
				}
				
				$_SESSION['abonos'] = array();				
				
				//Save History Data			
				$user->setModule('Contratos Pagos');
				$user->setAction('Agregar');
				$user->setItemId($contPaymentId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contPayment->setProjectId($projectId);
				$payments = $contPayment->Enumerate();				
				$result = $payments['items'];
	
				$items = array();
				foreach($result as $res){
					$card = $res;
					
					$customer->setCustomerId($res['customerId']);
					$card['customer'] = utf8_encode($customer->GetNameById());
		
					$projItem->setProjItemId($res['projItemId']);
					$card['item'] = utf8_encode($projItem->GetNameById());
					
					$projLevel->setProjLevelId($res['projLevelId']);
					$card['level'] = utf8_encode($projLevel->GetNameById());
					
					$projDepto->setProjDeptoId($res['projDeptoId']);
					$card['area'] = utf8_encode($projDepto->GetNameById());
					
					$card['quantity'] = number_format($res['quantity'],2);
					
					$card['fecha'] = $util->FormatDateUnixDMMMY($res['fecha']);
										
					$items[] = $card;
				}
				$payments['items'] = $items;
				
				$smarty->assign('payments', $payments);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract-payment.tpl');
			}	
			
		break;
	
	case 'viewPayment': 
			
			$contPaymentId = $_POST['contPaymentId'];			
						
			$contPayment->setContPaymentId($contPaymentId);
			$info = $contPayment->Info();
			
			$info['quantity'] = number_format($info['quantity'],2);
			$info['fecha'] = $util->FormatDateUnixDMMMY($info['fecha']);
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			//Obtenemos la Informacion del Contrato
			$contract->setContractId($info['contractId']);
			$infC = $contract->Info();			
			
			$info['showTipo'] = ($info['currency'] != $infC['currency']) ? 1 : 0;
			
			$customer->setCustomerId($info['customerId']);
			$info['customer'] = utf8_encode($customer->GetNameById());
			
			$projItem->setProjItemId($info['projItemId']);
			$info['torre'] = $projItem->GetNameById();
			
			$projDepto->setProjDeptoId($info['projDeptoId']);
			$info['depto'] = $projDepto->GetNameById();
					
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$info['observaciones'] = utf8_encode($info['observaciones']);
			
			echo 'ok[#]';
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-contract-payment-popup.tpl');
				
		break;
			
	case 'deletePayment':
			
			$contPaymentId = $_POST['id'];
			
			$contPayment->setContPaymentId($contPaymentId);	
					
			if(!$contPayment->Delete())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Contratos Pagos');
				$user->setAction('Eliminar');
				$user->setItemId($contPaymentId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contPayment->SetPage($p);
				$contPayment->setProjectId($projectId);
				$payments = $contPayment->Enumerate();
				$result = $payments['items'];
	
				$items = array();
				foreach($result as $res){
					$card = $res;
					
					$customer->setCustomerId($res['customerId']);
					$card['customer'] = utf8_encode($customer->GetNameById());
					
					$projItem->setProjItemId($res['projItemId']);
					$card['item'] = utf8_encode($projItem->GetNameById());
					
					$projLevel->setProjLevelId($res['projLevelId']);
					$card['level'] = utf8_encode($projLevel->GetNameById());
					
					$projDepto->setProjDeptoId($res['projDeptoId']);
					$card['area'] = utf8_encode($projDepto->GetNameById());
					
					$card['quantity'] = number_format($res['quantity'],2);
					
					$card['fecha'] = $util->FormatDateUnixDMMMY($res['fecha']);
					
					$items[] = $card;
				}
				$payments['items'] = $items;
				
				$smarty->assign('payments', $payments);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract-payment.tpl');
			}
			
		break;
	
	case 'loadItems':
			
			$projectId = $_POST['projectId'];
			$customerId = $_POST['customerId'];
			
			$contract->setProjectId($projectId);
			$contract->setCustomerId($customerId);
			
			$resItems = $contract->EnumItemsByCustomer();
			
			$items = array();
			foreach($resItems as $res){
				$card['projItemId'] = $res['projItemId'];
				
				$projItem->setProjItemId($res['projItemId']);
				$card['name'] = $projItem->GetNameById();
				
				$items[] = $card;
				
			}
			
			if(count($items) == 1){
				
				$info['projItemId'] = $items[0]['projItemId'];
								
				$contract->setProjItemId($info['projItemId']);			
				$resAreas = $contract->EnumAreasByItem();
				
				$areas = array();
				foreach($resAreas as $res){
					
					$card['projDeptoId'] = $res['projDeptoId'];
					
					$projDepto->setProjDeptoId($res['projDeptoId']);
					$card['name'] = $projDepto->GetNameById();
					
					$areas[] = $card;
										
				}//foreach
				
				if(count($areas) == 1)
					$info['projDeptoId'] = $areas[0]['projDeptoId'];
								
				$smarty->assign('info', $info);
				
			}//if
			
			echo 'ok[#]';
			
			$smarty->assign('items', $items);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumProjItemCont.tpl');
			
			echo '[#]';
			
			$smarty->assign('areas', $areas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumAreasPay.tpl');
			
		break;
	
	case 'loadAreas':
			
			$projectId = $_POST['projectId'];
			$customerId = $_POST['customerId'];
			$projItemId = $_POST['projItemId'];
			
			$contract->setProjectId($projectId);
			$contract->setCustomerId($customerId);
			$contract->setProjItemId($projItemId);
			
			$resAreas = $contract->EnumAreasByItem();
			
			$areas = array();
			foreach($resAreas as $res){
				
				$card['projDeptoId'] = $res['projDeptoId'];
				
				$projDepto->setProjDeptoId($res['projDeptoId']);
				$card['name'] = $projDepto->GetNameById();
				
				$areas[] = $card;
								
			}
			
			if(count($areas) == 1){
				$info['projDeptoId'] = $areas[0]['projDeptoId'];								
				$smarty->assign('info', $info);
			}
			
			echo 'ok[#]';
			
			$smarty->assign('areas', $areas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumAreasPay.tpl');
			
		break;
	
	case 'loadAreas2':
			
			$projectId = $_POST['projectId'];			
			$projItemId = $_POST['projItemId'];
			
			$contract->setProjectId($projectId);			
			$contract->setProjItemId($projItemId);
			
			$resAreas = $contract->EnumAreasByItem2();
			
			$areas = array();
			foreach($resAreas as $res){
				
				$card['projDeptoId'] = $res['projDeptoId'];
				
				$projDepto->setProjDeptoId($res['projDeptoId']);
				$card['name'] = $projDepto->GetNameById();
				
				$areas[] = $card;
				
			}
			
			if(count($areas) == 1){
				$info['projDeptoId'] = $areas[0]['projDeptoId'];
				
				$contract->setProjDeptoId($info['projDeptoId']);
			
				$resCust = $contract->EnumCustByDepto();
				
				$customers = array();
				foreach($resCust as $res){
					$card['customerId'] = $res['customerId'];
					
					$customer->setCustomerId($res['customerId']);
					$card['name'] = utf8_encode($customer->GetNameById());
					
					$customers[] = $card;
					
				}
				
				if(count($customers) == 1)
					$info['customerId'] = $customers[0]['customerId'];
												
				$smarty->assign('info', $info);
			}
			
			echo 'ok[#]';
			
			$smarty->assign('areas', $areas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumAreasPay2.tpl');
			
			echo '[#]';
			
			$smarty->assign('customers', $customers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumCustomerPay2.tpl');
			
		break;
	
	case 'loadCustomer':
			
			$projectId = $_POST['projectId'];			
			$projItemId = $_POST['projItemId'];
			$projDeptoId = $_POST['projDeptoId'];
			
			$contract->setProjectId($projectId);			
			$contract->setProjItemId($projItemId);
			$contract->setProjDeptoId($projDeptoId);
			
			$resCust = $contract->EnumCustByDepto();
			
			$customers = array();
			foreach($resCust as $res){
				$card['customerId'] = $res['customerId'];
				
				$customer->setCustomerId($res['customerId']);
				$card['name'] = utf8_encode($customer->GetNameById());
				
				$customers[] = $card;
				
			}
			
			if(count($customers) == 1){
				$info['customerId'] = $customers[0]['customerId'];
				$smarty->assign('info',$info);
			}
			
			echo 'ok[#]';
			
			$smarty->assign('customers', $customers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumCustomerPay2.tpl');
			
		break;	
	
	case 'updateData':
			
			$projectId = $_POST['projectId'];
			$customerId = $_POST['customerId'];
			$projItemId = $_POST['projItemId'];
			$projDeptoId = $_POST['projDeptoId'];
			$quantity = $_POST['quantity'];
			
			$contract->setProjectId($projectId);
			$contract->setCustomerId($customerId);
			$contract->setProjItemId($projItemId);
			$contract->setProjDeptoId($projDeptoId);
					
			$contractId = $contract->GetContractId();
			
			//Obtenemos la Informacion del Contrato
			$contract->setContractId($contractId);
			$infC = $contract->Info();
			
			//Obtenemos la Moneda
			if($infC['currency'] == 'MXN')
				$currencyIndex = 1;
			elseif($infC['currency'] == 'DLS')
				$currencyIndex = 2;
			elseif($infC['currency'] == 'EUR')
				$currencyIndex = 3;
			
			//Pagos Anteriores
			$contPayment->setContractId($contractId);
			$resPayments = $contPayment->GetPayments();
								
			$pagosAnt = 0;
			foreach($resPayments as $res){
				$pagosAnt += $res['quantity'];
			}
			
			$pagoTotal = $pagosAnt + $quantity;
			
			//Obtenemos los Documentos
			$contract->setContractId($contractId);
			$resDocs = $contract->GetDocs();
			
			$fechaHoy = date('Y-m-d');
			
			$saldoMant = 0;
			$saldoEquip = 0;
			$saldoVencido = 0;
			$saldoVigente = 0;
			$saldoFuturo = 0;
			$operacionTotal = 0;	
			foreach($resDocs as $res){
				
				$doc = $res['noExpiry'];
				$monto = $res['monto'];
				
				if($doc != 'Mantenimiento' && $doc != 'Equipamiento')
					$operacionTotal += $monto;
				
				$contPayment->setContExpiryId($res['contExpiryId']);
				$pagosDoc = $contPayment->GetTotalPagoByDoc();
				$saldoDoc = $monto - $pagosDoc;
								
				$monto = $saldoDoc;
				
				if($doc == 'Mantenimiento'){
					$saldoMant += $monto;
					
					//Actualizamos el Pago Total
					$pagoTotal -= $pagosDoc;
				}
				
				if($doc == 'Equipamiento'){
					$saldoEquip += $monto;
					
					//Actualizamos el Pago Total
					$pagoTotal -= $pagosDoc;
				}
					
				if($doc != 'Mantenimiento' && $doc != 'Equipamiento'){
					
					if($res['fecha'] < $fechaHoy)
						$saldoVencido += $monto;
					elseif($res['fecha'] == $fechaHoy)
						$saldoVigente += $monto;
					else
						$saldoFuturo += $monto;
				}
				
			}//foreach
			
			$saldoTotal = $operacionTotal - $pagoTotal;
			$pago = $saldoVencido + $saldoVigente;
			
			echo 'ok[#]';
			echo $contractId;
			echo '[#]';
			echo '$'.number_format($saldoMant,2);
			echo '[#]';
			echo '$'.number_format($saldoEquip,2);
			echo '[#]';
			echo '$'.number_format($saldoVencido,2);
			echo '[#]';
			echo '$'.number_format($saldoVigente,2);
			echo '[#]';
			echo '$'.number_format($saldoFuturo,2);
			echo '[#]';
			echo '$'.number_format($pago,2);
			echo '[#]';
			echo '$'.number_format($operacionTotal,2);
			echo '[#]';
			echo '$'.number_format($saldoTotal,2);
			echo '[#]';
			echo '$'.number_format($pagoTotal,2);
			echo '[#]';			
			echo $currencyIndex;
		
		break;
	
	case 'updatePagoTotal':
			
			$projectId = $_POST['projectId'];
			$contractId = $_POST['contractId'];			
			$quantity = $util->RemoveFormat($_POST['quantity']);
			$chkMant = $_POST['chkMant'];
			$chkEquip = $_POST['chkEquip'];
									
			$_SESSION['abonos'] = array();
			
			//Pagos Anteriores
			$contPayment->setContractId($contractId);
			$resPayments = $contPayment->GetPayments();
								
			$pagosAnt = 0;
			foreach($resPayments as $res){
				$pagosAnt += $res['quantity'];
			}
			
			$pagoTotal = $pagosAnt + $quantity;
			
			//Obtenemos los Documentos de Mant. y Equip.
			$contract->setContractId($contractId);
			$resDocs = $contract->GetDocsMantEquip();
			
			$fechaHoy = date('Y-m-d');
			
			$abonoMant = 0;
			$abonoEquip = 0;
			$abonoVencido = 0;
			$abonoVigente = 0;
			$abonoFuturo = 0;
			$operacionTotal = 0;
			
			foreach($resDocs as $res){
				
				$doc = $res['noExpiry'];		
				$monto = $res['monto'];
				
				if($doc != 'Mantenimiento' && $doc != 'Equipamiento')
					$operacionTotal += $monto;
				
				$contPayment->setContExpiryId($res['contExpiryId']);
				$pagosDoc = $contPayment->GetTotalPagoByDoc();
				$saldoDoc = $monto - $pagosDoc;
				
				$monto = $saldoDoc;
				
				if($doc == 'Mantenimiento' && $chkMant == 1){
					
					$mantAbono = 0;
					if($quantity > $monto){					
						$quantity -= $monto;
						$mantAbono = $monto;					
					}elseif($quantity <= $monto){					
						$monto -= $quantity;
						$mantAbono = $quantity;
						$quantity = 0;					
					}
					
					$abonoMant += $mantAbono;
					
					//Actualizamos el Pago Total
					$pagoTotal -= $mantAbono;
					
					if($mantAbono){
						$inf['monto'] = $mantAbono;
						$inf['contExpiryId'] = $res['contExpiryId'];
						$_SESSION['abonos'][] = $inf;
					}
					
				}
				
				if($doc == 'Mantenimiento'){
					
					//Actualizamos el Pago Total
					$pagoTotal -= $pagosDoc;
				}
				
				if($doc == 'Equipamiento' && $chkEquip == 1){
					
					$equipAbono = 0;
					if($quantity > $monto){					
						$quantity -= $monto;
						$equipAbono = $monto;					
					}elseif($quantity <= $monto){					
						$monto -= $quantity;
						$equipAbono = $quantity;
						$quantity = 0;					
					}
					
					$abonoEquip += $equipAbono;
					
					//Actualizamos el Pago Total
					$pagoTotal -= $equipAbono;
					
					if($equipAbono){
						$inf['monto'] = $equipAbono;
						$inf['contExpiryId'] = $res['contExpiryId'];
						$_SESSION['abonos'][] = $inf;
					}
					
				}
				
				if($doc == 'Equipamiento'){
					
					//Actualizamos el Pago Total
					$pagoTotal -= $pagosDoc;
				}
								
			}//foreach
			
			/*******/
			
			//Obtenemos los Documentos Normales
			$contract->setContractId($contractId);
			$resDocs = $contract->GetDocs2();
			
			foreach($resDocs as $res){
				
				$doc = $res['noExpiry'];		
				$monto = $res['monto'];
				
				$operacionTotal += $monto;
				
				$contPayment->setContExpiryId($res['contExpiryId']);
				$pagosDoc = $contPayment->GetTotalPagoByDoc();
				$saldoDoc = $monto - $pagosDoc;
				
				$monto = $saldoDoc;
													
				if($res['fecha'] < $fechaHoy){
					
					$abonoVen = 0;
					if($quantity > $monto){					
						$quantity -= $monto;
						$abonoVen = $monto;					
					}elseif($quantity <= $monto){					
						$monto -= $quantity;
						$abonoVen = $quantity;
						$quantity = 0;					
					}
					
					$abonoVencido += $abonoVen;
					
					if($abonoVen){
						$inf['monto'] = $abonoVen;
						$inf['contExpiryId'] = $res['contExpiryId'];
						$_SESSION['abonos'][] = $inf;
					}
					
				}elseif($res['fecha'] == $fechaHoy){
					
					$abonoVig = 0;
					if($quantity > $monto){					
						$quantity -= $monto;
						$abonoVig = $monto;					
					}elseif($quantity <= $monto){					
						$monto -= $quantity;
						$abonoVig = $quantity;
						$quantity = 0;					
					}
					
					$abonoVigente += $abonoVig;
					
					if($abonoVig){
						$inf['monto'] = $abonoVig;
						$inf['contExpiryId'] = $res['contExpiryId'];
						$_SESSION['abonos'][] = $inf;
					}
					
				}else{
					
					$abonoFut = 0;
					if($quantity > $monto){					
						$quantity -= $monto;
						$abonoFut = $monto;					
					}elseif($quantity <= $monto){					
						$monto -= $quantity;
						$abonoFut = $quantity;
						$quantity = 0;					
					}
					
					$abonoFuturo += $abonoFut;
					
					if($abonoFut){
						$inf['monto'] = $abonoFut;
						$inf['contExpiryId'] = $res['contExpiryId'];
						$_SESSION['abonos'][] = $inf;
					}
					
				}
				
								
			}//foreach

			$saldoTotal = $operacionTotal - $pagoTotal;
			$abonoTotal = $abonoVencido + $abonoVigente + $abonoVigente + $abonoMant + $abonoEquip;
			
			echo 'ok[#]';
			echo '$'.number_format($pagoTotal,2);
			echo '[#]';
			echo '$'.number_format($saldoTotal,2);
			echo '[#]';
			echo '$'.number_format($abonoMant,2);
			echo '[#]';
			echo '$'.number_format($abonoEquip,2);
			echo '[#]';
			echo '$'.number_format($abonoVencido,2);
			echo '[#]';
			echo '$'.number_format($abonoVigente,2);
			echo '[#]';
			echo '$'.number_format($abonoFuturo,2);
			
			echo '[#]';
			echo number_format($abonoMant,2,'.','');
			echo '[#]';
			echo number_format($abonoEquip,2,'.','');
			echo '[#]';
			echo number_format($abonoSaldoVencido,2,'.','');
			echo '[#]';
			echo number_format($abonoSaldoVigente,2,'.','');
			echo '[#]';
			echo number_format($abonoFuturo,2,'.','');
			echo '[#]';
			echo '$'.number_format($abonoTotal,2,'.',',');
			
		break;
		
	case 'loadBanks':
			
			$projectId = $_POST['projectId'];
			$currency = $_POST['currency'];
			$contractId = $_POST['contractId'];
			
			$contract->setContractId($contractId);
			$infC = $contract->Info();
			
			$showTipo = ($currency != $infC['currency']) ? 1 : 0;
			
			$bank->setProjectId($projectId);
			$bank->setCurrency($currency);
			$banks = $bank->EnumByProjCurrency();
			$banks = $util->EncodeResult($banks);
			
			if(count($banks) == 1){
				$info['bankId'] = $banks[0]['bankId'];
				$smarty->assign('info',$info);
			}
			
			echo 'ok[#]';
			echo $showTipo;
			
			echo '[#]';
			
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumBankPay.tpl');
			
		break;
				
}

?>
