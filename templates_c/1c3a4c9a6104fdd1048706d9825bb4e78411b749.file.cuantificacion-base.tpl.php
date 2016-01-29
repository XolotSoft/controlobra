<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "/var/www//controlobra/templates/items/cuantificacion-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27209230956a6c39582a772-50849873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3a4c9a6104fdd1048706d9825bb4e78411b749' => 
    array (
      0 => '/var/www//controlobra/templates/items/cuantificacion-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '27209230956a6c39582a772-50849873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
    <td align="center" height="40" bgcolor="#FFFFFF">
    	<a href="javascript:void80)" onclick="ViewSubcats(<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
)"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</a>
    </td>       
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">
    	<a href="javascript:void(0)" onclick="ViewSubcats(<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
)">
        <div id="iconSubcat_<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
">[+]</div>
        </a>
    </td>
</tr>

<tr id="subcats_<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
" style="display:none">
    <td colspan="4">
	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/cuant-subcat.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</td>
</tr>

<?php }} else { ?>
<tr><td align="center" colspan=4" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>