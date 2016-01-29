<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:26:07
         compiled from "/var/www//controlobra/templates/forms/add-personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154333378256a6bd1f5a0133-39021559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '180fcecfd7038aeef784e0fd611fa8884f9dddb7' => 
    array (
      0 => '/var/www//controlobra/templates/forms/add-personal.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '154333378256a6bd1f5a0133-39021559',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
	<form id="addPersonalForm" name="addPersonalForm" method="post">
    <fieldset>
        
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" maxlength="60"/>
        <hr />
        
        <div style="width:30%;float:left">Email:</div>
        <input class="smallInput medium" name="email" id="email" type="text" maxlength="80"/>
        <hr />
        
        <div style="width:30%;float:left">Usuario:</div>
        <input class="smallInput small" name="username" id="username" type="text" maxlength="25"/>
        <hr />
       
          <div style="width:30%;float:left">Activo:</div> 
          <input type="checkbox" value="1" name="active" id="active" checked="checked" />
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnAddPersonal"><span>Agregar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveAddPersonal"/>
  	</fieldset>
	</form>
</div>
