<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:45
         compiled from "/var/www//controlobra/templates/lists/requisicion-pedidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19812287125699641527fc81-92387534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03208a330d8778387839274e61d26ff443766828' => 
    array (
      0 => '/var/www//controlobra/templates/lists/requisicion-pedidos.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '19812287125699641527fc81-92387534',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="92%" cellpadding="0" cellspacing="0" id="tblMaterial" border="0" class="boxTable" align="right">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/requisicion-pedidos-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/requisicion-pedidos-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>