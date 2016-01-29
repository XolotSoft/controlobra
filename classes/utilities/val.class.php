<?php

/**
 * Clase para validar variables
 */
class Val
{

    /**
     * Valida que la cadena no este vacia
     * @param  string $cadena cadena a validar
     * @return bool           verdadero o falso
     */
    public static function coR($valor)
    {
        $valor = trim($valor);

        if ($valor === '') {
            return "ERRORREQUERIDO&".$valor."|";
        }

        return $valor;
    }

    /**
     * Valida que la cadena no este vacia
     * @param  string $cadena cadena a validar
     * @return bool           verdadero o falso
     */
    public static function requerido($valor)
    {
        $valor = trim($valor);
        if ($valor == '') {
            return false;
        }
        return true;
    }

    /**
     * Valida que la direccion de correo tenga el formato correcto
     * @param  string $correo cadena del correo
     * @return bool           verdadero o falso
     */
    public static function correo($valor)
    {
        if ($valor != '') {
            if (!preg_match('/^[a-zA-Z0-9_\-\.~]{2,}@[a-zA-Z0-9_\-\.~]{2,}\.[a-zA-Z]{2,4}$/', $valor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * valida solo numeros y longitud de 8 a 15 digitos
     * @param  string $telefono cadena del telefono
     * @return bool             verdadero o falso
     */
    public static function telefono($valor)
    {
        if ($valor != '') {
            if (!preg_match('/^[0-9]{8,15}$/', $valor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * valida el formatop del rfc segun sat 2015
     * @param  string $rfc cadena del rfc
     * @return bool        verdadero o falso
     */
    public static function rfc($valor)
    {
        if ($valor != '') {
            $erRfc = "/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/";
            if (!preg_match($erRfc, $valor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * valida el valor sea entero positivo
     * @param  string $valor cadena del valor
     * @return bool          verdadero o falso
     */
    public static function entero($valor)
    {
        $erEntero = "/^\d*$/";
        if (!preg_match($erEntero, $valor)) {
            return false;
        }
        return true;
    }

    /**
     * [flotante description]
     * @param  [type] $valor [description]
     * @return [type]        [description]
     */
    public static function flotante($valor)
    {
        $erFloat = "/^(?:\d+|\d*\.\d+)$/";
        if (!preg_match($erFloat, $valor)) {
            return false;
        }
        return true;
    }

     /**
     * valida solo numeros y longitud 5 digitos
     * @param  string $cp cadena del telefono
     * @return bool       verdadero o falso
     */
    public static function cp($valor)
    {
        if ($valor != '') {
            if (!preg_match('/^\d{5}$/', $valor)) {
                return false;
            }
        }
        return true;
    }

    /**
     * [dinero description]
     * @param  [type] $valor [description]
     * @return [type]        [description]
     */
    public static function dinero($valor)
    {
        $erDinero = "/^\\\$?([1-9]{1}[0-9]{0,2}(\,[0-9]{3})*(\.[0-9]{0,2})?|[1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|(\.[0-9]{1,2})?)$/";
        if (!preg_match($erDinero, $valor)) {
            return false;
        }
        return true;
    }

    /**
     * valida el valor sea entero positivo
     * @param  string $valor cadena del valor
     * @return bool          verdadero o falso
     */
    public static function porcentaje($valor)
    {
        $erEntero = "/^\d*$/";
        if (!preg_match($erEntero, $valor)) {
            return false;
        } elseif ($valor > 100) {
            return false;
        }
        return true;
    }
}
