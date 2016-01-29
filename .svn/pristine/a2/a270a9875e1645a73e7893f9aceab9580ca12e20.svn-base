<?php

class ProjectBodega extends Main
{
	private $projBodegaId;
	private $projectId;	
	private $name;
			
	public function setProjBodegaId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projBodegaId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setName2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre Bodega'))
			$this->name = $value;
	}
									
	public function EnumerateAll()
	{		
		$sql = 'SELECT * FROM project_bodega 
				WHERE projectId = "'.$this->projectId.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_bodega');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/project-type');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM project_bodega ORDER BY name ASC '.$sql_add);
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
					project_bodega 
				WHERE 
					projBodegaId = "'.$this->projBodegaId.'"';
	
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
					project_bodega 
					(	
						projectId,									
						name															
					)
				 VALUES 
					(						
						"'.$this->projectId.'",
						"'.utf8_decode($this->name).'"										
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$projBodegaId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10102, 'complete');
		$this->Util()->PrintErrors();
		
		return $projBodegaId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					project_bodega SET 				 	
					name =  "'.utf8_decode($this->name).'"					
				WHERE 
					projBodegaId = '.$this->projBodegaId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10103, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					project_bodega
				WHERE 
					projBodegaId = '.$this->projBodegaId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10104, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_bodega 
				WHERE 
					projBodegaId = '.$this->projBodegaId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>