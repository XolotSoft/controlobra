<?php

class ConceptPrice extends Main
{
	private $conceptPriceId;
	private $conceptId;
	private $supplierId;	
	private $price;
	private $iva;
	private $total;
	private $fecha;
	private $supMain;
	
	public function setConceptPriceId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptPriceId = $value;
	}
	
	public function setConceptId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptId = $value;
	}
			
	public function setSupplierId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Contratista'))
			$this->supplierId = $value;
	}
			
	public function setPrice($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Precio Unitario'))
			if($this->Util()->ValidateDecimal($value, 'Precio Unitario'))
				$this->price = $value;
	}
	
	public function setIva($value)
	{
		$this->iva = $value;
	}
	
	public function setTotal($value)
	{
		$this->total = $value;
	}
	
	public function setFecha($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Fecha'))			
			$this->fecha = $value;
	}
	
	public function setSupMain($value)
	{
		$this->supMain = $value;
	}
	
	public function EnumerateAll()
	{				
		$sql = 'SELECT 
					* 
				FROM 
					concept_price
				WHERE 
					conceptId = "'.$this->conceptId.'"				
				ORDER BY
					conceptPriceId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					material 
				WHERE 
					conceptId = '".$this->conceptId."'";
	
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
					concept_price
					(
						conceptId,
						supplierId,
						price,
						iva,
						total,
						fecha,
						supMain
					)
				 VALUES 
					(									
						'".$this->conceptId."',
						'".$this->supplierId."',
						'".$this->price."',
						'".$this->iva."',
						'".$this->total."',
						'".$this->fecha."',
						'".$this->supMain."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$conceptId = $this->Util()->DB()->InsertData();
				
		return $conceptId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					concept_price
				SET
					supplierId =  '".$this->supplierId."',
					price =  '".$this->price."',
					iva =  '".$this->iva."',
					total =  '".$this->total."',
					fecha = '".$this->fecha."',
					supMain = '".$this->supMain."'
				WHERE 
					conceptPriceId = ".$this->conceptPriceId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					concept_price
				WHERE 
					conceptPriceId = ".$this->conceptPriceId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function GetPriceDefault()
	{
		
		 $sql = 'SELECT 
					*
				FROM 
					concept_price 
				WHERE 
					conceptId = "'.$this->conceptId.'"
				AND
					supMain = "1"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function GetPriceBySupplier()
	{		
		 $sql = 'SELECT 
					*
				FROM 
					concept_price 
				WHERE 
					conceptId = "'.$this->conceptId.'"
				AND
					supplierId = "'.$this->supplierId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
			
}


?>