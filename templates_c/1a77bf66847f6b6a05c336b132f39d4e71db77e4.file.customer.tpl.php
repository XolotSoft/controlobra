<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:03
         compiled from "templates/customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20388459235699611b1fb8b0-05884228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a77bf66847f6b6a05c336b132f39d4e71db77e4' => 
    array (
      0 => 'templates/customer.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '20388459235699611b1fb8b0-05884228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="catalogos">Clientes</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addCustomerDiv">Agregar Cliente</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/customer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>