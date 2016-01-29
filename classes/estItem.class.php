<?php

class EstItem extends Main
{
	private $estItemId;
	private $cuantItemId;
	private $estimacionId;	
	private $projItemId;
	private $projLevelId;
	private $projLevelId2;
	private $totalLevel;
	private $totalAreas;
	
	public function setEstItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estItemId = $value;
	}
	
	public function setCuantItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantItemId = $value;
	}
	
	public function setEstimacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionId = $value;
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
		$sql = 'SELECT * FROM estimacion_item 
				WHERE estimacionId = '.$this->estimacionId.'
				ORDER BY estItemId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAllGroup()
	{
		$sql = 'SELECT * FROM estimacion_item 
				WHERE estimacionId = '.$this->estimacionId.'
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
					estimacion_item
				WHERE 
					estItemId = "'.$this->cuantItemdId.'"';
	
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
					estimacion_item
					(	
						cuantItemId,
						estimacionId,						
						projItemId,
						projLevelId,
						projLevelId2,
						totalLevel,
						totalAreas
					)
				 VALUES 
					(								
						"'.$this->cuantItemId.'",
						"'.$this->estimacionId.'",
						"'.$this->projItemId.'",						
						"'.$this->projLevelId.'",
						"'.$this->projLevelId2.'",
						"'.$this->totalLevel.'",
						"'.$this->totalAreas.'"
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
					estimacion_item SET 				 	
					estimacionId = "'.$this->estimacionId.'"					
				WHERE 
					estItemId = '.$this->estItemId;
							
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
					estimacion_item
				WHERE 
					estItemId = '.$this->estItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10086, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function EnumLevelsByItem()
	{
		$sql = 'SELECT * FROM estimacion_item
				WHERE estimacionId = "'.$this->estimacionId.'"
				AND projItemId = "'.$this->projItemId.'"
				ORDER BY estItemId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}	
			
}


?>