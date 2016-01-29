<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:28:29
         compiled from "/var/www//controlobra/templates/forms/view-pago-est.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1599288635699647d2afd72-71930957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c72524356940594accbd9ec3ffff6663189fb22b' => 
    array (
      0 => '/var/www//controlobra/templates/forms/view-pago-est.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '1599288635699647d2afd72-71930957',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
        
        <div style="width:30%;float:left"><b>Tipo:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['tipo'];?>

        <hr />
        
        <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"){?>
        <div style="width:30%;float:left"><b>Cheque No.:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['noCheque'];?>

        <hr />
        <?php }?>
              
        <div style="width:30%;float:left"><b>Cuenta Bancaria:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['bank'];?>

        <hr />
        
        <div style="width:30%;float:left"><b>Cantidad:</b></div>
        <?php echo number_format($_smarty_tpl->getVariable('info')->value['quantity'],2,".",",");?>
 <?php echo $_smarty_tpl->getVariable('info')->value['currency'];?>

        <hr />
        
        <?php if ($_smarty_tpl->getVariable('info')->value['seccion']!="E"){?>
            <div style="width:30%;float:left"><b>Concepto:</b></div>
            <?php echo $_smarty_tpl->getVariable('info')->value['concepto'];?>

            <hr />
        <?php }?>
        
        <div style="width:30%;float:left"><b>Fecha de Pago:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['fecha'];?>

        <hr />
        
        <div style="width:30%;float:left"><b>No. Factura:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['noInvoice'];?>

        <hr />
        
        <div style="width:30%;float:left"><b>Status:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['status'];?>

        <hr />
        
        <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"&&$_smarty_tpl->getVariable('info')->value['seccion']!="E"){?>
        	<div style="width:30%;float:left"><b>Estado:</b></div>
        	<?php echo $_smarty_tpl->getVariable('info')->value['statusCheque'];?>

        	<hr />
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"&&($_smarty_tpl->getVariable('info')->value['statusCheque']=="Recogido"||$_smarty_tpl->getVariable('info')->value['statusCheque']=="Cobrado")){?>
        	<div style="width:30%;float:left"><b>Recepci&oacute;n:</b></div>
        	<?php echo $_smarty_tpl->getVariable('info')->value['fechaRecoger'];?>
 por <?php echo $_smarty_tpl->getVariable('info')->value['personaRecoger'];?>

        	<hr />
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"&&$_smarty_tpl->getVariable('info')->value['statusCheque']=="Cobrado"){?>
        	<div style="width:30%;float:left"><b>Fecha de Cobro:</b></div>
        	<?php echo $_smarty_tpl->getVariable('info')->value['fechaCobro'];?>

        	<hr />
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('info')->value['status']=="Cancelado"){?>
        <div style="width:30%;float:left"><b>Fecha Cancelaci&oacute;n:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['fechaCancel'];?>

        <hr />
                
        <div style="width:30%;float:left"><b><?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"){?>Motivo Cancelaci&oacute;n<?php }else{ ?>Observaciones<?php }?>:</b></div>
        <div style="width:70%; float:left"><?php echo $_smarty_tpl->getVariable('info')->value['obsCancel'];?>
</div>
        <hr />
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Cheque"&&$_smarty_tpl->getVariable('info')->value['seccion']!="E"){?>
        	<div style="width:30%;float:left"><b>Ver Pdf:</b></div>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/modules/estimacion-cheques-pdf2.php?id=<?php echo $_smarty_tpl->getVariable('info')->value['estimacionPagoId'];?>
" target="_blank" title="Ver Pdf">
        		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/pdf.png" width="27" height="32" border="0" />
            </a>
        	<hr />
        <?php }?>
                 
      <div style="clear:both"></div>

        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnClose"><span>Cerrar</span></a>           
     	</div> 
</div>
