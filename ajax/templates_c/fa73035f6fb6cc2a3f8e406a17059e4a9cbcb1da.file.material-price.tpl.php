<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:53
         compiled from "/var/www//controlobra/templates/lists/material-price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:898014220569d0401f2b348-99002188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa73035f6fb6cc2a3f8e406a17059e4a9cbcb1da' => 
    array (
      0 => '/var/www//controlobra/templates/lists/material-price.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '898014220569d0401f2b348-99002188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMatPrice_<?php echo $_smarty_tpl->getVariable('item')->value['materialId'];?>
" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/material-price-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/material-price-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>     
</table>