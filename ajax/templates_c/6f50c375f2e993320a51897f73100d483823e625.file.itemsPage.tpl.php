<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:05
         compiled from "/var/www//controlobra/templates/lists/itemsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1089502639569963b13c9720-04562926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f50c375f2e993320a51897f73100d483823e625' => 
    array (
      0 => '/var/www//controlobra/templates/lists/itemsPage.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1089502639569963b13c9720-04562926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="itemsPage" id="itemsPage" onchange="LoadItemsPage('<?php echo $_smarty_tpl->getVariable('page')->value;?>
')">
<option value="5" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="5"){?>selected<?php }?>>5</option>
<option value="10" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="10"){?>selected<?php }?>>10</option>
<option value="25" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="25"){?>selected<?php }?>>25</option>
<option value="50" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="50"){?>selected<?php }?>>50</option>
<option value="100" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="100"){?>selected<?php }?>>100</option>
<option value="1000" <?php if ($_smarty_tpl->getVariable('itemsPage')->value=="1000"){?>selected<?php }?>>Todos</option>
</select>