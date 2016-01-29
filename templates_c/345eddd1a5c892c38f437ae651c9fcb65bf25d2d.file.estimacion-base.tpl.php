<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:41
         compiled from "/var/www//controlobra/templates/items/estimacion-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13794562065699644d765e24-84836015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345eddd1a5c892c38f437ae651c9fcb65bf25d2d' => 
    array (
      0 => '/var/www//controlobra/templates/items/estimacion-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '13794562065699644d765e24-84836015',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('suppliers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
	<td align="center"></td>       
    <td height="40" align="center">
        <a href="javascript:void(0)" onclick="ViewConcepts(<?php echo $_smarty_tpl->getVariable('item')->value['supplierId'];?>
)">
            <?php echo $_smarty_tpl->getVariable('item')->value['name'];?>

        </a>
    </td>        
    <td align="center" colspan="3">&nbsp;</td>
    <td align="center">
        <a href="javascript:void(0)" onclick="ViewConcepts(<?php echo $_smarty_tpl->getVariable('item')->value['supplierId'];?>
)">
            <div id="iconSup_<?php echo $_smarty_tpl->getVariable('item')->value['supplierId'];?>
">[+]</div>
        </a>
    </td>    
</tr>

<tr id="sup_<?php echo $_smarty_tpl->getVariable('item')->value['supplierId'];?>
" style="display:none">
    <td colspan="6">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/estimacion-concept.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
</tr>
<?php }} else { ?>
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>