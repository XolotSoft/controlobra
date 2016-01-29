<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:23:17
         compiled from "./templates/lists/contract-payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:346897687569963458dda80-54415090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51c1a1794e04974d00e77a679ea50965e2dc5d4e' => 
    array (
      0 => './templates/lists/contract-payment.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '346897687569963458dda80-54415090',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblContract" border="0" class="sortable boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/contract-payment-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/contract-payment-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
		<td colspan="7" align="right" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('payments')->value['pages'])){?>
		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('payments')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<?php }?>
        </td>
	</tr>
</tfoot>      
</table>