<?php

class User extends Main
{
    protected $userId = NULL;
    protected $password;
    
    private $tipo;
    private $module;
    private $action;
    private $description;
    
    public function setUserId($value)
    {
        $this->Util()->ValidateInteger($value);
        $this->userId = $value;
    }
    
    public function setUsername($value)
    {
        if($this->Util()->ValidateRequireField($value, 'Usuario'))
            $this->username = $value;
    }
        
    public function setPassword($value)
    {
        if($this->Util()->ValidateRequireField($value, 'Contrase&ntilde;a'))
            $this->password = $value;
    }
    
    public function setTipo($value)
    {
        $this->tipo = $value;
    }
    
    public function setModule($value)
    {
        $this->module = $value;
    }
    
    public function setAction($value)
    {
        $this->action = $value;
    }
    
    public function setDescription($value)
    {
        $this->description = $value;
    }
    
    public function setItemId($value)
    {
        $this->itemId = $value;
    }
            
    //private functions
    function Info()
    {
        if(!$this->userId)
        {
            $this->userId = $_SESSION["User"]["userId"];
        }
        $this->Util()->DB()->setQuery("SELECT * FROM personal WHERE personalId = '".$this->userId."'");
        return $this->Util()->DB()->GetRow();
    }
    
    function InfoUsr()
    {
        $this->Util()->DB()->setQuery("SELECT * FROM user WHERE userId = '".$this->userId."'");
        return $this->Util()->DB()->GetRow();
    }
    
    function GetEmail()
    {
        $this->Util()->DB()->setQuery("SELECT email FROM user WHERE userId = '".$this->userId."'");
        return $this->Util()->DB()->GetSingle();
    }   
    
    public function allowAccess($moduleId = 0){
        
        $User = $_SESSION['User'];
            
        if(!$User['isLogged']){
            header('Location: '.WEB_ROOT.'/login');
            exit;
        }
        
        /*
        if($User['roleId'] != 1 && $moduleId != 0){
            if(!$this->allow_access_module($User['userId'], $moduleId)){
                header('Location: '.WEB_ROOT);
                exit;
            }
        }
        */
                
    }
    
    /*
    public function allow_access_module($userId, $moduleId){
        
        $this->Util()->DB()->setQuery(
            "SELECT 
                m.roleId 
           FROM 
                personal AS p,              
                role_modules AS m 
            WHERE 
                p.personalId = '".$userId."'            
            AND
                p.roleId = m.roleId
            AND
                m.moduleId = '".$moduleId."'
        ");
                
        $allow = $this->Util()->DB()->GetSingle();
        
        return $allow;
        
    }
    */
        
    public function doLogin()
    {
        if ($this->Util()->PrintErrors()) {
            return false;
        }
        $sql = "SELECT * FROM usuarios WHERE usuario = '".$this->username."' AND passwd = '".sha1(md5($this->password.SALT))."' AND activo = '1'";
        $this->Util()->DB()->setQuery($sql);
        $row = $this->Util()->DB()->GetRow();
        
        if ($row) {
            $card['usuarioId'] = $row['id'];
            $card['empresaId'] = $row['empresas_id'];
            $card['tipo'] = 'User';
            $card['nombre'] = $row['usuario'];
            $card['isLogged'] = true;
            $_SESSION['User'] = $card;
            return true;
        } else {
            $sql = "SELECT * FROM personal WHERE username = '".$this->username."' LIMIT 1";
            $this->Util()->DB()->setQuery($sql);
            $row = $this->Util()->DB()->GetRow();

            if ($row) {
                if ($row['active']) {
                    $nom = explode(' ', $row['name']);
                    $card['userId'] = $row['personalId'];
                    $card['tipo'] = 'Personal';
                    $card['username'] = $nom[0];
                    $card['isLogged'] = true;
                    $_SESSION['User'] = $card;
                    return true;
                } else {
                    $this->Util()->setError(10020, "error", "");
                    $this->Util()->PrintErrors();
                }
            } else {
                $this->Util()->setError(10006, "error", "");
                $this->Util()->PrintErrors();
            }
        }
        return false;
    }//doLogin
    
    public function SaveHistory()
    {
        $infU = $_SESSION['User'];
        $sql = 'INSERT INTO user_history (
            userId, 
            tipo, 
            itemId,
            module, 
            action, 
            description, 
            fecha
        )VALUES (
            "'.$infU['userId'].'",
            "'.$infU['tipo'].'",
            "'.$this->itemId.'",
            "'.$this->module.'",
            "'.$this->action.'",
            "'.$this->description.'",
            "'.date('Y-m-d H:i:s').'"
        )';
        $this->Util()->DB()->setQuery($sql);
        $this->Util()->DB()->InsertData();
        
        return true;
            
    }//SaveHistory
    
    public function EnumHistory()
    {
        $this->Util()->DB()->setQuery('SELECT COUNT(*) FROM user_history');
        $total = $this->Util()->DB()->GetSingle();

        $pages = $this->Util->HandleMultipages($this->page, $total , WEB_ROOT.'/user-history');

        $sql_add = 'LIMIT '.$pages['start'].', '.$pages['items_per_page'];
        $this->Util()->DB()->setQuery('SELECT * FROM user_history ORDER BY fecha DESC '.$sql_add);
        $result = $this->Util()->DB()->GetResult();
        
        $data['items'] = $result;
        $data['pages'] = $pages;
                
        return $data;
        
    }//EnumHistory
    
    public function doLogout()
    {
        $_SESSION['User'] = '';
        unset($_SESSION['User']);
        session_destroy();
        
    }//doLogout
    
    public function GetNameById()
    {
        $sql = 'SELECT name FROM user WHERE userId = '.$this->userId;
        $this->Util()->DB()->setQuery($sql);
        $name = $this->Util()->DB()->GetSingle();
        return $name;
    }
}
