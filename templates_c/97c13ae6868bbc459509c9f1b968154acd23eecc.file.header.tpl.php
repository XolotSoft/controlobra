<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:29:11
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317451585569d20e78e0342-11937627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1453138150,
    ),
  ),
  'nocache_hash' => '317451585569d20e78e0342-11937627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('page')->value!="login"&&$_smarty_tpl->getVariable('page')->value!="registroEmpresa"){?>
    <div class="grid_logo" id="logo" style="height:69px; padding-left:10px; width:600px;">
    	<div style="float:left">
    	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/logos/alea.jpg" width="156" height="70" /></div>
        <div style="float:left; padding-left:10px">
        Sistema de Cuantificaciones</div>
    </div>
    <div class="grid_wlc" style="width:300px;">
        <div id="user_tools"><span>Bienvenido <a href="#"><?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
</a>  |  <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/logout">Salir</a></span></div>
        <br /><br />        
        <div style="float:right">
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumProject2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
        <div style="float:right; color:#FFFFFF; padding:5px 5px 0 0"><b>Proyecto:</b></div>
    </div>    
      
    <div class="grid_16" id="header">
        <?php $_template = new Smarty_Internal_Template("menus/main.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
    
    <div class="grid_16">
        <?php $_template = new Smarty_Internal_Template("menus/submenu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
    </div>
    
<?php }?>