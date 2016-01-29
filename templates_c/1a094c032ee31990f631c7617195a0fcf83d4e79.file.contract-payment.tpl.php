<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:23:17
         compiled from "templates/contract-payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59135745656996345819036-99690482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a094c032ee31990f631c7617195a0fcf83d4e79' => 
    array (
      0 => 'templates/contract-payment.tpl',
      1 => 1452627700,
    ),
  ),
  'nocache_hash' => '59135745656996345819036-99690482',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="contratos">Pagos</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addPaymentDiv">Agregar Pago</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/contract-payment.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>