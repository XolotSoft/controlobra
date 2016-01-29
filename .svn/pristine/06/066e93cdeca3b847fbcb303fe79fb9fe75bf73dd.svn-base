<?php

class Type extends Main
{
	private $typeId;	
	private $name;
	private $comunArea;
	private $realArea;
	private $totalArea;
	private $active;
	
	public function setTypeId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->typeId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setComunArea($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Area Com&uacute;n'))
				$this->comunArea = $value;
	}
	
	public function setRealArea($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Area Real'))
				$this->realArea = $value;
	}
	
	public function setTotalArea($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Area Total'))
				$this->totalArea = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM type WHERE 1'.$sqlFilter.' ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM type');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/type');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM type ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					type 
				WHERE 
					typeId = "'.$this->typeId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					type 
					(										
						name,
						comunArea,
						realArea,
						totalArea,					
						active					
					)
				 VALUES 
					(									
						"'.utf8_decode($this->name).'",
						"'.$this->comunArea.'",
						"'.$this->realArea.'",
						"'.$this->totalArea.'",
						"'.$this->active.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$typeId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10042, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					type SET 				 	
					name =  "'.utf8_decode($this->name).'",
					comunArea = "'.$this->comunArea.'",
					realArea = "'.$this->realArea.'",
					totalArea = "'.$this->totalArea.'",
					active = "'.$this->active.'"
				WHERE 
					typeId = '.$this->typeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10043, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					type
				WHERE 
					typeId = '.$this->typeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10044, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					type 
				WHERE 
					typeId = '.$this->typeId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>