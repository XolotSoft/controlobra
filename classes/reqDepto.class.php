<?php

class ReqDepto extends Main
{
	private $requisicionId;
	private $reqItemId;
	private $projDeptoId;
	private $subtotal;
	private $requi;
		
	public function setRequisicionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->requisicionId = $value;
	}
	
	public function setReqItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqItemId = $value;
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
	
	public function setRequisicion($value)
	{
		$this->Util()->ValidateDecimal($value,'Estimaci&oacute;n');
		$this->requi = $value;
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
					requisicion_depto
					(	
						requisicionId,						
						reqItemId,
						projDeptoId,
						subtotal,
						requisicion
					)
				 VALUES 
					(									
						"'.$this->requisicionId.'",						
						"'.$this->reqItemId.'",						
						"'.$this->projDeptoId.'",
						"'.$this->subtotal.'",
						"'.$this->requi.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$requisicionId = $this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10087, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					requisicion_depto SET 				 	
					requisicionId = "'.$this->requisicionId.'"					
				WHERE 
					reqDeptoId = '.$this->reqDeptoId;
							
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
					requisicion_depto
				WHERE 
					reqDeptoId = '.$this->reqDeptoId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10089, 'complete');
		$this->Util()->PrintErrors();
		
		return true;				
	}
	
	public function EnumAreasByItem()
	{
		$sql = 'SELECT * FROM requisicion_depto
				WHERE requisicionId = "'.$this->requisicionId.'"
				AND reqItemId = "'.$this->reqItemId.'"
				ORDER BY reqDeptoId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
			
}


?>