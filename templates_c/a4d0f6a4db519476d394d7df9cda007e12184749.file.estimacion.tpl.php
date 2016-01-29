<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:41
         compiled from "templates/estimacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18235169895699644d54c971-45168680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d0f6a4db519476d394d7df9cda007e12184749' => 
    array (
      0 => 'templates/estimacion.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '18235169895699644d54c971-45168680',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="estimacion">&nbsp;Estimaciones :: <?php echo $_smarty_tpl->getVariable('nomProy')->value;?>
</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addEstimacionDiv">Agregar Estimaci&oacute;n</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

	<div align="center">
    <b>Status:</b>
    <select name="status" id="status" onchange="Refresh()">
    <option value="Pendiente" <?php if ($_smarty_tpl->getVariable('stEst')->value=="Pendiente"){?>selected<?php }?>>Pendiente</option>
    <option value="Proceso" <?php if ($_smarty_tpl->getVariable('stEst')->value=="Proceso"){?>selected<?php }?>>Proceso</option>
    <option value="Completo" <?php if ($_smarty_tpl->getVariable('stEst')->value=="Completo"){?>selected<?php }?>>Completo</option>
    </select>
    </div>
    
    <br />
  
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/estimacion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>