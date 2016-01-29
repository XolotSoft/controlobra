<?php

class Cuantificacion extends Main
{
	private $cuantificacionId;
	private $projectId;
	private $supplierId;
	private $conceptId;
	private $projTypeId;
	private $qtyConcept;
	private $noPresupuesto;
	private $qtyArea;
	private $projEjeId;
	private $ejes;
	private $b;
	private $h;
	private $z;
	private $bV;	
	private $hV;
	private $zV;
	private $unitId;
	private $subtotal;
	private $total;
	private $steel;
	private $unitPrice;
	
	private $projItemId;
	private $categoryId;
	private $subcategoryId;
	private $conceptConId;
	private $projLevelId;
	private $projLevelId2;
	
	private $materialId;
	private $projTypeIds;
	
	private $isExtra;
	
	public function setCuantificacionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->cuantificacionId = $value;
	}
	
	public function setProjectId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proyecto'))
			$this->projectId = $value;
	}
	
	public function setSupplierId($value)
	{
		//if($this->Util()->ValidateRequireField($value, 'Contratista'))
			$this->supplierId = $value;
	}
	
	public function setProjItemId($value)
	{
		$this->projItemId = $value;
	}
			
	public function setConceptId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Concepto'))
			$this->conceptId = $value;
	}
		
	public function setProjTypeId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo de Area'))
			$this->projTypeId = $value;
	}
	
	public function setQtyConcept($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad de Conceptos'))
			if($this->Util()->ValidateFieldCero($value, 'Cantidad de Conceptos'))			
				$this->qtyConcept = $value;
	}
	
	public function setNoPresupuesto($value)
	{
		$this->noPresupuesto = $value;
	}
	
	public function setQtyArea($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad de Areas'))
			if($this->Util()->ValidateFieldCero($value, 'Cantidad de Areas'))			
				$this->qtyArea = $value;
	}
	
	public function setProjEjeId($value)
	{
		//if($this->Util()->ValidateRequireField($value, 'Ejes'))
			$this->projEjeId = $value;
	}
	
	public function setEjes($value)
	{
		$this->ejes = $value;
	}
	
	public function setB($value)
	{
		$this->b = $value;
	}
	
	public function setH($value)
	{
		$this->h = $value;
	}
	
	public function setZ($value)
	{
		$this->z = $value;
	}
	
	public function setBV($value)
	{
		$this->bV = $value;
	}
	
	public function setHV($value)
	{
		$this->hV = $value;
	}
	
	public function setZV($value)
	{
		$this->zV = $value;
	}
	
	public function setUnitId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Unidad'))
			$this->unitId = $value;
	}
	
	public function setSubtotal($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Subtotal'))
		$this->subtotal = $value;
	}
	
	public function setTotal($value)
	{
		if($this->Util()->ValidateDecimal($value, 'Total'))
		$this->total = $value;
	}
	
	public function setCategoryId($value)
	{
		$this->categoryId = $value;
	}
	
	public function setSubcategoryId($value)
	{
		$this->subcategoryId = $value;
	}
	
	public function setConceptConId($value)
	{
		$this->conceptConId = $value;
	}
	
	public function setProjLevelId($value)
	{
		$this->projLevelId = $value;
	}
	
	public function setProjLevelId2($value)
	{
		$this->projLevelId2 = $value;
	}
	
	public function setSteel($value)
	{
		$this->steel = $value;
	}
	
	public function setUnitPrice($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Precio Unitario'))
			$this->unitPrice = $value;
	}
	
	public function setMaterialId($value)
	{
		$this->materialId = $value;
	}
	
	public function setProjTypeIds($value)
	{
		$this->projTypeIds = $value;
	}
	
	public function setIsExtra($value){
		$this->isExtra = $value;
	}
				
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM cuantificacion');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/cuantificacion');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM cuantificacion ORDER BY cuantificacionId ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateByProject()
	{
		$sql = 'SELECT * FROM cuantificacion 
				WHERE projectId = "'.$this->projectId.'"
				ORDER BY cuantificacionId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					cuantificacion 
				WHERE 
					cuantificacionId = "'.$this->cuantificacionId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function InfoEjes()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					cuantificacion_ejes
				WHERE 
					cuantificacionId = "'.$this->cuantificacionId.'"
				ORDER BY cuantEjeId ASC';
	
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function InfoByConceptId()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					cuantificacion 
				WHERE 
					conceptId = "'.$this->conceptId.'"
				AND
					projectId = "'.$this->projectId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					cuantificacion 
					(	
						projectId,
						supplierId,						
						conceptId,					
						projTypeId,
						qtyConcept,
						noPresupuesto,
						qtyArea,
						b,
						h,
						z,
						bV,
						hV,
						zV,
						unitId,
						subtotal,
						total,
						steel,
						isExtra
					)
				 VALUES 
					(									
						"'.$this->projectId.'",
						"'.$this->supplierId.'",
						"'.$this->conceptId.'",
						"'.$this->projTypeId.'",
						"'.$this->qtyConcept.'",
						"'.$this->noPresupuesto.'",
						"'.$this->qtyArea.'",
						"'.$this->b.'",
						"'.$this->h.'",
						"'.$this->z.'",
						"'.$this->bV.'",
						"'.$this->hV.'",
						"'.$this->zV.'",
						"'.$this->unitId.'",
						"'.$this->subtotal.'",
						"'.$this->total.'",
						"'.$this->steel.'",
						"'.$this->isExtra.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$cuantificacionId = $this->Util()->DB()->InsertData();
		
		foreach($this->ejes as $res){
			$sql = 'INSERT INTO cuantificacion_ejes
					(cuantificacionId, projEjeNId, projEjeLId, projEjeN2Id, projEjeL2Id)
					VALUES ("'.$cuantificacionId.'", "'.$res['projEjeNId'].'", "'.$res['projEjeLId'].'", "'.$res['projEjeN2Id'].'", "'.$res['projEjeL2Id'].'")';
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		
		$this->Util()->setError(10072, 'complete');
		$this->Util()->PrintErrors();
		
		return $cuantificacionId;
				
	}
		
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					cuantificacion SET 
					conceptId = "'.$this->conceptId.'",	
					qtyConcept = "'.$this->qtyConcept.'", 
					supplierId = "'.$this->supplierId.'",
					noPresupuesto = "'.$this->noPresupuesto.'",
					qtyArea = "'.$this->qtyArea.'",
					b = "'.$this->b.'",
					h = "'.$this->h.'",
					z = "'.$this->z.'",
					bV = "'.$this->bV.'",
					hV = "'.$this->hV.'",
					zV = "'.$this->zV.'",
					unitId = "'.$this->unitId.'",
					subtotal = "'.$this->subtotal.'",
					total = "'.$this->total.'",
					isExtra = "'.$this->isExtra.'"
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10073, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					cuantificacion
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					cuantificacion_ejes
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					cuantificacion_item
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					cuantificacion_material
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					cuantificacion_type
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10074, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function SaveEjes(){
		
		foreach($this->ejes as $res){
			$sql = 'INSERT INTO cuantificacion_ejes
					(
						cuantificacionId, 
						projEjeNId, 
						projEjeLId, 
						projEjeN2Id, 
						projEjeL2Id
					)VALUES (
						"'.$this->cuantificacionId.'", 
						"'.$res['projEjeNId'].'", 
						"'.$res['projEjeLId'].'", 
						"'.$res['projEjeN2Id'].'", 
						"'.$res['projEjeL2Id'].'"
					)';
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		
	}
	
	public function DeleteEjes(){
						
		$sql = 'DELETE FROM 
					cuantificacion_ejes
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	public function SaveServ(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					cuantificacion 
					(	
						projectId,					
						conceptId,					
						qtyConcept,
						unitPrice,
						total
					)
				 VALUES 
					(									
						"'.$this->projectId.'",
						"'.$this->conceptId.'",
						"'.$this->qtyConcept.'",						
						"'.$this->unitPrice.'",
						"'.$this->total.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10072, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function SaveProjTypes(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					cuantificacion_type
					(	
						cuantificacionId,					
						projTypeId
					)
				 VALUES 
					(									
						"'.$this->cuantificacionId.'",
						"'.$this->projTypeId.'"						
					)';								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
						
		return true;
				
	}
	
	public function DeleteProjTypes(){
						
		$sql = 'DELETE FROM 
					cuantificacion_type
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	public function UpdateServ(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE 
					cuantificacion SET 				 	
					qtyConcept = "'.$this->qtyConcept.'",
					unitPrice = "'.$this->unitPrice.'",
					total = "'.$this->total.'"
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10073, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					cuantificacion 
				WHERE 
					cuantificacionId = '.$this->cuantificacionId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function GetConceptsByProjId()
	{
		$sql = 'SELECT conceptId FROM cuantificacion
				WHERE projectId = "'.$this->projectId.'"
				GROUP BY conceptId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetConceptsSubcontByProjId()
	{
		$sql = 'SELECT 
					cuan.conceptId 
				FROM 
					cuantificacion AS cuan,
					concept AS con
				WHERE 
					cuan.conceptId = con.conceptId					
				AND
					cuan.projectId = "'.$this->projectId.'"
				AND
					con.tipo = "Subcontrato"
				GROUP BY 
					cuan.conceptId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetConceptsSubcontServ()
	{
		$sql = 'SELECT 
					cuan.conceptId 
				FROM 
					cuantificacion AS cuan,
					concept AS con
				WHERE 
					cuan.conceptId = con.conceptId					
				AND
					cuan.projectId = "'.$this->projectId.'"
				AND
					(con.tipo = "Subcontrato"
				OR
					con.tipo = "Servicio")
				GROUP BY 
					cuan.conceptId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetConceptsObraByProjId()
	{
		$sql = 'SELECT 
					cuan.conceptId 
				FROM 
					cuantificacion AS cuan,
					concept AS con
				WHERE 
					cuan.conceptId = con.conceptId					
				AND
					cuan.projectId = "'.$this->projectId.'"
				AND
					con.tipo = "Obra"
				GROUP BY 
					cuan.conceptId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumItems()
	{
		$sql = 'SELECT ci.projItemId FROM cuantificacion AS c, cuantificacion_item AS ci
				WHERE c.projectId = "'.$this->projectId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.conceptId = "'.$this->conceptId.'"
				AND c.supplierId = "'.$this->supplierId.'"
				GROUP BY projItemId
				ORDER BY ci.projItemId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
		
	public function EnumLevels()
	{
		$sql = 'SELECT ci.projLevelId, ci.projLevelId2 FROM cuantificacion AS c, cuantificacion_item AS ci
				WHERE c.projectId = "'.$this->projectId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.conceptId = "'.$this->conceptId.'"
				AND ci.projItemId = "'.$this->projItemId.'"
				ND c.supplierId = "'.$this->supplierId.'"
				LIMIT 1';
		$this->Util()->DB()->setQuery($sql);		
		$row = $this->Util()->DB()->GetRow();
		
		return $row;
	}
	
	public function GetQtyConcept()
	{
		$sql = 'SELECT qtyConcept 
				FROM cuantificacion
				WHERE projectId = "'.$this->projectId.'"
				AND conceptId = "'.$this->conceptId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$qtyConcept = $this->Util()->DB()->GetSingle();
		
		return $qtyConcept;	
	}
	
	public function GetTotalQtyConcept()
	{
		$sql = 'SELECT SUM(qtyConcept)
				FROM cuantificacion
				WHERE projectId = "'.$this->projectId.'"
				AND conceptId = "'.$this->conceptId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$qtyConcept = $this->Util()->DB()->GetSingle();
		
		return $qtyConcept;	
	}
	
	public function GetTotalQtyConcept2()
	{
		$sql = 'SELECT SUM(total)
				FROM cuantificacion
				WHERE projectId = "'.$this->projectId.'"
				AND conceptId = "'.$this->conceptId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$qtyConcept = $this->Util()->DB()->GetSingle();
		
		return $qtyConcept;	
	}
	
	public function EnumCatsByProject()
	{
		$sql = 'SELECT cat.* FROM cuantificacion AS cuant, concept AS con, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				GROUP BY categoryId
				ORDER BY cat.noCat ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumItemsByProj()
	{
		$sql = 'SELECT item.* FROM cuantificacion AS cuant, cuantificacion_item AS item
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				GROUP BY item.projItemId';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasByItemAndProj()
	{
		$sql = 'SELECT area.* FROM cuantificacion AS cuant, cuantificacion_item AS item, cuantificacion_type AS area
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND cuant.cuantificacionId = area.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				GROUP BY area.projTypeId';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasCatByItemAndProj()
	{
		$sql = 'SELECT con.* FROM cuantificacion AS cuant, cuantificacion_item AS item, cuantificacion_type AS area,
				concept AS con
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND cuant.cuantificacionId = area.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND area.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				GROUP BY con.categoryId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasSubcatByItemAndProj()
	{
		$sql = 'SELECT con.* FROM cuantificacion AS cuant, cuantificacion_item AS item, cuantificacion_type AS area,
				concept AS con
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND cuant.cuantificacionId = area.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND area.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = "'.$this->categoryId.'"
				GROUP BY con.subcategoryId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumAreasConceptByItemAndProj()
	{
		$sql = 'SELECT con.* FROM cuantificacion AS cuant, cuantificacion_item AS item, cuantificacion_type AS area,
				concept AS con
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND cuant.cuantificacionId = area.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND area.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				GROUP BY con.conceptConId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumDescripciones()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId, con.tipo 
				FROM cuantificacion AS cuant, cuantificacion_item AS item, cuantificacion_type AS area,
				concept AS con
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND cuant.cuantificacionId = area.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND area.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = "'.$this->conceptConId.'"
				GROUP BY cuant.conceptId';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCatsByProjAndArea()
	{
		$sql = 'SELECT cat.* FROM cuantificacion AS cuant, cuantificacion_item AS item, concept AS con, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND cuant.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				GROUP BY categoryId
				ORDER BY cat.noCat ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatCatsByProject($isExtra = false)
	{
		if($isExtra)
			$sqlExtra = ' AND cuant.isExtra = "1"';
	
		$sql = 'SELECT cat.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				'.$sqlExtra.'
				GROUP BY categoryId
				ORDER BY cat.noCat ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumSubcatsByProj()
	{
		$sql = 'SELECT subcat.* FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				GROUP BY subcategoryId
				ORDER BY subcat.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumSubcats0ByProj()
	{
		$sql = 'SELECT cuant.* FROM cuantificacion AS cuant, concept AS con, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = 0
				GROUP BY subcategoryId
				ORDER BY con.name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumSubcatsByProjAndArea()
	{
		$sql = 'SELECT subcat.* FROM cuantificacion AS cuant, cuantificacion_item AS item, concept AS con, 
				category AS cat, subcategory AS subcat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND cuant.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				GROUP BY subcategoryId
				ORDER BY subcat.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatSubcatsByProj($isExtra = false)
	{
		if($isExtra)
			$sqlExtra = ' AND cuant.isExtra = "1"';
			
		$sql = 'SELECT subcat.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat,
				subcategory AS subcat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				AND m.categoryId = "'.$this->categoryId.'"
				AND m.subcategoryId = subcat.subcategoryId
				'.$sqlExtra.'
				GROUP BY m.subcategoryId
				ORDER BY subcat.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConcepts2ByProj()
	{
		$sql = 'SELECT cc.* 
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = cc.conceptConId
				GROUP BY conceptConId
				ORDER BY cc.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
			
	public function EnumConcepts2ByProjAndArea()
	{
		$sql = 'SELECT cc.* 
				FROM cuantificacion AS cuant, cuantificacion_item AS item, 
				concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND cuant.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = cc.conceptConId
				GROUP BY conceptConId
				ORDER BY cc.name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatConceptsByProj($isExtra = false)
	{
		if($isExtra)
			$sqlExtra = ' AND cuant.isExtra = "1"';
			
		$sql = 'SELECT mc.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat,
				subcategory AS subcat, concept_concept AS mc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				AND m.categoryId = "'.$this->categoryId.'"
				AND m.subcategoryId = subcat.subcategoryId
				AND m.subcategoryId = "'.$this->subcategoryId.'"
				AND m.conceptConId = mc.conceptConId
				'.$sqlExtra.'
				GROUP BY m.conceptConId
				ORDER BY mc.name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumConceptsByProj()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"				
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConcepts0ByProj()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId
				FROM cuantificacion AS cuant, concept AS con, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = 0
				AND con.conceptConId = 0
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConceptsByProjRes()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId, con.tipo
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = cc.conceptConId
				AND con.conceptConId = "'.$this->conceptConId.'"
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConcepts00ByProjRes()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId, con.tipo
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = 0
				AND con.conceptConId = 0
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConcepts0ByProjRes()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId, con.tipo
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = 0
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumConceptsByProjResAndArea()
	{
		$sql = 'SELECT con.name, cuant.cuantificacionId, cuant.conceptId, con.tipo
				FROM cuantificacion AS cuant,  cuantificacion_item AS item, 
				concept AS con, category AS cat, subcategory AS subcat, concept_concept AS cc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.cuantificacionId = item.cuantificacionId
				AND item.projItemId = "'.$this->projItemId.'"
				AND cuant.projTypeId = "'.$this->projTypeId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND con.conceptConId = cc.conceptConId
				AND con.conceptConId = "'.$this->conceptConId.'"
				GROUP BY cuant.conceptId
				ORDER BY con.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatConceptsByProjRes()
	{
		$sql = 'SELECT m.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat,
				subcategory AS subcat, concept_concept AS mc
				WHERE cuant.projectId = "'.$this->projectId.'"				
				AND cuant.conceptId = con.conceptId				
				AND con.conceptId = cm.conceptId				
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				AND m.categoryId = "'.$this->categoryId.'"
				AND m.subcategoryId = subcat.subcategoryId
				AND m.subcategoryId = "'.$this->subcategoryId.'"
				AND m.conceptConId = mc.conceptConId
				AND m.conceptConId = "'.$this->conceptConId.'"
				GROUP BY m.conceptConId
				ORDER BY m.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatConcepts0ByProjRes()
	{
		$sql = 'SELECT m.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat,
				subcategory AS subcat, concept_concept AS mc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				AND m.categoryId = "'.$this->categoryId.'"
				AND m.subcategoryId = subcat.subcategoryId
				AND m.subcategoryId = "'.$this->subcategoryId.'"				
				AND m.conceptConId = 0
				GROUP BY m.conceptConId
				ORDER BY m.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumMatConcepts00ByProjRes()
	{
		$sql = 'SELECT m.* 
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m, category AS cat,
				subcategory AS subcat, concept_concept AS mc
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.categoryId = cat.categoryId
				AND m.categoryId = "'.$this->categoryId.'"
				AND m.subcategoryId = 0				
				AND m.conceptConId = 0
				GROUP BY m.conceptConId
				ORDER BY m.name ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCuantByConcept()
	{
		$sql = 'SELECT con.*, cuant.* 
				FROM cuantificacion AS cuant, concept AS con, category AS cat, subcategory AS subcat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = subcat.subcategoryId
				AND con.subcategoryId = "'.$this->subcategoryId.'"
				AND cuant.conceptId = "'.$this->conceptId.'"
				ORDER BY cuant.cuantificacionId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	public function EnumCuantByConcept0()
	{
		$sql = 'SELECT con.*, cuant.* 
				FROM cuantificacion AS cuant, concept AS con, category AS cat
				WHERE cuant.projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.categoryId = cat.categoryId
				AND con.categoryId = "'.$this->categoryId.'"
				AND con.subcategoryId = 0
				AND cuant.conceptId = "'.$this->conceptId.'"
				ORDER BY cuant.cuantificacionId ASC';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function GetTotalMaterialRes(){
		
		$sql = 'SELECT SUM( cuant.qtyConcept * cm.quantity )
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m
				WHERE projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.materialId = "'.$this->materialId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->Getsingle();
		
		return $total;
	}
	
	public function GetTotalMaterialRes2(){
		
		$sql = 'SELECT SUM( cuant.total * cm.quantity )
				FROM cuantificacion AS cuant, concept AS con, concept_material AS cm, material AS m
				WHERE projectId = "'.$this->projectId.'"
				AND cuant.conceptId = con.conceptId
				AND con.conceptId = cm.conceptId
				AND cm.materialId = m.materialId
				AND m.materialId = "'.$this->materialId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->Getsingle();
		
		return $total;
	}
			
	public function GetSupplierByConcept()
	{
		$sql = 'SELECT c.supplierId, s.name 
				FROM cuantificacion AS c, supplier AS s
				WHERE c.projectId = "'.$this->projectId.'"				
				AND c.conceptId = "'.$this->conceptId.'"
				AND c.supplierId = s.supplierId
				GROUP BY c.supplierId
				ORDER BY s.name ASC';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetLevelsByProjItemId()
	{
		$sql = 'SELECT ci.* FROM cuantificacion_item AS ci, cuantificacion AS c
				WHERE ci.projItemId = "'.$this->projItemId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				AND c.projTypeId = "'.$this->projTypeId.'"
				AND c.supplierId = "'.$this->supplierId.'"
				';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetLevelsByProjItemId2($projTypeIds = 0)
	{		
		$sql = 'SELECT ci . * , c.projectId, c.conceptId, ct.projTypeId
				FROM cuantificacion_item AS ci, cuantificacion AS c, cuantificacion_type AS ct
				WHERE ci.cuantificacionId = c.cuantificacionId
				AND ct.cuantificacionId = c.cuantificacionId
				AND ci.projItemId = "'.$this->projItemId.'"
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				AND ct.projTypeId IN ('.$projTypeIds.')
				GROUP BY ci.cuantItemId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumTypesByConcept()
	{		
		$sql = 'SELECT ct . * , c.conceptId, c.projectId, ct.projTypeId, pt.name
				FROM cuantificacion AS c, cuantificacion_type AS ct, project_type AS pt
				WHERE c.cuantificacionId = ct.cuantificacionId
				AND ct.projTypeId = pt.projTypeId
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				GROUP BY ct.projTypeId
				ORDER BY pt.name ASC';				
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetAreasByLevel()
	{
		
		$sql = 'SELECT * FROM project_depto 
				WHERE projectId = "'.$this->projectId.'"
				AND projItemId = "'.$this->projItemId.'"
				AND projLevelId >= "'.$this->projLevelId.'"
				AND projLevelId <= "'.$this->projLevelId2.'"
				AND projTypeId = "'.$this->projTypeId.'"
				ORDER BY name ASC';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;		
		
	}
	
	public function GetAreasByLevel2($projTypeIds = 0)
	{		
		$sql = 'SELECT * FROM project_depto 
				WHERE projectId = "'.$this->projectId.'"
				AND projItemId = "'.$this->projItemId.'"
				AND projLevelId >= "'.$this->projLevelId.'"
				AND projLevelId <= "'.$this->projLevelId2.'"
				AND projTypeId IN ('.$projTypeIds.')
				ORDER BY name ASC';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;		
		
	}
	
	public function GetSubtotalByCuantId()
	{
		$sql = 'SELECT subtotal FROM cuantificacion
				WHERE cuantificacionId = "'.$this->cuantificacionId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$subtotal = $this->Util()->DB()->GetSingle();
		
		return $subtotal;
	}
	
	public function ExistCuantificacion()
	{
		$sql = 'SELECT ci.*
				FROM cuantificacion AS c, cuantificacion_item AS ci
				WHERE c.cuantificacionId = ci.cuantificacionId
				AND ci.projItemId = "'.$this->projItemId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				AND c.projTypeId = "'.$this->projTypeId.'"
				LIMIT 1';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function ExistCuantificacion2()
	{
		$sql = 'SELECT ci.*
				FROM cuantificacion AS c, cuantificacion_item AS ci
				WHERE c.cuantificacionId = ci.cuantificacionId
				AND ci.projItemId = "'.$this->projItemId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				LIMIT 1';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumMaterials()
	{
		$sql = 'SELECT * FROM cuantificacion_material
				WHERE cuantificacionId = "'.$this->cuantificacionId.'"';
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetTypeAreas()
	{
		$sql = 'SELECT * FROM cuantificacion_type
				WHERE cuantificacionId = "'.$this->cuantificacionId.'"
				';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	/*** REQUISICION ***/
	
	public function EnumItemsReq()
	{
		$sql = 'SELECT ci.projItemId FROM cuantificacion AS c, cuantificacion_item AS ci
				WHERE c.projectId = "'.$this->projectId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.conceptId = "'.$this->conceptId.'"				
				GROUP BY projItemId
				ORDER BY ci.projItemId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function GetLevelsByProjItemIdReq($projTypeIds)
	{
		$sql = 'SELECT ci.*, c.projectId, c.conceptId, ct.projTypeId
				FROM cuantificacion_item AS ci, cuantificacion AS c, cuantificacion_type AS ct
				WHERE ci.cuantificacionId = c.cuantificacionId
				AND c.cuantificacionId = ct.cuantificacionId
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				AND ci.projItemId = "'.$this->projItemId.'"
				AND ct.projTypeId IN ('.$projTypeIds.')
				GROUP BY cuantItemId';	
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	
	/*** ESTIMACION ACERO ***/
	
	public function GetLevelsByProjItemIdAcero()
	{
		$sql = 'SELECT ci.* FROM cuantificacion_item AS ci, cuantificacion AS c
				WHERE ci.projItemId = "'.$this->projItemId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				AND c.supplierId = "'.$this->supplierId.'"
				';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	/**** REQUISICION ACERO ***/
	
	public function GetLevelsByProjItemIdAceroReq()
	{
		$sql = 'SELECT ci.* FROM cuantificacion_item AS ci, cuantificacion AS c
				WHERE ci.projItemId = "'.$this->projItemId.'"
				AND ci.cuantificacionId = c.cuantificacionId
				AND c.projectId = "'.$this->projectId.'"
				AND c.conceptId = "'.$this->conceptId.'"
				';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	/**** OTHERS ****/
	
	function ExistCuant($items, $typeAreas, $ejes){
		
		if($this->cuantificacionId)
			$sqlAdd = ' AND cuantificacionId <> "'.$this->cuantificacionId.'"';
		
		$sql = 'SELECT * FROM cuantificacion
				WHERE projectId = "'.$this->projectId.'"
				AND conceptId = "'.$this->conceptId.'"
				AND supplierId = "'.$this->supplierId.'"
				AND qtyConcept = "'.$this->qtyConcept.'"
				AND noPresupuesto = "'.$this->noPresupuesto.'"'.$sqlAdd;
		$this->Util()->DB()->setQuery($sql);		
		$cuants = $this->Util()->DB()->GetResult();
		
		if(count($cuants) == 0)
			return false;
		
		//Checamos los Niveles si estan repetidos
		$continuar = true;
		$cuants2 = array();
		foreach($cuants as $res){
			
			$totItems = 0;
			foreach($items as $res2){
			
				$sql = 'SELECT COUNT(*) FROM cuantificacion_item
						WHERE cuantificacionId = "'.$res['cuantificacionId'].'"
						AND projItemId = "'.$res2['projItemId'].'"
						AND projLevelId = "'.$res2['projLevelId'].'"
						AND projLevelId2 = "'.$res2['projLevelId2'].'"';
				$this->Util()->DB()->setQuery($sql);		
				$totItems += $this->Util()->DB()->GetSingle();
			
			}//foreach
			
			if($totItems != count($items))
				$continuar = false;
			else
				$cuants2[] = $res['cuantificacionId'];
			
		}//foreach
		
		if($continuar == false)
			return false;
		
		//Checamos los tipos de area
		
		$continuar = true;
		$cuants3 = array();
		foreach($cuants2 as $cuantificacionId){
			
			$totAreas = 0;
			foreach($typeAreas as $projTypeId){
			
				$sql = 'SELECT COUNT(*) FROM cuantificacion_type
						WHERE cuantificacionId = "'.$cuantificacionId.'"
						AND projTypeId = "'.$projTypeId.'"';
				$this->Util()->DB()->setQuery($sql);		
				$totAreas += $this->Util()->DB()->GetSingle();
			
			}//foreach
			
			if($totAreas != count($typeAreas))
				$continuar = false;
			else
				$cuants3[] = $res['cuantificacionId'];			
			
		}//foreach
		
		if($continuar == false)
			return false;
				
		$continuar = true;
		foreach($cuants3 as $cuantificacionId){
			
			$totEjes = 0;
			foreach($ejes as $res2){
				
				$sql = 'SELECT COUNT(*) FROM cuantificacion_ejes
						WHERE cuantificacionId = "'.$cuantificacionId.'"
						AND projEjeNId = "'.$res2['projEjeNId'].'"
						AND projEjeLId = "'.$res2['projEjeLId'].'"
						AND projEjeN2Id = "'.$res2['projEjeN2Id'].'"
						AND projEjeL2Id = "'.$res2['projEjeL2Id'].'"';
				$this->Util()->DB()->setQuery($sql);		
				$totEjes += $this->Util()->DB()->GetSingle();				
			}
			
			if($totEjes != count($ejes))
				$continuar = false;
		
		}//foreach
		
		if($continuar == false)
			return false;			
				
		return true;
		
	}
		
}


?>