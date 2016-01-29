<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['adpP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{		
	case 'detailsPago':
			
			$accountPagoId = $_POST['accountPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			$info['fecha'] = $util->FormatDateUnixDMMMY($info['fecha'],false);
			$info['fechaCancel'] = date('d-m-Y',strtotime($info['fechaCancel']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$info['obsCancel'] = nl2br(utf8_encode($info['obsCancel']));
			
			$info['fechaRecoger'] = date('d-m-Y',strtotime($info['fechaRecoger']));
			$info['personaRecoger'] = utf8_encode($info['personaRecoger']);
			
			$info['fechaCobro'] = date('d-m-Y',strtotime($info['fechaCobro']));
			
			//Obtenemos el Concepto			
			$accountPayment->setOrderBuyId($info['orderBuyId']);
			$info['concepto'] = utf8_encode($accountPayment->GetConcept());
	
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-pago-popup.tpl');
				
		break;	
	
	case 'recogerCheque': 
			
			$accountPagoId = $_POST['accountPagoId'];
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
			
			$fechaHoy = date('d-m-Y');					
			$info['fecha'] = $fechaHoy;
											
			$smarty->assign('infP', $infP);
			$smarty->assign('noCheque', $info['noCheque']);
			$smarty->assign('accountPagoId', $accountPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/recoger-cheque-popup.tpl');
				
		break;
	
	case 'saveRecogerCheque':				

		$accountPagoId = $_POST['accountPagoId'];
		$fecha = trim($_POST['fecha']);
		$nombre = trim($_POST['nombre']);
						
		if($fecha)
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$accountPayment->setAccountPagoId($accountPagoId);
		$accountPayment->setFecha($fecha);
		$accountPayment->setNombre(utf8_decode($nombre));
		
		$info = $accountPayment->InfoPago();
		
		if(!$accountPayment->UpdateRecogerCheque())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{						
			if(!isset($_SESSION['stCheqP']))
				$_SESSION['stCheqP'] = '0';
			$stCheqP = $_SESSION['stCheqP'];
			
			$accountPayment->setProjectId($info['projectId']);
			$resPagos = $accountPayment->EnumCheques($stCheqP);
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2);
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$accountPayment->setOrderBuyId($val['orderBuyId']);
				$card2['concepto'] = utf8_encode($accountPayment->GetConcept());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;	
			
			//Save History Data			
			$user->setModule('Cheques');
			$user->setAction('Recoger');
			$user->setItemId($accountPagoId);
			$user->SaveHistory();
			
			echo 'ok[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo '[#]';
			$smarty->assign('stCheqP', 0);
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/account-cheques.tpl');
			
		}//else		
		
		break;
	
	case 'cancelarCheque': 
			
			$accountPagoId = $_POST['accountPagoId'];
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
			
			$fechaHoy = date('d-m-Y');					
			$info['fecha'] = $fechaHoy;
											
			$smarty->assign('infP', $infP);
			$smarty->assign('noCheque', $info['noCheque']);
			$smarty->assign('accountPagoId', $accountPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cancelar-cheque-popup.tpl');
				
		break;
	
	case 'saveCancelarCheque':
			
			$accountPagoId = $_POST['accountPagoId'];
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$accountPayment->setMotivoCancel($_POST['motivoCancel']);
			$accountPayment->setFecha(date('Y-m-d'));
			
			if(!$accountPayment->CancelCheque()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}else{
				
				$infP = $accountPayment->InfoPago();
				
				//Actualizamos el Saldo en la Cuenta Bancaria
				$bank->setBankId($infP['bankId']);
				$bank->setQuantity($infP['quantity']);
				$bank->RemoveQuantity();
				
				$accountPayment->setAccountPaymentId($infP['accountPaymentId']);
				$info = $accountPayment->Info();
				
				//Quitamos el status de Pagado
				$accountPayment->setPagado(0);
				$accountPayment->UpdatePagado();
				
				//Actualizamos el status a Confirmado de la Orden de Compra
				$orderBuy->setOrderBuyId($info['orderBuyId']);
				$orderBuy->setStatus('Confirmado');
				$orderBuy->UpdateStatus();				
				
				if(!isset($_SESSION['stCheqP']))
					$_SESSION['stCheqP'] = '0';
				$stCheqP = $_SESSION['stCheqP'];
				
				$accountPayment->setProjectId($info['projectId']);
				$resPagos = $accountPayment->EnumCheques($stCheqP);
				
				$items = array();
				foreach($resPagos['items'] as $val){
					$card2 = $val;
								
					$bank->setBankId($val['bankId']);
					$card2['bank'] = utf8_encode($bank->GetCuentaById());
					
					$card2['quantity'] = number_format($val['quantity'],2);
					$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
					
					//Obtenemos el Concepto			
					$accountPayment->setOrderBuyId($val['orderBuyId']);
					$card2['concepto'] = utf8_encode($accountPayment->GetConcept());
					
					$items[] = $card2;
				}
				$resPagos['items'] = $items;	
				
				//Save History Data			
				$user->setModule('Cheques');
				$user->setAction('Cancelar');
				$user->setItemId($accountPagoId);
				$user->SaveHistory();
				
				echo 'ok[#]';		
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				
				echo '[#]';
				$smarty->assign('stCheqP', 0);
				$smarty->assign('resPagos',$resPagos);
				$smarty->display(DOC_ROOT.'/templates/lists/account-cheques.tpl');
			}
			
		break;
	
	case 'cobrarCheque': 
			
			$accountPagoId = $_POST['accountPagoId'];
			
			$accountPayment->setAccountPagoId($accountPagoId);
			$info = $accountPayment->InfoPago();
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
														
			$smarty->assign('infP', $infP);
			$smarty->assign('noCheque', $info['noCheque']);
			$smarty->assign('accountPagoId', $accountPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cobrar-cheque-popup.tpl');
				
		break;	
	
	case 'saveCobrarCheque':				

		$accountPagoId = $_POST['accountPagoId'];
		$fecha = trim($_POST['fecha']);
						
		if($fecha)
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$accountPayment->setAccountPagoId($accountPagoId);
		$accountPayment->setFecha($fecha);
		
		$info = $accountPayment->InfoPago();
		
		if(!$accountPayment->UpdateCobrarCheque())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{							
			if(!isset($_SESSION['stCheqP']))
				$_SESSION['stCheqP'] = '0';
			$stCheqP = $_SESSION['stCheqP'];
			
			$accountPayment->setProjectId($info['projectId']);
			$resPagos = $accountPayment->EnumCheques($stCheqP);
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2);
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$accountPayment->setOrderBuyId($val['orderBuyId']);
				$card2['concepto'] = utf8_encode($accountPayment->GetConcept());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;	
			
			//Save History Data			
			$user->setModule('Cheques');
			$user->setAction('Cobrar');
			$user->setItemId($accountPagoId);
			$user->SaveHistory();
			
			echo 'ok[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo '[#]';
			$smarty->assign('stCheqP', 0);
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/account-cheques.tpl');
			
		}//else		
		
		break;
	
	case 'searchCheques':

			$noCheque = $_POST['vNoCheque'];
			$bankId = $_POST['vBankId'];
			$noFactura = $_POST['vNoFactura'];
			$status = $_POST['vStatus'];
			$estado = $_POST['vEstado'];
			$fechaIni = $_POST['vFechaIni'];
			$fechaFin = $_POST['vFechaFin'];
		
			$accountPayment->setProjectId($projectId);
			
			if($noCheque)
				$accountPayment->setNoCheque($noCheque);
			if($bankId)
				$accountPayment->setBankId($bankId);	
			if($noFactura)
				$accountPayment->setNoInvoice($noFactura);
			if($status)
				$accountPayment->setStatus($status);
			if($estado)
				$accountPayment->setStatusCheque($estado);			
			
			if($fechaIni){
				$fecha = date('Y-m-d',strtotime($fechaIni));
				$accountPayment->setFecha($fecha);
			}
			
			if($fechaFin){
				$fecha = date('Y-m-d',strtotime($fechaFin));
				$accountPayment->setFechaFin($fecha);
			}
			
			$resPagos['items'] = $accountPayment->SearchCheques();
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2,'.','');
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$accountPayment->setOrderBuyId($val['orderBuyId']);
				$card2['concepto'] = utf8_encode($accountPayment->GetConcept());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;
			
			echo 'ok[#]';
			
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/account-cheques.tpl');
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stAdoP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
		
	
}

?>
