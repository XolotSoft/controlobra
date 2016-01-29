<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:28:20
         compiled from "./templates/lists/estimacion-cheques.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2072877436569964743b8df2-32260358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfbe01405461cda91ed8827bd324a473bd83b266' => 
    array (
      0 => './templates/lists/estimacion-cheques.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '2072877436569964743b8df2-32260358',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="tblCheques" class="sortable boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/estimacion-cheques-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/estimacion-cheques-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
		<td colspan="9" align="right" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('resPagos')->value['pages'])){?>
		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('payments')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<?php }?>
        </td>
	</tr>
</tfoot> 
</table>