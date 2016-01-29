<?php

class CuantMaterial extends Main
{
	private $cuantMatId;
	private $conceptMatId;	
	private $cuantificacionId;
	private $traslape;
	private $bulbos;
	private $quantity;
	private $mtoLineal;
	private $weight;
	private $totalWeight;
	
	public function setCuantMatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantMatId = $value;
	}	
	
	public function setConceptMatId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Material'))
		$this->conceptMatId = $value;
	}
	
	public function setCuantificacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantificacionId = $value;
	}
	
	public function setTraslape($value)
	{
		$this->traslape = $value;
	}
	
	public function setBulbos($value)
	{
		$this->bulbos = $value;
	}
	
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			if($this->Util()->ValidateDecimal($value, 'Cantidad'))
				$this->quantity = $value;
	}
	
	public function setMtoLineal($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Metro Lineal'))
			if($this->Util()->ValidateDecimal($value, 'Metro Lineal'))
				$this->mtoLineal = $value;
	}
	
	public function setWeight($value)
	{
		$this->weight = $value;
	}
	
	public function setTotalWeight($value)
	{
		$this->totalWeight = $value;
	}
								
	public function EnumerateAll($active = 0)
	{
		global $conceptMat;
						
		$sql = 'SELECT * FROM cuantificacion_material 
				WHERE cuantificacionId = '.$this->cuantificacionId.' 
				ORDER BY cuantMatId ASC';		
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
					cuantificacion_material 
				WHERE 
					cuantMatId = "'.$this->cuantMatId.'"';
	
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
					cuantificacion_material 
					(
						cuantificacionId,
						conceptMatId,
						traslape,
						bulbos,
						quantity,									
						mtoLineal,
						weight,
						totalWeight													
					)
				 VALUES 
					(									
						"'.$this->cuantificacionId.'",
						"'.$this->conceptMatId.'",
						"'.$this->traslape.'",
						"'.$this->bulbos.'",
						"'.$this->quantity.'",
						"'.$this->mtoLineal.'",
						"'.$this->weight.'",
						"'.$this->totalWeight.'"						
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$cuantMatId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10072, 'complete');
		$this->Util()->PrintErrors();
		
		return $cuantMatId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					cuantificacion_material 
				SET					
					conceptMatId = "'.$this->conceptMatId.'",
					traslape = "'.$this->traslape.'",
					bulbos = "'.$this->bulbos.'",
					quantity = "'.$this->quantity.'",
					mtoLineal = "'.$this->mtoLineal.'",
					weight = "'.$this->weight.'",
					totalWeight = "'.$this->totalWeight.'"					
				WHERE 
					cuantMatId = '.$this->cuantMatId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10072, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					cuantificacion_material
				WHERE 
					cuantMatId = '.$this->cuantMatId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10038, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function DeleteItems($itemIds){
				
		$sql = 'DELETE FROM 
					cuantificacion_material
				WHERE 
					cuantMatId NOT IN ('.$itemIds.')
				AND
					cuantificacionId = "'.$this->cuantificacionId.'"';;
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
				
	}
			
}


?>