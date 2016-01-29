<?php

class CustomerAddress extends Main
{
	private $custAddressId;
	private $customerId;
	private $street;
	private $noExt;
	private $noInt;
	private $postalCode;
	private $colonia;
	private $cityId;
	private $stateId;
	
	public function setCustAddressId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->custAddressId = $value;
	}
	
	public function setCustomerId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->customerId = $value;
	}
		
	public function setStreet($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Calle'))
			$this->street = $value;
	}
	
	public function setNoExt($value)
	{
		$this->noExt = $value;
	}
	
	public function setNoInt($value)
	{
		$this->noInt = $value;
	}
	
	public function setPostalCode($value)
	{
		$this->postalCode = $value;
	}
	
	public function setColonia($value)
	{
		$this->colonia = $value;
	}
	
	public function setCityId($value)
	{
		$this->cityId = $value;
	}
	
	public function setStateId($value)
	{
		$this->stateId = $value;
	}
									
	public function EnumerateAll()
	{		
		$sql = 'SELECT * FROM customer_address 
				WHERE customerId = "'.$this->customerId.'" ORDER BY custAddressId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					customer_address 
				WHERE 
					custAddressId = '".$this->custAddressId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					customer_address 
					(	
						customerId,									
						street,
						noExt,
						noInt,
						postalCode,
						colonia,
						cityId,
						stateId		
					)
				 VALUES 
					(									
						'".$this->customerId."',
						'".utf8_decode($this->street)."',
						'".$this->noExt."',
						'".$this->noInt."',
						'".$this->postalCode."',
						'".utf8_decode($this->colonia)."',
						'".$this->cityId."',
						'".$this->stateId."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$custAddressId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10093, "complete");
		$this->Util()->PrintErrors();
		
		return $custAddressId;
				
	}
		
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					customer_address SET 				 	
					street =  '".utf8_decode($this->street)."',
					noExt = '".$this->noExt."',
					noInt = '".$this->noInt."',
					postalCode = '".$this->postalCode."',
					colonia = '".utf8_decode($this->colonia)."',
					cityId = '".$this->cityId."',
					stateId = '".$this->stateId."'		
				WHERE 
					custAddressId = ".$this->custAddressId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10094, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					customer_address
				WHERE 
					custAddressId = ".$this->custAddressId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10095, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
			
}

?>