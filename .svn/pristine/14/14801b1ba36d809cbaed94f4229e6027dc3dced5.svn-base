<?php
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	include_once(DOC_ROOT.'/pdf/dompdf_config.inc.php');
	
	session_start();
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	$accountPagoId = intval($_GET['id']);
	
	$accountPayment->setAccountPagoId($accountPagoId);
	$info = $accountPayment->InfoPago();
		
	//Obtenemos el Concepto			
	$accountPayment->setOrderBuyId($info['orderBuyId']);
	$info['concepto'] = $accountPayment->GetConcept();
			
	$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orden de Compra</title>
<style type="text/css">
<!--
body{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
.Estilo1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}

-->
</style>
</head>

<body>

<div align="center"><b>RECIBO DE PAGO</b></div>
<br><br><br>
<div align="right">'.date('d-m-Y',strtotime($info['fechaRecoger'])).'</div>
<br><br><br>
<div>Recib&iacute; la cantidad de $'.number_format($info['quantity'],2).' '.$info['currency'].' por el pago de '.strip_tags($info['concepto']).'</div>
<br><br><br>
<div><b>Nombre:</b> '.utf8_encode($info['personaRecoger']).'</div>
<br><br><br>
<div><b>Firma:</b> </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
<img src="'.DOC_ROOT.'/images/logos/alea.jpg" width="200" height="89">
</div>

</html>
';

	if($type == 'normal')
		$costeo->ResetSessionVars();
		
	$dompdf = new DOMPDF();
	$dompdf->set_paper('letter');
	$dompdf->load_html($html);
	$dompdf->render();
	
	$dompdf->stream("requisicion_cheque.pdf", array('Attachment'=>0));
	
?>