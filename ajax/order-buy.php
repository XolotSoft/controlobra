<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['reqP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{	
	case 'editOrderBuy':
		
		$orderBuy->setOrderBuyId($_POST['id']);
		$info = $orderBuy->Info();		
		$info = $util->EncodeRow($info);
				
		$smarty->assign('info', $info);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-order-buy-popup.tpl');
		
		break;
	
	case 'saveEditOrderBuy':	 	
		
		$orderBuyId = $_POST['id'];
		
		$orderBuy->setOrderBuyId($orderBuyId);	
		$orderBuy->setComments($_POST['comments']);
				
		if(!$orderBuy->UpdateComments())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Ordenes Compra');
			$user->setAction('Editar');
			$user->setItemId($orderBuyId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stOrdBuy = $_SESSION['stOrdBuy'];
			$orderBuy->setProjectId($projectId);
			$ordersBuy = $orderBuy->Enumerate($stOrdBuy);
	
			$items = array();
			foreach($ordersBuy['items'] as $res){
				$card = $res;
				
				$orderBuy->setOrderBuyId($res['orderBuyId']);
				$resReq = $orderBuy->GetRequisicionIds();
				
				$reqIds = array();
				foreach($resReq as $val)
					$reqIds[] = $val['requisicionId'];		
				
				$card['requisicion'] = implode(', ',$reqIds);
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$conceptMat->setConceptMatId($res['conceptMatId']);
				$infC = $conceptMat->Info();
				
				$material->setMaterialId($infC['materialId']);
				$card['material'] = utf8_encode($material->GetNameById());
				
				$items[] = $card;
			}
			$items = $util->orderMultiDimensionalArray($items,'requisicion');
			$ordersBuy['items'] = $items;
			
			$smarty->assign('ordersBuy',$ordersBuy);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/order-buy.tpl');
		}
			
		break;
	
	case 'confirmOrderPago':
		
		$orderBuyId = $_POST['id'];
					
		//Actualizamos el status a Confirmado de la Orden de Compra
		$orderBuy->setOrderBuyId($orderBuyId);
		$orderBuy->setStatus('Pagos');
		
		
		if(!$orderBuy->UpdateStatusEnt())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{	
			$util->setError(11021,'complete');
			$util->PrintErrors();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stOrdBuy = $_SESSION['stOrdBuy'];
			$orderBuy->setProjectId($projectId);
			$ordersBuy = $orderBuy->Enumerate($stOrdBuy);
	
			$items = array();
			foreach($ordersBuy['items'] as $res){
				$card = $res;
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$conceptMat->setConceptMatId($res['conceptMatId']);
				$infC = $conceptMat->Info();
				
				$material->setMaterialId($infC['materialId']);
				$card['material'] = utf8_encode($material->GetNameById());
				
				$items[] = $card;
			}
			$ordersBuy['items'] = $items;
			
			$smarty->assign('ordersBuy',$ordersBuy);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/order-buy.tpl');
		}
			
		break;
	
	case 'confirmOrder':
		
		$orderBuyId = $_POST['id'];
		
		//Generamos la Cuenta por Pagar
		
		$orderBuy->setOrderBuyId($orderBuyId);		
		$info = $orderBuy->Info();
				
		$accountPayment->setProjectId($info['projectId']);
		$accountPayment->setOrderBuyId($orderBuyId);
		$accountPayment->setSupplierId($info['supplierId']);
		$accountPayment->setTotal($info['total']);
		$accountPayment->setPagado(0);
		$accountPayment->setFecha(date('Y-m-d'));
		
		$accountPayment->Save();
		
		//Actualizamos el status a Confirmado de la Orden de Compra
		
		$orderBuy->setOrderBuyId($orderBuyId);
		$orderBuy->setStatus('Confirmado');
		
		if(!$orderBuy->UpdateStatus())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{	
			//Save History Data			
			$user->setModule('Ordenes Compra');
			$user->setAction('Confirmar');
			$user->setItemId($orderBuyId);
			$user->SaveHistory();
			
			$util->setError(11010,'complete');
			$util->PrintErrors();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stOrdBuy = $_SESSION['stOrdBuy'];
			$orderBuy->setProjectId($projectId);
			$ordersBuy = $orderBuy->Enumerate($stOrdBuy);
	
			$items = array();
			foreach($ordersBuy['items'] as $res){
				$card = $res;
				
				$orderBuy->setOrderBuyId($res['orderBuyId']);
				$resReq = $orderBuy->GetRequisicionIds();
				
				$reqIds = array();
				foreach($resReq as $val)
					$reqIds[] = $val['requisicionId'];		
				
				$card['requisicion'] = implode(', ',$reqIds);
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$conceptMat->setConceptMatId($res['conceptMatId']);
				$infC = $conceptMat->Info();
				
				$material->setMaterialId($infC['materialId']);
				$card['material'] = utf8_encode($material->GetNameById());
				
				$items[] = $card;
			}
			$items = $util->orderMultiDimensionalArray($items,'requisicion');
			$ordersBuy['items'] = $items;
			
			$smarty->assign('ordersBuy',$ordersBuy);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/order-buy.tpl');
		}
			
		break;
	
	case 'deleteOrderBuy':
		
		$orderBuy->setOrderBuyId($_POST['id']);		
		$info = $orderBuy->Info();
		
		$items = $orderBuy->EnumItems();
				
		foreach($items as $res){
			$reqMat->setStatus('Pendiente');
			
			$reqMat->setReqMatId($res['reqMatId']);			
			$reqMat->UpdateStatus();
			
			$reqMat->setReqPedidoId($res['reqPedidoId']);
			$reqMat->UpdateStatusPedidos();	
		}
				
		if(!$orderBuy->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			
			$stOrdBuy = $_SESSION['stOrdBuy'];
			$orderBuy->setProjectId($projectId);
			$ordersBuy = $orderBuy->Enumerate($stOrdBuy);
	
			$items = array();
			foreach($ordersBuy['items'] as $res){
				$card = $res;
				
				$orderBuy->setOrderBuyId($res['orderBuyId']);
				$resReq = $orderBuy->GetRequisicionIds();
				
				$reqIds = array();
				foreach($resReq as $val)
					$reqIds[] = $val['requisicionId'];		
				
				$card['requisicion'] = implode(', ',$reqIds);
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
				
				$items[] = $card;
			}
			$items = $util->orderMultiDimensionalArray($items,'requisicion');
			$ordersBuy['items'] = $items;
			
			$smarty->assign('ordersBuy',$ordersBuy);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/order-buy.tpl');
		}
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stOrdBuy'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'doRefreshSend':
			
			$_SESSION['stOrdBuyS'] = $_POST['status'];
			$_SESSION['stFechaEntS'] = $_POST['fechaEntrega'];
			
			echo 'ok[#]';
			
		break;
	
	case 'doRefreshEnt':
			
			$_SESSION['stEnt'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
	
	case 'editEntrega': 
		
			$ordBuyItemId = $_POST['ordBuyItemId'];
			
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$orderBuy->setOrdBuyItemId($ordBuyItemId);
			$info = $orderBuy->InfoItem();
			
			$conceptMat->setConceptMatId($info['conceptMatId']);
			$infC = $conceptMat->Info();
			
			$concept->setConceptId($infC['conceptId']);
			$info['concept'] = utf8_encode($concept->GetNameById());
			
			$material->setMaterialId($infC['materialId']);
			$infM = $material->Info();			
			$info['material'] = utf8_encode($infM['name']);
			
			$unit->setUnitId($infM['unitId']);
			$info['unit'] = $unit->GetClaveById();
			
			$orderBuy->setOrdBuyItemId($ordBuyItemId);
			$recibido = $orderBuy->GetTotalRecibido();
			
			$info['recibido'] = $recibido;
			$info['saldo'] = $info['quantity'] - $recibido;
			
			/**** INFORMACION DE LAS TORRES Y NIVELES ****/
			
			$requisicion->setRequisicionId($info['requisicionId']);
			$infR = $requisicion->Info();
					
			$info['steel'] = $infR['steel'];
			
			if($infR['steel']){
				$reqLevel->setRequisicionId($info['requisicionId']);
				$resItems = $reqLevel->EnumerateAll();
			}else{			
				$reqItem->setRequisicionId($info['requisicionId']);
				$resItems = $reqItem->EnumerateAll();
			}
			
			$items = array();
			$torres = array();
			foreach($resItems as $resI){
				$cardI = $resI;
				
				$projItem->setProjItemId($resI['projItemId']);
				$name = utf8_encode($projItem->GetNameById());
				
				$projLevel->setProjLevelId($resI['projLevelId']);
				$cardI['level'] = utf8_encode($projLevel->GetLevelById());
				
				$projLevel->setProjLevelId($resI['projLevelId2']);
				$cardI['level2'] = utf8_encode($projLevel->GetLevelById());
				
				$cardI['name'] = $name;
				$items[] = $name;
				
				$torres[] = $cardI;
			}
							
			$info['torre'] = implode(', ',$items);
			$info['torres'] = $torres;
			
			$projType->setProjTypeId($infR['projTypeId']);
			$info['type'] = utf8_encode($projType->GetNameById());
			
			/*********************************************/
						
			
			$orderBuy->setOrdBuyItemId($ordBuyItemId);
			$resEnt = $orderBuy->EnumEntregas();
			
			$_SESSION['entregas'] = array();
			$entregas = array();
			foreach($resEnt as $res){
				$cardE['quantity'] = $res['quantity'];
				$cardE['fecha'] = date('d-m-Y',strtotime($res['fecha']));
				
				$entregas[] = $cardE;
			}			
			
			$_SESSION['entregas'] = $entregas;
			
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('entregas', $entregas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-entrega-material-popup.tpl');
				
		break;
	
	case 'saveEditEntrega':
			
			$ordBuyItemId = $_POST['ordBuyItemId'];
			$quantity = $_POST['quantity'];
			$fechas = $_POST['fechas'];
			
			$continue = true;
			$qtyTotal = 0;
			$matEnt = array();
			foreach($quantity as $k => $val){
				
				$card['quantity'] = $val;
				$fecha = $fechas[$k];
				$card['fecha'] = date('Y-m-d',strtotime($fecha));
				
				$orderBuy->setQuantityR($card['quantity']);
				$orderBuy->setFechaR($card['fecha']);
				
				if(!$orderBuy->SaveTemp()){
					$continue = false;
					break;
				}
				
				$fechaTmp = date('Y-m-d',strtotime($fecha));
					
				if($fechaTmp > date('Y-m-d')){
					$util->setError(11039,'error');
					$util->PrintErrors();
					$continue = false;
					break;
				}
				
				$qtyTotal += $val;
				
				$matEnt[] = $card;			
				
			}//foreach
			
			if($continue){
			
				$orderBuy->setOrdBuyItemId($ordBuyItemId);
				$info = $orderBuy->InfoItem();
								
				if($qtyTotal > $info['quantity']){
					$util->setError(11019, 'error');
					$util->PrintErrors();
					$continue = false;
				}
							
			}
			
			if($continue){
							
				if($qtyTotal == $info['quantity'])
					$status = 'Completo';
				elseif($qtyTotal > 0)
					$status = 'Proceso';
				else
					$status = 'Pendiente';
							
				$orderBuy->setOrdBuyItemId($ordBuyItemId);
				$orderBuy->DelEntregas();
				
				$info = $orderBuy->InfoItem();
				
				foreach($matEnt as $val){
					
					$orderBuy->setProjectId($projectId);
					$orderBuy->setRequisicionId($info['requisicionId']);
					$orderBuy->setOrderBuyId($info['orderBuyId']);
					$orderBuy->setOrdBuyItemId($ordBuyItemId);
					$orderBuy->setQuantityR($val['quantity']);
					$orderBuy->setFechaR($val['fecha']);
					
					$orderBuy->SaveEntrega();
									
				}//foreach
				
				$orderBuy->setOrdBuyItemId($ordBuyItemId);
				$orderBuy->setStatus($status);
				$orderBuy->UpdateStatusItem();
			
				//Checamos si todos los materiales fueron entregados
				$orderBuy->setOrderBuyId($info['orderBuyId']);
				$entSt = $orderBuy->GetStatusItems();
					
				$orderBuy->setStatus($entSt);
				$orderBuy->UpdateStatusEnt();
				
			}
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Requisiciones Entregas');
				$user->setAction('Editar');
				$user->setItemId($ordBuyItemId);
				$user->SaveHistory();
				
				$util->setError(11018, 'complete');
				$util->PrintErrors();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$stEnt = $_SESSION['stEnt'];
				
				$orderBuy->setProjectId($projectId);
				$ordersBuy = $orderBuy->EnumerateEnt($stEnt);
				
				$items = array();
				foreach($ordersBuy['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
					
					$orderBuy->setOrderBuyId($res['orderBuyId']);
					$resMat = $orderBuy->EnumItems();
					
					$materials = array();
					foreach($resMat as $val){
			
						$conceptMat->setConceptMatId($val['conceptMatId']);
						$materialId = $conceptMat->GetMaterialId();
						
						$material->setMaterialId($materialId);
						$infM = $material->Info();			
						$val['material'] = utf8_encode($infM['name']);
						
						$unit->setUnitId($infM['unitId']);
						$val['unit'] = $unit->GetClaveById();
						
						$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
						$recibido = $orderBuy->GetTotalRecibido();
						
						$val['recibido'] = $recibido;
						$val['saldo'] = $val['quantity'] - $recibido;
						
						$materials[] = $val;			
					}
					
					$card['materials'] = $materials;
					
					$items[] = $card;
				}
				$ordersBuy['items'] = $items;
				
				$smarty->assign('ordersBuy', $ordersBuy);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/order-buy-entregas.tpl');
			}
			
			
		break;
	
	case 'recibirAllMaterials': 
		
			$orderBuyId = $_POST['orderBuyId'];
			
			$project->setProjectId($projectId);
			$infP = $project->Info();
			if($infP)
				$infP = $util->EncodeRow($infP);
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$info = $orderBuy->Info();
			
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
									
			//Obtenemos los Materiales
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$resMat = $orderBuy->EnumItems();
			
			$materials = array();
			foreach($resMat as $val){
	
				$conceptMat->setConceptMatId($val['conceptMatId']);
				$materialId = $conceptMat->GetMaterialId();
				
				$material->setMaterialId($materialId);
				$infM = $material->Info();			
				$val['name'] = $infM['name'];
				
				$unit->setUnitId($infM['unitId']);
				$val['unit'] = $unit->GetClaveById();
				
				$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
				$recibido = $orderBuy->GetTotalRecibido();
				
				$val['recibido'] = $recibido;
				$val['saldo'] = $val['quantity'] - $recibido;
				
				if($val['saldo'] > 0)
					$materials[] = $val;			
			}
								
			$smarty->assign('info', $info);	
			$smarty->assign('infP', $infP);
			$smarty->assign('materials', $materials);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-entrega-all-material-popup.tpl');
				
		break;
	
	case 'saveAllMaterials':
			
			$orderBuyId = $_POST['orderBuyId'];
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$resMat = $orderBuy->EnumItems();
			
			$continue = true;
			$materials = array();
			foreach($resMat as $res){
				$ordBuyItemId = $res['ordBuyItemId'];
				$quantity = $_POST['quantity_'.$ordBuyItemId];
				$saldo = $_POST['saldo_'.$ordBuyItemId];
				$fecha = $_POST['fecha_'.$ordBuyItemId];
				
				if($quantity != ''){
				
					if($quantity > $saldo){
						$util->setError(11013,'error');
						$util->PrintErrors();
						$continue = false;
						break;
					}
					if($fecha == ''){
						$util->setError(11029,'error');
						$util->PrintErrors();
						$continue = false;
						break;
					}
					
					$fechaTmp = date('Y-m-d',strtotime($fecha));
					
					if($fechaTmp > date('Y-m-d')){
						$util->setError(11039,'error');
						$util->PrintErrors();
						$continue = false;
						break;
					}
					
				}//if
				
				$orderBuy->setOrdBuyItemId($ordBuyItemId);
				$info = $orderBuy->InfoItem();
				
				$card['requisicionId'] = $info['requisicionId'];
				$card['ordBuyItemId'] = $ordBuyItemId;
				$card['quantity'] = $quantity;
				$card['saldo'] = $saldo;
				$card['fecha'] = $fecha;
				
				if($saldo > 0)
					$materials[] = $card;
				
			}//foreach
			
			if($continue){
			
				foreach($materials as $val){
			
					$orderBuy->setProjectId($projectId);
					$orderBuy->setRequisicionId($val['requisicionId']);
					$orderBuy->setOrderBuyId($orderBuyId);
					$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
					$orderBuy->setQuantityR($val['quantity']);
					$orderBuy->setFechaR($val['fecha']);
									
					$orderBuy->SaveEntrega();
					
					if($val['quantity'] == $val['saldo']){
						$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
						$orderBuy->setStatus('Completo');
						$orderBuy->UpdateStatusItem();
					}
					
				}//foreach
				
				//Checamos si todos los materiales fueron entregados
				$orderBuy->setOrderBuyId($orderBuyId);
				$entSt = $orderBuy->GetStatusItems();
					
				$orderBuy->setStatus($entSt);
				$orderBuy->UpdateStatusEnt();
				
			}//if
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Requisiciones Entregas');
				$user->setAction('Agregar');
				$user->setItemId($orderBuyId);
				$user->SaveHistory();
		
				$util->setError(11018, 'complete');
				$util->PrintErrors();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$stEnt = $_SESSION['stEnt'];
				
				$orderBuy->setProjectId($projectId);
				$ordersBuy = $orderBuy->EnumerateEnt($stEnt);
				
				$items = array();
				foreach($ordersBuy['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
					
					$orderBuy->setOrderBuyId($res['orderBuyId']);
					$resMat = $orderBuy->EnumItems();
					
					$materials = array();
					foreach($resMat as $val){
			
						$conceptMat->setConceptMatId($val['conceptMatId']);
						$materialId = $conceptMat->GetMaterialId();
						
						$material->setMaterialId($materialId);
						$infM = $material->Info();			
						$val['material'] = utf8_encode($infM['name']);
						
						$unit->setUnitId($infM['unitId']);
						$val['unit'] = $unit->GetClaveById();
						
						$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
						$recibido = $orderBuy->GetTotalRecibido();
						
						$val['recibido'] = $recibido;
						$val['saldo'] = $val['quantity'] - $recibido;
						
						$materials[] = $val;			
					}
					
					$card['materials'] = $materials;
					
					$items[] = $card;
				}
				$ordersBuy['items'] = $items;
				
				$smarty->assign('ordersBuy', $ordersBuy);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/order-buy-entregas.tpl');
			}
			
		break;
	
	/*** ENTREGAS ***/
	
		case 'addEntrega':
			
			$entregas = $_SESSION['entregas'];
			
			$card['matEntregaId'] = '';
			$card['quantity'] = '';
			$card['fecha'] = date('d-m-Y');
			
			$entregas[] = $card;
			
			$_SESSION['entregas'] = $entregas;
						
			echo 'ok[#]';
			
			$smarty->assign('entregas', $entregas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material-entregas.tpl');
			
		break;
	
	case 'delEntrega':
			
			$k = $_POST['k'];
			
			$entregas = $_SESSION['entregas'];
			
			unset($entregas[$k]);
			
			$_SESSION['entregas'] = $entregas;
						
			echo 'ok[#]';
			
			$smarty->assign('entregas', $entregas);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/material-entregas.tpl');
				
		break;
	
	case 'saveEntregas':
			
			$quantity = $_POST['quantity'];
			$idMatEnt = $_POST['idMatEnt'];
			$fechas = $_POST['fechas'];
			
			if(!count($precios))
				$precios = array();
			
			$entregas = array();			
			foreach($quantity as $k => $val){
				$card['quantity'] = $val;				
				$card['fecha'] = $fechas[$k];
				
				$entregas[$k] = $card;
			}
			
			$_SESSION['entregas'] = $entregas;
			
		break;
	
	case 'recibirTodoMat':
			
			$orderBuyId = $_POST['orderBuyId'];
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$resMat = $orderBuy->EnumItems();
			
			$fecha = date('Y-m-d');
			
			foreach($resMat as $val){
	
				$conceptMat->setConceptMatId($val['conceptMatId']);
				$materialId = $conceptMat->GetMaterialId();
												
				$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
				$recibido = $orderBuy->GetTotalRecibido();
				
				$saldo = $val['quantity'] - $recibido;
								
				$orderBuy->setProjectId($projectId);
				$orderBuy->setRequisicionId($val['requisicionId']);
				$orderBuy->setOrderBuyId($orderBuyId);
				$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
				$orderBuy->setQuantityR($saldo);
				$orderBuy->setFechaR($fecha);
				
				if($saldo > 0){
					$orderBuy->SaveEntrega();
				
					$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
					$orderBuy->setStatus('Completo');
					$orderBuy->UpdateStatusItem();
				}										
					
			}//foreach	
		
			//Checamos si todos los materiales fueron entregados
			$orderBuy->setOrderBuyId($orderBuyId);
			$entSt = $orderBuy->GetStatusItems();
				
			$orderBuy->setStatus($entSt);
			$orderBuy->UpdateStatusEnt();
			
			$continue = true;
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				$util->setError(11025, 'complete');
				$util->PrintErrors();
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$stEnt = $_SESSION['stEnt'];
				
				$orderBuy->setProjectId($projectId);
				$ordersBuy = $orderBuy->EnumerateEnt($stEnt);
				
				$items = array();
				foreach($ordersBuy['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
					
					$orderBuy->setOrderBuyId($res['orderBuyId']);
					$resMat = $orderBuy->EnumItems();
					
					$materials = array();
					foreach($resMat as $val){
			
						$conceptMat->setConceptMatId($val['conceptMatId']);
						$materialId = $conceptMat->GetMaterialId();
						
						$material->setMaterialId($materialId);
						$infM = $material->Info();			
						$val['material'] = utf8_encode($infM['name']);
						
						$unit->setUnitId($infM['unitId']);
						$val['unit'] = $unit->GetClaveById();
						
						$orderBuy->setOrdBuyItemId($val['ordBuyItemId']);
						$recibido = $orderBuy->GetTotalRecibido();
						
						$val['recibido'] = $recibido;
						$val['saldo'] = $val['quantity'] - $recibido;
						
						$materials[] = $val;			
					}
					
					$card['materials'] = $materials;
					
					$items[] = $card;
				}
				$ordersBuy['items'] = $items;
				
				$smarty->assign('ordersBuy', $ordersBuy);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/order-buy-entregas.tpl');
			}
						
		break;
	
	case 'editFechaEntrega': 
			
			$orderBuyId = $_POST['orderBuyId'];
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$info = $orderBuy->Info();
			
			$supplier->setSupplierId($info['supplierId']);
			$info['supplier'] = utf8_encode($supplier->GetNameById());
			
			if($info['fechaEntrega'])
				$info['fechaEntrega'] = date('d-m-Y',strtotime($info['fechaEntrega']));
			
			$smarty->assign('info', $info);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-order-buy-fechaEnt-popup.tpl');
				
		break;
	
	case 'saveFechaEnt':

			$orderBuyId = $_POST['orderBuyId'];
			$fecha = $_POST['fecha'];
			
			if($fecha)
				$fecha = date('Y-m-d',strtotime($fecha));
			
			$orderBuy->setOrderBuyId($orderBuyId);
			$orderBuy->setFecha($fecha);
			
			if(!$orderBuy->SaveFechaEnt())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Save History Data			
				$user->setModule('Ordenes Compra Enviadas');
				$user->setAction('Editar Fecha Entrega');
				$user->setItemId($orderBuyId);
				$user->SaveHistory();
		
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				
				$stOrdBuyS = $_SESSION['stOrdBuyS'];
				$orderBuy->setProjectId($projectId);
				$ordersBuy = $orderBuy->EnumerateSend($stOrdBuyS);
		
				$items = array();
				foreach($ordersBuy['items'] as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$card['fecha'] = date('d-m-Y',strtotime($res['fecha']));
					
					$items[] = $card;
				}
				$ordersBuy['items'] = $items;
				
				$smarty->assign('ordersBuy',$ordersBuy);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/order-buy-send.tpl');
			}
			
		break;
	
	case 'sendOrderBuy':
			
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			
			$orderBuy->setEmail($email);
			$orderBuy->setSubject($subject);
			$orderBuy->setMessage($message);
			
			if(!$orderBuy->SaveTemp()){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}else{
				echo 'ok[#]';
			}
			
		break;
	
}

?>
