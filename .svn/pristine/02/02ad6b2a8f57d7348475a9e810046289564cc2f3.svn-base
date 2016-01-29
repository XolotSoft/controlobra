<?php

class EstDepto extends Main
{
	private $estDeptoId;
	private $estimacionId;
	private $estItemId;
	private $projDeptoId;
	private $subtotal;
	private $estimacion;
		
	public function setEstDeptoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estDeptoId = $value;
	}
	
	public function setEstimacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estimacionId = $value;
	}
	
	public function setEstItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->estItemId = $value;
	}
	
	public function setProjDeptoId($value)
	{
		$this->Util()->ValidateOption($value, 'Area');
		$this->projDeptoId = $value;
	}
	
	public function setSubtotal($value)
	{
		$this->Util()->ValidateDecimal($value,'Subtotal');
		$this->subtotal = $value;
	}
	
	public function setEstimacion($value)
	{
		$this->Util()->ValidateDecimal($value,'Estimaci&oacute;n');
		$this->estimacion = $value;
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
					estimacion_depto
					(	
						estimacionId,						
						estItemId,
						projDeptoId,
						subtotal,
						estimacion
					)
				 VALUES 
					(									
						"'.$this->estimacionId.'",						
						"'.$this->estItemId.'",						
						"'.$this->projDeptoId.'",
						"'.$this->subtotal.'",
						"'.$this->estimacion.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$estimacionId = $this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10084, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					estimacion_depto SET 				 	
					estimacionId = "'.$this->estimacionId.'"					
				WHERE 
					estDeptoId = '.$this->estDeptoId;
							
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
					estimacion_depto
				WHERE 
					estDeptoId = '.$this->estDeptoId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10086, 'complete');
		$this->Util()->PrintErrors();
		
		return true;				
	}
	
	public function EnumAreasByItem()
	{
		$sql = 'SELECT * FROM estimacion_depto
				WHERE estimacionId = "'.$this->estimacionId.'"
				AND estItemId = "'.$this->estItemId.'"
				ORDER BY estDeptoId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
			
}


?>