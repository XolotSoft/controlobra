<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:15:07
         compiled from "/var/www//controlobra/templates/items/resumen-ventas-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13652106565699615b968f39-62775974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1f4bfe70bafc2aff5110dba30d8ed87e01b5ef8' => 
    array (
      0 => '/var/www//controlobra/templates/items/resumen-ventas-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '13652106565699615b968f39-62775974',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;METROS TOTALES DE VENTA</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['mtsTotVta'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;METROS TOTALES VENDIDOS</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['mtsTotVen'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;METROS TOTALES POR VENDER</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['mtsTotXVen'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;AVANCE DE VENTAS</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['avanceVtas1'],2,'.',',');?>
%&nbsp;</td>
    </tr>    
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;DEPARTAMENTOS TOTALES</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['totDeptos'],0,'.',',');?>
 DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;DEPARTAMENTOS VENDIDOS</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['totDeptosVen'],0,'.',',');?>
 DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;DEPARTAMENTOS POR VENDER</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['totDeptosXVen'],0,'.',',');?>
 DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;AVANCE DE VENTAS</td>
        <td class="txtBlack" align="right"><?php echo number_format($_smarty_tpl->getVariable('info')->value['avanceVtas2'],2,'.',',');?>
%&nbsp;</td>
    </tr>    
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;TOTAL VENDIDO</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['totalVend'],2,'.',',');?>
&nbsp;</td>
    </tr>    
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;PROMEDIO VENTA POR m2</td>
        <td class="txtBlack" align="right">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['promVtaM2'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;VENTA PARA ALCANZAR META</td>
        <td class="<?php if ($_smarty_tpl->getVariable('info')->value['vtaAlcMeta']>=0){?>txtBlack<?php }else{ ?>txtRojo2<?php }?>" align="right">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['vtaAlcMeta'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="" class="txtBlack" height="40">&nbsp;TOTAL VENTA PROYECTADA</td>
        <td bgcolor="" class="txtBlack" align="right">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['totVtaProy'],2,'.',',');?>
&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="" class="txtBlack" height="40">&nbsp;TOTAL VENTA CON PROMEDIO ACTUAL</td>
        <td bgcolor="" class="txtBlack" align="right">$<?php echo number_format($_smarty_tpl->getVariable('info')->value['totVtaProm'],2,'.',',');?>
&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#948B54" class="txtBlack" height="40">&nbsp;DIFERENCIA CONTRA META</td>
        <td bgcolor="#948B54" class="<?php if ($_smarty_tpl->getVariable('info')->value['difMeta']>=0){?>txtBlack<?php }else{ ?>txtRojo<?php }?>" align="right">
        $<?php echo number_format($_smarty_tpl->getVariable('info')->value['difMeta'],2,'.',',');?>
&nbsp;
        </td>
    </tr>
   

