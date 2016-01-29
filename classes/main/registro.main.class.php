<?php

/**
* registro clase
*/
class RegistroMain extends Main
{
    protected $nombreComercial;
    protected $razonSocial;
    protected $rfc;
    protected $telefonoEmpresa;
    protected $nombreContacto;
    protected $email;
    protected $telefonoContacto;
    protected $usuario;
    protected $password;
    protected $repetirPassword;

    public function setNombreComercial($value)
    {
        if (Val::requerido($value)) {
            $this->nombreComercial = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Nombre comercial');
        }
    }

    public function setRazonSocial($value)
    {
        if (Val::requerido($value)) {
            $this->razonSocial = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Razon social');
        }
    }

    public function setRfc($value)
    {
        $value = Str::mayusculas($value);
        if (Val::requerido($value)) {
            $dato = $this->verificaRfc($value);
            if ($dato >= 1) {
                $this->Util()->setError(0, 'error', 'Lo siento, Rfc ya registrado..');
            }
            if (Val::rfc($value)) {
                $this->rfc = $value;
            } else {
                $this->Util()->setError(0, 'error', 'RFC :: Formato Incorrecto');
            }
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: RFC');
        }
    }

    public function setTelefonoEmpresa($value)
    {
        if (Val::requerido($value)) {
            if (Val::telefono($value)) {
                $this->telefonoEmpresa = $value;
            } else {
                $this->Util()->setError(0, 'error', 'Telefono empresa: Formato Incorrecto');
            }
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Telefono de empresa');
        }
    }

    public function setNombreContacto($value)
    {
        if (Val::requerido($value)) {
            $this->nombreContacto = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Nombre del contacto');
        }
    }

    public function setEmail($value)
    {
        if (Val::requerido($value)) {
            $value = Str::minusculas($value);
            if (Val::correo($value)) {
                $this->email = $value;
                $dato = $this->verificaCorreo($value);
                if ($dato >= 1) {
                    $this->Util()->setError(0, 'error', 'Lo siento, eMail ya registrado.');
                }
            } else {
                $this->Util()->setError(0, 'error', 'eMail: Formato Incorrecto');
            }
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: eMail');
        }
    }

    public function setTelefonoContacto($value)
    {
        if (Val::requerido($value)) {
            if (Val::telefono($value)) {
                $this->telefonoContacto = $value;
            } else {
                $this->Util()->setError(0, 'error', 'Telefono del contacto: Formato Incorrecto');
            }
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Telefono del contacto');
        }
    }

    public function setUsuario($value)
    {
        if (Val::requerido($value)) {
            $dato = $this->verificaUsuario($value);
            if ($dato >= 1) {
                $this->Util()->setError(0, 'error', 'Lo siento, nombre de usuario no disponible.');
            }
            $this->usuario = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Usuario');
        }
    }

    public function setPassword($value)
    {
        if (Val::requerido($value)) {
            if (strlen($value) < 5) {
                $this->Util()->setError(0, 'error', 'La contraseña debe ser minimo de 5 caracteres.');
            }
            $this->password = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Campo requerido :: Contraseña');
        }
    }

    public function setRepetirPassword($value, $passwd)
    {
        if (Val::requerido($value)) {
            if ($value != $passwd) {
                $this->Util()->setError(0, 'error', 'Las contraseñas no coinciden.');
            }
            $this->repetirPassword = $value;
        } else {
            $this->Util()->setError(0, 'error', 'Has olvidado confirmar la contraseña.');
        }
    }

    public function verificaUsuario($usuario)
    {
        $sql = 'SELECT COUNT(*) FROM usuarios WHERE usuario = "'.$usuario.'"';
        $this->Util()->DB()->setQuery($sql);
        $info = $this->Util()->DB()->GetSingle();
        return $info;
    }

    public function verificaRfc($rfc)
    {
        $sql = 'SELECT COUNT(*) FROM empresas WHERE rfc = "'.$rfc.'"';
        $this->Util()->DB()->setQuery($sql);
        $info = $this->Util()->DB()->GetSingle();
        return $info;
    }

    public function verificaCorreo($correo)
    {
        $sql = 'SELECT COUNT(*) FROM empresas WHERE email = "'.$correo.'"';
        $this->Util()->DB()->setQuery($sql);
        $info = $this->Util()->DB()->GetSingle();
        return $info;
    }


}
