<?php

class EstLevel extends Main
{
	private $estLevelId;
	private $cuantItemId;
	private $estimacionId;	
	private $projItemId;
	private $projLevelId;
	private $projLevelId2;
	private $totalLevel;
	private $subtotal;
	private $estima;
	
	public function setEstLevelId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estLevelId = $value;
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
	
	public function setSubtotal($value)
	{
		$this->subtotal = $value;
	}
	
	public function setEstimacion($value)
	{
		$this->estima = $value;
	}	
				
	public function EnumerateAll()
	{
		$sql = 'SELECT * FROM estimacion_level 
				WHERE estimacionId = '.$this->estimacionId.'
				ORDER BY estLevelId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					estimacion_level
				WHERE 
					estLevelId = "'.$this->estLevelId.'"';
	
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
					estimacion_level
					(	
						cuantItemId,
						estimacionId,						
						projItemId,
						projLevelId,
						projLevelId2,
						totalLevel,
						subtotal,
						estimacion
					)
				 VALUES 
					(								
						"'.$this->cuantItemId.'",
						"'.$this->estimacionId.'",
						"'.$this->projItemId.'",						
						"'.$this->projLevelId.'",
						"'.$this->projLevelId2.'",
						"'.$this->totalLevel.'",
						"'.$this->subtotal.'",
						"'.$this->estima.'"
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
					estimacion_level SET 				 	
					estimacionId = "'.$this->estimacionId.'"					
				WHERE 
					estLevelId = '.$this->estLevelId;
							
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
					estimacion_level
				WHERE 
					estLevelId = '.$this->estLevelId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10086, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function EnumLevelsByItem()
	{
		$sql = 'SELECT * FROM estimacion_level
				WHERE estimacionId = "'.$this->estimacionId.'"
				AND projItemId = "'.$this->projItemId.'"
				ORDER BY estLevelId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}	
			
}


?>