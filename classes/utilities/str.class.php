<?php

/**
* 
*/
class Str
{
    /**
     * [fechaFac description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function fechaFactura($val)
    {
        $val = explode(" ", $val);
        $val = $val[0]."T".$val[1];
        return $val;
    }

    /**
     * [facturaFecha description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function facturaFecha($val)
    {
        $val = explode("T", $val);
        $val = $val[0];
        return $val;
    }

    /**
     * [coFormato description]
     * @param  [type]  $cadena [description]
     * @param  boolean $numero [description]
     * @return [type]          [description]
     */
    public static function coF($cadena, $numero = false, $addPipe = true)
    {
        $dec = 2;
        $cadena = utf8_encode(urldecode($cadena));
        $cadena = str_replace("|","/",$cadena);
        $remove = array("\t", "\n", "\r\n", "\r");
        $cadena = str_replace($remove, ' ', $cadena);
        
        $pat[0] = "/^\s+/";
        $pat[1] = "/\s{2,}/";
        $pat[2] = "/\s+\$/";
        $rep[0] = "";
        $rep[1] = " ";
        $rep[2] = "";
        $cadena = preg_replace($pat,$rep,$cadena);

        if($numero)
        {
            $cadena = number_format($cadena,$dec);
        }
        
        if(strlen($cadena) > 0 && $addPipe)
        {
            $cadena .= "|";
        }
        return $cadena = trim($cadena);
    }

    /**
    * [especiales description]
    * @return [type] [description]
    */
    public static function especiales($val)
    {
        $val = preg_replace("/á|à|â|ã|ª/","a",$val);
        $val = preg_replace("/Á|À|Â|Ã/","A",$val);
        $val = preg_replace("/é|è|ê/","e",$val);
        $val = preg_replace("/É|È|Ê/","E",$val);
        $val = preg_replace("/í|ì|î/","i",$val);
        $val = preg_replace("/Í|Ì|Î/","I",$val);
        $val = preg_replace("/ó|ò|ô|õ|º/","o",$val);
        $val = preg_replace("/Ó|Ò|Ô|Õ/","O",$val);
        $val = preg_replace("/ú|ù|û/","u",$val);
        $val = preg_replace("/Ú|Ù|Û/","U",$val);
        $val = str_replace("ñ","n",$val);
        $val = str_replace("Ñ","N",$val);
        return $val;
    }

    /**
     * [limpiar description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function limpiar($val)
    {
        $val = trim($val);
        return $val;
    }

    /**
     * [sinEspacios description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function sinEspacios($val)
    {
        $val = trim($val);
        $val = str_replace(" ", "", $val);
        return $val;
    }

    /**
     * [nombre description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function nombre($val)
    {
        $val = trim($val);
        $val = mb_strtolower($val, 'UTF-8');
        $val = ucwords($val);
        return $val;
    }

    /**
     * [minusculas description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function minusculas($val)
    {
        $val = trim($val);
        $val = strtolower($val);
        return $val;
    }

    /**
     * [mayusculas description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function mayusculas($val)
    {
        $val = trim($val);
        $val = strtoupper($val);
        return $val;
    }

    /**
     * [fechaMySql description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function fechaMySql($val)
    {
        $val = trim($val);
        $val = str_replace('/', '-', $val);
        $val = date("Y-m-d", strtotime($val));
        return $val;
    }

    /**
     * [mySqlFecha description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function mySqlFecha($val)
    {
        $val = trim($val);
        $val = str_replace('-', '/', $val);
        $val = date("d/m/Y", strtotime($val));
        return $val;
    }

    /**
     * [mySqlFecha description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function mySqlFechaCorta($val)
    {
        $val = trim($val);
        $val = str_replace('-', '/', $val);
        $val = strftime("%e-%b", strtotime($val));
        return $val;
    }

    public static function fechaLarga($val)
    {
        $val = strftime("%e de %B del %Y", strtotime($val));
        return $val;
    }

    /**
     * [tiempoMySql description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function tiempoMySql($val)
    {
        $val = trim($val);
        $val = $time_in_24_hour_format  = date("H:i", strtotime($val));
        return $val;
    }

    /**
     * [tiempoMySql description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function mySqltiempo($val)
    {
        $val = trim($val);
        $val = $time_in_12_hour_format  = date("g:ia", strtotime($val));
        return $val;
    }

    /**
     * [quitarPorcentaje description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function quitarPorcentaje($val)
    {
        $val = str_replace('%', ' ', $val);
        $val = trim($val);
        return $val;
    }

    /**
     * [limpiarDinero description]
     * @param  [type] $val [description]
     * @return [type]      [description]
     */
    public static function limpiarDinero($val)
    {
        $x = array("$",",");
        $val = str_replace($x, "", $val);
        return $val;
    }

    public static function dinero($val)
    {
        $val = number_format($val,2);
        $val = '$ '.$val;
        return $val;
    }

}