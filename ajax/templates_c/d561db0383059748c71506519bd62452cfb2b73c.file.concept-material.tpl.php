<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:04
         compiled from "/var/www//controlobra/templates/lists/concept-material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1464615949569963b099a433-35004082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd561db0383059748c71506519bd62452cfb2b73c' => 
    array (
      0 => '/var/www//controlobra/templates/lists/concept-material.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1464615949569963b099a433-35004082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMaterial_<?php echo $_smarty_tpl->getVariable('item')->value['conceptId'];?>
" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/concept-material-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/concept-material-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>      
</table>