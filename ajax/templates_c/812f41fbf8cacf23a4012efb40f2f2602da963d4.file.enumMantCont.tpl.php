<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/enumMantCont.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16954443715699624ad748f5-02013871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '812f41fbf8cacf23a4012efb40f2f2602da963d4' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumMantCont.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '16954443715699624ad748f5-02013871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="projMantId" id="projMantId" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projMants')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('it')->value['projMantId'];?>
" <?php if ($_smarty_tpl->getVariable('it')->value['projMantId']==$_smarty_tpl->getVariable('info')->value['projMantId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('it')->value['quantity'];?>
 <?php echo $_smarty_tpl->getVariable('it')->value['currency'];?>
</option>
<?php }} ?>
</select>