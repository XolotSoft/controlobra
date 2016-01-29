<?php /* Smarty version Smarty3-b7, created on 2016-01-15 14:51:39
         compiled from "/var/www//controlobra/templates/forms/edit-personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164244841856995bdbb18714-89671972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6881aba460864a3879b7fe35d128aa2512fcb08c' => 
    array (
      0 => '/var/www//controlobra/templates/forms/edit-personal.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '164244841856995bdbb18714-89671972',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
	<form id="editPersonalForm" name="editPersonalForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" maxlength="60" value="<?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
"/>
        <hr />
        
        <div style="width:30%;float:left">Email:</div>
        <input class="smallInput medium" name="email" id="email" type="text" maxlength="80" value="<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
"/>
        <hr />
       
       <div style="width:30%;float:left">Usuario:</div>
        <input class="smallInput small" name="username" id="username" type="text" maxlength="25" value="<?php echo $_smarty_tpl->getVariable('info')->value['username'];?>
"/>
        <hr />
        
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" <?php if ($_smarty_tpl->getVariable('info')->value['active']){?>checked<?php }?> />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditPersonal"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditPersonal"/>
        <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['personalId'];?>
" />
  	</fieldset>
	</form>
</div>