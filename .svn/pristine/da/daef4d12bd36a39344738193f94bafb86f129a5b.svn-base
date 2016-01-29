<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['contP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{
	case 'addContract': 
		
			if(!$projectId){			
				$util->setError(10024, 'error', '', $field);
				$util->PrintErrors();
				
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;		  
			}
			
			$_SESSION['expiries'] = array();
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			//Obtenemos las Torres
			$project->setProjectId($projectId);
			$items = $project->EnumItem();
			if($items)
				$items = $util->EncodeResult($items);
			
			//Obtenemos los Clientes
			$customers = $customer->EnumerateAll();
			$customers = $util->EncodeResult($customers);
												
			//Obtenemos los Montos de Manto. y Equip.
			$projMant->setProjectId($projectId);
			$projMants = $projMant->Enumerate();
			
			$projEquip->setProjectId($projectId);
			$projEquips = $projEquip->Enumerate();
			
			echo 'ok[#]';
			
			$smarty->assign('infP', $infP);
			$smarty->assign('items', $items);
			$smarty->assign('customers', $customers);
			$smarty->assign('projMants', $projMants);
			$smarty->assign('projEquips', $projEquips);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-contract-popup.tpl');
				
		break;
	
	case 'editContract':
		
			$contractId = $_POST['id'];
			
			$contract->setContractId($contractId);
			$info = $contract->Info();		
			$info = $util->EncodeRow($info);
			
			if($info['fechaIniCont'])
				$info['fechaIniCont'] = $util->FormatDateUnixDMMMY($info['fechaIniCont']);
			if($info['fechaIniPagos'])
				$info['fechaIniPagos'] = $util->FormatDateUnixDMMMY($info['fechaIniPagos']);
			
			$info['totalF'] = number_format($info['total'],2);
						
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
				
			//Obtenemos las Torres
			$project->setProjectId($projectId);
			$items = $project->EnumItem();
			if($items)
				$items = $util->EncodeResult($items);
			
			//Obtenemos las Areas
			$projDepto->setProjectId($projectId);
			$projDepto->setProjItemId($info['projItemId']);
			$areas = $projDepto->EnumAllVendibleByItem();
			$areas = $util->EncodeResult($areas);
			
			//Obtenemos los Clientes
			$customers = $customer->EnumerateAll();
			$customers = $util->EncodeResult($customers);
			
			//Obtenemos los Cajones
			
			$contract->setContractId($contractId);
			$resCajones = $contract->EnumCajones();
					
			if(!count($resCajones))
				$resCajones = array();
			
			$enumCajones = array();			
			foreach($resCajones as $val){				
				$card['projCajonId'] = $val['projCajonId'];
				
				$enumCajones[] = $card;
			}
			
			$_SESSION['enumCajones'] = $enumCajones;
			
			$projCajon->setProjectId($projectId);
			$resCajones = $projCajon->EnumerateAll();
			
			$cajones = array();
			foreach($resCajones as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				if($contractId)
					$contract->setContractId($contractId);
				
				$contract->setProjCajonId($res['projCajonId']);
				if(!$contract->ExistCajon())
					$cajones[] = $card;
			}
						
			//Obtenemos las Bodegas
			
			$contract->setContractId($contractId);
			$resBodegas = $contract->EnumBodegas();
				
			if(!count($resBodegas))
				$resBodegas = array();
			
			$enumBodegas = array();			
			foreach($resBodegas as $val){				
				$card['projBodegaId'] = $val['projBodegaId'];
				
				$enumBodegas[] = $card;
			}
			
			$_SESSION['enumBodegas'] = $enumBodegas;
			
			$projBodega->setProjectId($projectId);			
			$resBodegas = $projBodega->EnumerateAll();
			
			$bodegas = array();
			foreach($resBodegas as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				if($contractId)
					$contract->setContractId($contractId);
				
				$contract->setProjBodegaId($res['projBodegaId']);
				
				if(!$contract->ExistBodega())
					$bodegas[] = $card;
			}
			
			//Obtenemos los Vencimientos
			
			$contract->setContractId($contractId);
			$resExpiry = $contract->EnumExpiry();
			
			if(!count($resExpiry))
				$resExpiry = array();
			
			$abono = 0;
			$expiries = array();
			foreach($resExpiry as $val){
				
				$k = $val['contExpiryId'];
				
				$val['date'] = strtotime($val['fecha']);
				$vFecha = date('d-m-Y',strtotime($val['fecha']));
				$val['fecha'] = $util->FormatDateUnixDMMMY($val['fecha']);
				
				if($val['noExpiry'] == 'Mantenimiento'){
					
					$info['projMantId'] = $val['mantEquipId'];					
					$info['fechaMant'] = $val['fecha'];
					$info['contExpIdMant'] = $k;
					
				}elseif($val['noExpiry'] == 'Equipamiento'){
					
					$info['projEquipId'] = $val['mantEquipId'];					
					$info['fechaEquip'] = $val['fecha'];
					$info['contExpIdEquip'] = $k;
					
				}elseif($val['noExpiry'] == 'Enganche'){
					
					$info['montoEng'] = $val['monto'];
					$info['fechaEng'] = $val['fecha'];
					$info['contExpIdEng'] = $k;
					
				}else{				
				
					$abono += $val['monto'];
					
					$val['monto'] = number_format($val['monto'],2);				
					$expiries[$k] = $val;
					
				}
				
			}
			
			$_SESSION['expiries'] = $expiries;
			
			$saldoFinal = $info['total'] - $info['montoEng'] - $abono;
			$info['saldoFinal'] = number_format($saldoFinal,2);
			
			//Obtenemos los Montos de Manto. y Equip.
			$projMant->setProjectId($projectId);
			$projMants = $projMant->Enumerate();
			
			$projEquip->setProjectId($projectId);
			$projEquips = $projEquip->Enumerate();
			
			$info['montoEng'] = number_format($info['montoEng'],2);
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('items', $items);
			$smarty->assign('areas', $areas);
			$smarty->assign('expiries', $expiries);
			$smarty->assign('customers', $customers);
			$smarty->assign('enumBodegas', $enumBodegas);
			$smarty->assign('bodegas', $bodegas);
			$smarty->assign('enumCajones', $enumCajones);
			$smarty->assign('cajones', $cajones);
			$smarty->assign('projMants', $projMants);
			$smarty->assign('projEquips', $projEquips);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-contract-popup.tpl');
			
		break;
	
	case 'cancelContract':
		
			$contractId = $_POST['id'];
			
			$_SESSION['canContId'] = $contractId;
			$_SESSION['cheques'] = array();
			
			$contract->setContractId($contractId);
			$info = $contract->Info();		
			$info = $util->EncodeRow($info);
			
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			//Obtenemos los Contratos
			$contract->setContractId($contractId);
			$contract->setCustomerId($info['customerId']);
			$contracts = $contract->EnumAllForTransfer();
			
			//Obtenemos todos los pagos realizados
			$contPayment->setContractId($contractId);
			$totalPayment = $contPayment->GetTotalPayment();
			$info['totalPayment'] = number_format($totalPayment,2);
			$info['totalPay'] = number_format($totalPayment,2,'.','');
			
			//Obtenemos las Cuentas Bancarias
			$bank->setProjectId($projectId);
			$bank->setCurrency($info['currency']);
			$banks = $bank->EnumByProjCurrency();
			$banks = $util->EncodeResult($banks);
			
			if(count($banks) == 1)
				$info['bankId'] = $banks[0]['bankId'];			
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('banks', $banks);
			$smarty->assign('contracts', $contracts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/cancel-contract-popup.tpl');
			
		break;
	
	case 'viewCancelContract':
		
			$contractId = $_POST['id'];
			
			$contract->setContractId($contractId);
			$info = $contract->InfoCancel();		
			$info = $util->EncodeRow($info);
						
			//Obtenemos la Informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$info['total'] = number_format($info['total'],2);
			$info['qtyCheque'] = number_format($info['qtyCheque'],2);
			$info['qtyTraspaso'] = number_format($info['qtyTraspaso'],2);
			
			$contract->setContractId($info['contractId']);
			$infC = $contract->Info();
			
			$info['noContract'] = $infC['noContract'];
			$info['currency'] = $infC['currency'];
			
			//Contrato Destino
			$contract->setContractId($info['contractId2']);
			$infC = $contract->Info();
			
			$info['noContractD'] = $infC['noContract'];
			$info['currencyD'] = $infC['currency'];
			
			$bank->setBankId($info['bankId']);
			$info['bank'] = $bank->GetCuentaById();
			
			$info['details'] = nl2br($info['details']);
			
			$contPayment->setContractId($info['contractId']);
			$resCheques = $contPayment->EnumCheques();
			
			$cheques = array();
			foreach($resCheques as $res){
				$card = $res;
				
				$bank->setBankId($res['bankId']);
				$card['bank'] = $bank->GetCuentaById();
				
				$card['quantity'] = number_format($res['quantity'],2);
				
				$cheques[] = $card;
			}
			
			$smarty->assign('cheques', $cheques);
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-cancel-contract-popup.tpl');
			
		break;
	
	case 'saveAddContract':
			
			$tipoClte = $_POST['tipoClte'];			
			$fechaIniCont = $_POST['fechaIniCont'];
			$fechaIniPagos = $_POST['fechaIniPagos'];
											
			$montoEng = $util->RemoveFormat($_POST['montoEng']);
			$fechaEng = $_POST['fechaEng'];
			
			$projMantId = $_POST['projMantId'];
			$fechaMant = $_POST['fechaMant'];
						
			$projEquipId = $_POST['projEquipId'];
			$fechaEquip = $_POST['fechaEquip'];
			
			$contract->setProjectId($_POST['projectId']);
			$contract->setNoContract($_POST['noContract']);
			$contract->setTipoClte($tipoClte);
			$contract->setProjItemId($_POST['projItemId']);
			$contract->setProjLevelId($_POST['projLevelId']);
			$contract->setProjDeptoId($_POST['projDeptoId']);
			$contract->setTotal($util->RemoveFormat($_POST['total']));
			$contract->setAbono($_POST['abono']);
			$contract->setSaldo($_POST['saldo']);			
			$contract->setNoTerrazas($_POST['noTerrazas']);			
			$contract->setJardines($_POST['jardines']);
			$contract->setCustomerId($_POST['customerId']);
			$contract->setCurrency($_POST['currency']);
			$contract->setPriceM2($_POST['priceM2']);
			$contract->setM2Depto($_POST['m2Depto']);
			$contract->setNoCajones($_POST['noCajones']);
			$contract->setNoBodegas($_POST['noBodegas']);
			$contract->setObs($_POST['notas']);
			$contract->setStatus('Activo');
						
			$projCajones = $_POST['projCajonId'];
			$projBodegas = $_POST['projBodegaId'];
			
			$noExpiry = $_POST['noExpiry'];
			$monto = $_POST['monto'];
			$fecha = $_POST['fecha'];
			$obs = $_POST['obs'];
			
			if($fechaIniCont)
				$fechaIniCont = $util->FormatDateYMMD($fechaIniCont);
			
			if($fechaIniPagos)
				$fechaIniPagos = $util->FormatDateYMMD($fechaIniPagos);
			
			$contract->setFechaIniCont($fechaIniCont);
			$contract->setFechaIniPagos($fechaIniPagos);
			
			if($contract->ExistDepto()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			//CAJONES
			
			if(!count($projCajones))
				$projCajones = array();
			
			$continue = true;			
			$cajIds = array();
			foreach($projCajones as $k => $projCajonId){
								
				$contract->setProjCajonId($projCajonId);
				if(!$contract->SaveTemp()){
					$continue = false;
				}
				
				$cajIds[] = $projCajonId;				
			}
			$idsUniques = array_unique($cajIds);
			
			if($continue){				
				//Buscamos Cajones Repetidos				
				if(count($cajIds) > count($idsUniques)){												
					$util->setError(11005, 'error', '');
					$util->PrintErrors();
					$continue = false;
				}				
			}
			
			if($continue){
				//Buscamos si existen Cajones ya seleccionados en otros contratos
				foreach($projCajones as $k => $projCajonId){
					$contract->setProjCajonId($projCajonId);
					if($contract->ExistCajon()){						
						$continue = false;
						break;
					}
				}
			}
			
			//BODEGAS
						
			if(!count($projBodegas))
				$projBodegas = array();
						
			$bodIds = array();
			foreach($projBodegas as $k => $projBodegaId){
								
				$contract->setProjBodegaId($projBodegaId);
				if(!$contract->SaveTemp()){
					$continue = false;
				}
				
				$bodIds[] = $projBodegaId;				
			}
			
			$idsUniques = array_unique($bodIds);
						
			if($continue){				
				//Buscamos Bodegas Repetidos				
				if(count($bodIds) > count($idsUniques)){												
					$util->setError(11007, 'error', '');
					$util->PrintErrors();
					$continue = false;
				}				
			}
			
			if($continue){
				//Buscamos si existen Bodegas ya seleccionados en otros contratos
				foreach($projBodegas as $k => $projBodegaId){
					$contract->setProjBodegaId($projBodegaId);
					if($contract->ExistBodega()){						
						$continue = false;
						break;
					}
				}
			}
			
			//ENGANCHE, MANTENIMIENTO Y EQUIPAMIENTO
			
			$contract->setMontoEng($montoEng);
			$contract->setFechaEng($fechaEng);
				
			if($tipoClte != 'Accionista'){			
				
				$contract->setMontoMant($projMantId);
				$contract->setFechaMant($fechaMant);
				
				$contract->setMontoEquip($projEquipId);
				$contract->setFechaEquip($fechaEquip);
				
			}
			
			 if(!$contract->SaveTemp()){
				  $continue = false;
			  }
						
			//VENCIMIENTOS
			
			if($continue){
								
				if(!count($noExpiry))
					$noExpiry = array();
			  
			  $expiries = array();			
			  foreach($noExpiry as $k => $val){				
				  $card['noExpiry'] = $noExpiry[$k];
				  $card['monto'] = $util->RemoveFormat($monto[$k]);
				  $card['obs'] = $obs[$k];
				  $vFecha = $fecha[$k];
				  
				  if($vFecha)					
					$card['fecha'] = $util->FormatDateYMMD($vFecha);
									  
				  $contract->setNoExpiry($card['noExpiry']);				  
				  $contract->setFecha($card['fecha']);
				  
				  $card['mantEquipId'] = 0;
				  				  
				  $contract->setMonto($card['monto']);
				  
				  if(!$contract->SaveTemp()){
					  $continue = false;
				  }
				  
				  $expiries[$k] = $card;
			  }
			  
			  /*****/
			  			  
			  $card = array();
			  	  
			  $card['noExpiry'] = 'Enganche';
			  $card['monto'] = $montoEng;
			  $card['fecha'] = $util->FormatDateYMMD($fechaEng);
			  $card['mantEquipId'] = 0;
			  
			  $expiries[] = $card;
			  
			  $card = array();
			  
			  $card['noExpiry'] = 'Mantenimiento';
			  $projMant->setProjMantId($projMantId);
			  $infM = $projMant->Info();
		      $card['monto'] = $infM['quantity'];
			  $card['fecha'] = $util->FormatDateYMMD($fechaMant);
			  $card['mantEquipId'] = $projMantId;
			
			  $expiries[] = $card;
			  
			  $card = array();
			  		
			  $card['noExpiry'] = 'Equipamiento';
			  $projEquip->setProjEquipId($projEquipId);
			  $infE = $projEquip->Info();
			  $card['monto'] = $infE['quantity'];
			  $card['fecha'] = $util->FormatDateYMMD($fechaEquip);
			  $card['mantEquipId'] = $projEquipId;
									  
			  $expiries[] = $card;
			  			  
			  /*****/
			  
			}			
				
			if($continue)
				$contractId = $contract->Save();
						
			if(!$contractId)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Guardamos los Cajones de Estacionamiento
				foreach($projCajones as $k => $projCajonId){
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);
					$contract->setProjCajonId($projCajonId);
					
					$contract->SaveCajon();					
				}
				
				//Guardamos las Bodegas
				foreach($projBodegas as $k => $projBodegaId){
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);
					$contract->setProjBodegaId($projBodegaId);
					
					$contract->SaveBodega();					
				}
				
				//Guardamos los Vencimientos
				 foreach($expiries as $card){
					
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);					
					$contract->setNoExpiry($card['noExpiry']);
					$contract->setMonto($card['monto']);
					$contract->setFecha($card['fecha']);
					$contract->setObs($card['obs']);
					$contract->setMantEquipId($card['mantEquipId']);
					
					$contract->SaveExpiry();											
				}
				
				$_SESSION['enumCajones'] = '';
				unset($_SESSION['enumCajones']);
				
				$_SESSION['enumBodegas'] = '';
				unset($_SESSION['enumBodegas']);
				
				$_SESSION['expiries'] = '';
				unset($_SESSION['expiries']);
				
				//Save History Data			
				$user->setModule('Contratos');
				$user->setAction('Agregar');
				$user->setItemId($contractId);
				$user->SaveHistory();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contract->setProjectId($projectId);
				$contracts = $contract->Enumerate();				
				$result = $contracts['items'];
	
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
					
					$card['total'] = number_format($res['total'],2);
					$card['abono'] = number_format($res['abono'],2);
					
					//Obtenemos los Vencimientos

					//$contract->setContractId($res['contractId']);
					//$infE = $contract->GetEnganche();
							
					//Pagos Anteriores
					$contPayment->setContractId($res['contractId']);
					$resPayments = $contPayment->GetPayments();
										
					$pagosAnt = 0;
					foreach($resPayments as $val){
						$pagosAnt += $val['quantity'];
					}
					$card['pagos'] = number_format($pagosAnt,2);
					
					$saldo = $res['total'] - $infE['monto'] - $pagosAnt;
					
					$card['saldo'] = number_format($saldo,2);
					
					$items[] = $card;
				}
				$contracts['items'] = $items;
				
				$smarty->assign('contracts', $contracts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract.tpl');
			}	
			
		break;
	
	case 'saveEditContract':
			
			$contractId = $_POST['contractId'];
			$tipoClte = $_POST['tipoClte'];
			$fechaIniCont = $_POST['fechaIniCont'];
			$fechaIniPagos = $_POST['fechaIniPagos'];
			
			$montoEng = $util->RemoveFormat($_POST['montoEng']);
			$fechaEng = $_POST['fechaEng'];
			$contExpIdEng = $_POST['contExpIdEng'];
			
			$projMantId = $_POST['projMantId'];
			$fechaMant = $_POST['fechaMant'];
			$contExpIdMant = $_POST['contExpIdMant'];
						
			$projEquipId = $_POST['projEquipId'];
			$fechaEquip = $_POST['fechaEquip'];
			$contExpIdEquip = $_POST['contExpIdEquip'];
			
			$contract->setContractId($contractId);	
			$contract->setProjectId($_POST['projectId']);
			$contract->setNoContract($_POST['noContract']);
			$contract->setTipoClte($tipoClte);
			$contract->setProjItemId($_POST['projItemId']);
			$contract->setProjLevelId($_POST['projLevelId']);
			$contract->setProjDeptoId($_POST['projDeptoId']);
			$contract->setTotal($util->RemoveFormat($_POST['total']));
			$contract->setAbono($_POST['abono']);
			$contract->setSaldo($_POST['saldo']);			
			$contract->setNoTerrazas($_POST['noTerrazas']);			
			$contract->setJardines($_POST['jardines']);
			$contract->setCustomerId($_POST['customerId']);
			$contract->setCurrency($_POST['currency']);
			$contract->setPriceM2($_POST['priceM2']);
			$contract->setM2Depto($_POST['m2Depto']);
			$contract->setNoCajones($_POST['noCajones']);
			$contract->setNoBodegas($_POST['noBodegas']);
			$contract->setObs($_POST['notas']);
			
			$projCajones = $_POST['projCajonId'];
			$projBodegas = $_POST['projBodegaId'];
			
			$noExpiry = $_POST['noExpiry'];
			$monto = $_POST['monto'];
			$fecha = $_POST['fecha'];
			$obs = $_POST['obs'];
			$expIds = $_POST['expIds'];
			
			if($fechaIniCont)
				$fechaIniCont = $util->FormatDateYMMD($fechaIniCont);
			
			if($fechaIniPagos)
				$fechaIniPagos = $util->FormatDateYMMD($fechaIniPagos);
			
			$contract->setFechaIniCont($fechaIniCont);
			$contract->setFechaIniPagos($fechaIniPagos);
			
			if($contract->ExistDepto()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			//CAJONES
			
			if(!count($projCajones))
				$projCajones = array();
			
			$continue = true;			
			$cajIds = array();
			foreach($projCajones as $k => $projCajonId){
								
				$contract->setProjCajonId($projCajonId);
				if(!$contract->SaveTemp()){
					$continue = false;
				}
				
				$cajIds[] = $projCajonId;				
			}
			$idsUniques = array_unique($cajIds);
			
			if($continue){				
				//Buscamos Cajones Repetidos				
				if(count($cajIds) > count($idsUniques)){												
					$util->setError(11005, 'error', '');
					$util->PrintErrors();
					$continue = false;
				}				
			}
			
			if($continue){
				//Buscamos si existen Cajones ya seleccionados en otros contratos
				foreach($projCajones as $k => $projCajonId){
					$contract->setProjCajonId($projCajonId);
					if($contract->ExistCajon()){						
						$continue = false;
						break;
					}
				}
			}
			
			//BODEGAS
			
			if(!count($projBodegas))
				$projBodegas = array();
						
			$bodIds = array();
			foreach($projBodegas as $k => $projBodegaId){
								
				$contract->setProjBodegaId($projBodegaId);
				if(!$contract->SaveTemp()){
					$continue = false;
				}
				
				$bodIds[] = $projBodegaId;				
			}
			
			$idsUniques = array_unique($bodIds);
						
			if($continue){				
				//Buscamos Bodegas Repetidos				
				if(count($bodIds) > count($idsUniques)){												
					$util->setError(11007, 'error', '');
					$util->PrintErrors();
					$continue = false;
				}				
			}
			
			if($continue){
				//Buscamos si existen Bodegas ya seleccionados en otros contratos
				foreach($projBodegas as $k => $projBodegaId){
					$contract->setProjBodegaId($projBodegaId);
					if($contract->ExistBodega()){						
						$continue = false;
						break;
					}
				}
			}
			
			//ENGANCHE, MANTENIMIENTO Y EQUIPAMIENTO
			
			$contract->setMontoEng($montoEng);
			$contract->setFechaEng($fechaEng);
				
			if($tipoClte != 'Accionista'){			
				
				$contract->setMontoMant($projMantId);
				$contract->setFechaMant($fechaMant);
				
				$contract->setMontoEquip($projEquipId);
				$contract->setFechaEquip($fechaEquip);
				
			}
			
			if(!$contract->SaveTemp()){
				$continue = false;
			}
			
			//VENCIMIENTOS
			
			if($continue){
				
			  if(!count($noExpiry))
			   	 $noExpiry = array();
			  
			  $idsExp = array();
			  $expiries = array();			
			  foreach($noExpiry as $k => $val){				
				  $card['noExpiry'] = $noExpiry[$k];
				  $card['monto'] = $util->RemoveFormat($monto[$k]);
				  $vFecha = $fecha[$k];
				  $card['contExpiryId'] = $expIds[$k];
				  $card['obs'] = $obs[$k];
				  
				  $idsExp[] = $card['contExpiryId'];
				  				  				  
				  if($vFecha)					
					$card['fecha'] = $util->FormatDateYMMD($vFecha);
				  
				  $card['mantEquipId'] = 0;
				 				  
				  $contract->setNoExpiry($card['noExpiry']);
				  $contract->setMonto($card['monto']);
				  $contract->setFecha($card['fecha']);
				  
				  if(!$contract->SaveTemp()){
					  $continue = false;
				  }
				  
				  $expiries[$k] = $card;
			  }
			 
			  /*****/
			  			  
			  $card = array();
			  	  
			  $card['noExpiry'] = 'Enganche';
			  $card['monto'] = $montoEng;
			  $card['fecha'] = $util->FormatDateYMMD($fechaEng);
			  $card['mantEquipId'] = 0;
			  $card['contExpiryId'] = $contExpIdEng;
			  $idsExp[] = $card['contExpiryId'];
			  
			  $expiries[] = $card;
			  
			  $card = array();
			  
			  $card['noExpiry'] = 'Mantenimiento';
			  $projMant->setProjMantId($projMantId);
			  $infM = $projMant->Info();
		      $card['monto'] = $infM['quantity'];
			  $card['fecha'] = $util->FormatDateYMMD($fechaMant);
			  $card['mantEquipId'] = $projMantId;
			  $card['contExpiryId'] = $contExpIdMant;
			  $idsExp[] = $card['contExpiryId'];
			
			  $expiries[] = $card;
			  
			  $card = array();
			  		
			  $card['noExpiry'] = 'Equipamiento';
			  $projEquip->setProjEquipId($projEquipId);
			  $infE = $projEquip->Info();
			  $card['monto'] = $infE['quantity'];
			  $card['fecha'] = $util->FormatDateYMMD($fechaEquip);
			  $card['mantEquipId'] = $projEquipId;
			  $card['contExpiryId'] = $contExpIdEquip;
			  $idsExp[] = $card['contExpiryId'];
									  
			  $expiries[] = $card;
			  	 	  
			  /*****/
			  
			}	
						
			if($continue)
				$contract->Update();
						
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				
				//Eliminamos los Cajones de Estacionamiento
				$contract->setContractId($contractId);
				$contract->DeleteCajones();
				
				//Guardamos los Cajones de Estacionamiento
				foreach($projCajones as $k => $projCajonId){
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);
					$contract->setProjCajonId($projCajonId);
					
					$contract->SaveCajon();					
				}
				
				//Eliminamos las Bodegas
				$contract->setContractId($contractId);
				$contract->DeleteBodegas();
				
				//Guardamos las Bodegas
				foreach($projBodegas as $k => $projBodegaId){
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);
					$contract->setProjBodegaId($projBodegaId);
					
					$contract->SaveBodega();					
				}
				
				//Eliminamos de la BD los vencimientos que fueron eliminados fisicamente
				
				$resExp = $contract->EnumExpiry();				
				foreach($resExp as $val){
					$contExpiryId = $val['contExpiryId'];
					
					if(!in_array($contExpiryId,$idsExp)){
						$contract->setContExpiryId($contExpiryId);
						$contract->DeleteExpiry();
					}
				}
				
				//Guardamos - Actualizamos los Vencimientos
				foreach($expiries as $card){
					
					$contract->setContExpiryId($card['contExpiryId']);
					$contract->setProjectId($projectId);
					$contract->setContractId($contractId);					
					$contract->setNoExpiry($card['noExpiry']);
					$contract->setMonto($card['monto']);
					$contract->setFecha($card['fecha']);
					$contract->setObs($card['obs']);
					$contract->setMantEquipId($card['mantEquipId']);
					
					if($card['contExpiryId'])
						$contract->UpdateExpiry();
					else
						$contract->SaveExpiry();					
				}
				
				$_SESSION['enumCajones'] = '';
				unset($_SESSION['enumCajones']);
				
				$_SESSION['enumBodegas'] = '';
				unset($_SESSION['enumBodegas']);
				
				$_SESSION['expiries'] = '';
				unset($_SESSION['expiries']);
				
				//Save History Data			
				$user->setModule('Contratos');
				$user->setAction('Editar');
				$user->setItemId($contractId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contract->setProjectId($projectId);
				$contracts = $contract->Enumerate();				
				$result = $contracts['items'];
	
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
					
					$card['total'] = number_format($res['total'],2);
					$card['abono'] = number_format($res['abono'],2);
					
					//Obtenemos los Vencimientos

					//$contract->setContractId($res['contractId']);
					//$infE = $contract->GetEnganche();
							
					//Pagos Anteriores
					$contPayment->setContractId($res['contractId']);
					$resPayments = $contPayment->GetPayments();
										
					$pagosAnt = 0;
					foreach($resPayments as $val){
						$pagosAnt += $val['quantity'];
					}
					$card['pagos'] = number_format($pagosAnt,2);
					
					$saldo = $res['total'] - $infE['monto'] - $pagosAnt;
					
					$card['saldo'] = number_format($saldo,2);
					
					$items[] = $card;
				}
				$contracts['items'] = $items;
				
				$smarty->assign('contracts', $contracts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract.tpl');
			}	
			
		break;
	
	case 'saveCancelContract':
			
			$qtyTraspaso = trim($_POST['qtyTraspaso']);
			$totalPayment = $_POST['totalPayment'];
			$totalNeto = $_POST['totalNeto'];
			$totalCurrency = $_POST['totalCurrency'];
			$details = $_POST['details'];
			$montoPena = $_POST['montoPena'];
			
			$contractId = $_POST['id'];
			$projectId = $_POST['projectId'];
			$contractId2 = $_POST['contractId'];
			
			$cheques = $_SESSION['cheques'];
			$noCheques = count($_SESSION['cheques']);
			
			//Cheques
			$banks = $_POST['banks'];
			$quantity = $_POST['quantity'];
			$noCheque = $_POST['noCheque'];
			
			if(!count($banks))
				$banks = array();
			
			$continue = true;
			
			if($montoPena > $totalPayment){
				
				$util->setError(11020, 'error', '', '');
				$util->PrintErrors();
				$continue = false;
			
			}elseif($qtyTraspaso == '' && $noCheques == 0){
				
				$util->setError(11012, 'error', '', '');
				$util->PrintErrors();
				$continue = false;
				
			}elseif($qtyTraspaso != '' || $noCheques > 0){
				
				if($noCheques){
					
					$qtyCheques = 0;
					$cheques = array();
					foreach($banks as $k => $res){
						$card['bankId'] = $banks[$k];
						$card['quantity'] = $quantity[$k];
						$card['noCheque'] = $noCheque[$k];
												
						$qtyCheques += $quantity[$k];
						
						$cheques[] = $card;
					}
				
				}
								
				$totalDev = $qtyTraspaso + $qtyCheques;
												
				if($totalDev < $totalNeto){
				
					$util->setError(11014, 'error', '', '');
					$util->PrintErrors();
					$continue = false;
				
				}elseif($totalDev > $totalNeto){
					
					$util->setError(11015, 'error', '', '');
					$util->PrintErrors();
					$continue = false;
					
				}else{
					
					//Verificamos los Cheques
					foreach($cheques as $res){
						$contPayment->setBankId($res['bankId']);
						$contPayment->setQtyCheque($res['quantity']);
						$contPayment->setNoCheque($res['noCheque']);
						
						if(!$contPayment->SaveTemp()){
							$continue = false;
							break;
						}
					}
										
					if($qtyTraspaso != '' && $continue == true){
				
						$contract->setContractId($contractId);
						$infO = $contract->Info();				
						
						$projItem->setProjItemId($infO['projItemId']);
						$torre = $projItem->GetNameById();
						
						$projDepto->setProjDeptoId($infO['projDeptoId']);
						$depto = $projDepto->GetNameById();
						
						$contract->setContractId($contractId2);
						$infD = $contract->Info();
										
						$obs = 'Traspaso de Depósito por Cancelación de Depto. '.$depto;
						$obs .= ' de la Torre '.$torre.' (Contrato Cancelado)';
						
						$contPayment->setProjectId($projectId);
						$contPayment->setContractId2($contractId2);
						$contPayment->setCustomerId2($infD['customerId']);
						$contPayment->setProjItemId2($infD['projItemId']);
						$contPayment->setProjLevelId2($infD['projLevelId']);
						$contPayment->setProjDeptoId2($infD['projDeptoId']);
						$contPayment->setCurrency($_POST['currency']);
						$contPayment->setBankId($_POST['bankId']);
						$contPayment->setQuantity($qtyTraspaso);
						$contPayment->setFecha(date('Y-m-d'));
						$contPayment->setConcepto('Otros');
						$contPayment->setObservaciones($obs);
						
						$contPaymentId = $contPayment->Save();
						
						if(!$contPaymentId)
							$continue = false;
						
					}
					
								
				}//else
				
				//Guardamos el Pago
				if($continue){
					
					$contPayment->setContractId($contractId);
					$contPayment->setContract2Id($contractId2);				
					$contPayment->setQtyTraspaso($qtyTraspaso);
					$contPayment->setTotal($totalPayment);
					$contPayment->setTotalCurrency($totalCurrency);
					$contPayment->setObservaciones($details);
					$contPayment->setMontoPena($montoPena);
					$contPayment->setTotalNeto($totalNeto);
					
					$contCancelId = $contPayment->SaveTraspasos();
					
					//Guardamos los Cheques
					if($contCancelId){
						
						foreach($cheques as $res){
							$contPayment->setContractId($contractId);
							$contPayment->setContCancelId($contCancelId);
							$contPayment->setBankId($res['bankId']);
							$contPayment->setQtyCheque($res['quantity']);
							$contPayment->setNoCheque($res['noCheque']);
							
							$contPayment->SaveCheque();							
						}//foreach
											
					}//if
					
				}//if
				
			}//elseif
						
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
						
			$contract->setContractId($contractId);
					
			if(!$contract->Cancel())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				/*** GUARDAMOS EL PAGO ***/
										
				$quantity = $qtyTraspaso;
				
				$arrAbonos = array();
								
				//Obtenemos los Documentos
				$contract->setContractId($contractId2);
				$resDocs = $contract->GetDocs();
				
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
										
					$contPayment->setContExpiryId($res['contExpiryId']);
					$pagosDoc = $contPayment->GetTotalPagoByDoc();
					$saldoDoc = $monto - $pagosDoc;
					
					$monto = $saldoDoc;
											
					if($doc == 'Mantenimiento'){
						
						$mantAbono = 0;
						if($quantity > $monto){					
							$quantity -= $monto;
							$mantAbono = $monto;					
						}elseif($quantity <= $monto){					
							$monto -= $quantity;
							$mantAbono = $quantity;
							$quantity = 0;					
						}
											
						if($mantAbono){
							$inf['monto'] = $mantAbono;
							$inf['contExpiryId'] = $res['contExpiryId'];
							$arrAbonos[] = $inf;
						}
						
					}
					
					if($doc == 'Equipamiento'){
						
						$equipAbono = 0;
						if($quantity > $monto){					
							$quantity -= $monto;
							$equipAbono = $monto;					
						}elseif($quantity <= $monto){					
							$monto -= $quantity;
							$equipAbono = $quantity;
							$quantity = 0;					
						}
											
						if($equipAbono){
							$inf['monto'] = $equipAbono;
							$inf['contExpiryId'] = $res['contExpiryId'];
							$arrAbonos[] = $inf;
						}
					}
					
					if($doc != 'Mantenimiento' && $doc != 'Equipamiento'){
						
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
																					
							if($abonoVen){
								$inf['monto'] = $abonoVen;
								$inf['contExpiryId'] = $res['contExpiryId'];
								$arrAbonos[] = $inf;
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
																					
							if($abonoVig){
								$inf['monto'] = $abonoVig;
								$inf['contExpiryId'] = $res['contExpiryId'];
								$arrAbonos[] = $inf;
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
																					
							if($abonoFut){
								$inf['monto'] = $abonoFut;
								$inf['contExpiryId'] = $res['contExpiryId'];
								$arrAbonos[] = $inf;
							}
							
						}
					}
									
				}//foreach
				
				//Guardamos los Docs.
				$contPayment->setContractId($contractId2);
				$contPayment->setContPaymentId($contPaymentId);
				foreach($arrAbonos as $res){
					$contPayment->setContExpiryId($res['contExpiryId']);
					$contPayment->setMonto($res['monto']);
					$contPayment->SavePago();
				}
				
				/*** FIN GUARDAMOS EL PAGO ***/
				
				//Save History Data			
				$user->setModule('Contratos');
				$user->setAction('Cancelar');
				$user->setItemId($contractId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contract->SetPage($p);
				$contract->setProjectId($projectId);
				$contracts = $contract->Enumerate();
				$result = $contracts['items'];
	
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
					
					$card['total'] = number_format($res['total'],2);
					$card['abono'] = number_format($res['abono'],2);
					
					//Obtenemos los Vencimientos

					//$contract->setContractId($res['contractId']);
					//$infE = $contract->GetEnganche();
							
					//Pagos Anteriores
					$contPayment->setContractId($res['contractId']);
					$resPayments = $contPayment->GetPayments();
										
					$pagosAnt = 0;
					foreach($resPayments as $val){
						$pagosAnt += $val['quantity'];
					}
					$card['pagos'] = number_format($pagosAnt,2);
					
					$saldo = $res['total'] - $infE['monto'] - $pagosAnt;
					
					$card['saldo'] = number_format($saldo,2);
					
					$items[] = $card;
				}
				$contracts['items'] = $items;
				
				$smarty->assign('contracts', $contracts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract.tpl');
			}
			
		break;		
			
	case 'deleteContract':
			
			$contractId = $_POST['id'];
			$contract->setContractId($contractId);	
					
			if(!$contract->Delete())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Contratos');
				$user->setAction('Eliminar');
				$user->setItemId($contractId);
				$user->SaveHistory();
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$contract->SetPage($p);
				$contract->setProjectId($projectId);
				$contracts = $contract->Enumerate();
				$result = $contracts['items'];
	
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
					
					$card['total'] = number_format($res['total'],2);
					$card['abono'] = number_format($res['abono'],2);
					
					//Obtenemos los Vencimientos

					//$contract->setContractId($res['contractId']);
					//$infE = $contract->GetEnganche();
							
					//Pagos Anteriores
					$contPayment->setContractId($res['contractId']);
					$resPayments = $contPayment->GetPayments();
										
					$pagosAnt = 0;
					foreach($resPayments as $val){
						$pagosAnt += $val['quantity'];
					}
					$card['pagos'] = number_format($pagosAnt,2);
					
					$saldo = $res['total'] - $infE['monto'] - $pagosAnt;
					
					$card['saldo'] = number_format($saldo,2);
					
					$items[] = $card;
				}
				$contracts['items'] = $items;
				
				$smarty->assign('contracts', $contracts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract.tpl');
			}
			
		break;		
			
	case 'loadAreas':
			
			$projectId = $_POST['projectId'];
			$projItemId = $_POST['projItemId'];
														
			//Obtenemos las Areas Vendibles			
			$projDepto->setProjectId($projectId);
			$projDepto->setProjItemId($projItemId);
			$areas = $projDepto->EnumAllVendibleByItem();
			$areas = $util->EncodeResult($areas);
												
			echo 'ok[#]';
							
			$smarty->assign('areas', $areas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/enumAreasCont.tpl');
						
		break;
	
	case 'getSaldo':
			
			$abono = $_POST['abono'];
			$abono = (trim($abono) == '') ? 0 : $abono;
			
			$total = $_POST['total'];
			$total = (trim($total) == '') ? 0 : $total;
			
			$saldo = $total - $abono;
			
			echo 'ok[#]';
			echo '$'.number_format($saldo,2);
			
			echo '[#]';
			echo number_format($saldo,2,'.','');
			
		break;
	
	case 'getSaldoFinal':
			
			$montoEng = $util->RemoveFormat($_POST['montoEng']);
			$montoEng = (trim($montoEng) == '') ? 0 : $montoEng;
			
			$monto = $_POST['monto'];
			$total = $util->RemoveFormat($_POST['total']);
			$total = (trim($total) == '') ? 0 : $total;
						
			$abono = 0;			
			foreach($monto as $val)
				$abono += $util->RemoveFormat($val);
			
			$abono += $montoEng;
						
			$saldo = $total - $abono;
			
			echo 'ok[#]';
			echo number_format($saldo,2,'.','');
			echo '[#]';
			echo '$'.number_format($saldo,2);
									
		break;
	
	case 'getPriceM2':
			
			$projDeptoId = $_POST['projDeptoId'];
			$total = $_POST['total'];
			
			$total = str_replace(',','',$total);
						
			$projDepto->setProjDeptoId($projDeptoId);
			$info = $projDepto->Info();
			
			$projType->setProjTypeId($info['projTypeId']);
			$infT = $projType->Info();
			
			if($infT['ventaArea'])
				$ventaArea = $infT['ventaArea'];
			
			$priceM2 = 0.00;
			if($total > 0)
				$priceM2 = $total / $ventaArea;
			
			echo 'ok[#]';
			echo '$'.number_format($priceM2,2);
			
			echo '[#]';
			echo number_format($priceM2,2,'.','');
			
		break;
	
	case 'getM2Depto':
			
			$projDeptoId = $_POST['projDeptoId'];
			
			$projDepto->setProjDeptoId($projDeptoId);
			$infD = $projDepto->Info();
			
			$projType->setProjTypeId($infD['projTypeId']);
			$infT = $projType->Info();
			
			$ventaArea = $infT['ventaArea'];				
						
			echo 'ok[#]';
			echo number_format($ventaArea,2);
			
			echo '[#]';
			echo $ventaArea;
			
			echo '[#]';
			echo $infD['projLevelId'];
			
		break;
	
	case 'updateQtyCheque':
			
			$totalPayment = $_POST['totalPayment'];
			$qtyCheque = $_POST['qtyCheque'];
			
			if($totalPayment >= $qtyCheque){
			
				$traspaso = $totalPayment - $qtyCheque;
			
				echo 'ok[#]';
				echo number_format($traspaso,2,'.','');
				
			}else{
				
				echo 'fail[#]';
				$util->setError(11009, 'error', '', '');
				$util->PrintErrors();
				
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');						
			}
						
		break;
	
	case 'updateQtyTraspaso':
			
			$totalPayment = $_POST['totalPayment'];
			$qtyTraspaso = $_POST['qtyTraspaso'];
						
			if($totalPayment >= $qtyTraspaso){
			
				$cheque = $totalPayment - $qtyTraspaso;
			
				echo 'ok[#]';
				echo number_format($cheque,2,'.','');
				
			}else{
				
				echo 'fail[#]';
				$util->setError(11009, 'error', '', '');
				$util->PrintErrors();
				
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');						
			}
									
		break;
	
	/*** CAJONES EST. ***/	
	
	case 'addCajon':
			
			$boxes = $_SESSION['enumCajones'];
			$contractId = $_POST['contractId'];
			$noCajones = $_POST['noCajones'];
						
			if(count($boxes) == $noCajones){
				$util->setError(11037,'error');
				$util->PrintErrors();
			
				echo 'fail[#]';			
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');			
				exit;
			}
			
			$card['projCajonId'] = '';
			
			$boxes[] = $card;
			
			$_SESSION['enumCajones'] = $boxes;
			
			$projCajon->setProjectId($projectId);
			$resCajones = $projCajon->EnumerateAll();
			
			$cajones = array();
			foreach($resCajones as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				if($contractId)
					$contract->setContractId($contractId);
				
				$contract->setProjCajonId($res['projCajonId']);
				if(!$contract->ExistCajon())
					$cajones[] = $card;
			}
						
			echo 'ok[#]';
			
			$smarty->assign('enumCajones', $boxes);
			$smarty->assign('cajones', $cajones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-cajones.tpl');
			
		break;
	
	case 'delCajon':
			
			$k = $_POST['k'];
			
			$boxes = $_SESSION['enumCajones'];
			
			unset($boxes[$k]);
			
			$_SESSION['enumCajones'] = $boxes;
			
			$projCajon->setProjectId($projectId);
			$cajones = $projCajon->EnumerateAll();
			$cajones = $util->EncodeResult($cajones);
			
			echo 'ok[#]';
			
			$smarty->assign('enumCajones', $boxes);
			$smarty->assign('cajones', $cajones);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-cajones.tpl');
				
		break;
	
	case 'saveCajones':
			
			$projCajonId = $_POST['projCajonId'];
			
			if(!count($projCajonId))
				$projCajonId = array();
			
			$boxes = array();			
			foreach($projCajonId as $k => $val){				
				$card['projCajonId'] = $val;
				
				$boxes[$k] = $card;
			}
			
			$_SESSION['enumCajones'] = $boxes;
			
		break;
	
	/*** BODEGAS ***/	
	
	case 'addBodega':
			
			$boxes = $_SESSION['enumBodegas'];
			$contractId = $_POST['contractId'];
			$noBodegas = $_POST['noBodegas'];
						
			if(count($boxes) == $noBodegas){
				$util->setError(11038,'error');
				$util->PrintErrors();
			
				echo 'fail[#]';			
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');			
				exit;
			}
						
			$card['projBodegaId'] = '';
			
			$boxes[] = $card;
			
			$_SESSION['enumBodegas'] = $boxes;
			
			$projBodega->setProjectId($projectId);
			$resBodegas = $projBodega->EnumerateAll();
			
			$bodegas = array();
			foreach($resBodegas as $res){
				$card = $res;
				
				$card['name'] = utf8_encode($res['name']);
				
				if($contractId)
					$contract->setContractId($contractId);
				
				$contract->setProjBodegaId($res['projBodegaId']);
				
				if(!$contract->ExistBodega())
					$bodegas[] = $card;
			}
			
			echo 'ok[#]';
			
			$smarty->assign('enumBodegas', $boxes);
			$smarty->assign('bodegas', $bodegas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-bodegas.tpl');
			
		break;
	
	case 'delBodega':
			
			$k = $_POST['k'];
			
			$boxes = $_SESSION['enumBodegas'];
			
			unset($boxes[$k]);
			
			$_SESSION['enumBodegas'] = $boxes;
			
			$projBodega->setProjectId($projectId);
			$bodegas = $projBodega->EnumerateAll();
			$bodegas = $util->EncodeResult($bodegas);
			
			echo 'ok[#]';
			
			$smarty->assign('enumBodegas', $boxes);
			$smarty->assign('bodegas', $bodegas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-bodegas.tpl');
				
		break;
	
	case 'saveBodegas':
			
			$projBodegaId = $_POST['projBodegaId'];
			
			if(!count($projBodegaId))
				$projBodegaId = array();
			
			$boxes = array();			
			foreach($projBodegaId as $k => $val){				
				$card['projBodegaId'] = $val;
				
				$boxes[$k] = $card;
			}
			
			$_SESSION['enumBodegas'] = $boxes;
			
		break;
	
	/*** EXPIRIES ***/
	
	case 'loadExpiries':
			
			$noDocs = intval($_POST['noDocs']);
			$monto = $_POST['montoDocs'];
			$plazo = intval($_POST['plazo']);
			$periodo = $_POST['periodo'];
			$fechaIniPagos = $_POST['fechaIniPagos'];
			
			$fechaIniPagos = $util->FormatDateDMMY($fechaIniPagos);
			
			$continue = true;
			if($fechaIniPagos == ''){
				$util->setError(10013, "error", "", 'Fecha Inicio Pagos');
				$util->PrintErrors();
				$continue = false;
			}elseif($noDocs == 0){
				$util->setError(10013, "error", "", 'No. de Docs.');
				$util->PrintErrors();
				$continue = false;
			}elseif($monto == ''){
				$util->setError(10013, "error", "", 'Monto');
				$util->PrintErrors();
				$continue = false;
			}elseif($plazo == 0){
				$util->setError(10013, "error", "", 'Plazo');
				$util->PrintErrors();
				$continue = false;
			}elseif($periodo == ''){
				$util->setError(10013, "error", "", 'Periodo');
				$util->PrintErrors();
				$continue = false;
			}
			
			if($continue){
				
				$expiries = $_SESSION['expiries'];
				
				$fecha = strtotime($fechaIniPagos);
				
				switch($periodo){
					case 'Dias': $periodo = 'days'; break;
					case 'Semanas': $periodo = 'weeks'; break;
					case 'Meses': $periodo = 'months'; break;
					case 'Anios': $periodo = 'years'; break;
				}				
				
				$noExps = count($expiries);
				
				for($i=1; $i<=$noDocs; $i++){
					
					$card['noExpiry'] = 'Doc. '.($i + $noExps);
					$card['monto'] = $monto;
					$vFecha = date('d-m-Y',$fecha);
					$card['date'] = $fecha;
					$card['fecha'] = $util->FormatDateDMMMY($vFecha);					
					
					$fUnix = date('Y-m-d',$fecha);
					$fecha = strtotime($fUnix.' + '.$plazo.' '.$periodo);
					
					$expiries[] = $card;
					
				}
				
				$_SESSION['expiries'] = $expiries;
				
				/*** ORDERNAR ***/
				
				$docs = array();
				foreach($expiries as $k => $res){
					$card1['date'] = $res['date'];
					$card1['k'] = $k;
					
					$docs[] = $card1;
				}
				
				$ordDocs = $util->orderMultiDimensionalArray($docs,'date');
				
				$i = 1;
				$docsExp = array();
				foreach($ordDocs as $o => $res){
					$k = $res['k'];	
					
					$tmp = $expiries[$k];
					
					$card2['noExpiry'] = 'Doc. '.$i;
					$card2['monto'] = $tmp['monto'];
					$card2['fecha'] = $tmp['fecha'];
					$card2['obs'] = $tmp['obs'];
					
					$card2['contExpiryId'] = $tmp['contExpiryId'];
					$card2['projectId'] = $tmp['projectId'];
					$card2['contractId'] = $tmp['contractId'];
					$card2['mantEquipId'] = $tmp['mantEquipId'];
					
					$i++;
					
					$docsExp[$o] = $card2;
				}
										
				/*** FIN ORDERNAR ***/
				
				echo 'ok[#]';
				
				$smarty->assign('expiries',$docsExp);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/contract-expiries.tpl');
			
			}else{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			
		break;
	
	case 'addExpiry':
			
			$expiries = $_SESSION['expiries'];
			
			$noExp = count($expiries);
			$noExp++;
			
			$card['noExpiry'] = 'Doc. '.$noExp;
			$card['monto'] = '0.00';
			$card['fecha'] = '';
			
			$expiries[] = $card;
			
			$_SESSION['expiries'] = $expiries;
			
			//Obtenemos los Montos de Manto. y Equip.
			
			$projMant->setProjectId($projectId);
			$projMants = $projMant->Enumerate();
			
			$projEquip->setProjectId($projectId);
			$projEquips = $projEquip->Enumerate();
			
			echo 'ok[#]';
			
			$smarty->assign('expiries',$expiries);
			$smarty->assign('projMants',$projMants);
			$smarty->assign('projEquips',$projEquips);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-expiries.tpl');			
			
		break;
	
	case 'delExpiry':
			
			$k = $_POST['k'];
			
			$expiries = $_SESSION['expiries'];
			
			unset($expiries[$k]);
			
			$_SESSION['expiries'] = $expiries;
			
			//Obtenemos los Montos de Manto. y Equip.
			
			$projMant->setProjectId($projectId);
			$projMants = $projMant->Enumerate();
			
			$projEquip->setProjectId($projectId);
			$projEquips = $projEquip->Enumerate();
			
			echo 'ok[#]';
			
			$smarty->assign('expiries',$expiries);
			$smarty->assign('projMants',$projMants);
			$smarty->assign('projEquips',$projEquips);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-expiries.tpl');			
			
		break;
	
	case 'saveExpiry':

			$noExpiry = $_POST['noExpiry'];
			$monto = $_POST['monto'];
			$fecha = $_POST['fecha'];
			$obs = $_POST['obs'];
						
			if(!count($noExpiry))
				$noExpiry = array();
			
			$_SESSION['expiries'] = array();
			
			$expiries = array();			
			foreach($noExpiry as $k => $val){	
				$card = array();			
				$card['noExpiry'] = $noExpiry[$k];
				$card['monto'] = $monto[$k];
				$card['fecha'] = $fecha[$k];
				$card['obs'] = $obs[$k];
				$card['date'] = strtotime($util->FormatDateYMMD($fecha[$k]));
								
				$card['enganche'] = ($card['noExpiry'] == 'Enganche') ? 1 : 0;
				
				if($card['noExpiry'] == 'Mantenimiento'){
					$card['manto'] = 1;
					$card['projMantId'] = $_POST['projMantId'];
				}else{
					$card['manto'] = 0;
					$card['projMantId'] = 0;
				}
					
				if($card['noExpiry'] == 'Equipamiento'){
					$card['equip'] = 1;
					$card['projEquipId'] = $_POST['projEquipId'];
				}else{
					$card['equip'] = 0;
					$card['projEquipId'] = 0;
				}
				
				$expiries[$k] = $card;
			}

			$_SESSION['expiries'] = $expiries;
			
		break;
	
	/*** CHEQUES ***/
	
	case 'addCheque':
			
			$cheques = $_SESSION['cheques'];
			$contractId = $_SESSION['canContId'];
						
			$card['contChequeId'] = '';
			$card['bankId'] = '';
			$card['quantity'] = '';
			$card['noCheque'] = '';
			
			$cheques[] = $card;
			
			$_SESSION['cheques'] = $cheques;
			
			//Obtenemos la informacion del Contrato
			$contractId = $_SESSION['canContId'];
			$contract->setContractId($contractId);
			$info = $contract->Info();
			
			//Obtenemos las Cuentas Bancarias
			$bank->setProjectId($projectId);
			$bank->setCurrency($info['currency']);
			$banks = $bank->EnumByProjCurrency();
			$banks = $util->EncodeResult($banks);
			
			echo 'ok[#]';
			
			$smarty->assign('cheques', $cheques);
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cancelacion-cheques.tpl');
			
		break;
	
	case 'delCheque':
			
			$k = $_POST['k'];
			
			$cheques = $_SESSION['cheques'];
			$contractId = $_SESSION['canContId'];
			
			unset($cheques[$k]);
			
			$_SESSION['cheques'] = $cheques;
			
			//Obtenemos la informacion del Contrato			
			$contract->setContractId($contractId);
			$info = $contract->Info();
			
			//Obtenemos las Cuentas Bancarias
			$bank->setProjectId($projectId);
			$bank->setCurrency($info['currency']);
			$banks = $bank->EnumByProjCurrency();
			$banks = $util->EncodeResult($banks);
			
			echo 'ok[#]';
			
			$smarty->assign('cheques', $cheques);
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cancelacion-cheques.tpl');
				
		break;
	
	case 'saveCheques':
			
			$banks = $_POST['banks'];
			$quantity = $_POST['quantity'];
			$noCheque = $_POST['noCheque'];			
			$idContCheques = $_POST['idContCheques'];
						
			if(!count($banks))
				$banks = array();
			
			$cheques = array();			
			foreach($banks as $k => $val){
				$card['bankId'] = $val;
				$card['quantity'] = $quantity[$k];
				$card['noCheque'] = $noCheque[$k];				
				$card['contChequeId'] = $idContCheques[$k];
				
				$cheques[$k] = $card;
			}
			
			$_SESSION['cheques'] = $cheques;
			
		break;
	
	/**************************/
	
	case 'updateTotalNeto':
			
			$totalPayment = $_POST['totalPayment'];
			$montoPena = $_POST['montoPena'];
			$totalCurrency = $_POST['totalCurrency'];
			
			$total = $totalPayment - $montoPena;
			
			echo 'ok[#]';
			echo '$'.number_format($total,2).' '.$totalCurrency;
			echo '[#]';
			echo number_format($total,2,'.','');
			
		break;
	
	case 'formatNumber':
			
			$valor = trim($_POST['valor']);
			
			echo 'ok[#]';
			
			if($valor == '')
				exit;
			
			$valor = $util->RemoveFormat($valor);		
			echo number_format($valor,2);
			
		break;
	
	case 'orderDocs':
			
			$expiries = $_SESSION['expiries'];			
			$expiries2 = $util->orderMultiDimensionalArray($expiries, 'date'); 
			$_SESSION['expiries'] = $expiries2;
			
			echo 'ok[#]';
			
			$smarty->assign('expiries', $expiries2);
			$smarty->display(DOC_ROOT.'/templates/lists/contract-expiries.tpl');
			
		break;
	
}

?>
