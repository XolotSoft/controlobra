<?php

class Main
{
    protected $page;
    protected $itemsPage;

    public function setPage($value)
    {
        $this->Util()->ValidateInteger($value, 9999999999, 0);
        $this->page = $value;
    }
    
    public function setItemsPage($value)
    {
        $this->Util()->ValidateInteger($value, 9999999999, 0);
        $this->itemsPage = $value;
    }
    
    public function getPage()
    {
        return $this->page;
    }

    
    public function Util() 
    {
        if($this->Util == null ) 
        {
            $this->Util = new Util();
        }
        return $this->Util;
    }

    public function bd()
    {
        $this->bd = $this->Util()->DBSelect($_SESSION['User']['empresaId']);
        return $this->bd;
    }
}


?>