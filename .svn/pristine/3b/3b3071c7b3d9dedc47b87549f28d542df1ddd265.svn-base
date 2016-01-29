<?php
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	include_once(DOC_ROOT.'/pdf/dompdf_config.inc.php');
	
	session_start();
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	$estimacionPagoId = intval($_GET['id']);
	
	$estimacionPayment->setEstimacionPagoId($estimacionPagoId);
	$info = $estimacionPayment->InfoPago();
	
	//Obtenemos la info del proyecto
	$project->setProjectId($info['projectId']);
	$infP = $project->Info();
	
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

<div align="center"><b>DETALLES DEL PAGO</b></div>
<br><br>
<table width="500" cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="300">
	<table width="250" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="left" width="90" height="15"><b>Tipo:</b></td>
		<td align="left">'.$info['tipo'].'</td>
	</tr>';
	
	if($info['tipo'] == 'Cheque')
		$html .= '
		<tr>
			<td align="left" height="15"><b>Cheque No:</b></td>
			<td align="left">'.$info['noCheque'].'</td>
		</tr>';
	
	$html .= '
	<tr>
		<td align="left" height="15"><b>Cuenta Bancaria:</b></td>
		<td align="left">'.$info['bank'].'</td>
	</tr>
	<tr>
		<td align="left" height="15"><b>Cantidad:</b></td>
		<td align="left">'.number_format($info['quantity'],2).'</td>
	</tr>
	<tr>
		<td align="left" height="15"><b>Concepto:</b></td>
		<td align="left">'.$info['concepto'].'</td>
	</tr>
	<tr>
		<td align="left" height="15"><b>Fecha de Pago:</b></td>
		<td align="left">'.$info['fecha'].'</td>
	</tr>
	<tr>
		<td align="left" height="15"><b>No. Factura:</b></td>
		<td align="left">'.$info['noInvoice'].'</td>
	</tr>
	<tr>
		<td align="left" height="15"><b>Status:</b></td>
		<td align="left">'.$info['status'].'</td>
	</tr>';
	
	if($info['tipo'] == 'Cheque')
		$html .= '<tr>
			<td align="left" height="15"><b>Estado:</b></td>
			<td align="left">'.$info['statusCheque'].'</td>
		</tr>';
	
	if($info['tipo'] == 'Cheque' && ($info['statusCheque'] == "Recogido" || $info['statusCheque'] == "Cobrado"))
		$html .= '<tr>
			<td align="left" height="15"><b>Recepci&oacute;n:</b></td>
			<td align="left">'.$info['fechaRecoger'].' por '.$info['personaRecoger'].'</td>
		</tr>';
	
	if($info['tipo'] == 'Cheque' && $info['statusCheque'] == "Cobrado")
		$html .= '<tr>
			<td align="left" height="15"><b>Fecha de Cobro:</b></td>
			<td align="left">'.$info['fechaCobro'].'</td>
		</tr>';
	
	if($info['status'] == 'Cancelado'){
		$html .= '<tr>
			<td align="left" height="15"><b>Fecha Cancelaci&oacute;n:</b></td>
			<td align="left">'.$info['fechaCancel'].'</td>
		</tr>
		<tr>
			<td align="left" height="15"><b>Observaciones:</b></td>
			<td align="left">'.$info['obsCancel'].'</td>
		</tr>';
	}
	
	$html .= '
	</table>
</td>
<td>
<td align="center">
	<b>PROYECTO</b>
	<br>
	'.$infP['name'].'
	<br><br>
';

if($infP['image'])
	$html .= '<img src="'.DOC_ROOT.'/images/projects/'.$infP['image'].'" width="100" height="100">';

$html .= '</td>
</table>
<p>&nbsp;</p>
<div align="center">
<img src="'.DOC_ROOT.'/images/logos/alea.jpg" width="200" height="89">
</div>

</html>
';

	if($type == 'normal')
		$costeo->ResetSessionVars();
		
	$dompdf = new DOMPDF();
	$dompdf->set_paper('letter2');
	$dompdf->load_html($html);
	$dompdf->render();
	
	$dompdf->stream("requisicion_cheque.pdf", array('Attachment'=>0));
	
?>