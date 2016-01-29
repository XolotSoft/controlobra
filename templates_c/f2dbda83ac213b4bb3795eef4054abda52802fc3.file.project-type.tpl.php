<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/lists/project-type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:707804181569d1d8a788389-96881536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2dbda83ac213b4bb3795eef4054abda52802fc3' => 
    array (
      0 => '/var/www//controlobra/templates/lists/project-type.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '707804181569d1d8a788389-96881536',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblType_<?php echo $_smarty_tpl->getVariable('item')->value['projItemId'];?>
" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/project-type-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/project-type-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>