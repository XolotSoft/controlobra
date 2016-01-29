<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "./templates/lists/enumConceptConSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119149883256a6c395719e76-94829989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5bed70c87fe150f984f4317c332836fb4aebf5' => 
    array (
      0 => './templates/lists/enumConceptConSearch.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '119149883256a6c395719e76-94829989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="vConceptConId" id="vConceptConId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conceptsCon')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['conceptConId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>