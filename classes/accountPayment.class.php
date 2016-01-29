<?php

class AccountPayment extends Main
{
	private $accountPaymentId;
	private $orderBuyId;
	private $projectId;
	private $supplierId;
	private $total;
	private $pagado;
	private $revisado;
	private $fecha;
	private $fechaFin;
	private $tipo;
	private $status;
	private $statusCheque;
	
	private $accountPagoId;
	private $bankId;
	private $quantity;
	private $currency;
	private $noCheque;
	private $noInvoice;
	private $obsCancel;
	
	private $nombre;
	private $motivoCancel;
	private $seccion;
	
	public function setAccountPaymentId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->accountPaymentId = $value;
	}
	
	public function setAccountPagoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->accountPagoId = $value;
	}
	
	public function setOrderBuyId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->orderBuyId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setSupplierId($value)
	{
		$this->supplierId = $value;
	}
						
	public function setTotal($value)
	{
		$this->total = $value;
	}
	
	public function setPagado($value)
	{
		$this->pagado = $value;
	}
	
	public function setRevisado($value)
	{
		$this->revisado = $value;
	}
		
	public function setFecha($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Fecha'))
			$this->fecha = $value;
	}
	
	public function setFechaFin($value)
	{
		$this->fechaFin = $value;
	}
	
	public function setTipo($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo de Pago'))
			$this->tipo = $value;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	public function setStatusCheque($value)
	{
		$this->statusCheque = $value;
	}
	
	public function setBankId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cuenta Bancaria'))
			$this->bankId = $value;
	}
	
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			$this->quantity = $value;
	}
	
	public function setCurrency($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Moneda'))
			$this->currency = $value;
	}
	
	public function setNoCheque($value)
	{
		$this->noCheque = $value;
	}
	
	public function setNoInvoice($value)
	{
		$this->noInvoice = $value;
	}
	
	public function setObsCancel($value)
	{
		$this->obsCancel = $value;
	}
	
	public function setNombre($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre de la Persona'))
			$this->nombre = $value;
	}
	
	public function setMotivoCancel($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Motivo de la Cancelaci&oacute;n'))
			$this->motivoCancel = $value;
	}
	
	public function setSeccion($value)
	{
		$this->seccion = $value;
	}
				
	public function Enumerate($status = '0')
	{
		$sqlFilter = ' AND a.revisado = "1"';
		
		if($status == 0 || $status == 1)
			$sqlFilter .= ' AND a.pagado = "'.$status.'"';
				
		$sql = 'SELECT COUNT(*) FROM account_payment AS a, order_buy AS o
				WHERE a.projectId = "'.$this->projectId.'"
				AND o.orderBuyId = a.orderBuyId
				AND o.enviado = "1"'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/account-dopayment');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		
		$sql = 'SELECT * FROM account_payment AS a, order_buy AS o
			   WHERE a.projectId = "'.$this->projectId.'"
			   AND o.orderBuyId = a.orderBuyId
			   AND o.enviado = "1"'.$sqlFilter.' 
			   ORDER BY a.fecha ASC '.$sql_add;
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumCheques($status = '0')
	{				
		$sql = 'SELECT COUNT(*) FROM account_pagos
				WHERE projectId = "'.$this->projectId.'"
				AND tipo = "Cheque"'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/account-cheques');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		
		$sql = 'SELECT * FROM account_pagos
			   WHERE projectId = "'.$this->projectId.'"
			   AND tipo = "Cheque"'.$sqlFilter.' 
			   ORDER BY fecha DESC '.$sql_add;
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumChequesAll()
	{
		$sql = 'SELECT * FROM vistaCheques
			   WHERE projectId = "'.$this->projectId.'" 
			   ORDER BY fecha DESC '.$sql_add;
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
	
	public function EnumAllSupplier()
	{
		$sql = 'SELECT supplierId FROM vistaCheques
			   WHERE projectId = "'.$this->projectId.'" 
			   GROUP BY supplierId'.$sql_add;
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
	
	public function EnumRevisado($status = '0')
	{
		if($status != '')
			$sqlFilter = ' AND a.revisado = "'.$status.'"';
		
		$sql = 'SELECT COUNT(*) FROM account_payment AS a, order_buy AS o
				WHERE a.projectId = "'.$this->projectId.'"
				AND o.orderBuyId = a.orderBuyId
				AND o.enviado = "1"'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/account-payment');
		
		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		
		$sql = 'SELECT * FROM account_payment AS a, order_buy AS o
			   WHERE a.projectId = "'.$this->projectId.'"
			   AND o.orderBuyId = a.orderBuyId
			   AND o.enviado = "1"'.$sqlFilter.' 
			   ORDER BY a.fecha ASC '.$sql_add;
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					account_payment
				WHERE 
					accountPaymentId = "'.$this->accountPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
		
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					account_payment 
					(	
						projectId,
						orderBuyId,						
						supplierId,						
						total,
						pagado,						
						fecha
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->orderBuyId.'",
						"'.$this->supplierId.'",						
						"'.$this->total.'",
						"'.$this->pagado.'",						
						"'.$this->fecha.'"						
					)';								
		$this->Util()->DB()->setQuery($sql);
		$accountPaymentId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(11010, 'complete');
		$this->Util()->PrintErrors();
		
		return $accountPaymentId;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					account_payment
				WHERE 
					accountPaymentId = '.$this->accountPaymentId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					account_pagos
				WHERE 
					accountPaymentId = '.$this->accountPaymentId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10113, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdatePagado()
	{		
		$sql = 'UPDATE
					account_payment
				SET 
					pagado = "'.$this->pagado.'"
				WHERE 
					accountPaymentId = "'.$this->accountPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
				
		return true;
	}
	
	public function UpdateRevisado()
	{		
		$sql = 'UPDATE
					account_payment
				SET 
					revisado = "'.$this->revisado.'"
				WHERE 
					accountPaymentId = "'.$this->accountPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
				
		return true;
	}
	
	/*** CANCELAR CHEQUE ***/
	
	public function CancelCheque(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE
					account_pagos
				SET 
					status = "Cancelado",
					obsCancel = "'.utf8_decode($this->motivoCancel).'",
					fechaCancel = "'.$this->fecha.'"
				WHERE 
					accountPagoId = "'.$this->accountPagoId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(11024, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
	}
	
	/*** PAGOS ***/
	
	public function SavePago(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					account_pagos
					(	
						projectId,
						orderBuyId,
						accountPaymentId,
						supplierId,
						bankId,					
						quantity,
						currency,
						noCheque,
						noInvoice,					
						fecha,
						tipo,
						status
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->orderBuyId.'",
						"'.$this->accountPaymentId.'",
						"'.$this->supplierId.'",
						"'.$this->bankId.'",
						"'.$this->quantity.'",
						"'.$this->currency.'",
						"'.$this->noCheque.'",
						"'.$this->noInvoice.'",
						"'.$this->fecha.'",
						"'.$this->tipo.'",
						"'.$this->status.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$accountPagoId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10111, 'complete');
		$this->Util()->PrintErrors();
		
		return $accountPagoId;
				
	}
	
	public function DeletePago(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					account_pagos
				WHERE 
					accountPagoId = '.$this->accountPagoId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10113, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function CancelPago()
	{		
		$sql = 'UPDATE
					account_pagos
				SET 
					status = "Cancelado",
					obsCancel = "'.utf8_decode($this->obsCancel).'",
					fechaCancel = "'.$this->fecha.'"
				WHERE 
					accountPagoId = "'.$this->accountPagoId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(11024, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
	}
	
	public function InfoPago()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					account_pagos
				WHERE 
					accountPagoId = "'.$this->accountPagoId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function EnumPagos()
	{				
		$sql = 'SELECT * FROM account_pagos
				WHERE accountPaymentId = "'.$this->accountPaymentId.'"
				ORDER BY fecha DESC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function GetTotalPagos()
	{
		$sql = 'SELECT SUM(quantity) FROM account_pagos
				WHERE (status = "Activo" || status = "Emitido" || status = "Recogido" || status = "Cobrado")
				AND accountPaymentId = "'.$this->accountPaymentId.'"';
		
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
						
		return $total;
	}
	
	public function GetCurrencyItems($orderBuyId)
	{
		global $orderBuy;
		global $reqMat;
		global $conceptMat;
		global $matPrice;
		
		$orderBuy->setOrderBuyId($orderBuyId);		
		$items = $orderBuy->EnumItems();
		
		$entrar = true;
		$moneda = '';
		foreach($items as $res){
			
			$reqMat->setReqMatId($res['reqMatId']);
			$infM = $reqMat->Info();
			$supplierId = $infM['supplierId'];
			
			$conceptMat->setConceptMatId($infM['conceptMatId']);
			$materialId = $conceptMat->GetMaterialId();
						
			$matPrice->setMaterialId($materialId);
			$matPrice->setSupplierId($supplierId);
			$matPriceId = $matPrice->GetMatPriceId();
			
			$matPrice->setMatPriceId($matPriceId);
			$infP = $matPrice->Info();
			
			$currency = $infP['currency'];
			
			if($entrar == true){
				$moneda = $currency;
				$entrar = false;
			}else{
				if($moneda != $currency){
					$moneda = '';
					break;
				}
			}
					
		}
		
		return $moneda;		
	}
	
	function UpdateRecogerCheque(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					account_pagos
				SET 
					personaRecoger = "'.$this->nombre.'",
					fechaRecoger = "'.$this->fecha.'",
					statusCheque = "Recogido"
				WHERE
					accountPagoId = "'.$this->accountPagoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10112, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
		
	}
	
	function UpdateCobrarCheque(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					account_pagos
				SET 
					fechaCobro = "'.$this->fecha.'",
					statusCheque = "Cobrado"
				WHERE
					accountPagoId = "'.$this->accountPagoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10112, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
		
	}
	
	public function SearchCheques()
	{
		$sqlFilter = '';
		
		if($this->noCheque)
			$sqlFilter .= ' AND noCheque = "'.$this->noCheque.'"';
		if($this->bankId)
			$sqlFilter .= ' AND bankId = "'.$this->bankId.'"';
		if($this->noInvoice)
			$sqlFilter .= ' AND noInvoice = "'.$this->noInvoice.'"';
		if($this->status)
			$sqlFilter .= ' AND status = "'.$this->status.'"';
		if($this->statusCheque)
			$sqlFilter .= ' AND statusCheque = "'.$this->statusCheque.'"';
		
		if($this->fecha)
			$sqlFilter .= ' AND fecha >= "'.$this->fecha.'"';
		if($this->fechaFin)
			$sqlFilter .= ' AND fecha <= "'.$this->fechaFin.'"';	
		
		$sql = 'SELECT * FROM account_pagos
				WHERE projectId = "'.$this->projectId.'"
				AND tipo = "Cheque"'.$sqlFilter.'
				ORDER BY fecha DESC';	
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function SearchResumenCheques()
	{
		$sqlFilter = '';
		
		if($this->seccion)
			$sqlFilter .= ' AND seccion = "'.$this->seccion.'"';
		if($this->noCheque)
			$sqlFilter .= ' AND noCheque = "'.$this->noCheque.'"';
		if($this->bankId)
			$sqlFilter .= ' AND bankId = "'.$this->bankId.'"';
		if($this->noInvoice)
			$sqlFilter .= ' AND noInvoice = "'.$this->noInvoice.'"';
		if($this->status)
			$sqlFilter .= ' AND status = "'.$this->status.'"';
		if($this->statusCheque)
			$sqlFilter .= ' AND statusCheque = "'.$this->statusCheque.'"';
		
		if($this->fecha)
			$sqlFilter .= ' AND fecha >= "'.$this->fecha.'"';
		if($this->fechaFin)
			$sqlFilter .= ' AND fecha <= "'.$this->fechaFin.'"';	
		
		$sql = 'SELECT * FROM vistaCheques
				WHERE projectId = "'.$this->projectId.'"
				'.$sqlFilter.'
				ORDER BY fecha DESC';	
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function GetConcept(){
		
		global $orderBuy;
		global $requisicion;
		global $concept;
		
		$orderBuy->setOrderBuyId($this->orderBuyId);
		$resItems = $orderBuy->EnumItems();
		
		$concepto = '';
		foreach($resItems as $res){
			$requisicion->setRequisicionId($res['requisicionId']);
			$infR = $requisicion->Info();
			
			$concept->setConceptId($infR['conceptId']);
			$concepto .= $concept->GetNameById();
			$concepto .= '<br>';
		}
		
		return $concepto;
		
	}
	
	public function GetConceptId(){
		
		global $orderBuy;
		global $requisicion;
		global $concept;
		
		$orderBuy->setOrderBuyId($this->orderBuyId);
		$resItems = $orderBuy->EnumItems();
		
		$concepto = '';
		foreach($resItems as $res){
			$requisicion->setRequisicionId($res['requisicionId']);
			$infR = $requisicion->Info();
			
			return $infR['conceptId'];
		}
		
		return 0;
	}
	
	public function CreateViewCheques(){
						
		$sql = 'TRUNCATE TABLE `vistaCheques`';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$sql = 'SELECT * FROM account_pagos WHERE tipo = "Cheque"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $res){
			$sql = 'INSERT INTO vistaCheques (chequeId, projectId, orderBuyId, seccion, quantity, currency, noCheque, 
					noInvoice, fecha, status, statusCheque, supplierId)
					VALUES ("'.$res['accountPagoId'].'","'.$res['projectId'].'","'.$res['orderBuyId'].'","R","'.$res['quantity'].'",
					"'.$res['currency'].'","'.$res['noCheque'].'","'.$res['noInvoice'].'","'.$res['fecha'].'","'.$res['status'].'","'.$res['statusCheque'].'","'.$res['supplierId'].'")';
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		
		$sql = 'SELECT * FROM estimacion_pagos WHERE tipo = "Cheque"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $res){
			$sql = 'INSERT INTO vistaCheques (chequeId, projectId, seccion, quantity, currency, noCheque, noInvoice, fecha, status, statusCheque, supplierId)
					VALUES ("'.$res['estimacionPagoId'].'","'.$res['projectId'].'","E","'.$res['quantity'].'","'.$res['currency'].'","'.$res['noCheque'].'",
					"'.$res['noInvoice'].'","'.$res['fecha'].'","'.$res['status'].'","'.$res['statusCheque'].'","'.$res['supplierId'].'")';
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		
	}//CreateViewCheques
	
	public function EnumPagosByTipo()
	{				
		$sql = 'SELECT * FROM account_pagos
				WHERE tipo = "'.$this->tipo.'"
				AND projectId = "'.$this->projectId.'"
				ORDER BY fecha DESC ';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
}

?>