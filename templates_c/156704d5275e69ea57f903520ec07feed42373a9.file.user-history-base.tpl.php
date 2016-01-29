<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:26:32
         compiled from "/var/www//controlobra/templates/items/user-history-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1053486873569d04287c6d36-73422090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '156704d5275e69ea57f903520ec07feed42373a9' => 
    array (
      0 => '/var/www//controlobra/templates/items/user-history-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '1053486873569d04287c6d36-73422090',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/controlobra/libs/plugins/modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('history')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['fecha'],"%d-%m-%Y");?>
</td>       
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['fecha'],"%k:%M:%S");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['user'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['module'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['action'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['itemId']){?>ID = <?php echo $_smarty_tpl->getVariable('item')->value['itemId'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('item')->value['description'];?>
<?php }?></td>
    </tr>
<?php }} else { ?>
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>