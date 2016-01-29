<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/enumMatIva.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1000030802569d03ff2b2463-63220456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed946e45847a13a5e0c1ab5b0f0516f8cf0cebf0' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumMatIva.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1000030802569d03ff2b2463-63220456',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="iva[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="iva_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" class="smallInput" onchange="UpdateTotal(<?php echo $_smarty_tpl->getVariable('key')->value;?>
)">
<option value="0" <?php if ($_smarty_tpl->getVariable('item')->value['iva']=="0"){?>selected<?php }?>>0 %</option>
<option value="11" <?php if ($_smarty_tpl->getVariable('item')->value['iva']=="11"){?>selected<?php }?>>11 %</option>
<option value="16" <?php if ($_smarty_tpl->getVariable('item')->value['iva']=="16"){?>selected<?php }?>>16 %</option>
</select>