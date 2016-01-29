<?php

class Bank extends Main
{
	private $bankId;
	private $bank;
	private $accountNumber;
	private $branch;
	private $name;
	private $titular;
	private $clabe;
	private $startBalance;
	private $currentBalance;
	private $projectId;
	private $currency;
	private $active;
	private $quantity;
	private $noCheque;
	
	public function setBankId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->bankId = $value;
	}
		
	public function setBank($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Nombre del Banco'))
			$this->bank = $value;
	}
	
	public function setAccountNumber($value)
	{
		if($this->Util()->ValidateRequireField($value, 'No. de Cuenta'))
			$this->accountNumber = $value;
	}
	
	public function setBranch($value)
	{
		$this->branch = $value;
	}
	
	public function setName($value)
	{
		$this->name = $value;
	}
	
	public function setTitular($value)
	{
		$this->titular = $value;
	}
	
	public function setClabe($value)
	{
		$this->clabe = $value;
	}
	
	public function setStartBalance($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Saldo Inicial'))
				$this->startBalance = $value;
	}
	
	public function setCurrentBalance($value)
	{
		if($value != '')
			if($this->Util()->ValidateDecimal($value, 'Saldo Inicial'))
				$this->currentBalance = $value;
	}
	
	public function setQuantity($value)
	{
		$this->quantity = $value;
	}
	
	public function setProjectId($value)
	{
		$this->projectId = $value;
	}
	
	public function setCurrency($value)
	{
		if($this->Util()->ValidateRequireField($value, 'Tipo de Moneda'))
			$this->currency = $value;
	}
	
	public function setNoCheque($value)
	{
		$this->noCheque = $value;
	}
						
	public function setActive($value)
	{
		$this->active = $value;
	}
	
	public function EnumerateAll()
	{				
		$sql = 'SELECT * FROM bank 
				ORDER BY bank ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function EnumByProject()
	{				
		$sql = 'SELECT * FROM bank
				WHERE projectId = "'.$this->projectId.'" 
				ORDER BY bank ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function GetByProject()
	{				
		$sql = 'SELECT bank.* FROM bank_project bankProj
				LEFT JOIN bank ON bank.bankId = bankProj.bankId
				WHERE bankProj.projectId = "'.$this->projectId.'" 
				ORDER BY bank.bank ASC ';		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function EnumByProjCurrency()
	{				
		$sql = 'SELECT * FROM bank
				WHERE projectId = "'.$this->projectId.'"
				AND currency =  "'.$this->currency.'"
				ORDER BY bank ASC ';
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
	
	public function Enumerate()
	{
				
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM bank');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/bank");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM bank ORDER BY bank ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();
		
		$data["items"] = $result;
		$data["pages"] = $pages;
				
		return $data;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					bank 
				WHERE 
					bankId = '".$this->bankId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		return $info;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					bank 
					(										
						bank,
						accountNumber,
						branch,
						name,
						titular,
						clabe,
						startBalance,
						projectId,
						currency,
						noCheque,				
						active					
					)
				 VALUES 
					(									
						'".utf8_decode($this->bank)."',
						'".$this->accountNumber."',
						'".$this->branch."',
						'".utf8_decode($this->name)."',
						'".utf8_decode($this->titular)."',
						'".$this->clabe."',
						'".$this->startBalance."',
						'".$this->projectId."',
						'".$this->currency."',
						'".$this->noCheque."',
						'1'						
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$bankId = $this->Util()->DB()->InsertData();
						
		$this->Util()->setError(10033, "complete");
		$this->Util()->PrintErrors();
		
		return $bankId;
				
	}
		
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					bank SET 				 	
					bank = '".utf8_decode($this->bank)."',
					accountNumber = '".$this->accountNumber."',
					branch = '".$this->branch."',
					name = '".utf8_decode($this->name)."',
					titular = '".utf8_decode($this->titular)."',
					clabe = '".$this->clabe."',
					startBalance = '".$this->startBalance."',
					projectId = '".$this->projectId."',
					currency = '".$this->currency."',
					noCheque = '".$this->noCheque."',
					active = '1'
				WHERE 
					bankId = ".$this->bankId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
						
		$this->Util()->setError(10034, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					bank
				WHERE 
					bankId = ".$this->bankId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					bank_project
				WHERE 
					bankId = ".$this->bankId;							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10035, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function GetNameById(){
			
		$sql = 'SELECT 
					name 
				FROM 
					bank 
				WHERE 
					bankId = '.$this->bankId;
		
		$this->Util()->DB()->setQuery($sql);		
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
		
	}
	
	public function UpdateNextNoCheque(){
		
		$sql = "UPDATE 
					bank 
				SET 					
					noCheque = noCheque + 1
				WHERE 
					bankId = '".$this->bankId."'";
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;		
	}
	
	public function GetCuentaById(){
			
		$info = $this->Info();
		
		$cuenta = $info['bank'].' - '.$info['accountNumber'];
		
		return $cuenta;
		
	}
	
	public function AddQuantity(){
		
		$sql = "UPDATE 
					bank SET 					
					currentBalance = (currentBalance + ".$this->quantity.")
				WHERE 
					bankId = '".$this->bankId."'";
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;		
	}
	
	public function RemoveQuantity(){
		
		$sql = "UPDATE 
					bank SET 					
					currentBalance = (currentBalance - ".$this->quantity.")
				WHERE 
					bankId = '".$this->bankId."'";
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;		
	}
	
	public function GetSaldo(){
		
		$sql = "SELECT (startBalance - currentBalance)
				FROM bank 
				WHERE bankId = '".$this->bankId."'";							
		$this->Util()->DB()->setQuery($sql);
		$saldo = $this->Util()->DB()->GetSingle();
		
		return $saldo;		
	}
	
	//Projects
	
	public function SaveProject(){
				
		$sql = "INSERT INTO bank_project (bankId, projectId)
				VALUES ('".$this->bankId."','".$this->projectId."')";								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
								
		return true;
				
	}
	
	public function DeleteProjects(){
		
		$sql = 'DELETE FROM bank_project WHERE bankId = "'.$this->bankId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
		
		return true;
	}
	
	public function GetProjects(){
				
		$sql = "SELECT * FROM bank_project
				WHERE bankId = '".$this->bankId."'";
		$this->Util()->DB()->setQuery($sql);
		$projects = $this->Util()->DB()->GetResult();
								
		return $projects;
				
	}
	
}


?>