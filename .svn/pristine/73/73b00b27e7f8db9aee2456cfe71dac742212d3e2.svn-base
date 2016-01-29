<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['apP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{	
	case 'addPago': 
			
			$accountPaymentId = $_POST['accountPaymentId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
			
			$fechaHoy = date('d-m-Y');
			
			//Obtenemos el saldo actual
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$infA = $accountPayment->Info();
			$abonos = $accountPayment->GetTotalPagos();
			
			$saldo = $infA['total'] - $abonos;
						
			$info['fecha'] = $fechaHoy;
			$info['saldo'] = $saldo;
			
			//Obtenemos el tipo de MONEDA
			$info['currency'] = $accountPayment->GetCurrencyItems($infA['orderBuyId']);
						
			$smarty->assign('infP', $infP);
			$smarty->assign('banks', $banks);
			$smarty->assign('info', $info);
			$smarty->assign('accountPaymentId', $accountPaymentId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-pago-popup.tpl');
				
		break;	
	
	case 'saveAddPago':				
		
		$accountPaymentId = $_POST['accountPaymentId'];
		$bankId = $_POST['bankId'];
		$quantity = $_POST['quantity'];
		
		$accountPayment->setAccountPaymentId($accountPaymentId);
		$info = $accountPayment->Info();
		
		if($_POST['fecha'])
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$accountPayment->setProjectId($info['projectId']);
		$accountPayment->setOrderBuyId($info['orderBuyId']);
		$accountPayment->setSupplierId($info['supplierId']);
		$accountPayment->setBankId($bankId);
		$accountPayment->setQuantity($quantity);
		$accountPayment->setCurrency($_POST['currency']);
		$accountPayment->setFecha($fecha);
		$accountPayment->setNoCheque($_POST['noCheque']);
		$accountPayment->setNoInvoice($_POST['noInvoice']);
		
		//Obtenemos los abonos realizados
		$abonos = $accountPayment->GetTotalPagos();
		$saldo = $info['total'] - $abonos;
		
		if($quantity > $saldo){
			$util->setError(11011, 'error', '', '');
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		if(!$accountPayment->SavePago())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{				
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($bankId);
			$bank->setQuantity($quantity);
			$bank->AddQuantity();
			
			//Checamos si ya esta pagado totalmente
			$abonos = $accountPayment->GetTotalPagos();
			$saldo = $info['total'] - $abonos;		
			$pagado = ($saldo == 0) ? 1:0;		
			
			//Actualizamos el status a Pagado
			if($pagado){
				$accountPayment->setAccountPaymentId($accountPaymentId);
				$accountPayment->setPagado(1);
				$accountPayment->UpdatePagado();
				
				$orderBuy->setOrderBuyId($info['orderBuyId']);
				$orderBuy->setStatus('Completo');
				$orderBuy->UpdateStatus();
			}
			
			echo 'ok[#]';
			echo $accountPaymentId;
			
			echo '[#]';
			echo '$'.number_format($abonos,2);
			
			echo '[#]';
			echo '$'.number_format($saldo,2);
			
			echo '[#]';
			echo $pagado;
									
			echo '[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo '[#]';			
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$resPagos = $accountPayment->EnumPagos();
			
			$pagos = array();
			foreach($resPagos as $val){
				$card = $val;
							
				$bank->setBankId($val['bankId']);
				$card['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card['quantity'] = number_format($val['quantity'],2);
				$card['fecha'] = date('d-m-Y',strtotime($val['fecha']));
								
				$pagos[] = $card;
			}
		
			$item['pagos'] = $pagos;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/account-pagos.tpl');
		}		
		
		break;
	
	case 'deletePago':			
		
		$accountPagoId = $_POST['id'];
		$accountPayment->setAccountPagoId($accountPagoId);		
			
		
		$infP = $accountPayment->InfoPago();
		$accountPaymentId = $infP['accountPaymentId'];
				
		if(!$accountPayment->DeletePago())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($infP['bankId']);
			$bank->setQuantity($infP['quantity']);
			$bank->RemoveQuantity();
			
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$info = $accountPayment->Info();
			
			//Quitamos el status de Pagado
			$accountPayment->setPagado(0);
			$accountPayment->UpdatePagado();
			
			//Actualizamos el status a Confirmado de la Orden de Compra
			$orderBuy->setOrderBuyId($info['orderBuyId']);
			$orderBuy->setStatus('Confirmado');
			$orderBuy->UpdateStatus();
			
			//Obtenemos los abonos realizados
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$abonos = $accountPayment->GetTotalPagos();
			
			$saldo = $info['total'] - $abonos;
			
			echo 'ok[#]';
			echo $accountPaymentId;
			
			echo '[#]';
			echo '$'.number_format($abonos,2);
			
			echo '[#]';
			echo '$'.number_format($saldo,2);
						
			echo '[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo '[#]';			
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$resPagos = $accountPayment->EnumPagos();
			
			$pagos = array();
			foreach($resPagos as $val){
				$card = $val;
							
				$bank->setBankId($val['bankId']);
				$card['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card['quantity'] = number_format($val['quantity'],2);
				$card['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				$pagos[] = $card;
			}
		
			$item['pagos'] = $pagos;
			
			$smarty->assign('item', $item);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/account-pagos.tpl');
		}		
		
		break;
	
	/******************/
	
	case 'deletePayment':
		
		$accountPaymentId = $_POST['id'];
		
		$accountPayment->setAccountPaymentId($accountPaymentId);	
		$info = $accountPayment->Info();
		
		$orderBuyId = $info['orderBuyId'];
				
		if(!$accountPayment->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{			
			//Actualizamos el status a Confirmado de la Orden de Compra
			$orderBuy->setOrderBuyId($orderBuyId);
			$orderBuy->setStatus('Confirmado');
			$orderBuy->UpdateStatus();
			
			//Actualizamos el status a Completo de la Orden de Compra en Entregas
			$orderBuy->setOrderBuyId($orderBuyId);
			$orderBuy->setStatus('Completo');
			$orderBuy->UpdateStatusEnt();
			
			//Save History Data			
			$user->setModule('Requisiciones Pagos');
			$user->setAction('Eliminar');
			$user->setItemId($accountPaymentId);
			$user->SaveHistory();
				
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stAP = $_SESSION['stAP'];
			$accountPayment->SetPage($p);
			$accountPayment->setProjectId($projectId);
			$payments = $accountPayment->Enumerate($stAP);
			
			$items = array();
			foreach($payments['items'] as $res){
				$card = $res;
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
						
				$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$card['abonos'] = $accountPayment->GetTotalPagos();
				
				$saldo = $card['total'] - $card['abonos'];
				$card['saldo'] = number_format($saldo,2);
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$resPagos = $accountPayment->EnumPagos();
				
				$pagos = array();
				foreach($resPagos as $val){
					$card2 = $val;
								
					$bank->setBankId($val['bankId']);
					$card2['bank'] = utf8_encode($bank->GetCuentaById());
					
					$card2['quantity'] = number_format($val['quantity'],2);
					$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
					
					$pagos[] = $card2;
				}
				
				$card['pagos'] = $pagos;
				
				$items[] = $card;
			}
			$payments['items'] = $items;
			
			$smarty->assign('payments', $payments);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/account-payment.tpl');
		}
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stAP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'confirmRevisado':
			
			$accountPaymentId = $_POST['id'];
			
			$accountPayment->setAccountPaymentId($accountPaymentId);
			$accountPayment->setRevisado(1);
			
			if(!$accountPayment->UpdateRevisado())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Requisiciones Pagos');
				$user->setAction('Confirmar');
				$user->setItemId($accountPaymentId);
				$user->SaveHistory();
				
				$util->setError(11023,'complete');
				$util->PrintErrors();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$stAP = $_SESSION['stAP'];
	
				$accountPayment->setProjectId($projectId);
				$payments = $accountPayment->EnumRevisado($stAP);
				
				$items = array();
				foreach($payments['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
							
					$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
					
					$accountPayment->setAccountPaymentId($res['accountPaymentId']);
					$card['abonos'] = $accountPayment->GetTotalPagos();
					
					$saldo = $card['total'] - $card['abonos'];
					$card['saldo'] = number_format($saldo,2);
					
					//Obtenemos los Pagos
					
					$accountPayment->setAccountPaymentId($res['accountPaymentId']);
					$resPagos = $accountPayment->EnumPagos();
					
					$pagos = array();
					foreach($resPagos as $val){
						$card2 = $val;
									
						$bank->setBankId($val['bankId']);
						$card2['bank'] = $bank->GetCuentaById();
						
						$card2['quantity'] = number_format($val['quantity'],2);
						$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
						
						$pagos[] = $card2;
					}
					
					$card['pagos'] = $pagos;
					
					//Obtenemos los detalles de la Orden de Compra
					
					$orderBuy->setOrderBuyId($res['orderBuyId']);
					$resMat = $orderBuy->EnumItems();
					
					$materials = array();
					foreach($resMat as $val){
			
						$conceptMat->setConceptMatId($val['conceptMatId']);
						$materialId = $conceptMat->GetMaterialId();
						
						$material->setMaterialId($materialId);
						$infM = $material->Info();			
						$val['material'] = $infM['name'];
						
						$val['unitPrice'] = $val['total'] / $val['quantity'];
						
						$unit->setUnitId($infM['unitId']);
						$val['unit'] = $unit->GetClaveById();
						
						$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
						$recibido = $orderBuy->GetTotalRecibido();
						
						$val['recibido'] = $recibido;
						$val['saldo'] = $val['quantity'] - $recibido;
									
						$materials[] = $val;			
					}
					
					$card['orderBuy'] = $materials;
					
					$items[] = $card;
				}
				$payments['items'] = $items;
				
				$smarty->assign('payments',$payments);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/account-payment.tpl');
			}
			
		break;
		
	
}

?>
