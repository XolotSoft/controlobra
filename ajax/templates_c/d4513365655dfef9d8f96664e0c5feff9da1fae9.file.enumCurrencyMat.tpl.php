<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/enumCurrencyMat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1673465385569d03ff2f1ee4-10885152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4513365655dfef9d8f96664e0c5feff9da1fae9' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumCurrencyMat.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1673465385569d03ff2f1ee4-10885152',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="currencies[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" class="smallInput">
<option value="MXN" <?php if ($_smarty_tpl->getVariable('item')->value['currency']=="MXN"){?>selected<?php }?>>MXN</option>
<option value="DLS" <?php if ($_smarty_tpl->getVariable('item')->value['currency']=="DLS"){?>selected<?php }?>>DLS</option>
<option value="EUR" <?php if ($_smarty_tpl->getVariable('item')->value['currency']=="EUR"){?>selected<?php }?>>EUR</option>
</select>