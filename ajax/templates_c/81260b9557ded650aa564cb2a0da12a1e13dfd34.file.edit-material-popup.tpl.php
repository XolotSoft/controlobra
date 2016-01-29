<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:50
         compiled from "/var/www//controlobra/templates/boxes/edit-material-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1089409297569d03feb97fb0-40092775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81260b9557ded650aa564cb2a0da12a1e13dfd34' => 
    array (
      0 => '/var/www//controlobra/templates/boxes/edit-material-popup.tpl',
      1 => 1452627703,
    ),
  ),
  'nocache_hash' => '1089409297569d03feb97fb0-40092775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<div class="popupheader" style="z-index:70">
			<div id="fviewmenu" style="z-index:70">
	    	<div id="fviewclose"><span style="color:#CCC" id="closePopUpDiv">Close<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/b_disn.png" border="0" alt="close" /></span>
      	</div>
      </div>

      <div id="ftitl">
    		<div class="flabel">Editar Material</div>
				<div id="vtitl"><span title="Titulo">Editar Material</span></div>
    	</div>
      <div id="draganddrop" style="position:absolute;top:45px;left:640px">
    		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/draganddrop.png" border="0" alt="mueve" />
    	</div>

		</div>
		
    <div class="wrapper">
			<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/edit-material.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>