<?php

class Customer extends Main
{
	private $customerId;
	private $custDocId;	
	private $name;
	private $category;
	private $rfc;
	private	$street;
	private $noExt;
	private $noInt;
	private $postalCode;
	private $colonia;
	private $cityId;
	private $stateId;
	private $phone;
	private $e_mail;
	private $edoCivil;
	private $regimenMat;	
	private $birthdate;
	private $religion;
	private $otraReligion;
	private $notes;
	private $company;
	private $position;
	private $active;
	
	public function setCustomerId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->customerId = $value;
	}
	
	public function setCustDocId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->custDocId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setCategory($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Categor&iacute;a'))
			$this->category = $value;
	}
	
	public function setRfc($value)
	{
		$this->rfc = $value;
	}
	
	public function setStreet($value)
	{
		$this->street = $value;
	}
	
	public function setNoExt($value)
	{
		$this->noExt = $value;
	}
	
	public function setNoInt($value)
	{
		$this->noInt = $value;
	}
	
	public function setPostalCode($value)
	{
		$this->postalCode = $value;
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
	
	public function setPhone($value)
	{
		$this->phone = $value;
	}
	
	public function setEmail($value)
	{
		if($value != '')
			if($this->Util()->ValidateEmail($value))
				$this->e_mail = $value;
	}
	
	public function setEdoCivil($value)
	{
		$this->edoCivil = $value;
	}
	
	public function setRegimenMat($value)
	{
		$this->regimenMat = $value;
	}
	
	public function setBirthdate($value)
	{
		$this->birthdate = $value;
	}
	
	public function setBirthdate2()
	{
		$this->Util()->setError(11034, 'error');
	}
	
	public function setReligion($value)
	{
		$this->religion = $value;
	}
	
	public function setOtraReligion($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, 'Otra Religion');
		$this->otraReligion = $value;
	}
	
	public function setNotes($value)
	{
		$this->notes = $value;
	}
	
	public function setCompany($value)
	{
		$this->company = $value;
	}
	
	public function setPosition($value)
	{
		$this->position = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM customer');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/customer');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM customer ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateAll()
	{
				
		$sql = 'SELECT * FROM customer ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					customer 
				WHERE 
					customerId = "'.$this->customerId.'"';
	
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
					customer 
					(										
						name,
						category,
						rfc,
						street,
						noExt,
						noInt,
						postalCode,
						colonia,
						cityId,
						stateId,
						email,
						phone,
						edoCivil,
						regimenMat,
						religion,
						otraReligion,
						birthdate,
						notes,
						company,
						position,
						active					
					)
				 VALUES 
					(									
						"'.utf8_decode($this->name).'",
						"'.$this->category.'",
						"'.$this->rfc.'",
						"'.utf8_decode($this->street).'",
						"'.$this->noExt.'",
						"'.$this->noInt.'",
						"'.$this->postalCode.'",
						"'.utf8_decode($this->colonia).'",
						"'.$this->cityId.'",
						"'.$this->stateId.'",
						"'.$this->e_mail.'",
						"'.$this->phone.'",
						"'.$this->edoCivil.'",
						"'.$this->regimenMat.'",
						"'.$this->religion.'",
						"'.utf8_decode($this->otraReligion).'",
						"'.$this->birthdate.'",
						"'.utf8_decode($this->notes).'",
						"'.utf8_decode($this->company).'",
						"'.utf8_decode($this->position).'",
						"'.$this->active.'"
					)';
								
		$this->Util()->DB()->setQuery($sql);
		$customerId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10030, 'complete');
		$this->Util()->PrintErrors();
		
		return $customerId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					customer SET 				 	
					name =  "'.utf8_decode($this->name).'",
					category = "'.$this->category.'",
					rfc = "'.$this->rfc.'",
					street = "'.utf8_decode($this->street).'",
					noExt = "'.$this->noExt.'",
					noInt = "'.$this->noInt.'",
					postalCode = "'.$this->postalCode.'",
					colonia = "'.utf8_decode($this->colonia).'",
					cityId = "'.$this->cityId.'",
					stateId = "'.$this->stateId.'",
					email = "'.$this->e_mail.'",
					phone = "'.$this->phone.'",
					edoCivil = "'.$this->edoCivil.'",
					regimenMat = "'.$this->regimenMat.'",
					religion = "'.$this->religion.'",
					otraReligion = "'.utf8_decode($this->otraReligion).'",
					birthdate = "'.$this->birthdate.'",
					notes = "'.utf8_decode($this->notes).'",
					company = "'.utf8_decode($this->company).'",
					position = "'.utf8_decode($this->position).'",
					active = "'.$this->active.'"
				WHERE 
					customerId = '.$this->customerId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10031, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					customer
				WHERE 
					customerId = '.$this->customerId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10032, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					customer 
				WHERE 
					customerId = '.$this->customerId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	function SaveImg(){		
				
		$customerId = $_POST['customerId'];
				
		$ruta = DOC_ROOT.'/images/customer';
				
		// obtenemos los datos del archivo 
		$tamano = $_FILES["img"]['size'];
		$tipo = $_FILES["img"]['type'];
		$archivo = $_FILES["img"]['name'];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$time = time();
		
		if ($archivo != "") {		
			
			//Comparamos si el archivo es una imagen
			if ($tipo == 'image/jpeg' || $tipo == 'image/gif' || $tipo == 'image/png'){
				
				if($tipo == 'image/jpeg')
					$ext = 'jpg';
				elseif($tipo == 'image/gif')
					$ext = 'gif';
				elseif($tipo == 'image/png')
					$ext = 'png';
					
				$fileName = $customerId.'_'.$time.'.'.$ext;
				
				$destino =  $ruta.'/'.$fileName;					
				if (move_uploaded_file($_FILES['img']['tmp_name'],$destino)) {				
					
					$sql = 'UPDATE customer SET
								archivo = "'.$fileName.'"
							WHERE customerId = '.$customerId;
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
					
	}//SaveImg
		
	function DeleteImg($customerId){
		
		$ruta = DOC_ROOT.'/images/customer';
		
		$this->setCustomerId($customerId);
		
		$info = $this->Info();
		
		@unlink($ruta.'/'.$info['archivo']);
		
		$sql = 'UPDATE customer SET
					archivo = ""
				WHERE customerId = '.$customerId;
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		return 1;
		
	}
	
	//DOCUMENTS
	
	function SaveDoc(){		
				
		$customerId = $_POST['customerId'];
		$name = trim($_POST['name']);
				
		$ruta = DOC_ROOT.'/docs/customer';
		
				
		//Obtenemos los datos del archivo 
		$tamano = $_FILES["doc"]['size'];
		$tipo = $_FILES["doc"]['type'];
		$archivo = $_FILES["doc"]['name'];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		$time = time();
		
		if($archivo != ""){
			
			//Comparamos si el archivo es una imagen
			if ($tipo == 'application/pdf'){
				
				if($tipo == 'application/pdf')
					$ext = 'pdf';
				
				$fileName = $customerId.'_'.$time.'.'.$ext;
				
				$destino =  $ruta.'/'.$fileName;					
				if (move_uploaded_file($_FILES['doc']['tmp_name'],$destino)) {				
					
					$sql = 'INSERT INTO customer_doc (customerId, name, archivo)
							VALUES ("'.$customerId.'","'.$name.'","'.$fileName.'")';
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->InsertData();
					
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
					
	}//SaveDoc
	
	function DeleteDoc(){
		
		$info = $this->InfoDoc();
		
		@unlink(DOC_ROOT.'/docs/customer/'.$info['archivo']);
		
		$sql = 'DELETE FROM customer_doc 
				WHERE custDocId = "'.$this->custDocId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
		
		$this->Util()->setError(11035, 'complete');
		$this->Util()->PrintErrors();
		
		return true;		
	}
	
	function InfoDoc(){
			
		$sql = 'SELECT * FROM customer_doc 
				WHERE custDocId = "'.$this->custDocId.'"';
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
		
		return $row;		
	}
	
	function GetDocs(){
	
		$sql = 'SELECT * FROM customer_doc 
				WHERE customerId = "'.$this->customerId.'"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
}//Customer

?>