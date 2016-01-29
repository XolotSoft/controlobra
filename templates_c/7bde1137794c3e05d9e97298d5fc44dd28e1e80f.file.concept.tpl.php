<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:24:55
         compiled from "templates/concept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153139416569963a7e74ac8-37935255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bde1137794c3e05d9e97298d5fc44dd28e1e80f' => 
    array (
      0 => 'templates/concept.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '153139416569963a7e74ac8-37935255',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="conceptos">Conceptos</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addConceptDiv">Agregar Concepto</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center">
        <?php $_template = new Smarty_Internal_Template("forms/search-concept.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
     	<br />
      
      <?php $_template = new Smarty_Internal_Template("boxes/loader.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

      
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/concept.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>