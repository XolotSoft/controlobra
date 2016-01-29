<?php

class Unit extends Main
{
	private $unitId;
	private $clave;	
	private $name;	
	private $active;
	
	public function setUnitId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->unitId = $value;
	}
	
	public function setClave($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Clave'))
			$this->clave = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM unit WHERE 1'.$sqlFilter.' ORDER BY clave ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM unit');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/unit");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM unit ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					unit 
				WHERE 
					unitId = '".$this->unitId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					unit 
					(		
						clave,								
						name,					
						active					
					)
				 VALUES 
					(									
						'".utf8_decode($this->clave)."',
						'".utf8_decode($this->name)."',						
						'".$this->active."'						
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$unitId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10048, "complete");
		$this->Util()->PrintErrors();
		
		return $unitId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					unit SET 				 	
					clave =  '".utf8_decode($this->clave)."',
					name =  '".utf8_decode($this->name)."',
					active = '".$this->active."'			
				WHERE 
					unitId = ".$this->unitId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10049, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					unit
				WHERE 
					unitId = ".$this->unitId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10050, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetClaveById(){
			
		$sql = 'SELECT 
					clave 
				FROM 
					unit 
				WHERE 
					unitId = '.$this->unitId;
		
		$this->Util()->DB()->setQuery($sql);		
		$clave = $this->Util()->DB()->GetSingle();
		
		return $clave;
		
	}
	
}


?>