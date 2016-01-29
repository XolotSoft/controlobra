<?php

class ProjectLevel extends Main
{
	private $projLevelId;
	private $projLevelId2;
	private $projItemId;
	private $projectId;
	private $level;
	private $name;
	private $deptos;
		
	public function setProjLevelId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projLevelId = $value;
	}
	
	public function setProjLevelId2($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projLevelId2 = $value;
	}
	
	public function setProjItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projItemId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setLevel($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nivel'))
			$this->level = $value;
	}
	
	public function setDeptos($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. Areas'))
			$this->deptos = $value;
	}
			
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre del Nivel'))
			$this->name = $value;
	}
									
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_level WHERE projItemId = '.$this->projItemId);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/project-level');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM project_level
									   WHERE projItemId = '.$this->projItemId.' 
									   ORDER BY level DESC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM project_level 
				WHERE projItemId = "'.$this->projItemId.'"'.$sqlFilter.' ORDER BY level DESC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					project_level 
				WHERE 
					projLevelId = "'.$this->projLevelId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					project_level 
					(	
						projItemId,
						projectId,
						level,						
						name						
					)
				 VALUES 
					(									
						"'.$this->projItemId.'",
						"'.$this->projectId.'",			
						"'.utf8_decode($this->level).'",		
						"'.utf8_decode($this->name).'"					
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$projLevelId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10063, 'complete');
		$this->Util()->PrintErrors();
		
		return $projLevelId;
				
	}
	
	public function SaveTemp(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
				
		return true;				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					project_level SET
					level = "'.$this->level.'",					
					name = "'.utf8_decode($this->name).'"					
				WHERE 
					projLevelId = '.$this->projLevelId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10064, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					project_level
				WHERE 
					projLevelId = '.$this->projLevelId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					project_depto
				WHERE 
					projLevelId = '.$this->projLevelId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10065, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_level 
				WHERE 
					projLevelId = '.$this->projLevelId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function GetLevelById(){
			
		$sql = 'SELECT 
					level 
				FROM 
					project_level 
				WHERE 
					projLevelId = '.$this->projLevelId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function GetLevelsByLimit($ini, $fin)
	{
		$sql = 'SELECT projLevelId FROM project_level
				WHERE projLevelId >= "'.$ini.'"
				AND projLevelId <= "'.$fin.'"
				AND projItemId = "'.$this->projItemId.'"
				ORDER BY projLevelId ASC';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateByRange()
	{				
		$sql = 'SELECT * FROM project_level 
				WHERE projLevelId >= "'.$this->projLevelId.'"
				AND projLevelId <= "'.$this->projLevelId2.'"
				ORDER BY level ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetIniLevel()
	{		
		$sql = 'SELECT 
					MIN(level)
				FROM 
					project_level 
				WHERE 
					projItemId = "'.$this->projItemId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$level = $this->Util()->DB()->GetSingle();
				
		return $level;
	}
	
}

?>