<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "templates/project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62260361569d1d8a510df7-10479269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce7a88200f32ea1334f3ecddb7d2515b1953ea3d' => 
    array (
      0 => 'templates/project.tpl',
      1 => 1452627700,
    ),
  ),
  'nocache_hash' => '62260361569d1d8a510df7-10479269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="proyectos">Proyectos</h1>
  </div>
  
  <div class="grid_6" id="eventbox">
      <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project-new" class="inline_add" id="addProjectDiv">Agregar Proyecto</a>
  </div>
  
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
   <?php if ($_smarty_tpl->getVariable('msgOk')->value){?>
   <p class="info" id="success" style="width:915px; margin-left:10px" onclick="hideMessage()">
   	<span class="info_inner">
    	<?php if ($_smarty_tpl->getVariable('msgOk')->value==1){?>
    	El proyecto ha sido creado correctamente.
        <?php }elseif($_smarty_tpl->getVariable('msgOk')->value==2){?>
        El proyecto ha sido actulizado correctamente.
        <?php }elseif($_smarty_tpl->getVariable('msgOk')->value==3){?>
        El proyecto ha sido eliminado correctamente.
        <?php }elseif($_smarty_tpl->getVariable('msgOk')->value==4){?>
        Los ejes fueron actualizados correctamente.
        <?php }elseif($_smarty_tpl->getVariable('msgOk')->value==5){?>
        Los montos fueron actualizados correctamente.
        <?php }elseif($_smarty_tpl->getVariable('msgOk')->value==6){?>
        Los cajones de est. y bodegas fueron actualizados correctamente.
        <?php }?>
    </span>
   </p>
   <?php }?>
   
  <div class="portlet">
     
      <div class="portlet-content nopadding borderGray" id="contenido">
          
          <?php $_template = new Smarty_Internal_Template("lists/project.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            
        
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

</div>