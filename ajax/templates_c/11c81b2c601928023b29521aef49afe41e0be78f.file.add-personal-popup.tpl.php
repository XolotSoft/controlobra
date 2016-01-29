<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:26:07
         compiled from "/var/www//controlobra/templates/boxes/add-personal-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74480937056a6bd1f46f132-51090002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11c81b2c601928023b29521aef49afe41e0be78f' => 
    array (
      0 => '/var/www//controlobra/templates/boxes/add-personal-popup.tpl',
      1 => 1452627703,
    ),
  ),
  'nocache_hash' => '74480937056a6bd1f46f132-51090002',
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
    		<div class="flabel">Agregar Usuario</div>
				<div id="vtitl"><span title="Titulo">Agregar Usuario</span></div>
    	</div>
      <div id="draganddrop" style="position:absolute;top:45px;left:640px">
    		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/draganddrop.png" border="0" alt="mueve" />
    	</div>

		</div>
		
    <div class="wrapper">
			<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/add-personal.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>