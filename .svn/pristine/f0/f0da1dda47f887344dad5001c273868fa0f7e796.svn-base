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
			
			$estimacionPaymentId = $_POST['estimacionPaymentId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
		
			$bank->setProjectId($projectId);
			$banks = $bank->EnumByProject();
			
			$fechaHoy = date('d-m-Y');
			
			//Obtenemos el saldo actual
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$infA = $estimacionPayment->Info();
			$abonos = $estimacionPayment->GetTotalPagos();
			
			$saldo = $infA['total'] - $abonos;
						
			$info['fecha'] = $fechaHoy;
			$info['saldo'] = $saldo;
						
			$smarty->assign('infP', $infP);
			$smarty->assign('banks', $banks);
			$smarty->assign('info', $info);
			$smarty->assign('estimacionPaymentId', $estimacionPaymentId);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-est-pago-popup.tpl');
				
		break;	
	
	case 'saveAddPago':				
		
		$estimacionPaymentId = $_POST['estimacionPaymentId'];
		$bankId = $_POST['bankId'];
		$quantity = $_POST['quantity'];
		
		$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
		$info = $estimacionPayment->Info();
		
		if($_POST['fecha'])
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		$estimacionPayment->setProjectId($info['projectId']);
		$estimacionPayment->setEstimacionId($info['estimacionId']);
		$estimacionPayment->setSupplierId($info['supplierId']);
		$estimacionPayment->setBankId($bankId);
		$estimacionPayment->setQuantity($quantity);
		$estimacionPayment->setFecha($fecha);
		$estimacionPayment->setNoCheque($_POST['noCheque']);
		$estimacionPayment->setNoInvoice($_POST['noInvoice']);
		
		//Obtenemos los abonos realizados
		$abonos = $estimacionPayment->GetTotalPagos();
		$saldo = $info['total'] - $abonos;
		
		if($quantity > $saldo){
			$util->setError(11011, 'error', '', '');
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		}
		
		if(!$estimacionPayment->SavePago())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{	
			/*	
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($bankId);
			$bank->setQuantity($quantity);
			$bank->AddQuantity();
			*/
			
			//Checamos si ya esta pagado totalmente
			$abonos = $estimacionPayment->GetTotalPagos();
			$saldo = $info['total'] - $abonos;		
			$pagado = ($saldo == 0) ? 1:0;		
			
			//Actualizamos el status a Pagado
			if($pagado){
				$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
				$estimacionPayment->setPagado(1);
				$estimacionPayment->UpdatePagado();
				
				if($info['tipo'] == 'N'){				
					$estimacion->setEstimacionId($info['estimacionId']);
					$estimacion->setStatus('Completo');
					$estimacion->UpdateStatus();
				}
			}
			
			echo 'ok[#]';
			echo $estimacionPaymentId;
			
			echo '[#]';
			echo '$'.number_format($abonos,2);
			
			echo '[#]';
			echo '$'.number_format($saldo,2);
			
			echo '[#]';
			echo $pagado;
									
			echo '[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo '[#]';			
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$resPagos = $estimacionPayment->EnumPagos();
			
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
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-pagos.tpl');
		}		
		
		break;
	
	case 'deletePago':			
		
		$estimacionPagoId = $_POST['id'];
		$estimacionPayment->setEstimacionPagoId($estimacionPagoId);				
		
		$infP = $estimacionPayment->InfoPago();
		$estimacionPaymentId = $infP['estimacionPaymentId'];
				
		if(!$estimacionPayment->DeletePago())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			/*
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($infP['bankId']);
			$bank->setQuantity($infP['quantity']);
			$bank->RemoveQuantity();
			*/
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$info = $estimacionPayment->Info();
			
			//Quitamos el status de Pagado
			$estimacionPayment->setPagado(0);
			$estimacionPayment->UpdatePagado();
			
			if($infP['tipo'] == 'N'){
						
				//Actualizamos el status a Proceso de la Estimacion
				$estimacion->setEstimacionId($info['estimacionId']);
				$estimacion->setStatus('Proceso');
				$estimacion->UpdateStatus();
			
			}
			
			//Obtenemos los abonos realizados
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$abonos = $estimacionPayment->GetTotalPagos();
			
			$saldo = $info['total'] - $abonos;
			
			echo 'ok[#]';
			echo $estimacionPaymentId;
			
			echo '[#]';
			echo '$'.number_format($abonos,2);
			
			echo '[#]';
			echo '$'.number_format($saldo,2);
						
			echo '[#]';		
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo '[#]';			
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$resPagos = $estimacionPayment->EnumPagos();
			
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
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-pagos.tpl');
		}		
		
		break;
	
	/******************/
	
	case 'deletePayment':
				
		$estimacionPaymentId = $_POST['id'];
		
		$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);	
		$info = $estimacionPayment->Info();
		
		$estimacionId = $info['estimacionId'];
		$tipo = $info['tipo'];
								
		if(!$estimacionPayment->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{	
			if($tipo == 'N'){
					
				//Actualizamos el status a Pendiente de la Estimacion
				$estimacion->setEstimacionId($estimacionId);
				$estimacion->setStatus('Pendiente');
				$estimacion->UpdateStatus();
			
			}
			
			//Save History Data
			$user->setModule('Estimacion Pagos');
			$user->setAction('Eliminar');
			$user->setItemId($estimacionPaymentId);
			$user->SaveHistory();
				
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			if($tipo == 'N')
				$stE = $_SESSION['stEP'];
			else
				$stE = $_SESSION['stER'];
			
			$estimacionPayment->setProjectId($projectId);
			$estimacionPayment->setTipo($tipo);	
			$result = $estimacionPayment->EnumRevisado($stE);
				
			$payments = array();
			foreach($result as $res){
				$card = $res;
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
				
				$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
				$card['abonos'] = $estimacionPayment->GetTotalPagos();
				
				$saldo = $card['total'] - $card['abonos'];
				$card['saldo'] = number_format($saldo,2);
				
				$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
				$resPagos = $estimacionPayment->EnumPagos();
				
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
				
				//Detalles de la Estimacion
				
				$estimacion->setEstimacionId($res['estimacionId']);
				$infE = $estimacion->Info();
				
				$concept->setConceptId($infE['conceptId']);
				$infC = $concept->Info();
				$card['concept'] = $infC['name'];
				$card['steel'] = $infC['steel'];
				
				/***/
				
				if($infC['steel']){			
					$estLevel->setEstimacionId($res['estimacionId']);
					$resItems = $estLevel->EnumerateAll();				
				}else{
					$estItem->setEstimacionId($res['estimacionId']);
					$resItems = $estItem->EnumAllGroup();
				}
				
				$torres = array();
				foreach($resItems as $resI){
					$cardI = $resI;
					
					$projItem->setProjItemId($resI['projItemId']);								
					$cardI['name'] = $projItem->GetNameById();
					
					$estItem->setProjItemId($resI['projItemId']);
					$resLevels = $estItem->EnumLevelsByItem();
					
					$areas = array();
					foreach($resLevels as $lev){
						$cardL = $lev;
											
						$estDepto->setEstimacionId($res['estimacionId']);
						$estDepto->setEstItemId($lev['estItemId']);
						$resAreas = $estDepto->EnumAreasByItem();
											
						$areas = array();
						foreach($resAreas as $res2){
							$cardA = $res2;
							
							$projDepto->setProjDeptoId($res2['projDeptoId']);
							$cardA['name'] = $projDepto->GetNameById();
												
							$areas[] = $cardA;
						}									
						
						$cardI['areas'] = $areas;												
						
					}//foreach
					
					$torres[] = $cardI;
					
				}//foreach
				$card['torres'] = $torres;
				
				$projType->setProjTypeId($infE['projTypeId']);
				$card['type'] = $projType->GetNameById();
					
				/***/	
				
				$payments[] = $card;
			}
			
			$smarty->assign('payments',$payments);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-payment.tpl');
		}
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stEP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'doRefreshRet':
			
			$_SESSION['stER'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'confirmRevisado':
			
			$estimacionPaymentId = $_POST['id'];
			
			$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
			$info = $estimacionPayment->Info();
			$tipo = $info['tipo'];
			
			$estimacionPayment->setRevisado(1);
			
			if(!$estimacionPayment->UpdateRevisado())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				//Save History Data
				$user->setModule('Estimacion Pagos');
				$user->setAction('Confirmar Revisado');
				$user->setItemId($estimacionPaymentId);
				$user->SaveHistory();			
			
				$util->setError(11023,'complete');
				$util->PrintErrors();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				if($tipo == 'N')
					$stE = $_SESSION['stEP'];
				else
					$stE = $_SESSION['stER'];
				
				$estimacionPayment->setProjectId($projectId);
				$estimacionPayment->setTipo($tipo);
				$result = $estimacionPayment->EnumRevisado($stE);
				
				$payments = array();
				foreach($result as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
					
					$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
					$card['abonos'] = $estimacionPayment->GetTotalPagos();
					
					$saldo = $card['total'] - $card['abonos'];
					$card['saldo'] = number_format($saldo,2);
					
					$estimacionPayment->setEstimacionPaymentId($res['estimacionPaymentId']);
					$resPagos = $estimacionPayment->EnumPagos();
					
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
					
					//Detalles de la Estimacion
					
					$estimacion->setEstimacionId($res['estimacionId']);
					$infE = $estimacion->Info();
					
					$concept->setConceptId($infE['conceptId']);
					$infC = $concept->Info();
					$card['concept'] = $infC['name'];
					$card['steel'] = $infC['steel'];
					
					/***/
					
					if($infC['steel']){			
						$estLevel->setEstimacionId($res['estimacionId']);
						$resItems = $estLevel->EnumerateAll();				
					}else{
						$estItem->setEstimacionId($res['estimacionId']);
						$resItems = $estItem->EnumAllGroup();
					}
					
					$torres = array();
					foreach($resItems as $resI){
						$cardI = $resI;
						
						$projItem->setProjItemId($resI['projItemId']);								
						$cardI['name'] = $projItem->GetNameById();
						
						$estItem->setProjItemId($resI['projItemId']);
						$resLevels = $estItem->EnumLevelsByItem();
						
						$areas = array();
						foreach($resLevels as $lev){
							$cardL = $lev;
												
							$estDepto->setEstimacionId($res['estimacionId']);
							$estDepto->setEstItemId($lev['estItemId']);
							$resAreas = $estDepto->EnumAreasByItem();
												
							$areas = array();
							foreach($resAreas as $res2){
								$cardA = $res2;
								
								$projDepto->setProjDeptoId($res2['projDeptoId']);
								$cardA['name'] = $projDepto->GetNameById();
													
								$areas[] = $cardA;
							}									
							
							$cardI['areas'] = $areas;												
							
						}//foreach
						
						$torres[] = $cardI;
						
					}//foreach
					$card['torres'] = $torres;
					
					$projType->setProjTypeId($infE['projTypeId']);
					$card['type'] = $projType->GetNameById();
						
					/***/	
					
					$payments[] = $card;
				}
				
				$smarty->assign('payments',$payments);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/estimacion-payment.tpl');
			}
			
		break;
		
	
}

?>
