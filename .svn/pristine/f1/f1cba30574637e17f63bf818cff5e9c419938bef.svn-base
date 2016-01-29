<?php

class ProjectEje extends Main
{
	private $projEjeLId;
	private $projEjeNId;
	private $projectId;
	private $numero;
	private $letra;
	
	public function setProjEjeLId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projEjeLId = $value;
	}
	
	public function setProjEjeNId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projEjeNId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
		
	public function setNumero($value)
	{
		if($this->Util()->ValidateRequireField($value, 'N&uacute;mero'))
			$this->numero = $value;
	}
	
	public function setLetra($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Letra'))
			$this->letra = $value;
	}
								
	public function EnumerateL()
	{
		$sql = 'SELECT * FROM project_ejes_l
			    WHERE projectId = '.$this->projectId.' 
			    ORDER BY letra ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function EnumerateN()
	{
		$sql = 'SELECT * FROM project_ejes_n
			    WHERE projectId = '.$this->projectId.' 
			    ORDER BY numero ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					project_ejes 
				WHERE 
					projEjeId = '".$this->projEjeId."'";
	
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
		
	public function SaveL(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					project_ejes_l
					(	
						projectId,						
						letra			
					)
				 VALUES 
					(									
						'".$this->projectId."',
						'".strtoupper($this->letra)."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$projEjeLId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10066, "complete");
		$this->Util()->PrintErrors();
		
		return $projEjeLId;
				
	}
	
	public function SaveN(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					project_ejes_n
					(	
						projectId,						
						numero			
					)
				 VALUES 
					(									
						'".$this->projectId."',
						'".$this->numero."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$projEjeNId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10066, "complete");
		$this->Util()->PrintErrors();
		
		return $projEjeNId;
				
	}
	
	public function UpdateL(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					project_ejes_l SET 					
					letra =  '".$this->letra."'
				WHERE 
					projEjeLId = ".$this->projEjeLId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10067, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdateN(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					project_ejes_n SET 					
					numero =  '".$this->numero."'
				WHERE 
					projEjeNId = ".$this->projEjeNId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10067, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function DeleteL(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					project_ejes_l
				WHERE 
					projEjeLId = ".$this->projEjeLId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10068, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function DeleteN(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					project_ejes_n
				WHERE 
					projEjeNId = ".$this->projEjeNId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10068, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetLetterById(){
			
		$sql = 'SELECT 
					letra 
				FROM 
					project_ejes_l
				WHERE 
					projEjeLId = '.$this->projEjeLId;
		
		$this->Util()->DB()->setQuery($sql);		
		$letter = $this->Util()->DB()->GetSingle();
		
		return $letter;
		
	}
	
	public function GetNumberById(){
			
		$sql = 'SELECT 
					numero 
				FROM 
					project_ejes_n
				WHERE 
					projEjeNId = '.$this->projEjeNId;
		
		$this->Util()->DB()->setQuery($sql);		
		$number = $this->Util()->DB()->GetSingle();
		
		return $number;
		
	}
			
}

?>