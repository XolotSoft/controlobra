<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['edpP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{	case 'addPago': 
			
			$estimacionPaymentId = $_POST['estimacionPaymentId'];
			
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
		$tipo = $_POST['tipo'];
		$noCheque = $_POST['noCheque'];
		$tipo = $_POST['tipo'];
		
		$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
		$info = $estimacionPayment->Info();
		
		if($_POST['fecha'])
			$fecha = date('Y-m-d',strtotime($_POST['fecha']));
		
		if($tipo != 'Cheque')
			$noCheque = '';
		
		$estimacionPayment->setProjectId($info['projectId']);
		$estimacionPayment->setEstimacionId($info['estimacionId']);
		$estimacionPayment->setSupplierId($info['supplierId']);
		$estimacionPayment->setBankId($bankId);
		$estimacionPayment->setQuantity($quantity);
		$estimacionPayment->setFecha($fecha);
		$estimacionPayment->setNoCheque($noCheque);
		$estimacionPayment->setTipo($tipo);
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
		
		$estimacionPagoId = $estimacionPayment->SavePago();
		
		if(!$estimacionPagoId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{	
			//Save History Data
			$user->setModule('Estimacion Ejecucion Pagos');
			$user->setAction('Agregar');
			$user->setItemId($estimacionPagoId);
			$user->SaveHistory();
				
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($bankId);
			$bank->setQuantity($quantity);
			$bank->AddQuantity();
						
			$bank->setBankId($bankId);
			if($tipo == 'Cheque')
				$bank->UpdateNextNoCheque();
			
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
			
			echo '[#]';
			echo $tipo;
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
			//Save History Data
			$user->setModule('Estimacion Ejecucion Pagos');
			$user->setAction('Eliminar');
			$user->setItemId($estimacionPagoId);
			$user->SaveHistory();
			
			//Actualizamos el Saldo en la Cuenta Bancaria
			$bank->setBankId($infP['bankId']);
			$bank->setQuantity($infP['quantity']);
			$bank->RemoveQuantity();
			
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
	
	case 'cancelPago':
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
			$info['fecha'] = date('d-m-Y',strtotime($info['fecha']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = $bank->GetCuentaById();
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cancel-estimacion-pago-popup.tpl');
				
		break;
	
	case 'saveCancelPago':			
		
			$estimacionPagoId = $_POST['estimacionPagoId'];
			$obsCancel = $_POST['obs'];
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);			
			$infP = $estimacionPayment->InfoPago();
			$estimacionPaymentId = $infP['estimacionPaymentId'];
			
			$estimacionPayment->setObsCancel($obsCancel);
			$estimacionPayment->setFecha(date('Y-m-d'));
					
			if(!$estimacionPayment->CancelPago())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data
				$user->setModule('Estimacion Ejecucion Pagos');
				$user->setAction('Cancelar');
				$user->setItemId($estimacionPagoId);
				$user->SaveHistory();
			
				//Actualizamos el Saldo en la Cuenta Bancaria
				$bank->setBankId($infP['bankId']);
				$bank->setQuantity($infP['quantity']);
				$bank->RemoveQuantity();
				
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
	
	case 'detailsPago':
			
			$estimacionPagoId = $_POST['estimacionPagoId'];
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
			$info = $estimacionPayment->InfoPago();
			
			$info['fecha'] = date('d-m-Y',strtotime($info['fecha']));
			$info['fechaCancel'] = date('d-m-Y',strtotime($info['fechaCancel']));
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = utf8_encode($bank->GetCuentaById());
			
			$info['obsCancel'] = nl2br(utf8_encode($info['obsCancel']));
			
			$info['seccion'] = 'E';
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-estimacion-pago-popup.tpl');
				
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
		
		$estimacionPayment->setEstimacionPaymentId($_POST['id']);	
		$info = $estimacionPayment->Info();
		
		$estimacionId = $info['estimacionId'];
										
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
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stEdoP = $_SESSION['stEdoP'];
			$stTipo = $_SESSION['stTipo'];
			
			$estimacionPayment->setProjectId($projectId);
			$estimacionPayment->setTipo($stTipo);
			$result = $estimacionPayment->Enumerate($stEdoP);
			
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
					$resItems = $estItem->EnumerateAll();
				}
				
				$items = array();
				$torres = array();
				foreach($resItems as $resI){
					$cardI = $resI;
					
					$projItem->setProjItemId($resI['projItemId']);
					$name = $projItem->GetNameById();
					
					$projLevel->setProjLevelId($resI['projLevelId']);
					$cardI['level'] = $projLevel->GetLevelById();
					
					$projLevel->setProjLevelId($resI['projLevelId2']);
					$cardI['level2'] = $projLevel->GetLevelById();
					
					$cardI['name'] = $name;
					$items[] = $name;
					
					$torres[] = $cardI;
				}
								
				$card['torre'] = implode(', ',$items);
				$card['torres'] = $torres;
				
				$projType->setProjTypeId($infE['projTypeId']);
				$card['type'] = $projType->GetNameById();
					
				/***/	
				
				$payments[] = $card;
			}
			
			$smarty->assign('payments', $payments);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/estimacion-dopayment.tpl');
		
		}
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stEdoP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'doRefreshTipo':
			
			$_SESSION['stTipo'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'doRefreshRet':
			
			$_SESSION['stER'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	case 'addPagoMasivo': 
				$Check=$_POST['checkid'];
				$bank->setProjectId($projectId);
				$banks = $bank->EnumByProject();
				$banks = $util->EncodeResult($banks);
				
				
				$saldo=0;
				$x=0;
				 
				foreach($_POST['checkid'] as $key=>$valor){
				 	$a[$key]['u']=$valor;
					$a[$key]['o']=$_POST['txtSaldo_'.$valor];
					$datos[$key]=$_POST['txtSaldo_'.$valor];
					 $ids .= $valor.",";
					 $abonos=$abonos+$datos[$key];
					 $abonoss.=$abonos.",";
					// $fechaHoy = date('d-m-Y');
				}
			   /* print_r ($fechaHoy); */ 
			$fechaHoy = date('d-m-Y');
			$id['estimacionpaymenid']=$ids; 
			$info['projectid']=$infP;
			$info['fecha']=$fechaHoy;
			$info['saldo'] = $abonos;
			
			$smarty->assign('banks', $banks);
			$smarty->assign('recibe',$recibe);
			$smarty->assign('id',$id);
			$smarty->assign('info', $info);
			$smarty->assign("abonoss",$abonoss);
			$smarty->assign("abonos",$abonos);
     			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-est-pagoMasivo-popup.tpl');
			 
			break;			
				
	case 'savePerfompayment':
				
				
				$estPayIds = $_POST['estPayIds'];
				$arregloIds = explode(',',$estPayIds);
				 
				foreach($arregloIds as $estimacionPaymentId){
					$bankId=$_POST['bankId'];
					$quantity=$_POST['quantity'];
					$tipo=$_POST['tipo'];
					$noCheque=$_POST['noCheque'];
					$tipo=$_POST['tipo'];
					
					$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
					$info = $estimacionPayment->Info();
					$saldo = $infA['total'] - $abonos;
			
				/* 	$fechaHoy = date('d-m-Y');						
					$info['fecha'] = $fechaHoy;
 */
					
					if($_POST['fecha']){
						$fecha = date('Y-m-d',strtotime($_POST['fecha']));
					}
					
					if($tipo != 'Cheque')
						$noCheque = '';
					
					$abonos = $estimacionPayment->GetTotalPagos();
					$saldo = $info['total'] - $abonos;
					
					$estimacionPayment->setProjectId($info['projectId']);
					$estimacionPayment->setEstimacionId($info['estimacionId']);
					$estimacionPayment->setSupplierId($info['supplierId']);
					$estimacionPayment->setBankId($bankId);
					$estimacionPayment->setQuantity($saldo);
					$estimacionPayment->setFecha($_POST['fecha']);
					$estimacionPayment->setNoCheque($noCheque);
					$estimacionPayment->setTipo($tipo);
					$estimacionPayment->setNoInvoice($_POST['noInvoice']);
				/* 	  print_r('somos los idestimacion'.$estPayIds);   */
					//Obtenemos los abonos realizados
					/* $abonos = $estimacionPayment->GetTotalPagos();
					$saldo = $info['total'] - $abonos; */
					
				
					
					$estimacionPagoId = $estimacionPayment->SavePago();
					
					if(!$estimacionPagoId)
					{
						echo 'fail[#]';
						$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
					}
					else
					{	
						//Save History Data
						$user->setModule('Estimacion Ejecucion Pagos');
						$user->setAction('Agregar');
						$user->setItemId($estimacionPagoId);
						$user->SaveHistory();
							
						//Actualizamos el Saldo en la Cuenta Bancaria
						$bank->setBankId($bankId);
						$bank->setQuantity($saldo);
						$bank->AddQuantity();
									
						$bank->setBankId($bankId);
						if($tipo == 'Cheque')
							$bank->UpdateNextNoCheque();
						
						//Checamos si ya esta pagado totalmente
						$abonos = $estimacionPayment->GetTotalPagos();
						$saldo = $info['total'] - $abonos;		
						/* print_r ($abonos);  */
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
												
						echo 'ok[#]';	
						
						$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
						
						echo '[#]';			
						$estimacionPayment->setEstimacionPaymentId($estimacionPaymentId);
						$resPagos = $estimacionPayment->EnumPagos();
						
                      }		
					  }					  
					  	echo 'ok[#]';		
						$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
							break;	
		
				 
				  					
			}	
				
?>
