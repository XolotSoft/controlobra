<?php

class ProjectDepto extends Main
{
	private $projDeptoId;
	private $projLevelId;
	private $projItemId;
	private $projectId;
	private $projTypeId;
	private $projSubTypeId;
	private $name;	
	
	public function setProjDeptoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projDeptoId = $value;
	}
	
	public function setProjLevelId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projLevelId = $value;
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
		
	public function setProjTypeId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo'))
			$this->projTypeId = $value;
	}
	
	public function setProjTypeId2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo del Area.'))
			$this->projTypeId = $value;
	}
	
	public function setProjSubTypeId($value)
	{
		$this->projSubTypeId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setName2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre del Area.'))
			$this->name = $value;
	}
									
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_depto WHERE projLevelId = '.$this->projLevelId);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/project-level');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM project_depto
									   WHERE projLevelId = '.$this->projLevelId.' 
									   ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM project_depto 
				WHERE projLevelId = "'.$this->projLevelId.'"'.$sqlFilter.' ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumAllVendibleByItem($active = 0)
	{	
		$sql = 'SELECT d.* FROM project_depto AS d, project_type AS t
				WHERE d.projTypeId = t.projTypeId
				AND t.ventaArea > 0
				AND d.projItemId = "'.$this->projItemId.'"
				ORDER BY d.name + 0 ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
			
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					project_depto 
				WHERE 
					projDeptoId = "'.$this->projDeptoId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					project_depto 
					(	
						projLevelId,
						projItemId,
						projectId,						
						projTypeId,
						projSubTypeId,
						name						
					)
				 VALUES 
					(									
						"'.$this->projLevelId.'",
						"'.$this->projItemId.'",
						"'.$this->projectId.'",						
						"'.$this->projTypeId.'",
						"'.$this->projSubTypeId.'",
						"'.utf8_decode($this->name).'"						
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$projDeptoId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10075, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
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
					project_depto SET					
					projTypeId = "'.$this->projTypeId.'",
					projSubTypeId = "'.$this->projSubTypeId.'",
					name = "'.utf8_decode($this->name).'"					
				WHERE 
					projDeptoId = '.$this->projDeptoId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10076, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					project_depto
				WHERE 
					projDeptoId = '.$this->projDeptoId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10077, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_depto 
				WHERE 
					projDeptoId = '.$this->projDeptoId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function GetTotalAreasByTypeId()
	{
		$sql = 'SELECT 
					count(*) 
				FROM 
					project_depto 
				WHERE 
					projLevelId = "'.$this->projLevelId.'"
				AND
					projTypeId = "'.$this->projTypeId.'"';
		
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
	
	public function GetTotalDeptos()
	{
		$sql = 'SELECT 
					count(*) 
				FROM 
					project_depto 
				WHERE 
					projectId = "'.$this->projectId.'"';		
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
	
	public function GetTotalDeptosVta()
	{
		$sql = 'SELECT COUNT(*)
				FROM project_depto AS d, project_type AS t
				WHERE d.projTypeId = t.projTypeId
				AND t.ventaArea > 0
				AND d.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
			
}

?>