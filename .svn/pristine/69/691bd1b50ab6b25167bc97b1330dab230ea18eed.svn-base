<?php

class Contract extends Main
{
	private $contractId;	
	private $projectId;
	private $noContract;
	private $tipoClte;
	private $projItemId;
	private $projLevelId;
	private $projDeptoId;
	private $total;
	private $abono;
	private $saldo;
	private $fechaIniCont;
	private $fechaIniPagos;
	private $noTerrazas;
	private $jardines;
	private $customerId;
	private $currency;
	private $priceM2;
	private $m2Depto;
	private $noCajones;
	private $noBodegas;
	private $status;
	
	private $projCajonId;
	private $projBodegaId;
	
	private $contExpiryId;
	private $noExpiry;
	private $monto;
	private $fecha;
	private $obs;
	private $mantEquipId;
			
	public function setContractId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->contractId = $value;
	}
		
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setNoContract($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Contrato'))
			$this->noContract = $value;
	}
	
	public function setTipoClte($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo Cliente'))
			$this->tipoClte = $value;
	}
	
	public function setProjItemId($value)
	{
		//if($this->Util()->ValidateRequireField($value, 'Torre'))
		$this->projItemId = $value;
	}
	
	public function setProjLevelId($value)
	{
		//if($this->Util()->ValidateRequireField($value, 'Nivel'))
		$this->projLevelId = $value;
	}
	
	public function setProjDeptoId($value)
	{
		//if($this->Util()->ValidateRequireField($value, 'Departamento'))
		$this->projDeptoId = $value;
	}
	
	public function setTotal($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Valor Total'))
			if($this->Util()->ValidateDecimal($value, 'Valor Total'))
				$this->total = $value;
	}
	
	public function setAbono($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Enganche'))
				$this->abono = $value;
	}
	
	public function setSaldo($value)
	{
		$this->saldo = $value;
	}
	
	public function setFechaIniCont($value)
	{
		$this->fechaIniCont = $value;
	}
	
	public function setFechaIniPagos($value)
	{
		$this->fechaIniPagos = $value;
	}
	
	public function setNoTerrazas($value)
	{
		$this->noTerrazas = $value;
	}
			
	public function setJardines($value)
	{
		$this->jardines = $value;
	}
	
	public function setCustomerId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cliente'))
			$this->customerId = $value;
	}
	
	public function setCurrency($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Moneda'))
			$this->currency = $value;
	}
	
	public function setPriceM2($value)
	{
		$this->priceM2 = $value;
	}
	
	public function setM2Depto($value)
	{
		$this->m2Depto = $value;
	}
	
	public function setNoCajones($value)
	{
		$this->noCajones = $value;
	}
	
	public function setNoBodegas($value)
	{
		$this->noBodegas = $value;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	public function setProjCajonId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Caj&oacute;n de Estacionamiento'))
			$this->projCajonId = $value;
	}
	
	public function setProjBodegaId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Bodega'))
			$this->projBodegaId = $value;
	}
	
	public function setContExpiryId($value)
	{
		$this->contExpiryId = $value;
	}
	
	public function setNoExpiry($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Vencimieto'))
			$this->noExpiry = $value;
	}
	
	public function setMonto($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Monto'))
			$this->monto = $value;
	}
	
	public function setFecha($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Fecha'))
			$this->fecha = $value;
	}
	
	public function setObs($value)
	{
		$this->obs = $value;
	}
	
	public function setMantEquipId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Monto'))
			$this->mantEquipId = $value;
	}
	
	public function setMontoEng($value)
	{
		$this->Util()->ValidateRequireField($value, 'Monto Enganche');
	}
	
	public function setFechaEng($value)
	{
		$this->Util()->ValidateRequireField($value, 'Fecha Enganche');
	}
	
	public function setMontoMant($value)
	{
		$this->Util()->ValidateRequireField($value, 'Monto Mantenimiento');
	}
	
	public function setFechaMant($value)
	{
		$this->Util()->ValidateRequireField($value, 'Fecha Mantenimiento');
	}
	
	public function setMontoEquip($value)
	{
		$this->Util()->ValidateRequireField($value, 'Monto Equipamiento');
	}
	
	public function setFechaEquip($value)
	{
		$this->Util()->ValidateRequireField($value, 'Fecha Equipamiento');
	}
	
	public function EnumAllForTransfer()
	{				
		$sql = 'SELECT 
					* 
				FROM contract 
				WHERE 
					contractId <> "'.$this->contractId.'"
				AND
					customerId = "'.$this->customerId.'"
				AND
					status = "Activo"	
				ORDER BY 
					noContract ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
	
		return $result;
	}
	
	
	public function EnumerateAll()
	{				
		$sql = 'SELECT * FROM contract 
				ORDER BY noContract ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM contract WHERE projectId = "'.$this->projectId.'"');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/contract");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM contract 
									   WHERE projectId = "'.$this->projectId.'"
									   ORDER BY noContract DESC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
	
	public function Enumerate2()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM contract WHERE projectId = "'.$this->projectId.'"');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/resumen-contract");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM contract 
									   WHERE projectId = "'.$this->projectId.'"
									   ORDER BY noContract DESC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
	
	public function EnumByTipoClte()
	{				
		$sql = 'SELECT COUNT(*) FROM contract c, customer cust
				WHERE c.customerId = cust.customerId
				AND (cust.category = "inversionista" || cust.category = "comprador")
				AND c.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/resumen-contract");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		
		$sql = 'SELECT c.* FROM contract c, customer cust
				WHERE c.customerId = cust.customerId
				AND (cust.category = "inversionista" || cust.category = "comprador")
				AND c.projectId = "'.$this->projectId.'"
				ORDER BY noContract DESC '.$sql_add;
		$this->Util()->DB()->setQuery($sql);
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
					contract 
				WHERE 
					contractId = '".$this->contractId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function InfoCancel()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					contract_cancel
				WHERE 
					contractId = '".$this->contractId."'";
	
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
					contract 
					(										
						projectId,
						noContract,
						tipoClte,
						projItemId,
						projLevelId,
						projDeptoId,
						total,
						abono,
						saldo,
						fechaIniCont,
						fechaIniPagos,
						noTerrazas,						
						jardines,
						customerId,
						currency,
						priceM2,
						m2Depto,
						noCajones,
						noBodegas,
						notas,
						status								
					)
				 VALUES 
					(					
						'".$this->projectId."',
						'".$this->noContract."',
						'".$this->tipoClte."',
						'".$this->projItemId."',
						'".$this->projLevelId."',
						'".$this->projDeptoId."',
						'".$this->total."',
						'".$this->abono."',
						'".$this->saldo."',
						'".$this->fechaIniCont."',
						'".$this->fechaIniPagos."',
						'".$this->noTerrazas."',				
						'".$this->jardines."',
						'".$this->customerId."',
						'".$this->currency."',
						'".$this->priceM2."',
						'".$this->m2Depto."',
						'".$this->noCajones."',
						'".$this->noBodegas."',
						'".$this->obs."',
						'".$this->status."'
					)";								
		$this->Util()->DB()->setQuery($sql);
		$contractId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10096, "complete");
		$this->Util()->PrintErrors();
		
		return $contractId;				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					contract SET 				 	
					projectId = '".$this->projectId."',					
					noContract = '".$this->noContract."',
					tipoClte = '".$this->tipoClte."',
					projItemId = '".$this->projItemId."',
					projLevelId = '".$this->projLevelId."',
					projDeptoId = '".$this->projDeptoId."',
					total = '".$this->total."',
					abono = '".$this->abono."',
					saldo = '".$this->saldo."',
					fechaIniCont = '".$this->fechaIniCont."',
					fechaIniPagos = '".$this->fechaIniPagos."',
					noTerrazas = '".$this->noTerrazas."',				
					jardines = '".$this->jardines."',
					customerId = '".$this->customerId."',
					currency = '".$this->currency."',
					priceM2 = '".$this->priceM2."',
					m2Depto = '".$this->m2Depto."',
					noCajones = '".$this->noCajones."',
					noBodegas = '".$this->noBodegas."',
					notas = '".$this->obs."'
				WHERE 
					contractId = ".$this->contractId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10097, "complete");
		$this->Util()->PrintErrors();
		
		return true;				
	}
	
	public function Cancel(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
			
		$sql = "UPDATE 
					contract
				SET
					 status = 'Cancelado'
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(11008, "complete");
		$this->Util()->PrintErrors();
		
		return true;
		
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					contract
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_cajon
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_bodega
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_expiry
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_payment
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_pago
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_cancel
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					contract_cheque
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10098, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function ExistDepto()
	{
		
		if($this->contractId)
			$sqlFilter = ' AND contractId <> "'.$this->contractId.'"';
					
		$sql = 'SELECT 
					contractId 
				FROM 
					contract
				WHERE
					projDeptoId = "'.$this->projDeptoId.'"
				'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$contractId = $this->Util()->DB()->GetSingle();
		
		if($contractId){
			$this->Util()->setError(11003, "error");
			$this->Util()->PrintErrors();
			return true;
		}
		
		return false;		
	}
	
	public function EnumItemsByCustomer()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'
				AND
					customerId = '".$this->customerId."'
				ORDER BY
					contractId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumItems()
	{
		if($this->status)
			$sqlFilter = ' AND status = "'.$this->status.'"';
			
		$sql = "SELECT 
					* 
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'
				".$sqlFilter."
				GROUP BY
					projItemId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasByItem()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'
				AND
					customerId = '".$this->customerId."'
				AND
					projItemId = '".$this->projItemId."'
				ORDER BY
					contractId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasByItem2()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'				
				AND
					projItemId = '".$this->projItemId."'
				ORDER BY
					contractId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCustByDepto()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'				
				AND
					projItemId = '".$this->projItemId."'
				AND
					projDeptoId = '".$this->projDeptoId."'
				ORDER BY
					contractId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCustomers()
	{
		if($this->status)
			$sqlFilter = ' AND cont.status = "'.$this->status.'"';
		
		$sql = "SELECT 
					cont.customerId, cust.name
				FROM 				
					contract AS cont, customer AS cust
				WHERE
					cont.projectId = '".$this->projectId."'
				AND
					cont.customerId = cust.customerId
				".$sqlFilter."
				ORDER BY
					cust.name ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCustPayment()
	{
		if($this->status)
			$sqlFilter = ' AND cont.status = "'.$this->status.'"';
		
		$sql = "SELECT 
					cont.customerId, cust.name
				FROM 				
					contract AS cont, customer AS cust
				WHERE
					cont.projectId = '".$this->projectId."'
				AND
					cont.customerId = cust.customerId
				".$sqlFilter."
				GROUP BY 
					cont.customerId
				ORDER BY
					cust.name ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetContractId()
	{
		$sql = "SELECT 
					contractId
				FROM 				
					contract
				WHERE
					projectId = '".$this->projectId."'
				AND
					customerId = '".$this->customerId."'
				AND
					projItemId = '".$this->projItemId."'
				AND
					projDeptoId = '".$this->projDeptoId."'
				ORDER BY
					contractId ASC";
								
		$this->Util()->DB()->setQuery($sql);
		$contractId = $this->Util()->DB()->GetSingle();
				
		return $contractId;
	}
	
	public function GetAllDocs()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry					
				WHERE
					contractId = '".$this->contractId."'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					noExpiry <> 'Enganche'
				ORDER BY
					fecha ASC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetDocsVencidos()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry					
				WHERE
					contractId = '".$this->contractId."'
				AND
					fecha < '".$this->fecha."'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					noExpiry <> 'Enganche'
				ORDER BY
					fecha ASC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetDocsVigentes()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry					
				WHERE
					contractId = '".$this->contractId."'
				AND
					fecha = '".$this->fecha."'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					noExpiry <> 'Enganche'
				ORDER BY
					fecha ASC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetMantEquipByDate()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry					
				WHERE
					contractId = '".$this->contractId."'
				AND
					fecha <= '".$this->fecha."'
				AND
				(
					noExpiry = 'Mantenimiento'
				OR
					noExpiry = 'Equipamiento'
				)
				ORDER BY
					fecha ASC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetMontoMant()
	{
		$sql = "SELECT 
					mant.*, exp.fecha
				FROM 				
					contract_expiry AS exp,
					project_mant AS mant
				WHERE
					exp.contractId = '".$this->contractId."'
				AND
					exp.mantEquipId = mant.projMantId
				AND
					exp.noExpiry = 'Mantenimiento'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
				
		return $row;
	}
	
	public function GetMontoEquip()
	{
		$sql = "SELECT 
					equip.*, exp.fecha
				FROM 				
					contract_expiry AS exp,
					project_equip AS equip
				WHERE
					exp.contractId = '".$this->contractId."'
				AND
					exp.mantEquipId = equip.projEquipId
				AND
					exp.noExpiry = 'Equipamiento'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
				
		return $row;
	}
	
	public function GetDocuments()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					noExpiry <> 'Enganche'
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetDocs()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'								
				ORDER BY 
					fecha ASC, 
					noExpiry DESC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetDocs2()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'				
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				ORDER BY 
					fecha ASC, 
					noExpiry DESC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function GetDocsMantEquip()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'				
				AND
					(noExpiry = 'Mantenimiento'
				OR
					noExpiry = 'Equipamiento')
				ORDER BY 
					fecha ASC, 
					noExpiry DESC
				";
								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function ExistCajon()
	{
		if($this->contractId)
			$sqlFilter = ' AND contractId <> "'.$this->contractId.'"';
			
		$sql = 'SELECT 
					contCajonId 
				FROM 
					contract_cajon
				WHERE
					projCajonId = "'.$this->projCajonId.'"
				'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$contCajonId = $this->Util()->DB()->GetSingle();
		
		if($contCajonId){
			$this->Util()->setError(11004, "error");
			$this->Util()->PrintErrors();
			return true;
		}
		
		return false;
	}
	
	public function ExistBodega()
	{
		if($this->contractId)
			$sqlFilter = ' AND contractId <> "'.$this->contractId.'"';
			
		$sql = 'SELECT 
					contBodegaId 
				FROM 
					contract_bodega
				WHERE
					projBodegaId = "'.$this->projBodegaId.'"
				'.$sqlFilter;
		$this->Util()->DB()->setQuery($sql);
		$contBodegaId = $this->Util()->DB()->GetSingle();
		
		if($contBodegaId){
			$this->Util()->setError(11006, "error");
			$this->Util()->PrintErrors();
			return true;
		}
		
		return false;
	}
	
	//CAJONES
	
	public function EnumCajones()
	{
		$sql = "SELECT 
					cc.* 
				FROM 				
					contract_cajon AS cc, project_cajon AS pc
				WHERE
					cc.projCajonId = pc.projCajonId
				AND
					cc.contractId = '".$this->contractId."'
				ORDER BY
					pc.name ASC";								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function SaveCajon()
	{
		$sql = "INSERT INTO 
					contract_cajon
					(										
						projectId,
						contractId,						
						projCajonId														
					)
				 VALUES 
					(					
						'".$this->projectId."',
						'".$this->contractId."',
						'".$this->projCajonId."'						
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
				
		return true;
	}
	
	public function DeleteCajones(){
				
		$sql = "DELETE FROM 
					contract_cajon
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
				
	}
	
	//BODEGAS
	
	public function EnumBodegas()
	{
		$sql = "SELECT 
					cb.* 
				FROM 				
					contract_bodega AS cb, project_bodega AS pb
				WHERE
					cb.projBodegaId = pb.projBodegaId
				AND
					cb.contractId = '".$this->contractId."'
				ORDER BY
					pb.name ASC";								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function SaveBodega()
	{
		$sql = "INSERT INTO 
					contract_bodega
					(										
						projectId,
						contractId,						
						projBodegaId														
					)
				 VALUES 
					(					
						'".$this->projectId."',
						'".$this->contractId."',
						'".$this->projBodegaId."'						
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
		
		return true;
	}
	
	public function DeleteBodegas(){
				
		$sql = "DELETE FROM 
					contract_bodega
				WHERE 
					contractId = ".$this->contractId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
				
	}
	
	//EXPIRY
	
	public function EnumExpiry()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				ORDER BY
					fecha ASC";								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetEnganche()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				AND
					noExpiry = 'Enganche'";
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
				
		return $row;
	}
	
	public function EnumExpiryByFecha()
	{
		$sql = "SELECT 
					* 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				ORDER BY
					fecha ASC";								
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetTotalDocsVencidos()
	{
		$sql = "SELECT 
					SUM(monto) 
				FROM 				
					contract_expiry
				WHERE
					noExpiry <> 'Enganche'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					contractId = '".$this->contractId."'
				AND
					fecha < '".$this->fecha."'";								
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function EnumDocs()
	{
		$sql = "SELECT 
					*
				FROM 				
					contract_expiry
				WHERE
					noExpiry <> 'Enganche'
				AND
					noExpiry <> 'Mantenimiento'
				AND
					noExpiry <> 'Equipamiento'
				AND
					contractId = '".$this->contractId."'
				ORDER BY fecha ASC";								
		$this->Util()->DB()->setQuery($sql);
		$docs = $this->Util()->DB()->GetResult();
				
		return $docs;
	}
	
	public function GetNoDocsByMonto()
	{
		$sql = "SELECT 
					COUNT(*) 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				AND 
					monto = '".$this->monto."'";								
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function GetFechaIniDocByMonto()
	{
		$sql = "SELECT 
					fecha 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				AND 
					monto = '".$this->monto."'
				ORDER BY fecha ASC
				LIMIT 1";								
		$this->Util()->DB()->setQuery($sql);
		$fecha = $this->Util()->DB()->GetSingle();
				
		return $fecha;
	}
	
	public function GetFechaFinDocByMonto()
	{
		$sql = "SELECT 
					fecha 
				FROM 				
					contract_expiry
				WHERE
					contractId = '".$this->contractId."'
				AND 
					monto = '".$this->monto."'
				ORDER BY fecha DESC
				LIMIT 1";								
		$this->Util()->DB()->setQuery($sql);
		$fecha = $this->Util()->DB()->GetSingle();
				
		return $fecha;
	}
	
	public function SaveExpiry()
	{
		$sql = "INSERT INTO 
					contract_expiry
					(										
						projectId,
						contractId,
						mantEquipId,					
						noExpiry,
						monto,
						fecha,
						obs
					)
				 VALUES 
					(					
						'".$this->projectId."',
						'".$this->contractId."',
						'".$this->mantEquipId."',
						'".$this->noExpiry."',
						'".$this->monto."',
						'".$this->fecha."',
						'".$this->obs."'
					)";								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
		
		return true;
	}
	
	public function UpdateExpiry()
	{
		$sql = "UPDATE 
					contract_expiry
				SET	
					noExpiry = '".$this->noExpiry."',
					monto = '".$this->monto."',
					fecha = '".$this->fecha."',
					obs = '".$this->obs."',
					mantEquipId = '".$this->mantEquipId."'
				WHERE
					contExpiryId = '".$this->contExpiryId."'";
								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		return true;
	}
	
	public function DeleteExpiry(){
				
		$sql = "DELETE FROM 
					contract_expiry
				WHERE 
					contExpiryId = '".$this->contExpiryId."'";
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
				
	}
	
	public function OrderDocs($documents){
		
		global $util;
		
		$docs = array();
		foreach($documents as $k => $res){
			$card['date'] = $res['date'];
			$card['k'] = $k;
			
			$docs[] = $card;
		}
				
		$ordDocs = $util->orderMultiDimensionalArray($docs,'date');
		
		echo '<pre>';
		print_r($ordDocs);
		echo '</pre>';
		
		$i = 1;
		$docsExp = array();
		foreach($ordDocs as $o => $res){
			$k = $res['k'];	
			
			$tmp = $documents[$k];
			
			$card2['noExpiry'] = 'Doc. '.$i;
			$card2['monto'] = $tmp['monto'];
			$card2['fecha'] = $tmp['fecha'];
			
			$i++;
			
			$docsExp[$o] = $card2;
		}
		
		echo '*******************************';
		echo '<pre>';
		print_r($docsExp);
		echo '</pre>';
		
		return $docsExp;
		
	}
	
	public function GetItemsByProject(){
		
		$sql = 'SELECT c.projItemId, i.name FROM contract AS c, project_item AS i
				WHERE c.projectId = "'.$this->projectId.'"
				AND c.projItemId = i.projItemId
				AND c.status = "Activo"
				GROUP BY c.projItemId
				ORDER BY i.name';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumByItem(){
		
		$sql = 'SELECT * FROM contract
				WHERE projectId = "'.$this->projectId.'"
				AND projItemId = "'.$this->projItemId.'"
				AND status = "Activo"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetTotalDeptosVen(){
		
		$sql = 'SELECT COUNT(*) FROM contract
				WHERE projectId = "'.$this->projectId.'"
				AND status = "Activo"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
	
	function GetTotalVendido(){
		
		$sql = 'SELECT SUM(total)
				FROM contract
				WHERE  projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
	
}


?>