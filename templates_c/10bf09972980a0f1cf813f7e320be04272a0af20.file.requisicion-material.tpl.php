<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:26:45
         compiled from "/var/www//controlobra/templates/lists/requisicion-material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97870274569964151a1282-71146031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10bf09972980a0f1cf813f7e320be04272a0af20' => 
    array (
      0 => '/var/www//controlobra/templates/lists/requisicion-material.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '97870274569964151a1282-71146031',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="92%" cellpadding="0" cellspacing="0" id="tblMaterial" border="0" class="boxTable" align="right">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/requisicion-material-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/requisicion-material-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>