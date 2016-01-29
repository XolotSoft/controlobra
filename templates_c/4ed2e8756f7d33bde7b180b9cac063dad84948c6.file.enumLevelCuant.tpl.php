<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "/var/www//controlobra/templates/lists/enumLevelCuant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205355738256a6c3957b7061-29875332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ed2e8756f7d33bde7b180b9cac063dad84948c6' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumLevelCuant.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '205355738256a6c3957b7061-29875332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="vProjLevelId" id="vProjLevelId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('levels')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['projLevelId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['level'];?>
</option>
<?php }} ?>
</select>