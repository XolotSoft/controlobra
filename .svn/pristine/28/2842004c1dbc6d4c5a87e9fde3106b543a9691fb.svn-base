<?php

class ContractPayment extends Main
{
	private $contPaymentId;
	private $projectId;
	private $contractId;
	private $projItemId;
	private $projLevelId;
	private $projDeptoId;
	private $customerId;
	private $bankId;
	private $quantity;
	private $fecha;
	private $currency;
	private $currencyExchange;
	private $concepto;
	private $observaciones;
	private $contExpiryId;
	private $monto;
	
	private $contCancelId;
	private $qtyCheque;
	private $noCheque;
	private $qtyTraspaso;
	private $total;
	private $totalCurrency;
	private $contractId2;
	private $montoPena;
	private $totalNeto;
								
	public function setContPaymentId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->contPaymentId = $value;
	}
	
	public function setContCancelId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->contCancelId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setContractId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->contractId = $value;
	}
	
	public function setContractId2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Contrato'))
		$this->contractId = $value;
	}
	
	public function setContract2Id($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Contrato'))
		$this->contractId2 = $value;
	}
			
	public function setProjItemId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Torre'))
			$this->projItemId = $value;
	}
	
	public function setProjItemId2($value)
	{
		$this->projItemId = $value;
	}
	
	public function setProjLevelId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nivel'))
			$this->projLevelId = $value;
	}
	
	public function setProjLevelId2($value)
	{
		$this->projLevelId = $value;
	}
	
	public function setProjDeptoId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Departamento'))
			$this->projDeptoId = $value;
	}
	
	public function setProjDeptoId2($value)
	{
		$this->projDeptoId = $value;
	}
	
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			if($this->Util()->ValidateDecimal($value, 'Cantidad'))
				$this->quantity = $value;
	}
	
	public function setMonto($value)
	{
		$this->monto = $value;
	}
		
	public function setFecha($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Fecha'))
			$this->fecha = $value;
	}
		
	public function setCustomerId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cliente'))
			$this->customerId = $value;
	}
	
	public function setCustomerId2($value)
	{
		$this->customerId = $value;
	}
	
	public function setCurrency($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Moneda'))
			$this->currency = $value;
	}
	
	public function setCurrencyExchange($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo de Cambio'))
			$this->currencyExchange = $value;
	}
	
	public function setBankId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cuenta'))
			$this->bankId = $value;
	}
	
	public function setConcepto($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Concepto'))
			$this->concepto = $value;
	}
	
	public function setObservaciones($value)
	{
		$this->observaciones = $value;
	}
	
		
	public function setContExpiryId($value)
	{
		$this->contExpiryId = $value;
	}
	
	public function setQtyCheque($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			$this->qtyCheque = $value;
	}
	
	public function setNoCheque($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. Cheque'))
			$this->noCheque = $value;
	}
	
	public function setQtyTraspaso($value)
	{
		$this->qtyTraspaso = $value;
	}
	
	public function setTotal($value)
	{
		$this->total = $value;
	}
	
	public function setTotalCurrency($value)
	{
		$this->totalCurrency = $value;
	}
	
	public function setTotalNeto($value)
	{
		$this->totalNeto = $value;
	}
	
	public function setMontoPena($value)
	{
		$this->montoPena = $value;
	}
					
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM contract_payment WHERE projectId = "'.$this->projectId.'"');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/contract-payment");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM contract_payment 
									   WHERE projectId = "'.$this->projectId.'"
									   ORDER BY fecha DESC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					contract_payment 
				WHERE 
					contPaymentId = '".$this->contPaymentId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function SaveTemp(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
						
		return true;				
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					contract_payment 
					(										
						projectId,
						contractId, 			
						projItemId,
						projLevelId,
						projDeptoId,
						bankId,
						customerId,
						quantity,						
						currency,
						currencyExchange,
						concepto,
						observaciones,
						fecha									
					)
				 VALUES 
					(					
						'".$this->projectId."',
						'".$this->contractId."',
						'".$this->projItemId."',
						'".$this->projLevelId."',
						'".$this->projDeptoId."',
						'".$this->bankId."',
						'".$this->customerId."',					
						'".$this->quantity."',
						'".$this->currency."',
						'".$this->currencyExchange."',
						'".$this->concepto."',
						'".utf8_decode($this->observaciones)."',
						'".$this->fecha."'											
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$contPaymentId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10111, "complete");
		$this->Util()->PrintErrors();
		
		return $contPaymentId;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					contract_payment
				WHERE 
					contPaymentId = ".$this->contPaymentId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_pago
				WHERE 
					contPaymentId = ".$this->contPaymentId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
					
		$this->Util()->setError(10113, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function SavePago(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					contract_pago 
					(					
						contractId, 			
						contPaymentId,
						contExpiryId,
						monto						
					)
				 VALUES 
					(							
						'".$this->contractId."',
						'".$this->contPaymentId."',
						'".$this->contExpiryId."',
						'".$this->monto."'																	
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$contPagoId = $this->Util()->DB()->InsertData();
				
		return $contPagoId;
				
	}
	
	public function GetPayments()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_payment
				WHERE					
					contractId = '".$this->contractId."'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetTotalPayment()
	{
		$sql = "SELECT 
					SUM(quantity)
				FROM 				
					contract_payment
				WHERE					
					contractId = '".$this->contractId."'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function GetTotalPagoByDoc()
	{
		$sql = "SELECT 
					SUM(monto)
				FROM 				
					contract_pago
				WHERE					
					contExpiryId = '".$this->contExpiryId."'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function GetFechaPagoByDoc()
	{
		$sql = "SELECT pay.fecha
				FROM contract_pago pago, contract_payment pay
				WHERE pago.contPaymentId = pay.contPaymentId
				AND	pago.contExpiryId = '".$this->contExpiryId."'
				ORDER BY pay.fecha DESC
				LIMIT 1";								
		$this->Util()->DB()->setQuery($sql);
		$fecha = $this->Util()->DB()->GetSingle();
				
		return $fecha;
	}
	
	public function SaveTraspasos(){
		
		$sql = "INSERT INTO
					contract_cancel
				(
					qtyCheque,
					noCheque,
					contractId,
					contractId2,
					qtyTraspaso,
					currency,
					bankId,
					total,
					totalCurrency,
					montoPena,
					totalNeto,
					details
				)
				VALUES
				( 
					'".$this->qtyCheque."',
					'".$this->noCheque."',
					'".$this->contractId."',
					'".$this->contractId2."',
					'".$this->qtyTraspaso."',
					'".$this->currency."',
					'".$this->bankId."',
					'".$this->total."',
					'".$this->totalCurrency."',
					'".$this->montoPena."',
					'".$this->totalNeto."',
					'".utf8_decode($this->observaciones)."'
				)";				
							
		$this->Util()->DB()->setQuery($sql);
		$contCancelId = $this->Util()->DB()->InsertData();
		
		return $contCancelId;
		
	}
	
	//CHEQUES
	
	public function EnumCheques()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract_cheque
				WHERE
					contractId = '".$this->contractId."'
				ORDER BY
					contChequeId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function SaveCheque(){
		
		$sql = "INSERT INTO
					contract_cheque
				(
					contCancelId,
					contractId,					
					bankId,
					quantity,
					noCheque
				)
				VALUES
				( 
					'".$this->contCancelId."',					
					'".$this->contractId."',					
					'".$this->bankId."',
					'".$this->qtyCheque."',
					'".$this->noCheque."'
				)";				
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
		
		return true;
		
	}
		
}


?>