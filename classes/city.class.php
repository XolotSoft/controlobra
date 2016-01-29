<?php

class City extends Main
{
	private $stateId;
	private $cityId;	
	private $name;	
	private $active;
	
	public function setStateId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->stateId = $value;
	}
	
	public function setCityId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cityId = $value;
	}
			
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, 'Nombre');
		
		$this->name = $value;
	}
	
	public function EnumerateAll($active = 0)
	{	
	
		if($active)
			$sqlFilter = ' AND active = "1"';
			
		$sql = 'SELECT * FROM city 
				WHERE stateId = '.$this->stateId.$sqlFilter.'
				ORDER BY name ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
	public function Enumerate()
	{		
								
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM city WHERE stateId = '.$this->stateId);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/city');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM city WHERE stateId = '.$this->stateId.' ORDER BY name ASC '.$sql_add);
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
					city 
				WHERE 
					cityId = "'.$this->cityId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		$row = $this->Util->EncodeRow($info);
				
		return $row;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sqlQuery = 'INSERT INTO 
					city 
					(
						stateId,										
						name											
					)
				 VALUES 
					(			
						"'.$this->stateId.'",
						"'.utf8_decode($this->name).'"
					)';
								
		$this->Util()->DB()->setQuery($sqlQuery);
		$cityId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10081, 'complete');
		$this->Util()->PrintErrors();
		
		return $cityId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					city 
				SET 
					name =  "'.utf8_decode($this->name).'"
				WHERE 
					cityId = '.$this->cityId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10082, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					city
				WHERE 
					cityId = '.$this->cityId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
										
		$this->Util()->setError(10083, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name
				FROM 
					city 
				WHERE 
					cityId = "'.$this->cityId.'"';
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}	
	
}//City

?>