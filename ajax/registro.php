<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch ($_POST['type']) {
    case 'guardarRegistro':
        $registro->setNombreComercial($_POST['nombreComercial']);
        $registro->setRazonSocial($_POST['razonSocial']);
        $registro->setRfc($_POST['rfc']);
        $registro->setTelefonoEmpresa($_POST['telefonoEmpresa']);
        $registro->setNombreContacto($_POST['nombreContacto']);
        $registro->setEmail($_POST['email']);
        $registro->setTelefonoContacto($_POST['telefonoContacto']);
        $registro->setUsuario($_POST['usuario']);
        $registro->setPassword($_POST['password']);
        $registro->setRepetirPassword($_POST['repetirPassword'], $_POST['password']);
        $success = $registro->save();
        if ($success) {
            echo 'ok[#]';
        } else {
            echo "fail[#]";
            $util->ShowErrors();
            return false;
        }
        break;
        
                
}
