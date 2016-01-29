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
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
			$info['fecha'] = $util->FormatDateUnixDMMMY($info['fecha'],false);
			$info['fechaCancel'] = date('d-m-Y',strtotime($info['fechaCancel']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$info['obsCancel'] = nl2br(utf8_encode($info['obsCancel']));
			
			$info['fechaRecoger'] = date('d-m-Y',strtotime($info['fechaRecoger']));
			$info['personaRecoger'] = utf8_encode($info['personaRecoger']);
			
			$info['fechaCobro'] = date('d-m-Y',strtotime($info['fechaCobro']));
			
			//Obtenemos el Concepto			
			$estimacion->setEstimacionId($info['estimacionId']);
			$infC = $estimacion->Info();
			
			$concept->setConceptId($infC['conceptId']);
			$info['concepto'] = utf8_encode($concept->GetNameById());
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-pago-est-popup.tpl');
				
		break;	
	
	case 'recogerCheque': 
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
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
			$smarty->assign('estimacionPagoId', $estimacionPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/recoger-cheque-est-popup.tpl');
				
		break;
	
	case 'saveRecogerCheque':				

		$estimacionPagoId = $_POST['estimacionPagoId'];
		$fecha = trim($_POST['fecha']);
		$nombre = trim($_POST['nombre']);
		
		if($fecha)
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
		$estimacionPayment->setFecha($fecha);
		$estimacionPayment->setNombre(utf8_decode($nombre));
		
		$info = $estimacionPayment->InfoPago();
		
		if(!$estimacionPayment->UpdateRecogerCheque())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{						
			if(!isset($_SESSION['stCheqP']))
				$_SESSION['stCheqP'] = '0';
			$stCheqP = $_SESSION['stCheqP'];
			
			$estimacionPayment->setProjectId($info['projectId']);
			$resPagos = $estimacionPayment->EnumCheques($stCheqP);
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2);
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$estimacion->setEstimacionId($info['estimacionId']);
				$infC = $estimacion->Info();
				
				$concept->setConceptId($infC['conceptId']);
				$card2['concepto'] = utf8_encode($concept->GetNameById());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;	
			
			//Save History Data			
			$user->setModule('ChequesEst');
			$user->setAction('Recoger');
			$user->setItemId($estimacionPagoId);
			$user->SaveHistory();
			
			echo 'ok[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo '[#]';
			$smarty->assign('stCheqP', 0);
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-cheques.tpl');
			
		}//else		
		
		break;
	
	case 'cancelarCheque': 
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
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
			$smarty->assign('estimacionPagoId', $estimacionPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cancelar-cheque-est-popup.tpl');
				
		break;
	
	case 'saveCancelarCheque':
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$estimacionPayment->setMotivoCancel($_POST['motivoCancel']);
			$estimacionPayment->setFecha(date('Y-m-d'));
			
			if(!$estimacionPayment->CancelCheque()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}else{
				
				$infP = $estimacionPayment->InfoPago();
				
				//Actualizamos el Saldo en la Cuenta Bancaria
				$bank->setBankId($infP['bankId']);
				$bank->setQuantity($infP['quantity']);
				$bank->RemoveQuantity();
				
				$estimacionPayment->setEstimacionPaymentId($infP['estimacionPaymentId']);
				$info = $estimacionPayment->Info();
				
				//Quitamos el status de Pagado
				$estimacionPayment->setPagado(0);
				$estimacionPayment->UpdatePagado();
								
				if(!isset($_SESSION['stCheqP']))
					$_SESSION['stCheqP'] = '0';
				$stCheqP = $_SESSION['stCheqP'];
				
				$estimacionPayment->setProjectId($info['projectId']);
				$resPagos = $estimacionPayment->EnumCheques($stCheqP);
				
				$items = array();
				foreach($resPagos['items'] as $val){
					$card2 = $val;
								
					$bank->setBankId($val['bankId']);
					$card2['bank'] = utf8_encode($bank->GetCuentaById());
					
					$card2['quantity'] = number_format($val['quantity'],2);
					$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
					
					//Obtenemos el Concepto			
					$estimacion->setEstimacionId($val['estimacionId']);
					$infC = $estimacion->Info();
					
					$concept->setConceptId($infC['conceptId']);
					$card2['concepto'] = utf8_encode($concept->GetNameById());
					
					$items[] = $card2;
				}
				$resPagos['items'] = $items;	
				
				//Save History Data	

				$user->setModule('ChequesEst');
				$user->setAction('Cancelar');
				$user->setItemId($estimacionPagoId);
				$user->SaveHistory();

				echo 'ok[#]';		
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				
				echo '[#]';
				$smarty->assign('stCheqP', 0);
				$smarty->assign('resPagos',$resPagos);
				$smarty->display(DOC_ROOT.'/templates/lists/estimacion-cheques.tpl');
			}
			
		break;
	
	case 'cobrarCheque': 
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
														
			$smarty->assign('infP', $infP);
			$smarty->assign('noCheque', $info['noCheque']);
			$smarty->assign('estimacionPagoId', $estimacionPagoId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cobrar-cheque-est-popup.tpl');
				
		break;	
	
	case 'saveCobrarCheque':				

		$estimacionPagoId = $_POST['estimacionPagoId'];
		$fecha = trim($_POST['fecha']);
						
		if($fecha)
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
		$estimacionPayment->setFecha($fecha);
		
		$info = $estimacionPayment->InfoPago();
		
		if(!$estimacionPayment->UpdateCobrarCheque())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{							
			if(!isset($_SESSION['stCheqP']))
				$_SESSION['stCheqP'] = '0';
			$stCheqP = $_SESSION['stCheqP'];
			
			$estimacionPayment->setProjectId($info['projectId']);
			$resPagos = $estimacionPayment->EnumCheques($stCheqP);
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2);
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$estimacion->setEstimacionId($val['estimacionId']);
				$infC = $estimacion->Info();
				
				$concept->setConceptId($infC['conceptId']);
				$card2['concepto'] = utf8_encode($concept->GetNameById());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;	
			
			//Save History Data			
			$user->setModule('ChequesEst');
			$user->setAction('Cobrar');
			$user->setItemId($estimacionPagoId);
			$user->SaveHistory();
			
			echo 'ok[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo '[#]';
			$smarty->assign('stCheqP', 0);
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-cheques.tpl');
			
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
		
			$estimacionPayment->setProjectId($projectId);
			
			if($noCheque)
				$estimacionPayment->setNoCheque($noCheque);
			if($bankId)
				$estimacionPayment->setBankId($bankId);	
			if($noFactura)
				$estimacionPayment->setNoInvoice($noFactura);
			if($status)
				$estimacionPayment->setStatus($status);
			if($estado)
				$estimacionPayment->setStatusCheque($estado);			
			
			if($fechaIni){
				$fecha = date('Y-m-d',strtotime($fechaIni));
				$estimacionPayment->setFecha($fecha);
			}
			
			if($fechaFin){
				$fecha = date('Y-m-d',strtotime($fechaFin));
				$estimacionPayment->setFechaFin($fecha);
			}
			
			$resPagos['items'] = $estimacionPayment->SearchCheques();
			
			$items = array();
			foreach($resPagos['items'] as $val){
				$card2 = $val;
							
				$bank->setBankId($val['bankId']);
				$card2['bank'] = utf8_encode($bank->GetCuentaById());
				
				$card2['quantity'] = number_format($val['quantity'],2,'.','');
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$estimacion->setEstimacionId($val['estimacionId']);
				$infC = $estimacion->Info();
				
				$concept->setConceptId($infC['conceptId']);
				$card2['concepto'] = utf8_encode($concept->GetNameById());
				
				$items[] = $card2;
			}
			$resPagos['items'] = $items;
			
			echo 'ok[#]';
			
			$smarty->assign('resPagos',$resPagos);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-cheques.tpl');
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stAdoP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
		
	
}

?>
