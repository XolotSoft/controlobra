<?php

class CuantItem extends Main
{
	private $cuantItemId;
	private $cuantificacionId;	
	private $projItemId;
	private $projLevelId;
	private $projLevelId2;
	private $totalLevel;
	private $totalAreas;
	
	public function setCuantItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantItemId = $value;
	}
	
	public function setCuantificacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantificacionId = $value;
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
		$sql = 'SELECT * FROM cuantificacion_item 
				WHERE cuantificacionId = '.$this->cuantificacionId.'
				ORDER BY cuantItemId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					cuantificacion_item
				WHERE 
					cuantItemId = "'.$this->cuantItemId.'"';
	
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
					cuantificacion_item
					(	
						cuantificacionId,						
						projItemId,
						projLevelId,
						projLevelId2,
						totalLevel,
						totalAreas					
					)
				 VALUES 
					(									
						"'.$this->cuantificacionId.'",						
						"'.$this->projItemId.'",						
						"'.$this->projLevelId.'",
						"'.$this->projLevelId2.'",
						"'.$this->totalLevel.'",
						"'.$this->totalAreas.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$cuantificacionId = $this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10072, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					cuantificacion_item SET
					projItemId = "'.$this->projItemId.'",						
					projLevelId = "'.$this->projLevelId.'",
					projLevelId2 = "'.$this->projLevelId2.'",
					totalLevel = "'.$this->totalLevel.'",
					totalAreas = "'.$this->totalAreas.'"					
				WHERE 
					cuantItemId = '.$this->cuantItemId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10073, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					cuantificacion_item
				WHERE 
					cuantItemId = '.$this->cuantItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10074, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function DeleteItems($itemIds){
				
		$sql = 'DELETE FROM 
					cuantificacion_item
				WHERE 
					projItemId NOT IN ('.$itemIds.')
				AND
					cuantificacionId = "'.$this->cuantificacionId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
				
	}
	
	public function ExistItem(){
		
		$sql = 'SELECT cuantItemId FROM 
					cuantificacion_item
				WHERE 
					projItemId = "'.$this->projItemId.'"
				AND
					cuantificacionId = "'.$this->cuantificacionId.'"';
		$this->Util()->DB()->setQuery($sql);
		$cuantItemId = $this->Util()->DB()->GetSingle();
				
		return $cuantItemId;
				
	}
			
}


?>