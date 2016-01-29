<?php

class OrderBuy extends Main
{
	private $orderBuyId;
	private $ordBuyItemId;
	private $projectId;
	private $requisicionId;
	private $reqPedidoId;
	private $reqMatId;	
	private $supplierId;
	private $conceptMatId;
	private $price;
	private $quantity;
	private $total;
	private $fecha;
	private $confirm;
	private $status;
	
	private $email;
	private $comments;
		
	public function setOrderBuyId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->orderBuyId = $value;
	}
	
	public function setOrdBuyItemId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->ordBuyItemId = $value;
	}
	
	public function setProjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->projectId = $value;
	}
	
	public function setRequisicionId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->requisicionId = $value;
	}
	
	public function setReqMatId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqMatId = $value;
	}
	
	public function setReqPedidoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->reqPedidoId = $value;
	}
	
	public function setSupplierId($value)
	{
		$this->supplierId = $value;
	}
		
	public function setConceptMatId($value)
	{
		$this->conceptMatId = $value;
	}
							
	public function setPrice($value)
	{
		$this->price = $value;
	}
	
	public function setQuantity($value)
	{
		$this->quantity = $value;
	}
	
	public function setQuantityR($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Cantidad'))
			$this->quantity = $value;
	}
	
	public function setTotal($value)
	{
		$this->total = $value;
	}
	
	public function setFecha($value)
	{
		$this->fecha = $value;
	}
	
	public function setFechaR($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Fecha'))
			$this->fecha = $value;
	}

	public function setConfirm($value)
	{
		$this->confirm = $value;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	/*****/
	
	public function setEmail($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Correo electr&oacute;nico'))
			if($this->Util->ValidateEmail($value))
				$this->email = $value;
	}
	
	public function setSubject($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Asunto'))
			$this->subject = $value;
	}
	
	public function setMessage($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Mensaje'))
			$this->message = $value;
	}
	
	public function setComments($value)
	{
		$this->Util()->ValidateString($value, $max_chars=2000, $minChars = 0, '');
		$this->comments = $value;
	}
	
	public function Enumerate($status = 'Pendiente')
	{
		if($status)
			$sqlFilter = ' AND status = "'.$status.'"';
		
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM order_buy WHERE projectId = "'.$this->projectId.'"'.$sqlFilter);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/category');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM order_buy 
									   WHERE projectId = "'.$this->projectId.'"
									   '.$sqlFilter.' 
									   ORDER BY orderBuyId ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateSend($status = 'Pendiente', $fechaEnt = '')
	{
		$sqlFilter = '';
		
		if($status == 'NoEnviado')
			$sqlFilter = ' AND enviado = "0"';
		elseif($status == 'Enviado')
			$sqlFilter = ' AND enviado = "1"';
		
		if($fechaEnt == 2)
			$sqlFilter .= ' AND fechaEntrega = ""';
		elseif($fechaEnt == 1)
			$sqlFilter .= ' AND fechaEntrega <> ""';
		
		$sqlFilter .= ' AND status = "Confirmado"';
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM order_buy WHERE projectId = "'.$this->projectId.'"'.$sqlFilter);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/category');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		$this->Util()->DB()->setQuery('SELECT * FROM order_buy 
									   WHERE projectId = "'.$this->projectId.'"
									   '.$sqlFilter.' 
									   ORDER BY orderBuyId ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data['items'] = $result;
		$data['pages'] = $pages;
				
		return $data;
	}
	
	public function EnumerateEnt($status = 'Pendiente')
	{
		if($status == 'Pendiente')
			$sqlFilter = ' AND (stEntrega = "Pendiente" OR stEntrega = "Proceso")';
		elseif($status == 'Completo')
			$sqlFilter = ' AND (stEntrega = "Completo" OR stEntrega = "Pagos")';
		elseif($status)
			$sqlFilter = ' AND stEntrega = "'.$status.'"';
		
		$sql = 'SELECT 
					COUNT(*) 
				FROM 
					order_buy 
				WHERE 
					projectId = "'.$this->projectId.'"
				AND
					status <> "Pendiente"
				AND
					fechaEntrega <> ""
				AND
					enviado = "1"
					'.$sqlFilter;
		
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT.'/category');

		$sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
		
		$sql = 'SELECT 
					* 
				FROM 
					order_buy 
			    WHERE 
					projectId = "'.$this->projectId.'"
			    AND
					status <> "Pendiente"
				AND
					fechaEntrega <> ""
				AND
					enviado = "1"
					'.$sqlFilter.' 
				ORDER BY 
					orderBuyId ASC '.$sql_add;
		
		$this->Util()->DB()->setQuery($sql);
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
					order_buy
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
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
					order_buy 
					(	
						projectId,
						requisicionId,
						reqPedidoId,
						reqMatId,						
						supplierId,
						conceptMatId,						
						price,
						quantity,
						total,
						fecha,
						confirm,
						enviado
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->requisicionId.'",
						"'.$this->reqPedidoId.'",
						"'.$this->reqMatId.'",
						"'.$this->supplierId.'",
						"'.$this->conceptMatId.'",
						"'.$this->price.'",
						"'.$this->quantity.'",
						"'.$this->total.'",
						"'.$this->fecha.'",
						"'.$this->confirm.'",
						"0"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$orderBuyId = $this->Util()->DB()->InsertData();
				
		//$this->Util()->setError(10090, 'complete');
		//$this->Util()->PrintErrors();
		
		return $orderBuyId;
				
	}
		
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'DELETE FROM 
					order_buy
				WHERE 
					orderBuyId = '.$this->orderBuyId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					order_buy_item
				WHERE 
					orderBuyId = '.$this->orderBuyId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					order_buy_entrega
				WHERE 
					orderBuyId = '.$this->orderBuyId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					account_payment
				WHERE 
					orderBuyId = '.$this->orderBuyId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = 'DELETE FROM 
					account_pagos
				WHERE 
					orderBuyId = '.$this->orderBuyId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
								
		$this->Util()->setError(10110, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Confirm()
	{
		
		$sql = 'UPDATE
					order_buy
				SET
					confirm = "'.$this->confirm.'"
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
	}
	
	public function UpdateStatus()
	{
		
		$sql = 'UPDATE
					order_buy
				SET
					status = "'.$this->status.'"
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
	}
	
	public function UpdateComments()
	{		
		$sql = 'UPDATE
					order_buy
				SET
					comments = "'.utf8_decode($this->comments).'"
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(11036, 'complete');
		$this->Util()->PrintErrors();
				
		return true;
	}
	
	public function UpdateStatusEnt()
	{
		
		$sql = 'UPDATE
					order_buy
				SET
					stEntrega = "'.$this->status.'"
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
	}
	
	public function UpdateTotal()
	{
		
		$sql = 'UPDATE
					order_buy
				SET
					total = "'.$this->total.'"
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
	}
	
	//ITEMS
	
	public function SaveItem(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					order_buy_item 
					(	
						orderBuyId,
						requisicionId,
						reqPedidoId,
						reqMatId,
						conceptMatId,
						quantity,
						price,						
						total
					)
				 VALUES 
					(									
						"'.$this->orderBuyId.'",						
						"'.$this->requisicionId.'",
						"'.$this->reqPedidoId.'",
						"'.$this->reqMatId.'",
						"'.$this->conceptMatId.'",
						"'.$this->quantity.'",
						"'.$this->price.'",
						"'.$this->total.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$orderBuyId = $this->Util()->DB()->InsertData();
				
		//$this->Util()->setError(10090, 'complete');
		//$this->Util()->PrintErrors();
		
		return $orderBuyId;
				
	}
	
	public function EnumItems()
	{				
		$sql = 'SELECT 
					* 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"				
				ORDER BY
					requisicionId ASC';
		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
	
	public function GetRequisicionIds()
	{				
		$sql = 'SELECT 
					requisicionId 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"
				GROUP BY requisicionId';		
		$this->Util()->DB()->setQuery($sql);		
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
	
	public function InfoItem()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					order_buy_item
				WHERE 
					ordBuyItemId = "'.$this->ordBuyItemId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function GetTotalRecibido()
	{
		
		$sql = 'SELECT 
					SUM(quantity) 
				FROM 
					order_buy_entrega
				WHERE 
					ordBuyItemId = "'.$this->ordBuyItemId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
				
		return $total;
	}
	
	public function UpdateStatusItem()
	{
		
		$sql = 'UPDATE
					order_buy_item
				SET
					status = "'.$this->status.'"
				WHERE 
					ordBuyItemId = "'.$this->ordBuyItemId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		return true;
	}
	
	public function GetStatusItems()
	{		
		$sql = 'SELECT 
					COUNT(*) 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"
				AND
					status = "Pendiente"';
	
		$this->Util()->DB()->setQuery($sql);
		$pendientes = $this->Util()->DB()->GetSingle();
		
		$sql = 'SELECT 
					COUNT(*) 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"
				AND
					status = "Completo"';
	
		$this->Util()->DB()->setQuery($sql);
		$completos = $this->Util()->DB()->GetSingle();
		
		$sql = 'SELECT 
					COUNT(*) 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"
				AND
					status = "Proceso"';
	
		$this->Util()->DB()->setQuery($sql);
		$enProcesos = $this->Util()->DB()->GetSingle();
		
		$sql = 'SELECT 
					COUNT(*) 
				FROM 
					order_buy_item
				WHERE 
					orderBuyId = "'.$this->orderBuyId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		if($completos == $total)
			$status = 'Completo';
		elseif($completos > 0 || $enProcesos > 0)
			$status = 'Proceso';
		else
			$status = 'Pendiente';			
			
		return $status;		
	}
	
	//ENTREGAS
	
	public function SaveEntrega(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'INSERT INTO 
					order_buy_entrega
					(	
						projectId,						
						requisicionId,
						orderBuyId,
						ordBuyItemId,
						quantity,
						fecha
					)
				 VALUES 
					(									
						"'.$this->projectId.'",						
						"'.$this->requisicionId.'",
						"'.$this->orderBuyId.'",
						"'.$this->ordBuyItemId.'",						
						"'.$this->quantity.'",
						"'.$this->fecha.'"
					)';								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
						
		return true;
				
	}
	
	public function DelEntregas()
	{
		
		$sql = 'DELETE FROM 
					order_buy_entrega
				WHERE 
					ordBuyItemId = "'.$this->ordBuyItemId.'"';
	
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
				
		return true;
	}
	
	public function EnumEntregas()
	{
		
		$sql = 'SELECT 
					* 
				FROM 
					order_buy_entrega
				WHERE 
					ordBuyItemId = "'.$this->ordBuyItemId.'"
				ORDER BY
					fecha ASC';
	
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
	
	/************************/
	
	public function SaveFechaEnt(){
		
		echo $sql = 'UPDATE 
					order_buy
				SET
					fechaEntrega = "'.$this->fecha.'"
				WHERE
					orderBuyId = "'.$this->orderBuyId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(11027, 'complete');
		$this->Util()->PrintErrors();
		
		return true;
		
	}
	
	public function UpdateEnviado(){
		
		$sql = 'UPDATE 
					order_buy
				SET
					fechaEnvio = "'.$this->fecha.'",
					enviado = "'.$this->status.'"
				WHERE
					orderBuyId = "'.$this->orderBuyId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
				
		return true;
		
	}
			
}

?>