<?php

class ProjectEquip extends Main
{
	private $projEquipId;
	private $projectId;
	private $quantity;
	private $currency;
		
	public function setProjEquipId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projEquipId = $value;
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
		$sql = 'SELECT * FROM project_equip
			    WHERE projectId = '.$this->projectId.' 
			    ORDER BY projEquipId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					project_equip
				WHERE 
					projEquipId = '".$this->projEquipId."'";
	
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
					project_equip
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
					project_equip SET 					
					quantity =  '".$this->quantity."',
					currency =  '".$this->currency."'
				WHERE 
					projEquipId = ".$this->projEquipId;
							
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
					project_equip
				WHERE 
					projEquipId = ".$this->projEquipId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10107, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
			
}

?>