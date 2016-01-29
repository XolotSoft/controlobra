<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:15:17
         compiled from "templates/resumen-ventas-print.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1374457597569961651dde54-68881325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5786d3b7595121ffcf555b3405d7bf6561088046' => 
    array (
      0 => 'templates/resumen-ventas-print.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1374457597569961651dde54-68881325',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9" style="width:480px">
  	<h1 class="resumenes">Proy: <?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
<br />Rep: Reporte de Ventas</h1>
  </div>
    
  <div style="float:right; width:150px; height:66px; margin-right:10px">
    <?php if ($_smarty_tpl->getVariable('info')->value['image']){?>
  	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/projects/<?php echo $_smarty_tpl->getVariable('info')->value['image'];?>
" width="150" height="66" />
    <?php }?>
  </div>
  <div style="float:right; width:150px; height:66px; margin-right:10px">
  	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/logos/alea.jpg" width="150" height="66" />
  </div>
    
  <div class="clear">
  </div>
  <br />
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

</div>