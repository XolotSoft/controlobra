<?php

class Supplier extends Main
{
	private $supplierId;
	private $supProjId;
	private $projectId;	
	private $name;
	private $razonSocial;
	private $rfc;
	private	$address;
	private $colonia;
	private $cityId;
	private $stateId;
	private $postalCode;	
	private $tipo;
	private $retencion;
		
	public function setSupplierId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->supplierId = $value;
	}
	
	public function setSupProjId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->supProjId = $value;
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
	
	public function setRazonSocial($value)
	{
		$this->razonSocial = $value;
	}
	
	public function setTipo($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo'))
			$this->tipo = $value;
	}
	
	public function setRfc($value)
	{
		$this->rfc = $value;
	}
	
	public function setAddress($value)
	{
		$this->address = $value;
	}
	
	public function setColonia($value)
	{
		$this->colonia = $value;
	}
	
	public function setCityId($value)
	{
		$this->cityId = $value;
	}
	
	public function setStateId($value)
	{
		$this->stateId = $value;
	}
	
	public function setPostalCode($value)
	{
		$this->postalCode = $value;
	}
			
	public function setRetencion($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value,'Retenci&oacute;n'))
				$this->retencion = $value;
	}
	
	public function EnumerateAll()
	{		
		$sql = 'SELECT * FROM supplier ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateByType($type)
	{		
		$sql = 'SELECT * FROM supplier 
				WHERE tipo = "'.$type.'" 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
					
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM supplier');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/supplier');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM supplier ORDER BY name ASC '.$sql_add);
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
					supplier 
				WHERE 
					supplierId = "'.$this->supplierId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					supplier 
					(										
						name,
						razonSocial,
						rfc,
						address,
						colonia,
						cityId,
						stateId,
						postalCode,						
						tipo										
					)
				 VALUES 
					(									
						"'.utf8_decode($this->name).'",
						"'.utf8_decode($this->razonSocial).'",
						"'.$this->rfc.'",
						"'.utf8_decode($this->address).'",
						"'.utf8_decode($this->colonia).'",
						"'.utf8_decode($this->cityId).'",
						"'.utf8_decode($this->stateId).'",
						"'.$this->postalCode.'",						
						"'.$this->tipo.'"						
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$supplierId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10069, 'complete');
		$this->Util()->PrintErrors();
		
		return $supplierId;
				
	}
	
	public function SaveProject()
	{
		$sql = 'INSERT INTO supplier_project 
					(supplierId, projectId, retencion)
				VALUES 
					("'.$this->supplierId.'","'.$this->projectId.'","'.$this->retencion.'")';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
		
		return true;
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					supplier SET 				 	
					name =  "'.utf8_decode($this->name).'",
					razonSocial = "'.$this->razonSocial.'",
					rfc = "'.$this->rfc.'",
					address = "'.utf8_decode($this->address).'",
					colonia = "'.utf8_decode($this->colonia).'",
					cityId = "'.utf8_decode($this->cityId).'",
					stateId = "'.utf8_decode($this->stateId).'",
					postalCode = "'.utf8_decode($this->postalCode).'",					
					tipo = "'.$this->tipo.'"					
				WHERE 
					supplierId = '.$this->supplierId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10070, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					supplier
				WHERE 
					supplierId = '.$this->supplierId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					supplier_project
				WHERE 
					supplierId = '.$this->supplierId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					material_price
				WHERE 
					supplierId = '.$this->supplierId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					supplier_contact
				WHERE 
					supplierId = '.$this->supplierId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10071, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Search()
	{
		$sqlAdd = '';
		
		if($this->tipo)
			$sqlAdd .= ' AND tipo = "'.$this->tipo.'"';		
		if($this->name)
			$sqlAdd .= ' AND name LIKE "%'.$this->name.'%"';
		
		$sql = 'SELECT * FROM supplier 
				WHERE 1
				'.$sqlAdd.'
				ORDER BY name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function UpdateProject(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					supplier_project SET 				 	
					projectId =  "'.$this->projectId.'",
					retencion = "'.$this->retencion.'"					
				WHERE 
					supProjId = '.$this->supProjId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10070, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					supplier 
				WHERE 
					supplierId = "'.$this->supplierId.'"';
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function ExistProject()
	{
		$sql = 'SELECT supProjId 
				FROM supplier_project
				WHERE projectId = "'.$this->projectId.'"
				AND supplierId = "'.$this->supplierId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$supProjId = $this->Util()->DB()->GetSingle();
		
		return $supProjId;
	}
	
	public function InfoProject()
	{
		$sql = 'SELECT * 
				FROM supplier_project
				WHERE supProjId = "'.$this->supProjId.'"';				
		$this->Util()->DB()->setQuery($sql);		
		$info = $this->Util()->DB()->GetRow();
		
		return $info;
	}
	
	public function DeleteProject(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
				
		$sql = 'DELETE FROM 
					supplier_project
				WHERE 
					supProjId = "'.$this->supProjId.'"';
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function DeleteProjects(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
				
		$sql = 'DELETE FROM 
					supplier_project
				WHERE 
					supplierId = "'.$this->supplierId.'"';
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;
				
	}
	
	public function EnumProjects()
	{
		$sql = 'SELECT p.name, sp.retencion, sp.supProjId, sp.pdf
				FROM project AS p, supplier_project AS sp
				WHERE sp.projectId = p.projectId
				AND sp.supplierId = "'.$this->supplierId.'"
				ORDER BY p.name ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetSupplierByProj()
	{
		$sql = 'SELECT s.* FROM supplier AS s, supplier_project AS sp
				WHERE s.supplierId = sp.supplierId
				AND s.tipo = "Contratista"
				AND sp.projectId = "'.$this->projectId.'"
				ORDER BY s.name ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetRetencionByProject()
	{
		$sql = 'SELECT retencion 
				FROM supplier_project
				WHERE projectId = "'.$this->projectId.'"
				AND supplierId = "'.$this->supplierId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$retencion = $this->Util()->DB()->GetSingle();
		
		return $retencion;
	}
	
	function SavePdf(){		
				
		$supplierId = $_POST['supplierId'];
		$projectId = $_POST['projectId'];
				
		$ruta = DOC_ROOT.'/archivos/pdf';
				
		//Obtenemos los datos del archivo 
		
		$tipo = $_FILES['pdf']['type'];
		$archivo = $_FILES['pdf']['name'];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$time = time();
		
		if ($archivo != "") {		
			
			//Comparamos si el archivo es de tipo PDF
			if ($tipo == 'application/pdf'){
				
				$sql = 'SELECT supProjId FROM supplier_project 
						WHERE supplierId = "'.$supplierId.'"
						AND projectId = "'.$projectId.'"';
				$this->Util()->DB()->setQuery($sql);
				$supProjId = $this->Util()->DB()->GetSingle();
				
				if(!$supProjId){
					$sql = 'INSERT INTO supplier_project (supplierId, projectId)
							VALUES ("'.$supplierId.'", "'.$projectId.'")';
					$this->Util()->DB()->setQuery($sql);
					$supProjId = $this->Util()->DB()->InsertData();
				}
				
				$ext = 'pdf';
					
				$fileName = $supProjId.'_'.$time.'.'.$ext;
								
				$destino =  $ruta.'/'.$fileName;					
				if (move_uploaded_file($_FILES['pdf']['tmp_name'],$destino)) {				
					
					 $sql = 'UPDATE supplier_project SET pdf = "'.$fileName.'"
							 WHERE supProjId = "'.$supProjId.'"';								
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->ExecuteQuery();
																									
					$mensaje = 1;
					
				}else{
					$sql = 'DELETE FROM supplier_project
							WHERE supProjId = "'.$supProjId.'"';								
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->DeleteData();
					
					$mensaje = 3;
				}//else
			}else{				
				$mensaje = 2;
			}//else
		}else{
			$mensaje = 4;
		}//if
		
		return $mensaje;		
					
	}//SavePdf
	
	function DeletePdf(){
		
		$ruta = DOC_ROOT.'/archivos/pdf';
			
		$info = $this->InfoProject();
		
		@unlink($ruta.'/'.$info['pdf']);
		
		$sql = 'DELETE FROM supplier_project 
				WHERE supProjId = '.$this->supProjId;
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
		
		$this->Util()->setError(10025, 'complete');
		$this->Util()->PrintErrors();
		
		return 1;
		
	}
	
	function SavePdf2(){		
				
		$supProjId = $_POST['supProjId'];
				
		$ruta = DOC_ROOT.'/archivos/pdf2';
				
		//Obtenemos los datos del archivo 
		
		$tipo = $_FILES['pdf']['type'];
		$archivo = $_FILES['pdf']['name'];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$time = time();
		
		if ($archivo != "") {		
			
			//Comparamos si el archivo es de tipo PDF
			if ($tipo == 'application/pdf'){
				
				$ext = 'pdf';
					
				$fileName = $supProjId.'_'.$time.'.'.$ext;
				
				$destino =  $ruta.'/'.$fileName;					
				if (move_uploaded_file($_FILES['pdf']['tmp_name'],$destino)) {				
					
					$sql = 'UPDATE supplier_project SET
								pdf = "'.$fileName.'"
							WHERE supProjId = '.$supProjId;
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->UpdateData();
																									
					$mensaje = 1;
					
				}else{
					$mensaje = 3;
				}//else
			}else{				
				$mensaje = 2;
			}//else
		}else{
			$mensaje = 4;
		}//if
		
		return $mensaje;		
					
	}//SavePdf
	
	function DeletePdf2(){
		
		$ruta = DOC_ROOT.'/archivos/pdf2';
			
		$info = $this->InfoProject();
		
		@unlink($ruta.'/'.$info['pdf']);
		
		$sql = 'UPDATE supplier_project SET
					pdf = ""
				WHERE supProjId = '.$this->supProjId;
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(10025, 'complete');
		$this->Util()->PrintErrors();
		
		return 1;
		
	}
	
	function GetSupProjId()
	{
		$sql = 'SELECT supProjId FROM supplier_project				
				WHERE supplierId = "'.$this->supplierId.'"
				AND projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);
		$supProjId = $this->Util()->DB()->GetSingle();
		
		return $supProjId;
	}
	
	function GetSupProjInfo()
	{
		$sql = 'SELECT pdf, supProjId FROM supplier_project				
				WHERE supplierId = "'.$this->supplierId.'"
				AND projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		return $info;
	}
	
}


?>