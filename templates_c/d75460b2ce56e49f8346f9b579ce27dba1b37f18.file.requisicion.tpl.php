<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:41
         compiled from "templates/requisicion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210460312656996411adac06-44446593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd75460b2ce56e49f8346f9b579ce27dba1b37f18' => 
    array (
      0 => 'templates/requisicion.tpl',
      1 => 1452627700,
    ),
  ),
  'nocache_hash' => '210460312656996411adac06-44446593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Requisiciones :: <?php echo $_smarty_tpl->getVariable('nomProy')->value;?>
</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addRequisicionDiv">Agregar Requisici&oacute;n</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  	
    	<div align="center">
        <b>Status:</b>
        <select name="status" id="status" onchange="Refresh()">
        <option value="Pendiente" <?php if ($_smarty_tpl->getVariable('stReq')->value=="Pendiente"){?>selected<?php }?>>Pendiente</option>
        <option value="Completado" <?php if ($_smarty_tpl->getVariable('stReq')->value=="Completado"){?>selected<?php }?>>Completo</option>
        </select>
        </div>
     	
        <br />
        
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/requisicion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>