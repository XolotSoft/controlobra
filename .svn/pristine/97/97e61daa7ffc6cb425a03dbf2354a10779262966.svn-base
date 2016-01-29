<?php

class Registro extends RegistroMain
{
    public function save()
    {
        if ($this->Util()->PrintErrors()) {
                return false;
        }
        $sql = 'INSERT INTO empresas (nombreComercial, razonSocial, rfc, telefono, nombreContacto, email, telefonoContacto, activo)
                    VALUES(
                    "'.utf8_decode($this->nombreComercial).'",
                    "'.utf8_decode($this->razonSocial).'",
                    "'.utf8_decode($this->rfc).'",
                    "'.utf8_decode($this->telefonoEmpresa).'",
                    "'.utf8_decode($this->nombreContacto).'",
                    "'.utf8_decode($this->email).'",
                    "'.utf8_decode($this->telefonoContacto).'",
                   "1")';
        $this->Util()->DB()->setQuery($sql);
        $id = $this->Util()->DB()->InsertData();
        if ($id >= 1) {
            $sql = 'INSERT INTO usuarios (usuario, passwd, activo, empresas_id)
                    VALUES(
                    "'.utf8_decode($this->usuario).'",
                   "'.sha1(md5($this->password.SALT)).'",
                    "1",
                    '.utf8_decode($id).')';
            $this->Util()->DB()->setQuery($sql);
            $idu = $this->Util()->DB()->InsertData();
            if ($idu >= 1) {
                $sql = 'CREATE DATABASE controlobra_'.$id;
                $this->Util()->DB()->setQuery($sql);
                $idb = $this->Util()->DB()->InsertData();
                if ($idu >= 1) {
                    $sql = 'mysql --password='.SQL_PASSWORD.' --user='.SQL_USER.' controlobra_'.$id.' < '.DOC_ROOT.'/sql/controlobra.sql';
                    exec($sql);
                    $this->Util()->setError(0, 'complete', 'Se Realizo el Registro con exito');
                    $this->Util()->PrintErrors();
                    return true;
                }
            }
        } else {
            $this->Util()->setError(0, 'complete', 'Fallo al registrar');
            $this->Util()->PrintErrors();
            return false;
        }
    }
}
