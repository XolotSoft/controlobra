<?php

class ProjectMant extends Main
{
	private $projMantId;
	private $projectId;
	private $quantity;
	private $currency;
		
	public function setProjMantId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projMantId = $value;
	}
		
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
		
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			$this->quantity = $value;
	}
	
	public function setCurrency($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Moneda'))
			$this->currency = $value;
	}
							
	public function Enumerate()
	{
		$sql = 'SELECT * FROM project_mant
			    WHERE projectId = '.$this->projectId.' 
			    ORDER BY projMantId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					project_mant
				WHERE 
					projMantId = '".$this->projMantId."'";
	
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
					project_mant
					(	
						projectId,						
						quantity,
						currency			
					)
				 VALUES 
					(									
						'".$this->projectId."',
						'".$this->quantity."',
						'".$this->currency."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$projEjeId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10105, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					project_mant SET 					
					quantity =  '".$this->quantity."',
					currency =  '".$this->currency."'
				WHERE 
					projMantId = ".$this->projMantId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10106, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					project_mant
				WHERE 
					projMantId = ".$this->projMantId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10107, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
			
}

?>