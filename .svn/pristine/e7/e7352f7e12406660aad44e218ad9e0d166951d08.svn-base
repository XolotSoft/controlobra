<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$p = $_SESSION['adpP'];
$projectId = $_SESSION['curProjId'];

switch($_POST['type'])
{			
	case 'searchCheques':

			$seccion = $_POST['vSeccion'];
			$noCheque = $_POST['vNoCheque'];
			$bankId = $_POST['vBankId'];
			$stFactura = $_POST['stFactura'];
			$noFactura = $_POST['vNoFactura'];
			$status = $_POST['vStatus'];
			$estado = $_POST['vEstado'];
			$fechaIni = $_POST['vFechaIni'];
			$fechaFin = $_POST['vFechaFin'];
			$supplierId = $_POST['vSupplierId'];
		
			$accountPayment->setProjectId($projectId);
			
			if($seccion)
				$accountPayment->setSeccion($seccion);
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
			
			$resPagos = $accountPayment->SearchResumenCheques();
			
			$total = 0;
			$pagos = array();
			foreach($resPagos as $val){
				$card2 = $val;
				
				if($stFactura != '' && $stFactura == 'Facturado' && $val['noInvoice'] == '')
					continue;
				
				if($stFactura != '' && $stFactura == 'NoFacturado' && $val['noInvoice'] != '')
					continue;
				
				if($supplierId != '' && $supplierId != $val['supplierId'])
					continue;
				
				$card2['quantity'] = number_format($val['quantity'],2,'.','');
				$card2['fecha'] = date('d-m-Y',strtotime($val['fecha']));
				
				//Obtenemos el Concepto			
				$accountPayment->setOrderBuyId($val['orderBuyId']);
				$card2['concepto'] = utf8_encode($accountPayment->GetConcept());
				
				$supplier->setSupplierId($val['supplierId']);
				$card2['proveedor'] = utf8_encode($supplier->GetNameById());
		
				$total += $val['quantity'];
				
				$pagos[] = $card2;
			}
			
			echo 'ok[#]';
			
			$smarty->assign('total',$total);
			$smarty->assign('pagos',$pagos);
			$smarty->display(DOC_ROOT.'/templates/lists/resumen-cheques.tpl');
			
		break;	
	
}

?>
