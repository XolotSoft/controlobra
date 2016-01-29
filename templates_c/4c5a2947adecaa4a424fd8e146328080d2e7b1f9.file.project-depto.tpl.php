<?php /* Smarty version Smarty3-b7, created on 2016-01-18 11:14:50
         compiled from "/var/www//controlobra/templates/lists/project-depto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1001227482569d1d8acb1c05-87494478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c5a2947adecaa4a424fd8e146328080d2e7b1f9' => 
    array (
      0 => '/var/www//controlobra/templates/lists/project-depto.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1001227482569d1d8acb1c05-87494478',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblDepto_<?php echo $_smarty_tpl->getVariable('itL')->value['projLevelId'];?>
" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/project-depto-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/project-depto-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>