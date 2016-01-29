<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:21
         compiled from "/var/www//controlobra/templates/lists/enumBodegas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49213052756996259585e47-29055603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63d78eba489f9e1f738e7085708a2ccd126f9046' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumBodegas.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '49213052756996259585e47-29055603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<select name="projBodegaId[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" class="smallInput">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bodegas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('it')->value['projBodegaId'];?>
" <?php if ($_smarty_tpl->getVariable('it')->value['projBodegaId']==$_smarty_tpl->getVariable('item')->value['projBodegaId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('it')->value['name'];?>
</option>
<?php }} ?>
</select>