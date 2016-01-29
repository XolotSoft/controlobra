<?php


class EstimacionPayment extends Main
{
	private $estimacionPaymentId;
	private $estimacionId;
	private $projectId;
	private $supplierId;
	private $total;
	private $pagado;
	private $revisado;
	private $fecha;
	private $tipo;
	private $status;
	private $statusCheque;
	
	private $estimacionPagoId;
	private $bankId;
	private $quantity;
	private $currency;
	private $noCheque;
	private $noInvoice;
	private $obsCancel;
	
	private $nombre;
	private $motivoCancel;
	
	public function setEstimacionPaymentId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionPaymentId = $value;
	}
	
	public function setEstimacionPagoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionPagoId = $value;
	}
	
	public function setEstimacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionId = $value;
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
	
	public function setTipo($value)
	{
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
	
	public function Enumerate($status = '0')
	{
		$sqlFilter = ' AND revisado = "1"';
	
		if($status != '')
			$sqlFilter .= ' AND pagado = "'.$status.'"';
		
		$sql = 'SELECT * FROM estimacion_payment 
			   WHERE projectId = "'.$this->projectId.'"	
			   AND tipo = "'.$this->tipo.'"
			   '.$sqlFilter.' 								  
			   ORDER BY fecha ASC ';				
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumRevisado($status = '0')
	{
		if($status != '')
			$sqlFilter = ' AND revisado = "'.$status.'"';
			
		$this->Util()->DB()->setQuery('SELECT * FROM estimacion_payment 
									   WHERE projectId = "'.$this->projectId.'"	
									   AND tipo = "'.$this->tipo.'"
									   '.$sqlFilter.' 								  
									   ORDER BY fecha ASC ');
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumRevisado2($status = '0')
	{
		if($status != '')
			$sqlFilter = ' AND revisado = "'.$status.'"';
			
		$this->Util()->DB()->setQuery('SELECT * FROM estimacion_payment 
									   WHERE projectId = "'.$this->projectId.'"	
									   AND tipo = "'.$this->tipo.'"
									   AND total > 0
									   '.$sqlFilter.' 								  
									   ORDER BY fecha ASC ');
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumCheques($status = '0')
	{				
		$sql = 'SELECT COUNT(*) FROM estimacion_pagos
				WHERE projectId = "'.$this->projectId.'"
				AND tipo = "Cheque"'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/estimacion-cheques');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		
		$sql = 'SELECT * FROM estimacion_pagos
			   WHERE projectId = "'.$this->projectId.'"
			   AND tipo = "Cheque"'.$sqlFilter.' 
			   ORDER BY fecha DESC '.$sql_add;
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
					estimacion_payment
				WHERE 
					estimacionPaymentId = "'.$this->estimacionPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
		
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					estimacion_payment 
					(	
						projectId,
						estimacionId,
						supplierId,						
						total,
						pagado,
						fecha,
						tipo
					)
				 VALUES 
					(									
						"'.$this->projectId.'",
						"'.$this->estimacionId.'",
						"'.$this->supplierId.'",												
						"'.$this->total.'",
						"0",
						"'.$this->fecha.'",
						"'.$this->tipo.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$estPaymentId = $this->Util()->DB()->InsertData();
						
		return $estPaymentId;	
	
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					estimacion_payment
				WHERE 
					estimacionPaymentId = '.$this->estimacionPaymentId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_pagos
				WHERE 
					estimacionPaymentId = '.$this->estimacionPaymentId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10113, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdatePagado()
	{		
		$sql = 'UPDATE
					estimacion_payment
				SET 
					pagado = "'.$this->pagado.'"
				WHERE 
					estimacionPaymentId = "'.$this->estimacionPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
				
		return true;
	}
	
	public function UpdateRevisado()
	{		
		$sql = 'UPDATE
					estimacion_payment
				SET 
					revisado = "'.$this->revisado.'"
				WHERE 
					estimacionPaymentId = "'.$this->estimacionPaymentId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
				
		return true;
	}
		
	/*** PAGOS ***/
	
	public function SavePago(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		 $sql = 'INSERT INTO 
					estimacion_pagos
					(	
						projectId,
						estimacionId,
						estimacionPaymentId,
						supplierId,
						bankId,					
						quantity,						
						noCheque,
						noInvoice,					
						fecha,
						tipo
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->estimacionId.'",
						"'.$this->estimacionPaymentId.'",
						"'.$this->supplierId.'",
						"'.$this->bankId.'",
						"'.$this->quantity.'",						
						"'.$this->noCheque.'",
						"'.$this->noInvoice.'",
						"'.$this->fecha.'",
						"'.$this->tipo.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$estimacionPagoId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10111, 'complete');
		$this->Util()->PrintErrors();
		
		return $estimacionPagoId;
				
	}
	
	public function DeletePago(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					estimacion_pagos
				WHERE 
					estimacionPagoId = '.$this->estimacionPagoId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10113, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function CancelPago()
	{		
		$sql = 'UPDATE
					estimacion_pagos
				SET 
					status = "Cancelado",
					obsCancel = "'.utf8_decode($this->obsCancel).'",
					fechaCancel = "'.$this->fecha.'"
				WHERE 
					estimacionPagoId = "'.$this->estimacionPagoId.'"';	
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
					estimacion_pagos
				WHERE 
					estimacionPagoId = "'.$this->estimacionPagoId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function EnumPagos()
	{				
		$sql = 'SELECT * FROM estimacion_pagos
				WHERE estimacionPaymentId = "'.$this->estimacionPaymentId.'"
				ORDER BY fecha DESC ';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function GetTotalPagos()
	{
		 $sql = 'SELECT SUM(quantity) FROM estimacion_pagos
				WHERE status = "Activo"
				AND estimacionPaymentId = "'.$this->estimacionPaymentId.'"';		
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
						
		return $total;
	}
	
	public function EnumPagosByTipo()
	{				
		$sql = 'SELECT * FROM estimacion_pagos
				WHERE tipo = "'.$this->tipo.'"
				AND projectId = "'.$this->projectId.'"
				ORDER BY fecha DESC ';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	/*** CANCELAR CHEQUE ***/
	
	public function CancelCheque(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE estimacion_pagos
				SET status = "Cancelado",
				obsCancel = "'.utf8_decode($this->motivoCancel).'",
				fechaCancel = "'.$this->fecha.'"
				WHERE estimacionPagoId = "'.$this->estimacionPagoId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(11024, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
	}
	
	function UpdateRecogerCheque(){
		
		if($this->Util()->PrintErrors())
			return false; 
		
		$sql = 'UPDATE estimacion_pagos
				SET personaRecoger = "'.$this->nombre.'",
					fechaRecoger = "'.$this->fecha.'",
					statusCheque = "Recogido"
				WHERE estimacionPagoId = "'.$this->estimacionPagoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10112, 'complete');
		$this->Util()->PrintErrors();
		
		return true;		
	}
	
	function UpdateCobrarCheque(){
		
		if($this->Util()->PrintErrors())
			return false; 
		
		$sql = 'UPDATE estimacion_pagos
				SET fechaCobro = "'.$this->fecha.'",
					statusCheque = "Cobrado"
				WHERE estimacionPagoId = "'.$this->estimacionPagoId.'"';
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
		
		$sql = 'SELECT * FROM estimacion_pagos
				WHERE projectId = "'.$this->projectId.'"
				AND tipo = "Cheque"'.$sqlFilter.'
				ORDER BY fecha DESC';	
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
				
}

?>