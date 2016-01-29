<?php /* Smarty version Smarty3-b7, created on 2016-01-15 13:33:40
         compiled from "/var/www//controlobra/templates/lists/enumProject2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182226771156994994a78168-95518202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '223f75264c173bfbe632a6f183db3a691cdf4c71' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumProject2.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '182226771156994994a78168-95518202',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/controlobra/libs/plugins/modifier.truncate.php';
?><select name="curProjId" id="curProjId" class="smallInput" onchange="UpdateCurrentProj()">
<option value="">Seleccione</option>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('listProys')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<option value="<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
" <?php if ($_smarty_tpl->getVariable('curProjId')->value==$_smarty_tpl->getVariable('item')->value['projectId']){?>selected<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('item')->value['name'],32,"...");?>
</option>
<?php }} ?>
</select>