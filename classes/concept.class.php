<?php

class Concept extends Main
{
	private $conceptId;
	private $tipo;	
	private $categoryId;
	private $subcategoryId;
	private $conceptConId;
	private $name;
	private $unitId;
	private $steel;
	private $comment;
		
	public function setConceptId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptId = $value;
	}
	
	public function setTipo($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo'))
			$this->tipo = $value;		
	}
	
	public function setCategoryId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Partida')){
			$this->Util()->ValidateInteger($value);
			$this->categoryId = $value;
		}
	}
	
	public function setSubcategoryId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->subcategoryId = $value;
	}
	
	public function setConceptConId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->conceptConId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
		
	public function setUnitId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Unidad'))
			$this->unitId = $value;
	}
	
	public function setSteel($value)
	{
		$this->steel = $value;
	}
	
	public function setComment($value)
	{
		$this->comment = $value;
	}
				
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM concept');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/concept", $this->itemsPage);

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM concept ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
		$data["total"] = $total;
				
		return $data;
	}
	
	public function EnumerateAll($active = 0)
	{
				
		$sql = 'SELECT * FROM concept ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumByConceptConId()
	{	
		$sql = 'SELECT * FROM concept 
				WHERE conceptConId = "'.$this->conceptConId.'" 
				ORDER BY name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateAllNormal()
	{
				
		$sql = 'SELECT * FROM concept WHERE steel = "0" ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateAllAcero()
	{
				
		$sql = 'SELECT * FROM concept WHERE steel = "1" ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateNormalByType()
	{
				
		$sql = 'SELECT * FROM concept 
				WHERE steel = "0"
				AND tipo = "'.$this->tipo.'"
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateAceroByType()
	{
				
		$sql = 'SELECT * FROM concept 
				WHERE steel = "1"
				AND tipo = "'.$this->tipo.'"
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function Search()
	{
		$sqlAdd = '';
		
		if($this->tipo)
			$sqlAdd .= ' AND tipo = "'.$this->tipo.'"';
		if($this->categoryId)
			$sqlAdd .= ' AND categoryId = "'.$this->categoryId.'"';
		if($this->subcategoryId)
			$sqlAdd .= ' AND subcategoryId = "'.$this->subcategoryId.'"';
		if($this->conceptConId)
			$sqlAdd .= ' AND conceptConId = "'.$this->conceptConId.'"';
		if($this->name)
			$sqlAdd .= ' AND name LIKE "%'.$this->name.'%"';
		
		$sql = 'SELECT * FROM concept 
				WHERE 1
				'.$sqlAdd.'
				ORDER BY name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					concept 
				WHERE 
					conceptId = '".$this->conceptId."'";
	
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
		
		$sql = "INSERT INTO 
					concept 
					(	
						tipo,
						categoryId,
						subcategoryId,
						conceptConId,
						name,
						unitId,
						steel,
						comment									
					)
				 VALUES 
					(
						'".$this->tipo."',
						'".$this->categoryId."',
						'".$this->subcategoryId."',
						'".$this->conceptConId."',
						'".utf8_decode($this->name)."',
						'".$this->unitId."',
						'".$this->steel."',
						'".utf8_decode($this->comment)."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$conceptId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10057, "complete");
		$this->Util()->PrintErrors();
		
		return $conceptId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					concept SET 
					tipo =  '".$this->tipo."',
					categoryId =  '".$this->categoryId."',
					subcategoryId =  '".$this->subcategoryId."',
					conceptConId =  '".$this->conceptConId."',
					name =  '".utf8_decode($this->name)."',
					unitId =  '".$this->unitId."',
					steel =  '".$this->steel."',
					comment =  '".utf8_decode($this->comment)."'
				WHERE 
					conceptId = ".$this->conceptId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10058, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					concept
				WHERE 
					conceptId = ".$this->conceptId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					concept_material
				WHERE 
					conceptId = ".$this->conceptId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
	
		$sql = "DELETE FROM 
					concept_price
				WHERE 
					conceptId = ".$this->conceptId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10059, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					concept 
				WHERE 
					conceptId = '.$this->conceptId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
		
	public function IsSteel()
	{
		$sql = 'SELECT 
					steel 
				FROM 
					concept 
				WHERE 
					conceptId = '.$this->conceptId;
		
		$this->Util()->DB()->setQuery($sql);		
		$steel = $this->Util()->DB()->GetSingle();
		
		return $steel;
	}
	
	public function ExistName(){
		
		$sqlAdd = '';
		
		if($this->conceptId)
			$sqlAdd .= ' AND conceptId <> "'.$this->conceptId.'"';
		
		if($this->categoryId)
			$sqlAdd .= ' AND categoryId = "'.$this->categoryId.'"';
		if($this->subcategoryId)
			$sqlAdd .= ' AND subcategoryId = "'.$this->subcategoryId.'"';
		if($this->conceptConId)
			$sqlAdd .= ' AND conceptConId = "'.$this->conceptConId.'"';
					
		$this->name = utf8_decode($this->name);
		$this->name = str_replace('ñ','n',$this->name);
		$this->name = str_replace('Ñ','N',$this->name);
		
		$sql = 'SELECT 
					conceptId 
				FROM 
					concept 
				WHERE 
					MD5(LCASE(REPLACE(REPLACE(name,"ñ","n"),"Ñ","N"))) = "'.md5(strtolower($this->name)).'"
				AND
					tipo = "'.$this->tipo.'"
				'.$sqlAdd.'
				LIMIT 1';		
		$this->Util()->DB()->setQuery($sql);		
		$conceptId = $this->Util()->DB()->GetSingle();
		
		if($conceptId){
			$this->Util()->setError(11026, "error");
			$this->Util()->PrintErrors();
		}
		
		return $conceptId;
	
	}
	
}


?>