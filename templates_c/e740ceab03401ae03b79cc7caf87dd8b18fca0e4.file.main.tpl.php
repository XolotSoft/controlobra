<?php /* Smarty version Smarty3-b7, created on 2016-01-15 13:33:40
         compiled from "./templates/menus/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210079109156994994b74df5-39532625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e740ceab03401ae03b79cc7caf87dd8b18fca0e4' => 
    array (
      0 => './templates/menus/main.tpl',
      1 => 1452627700,
    ),
  ),
  'nocache_hash' => '210079109156994994b74df5-39532625',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="menu">
	<ul class="group" id="menu_group_main">
    
		<li class="item first" id="one">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/personal" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="catalogos"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner catalogos">Cat&aacute;logos</span>
                 </span>
            </a>
        </li>
        
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/material" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="materiales"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner material">Materiales</span>
                 </span>
            </a>
        </li>
        
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/concept" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="conceptos"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner conceptos">Conceptos</span>
                 </span>
            </a>
        </li>
        
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/project" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="proyectos"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner proyectos">Proyectos</span>
                 </span>
            </a>
        </li>
                
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/cuantificacion" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="cuantificacion"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner cuantificacion">Cuantificaci&oacute;n</span>
                 </span>
            </a>
        </li>
        
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/estimacion" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="estimacion"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner estimacion">Estimaciones</span>
                 </span>
            </a>
        </li>
        
        <li class="item" id="two">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/requisicion" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="requisicion"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner requisicion">Requisiciones</span>
                 </span>
            </a>
        </li>
       
		<li class="item" id="eight">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/contract" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="contratos"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner contratos">Contratos</span>
                </span>
            </a>
        </li>
        
        <li class="item last" id="eight">
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resumen-presupuestos-menu" class="main<?php if ($_smarty_tpl->getVariable('mainMnu')->value=="resumenes"){?> current<?php }?>">
            	<span class="outer">
                	<span class="inner resumenes">Resumenes</span>
                </span>
            </a>
        </li>
                
    </ul>
</div>