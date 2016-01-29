<?php

class MaterialPrice extends Main
{
	private $matPriceId;
	private $materialId;
	private $supplierId;	
	private $price;
	private $currency;
	private $iva;
	private $total;
	private $fecha;
	private $supMain;
	
	public function setMatPriceId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->matPriceId = $value;
	}
	
	public function setMaterialId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->materialId = $value;
	}
			
	public function setSupplierId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proveedor'))
			$this->supplierId = $value;
	}
	
	public function setCurrency($value)
	{
		$this->currency = $value;
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
					material_price
				WHERE 
					materialId = "'.$this->materialId.'"				
				ORDER BY
					matPriceId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					material_price 
				WHERE 
					matPriceId = '".$this->matPriceId."'";
	
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
					material_price
					(
						materialId,
						supplierId,
						price,
						currency,
						iva,
						total,
						fecha,
						supMain
					)
				 VALUES 
					(									
						'".$this->materialId."',
						'".$this->supplierId."',
						'".$this->price."',
						'".$this->currency."',
						'".$this->iva."',
						'".$this->total."',
						'".$this->fecha."',
						'".$this->supMain."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$materialId = $this->Util()->DB()->InsertData();
				
		return $materialId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					material_price
				SET
					supplierId =  '".$this->supplierId."',
					price =  '".$this->price."',
					currency =  '".$this->currency."',
					iva =  '".$this->iva."',
					total =  '".$this->total."',
					fecha = '".$this->fecha."',
					supMain = '".$this->supMain."'
				WHERE 
					matPriceId = ".$this->matPriceId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					material_price
				WHERE 
					matPriceId = ".$this->matPriceId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function GetMatPriceId()
	{
		
		 $sql = 'SELECT 
					matPriceId
				FROM 
					material_price 
				WHERE 
					materialId = "'.$this->materialId.'"
				AND
					supplierId = "'.$this->supplierId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$matPriceId = $this->Util()->DB()->GetSingle();
				
		return $matPriceId;
	}
	
	public function GetMatPriceDefault()
	{
		
		 $sql = 'SELECT 
					*
				FROM 
					material_price 
				WHERE 
					materialId = "'.$this->materialId.'"
				AND
					supMain = "1"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
			
}


?>