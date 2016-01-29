<?php

class Subcategory extends Main
{
	private $subcategoryId;
	private $categoryId;
	private $name;
	private $active;
	
	public function setSubcategoryId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->subcategoryId = $value;
	}
	
	public function setCategoryId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->categoryId = $value;
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
		
		$sql = 'SELECT * FROM subcategory 
				WHERE categoryId = "'.$this->categoryId.'"'.$sqlFilter.' ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
		
		$sql = 'SELECT COUNT(*) FROM subcategory WHERE categoryId = "'.$this->categoryId.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/subcategory');
		
		$sql = 'SELECT * FROM subcategory WHERE categoryId = "'.$this->categoryId.'" ORDER BY name ASC ';
		
		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery($sql.$sql_add);
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
					subcategory 
				WHERE 
					subcategoryId = "'.$this->subcategoryId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					subcategory 
					(
						categoryId,										
						name,						
						active					
					)
				 VALUES 
					(
						"'.$this->categoryId.'",
						"'.utf8_decode($this->name).'",
						"'.$this->active.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$subcategoryId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10054, 'complete');
		$this->Util()->PrintErrors();
		
		return $subcategoryId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					subcategory SET 				 	
					name =  "'.utf8_decode($this->name).'",
					active = "'.$this->active.'"
				WHERE 
					subcategoryId = '.$this->subcategoryId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10055, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					subcategory
				WHERE 
					subcategoryId = '.$this->subcategoryId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					concept_concept
				WHERE 
					subcategoryId = '.$this->subcategoryId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10056, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					subcategory 
				WHERE 
					subcategoryId = "'.$this->subcategoryId.'"';
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>