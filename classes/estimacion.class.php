<?php

class Estimacion extends Main
{
	private $estimacionId;
	private $projectId;
	private $supplierId;
	private $conceptId;
	private $qtyConcept;
	private $priceConcept;	
	private $projTypeId;
	private $projItemId;
	private $qtyArea;
	private $totalRango;
	private $estimActual;
	private $saldoRango;
	private $totalConcept;
	private $saldoConcept;
	private $retencion;
	private $totalEst;
	private $totalRetenido;
	private $cuantItemId;
	private $steel;
	private $status;
	private $fecha;
	
	private $projDeptoId;
	
	public function setEstimacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionId = $value;
	}
	
	public function setProjectId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proyecto'))
			$this->projectId = $value;
	}
	
	public function setSupplierId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Contratista'))
			$this->supplierId = $value;
	}
	
	public function setConceptId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Concepto'))
			$this->conceptId = $value;
	}
	
	public function setQtyConcept($value)
	{
		$this->qtyConcept = $value;
	}
	
	public function setPriceConcept($value)
	{
		$this->priceConcept = $value;
	}
		
	public function setProjTypeId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo de Area'))
			$this->projTypeId = $value;
	}
	
	public function setProjItemId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Torre'))
			$this->projItemId = $value;
	}
		
	public function setQtyArea($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			if($this->Util()->ValidateFieldCero($value, 'Cantidad'))			
				$this->qtyArea = $value;
	}
				
	public function setEstimActual($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Estimaci&oacute;n Actual'))
		$this->estimActual = $value;
	}
	
	public function setTotalRango($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total por Rango'))
		$this->totalRango = $value;
	}
	
	public function setSaldoRango($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Saldo por Rango'))
		$this->saldoRango = $value;
	}
	
	public function setTotalConcept($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total Concepto'))
		$this->totalConcept = $value;
	}
	
	public function setSaldoConcept($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Saldo Total Concepto'))
		$this->saldoConcept = $value;
	}
	
	public function setRetencion($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Retenci&oacute;n'))
		$this->retencion = $value;
	}
	
	public function setTotalEst($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total Estimaci&oacute;n'))
		$this->totalEst = $value;
	}
	
	public function setTotalRetenido($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total Retenido'))
		$this->totalRetenido = $value;
	}
	
	public function setProjDeptoId($value)
	{
		$this->projDeptoId = $value;
	}
	
	public function setCuantItemId($value)
	{
		$this->cuantItemId = $value;
	}
	
	public function setSteel($value)
	{
		$this->steel = $value;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	public function setFecha($value)
	{
		$this->fecha = $value;
	}
					
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM estimacion');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/estimacion');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM estimacion ORDER BY estimacionId ASC '.$sql_add);
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
					estimacion 
				WHERE 
					estimacionId = "'.$this->estimacionId.'"';
	
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
		
		$sql = 'INSERT INTO 
					estimacion 
					(	
						projectId,
						supplierId,						
						conceptId,						
						projTypeId,
						qtyConcept,
						priceConcept,
						qtyArea,						
						totalRango,
						estimActual,
						saldoRango,
						totalConcept,
						saldoConcept,
						retencion,
						totalEst,
						totalRetenido,
						steel
					)
				 VALUES 
					(									
						"'.$this->projectId.'",
						"'.$this->supplierId.'",
						"'.$this->conceptId.'",						
						"'.$this->projTypeId.'",
						"'.$this->qtyConcept.'",
						"'.$this->priceConcept.'",
						"'.$this->qtyArea.'",
						"'.$this->totalRango.'",
						"'.$this->estimActual.'",
						"'.$this->saldoRango.'",
						"'.$this->totalConcept.'",
						"'.$this->saldoConcept.'",
						"'.$this->retencion.'",
						"'.$this->totalEst.'",
						"'.$this->totalRetenido.'",
						"'.$this->steel.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$estimacionId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10084, 'complete');
		$this->Util()->PrintErrors();
		
		return $estimacionId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					estimacion SET 				 	
					projectId = "'.$this->projectId.'",
					conceptId = "'.$this->conceptId.'",
					projLevelId = "'.$this->projLevelId.'",
					name =  "'.utf8_decode($this->name).'",
					active = "'.$this->active.'"
				WHERE 
					estimacionId = '.$this->estimacionId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10085, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					estimacion
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_item
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_type
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_depto
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_level
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_payment
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					estimacion_pagos
				WHERE 
					estimacionId = '.$this->estimacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10086, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	//Save Tipos de Area
	
	public function SaveProjType(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					estimacion_type
					(	
						estimacionId,					
						projTypeId
					)
				 VALUES 
					(									
						"'.$this->estimacionId.'",
						"'.$this->projTypeId.'"						
					)';								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
						
		return true;
				
	}
	
	public function UpdateStatus(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					estimacion SET 				 	
					status = "'.$this->status.'"
				WHERE 
					estimacionId = '.$this->estimacionId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		return true;				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					estimacion 
				WHERE 
					estimacionId = '.$this->estimacionId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function EnumSupByProj($status = 'Pendiente')
	{
		$sql = 'SELECT s.* FROM estimacion AS e, supplier AS s
				WHERE e.projectId = "'.$this->projectId.'"
				AND e.status = "'.$status.'"
				AND e.supplierId = s.supplierId
				GROUP BY supplierId
				ORDER BY s.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConceptsBySup($status = 'Pendiente')
	{
		$sql = 'SELECT c.name, e.* FROM estimacion AS e, supplier AS s, concept AS c
				WHERE e.projectId = "'.$this->projectId.'"
				AND c.conceptId = e.conceptId
				AND e.supplierId = s.supplierId
				AND e.status = "'.$status.'"
				AND e.supplierId = "'.$this->supplierId.'"
				ORDER BY c.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetEstTotalByArea($projTypeIds)
	{				
		$sql = 'SELECT e.estimacionId, ed.*, et.projTypeId, e.conceptId, e.projectId
				FROM estimacion AS e, estimacion_depto AS ed, estimacion_type AS et
				WHERE e.estimacionId = ed.estimacionId
				AND e.estimacionId = et.estimacionId
				AND e.projectId = "'.$this->projectId.'"
				AND e.conceptId = "'.$this->conceptId.'"
				AND ed.projDeptoId = "'.$this->projDeptoId.'"
				AND et.projTypeId IN ('.$projTypeIds.')
				GROUP BY ed.projDeptoId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		$total = 0;
		foreach($result as $res)
			$total += $res['estimacion'];
				
		return $total;
	}
	
	/*** ACERO ***/
	
	public function GetEstTotalByLevel()
	{
		$sql = 'SELECT SUM(el.estimacion)
				FROM estimacion_level AS el, estimacion AS e
				WHERE e.estimacionId = el.estimacionId				
				AND el.cuantItemId = "'.$this->cuantItemId.'"
				AND e.conceptId = "'.$this->conceptId.'"
				AND e.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function GetProjTypes(){
			
		$sql = 'SELECT 
					projTypeId 
				FROM 
					estimacion_type 
				WHERE 
					estimacionId = '.$this->estimacionId;		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
		
}

?>