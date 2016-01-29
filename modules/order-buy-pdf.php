<?php
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	include_once(DOC_ROOT.'/pdf/dompdf_config.inc.php');
		
	session_start();
	
	/* Start Session Control - Don't Remove This */
	$user->allowAccess();	
	/* End Session Control */
	
	$orderBuyId = intval($_GET['id']);
	
	$orderBuy->setOrderBuyId($orderBuyId);
	$info = $orderBuy->Info();	
	$info['fecha'] = date('d-m-Y',strtotime($info['fecha']));
	
	$project->setProjectId($info['projectId']);
	$infProy = $project->Info();
	$proyecto = $infProy['name'];
	$address = $infProy['address'];
	$responsable = $infProy['responsable'];

	//Obtenemos informacion del Proveedor
	$supplier->setSupplierId($info['supplierId']);
	$infS = $supplier->Info();
	
	$state->setStateId($infS['stateId']);
	$infS['state'] = $state->GetNameById();
	
	$city->setCityId($infS['cityId']);
	$infS['city'] = $city->GetNameById();
			
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
	font-size:10px;
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
<table width="550" border="0" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="550"><table width="550" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" valign="top"><p>
		<img src="../images/logos/alea.jpg" width="150" height="66">
		<br />
           
        <td width="50%" align="right" valign="top"></td>
      </tr>
    </table></td>
  </tr>';
  
  $html .= '<tr>
    <td><table width="550" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width=""><b>PROVEEDOR</b></td>        
        <td width="31%" align="left"><b>PROYECTO</b></td>
        <td width="16%" align="center"><b>FECHA DE SOLICITUD</b></td>
      </tr>
      <tr>
        <td>'.utf8_encode($infS['name']).'</td>
        <td align="left">'.$proyecto.'</td>
        <td align="center">'.$info['fecha'].'</td>
      </tr>
	  <tr>
        <td><b>RECEPCION EN OBRA</b></td>
		<td colspan="2"><b>DIRECCION DE ENTREGA</b></td>
      </tr>
	  <tr>
	    <td>'.utf8_encode($responsable).'</td>
        <td colspan="2">'.nl2br($address).'&nbsp;</td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td><table width="550" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" align="center" bgcolor="#003366"><span class="Estilo1">DATOS DEL PROVEEDOR</span></td>
        </tr>
      <tr>
        <td width="23%"><b>Raz&oacute;n Social</b></td>
        <td width="">'.$infS['razonSocial'].'</td>
        <td width="27%"><b>Calle</b></td>
        <td width="">'.$infS['address'].'</td>
      </tr>
      <tr>
        <td><b>RFC</b></td>
        <td>'.$infS['rfc'].'</td>
        <td><b>Colonia</b></td>
        <td>'.$infS['colonia'].'</td>
      </tr>
      <tr>
        <td><b>Tel&eacute;fonos</b></td>
        <td>'.$infS['phone'].'</td>
        <td><b>Delegaci&oacute;n o Municipio</b></td>
        <td>'.$infS['city'].'</td>
      </tr>
      <tr>
        <td><b>C.P.</b></td>
        <td>'.$infS['postalCode'].'</td>
        <td><b>Estado</b></td>
        <td>'.$infS['state'].'</td>
      </tr>     
    </table></td>
  </tr>
  
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="6" align="center" bgcolor="#003366"><span class="Estilo1">PRODUCTO</span></td>
        </tr>
      <tr>
        <td width="8%" align="center" bgcolor="#CCCCCC">NO. REQ.</td>
		<td width="11%" align="center" bgcolor="#CCCCCC">CANTIDAD</td>
		<td width="9%" align="center" bgcolor="#CCCCCC">UNIDAD</td>
        <td width="" align="center" bgcolor="#CCCCCC">DESCRIPCION</td>
        <td width="11%" align="center" bgcolor="#CCCCCC">P/U M.N.</td>
        <td width="17%" align="center" bgcolor="#CCCCCC">IMPORTE</td>
      </tr>';
		
		$orderBuy->setOrderBuyId($orderBuyId);
		$resMat = $orderBuy->EnumItems();
		
		$reqIdAnt = 0;
		$materials = array();
		foreach($resMat as $n => $res){
						
			$requisicion->setRequisicionId($res['requisicionId']);
			$infR = $requisicion->Info();
			
			$conceptMat->setConceptMatId($res['conceptMatId']);
			$infCM = $conceptMat->Info();
			
			$concept->setConceptId($infCM['conceptId']);
			$card['concepto'] = $concept->GetNameById();
			
			$material->setMaterialId($infCM['materialId']);
			$infM = $material->Info();
		
			$unit->setUnitId($infM['unitId']);
			$unidad = $unit->GetClaveById();
			
			$card['steel'] = $infR['steel'];
			
			if($infR['steel']){
				$reqLevel->setRequisicionId($res['requisicionId']);
				$resItems = $reqLevel->EnumerateAll();
			}else{			
				$reqItem->setRequisicionId($res['requisicionId']);
				$resItems = $reqItem->EnumerateAll();
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
		
			$projType->setProjTypeId($infR['projTypeId']);
			$card['type'] = $projType->GetNameById();
			
			$card['requisicionId'] = $res['requisicionId'];
			$card['material'] = $infM['name'];
			$card['quantity'] = $res['quantity'];
			$card['unit'] = $unidad;
			$card['price'] = $res['price'];
			$card['total'] = $res['total'];
			$card['showInfo'] = 0;
			
			if($reqIdAnt == 0)
				$card['reqId'] = $res['requisicionId'];
			else
				$card['reqId'] = '';	
			
			if($reqIdAnt != 0 && $reqIdAnt != $res['requisicionId']){
				$materials[$n-1]['showInfo'] = 1;
				$card['reqId'] = $res['requisicionId'];
			}
			
			$reqIdAnt = $res['requisicionId'];
			
			$materials[$n] = $card;
			
		}//foreach
		
		if($materials)
			$materials[$n]['showInfo'] = 1;
		
		$numProds = 0;
		$prods = array();
		foreach($materials as $res){
			if($res['reqId'])
				$reqId = $res['reqId'];
				
			$numProds++;
			
			if($res['showInfo'] == 1){
				$prods[$reqId] = $numProds;
				$numProds = 0;
			}
		}
		
		foreach($materials as $res){
				
			  $reqId = $res['reqId'];
				
			  $html .= '<tr>';
			  
			  if($res['reqId'])
			  	$html .='<td align="center" rowspan="'.$prods[$reqId].'" valign="top">'.$res['reqId'].'</td>';
			  
			  $html .= '<td align="center" valign="top">'.number_format($res['quantity'],0).'</td>
			  <td align="center" valign="top">'.$res['unit'].'</td>
			  <td valign="top"><b>'.utf8_encode($res['material']).'</b></td>
			  <td align="right" valign="top">'.number_format($res['price'],2).'</td>
			  <td align="right" valign="top">'.number_format($res['total'],2).'</td>
			  </tr>';
			  
			  if($res['showInfo'])
			  	$html .= '<tr><td colspan="6" style="border-bottom:1px solid #CCCCCC"></td></tr>
						  <tr><td colspan="6">&nbsp;</td></tr>';
		 
		}
		
	$subtotal = $info['total'];
	$ivaPorc = 16;
	$iva = 0.16;
		
	$ivaTotal = $subtotal * $iva;
	$ivaTotal = number_format($ivaTotal,2);
	
	$total = $subtotal + $ivaTotal;
	
	$total = number_format($total,2);
	 
$html .= '   
      <tr>
        <td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="31%" align="center"><b>TIEMPO DE ENTREGA</b></td>
            <td colspan="2" align="center"><b>CONDICIONES</b></td>
            </tr>
          <tr>
            <td align="center">&nbsp;'.$deliveryTime.'</td>
            <td colspan="2" align="center">'.$conditions.'</td>
          </tr>
          <tr>
            <td align="center"><b>ASESOR</b></td>
            <td width="37%" align="center"><b>ELABORADOR POR</b></td>
            <td width="32%" align="center"><b>AUTORIZADO POR</b></td>
          </tr>
          <tr>
            <td align="center">'.$asesor.'</td>
            <td align="center">'.$elaborado.'</td>
            <td align="center">'.$autorizado.'</td>
          </tr>
        </table></td>
        <td valign="top">
		<b>SUBTOTAL</b> <br>
		<b>IVA '.$ivaPorc.'%</b> <br>
		<b>TOTAL</b>
		</td>
        <td align="right" valign="top">
		'.number_format($subtotal,2).'<br>
		'.$ivaTotal.'<br>
		'.$total.'
		</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>';

if($info['comments']){
	$html .= '
	<b>COMENTARIOS:</b> '.nl2br($info['comments']);
}

$html .= '
</body>
</html>
';


	if($type == 'normal')
		$costeo->ResetSessionVars();
		
	$dompdf = new DOMPDF();
	$dompdf->set_paper('letter');
	$dompdf->load_html($html);
	$dompdf->render();
	
	$dompdf->stream("orden_compra.pdf", array('Attachment' => 0));

?>