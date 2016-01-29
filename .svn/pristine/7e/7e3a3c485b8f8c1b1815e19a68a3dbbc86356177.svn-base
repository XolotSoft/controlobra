<?php

class SupplierContact extends Main
{
	private $supContId;
	private $supplierId;	
	private $name;
	private $puesto;
	private $phone;
	private $email;
	
	public function setSupContId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->supContId = $value;
	}
				
	public function setSupplierId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Contratista'))
			$this->supplierId = $value;
	}
			
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Name'))
			$this->name = $value;
	}
	
	public function setPuesto($value)
	{
		$this->puesto = $value;
	}
	
	public function setPhone($value)
	{
		$this->phone = $value;
	}
	
	public function setEmail($value)
	{		
		$this->email = $value;
	}
	
	public function EnumOne()
	{				
		$sql = 'SELECT 
					* 
				FROM 
					supplier_contact
				WHERE 
					supplierId = "'.$this->supplierId.'"				
				ORDER BY
					supContId ASC
				LIMIT 1';		
		$this->Util()->DB()->setQuery($sql);		
		$info = $this->Util()->DB()->GetRow();
		
		return $info;		
	}
	
	public function EnumerateAll()
	{				
		$sql = 'SELECT 
					* 
				FROM 
					supplier_contact
				WHERE 
					supplierId = "'.$this->supplierId.'"				
				ORDER BY
					supContId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
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
					supplier_contact
					(						
						supplierId,
						name,
						puesto,
						phone,
						email
					)
				 VALUES 
					(									
						'".$this->supplierId."',
						'".utf8_decode($this->name)."',
						'".utf8_decode($this->puesto)."',
						'".$this->phone."',
						'".$this->email."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$supContId = $this->Util()->DB()->InsertData();
				
		return $supContId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					supplier_contact
				SET
					supplierId =  '".$this->supplierId."',
					name =  '".utf8_decode($this->name)."',
					puesto =  '".utf8_decode($this->puesto)."',
					phone =  '".$this->phone."',
					email = '".$this->email."'
				WHERE 
					supContId = ".$this->supContId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					supplier_contact
				WHERE 
					supContId = ".$this->supContId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
			
}


?>