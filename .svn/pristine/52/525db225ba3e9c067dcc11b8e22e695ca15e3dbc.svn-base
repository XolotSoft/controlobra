<?php

class Requisicion extends Main
{
	private $requisicionId;
	private $projectId;
	private $conceptId;
	private $conceptIdObra;
	private $qtyConcept;	
	private $projTypeId;
	private $projItemId;
	private $qtyArea;
	private $totalRango;
	private $requiActual;
	private $saldoRango;
	private $totalConcept;
	private $saldoConcept;
	private $retencion;
	private $totalReq;
	private $totalRetenido;
	private $cuantItemId;
	private $steel;
	private $status;
	
	private $projDeptoId;
	
	public function setRequisicionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->requisicionId = $value;
	}
	
	public function setProjectId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proyecto'))
			$this->projectId = $value;
	}
		
	public function setConceptId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Concepto'))
			$this->conceptId = $value;
	}
	
	public function setConceptIdObra($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Concepto Obra'))
			$this->conceptIdObra = $value;
	}
	
	public function setQtyConcept($value)
	{
		$this->qtyConcept = $value;
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
				
	public function setRequiActual($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Requisici&oacute;n Actual'))
		$this->requiActual = $value;
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
	
	public function setTotalReq($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total Requisici&oacute;n'))
		$this->totalReq = $value;
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
						
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM requisicion');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/requisicion');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM requisicion ORDER BY requisicionId ASC '.$sql_add);
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
					requisicion 
				WHERE 
					requisicionId = "'.$this->requisicionId.'"';
	
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
					requisicion 
					(	
						projectId,												
						conceptId,
						conceptIdObra,						
						projTypeId,
						qtyConcept,
						qtyArea,						
						totalRango,
						requiActual,
						saldoRango,
						totalConcept,
						saldoConcept,
						retencion,
						totalReq,
						totalRetenido,
						steel,
						fecha,
						status
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->conceptId.'",
						"'.$this->conceptIdObra.'",
						"'.$this->projTypeId.'",
						"'.$this->qtyConcept.'",
						"'.$this->qtyArea.'",
						"'.$this->totalRango.'",
						"'.$this->requiActual.'",
						"'.$this->saldoRango.'",
						"'.$this->totalConcept.'",
						"'.$this->saldoConcept.'",
						"'.$this->retencion.'",
						"'.$this->totalReq.'",
						"'.$this->totalRetenido.'",
						"'.$this->steel.'",
						"'.date('Y-m-d').'",
						"Pendiente"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$requisicionId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10087, 'complete');
		$this->Util()->PrintErrors();
		
		return $requisicionId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					requisicion SET 				 	
					projectId = "'.$this->projectId.'",
					conceptId = "'.$this->conceptId.'",
					projLevelId = "'.$this->projLevelId.'",
					name =  "'.utf8_decode($this->name).'",
					active = "'.$this->active.'"
				WHERE 
					requisicionId = '.$this->requisicionId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10088, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					requisicion
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_item
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_type
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_depto
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_level
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		/*
		$sql = 'DELETE FROM 
					requisicion_material
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_pedido
				WHERE 
					requisicionId = '.$this->requisicionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		*/			
		$this->Util()->setError(10089, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	//Save Tipos de Area
	
	public function SaveProjType(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					requisicion_type
					(	
						requisicionId,					
						projTypeId
					)
				 VALUES 
					(									
						"'.$this->requisicionId.'",
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
					requisicion 
				SET					
					status = "'.$this->status.'"
				WHERE 
					requisicionId = '.$this->requisicionId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					requisicion 
				WHERE 
					requisicionId = '.$this->requisicionId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
		
	public function EnumConcepts($status = 'Pendiente')
	{		
		if($status)
			$sqlFilter = ' AND r.status = "'.$status.'"';
		
		$sql = 'SELECT c.name, r.* FROM requisicion AS r, concept AS c
				WHERE r.projectId = "'.$this->projectId.'"
				AND c.conceptId = r.conceptId
				'.$sqlFilter.'
				ORDER BY r.requisicionId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumPedidos($status = 'Pendiente')
	{
		if($status)
			$sqlFilter = ' AND status = "'.$status.'"';
	
		$sql = 'SELECT * FROM requisicion_pedido
				WHERE projectId = "'.$this->projectId.'"'.$sqlFilter.' 
				ORDER BY requisicionId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function GetReqTotalByArea($projTypeIds = 0)
	{		
		$sql = 'SELECT r.requisicionId, rd.*, rt.projTypeId, r.conceptId, r.projectId
				FROM requisicion AS r, requisicion_depto AS rd, requisicion_type AS rt
				WHERE r.requisicionId = rd.requisicionId
				AND r.requisicionId = rt.requisicionId
				AND r.projectId = "'.$this->projectId.'"
				AND r.conceptId = "'.$this->conceptId.'"
				AND rd.projDeptoId = "'.$this->projDeptoId.'"
				AND rt.projTypeId IN ('.$projTypeIds.')
				GROUP BY rd.projDeptoId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		$total = 0;
		foreach($result as $res)
			$total += $res['requisicion'];
		
		return $total;
	}
	
	public function GetProjTypes(){
			
		$sql = 'SELECT 
					projTypeId 
				FROM 
					requisicion_type 
				WHERE 
					requisicionId = '.$this->requisicionId;		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
	
	public function GetItems()
	{
		$sql = 'SELECT * FROM requisicion_item 
				WHERE requisicionId = '.$this->requisicionId.'
				GROUP BY projItemId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	/*** ACERO ***/
	
	public function GetReqTotalByLevel()
	{
		$sql = 'SELECT SUM(rl.requisicion)
				FROM requisicion_level AS rl, requisicion AS r
				WHERE r.requisicionId = rl.requisicionId				
				AND rl.cuantItemId = "'.$this->cuantItemId.'"
				AND r.conceptId = "'.$this->conceptId.'"
				AND r.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
		
}

?>