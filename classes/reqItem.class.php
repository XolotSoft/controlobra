<?php

class ReqItem extends Main
{
	private $reqItemId;
	private $cuantItemId;
	private $requisicionId;	
	private $projItemId;
	private $projLevelId;
	private $projLevelId2;
	private $totalLevel;
	private $totalAreas;
	
	public function setReqItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqItemId = $value;
	}
	
	public function setCuantItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantItemId = $value;
	}
	
	public function setRequisicionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->requisicionId = $value;
	}
	
	public function setProjItemId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Torre'))
			$this->projItemId = $value;
	}
			
	public function setProjLevelId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nivel Inicial'))
			$this->projLevelId = $value;
	}
		
	public function setProjLevelId2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nivel Final'))
			$this->projLevelId2 = $value;
	}
	
	public function setTotalLevel($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Total Nivel'))
				$this->totalLevel = $value;
	}
	
	public function setTotalAreas($value)
	{
		$this->totalAreas = $value;
	}	
				
	public function EnumerateAll()
	{
		$sql = 'SELECT * FROM requisicion_item 
				WHERE requisicionId = '.$this->requisicionId.'
				ORDER BY reqItemId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAllGroup()
	{
		$sql = 'SELECT * FROM requisicion_item 
				WHERE requisicionId = '.$this->requisicionId.'
				GROUP BY projItemId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					requisicion_item
				WHERE 
					reqItemId = "'.$this->reqItemdId.'"';
	
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
					requisicion_item
					(	
						cuantItemId,
						requisicionId,						
						projItemId,
						projLevelId,
						projLevelId2,
						totalLevel,
						totalAreas
					)
				 VALUES 
					(								
						"'.$this->cuantItemId.'",
						"'.$this->requisicionId.'",
						"'.$this->projItemId.'",						
						"'.$this->projLevelId.'",
						"'.$this->projLevelId2.'",
						"'.$this->totalLevel.'",
						"'.$this->totalAreas.'"
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
					requisicion_item SET 				 	
					requisicionId = "'.$this->requisicionId.'"					
				WHERE 
					reqItemId = '.$this->reqItemId;
							
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
					requisicion_item
				WHERE 
					reqItemId = '.$this->reqItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10089, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function EnumLevelsByItem()
	{
		$sql = 'SELECT * FROM requisicion_item
				WHERE requisicionId = "'.$this->requisicionId.'"
				AND projItemId = "'.$this->projItemId.'"
				ORDER BY reqItemId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}	
			
}


?>