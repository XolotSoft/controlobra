<?php

class Material extends Main
{
	private $materialId;
	private $categoryId;
	private $subcategoryId;
	private $conceptConId;
	private $name;
	private $waste;
	private $unitPrice;
	private $unitId;
	private $steel;
	private $comment;
	private $diameter;
	private $weight;
	private $traslape;
	private $bulbos;
	private $active;
	
	public function setMaterialId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->materialId = $value;
	}
	
	public function setCategoryId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Partida')){
			$this->Util()->ValidateInteger($value);
			$this->categoryId = $value;
		}
	}
	
	public function setSubcategoryId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->subcategoryId = $value;
	}
	
	public function setConceptConId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptConId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setWaste($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Desperdicio'))
				$this->waste = $value;
	}
			
	public function setUnitPrice($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Precio Unitario'))
				$this->unitPrice = $value;
	}
	
	public function setUnitId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Unidad'))
			$this->unitId = $value;
	}
	
	public function setSteel($value)
	{
		$this->steel = $value;
	}
	
	public function setComment($value)
	{
		$this->comment = $value;
	}
	
	public function setDiameter($value)
	{
		$this->diameter = $value;
	}
	
	public function setWeight($value)
	{
		$this->weight = $value;
	}
	
	public function setTraslape($value)
	{
		$this->traslape = $value;
	}
	
	public function setBulbos($value)
	{
		$this->bulbos = $value;
	}
			
	public function setActive($value)
	{
		$this->active = $value;
	}

	public function EnumerateAll()
	{	
		if($this->steel == 1)
			$sqlFilter = ' steel = "1"';
		else
			$sqlFilter = ' steel = "0"';
		
		$sql = 'SELECT * FROM material WHERE '.$sqlFilter.' ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}

	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM material');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/material", $this->itemsPage);

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM material ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
		$data['total'] = $total;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					material 
				WHERE 
					materialId = '".$this->materialId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					material 
					(
						categoryId,
						subcategoryId,
						conceptConId,
						name,
						waste,						
						unitId,
						steel,
						comment,
						diameter,
						weight,
						traslape,
						bulbos,
						active					
					)
				 VALUES 
					(									
						'".$this->categoryId."',
						'".$this->subcategoryId."',
						'".$this->conceptConId."',
						'".utf8_decode($this->name)."',						
						'".$this->waste."',
						'".$this->unitId."',
						'".$this->steel."',
						'".utf8_decode($this->comment)."',
						'".$this->diameter."',
						'".$this->weight."',
						'".$this->traslape."',
						'".$this->bulbos."',
						'1'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$materialId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10036, "complete");
		$this->Util()->PrintErrors();
		
		return $materialId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					material SET 				 	
					categoryId =  '".$this->categoryId."',
					subcategoryId =  '".$this->subcategoryId."',
					conceptConId =  '".$this->conceptConId."',
					name =  '".utf8_decode($this->name)."',
					waste =  '".$this->waste."',
					unitId =  '".$this->unitId."',
					steel =  '".$this->steel."',
					comment =  '".utf8_decode($this->comment)."',
					diameter =  '".$this->diameter."',
					weight =  '".$this->weight."',
					traslape =  '".$this->traslape."',
					bulbos =  '".$this->bulbos."'		
				WHERE 
					materialId = ".$this->materialId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10037, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					material
				WHERE 
					materialId = ".$this->materialId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					material_price
				WHERE 
					materialId = ".$this->materialId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10038, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					material 
				WHERE 
					materialId = '.$this->materialId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}//GetNameById
	
	public function IsSteel(){
			
		$sql = 'SELECT 
					steel
				FROM 
					material 
				WHERE 
					materialId = '.$this->materialId;
		
		$this->Util()->DB()->setQuery($sql);		
		$steel = $this->Util()->DB()->GetSingle();
		
		return $steel;
		
	}//IsSteel
	
	public function Search(){
		
		if($this->categoryId)
			$sqlFilter = ' AND categoryId = "'.$this->categoryId.'"';
			
		if($this->subcategoryId)
			$sqlFilter .= ' AND subcategoryId = "'.$this->subcategoryId.'"';
		
		if($this->conceptConId)
			$sqlFilter .= ' AND conceptConId = "'.$this->conceptConId.'"';
		
		if($this->name)
			$sqlFilter .= ' AND name LIKE "%'.$this->name.'%"';
		
		$sql = 'SELECT 
					* 
				FROM 
					material 
				WHERE 
					1
				'.$sqlFilter.'				
				ORDER BY
					name ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}//Search
	
	public function EnumSupplier()
	{			
		$sql = 'SELECT  
					m.supplierId,
					s.name
				FROM 
					material_price AS m,
					supplier AS s
				WHERE
					m.supplierId = s.supplierId
				AND
					m.materialId = "'.$this->materialId.'"
				ORDER BY s.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
}


?>