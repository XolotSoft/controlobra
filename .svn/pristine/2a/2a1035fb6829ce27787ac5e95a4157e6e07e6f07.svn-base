<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['reqP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{
	case 'addPedido': 
	
		if(!$projectId){			
			$util->setError(10024, 'error', '', $field);
			$util->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;		  
		}
		
		$requisicionId = $_POST['requisicionId'];
		$conceptMatId = $_POST['conceptMatId'];
				
		$project->setProjectId($projectId);
		$infP = $project->Info();
		if($infP)
			$infP = $util->EncodeRow($infP);
				
		$conceptMat->setConceptMatId($conceptMatId);
		$info = $conceptMat->Info();
				
		$material->setMaterialId($info['materialId']);
		$infM = $material->Info();
		$info['material'] = $infM['name'];
		
		$unit->setUnitId($infM['unitId']);
		$info['unit'] = $unit->GetClaveById();
		
		$suppliers = $supplier->EnumerateByType('proveedor');
		$suppliers = $util->EncodeResult($suppliers);
		
		$reqMat->setRequisicionId($requisicionId);
		$reqMat->setConceptMatId($conceptMatId);
		$qtySolicitada = $reqMat->GetTotalQtySolicitado();
		
		$info['saldo'] = $info['quantity'] - $qtySolicitada;
		$info['requisicionId'] = $requisicionId;
				
		echo 'ok[#]';		
		
		$smarty->assign('infP', $infP);
		$smarty->assign('info', $info);
		$smarty->assign('areas', $areas);
		$smarty->assign('suppliers', $suppliers);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-req-material-popup.tpl');
				
		break;	
				
	case 'saveAddPedido':				
			
			$requisicionId = $_POST['requisicionId'];
			$conceptMatId = $_POST['conceptMatId'];
			$price = $_POST['price'];
			$quantity = $_POST['pedido'];
			$saldo = $_POST['saldo'];
			
			$total = $price * $quantity;
			$total = number_format($total,2,'.','');
			
			$reqMat->setProjectId($_POST['projectId']);
			$reqMat->setRequisicionId($requisicionId);
			$reqMat->setConceptId($_POST['conceptId']);
			$reqMat->setConceptMatId($conceptMatId);
			$reqMat->setQuantity($quantity);
			$reqMat->setSupplierId($_POST['supplierId']);
			$reqMat->setPrice($price);
			$reqMat->setTotal($total);			
						
			$continue = true;
			if($pedido > $saldo){
				$util->setError(11001, 'error', '', '');
				$util->PrintErrors();
				$continue = false;				
			}
			
			if(!$continue){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			if(!$reqMat->Save())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				$conceptMat->setConceptMatId($conceptMatId);
				$info = $conceptMat->Info();
								
				$qtySolicitado = $reqMat->GetTotalQtySolicitado();
				
				$saldo = $info['quantity'] - $qtySolicitado;
			
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';
				echo $conceptMatId;
				
				echo '[#]';
				echo $requisicionId;
				
				echo '[#]';
				echo $saldo;
				
				echo '[#]';
				echo $qtySolicitado;
				
				echo '[#]';
				$requisicion->setRequisicionId($requisicionId);
				$info = $requisicion->Info();
												
				//Obtenemos los Pedidos
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptId($info['conceptIdObra']);
				$reqMat->setConceptMatId($conceptMatId);
				$resPedidos = $reqMat->Enumerate();
				
				$pedidos = array();
				foreach($resPedidos as $val){		
					$card2 = $val;
					
					$supplier->setSupplierId($val['supplierId']);
					$card2['supplier'] = utf8_encode($supplier->GetNameById());
					
					$pedidos[] = $card2;			
					
				}				
				$itM['pedidos'] = $pedidos;
				
				$smarty->assign('itM', $itM);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/req-mat-pedido.tpl');
			}		
		
		break;
	
	case 'deletePedido':				
		
			$reqMatId = $_POST['id'];
					
			$reqMat->setReqMatId($reqMatId);
			$info = $reqMat->Info();
			
			$requisicionId = $info['requisicionId'];
			$conceptMatId = $info['conceptMatId'];
							
			if(!$reqMat->Delete())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				$conceptMat->setConceptMatId($conceptMatId);
				$info = $conceptMat->Info();
				
				$reqMat->setConceptMatId($conceptMatId);
				$reqMat->setRequisicionId($requisicionId);
				$qtySolicitado = $reqMat->GetTotalQtySolicitado();
				
				$saldo = $info['quantity'] - $qtySolicitado;
						
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';
				echo $conceptMatId;
				
				echo '[#]';
				echo $requisicionId;
				
				echo '[#]';
				echo $saldo;
				
				echo '[#]';
				echo $qtySolicitado;
				
				echo '[#]';				
				$requisicion->setRequisicionId($requisicionId);
				$info = $requisicion->Info();
				
				//Obtenemos los Pedidos
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptId($info['conceptIdObra']);
				$reqMat->setConceptMatId($conceptMatId);
				$resPedidos = $reqMat->Enumerate();
				
				$pedidos = array();
				foreach($resPedidos as $val){		
					$card2 = $val;
					
					$supplier->setSupplierId($val['supplierId']);
					$card2['supplier'] = utf8_encode($supplier->GetNameById());
					
					$pedidos[] = $card2;			
					
				}				
				$itM['pedidos'] = $pedidos;
				
				$smarty->assign('itM', $itM);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/req-mat-pedido.tpl');
			}		
		
		break;
	
	case 'confirmPedido':				
		
			$reqMatId = $_POST['id'];
					
			$reqMat->setReqMatId($reqMatId);
			$info = $reqMat->Info();
			
			$requisicionId = $info['requisicionId'];
			$conceptMatId = $info['conceptMatId'];
							
			if(!$reqMat->Confirm())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				//Generamos la Orden de Compra
				
				$fecha = date('Y-m-d');
				
				$orderBuy->setProjectId($projectId);
				$orderBuy->setReqMatId($reqMatId);
				$orderBuy->setSupplierId($info['supplierId']);
				$orderBuy->setConceptMatId($info['conceptMatId']);
				$orderBuy->setPrice($info['price']);
				$orderBuy->setQuantity($info['quantity']);
				$orderBuy->setTotal($info['total']);
				$orderBuy->setFecha($fecha);
				$orderBuy->setConfirm(0);
				
				$orderBuy->Save();
				
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';
				echo $conceptMatId;
				
				echo '[#]';
				echo $requisicionId;
								
				echo '[#]';				
				$requisicion->setRequisicionId($requisicionId);
				$info = $requisicion->Info();
				
				//Obtenemos los Pedidos
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptId($info['conceptIdObra']);
				$reqMat->setConceptMatId($conceptMatId);
				$resPedidos = $reqMat->Enumerate();
				
				$pedidos = array();
				foreach($resPedidos as $val){		
					$card2 = $val;
					
					$supplier->setSupplierId($val['supplierId']);
					$card2['supplier'] = utf8_encode($supplier->GetNameById());
					
					$pedidos[] = $card2;			
					
				}				
				$itM['pedidos'] = $pedidos;
				
				$smarty->assign('itM', $itM);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/req-mat-pedido.tpl');
			}		
		
		break;
	
	/*** PEDIDOS ***/
	
	case 'addPedidos':
		
			$requisicionId = $_POST['requisicionId'];
			
			$requisicion->setRequisicionId($requisicionId);
			$info = $requisicion->Info();
			
			//Obtenemos la informacion del Proyecto
			$project->setProjectId($projectId);
			$infP = $project->Info();
			$infP = $util->EncodeRow($infP);
			
			/***************/
			
			$conceptMat->setConceptId($info['conceptIdObra']);
			$resMats = $conceptMat->EnumerateAll();

			$materials = array();
			foreach($resMats as $resM){
				
				$material->setMaterialid($resM['materialId']);
				$infM = $material->Info();
				
				$resM['quantity'] = $resM['quantity'] * $info['totalReq'];
								
				$cardM = $resM;				
				
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptMatId($resM['conceptMatId']);
				$qtySolicitada = $reqMat->GetTotalQtySolicitado();
								
				$saldo = $resM['quantity'] - $qtySolicitada;				
				$desperdicio = $resM['quantity'] * ($infM['waste']/100);
				
				$saldo += $desperdicio;
				
				$cardM['desperdicio'] = number_format($desperdicio,2,'.','');
				$cardM['solicitado'] = $qtySolicitada;
				$cardM['saldo'] = number_format($saldo,2);
				$cardM['solicitar'] = $saldo;
				$cardM['total'] = '0.00';
				
				$material->setMaterialId($resM['materialId']);
				$suppliers = $material->EnumSupplier();
				
				if($suppliers)
					$cardM['suppliers'] = $util->EncodeResult($suppliers);				
				
				if($saldo > 0)
					$materials[] = $cardM;
			}
			
			/************/
			
			$concept->setConceptId($info['conceptId']);
			$info['concepto'] = $concept->GetNameById();
						
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infP);
			$smarty->assign('materials', $materials);
			$smarty->assign('suppliers', $suppliers);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-req-pedidos-popup.tpl');
		
		break;
	
	case 'viewPedidos':
		
			$reqPedidoId = $_POST['reqPedidoId'];
			
			//Obtenemos la informacion del Proyecto
			
			$project->setProjectId($projectId);
			$infPry = $project->Info();
			$infPry = $util->EncodeRow($infPry);
			
			$reqMat->setReqPedidoId($reqPedidoId);
			$infP = $reqMat->InfoPedidos();
			
			$requisicionId = $infP['requisicionId'];
			
			$requisicion->setRequisicionId($requisicionId);
			$info = $requisicion->Info();
			
			$concept->setConceptId($info['conceptId']);
			$info['concepto'] = $concept->GetNameById();
			
			/***************/
			
			$resMats = $reqMat->EnumByPedido();
	
			$materials = array();
			foreach($resMats as $res){
				$card = $res;
				
				$conceptMat->setConceptMatId($res['conceptMatId']);
				$materialId = $conceptMat->GetMaterialId();
				
				$material->setMaterialId($materialId);
				$infM = $material->Info();
				
				$card['material'] = utf8_encode($infM['name']);
				
				$unit->setUnitId($infM['unitId']);
				$card['unit'] = $unit->GetClaveById();
				
				$supplier->setSupplierId($res['supplierId']);
				$card['supplier'] = utf8_encode($supplier->GetNameById());
				
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptMatId($res['conceptMatId']);
				$qtySolicitada = $reqMat->GetTotalQtySolicitado();
								
				$card['solicitado'] = $res['pedido'];
				
				$materials[] = $card;
			}
									
			$smarty->assign('info', $info);
			$smarty->assign('infP', $infPry);
			$smarty->assign('materials', $materials);			
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/view-req-pedidos-popup.tpl');
		
		break;
	
	case 'saveAddPedidos':
			
			$requisicionId = $_POST['requisicionId'];
									
			$requisicion->setRequisicionId($requisicionId);
			$info = $requisicion->Info();
			
			/***************/
			
			$conceptMat->setConceptId($info['conceptIdObra']);
			$resMats = $conceptMat->EnumerateAll();
			
			$continue = true;
			
			$total = 0;
			$materials = array();
			foreach($resMats as $resM){
				
				$conceptMatId = $resM['conceptMatId'];
				
				if(!isset($_POST['supplierId_'.$conceptMatId])){
					continue;
				}
				
				$supplierId = trim($_POST['supplierId_'.$conceptMatId]);
				$quantity = trim($_POST['quantity_'.$conceptMatId]);
				$waste = trim($_POST['waste_'.$conceptMatId]);
				$solicitar = floatval($_POST['solicitar_'.$conceptMatId]);
				$price = trim($_POST['unitPrice_'.$conceptMatId]);
				
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setConceptMatId($conceptMatId);
				$reqMat->setSupplierId($supplierId);
				$qtySolicitada = $reqMat->GetTotalQtySolicitado();
				
				$saldo = ($quantity + $waste) - $qtySolicitada;
				
				$solicitar = round($solicitar,2);
				$saldo = round($saldo,2);
				
				if($solicitar == ''){										
					$util->setError(10013, 'error', '', 'A Solicitar');
					$util->PrintErrors();
					$continue = false;					
					break;
				}elseif($price == ''){
					$util->setError(10013, 'error', '', 'Precio Unitario');
					$util->PrintErrors();
					$continue = false;					
					break;
				
				}
				/*
				elseif($solicitar > $saldo){
					$util->setError(11013, 'error', '', '');
					$util->PrintErrors();
					$continue = false;					
					break;
				}
				*/
												
				$mTotal = $solicitar * $price;
				
				$total += number_format($mTotal,2,'.','');
				
				$cardM['conceptMatId'] = $conceptMatId;
				$cardM['conceptId'] = $resM['conceptId'];
				$cardM['supplierId'] = $supplierId;
				$cardM['quantity'] = $solicitar;
				$cardM['price'] = $price;
				$cardM['total'] = $mTotal;
								
				if(!$reqMat->SaveTemp()){
					$continue = false;
					break;
				}
				
				$materials[] = $cardM;
				
				
			}//foreach
												
			/************/		
			
			if($continue){
				
				$reqMat->setProjectId($projectId);
				$reqMat->setRequisicionId($requisicionId);
				$reqMat->setTotal($total);
				
				$reqPedidoId = $reqMat->SavePedido();
				
				if(!$reqPedidoId)
					$continue = false;
									
			}
			
			if(!$continue)
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				//Guardamos los Materiales
				
				$reqMat->setProjectId($projectId);
				$reqMat->setRequisicionId($requisicionId);				
				$reqMat->setReqPedidoId($reqPedidoId);
				foreach($materials as $res){
										
					$reqMat->setConceptMatId($res['conceptMatId']);
					$reqMat->setSupplierId($res['supplierId']);
					$reqMat->setConceptId($res['conceptId']);
					$reqMat->setQuantity($res['quantity']);					
					$reqMat->setPrice($res['price']);
					$reqMat->setTotal($res['total']);
					
					$reqMat->Save();	
				}
				
				//Checamos si ya se pidieron todos los materiales
						
				$conceptMat->setConceptId($info['conceptIdObra']);
				$resMats = $conceptMat->EnumerateAll();
				
				$saldo = 0;
				foreach($resMats as $resM){
					
					$conceptMatId = $resM['conceptMatId'];
					
					$reqMat->setRequisicionId($requisicionId);
					$reqMat->setConceptMatId($conceptMatId);			
					$qtySolicitada = $reqMat->GetTotalQtySolicitado();
					
					$saldo += ($resM['quantity'] * $info['totalReq']) - $qtySolicitada;
										
				}//foreach
								
				if($saldo <= 0){
					$requisicion->setRequisicionId($requisicionId);
					$requisicion->setStatus('Completado');
					$requisicion->UpdateStatus();
				}
				
				/************/
				
				//Save History Data			
				$user->setModule('Requisiciones');
				$user->setAction('Agregar Pedido');
				$user->setItemId($reqPedidoId);
				$user->SaveHistory();
				
				echo 'ok[#]';				
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';			
				$requisicion->setProjectId($projectId);
				$resConcepts = $requisicion->EnumConcepts();
	
				$concepts = array();
				foreach($resConcepts as $valC){
					$cardC = $valC;
					$cardC['name'] = utf8_encode($valC['name']);
					
					if($valC['steel']){
						$reqLevel->setRequisicionId($valC['requisicionId']);
						$resItems = $reqLevel->EnumerateAll();
					}else{			
						$reqItem->setRequisicionId($valC['requisicionId']);
						$resItems = $reqItem->EnumAllGroup();
					}
									
					$areas = array();
					$torres = array();
					foreach($resItems as $resI){
						$cardI = $resI;
						
						$projItem->setProjItemId($resI['projItemId']);
						$cardI['name'] = $projItem->GetNameById();
									
						$reqItem->setRequisicionId($valC['requisicionId']);
						$reqItem->setProjItemId($resI['projItemId']);
						$resLevels = $reqItem->EnumLevelsByItem();
						
						foreach($resLevels as $lev){
							$cardL = $lev;
											
							$reqDepto->setRequisicionId($valC['requisicionId']);
							$reqDepto->setReqItemId($lev['reqItemId']);
							$resAreas = $reqDepto->EnumAreasByItem();
														
							foreach($resAreas as $res){
								$cardA = $res;
								
								$projDepto->setProjDeptoId($res['projDeptoId']);
								$cardA['name'] = utf8_encode($projDepto->GetNameById());
													
								$areas[] = $cardA;
							}										
							
						}//foreach
			
						$cardI['areas'] = $areas;
									
						$torres[] = $cardI;
									
					}//foreach
									
					$cardC['torres'] = $torres;
					
					$projType->setProjTypeId($valC['projTypeId']);
					$cardC['type'] = utf8_encode($projType->GetNameById());
													
					$concepts[] = $cardC;
				}
				
				$smarty->assign('concepts', $concepts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/requisicion.tpl');
			}
			
		break;
	
	case 'deletePedidos':
			
			$reqPedidoId = $_POST['reqPedidoId'];
									
			$reqMat->setReqPedidoId($reqPedidoId);
			$info = $reqMat->InfoPedidos();
															
			if(!$reqMat->DeletePedidos())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				$requisicion->setRequisicionId($info['requisicionId']);
				$requisicion->setStatus('Pendiente');
				$requisicion->UpdateStatus();
					
				echo 'ok[#]';				
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';
				
				$stReqP = $_SESSION['stReqP'];
				$requisicion->setProjectId($projectId);	
				$resPedidos = $requisicion->EnumPedidos($stReqP);
			
				$concepts = array();
				foreach($resPedidos as $val){
					$card = $val;
					
					$requisicion->setRequisicionId($val['requisicionId']);
					$infR = $requisicion->Info();
					
					$concept->setConceptId($infR['conceptId']);
					$card['name'] = utf8_encode($concept->GetNameById());
					
					if($val['steel']){
						$reqLevel->setRequisicionId($val['requisicionId']);
						$resItems = $reqLevel->EnumerateAll();
					}else{			
						$reqItem->setRequisicionId($val['requisicionId']);
						$resItems = $reqItem->EnumAllGroup();
					}
					
					$areas = array();
					$torres = array();
					foreach($resItems as $resI){
						$cardI = $resI;
						
						$projItem->setProjItemId($resI['projItemId']);
						$cardI['name'] = utf8_encode($projItem->GetNameById());
									
						$reqItem->setRequisicionId($val['requisicionId']);
						$reqItem->setProjItemId($resI['projItemId']);
						$resLevels = $reqItem->EnumLevelsByItem();
						
						foreach($resLevels as $lev){
							$cardL = $lev;
											
							$reqDepto->setRequisicionId($val['requisicionId']);
							$reqDepto->setReqItemId($lev['reqItemId']);
							$resAreas = $reqDepto->EnumAreasByItem();
														
							foreach($resAreas as $res){
								$cardA = $res;
								
								$projDepto->setProjDeptoId($res['projDeptoId']);
								$cardA['name'] = utf8_encode($projDepto->GetNameById());
													
								$areas[] = $cardA;
							}										
							
						}//foreach
			
						$cardI['areas'] = $areas;
									
						$torres[] = $cardI;
						
					}//foreach
									
					$card['torres'] = $torres;
					
					$projType->setProjTypeId($infR['projTypeId']);
					$card['type'] = utf8_encode($projType->GetNameById());
							
					$card['totalReq'] = '0.00';
					
					$concepts[] = $card;
				}									
									
				$smarty->assign('concepts', $concepts);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/requisicion-pedidos2.tpl');
			}
			
		break;
		
	case 'confirmPedidos':
			
			$reqPedidoId = $_POST['id'];
			
			$reqMat->setReqPedidoId($reqPedidoId);
			$info = $reqMat->InfoPedidos();
			
			$requisicionId = $info['requisicionId'];
									
			if(!$reqMat->ConfirmPedidos())
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				//Generamos la Orden de Compra
				
				$fecha = date('Y-m-d');
				
				$orderBuy->setProjectId($projectId);
				$orderBuy->setReqPedidoId($reqPedidoId);
				$orderBuy->setRequisicionId($requisicionId);
				$orderBuy->setReqMatId(0);
				$orderBuy->setSupplierId($info['supplierId']);
				$orderBuy->setConceptMatId(0);
				$orderBuy->setPrice(0);
				$orderBuy->setQuantity(0);
				$orderBuy->setTotal($info['total']);
				$orderBuy->setFecha($fecha);
				$orderBuy->setConfirm(0);
				
				$orderBuyId = $orderBuy->Save();
				
				if($orderBuyId){
					
					$reqMat->setReqPedidoId($reqPedidoId);
					$materials = $reqMat->EnumByPedido();
					
					foreach($materials as $res){
						
						$orderBuy->setOrderBuyId($orderBuyId);
						$orderBuy->setConceptMatId($res['conceptMatId']);
						$orderBuy->setQuantity($res['quantity']);
						$orderBuy->setPrice($res['price']);
						$orderBuy->setTotal($res['total']);
						
						$orderBuy->SaveItem();
						
					}//foreach
					
				}//if
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				
				echo '[#]';
				
				$reqMat->setRequisicionId($requisicionId);
				$resPedidos = $reqMat->EnumPedidos();
				
				$pedidos = array();
				foreach($resPedidos as $res){
					$card = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$card['supplier'] = utf8_encode($supplier->GetNameById());
					
					$pedidos[] = $card;
				}
				
				$item['requisicionId'] = $requisicionId;
				$item['pedidos'] = $pedidos;					
									
				$smarty->assign('item', $item);
				$smarty->assign('DOC_ROOT', DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/requisicion-pedidos.tpl');
			
			}
			
		break;
	
	case 'getMatPrice':
			
			$supplierId = $_POST['supplierId'];
			$conceptMatId = $_POST['conceptMatId'];
			
			$conceptMat->setConceptMatId($conceptMatId);
			$info = $conceptMat->Info();
			
			$matPrice->setMaterialId($info['materialId']);
			$matPrice->setSupplierId($supplierId);
			$matPriceId = $matPrice->GetMatPriceId();
			
			$matPrice->setMatPriceId($matPriceId);
			$infM = $matPrice->Info();
			
			echo 'ok[#]';
			echo $infM['price'];
			
		break;
	
	case 'doOrderBuy':
		
			$items = $_POST['items'];
			
			if(!$items){
				$util->setError(11016, 'error', '', '');
				$util->PrintErrors();
				
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;								
			}
			
			$materiales = explode(',',$items);
			
			$suppliers = array();
			foreach($materiales as $res){
				
				$val = explode('_',$res);
				
				$reqPedidoId = $val[0];
				$reqMatId = $val[1];
				
				$reqMat->setReqMatId($reqMatId);
				$info = $reqMat->Info();
				
				$supplierId = $info['supplierId'];
				
				$card['reqMatId'] = $reqMatId;
				$card['reqPedidoId'] = $reqPedidoId;
				
				$suppliers[$supplierId][] = $card;
				
			}
			
			foreach($suppliers as $id => $res){
											
				$orderBuy->setProjectId($projectId);
				$orderBuy->setRequisicionId(0);
				$orderBuy->setReqPedidoId(0);
				$orderBuy->setReqMatId(0);
				$orderBuy->setConceptMatId(0);
				$orderBuy->setSupplierId($id);
				$orderBuy->setQuantity(0);
				$orderBuy->setPrice(0);
				$orderBuy->setTotal(0);
				$orderBuy->setFecha(date('Y-m-d'));
				$orderBuy->setConfirm(0);
				
				$orderBuyId = $orderBuy->Save();
				
				if($orderBuyId){
					
					$total = 0;
					foreach($res as $r){
						
						$reqMat->setReqMatId($r['reqMatId']);
						$info = $reqMat->Info();
					
						$orderBuy->setOrderBuyId($orderBuyId);
						$orderBuy->setRequisicionId($info['requisicionId']);
						$orderBuy->setReqPedidoId($r['reqPedidoId']);
						$orderBuy->setReqMatId($r['reqMatId']);
						$orderBuy->setConceptMatId($info['conceptMatId']);
						$orderBuy->setQuantity($info['quantity']);
						$orderBuy->setPrice($info['price']);
						$orderBuy->setTotal($info['total']);										
					
						$orderBuy->SaveItem();
						
						//Actualizamos el status del material
						$reqMat->setReqMatId($r['reqMatId']);
						$reqMat->setStatus('Confirmado');
						$reqMat->UpdateStatus();
						
						//Checamos si ya se completaron los materiales para actualizar el status del pedido						
						$reqMat->setReqPedidoId($r['reqPedidoId']);
						if($reqMat->IsPedidoComplete()){
							$reqMat->setStatus('Completo');
							$reqMat->UpdateStatusPedidos();
						}						
						
						$total += $info['total'];
						
					}//foreach
					
					$orderBuy->setTotal($total);
					$orderBuy->UpdateTotal();
										
				}//if
				
			}//foreach
			
			//Save History Data			
			$user->setModule('Requisiciones Pedidos');
			$user->setAction('Generar Orden Compra');
			$user->setItemId($orderBuyId);
			$user->SaveHistory();
				
			$util->setError(11017, 'complete', '', '');
			$util->PrintErrors();
				
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo '[#]';
			
			$stReqP = $_SESSION['stReqP'];
			$requisicion->setProjectId($projectId);	
			$resPedidos = $requisicion->EnumPedidos($stReqP);
		
			$concepts = array();
			foreach($resPedidos as $val){
				$card = $val;
				
				$requisicion->setRequisicionId($val['requisicionId']);
				$infR = $requisicion->Info();
				
				$concept->setConceptId($infR['conceptId']);
				$card['name'] = utf8_encode($concept->GetNameById());
				
				$card['steel'] = $infR['steel'];
				
				if($infR['steel']){
					$reqLevel->setRequisicionId($val['requisicionId']);
					$resItems = $reqLevel->EnumerateAll();
				}else{			
					$reqItem->setRequisicionId($val['requisicionId']);
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
								
				$card['torre'] = implode(', ',$items);
				$card['torres'] = $torres;
				
				$projType->setProjTypeId($infR['projTypeId']);
				$card['type'] = utf8_encode($projType->GetNameById());
				
				$reqMat->setReqPedidoId($val['reqPedidoId']);
				$resMat = $reqMat->EnumByPedido();
				
				$materials = array();
				foreach($resMat as $res){
					$cardM = $res;
					
					$supplier->setSupplierId($res['supplierId']);
					$cardM['supplier'] = utf8_encode($supplier->GetNameById());
					
					$conceptMat->setConceptMatId($res['conceptMatId']);
					$materialId = $conceptMat->GetMaterialId();
					
					$material->setMaterialId($materialId);
					$info = $material->Info();
					
					$cardM['material'] = utf8_encode($info['name']);
					
					$unit->setUnitId($info['unitId']);
					$cardM['unit'] = utf8_encode($unit->GetClaveById());
															
					$materials[] = $cardM;
				}
				
				$card['materials'] = $materials;
				
				$concepts[] = $card;
			}
							
			$smarty->assign('concepts', $concepts);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/requisicion-pedidos2.tpl');
			
		break;
	
	case 'doRefresh':
			
			$_SESSION['stReqP'] = $_POST['status'];
			
			echo 'ok[#]';
			
		break;
			
}

?>
