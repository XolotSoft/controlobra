<?php

class ConceptMaterial extends Main
{
	private $conceptMatId;
	private $conceptId;
	private $matCatId;
	private $matSubcatId;
	private $materialId;
	private $quantity;
	private $unitPrice;
	
	public function setConceptMatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptMatId = $value;
	}
	
	public function setConceptId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptId = $value;
	}
	
	public function setMatCatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->matCatId = $value;
	}
	
	public function setMatSubcatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->matSubcatId = $value;
	}
		
	public function setMaterialId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Material'))
			$this->materialId = $value;
	}
	
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			if($this->Util()->ValidateDecimal($value, 'Cantidad'))
				$this->quantity = $value;
	}
	
	public function setUnitPrice($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Precio Unitario'))
			if($this->Util()->ValidateDecimal($value, 'Precio Unitario'))
				$this->unitPrice = $value;
	}
							
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM concept_material WHERE conceptId = '.$this->conceptId);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/concept-material');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM concept_material 
									   WHERE conceptId = '.$this->conceptId.' 
									   ORDER BY conceptMatId ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateAll($active = 0)
	{
		global $material;
		global $unit;
				
		$sql = 'SELECT * FROM concept_material 
				WHERE conceptId = '.$this->conceptId.' 
				ORDER BY conceptMatId ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		$materials = array();
		foreach($result as $res){
			$card = $res;
			
			$material->setMaterialId($res['materialId']);
			$infM = $material->Info();
			
			$card['material'] = $infM['name'];
			
			$unit->setUnitId($infM['unitId']);
			$card['unit'] = $unit->GetClaveById();
									
			$materials[] = $card;
		}
		
		return $materials;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					concept_material 
				WHERE 
					conceptMatId = "'.$this->conceptMatId.'"';
	
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
					concept_material 
					(
						conceptId,
						matCatId,
						matSubcatId,									
						materialId,
						quantity													
					)
				 VALUES 
					(									
						"'.$this->conceptId.'",
						"'.$this->matCatId.'",
						"'.$this->matSubcatId.'",
						"'.$this->materialId.'",
						"'.$this->quantity.'"						
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$conceptMatId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10036, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					concept_material SET
					matCatId =  "'.$this->matCatId.'",
					matSubcatId =  "'.$this->matSubcatId.'",
					quantity =  "'.$this->quantity.'"
				WHERE 
					conceptMatId = '.$this->conceptMatId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10037, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					concept_material
				WHERE 
					conceptMatId = '.$this->conceptMatId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10038, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetMaterialId()
	{
		
		$sql = 'SELECT 
					materialId
				FROM 
					concept_material 
				WHERE 
					conceptMatId = "'.$this->conceptMatId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$materialId = $this->Util()->DB()->GetSingle();
				
		return $materialId;
	}
	
	public function GetTotalPrice()
	{
		global $matPrice;
			
		$resMaterials = $this->EnumerateAll();
		
		$total = 0;
		foreach($resMaterials as $res){
			
			$matPrice->setMaterialId($res['materialId']);
			$infP = $matPrice->GetMatPriceDefault();
			
			$price = ($infP['price'] == '') ? '0.00' :  $infP['price'];
							
			$subtotal = $price * $res['quantity'];			
			$total += $subtotal;
		}//foreach
		
		return $total;
	}
			
}


?>