<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:15:07
         compiled from "templates/resumen-ventas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6301810785699615b8b9e68-95875649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e86abd4a0beb26d3c39db85059c2bddfae373dab' => 
    array (
      0 => 'templates/resumen-ventas.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '6301810785699615b8b9e68-95875649',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9" style="width:410px">
  <h1 class="resumenes">Reporte de Ventas</h1>
  </div>
  
  <div style="float:left; margin-top:18px">
  	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-ventas-menu"><< Regresar</a>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-ventas-print" class="inline_print" target="_blank">Imprimir Resumen</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  	        
      <div class="portlet-content nopadding" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/resumen-ventas.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>
  
  <br />
  <div align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-ventas-menu"><< Regresar</a></div>

</div>