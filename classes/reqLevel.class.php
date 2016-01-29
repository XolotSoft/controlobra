<?php

class ReqLevel extends Main
{
	private $reqLevelId;
	private $cuantItemId;
	private $requisicionId;	
	private $projItemId;
	private $projLevelId;
	private $projLevelId2;
	private $totalLevel;
	private $subtotal;
	private $requi;
	
	public function setReqLevelId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqLevelId = $value;
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
	
	public function setSubtotal($value)
	{
		$this->subtotal = $value;
	}
	
	public function setRequisicion($value)
	{
		$this->requi = $value;
	}	
				
	public function EnumerateAll()
	{
		$sql = 'SELECT * FROM requisicion_level 
				WHERE requisicionId = '.$this->requisicionId.'
				ORDER BY reqLevelId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					requisicion_level
				WHERE 
					reqLevelId = "'.$this->reqLevelId.'"';
	
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
					requisicion_level
					(	
						cuantItemId,
						requisicionId,						
						projItemId,
						projLevelId,
						projLevelId2,
						totalLevel,
						subtotal,
						requisicion
					)
				 VALUES 
					(								
						"'.$this->cuantItemId.'",
						"'.$this->requisicionId.'",
						"'.$this->projItemId.'",						
						"'.$this->projLevelId.'",
						"'.$this->projLevelId2.'",
						"'.$this->totalLevel.'",
						"'.$this->subtotal.'",
						"'.$this->requi.'"
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
					requisicion_level SET 				 	
					requisicionId = "'.$this->requisicionId.'"					
				WHERE 
					reqLevelId = '.$this->reqLevelId;
							
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
					requisicion_level
				WHERE 
					reqLevelId = '.$this->reqLevelId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10089, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function EnumLevelsByItem()
	{
		$sql = 'SELECT * FROM requisicion_level
				WHERE requisicionId = "'.$this->requisicionId.'"
				AND projItemId = "'.$this->projItemId.'"
				ORDER BY reqLevelId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}	
			
}


?>