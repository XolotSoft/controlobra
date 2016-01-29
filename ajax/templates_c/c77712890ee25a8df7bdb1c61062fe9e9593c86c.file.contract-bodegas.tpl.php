<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/contract-bodegas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1959319885699624ab2d562-64742661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c77712890ee25a8df7bdb1c61062fe9e9593c86c' => 
    array (
      0 => '/var/www//controlobra/templates/lists/contract-bodegas.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1959319885699624ab2d562-64742661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('enumBodegas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
  <td align="left" height="30">
  <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumBodegas.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

  </td>
  <td align="center" width="50"><div align="center">
  <a href="javascript:void(0)" onclick="DelBodega(<?php echo $_smarty_tpl->getVariable('key')->value;?>
)">
  <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" title="Eliminar Bodega" /></a>
  </div></td>
</tr>
<?php }} else { ?>
<tr>
	<td colspan="2" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
<?php } ?>
</table>