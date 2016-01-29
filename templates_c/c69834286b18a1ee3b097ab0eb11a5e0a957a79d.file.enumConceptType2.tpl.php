<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:24:55
         compiled from "./templates/lists/enumConceptType2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1455117435569963a7f32451-54550453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c69834286b18a1ee3b097ab0eb11a5e0a957a79d' => 
    array (
      0 => './templates/lists/enumConceptType2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1455117435569963a7f32451-54550453',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="tipo2" id="tipo2" class="smallInput">
<option value="">Seleccione</option>
<option value="Obra" <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Obra"){?>selected<?php }?>>Obra</option>
<option value="Subcontrato" <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Subcontrato"){?>selected<?php }?>>Subcontrato</option>
<option value="Servicio" <?php if ($_smarty_tpl->getVariable('info')->value['tipo']=="Servicio"){?>selected<?php }?>>Servicio</option>
</select>