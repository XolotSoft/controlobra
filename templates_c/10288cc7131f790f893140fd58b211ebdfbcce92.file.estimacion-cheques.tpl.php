<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:28:20
         compiled from "templates/estimacion-cheques.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1527067483569964742e9850-08629885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10288cc7131f790f893140fd58b211ebdfbcce92' => 
    array (
      0 => 'templates/estimacion-cheques.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1527067483569964742e9850-08629885',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="requisicion">&nbsp;Cheques :: <?php echo $_smarty_tpl->getVariable('nomProy')->value;?>
</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  	
      <div align="center">
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/search-cheques.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
          
          <?php $_template = new Smarty_Internal_Template("lists/estimacion-cheques.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>