<?php

class Category extends Main
{
	private $categoryId;
	private $noCat;
	private $name;
	private $active;
	
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
	
	public function setNoCat($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Partida'))
			$this->noCat = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM category WHERE 1'.$sqlFilter.' ORDER BY noCat ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM category');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/category');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM category ORDER BY noCat ASC '.$sql_add);
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
					category 
				WHERE 
					categoryId = "'.$this->categoryId.'"';
	
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
					category 
					(		
						noCat,								
						name,						
						active					
					)
				 VALUES 
					(									
						"'.$this->noCat.'",
						"'.utf8_decode($this->name).'",
						"'.$this->active.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$categoryId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10051, 'complete');
		$this->Util()->PrintErrors();
		
		return $categoryId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					category SET 				 	
					noCat = "'.$this->noCat.'",
					name =  "'.utf8_decode($this->name).'",
					active = "'.$this->active.'"
				WHERE 
					categoryId = '.$this->categoryId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10052, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					category
				WHERE 
					categoryId = '.$this->categoryId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		//Eliminamos subcategorias
		$sql = 'DELETE FROM 
					subcategory
				WHERE 
					categoryId = '.$this->categoryId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		//Eliminamos conceptos
		$sql = 'DELETE FROM 
					concept_concept
				WHERE 
					categoryId = '.$this->categoryId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10053, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function ExistName(){
		
		if($this->categoryId)
			$sqlAdd = ' AND categoryId <> "'.$this->categoryId.'"';
		
		$this->name = utf8_decode($this->name);
		$this->name = str_replace('ñ','n',$this->name);
		$this->name = str_replace('Ñ','N',$this->name);
		
		$sql = 'SELECT 
					categoryId 
				FROM 
					category 
				WHERE 
					MD5(LCASE(REPLACE(REPLACE(name,"ñ","n"),"Ñ","N"))) = "'.md5(strtolower($this->name)).'"
				'.$sqlAdd.'
				LIMIT 1';		
		$this->Util()->DB()->setQuery($sql);		
		$categoryId = $this->Util()->DB()->GetSingle();
		
		if($categoryId){
			$this->Util()->setError(11031, "error");
			$this->Util()->PrintErrors();
		}
		
		return $categoryId;
	
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					category 
				WHERE 
					categoryId = '.$this->categoryId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>