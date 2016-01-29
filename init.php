<?php
ini_set("display_errors", "ON"); 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
if(function_exists('xdebug_disable')){
    xdebug_disable();
}
date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL,"es_MX.UTF-8");
header('Content-type: text/html; charset=utf-8');
/*if($_GET['page'] != 'cuenta-cobrar-recibo' && $_GET['page'] != 'export-excel' && $_GET['page'] != 'export-pdf'){  
    mb_internal_encoding('UTF-8');
    mb_http_output('UTF-8');
    mb_http_input('UTF-8');
    mb_language('uni');
    mb_regex_encoding('UTF-8');
    ob_start('mb_output_handler');
}*/
 // ini_set("display_errors", "ON"); 
 // error_reporting(E_ALL ^ E_NOTICE);
 // error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
 // setlocale(LC_TIME, 'es_MX');

 // date_default_timezone_set('America/Mexico_City');