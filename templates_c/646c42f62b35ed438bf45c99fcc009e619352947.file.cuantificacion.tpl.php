<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "templates/cuantificacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21335305756a6c3953c7a15-97387698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '646c42f62b35ed438bf45c99fcc009e619352947' => 
    array (
      0 => 'templates/cuantificacion.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '21335305756a6c3953c7a15-97387698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="cuantificacion">Cuantificaciones :: <?php echo $_smarty_tpl->getVariable('nomProy')->value;?>
</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="javascript:void(0)" class="inline_add" id="addCuantificacionDiv">Agregar Cuantificaci&oacute;n</a> 
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  
  	  <div align="center">
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/search-cuantificacion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

      </div>
      
      <div id="loader" align="center" style="padding:10px; display:none">
      	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/loading.gif" />
        <br />
        Cargando...
      </div>
      <br />
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/cuantificacion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>