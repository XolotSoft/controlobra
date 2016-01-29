<?php

session_start();

class Project extends Main
{
	private $projectId;
	private $projItemId;
	private $name;
	private $responsable;
	private $address;
	private $items;
	private $levels;
	private $iniLevel;
	private $separacion;
	private $deptos;
	private $noEjesN;
	private $noEjesL;	
	private $redondeo;
	private $cajonesEst;
	private $bodegas;
	private $valPromM2;
	private $active;
	
	private $price;
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setProjItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projItemId = $value;
	}
		
	public function setName($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre'))
			$this->name = $value;
	}
	
	public function setResponsable($value)
	{
		$this->Util()->ValidateString($value, 255, 0);
		$this->responsable = $value;
	}
	
	public function setAddress($value)
	{
		$this->Util()->ValidateString($value, 500, 0);
		$this->address = $value;
	}
	
	public function setItems($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Torres'))
			$this->items = $value;
	}
	
	public function setLevels($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Niveles por Torre'))
			$this->levels = $value;
	}
	
	public function setIniLevel($value)
	{
		$this->iniLevel = $value;
	}
	
	public function setSeparacion($value)
	{
		$this->separacion = $value;
	}
	
	public function setDeptos($value)
	{
		$this->deptos = $value;
	}
	
	public function setNoEjesN($value)
	{
		$this->noEjesN = $value;
	}
	
	public function setNoEjesL($value)
	{
		$this->noEjesL = $value;
	}
	
	public function setRedondeo($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Factor de Redondeo'))
			$this->redondeo = $value;
	}
	
	public function setCajonesEst($value)
	{
		$this->cajonesEst = $value;
	}						
	
	public function setBodegas($value)
	{
		$this->bodegas = $value;
	}
	
	public function setActive($value)
	{
		$this->active = $value;
	}
	
	public function setPrice($value)
	{
		$this->Util()->ValidateFloat($value,2);
		$this->price = $value;
	}
	
	public function setValPromM2($value)
	{
		$this->Util()->ValidateFloat($value,2);
		$this->valPromM2 = $value;
	}
	
	public function EnumerateAll($active = 0)
	{
				
		$sql = 'SELECT * FROM project ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumOne()
	{
		$this->Util()->DB()->setQuery('SELECT * FROM project WHERE projectId = "'.$this->projectId.'"');
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
				
		return $data;
	}
		
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM project');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/project");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM project ORDER BY name ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
	
	public function EnumItem()
	{
		$sql = 'SELECT * FROM project_item 
				WHERE projectId = '.$this->projectId.' 
				ORDER BY name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumLevel()
	{
		$sql = 'SELECT * FROM project_level 
				WHERE projectId = '.$this->projectId.'
				AND projItemId = '.$this->projItemId.' 
				ORDER BY level ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumEje()
	{
		$sql = 'SELECT * FROM project_ejes 
				WHERE projectId = '.$this->projectId.'
				ORDER BY letra ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					project 
				WHERE 
					projectId = '".$this->projectId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function SaveStep1(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$card['name'] = $this->name;
		$card['items'] = $this->items;
		$card['levels'] = $this->levels;
		$card['iniLevel'] = $this->iniLevel;
		$card['separacion'] = $this->separacion;
		$card['deptos'] = $this->deptos;
		$card['noEjesN'] = $this->noEjesN;
		$card['noEjesL'] = $this->noEjesL;
		$card['redondeo'] = $this->redondeo;
		$card['cajonesEst'] = $this->cajonesEst;
		$card['bodegas'] = $this->bodegas;
		$card['valPromM2'] = $this->valPromM2;
				
		$_SESSION['proyecto'] = $card;
		
		return true;
				
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					project 
					(										
						name,
						items,
						separacion,
						valPromM2,
						active					
					)
				 VALUES 
					(									
						'".utf8_decode($this->name)."',
						'".$this->items."',
						'".$this->separacion."',
						'".$this->valPromM2."',
						'1'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$projectId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10045, "complete");
		$this->Util()->PrintErrors();
		
		return $projectId;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					project SET 				 	
					name =  '".utf8_decode($this->name)."',
					items = '".$this->items."',
					separacion = '".$this->separacion."',
					valPromM2 = '".$this->valPromM2."'
				WHERE 
					projectId = ".$this->projectId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10046, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdateAddress(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					project SET
					responsable =  '".utf8_decode($this->responsable)."',
					address =  '".utf8_decode($this->address)."'
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(11033, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdatePrice(){
	
		echo $sql = "UPDATE 
					project SET 
					price = '".$this->price."'					
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		return true;				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					project
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_ejes_l
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_ejes_n
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_item
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_level
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_depto
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_type
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_subtype
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_cajon
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_bodega
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					supplier_project
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
	
		$sql = "DELETE FROM 
					project_mant
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					project_equip
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					requisicion_pedido
				WHERE 
					projectId = ".$this->projectId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10047, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					project 
				WHERE 
					projectId = '.$this->projectId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}

	function GetMtsTotalesVta(){
		
		$sql = 'SELECT SUM(t.ventaArea)
				FROM project_depto AS d, project_type AS t
				WHERE d.projTypeId = t.projTypeId
				AND t.ventaArea > 0
				AND d.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
	
	function GetMtsTotalesVen(){
		
		$sql = 'SELECT SUM(t.ventaArea)
				FROM contract AS c, project_depto AS d, project_type AS t
				WHERE c.projDeptoId = d.projDeptoId
                AND d.projTypeId = t.projTypeId
				AND t.ventaArea > 0
                AND c.status = "Activo"
				AND d.projectId = "'.$this->projectId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$total = $this->Util()->DB()->GetSingle();
		
		return $total;
	}
		
	public function AddItemTotal(){
				
		$sql = "UPDATE 
					project SET 				 	
					items = (items + 1)
				WHERE 
					projectId = ".$this->projectId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;				
	}
	
	public function RemoveItemTotal(){
				
		$sql = "UPDATE 
					project SET 				 	
					items = (items - 1)
				WHERE 
					projectId = ".$this->projectId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		return true;				
	}
	
	function SaveImage(){		
				
		$projectId = $_POST['projectId'];
				
		$ruta = DOC_ROOT.'/images/projects';
				
		//Obtenemos los datos del archivo 
		$tamano = $_FILES["file"]['size'];
		$tipo = $_FILES["file"]['type'];
		$archivo = $_FILES["file"]['name'];
		$prefijo = substr(md5(uniqid(rand())),0,3);
		
		if ($archivo != "") {		
		
			//Obtenemos la extension del archivo
			$temp = explode(".",$archivo);
			$ext = strtolower($temp[1]);
			$nombre = substr($archivo,0,3).$prefijo;			
			
			$nomLogo = "img".$projectId."_".$prefijo.".".$ext;
			
			//Comparamos si el archivo es una imagen
			if ($ext == "gif" || $ext == "jpeg" || $ext == "jpg" || $ext == 'png'){										
				$destino =  $ruta."/".$nomLogo;					
				if (move_uploaded_file($_FILES['file']['tmp_name'],$destino)) {				
										
					//Eliminamos las imagenes actuales si existen
					$sqlQuery = "SELECT image FROM project WHERE projectId = ".$projectId;
					$this->Util()->DB()->setQuery($sqlQuery);
					$logo = $this->Util()->DB()->GetSingle();
					
					@unlink($ruta."/".$logo);
					@unlink($ruta."/th_".$logo);
																		
					$sqlQuery = "UPDATE project SET image = '".$nomLogo."' 
								 WHERE projectId = ".$projectId;
					$this->Util()->DB()->setQuery($sqlQuery);
					$this->Util()->DB()->UpdateData();
					
					//Creamos el thumb
					$this->ResizeImg($nomLogo);
										
					$mensaje = '<span class="txtGreen">Imagen actualizada correctamente.</span>';
					
				}else{
					$mensaje = '<span class="txtRed">Error al subir la imagen.</span>';
				}//else
			}else{				
				$mensaje = '<span class="txtRed">Imagen no valida. Debe ser gif, jpg o png.</span>';					
			}//else
		}else{
			$mensaje = '<span class="txtRed">Debe seleccionar una imagen.</span>';
		}//if
		
		return $mensaje;		
					
	}//SaveImage
	
	function DeleteImage(){
	
		$sqlQuery = 'SELECT image FROM project WHERE projectId = '.$this->projectId;
		$this->Util()->DB()->setQuery($sqlQuery);
		$logo = $this->Util()->DB()->GetSingle();
		
		$ruta = DOC_ROOT.'/images/projects';
		
		@unlink($ruta."/".$logo);
		@unlink($ruta."/th_".$logo);
				
		//actualizando bd
		$sqlQuery = 'UPDATE project SET image = "" WHERE projectId = '.$this->projectId;
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->UpdateData();
		
		$mensaje = '<span class="txtGreen">Imagen eliminada correctamente.</span>';
		
		return $mensaje;
	
	}//DeleteImage
	
	function ResizeImg($nombre){	
				
		$anchura = 200; 
		$hmax = 100; 					
					
		$ruta = DOC_ROOT.'/images/projects/';		
		
		$imagen = $ruta.$nombre;
		$th_img = $ruta.'th_'.$nombre;
		$datos = getimagesize($imagen); 
		
		if($datos[2]==1){	
			$img = @imagecreatefromgif($imagen);	
		}elseif($datos[2]==2){	
			$img = @imagecreatefromjpeg($imagen);	
		}elseif($datos[2]==3){	
			$img = @imagecreatefrompng($imagen);	
		}//elseif
		 
		if($datos[0] > $anchura){
			$ratio = ($datos[0] / $anchura); 
			$altura = ($datos[1] / $ratio); 
		}else{
			$anchura = $datos[0];
			$altura = $datos[1];
		}//else 
		
		if($altura > $hmax){		
			$anchura2 = ($hmax * $anchura)/$altura;
			$altura = $hmax;
			$anchura = $anchura2;	
		}//if
		
		$thumb = imagecreatetruecolor($anchura,$altura); 
		imagecopyresampled($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]); 
		
		if($datos[2]==1){			 
			imagegif($thumb,$th_img);
		}elseif($datos[2]==2){			
			imagejpeg($thumb,$th_img,100);
		}elseif($datos[2]==3){			
			imagepng($thumb,$th_img,100); 
		}//elseif
		 
		imagedestroy($thumb); 
	
	}//ResizeImg
	
}


?>