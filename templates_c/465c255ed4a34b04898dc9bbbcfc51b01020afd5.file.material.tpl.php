<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:04
         compiled from "templates/material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285924572569963ec761920-81311264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '465c255ed4a34b04898dc9bbbcfc51b01020afd5' => 
    array (
      0 => 'templates/material.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '285924572569963ec761920-81311264',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="materiales">Materiales</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addMaterialDiv">Agregar Material</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  
  		<div align="center">
        <?php $_template = new Smarty_Internal_Template("forms/search-material.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
     	<br />
     	
        <?php $_template = new Smarty_Internal_Template("boxes/loader.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/material.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>