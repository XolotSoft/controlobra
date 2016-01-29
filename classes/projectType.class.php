<?php

class ProjectType extends Main
{
	private $projTypeId;
	private $projSubTypeId;
	private $projectId;	
	private $name;
	private $redondeo;
	private $comunArea;
	private $realArea;
	private $ventaArea;
	private $terrazaReal;
	private $terrazaComun;
	private $jardinReal;
	private $jardinComun;
	private $color;
	private $abierta;
		
	public function setProjTypeId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projTypeId = $value;
	}
	
	public function setProjSubTypeId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projSubTypeId = $value;
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
	
	public function setRedondeo($value)
	{
		$this->redondeo = $value;
	}
	
	public function setComunArea($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Area Com&uacute;n');
		$this->comunArea = $value;
	}
	
	public function setRealArea($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Area Real');
		$this->realArea = $value;
	}
	
	public function setVentaArea($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Area Venta');
		$this->ventaArea = $value;
	}
	
	public function setTerrazaReal($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Terraza Real');
		$this->terrazaReal = $value;
	}
	
	public function setTerrazaComun($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Terraza Comun');
		$this->terrazaComun = $value;
	}
	
	public function setJardinReal($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Jard&iacute;n Real');
		$this->jardinReal = $value;
	}
	
	public function setJardinComun($value)
	{
		if($value != '')
			$this->Util()->ValidateDecimal($value, 'Jard&iacute;n Comun');
		$this->jardinComun = $value;
	}
	
	public function setQtyType($value)
	{
		if($value == 0)
			$this->Util()->setError(10022, 'error', '', '');
	}
	
	public function setColor($value)
	{
		$this->color = $value;
	}
	
	public function setAbierta($value)
	{
		$this->abierta = $value;
	}
	
	public function EnumSubTypesAll()
	{
		$sql = 'SELECT * FROM project_subtype 
				WHERE projTypeId = "'.$this->projTypeId.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumSubTypesByProject()
	{
		$sql = 'SELECT * FROM project_subtype 
				WHERE projectId = "'.$this->projectId.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
								
	public function EnumerateAll()
	{		
		$sql = 'SELECT * FROM project_type 
				WHERE projectId = "'.$this->projectId.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project_type');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/project-type');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM project_type ORDER BY name ASC '.$sql_add);
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
					project_type 
				WHERE 
					projTypeId = "'.$this->projTypeId.'"';
	
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
					project_type 
					(	
						projectId,									
						name,
						redondeo,
						comunArea,
						realArea,
						ventaArea,
						terrazaReal,
						terrazaComun,
						jardinReal,
						jardinComun,
						color,
						abierta									
					)
				 VALUES 
					(						
						"'.$this->projectId.'",
						"'.utf8_decode($this->name).'",
						"'.$this->redondeo.'",
						"'.$this->comunArea.'",
						"'.$this->realArea.'",
						"'.$this->ventaArea.'",
						"'.$this->terrazaReal.'",
						"'.$this->terrazaComun.'",
						"'.$this->jardinReal.'",
						"'.$this->jardinComun.'",
						"'.$this->color.'",
						"'.$this->abierta.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$projTypeId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10042, 'complete');
		$this->Util()->PrintErrors();
		
		return $projTypeId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					project_type SET 				 	
					name =  "'.utf8_decode($this->name).'",
					redondeo = "'.$this->redondeo.'",
					comunArea = "'.$this->comunArea.'",
					realArea = "'.$this->realArea.'",
					ventaArea = "'.$this->ventaArea.'",
					terrazaReal = "'.$this->terrazaReal.'",
					terrazaComun = "'.$this->terrazaComun.'",
					jardinReal = "'.$this->jardinReal.'",
					jardinComun = "'.$this->jardinComun.'",
					color = "'.$this->color.'",
					abierta = "'.$this->abierta.'"
				WHERE 
					projTypeId = '.$this->projTypeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10043, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					project_type
				WHERE 
					projTypeId = '.$this->projTypeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					project_subtype
				WHERE 
					projTypeId = '.$this->projTypeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10044, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project_type 
				WHERE 
					projTypeId = '.$this->projTypeId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	/*** SubTypes ***/
	
	public function InfoSubType(){
		
		$sql = 'SELECT * FROM project_subtype WHERE projSubTypeId = "'.$this->projSubTypeId.'"';
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
		
		return $row;
	}
	
	public function SaveSubType(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					project_subtype 
					(	
						projTypeId,
						projectId,									
						name,
						redondeo,
						comunArea,
						realArea,
						ventaArea,
						terrazaReal,
						terrazaComun,
						jardinReal,
						jardinComun,
						color,
						abierta									
					)
				 VALUES 
					(						
						"'.$this->projTypeId.'",
						"'.$this->projectId.'",
						"'.utf8_decode($this->name).'",
						"'.$this->redondeo.'",
						"'.$this->comunArea.'",
						"'.$this->realArea.'",
						"'.$this->ventaArea.'",
						"'.$this->terrazaReal.'",
						"'.$this->terrazaComun.'",
						"'.$this->jardinReal.'",
						"'.$this->jardinComun.'",
						"'.$this->color.'",
						"'.$this->abierta.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$projSubTypeId = $this->Util()->DB()->InsertData();
				
		return $projSubTypeId;				
	}
	
	public function UpdateSubType(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					project_subtype SET 				 	
					name =  "'.utf8_decode($this->name).'",
					redondeo = "'.$this->redondeo.'",
					comunArea = "'.$this->comunArea.'",
					realArea = "'.$this->realArea.'",
					ventaArea = "'.$this->ventaArea.'",
					terrazaReal = "'.$this->terrazaReal.'",
					terrazaComun = "'.$this->terrazaComun.'",
					jardinReal = "'.$this->jardinReal.'",
					jardinComun = "'.$this->jardinComun.'",
					color = "'.$this->color.'",
					abierta = "'.$this->abierta.'"
				WHERE 
					projSubTypeId = '.$this->projSubTypeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
	
		return true;				
	}
	
	public function DeleteSubType(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
			
		$sql = 'DELETE FROM 
					project_subtype
				WHERE 
					projSubTypeId = '.$this->projSubTypeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
}//ProjectType


?>