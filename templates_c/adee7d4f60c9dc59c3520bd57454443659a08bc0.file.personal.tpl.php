<?php /* Smarty version Smarty3-b7, created on 2016-01-15 14:51:28
         compiled from "./templates/lists/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2108518656995bd083cc99-66623151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adee7d4f60c9dc59c3520bd57454443659a08bc0' => 
    array (
      0 => './templates/lists/personal.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '2108518656995bd083cc99-66623151',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblPersonal" border="0" class="sortable boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/personal-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/personal-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
		<td colspan="5" align="right" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('personals')->value['pages'])){?>
		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('personals')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<?php }?>
        </td>
	</tr>
</tfoot>     
</table>