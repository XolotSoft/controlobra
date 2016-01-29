<?php

class ProjectCajon extends Main
{
	private $projCajonId;
	private $projectId;	
	private $name;
			
	public function setProjCajonId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projCajonId = $value;
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
		if($this->Util()->ValidateRequireField($value, 'Nombre Caj&oacute;n'))
			$this->name = $value;
	}
									
	public function EnumerateAll()
	{		
		$sql = 'SELECT * FROM project_cajon 
				WHERE projectId = "'.$this->projectId.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_cajon');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/project-type');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM project_cajon ORDER BY name ASC '.$sql_add);
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
					project_cajon 
				WHERE 
					projCajonId = "'.$this->projCajonId.'"';
	
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
					project_cajon 
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
		$projCajonId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10099, 'complete');
		$this->Util()->PrintErrors();
		
		return $projCajonId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					project_cajon SET 				 	
					name =  "'.utf8_decode($this->name).'"					
				WHERE 
					projCajonId = '.$this->projCajonId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10100, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					project_cajon
				WHERE 
					projCajonId = '.$this->projCajonId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10101, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_cajon 
				WHERE 
					projCajonId = '.$this->projCajonId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>