<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "templates/comparativo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1178063697569961282682d1-83118781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dd96940b7f977507d33a1407236c46625309f94' => 
    array (
      0 => 'templates/comparativo.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1178063697569961282682d1-83118781',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9" style="width:410px">
  <h1 class="resumenes">Comparativo</h1>
  </div>
  
  <div style="float:left; margin-top:18px">
  	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-gastos-menu"><< Regresar</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  		
        <div align="center">
        <?php $_template = new Smarty_Internal_Template("forms/search-concept-resumen.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
     	<br />
        
        <?php $_template = new Smarty_Internal_Template("boxes/loader.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

              
        <div class="portlet-content nopadding" id="contenido" style="width:1400px; background-color:#FFFFFF;width:900px; height:300px; overflow:scroll">          
          <?php $_template = new Smarty_Internal_Template("lists/comparativo.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        
        </div>
        
    </div>

 </div>
  <div class="clear"> </div>
	
    <br />
  <div align="center">
  	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-gastos-menu"><< Regresar</a>
  </div>


</div>