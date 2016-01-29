<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['adpP'];
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
			$banks = $bank->GetByProject();
			$banks = $util->EncodeResult($banks);
			
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
		$tipo = $_POST['tipo'];
		$noCheque = $_POST['noCheque'];
		
		$accountPayment->setAccountPaymentId($accountPaymentId);
		$info = $accountPayment->Info();
		
		if($_POST['fecha'])
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		if($tipo != 'Cheque')
			$noCheque = '';
		
		$accountPayment->setProjectId($info['projectId']);
		$accountPayment->setOrderBuyId($info['orderBuyId']);
		$accountPayment->setSupplierId($info['supplierId']);
		$accountPayment->setTipo($tipo);
		$accountPayment->setBankId($bankId);
		$accountPayment->setQuantity($quantity);
		$accountPayment->setCurrency($_POST['currency']);
		$accountPayment->setFecha($fecha);
		$accountPayment->setNoCheque($noCheque);
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
				
		$accountPayment->setStatus('Activo');
		$accountPagoId = $accountPayment->SavePago();
		
		if(!$accountPagoId)
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
			
			if($tipo == 'Cheque')
				$bank->UpdateNextNoCheque();
			
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
						
			$accountPayment->setProjectId($info['projectId']);
			$payments = $accountPayment->Enumerate('0');
			
			$items = array();
			foreach($payments['items'] as $res){
				$card = $res;
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
						
				$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$card['abonos'] = $accountPayment->GetTotalPagos();
				
				$saldo = $card['total'] - $card['abonos'];
				$card['saldo'] = number_format($saldo,2,'.','');
				
				//Obtenemos los Pagos
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$resPagos = $accountPayment->EnumPagos();
				
				$pagos = array();
				foreach($resPagos as $val){
					$card2 = $val;
								
					$bank->setBankId($val['bankId']);
					$card2['bank'] = utf8_encode($bank->GetCuentaById());
					
					$card2['quantity'] = number_format($val['quantity'],2,'.','');
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
			
			//Save History Data			
			$user->setModule('Requisiciones Ejecucion Pagos');
			$user->setAction('Agregar');
			$user->setItemId($accountPagoId);
			$user->SaveHistory();
					
			echo 'ok[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo '[#]';
			$smarty->assign('stAdoP', 0);
			$smarty->assign('payments',$payments);
			$smarty->display(DOC_ROOT.'/templates/lists/account-dopayment.tpl');
			
			if($tipo == 'Cheque'){
				echo '[#]';
				echo $accountPagoId;
			}
			
		}//else		
		
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
					
					$card['quantity'] = number_format($val['quantity'],2,'.','');
					$card['fecha'] = date('d-m-Y',strtotime($val['fecha']));
					
					$pagos[] = $card;
				}
			
				$item['pagos'] = $pagos;
				
				$smarty->assign('item', $item);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/account-pagos.tpl');
			}		
		
		break;
	
	case 'cancelPago':
			
			$accountPagoId = $_POST['accountPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			$info['fecha'] = date('d-m-Y',strtotime($info['fecha']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cancel-pago-popup.tpl');
				
		break;
		
	case 'saveCancelPago':			
		
			$accountPagoId = $_POST['accountPagoId'];
			$obsCancel = $_POST['obs'];
			
			$accountPayment->setAccountPagoId($accountPagoId);			
			$infP = $accountPayment->InfoPago();
			$accountPaymentId = $infP['accountPaymentId'];
			
			$accountPayment->setObsCancel($obsCancel);
			$accountPayment->setFecha(date('Y-m-d'));
					
			if(!$accountPayment->CancelPago())
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
				
				/*****/
							
				$accountPayment->setProjectId($info['projectId']);
				$payments = $accountPayment->Enumerate($_SESSION['stAdoP']);
				
				$items = array();
				foreach($payments['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
							
					$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
					
					$accountPayment->setAccountPaymentId($res['accountPaymentId']);
					$card['abonos'] = $accountPayment->GetTotalPagos();
					
					$saldo = $card['total'] - $card['abonos'];
					$card['saldo'] = number_format($saldo,2,'.','');
					
					//Obtenemos los Pagos
					
					$accountPayment->setAccountPaymentId($res['accountPaymentId']);
					$resPagos = $accountPayment->EnumPagos();
					
					$pagos = array();
					foreach($resPagos as $val){
						$card2 = $val;
									
						$bank->setBankId($val['bankId']);
						$card2['bank'] = $bank->GetCuentaById();
						
						$card2['quantity'] = number_format($val['quantity'],2,'.','');
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
				
				//Save History Data			
				$user->setModule('Requisiciones Ejecucion Pagos');
				$user->setAction('Cancelar');
				$user->setItemId($accountPagoId);
				$user->SaveHistory();
			
				echo 'ok[#]';		
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				
				echo '[#]';
				$smarty->assign('stAdoP', 0);
				$smarty->assign('payments',$payments);
				$smarty->display(DOC_ROOT.'/templates/lists/account-dopayment.tpl');
			}		
		
		break;
	
	case 'detailsPago':
			
			$accountPagoId = $_POST['accountPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			$info['fecha'] = date('d-m-Y',strtotime($info['fecha']));
			$info['fechaCancel'] = date('d-m-Y',strtotime($info['fechaCancel']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$info['obsCancel'] = nl2br(utf8_encode($info['obsCancel']));
			
			$info['fechaRecoger'] = date('d-m-Y',strtotime($info['fechaRecoger']));
			$info['personaRecoger'] = utf8_encode($info['personaRecoger']);
			
			$info['fechaCobro'] = date('d-m-Y',strtotime($info['fechaCobro']));
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-pago-popup.tpl');
				
		break;	
	
	/******************/

	case 'getNextNoCheque':
			
			$bankId = $_POST['bankId'];
			
			$bank->setBankId($bankId);
			$info = $bank->Info();
			
			$noCheque = ($bankId != '') ? $info['noCheque'] : 0;
			
			$saldo = $bank->GetSaldo();
			
			echo 'ok[#]';
			echo $noCheque;
			echo '[#]';
			echo '$'.number_format($saldo,2);
			
		break;
	
	case 'deletePayment':
		
		$accountPayment->setAccountPaymentId($_POST['id']);	
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
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stAdoP = $_SESSION['stAdoP'];
			$accountPayment->SetPage($p);
			$accountPayment->setProjectId($projectId);
			$payments = $accountPayment->Enumerate($stAdoP);
			
			$items = array();
			foreach($payments['items'] as $res){
				$card = $res;
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
						
				$card['fecha'] = date('d-m-Y',strtotime($card['fecha']));
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$card['abonos'] = $accountPayment->GetTotalPagos();
				
				$saldo = $card['total'] - $card['abonos'];
				$card['saldo'] = number_format($saldo,2,'.','');
				
				$accountPayment->setAccountPaymentId($res['accountPaymentId']);
				$resPagos = $accountPayment->EnumPagos();
				
				$pagos = array();
				foreach($resPagos as $val){
					$card2 = $val;
								
					$bank->setBankId($val['bankId']);
					$card2['bank'] = utf8_encode($bank->GetCuentaById());
					
					$card2['quantity'] = number_format($val['quantity'],2,'.','');
					$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
					
					$pagos[] = $card2;
				}
				
				$card['pagos'] = $pagos;
				
				$items[] = $card;
			}
			$payments['items'] = $items;
			
			$smarty->assign('payments', $payments);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/account-dopayment.tpl');
		}
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stAdoP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
		
	
}

?>
