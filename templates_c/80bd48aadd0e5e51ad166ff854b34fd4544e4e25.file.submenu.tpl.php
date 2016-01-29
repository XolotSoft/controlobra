<?php /* Smarty version Smarty3-b7, created on 2016-01-15 13:33:40
         compiled from "./templates/menus/submenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126896586356994994d4d7e1-10723952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80bd48aadd0e5e51ad166ff854b34fd4544e4e25' => 
    array (
      0 => './templates/menus/submenu.tpl',
      1 => 1452627700,
    ),
  ),
  'nocache_hash' => '126896586356994994d4d7e1-10723952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="tabs">
     <div class="container">
        <ul>
        	<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="catalogos"){?>
            	
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/personal" <?php if ($_smarty_tpl->getVariable('page')->value=="personal"){?>class="current"<?php }?>>
               	<span>Usuarios</span></a></li>
                                   
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/customer" <?php if ($_smarty_tpl->getVariable('page')->value=="customer"||$_smarty_tpl->getVariable('page')->value=="customer-img"||$_smarty_tpl->getVariable('page')->value=="customer-doc"){?>class="current"<?php }?>>
               	<span>Clientes</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/bank" <?php if ($_smarty_tpl->getVariable('page')->value=="bank"){?>class="current"<?php }?>>
               	<span>Bancos</span></a></li>
                           
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/unit" <?php if ($_smarty_tpl->getVariable('page')->value=="unit"){?>class="current"<?php }?>>
               	<span>Unidades</span></a></li>                       
                           
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/supplier" <?php if ($_smarty_tpl->getVariable('page')->value=="supplier"||$_smarty_tpl->getVariable('page')->value=="supplier-pdf"||$_smarty_tpl->getVariable('page')->value=="supplier-pdf2"){?>class="current"<?php }?>>
               	<span>Proveedores</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/state" <?php if ($_smarty_tpl->getVariable('page')->value=="state"||$_smarty_tpl->getVariable('page')->value=="city"){?>class="current"<?php }?>>
               	<span>Estados</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/category" <?php if ($_smarty_tpl->getVariable('page')->value=="category"||$_smarty_tpl->getVariable('page')->value=="subcategory"){?>class="current"<?php }?>>
                <span>Partidas</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/backup" <?php if ($_smarty_tpl->getVariable('page')->value=="backup"){?>class="current"<?php }?>>
                <span>Respaldos</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/user-history" <?php if ($_smarty_tpl->getVariable('page')->value=="user-history"){?>class="current"<?php }?>>
                <span>Historial de Acciones</span></a></li>
                            
            <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="materiales"){?>
            
            	<li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/material" <?php if ($_smarty_tpl->getVariable('page')->value=="material"){?>class="current"<?php }?>>
               	<span>Listado</span></a></li>
                                                            
             <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="conceptos"){?>
            
            	<li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/concept" <?php if ($_smarty_tpl->getVariable('page')->value=="concept"){?>class="current"<?php }?>>
               	<span>Listado</span></a></li>
                                                
            <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="estimacion"){?>
            	                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="estimacion"){?>class="current"<?php }?>>
                <span>Listado</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion-payment/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="estimacion-payment"){?>class="current"<?php }?>>
                <span>Pagos</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion-retencion/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="estimacion-retencion"){?>class="current"<?php }?>>
                <span>Pago de Retenciones</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion-dopayment" <?php if ($_smarty_tpl->getVariable('page')->value=="estimacion-dopayment"){?>class="current"<?php }?>>
                <span>Ejecuci&oacute;n de Pagos</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion-cheques" <?php if ($_smarty_tpl->getVariable('page')->value=="estimacion-cheques"){?>class="current"<?php }?>>
                <span>Cheques</span></a></li>                                                              
            
            <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="requisicion"){?>
            	                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/requisicion/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="requisicion"||$_smarty_tpl->getVariable('page')->value=="requisicion-material"){?>class="current"<?php }?>>
                <span>Requisiciones</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/requisicion-pedidos/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="requisicion-pedidos"){?>class="current"<?php }?>>
                <span>Pedidos</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/order-buy/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="order-buy"){?>class="current"<?php }?>>
                <span>Ordenes de Compra</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/order-buy-send/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="order-buy-send"||$_smarty_tpl->getVariable('page')->value=="order-buy-email"){?>class="current"<?php }?>>
                <span>Ord. Comp. Enviadas</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/order-buy-entregas/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="order-buy-entregas"){?>class="current"<?php }?>>
                <span>Entregas</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/account-payment/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="account-payment"){?>class="current"<?php }?>>
                <span>Pagos</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/account-dopayment/status/pendiente" <?php if ($_smarty_tpl->getVariable('page')->value=="account-dopayment"){?>class="current"<?php }?>>
                <span>Ejecuci&oacute;n de Pagos</span></a></li>
                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/account-cheques" <?php if ($_smarty_tpl->getVariable('page')->value=="account-cheques"){?>class="current"<?php }?>>
                <span>Cheques</span></a></li>
                                                                               
            <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="contratos"){?>
            	                
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/contract" <?php if ($_smarty_tpl->getVariable('page')->value=="contract"){?>class="current"<?php }?>>
                <span>Listado</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/contract-payment" <?php if ($_smarty_tpl->getVariable('page')->value=="contract-payment"){?>class="current"<?php }?>>
                <span>Pagos</span></a></li>
            
            <?php }elseif($_smarty_tpl->getVariable('mainMnu')->value=="resumenes"){?>
             
               <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-presupuestos-menu" <?php if ($_smarty_tpl->getVariable('page')->value=="concept-resumen"||$_smarty_tpl->getVariable('page')->value=="material-resumen"||$_smarty_tpl->getVariable('page')->value=="concept-area"||$_smarty_tpl->getVariable('page')->value=="material-area"||$_smarty_tpl->getVariable('page')->value=="resumen-presupuestos-menu"||$_smarty_tpl->getVariable('page')->value=="comparativo"){?>class="current"<?php }?>>
               <span>Presupuestos</span></a></li>
                              
               <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-ventas-menu" <?php if ($_smarty_tpl->getVariable('page')->value=="resumen-ventas-menu"||$_smarty_tpl->getVariable('page')->value=="resumen-edoctagral"||$_smarty_tpl->getVariable('page')->value=="resumen-contract"||$_smarty_tpl->getVariable('page')->value=="resumen-ventas"||$_smarty_tpl->getVariable('page')->value=="resumen-contract"||$_smarty_tpl->getVariable('page')->value=="resumen-edoctaclte"||$_smarty_tpl->getVariable('page')->value=="resumen-accionistas"){?>class="current"<?php }?>>
               <span>Ventas</span></a></li>
               
               <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-gastos-menu" <?php if ($_smarty_tpl->getVariable('page')->value=="resumen-gastos-menu"||$_smarty_tpl->getVariable('page')->value=="resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="concept-resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="material-resumen-gastos"||$_smarty_tpl->getVariable('page')->value=="concept-area-gastos"||$_smarty_tpl->getVariable('page')->value=="material-area-gastos"){?>class="current"<?php }?>>
               <span>Gastos</span></a></li>
               
               <li><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-cheques" <?php if ($_smarty_tpl->getVariable('page')->value=="resumen-cheques"){?>class="current"<?php }?>>
               <span>Cheques</span></a></li>             
            
            <?php }?>
       </ul>
    </div>
</div>