<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:03
         compiled from "/var/www//controlobra/templates/lists/customer-address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14107637775699611b4089b0-54800293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42138fab1f5ee19816683a3a5613c2b4e235f087' => 
    array (
      0 => '/var/www//controlobra/templates/lists/customer-address.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '14107637775699611b4089b0-54800293',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblCustAdd_<?php echo $_smarty_tpl->getVariable('item')->value['customerId'];?>
" border="0" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/customer-address-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/customer-address-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>     
</table>