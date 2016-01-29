<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/enumMatSupplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1977942861569d03ff267928-30583885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ced0c6d7637fc590401415c0a380fa72ab855d18' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumMatSupplier.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1977942861569d03ff267928-30583885',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/controlobra/libs/plugins/modifier.truncate.php';
?><select name="suppliers[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('suppliers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('it')->value['supplierId'];?>
" <?php if ($_smarty_tpl->getVariable('item')->value['supplierId']==$_smarty_tpl->getVariable('it')->value['supplierId']){?>selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('it')->value['name'],28,"...");?>
</option>
<?php }} ?>
</select>