<?php

class ReqMat extends Main
{
	private $requisicionId;
	private $projectId;
	private $conceptId;
	private $reqPedidoId;
	private $quantity;
	private $supplierId;
	private $price;
	private $total;
	private $status;
	
	public function setReqMatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqMatId = $value;
	}
	
	public function setRequisicionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->requisicionId = $value;
	}
	
	public function setProjectId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proyecto'))
			$this->projectId = $value;
	}
		
	public function setConceptId($value)
	{
		$this->conceptId = $value;
	}
	
	public function setReqPedidoId($value)
	{
		$this->reqPedidoId = $value;
	}
	
	public function setConceptMatId($value)
	{
		$this->conceptMatId = $value;
	}
					
	public function setQuantity($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Solicitado'))
			if($this->Util()->ValidateDecimal($value, 'Solicitado'))
				$this->quantity = $value;
	}
	
	public function setSupplierId($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Proveedor'))
			if($this->Util()->ValidateDecimal($value, 'Proveedor'))
				$this->supplierId = $value;
	}
	
	public function setPrice($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Precio'))
			if($this->Util()->ValidateDecimal($value, 'Precio'))
				$this->price = $value;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	public function setTotal($value)
	{
		$this->total = $value;
	}
				
	public function Enumerate()
	{
		
		$sql = 'SELECT * FROM requisicion_material 
				WHERE requisicionId = "'.$this->requisicionId.'"
				AND conceptId = "'.$this->conceptId.'"
				AND conceptMatId = "'.$this->conceptMatId.'"
				ORDER BY requisicionId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
	
	public function EnumSingle()
	{
		
		$sql = 'SELECT * FROM requisicion_material 
				WHERE requisicionId = "'.$this->requisicionId.'"
				AND conceptId = "'.$this->conceptId.'"
				AND conceptMatId = "'.$this->conceptMatId.'"
				AND reqPedidoId = 0
				ORDER BY requisicionId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
	
	public function EnumByPedido()
	{
		
		$sql = 'SELECT * FROM requisicion_material 
				WHERE reqPedidoId = "'.$this->reqPedidoId.'"
				ORDER BY requisicionId ASC';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
		
	public function EnumPedidos()
	{
		
		$sql = 'SELECT * FROM requisicion_pedido
				WHERE requisicionId = "'.$this->requisicionId.'"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
					
		return $result;
	}
		
	public function Info()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					requisicion_material
				WHERE 
					reqMatId = "'.$this->reqMatId.'"';
	
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
					requisicion_material 
					(	
						projectId,
						requisicionId,
						conceptMatId,
						conceptId,
						reqPedidoId,
						quantity,
						supplierId,
						price,
						total,
						status
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->requisicionId.'",
						"'.$this->conceptMatId.'",
						"'.$this->conceptId.'",
						"'.$this->reqPedidoId.'",
						"'.$this->quantity.'",
						"'.$this->supplierId.'",
						"'.$this->price.'",
						"'.$this->total.'",
						"Pendiente"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$reqMatId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10090, 'complete');
		$this->Util()->PrintErrors();
		
		return $reqMatId;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					requisicion_material
				WHERE 
					reqMatId = '.$this->reqMatId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10092, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Confirm(){
				
		$sql = 'UPDATE 
					requisicion_material
				SET
					status = "Confirmado"
				WHERE 
					reqMatId = '.$this->reqMatId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
								
		$this->Util()->setError(11002, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdateStatus(){
				
		$sql = 'UPDATE 
					requisicion_material
				SET
					status = "'.$this->status.'"
				WHERE 
					reqMatId = "'.$this->reqMatId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
										
		return true;
				
	}
	
	public function GetTotalQtySolicitado(){
			
		$sql = 'SELECT 
					SUM(quantity)
				FROM  
					requisicion_material
				WHERE 
					requisicionId = "'.$this->requisicionId.'"
				AND
					conceptMatId = "'.$this->conceptMatId.'"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
										
		return $total;				
	}
	
	/*** PEDIDOS ***/
	
	public function SavePedido(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					requisicion_pedido
					(	
						projectId,
						requisicionId,						
						supplierId,						
						total,
						status
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->requisicionId.'",						
						"0",						
						"'.$this->total.'",
						"Pendiente"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$reqPedidoId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10090, 'complete');
		$this->Util()->PrintErrors();
		
		return $reqPedidoId;
				
	}
	
	public function InfoPedidos(){
			
		$sql = 'SELECT 
					*
				FROM  
					requisicion_pedido
				WHERE 
					reqPedidoId = "'.$this->reqPedidoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
										
		return $info;				
	}
	
	public function DeletePedidos(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		echo $sql = 'DELETE FROM 
					requisicion_pedido
				WHERE 
					reqPedidoId = "'.$this->reqPedidoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					requisicion_material
				WHERE 
					reqPedidoId = "'.$this->reqPedidoId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10092, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function ConfirmPedidos(){
				
		$sql = 'UPDATE 
					requisicion_pedido
				SET
					status = "Confirmado"
				WHERE 
					reqPedidoId = '.$this->reqPedidoId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
								
		$this->Util()->setError(11002, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function UpdateStatusPedidos(){
				
		$sql = 'UPDATE 
					requisicion_pedido
				SET
					status = "'.$this->status.'"
				WHERE 
					reqPedidoId = "'.$this->reqPedidoId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
										
		return true;
				
	}
	
	public function IsPedidoComplete()
	{
		
		$sql = 'SELECT COUNT(*) FROM requisicion_material 
				WHERE reqPedidoId = "'.$this->reqPedidoId.'"
				AND status = "Pendiente"';
		$this->Util()->DB()->setQuery($sql);
		$pendientes = $this->Util()->DB()->GetSingle();
		
		if($pendientes)
			return false;
		else
			return true;
			
	}
			
}

?>