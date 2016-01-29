<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:41
         compiled from "./templates/lists/estimacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1266794525699644d6c2b56-44824516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50a5f52ad77dd5e131f4d1857f8a66403f003cef' => 
    array (
      0 => './templates/lists/estimacion.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1266794525699644d6c2b56-44824516',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblEstimacion" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/estimacion-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/estimacion-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
		<td colspan="6" align="right" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('estimaciones')->value['pages'])){?>
		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('estimaciones')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<?php }?>
        </td>
	</tr>
</tfoot>     
</table>