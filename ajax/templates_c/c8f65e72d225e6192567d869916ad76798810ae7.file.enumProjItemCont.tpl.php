<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumProjItemCont.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17716465685699624aa01eb4-40016049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8f65e72d225e6192567d869916ad76798810ae7' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumProjItemCont.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '17716465685699624aa01eb4-40016049',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="projItemId" id="projItemId" class="smallInput" onchange="LoadAreas()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['projItemId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['projItemId']==$_smarty_tpl->getVariable('item')->value['projItemId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
<?php }} ?>
</select>