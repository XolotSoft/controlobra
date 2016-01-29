<?php

class ProjectItem extends Main
{
	private $projItemId;
	private $projectId;
	private $name;	
	
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
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
								
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_item WHERE projectId = '.$this->projectId);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/project-item");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM project_item
									   WHERE projectId = '.$this->projectId.' 
									   ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
	
	public function EnumerateAll($active = 0)
	{
		
		if($active)
			$sqlFilter = ' AND active = "1"';
		
		$sql = 'SELECT * FROM project_item 
				WHERE projectId = "'.$this->projectId.'"'.$sqlFilter.' ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					project_item 
				WHERE 
					projItemId = '".$this->projItemId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					project_item 
					(	
						projectId,									
						name			
					)
				 VALUES 
					(									
						'".$this->projectId."',
						'".utf8_decode($this->name)."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$projItemId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10060, "complete");
		$this->Util()->PrintErrors();
		
		return $projItemId;
				
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
		
		$sql = "UPDATE 
					project_item SET 				 	
					name =  '".utf8_decode($this->name)."'			
				WHERE 
					projItemId = ".$this->projItemId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10061, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					project_item
				WHERE 
					projItemId = ".$this->projItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_level
				WHERE 
					projItemId = ".$this->projItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_depto
				WHERE 
					projItemId = ".$this->projItemId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10062, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_item 
				WHERE 
					projItemId = '.$this->projItemId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}

?>