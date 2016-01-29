<?php

class Personal extends Main
{
	private $personalId;
	private $name;
	private $email;
	private $username;
	private $passwd;
	private $passwd2;
	private $active;	
	
	public function setPersonalId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->personalId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setEmail($value)
	{	
		if($value != '')
			if($this->Util()->ValidateEmail($value))
				$this->email = $value;
	}
	
	public function setUsername($value)
	{
		if($value != '')
			if($this->Util()->ValidateUsername($value))
				$this->username = $value;
	}
	
	public function setPasswd($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Contrase&ntilde;a'))
			$this->passwd = $value;
	}
	
	public function setPasswd2($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Confirmar Contrase&ntilde;a'))
			$this->passwd2 = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
		
	public function Enumerate()
	{
				var_dump($personals);exit();
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM personal');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/personal");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		// $this->Util()->DB()->setQuery('SELECT * FROM personal ORDER BY name ASC '.$sql_add);
		// $result = $this->Util()->DB()->GetResult();
		$this->bd()->setQuery('SELECT * FROM personal ORDER BY name ASC');
		$result = $this->bd()->GetResult();
		var_dump($result);exit();
						
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					personal 
				WHERE 
					personalId = '".$this->personalId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					personal 
					(										
						name,
						username,			
						active
					)
				 VALUES 
					(									
						'".utf8_decode($this->name)."',
						'".utf8_decode($this->username)."',						
						'".$this->active."'						
					)";

		$this->bd()->setQuery($sql);
		$result = $this->bd()->InsertData();
		// $this->Util()->DB()->setQuery($sql);
		// $personalId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10039, "complete");
		$this->Util()->PrintErrors();
		
		return $personalId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					personal SET 				 	
					name =  '".utf8_decode($this->name)."',
					email =  '".$this->email."',
					username =  '".utf8_decode($this->username)."',
					active = '".$this->active."'
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10040, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdatePasswd(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		if(strlen($this->passwd) < 5){
			$this->Util()->setError(10019, 'error','');	
		}elseif($this->passwd != $this->passwd2){
			$this->Util()->setError(10018, 'error','');			
		}
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE
					personal
				SET 					
					passwd = '".md5($this->passwd)."'
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10017, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function RemovePasswd(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
				
		$sql = "UPDATE
					personal
				SET 					
					passwd = ''
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10017, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					personal
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10041, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					personal 
				WHERE 
					personalId = '.$this->personalId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
}


?>