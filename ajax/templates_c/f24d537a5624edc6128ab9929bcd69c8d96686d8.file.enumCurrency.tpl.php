<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumCurrency.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17899361645699624aab8312-97345523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f24d537a5624edc6128ab9929bcd69c8d96686d8' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumCurrency.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '17899361645699624aab8312-97345523',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="currency" id="currency" class="smallInput">
<option value="">Seleccione</option>
<option value="MXN" <?php if ($_smarty_tpl->getVariable('info')->value['currency']=="MXN"){?>selected<?php }?>>MXN</option>
<option value="DLS" <?php if ($_smarty_tpl->getVariable('info')->value['currency']=="DLS"){?>selected<?php }?>>DLS</option>
<option value="EUR" <?php if ($_smarty_tpl->getVariable('info')->value['currency']=="EUR"){?>selected<?php }?>>EUR</option>
</select>