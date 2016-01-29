<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:22
         compiled from "/var/www//controlobra/templates/lists/resumen-gastos-subcat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14626327305699612e95c5e4-69232599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c76d3b8ebe96e852dc5f71a004015864246a9c73' => 
    array (
      0 => '/var/www//controlobra/templates/lists/resumen-gastos-subcat.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '14626327305699612e95c5e4-69232599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?php  $_smarty_tpl->tpl_vars['itS'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kS'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itC')->value['subcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itS']->key => $_smarty_tpl->tpl_vars['itS']->value){
 $_smarty_tpl->tpl_vars['kS']->value = $_smarty_tpl->tpl_vars['itS']->key;
?>
<tr>
    <td class="colR" align="left" height="25" width="<?php echo $_smarty_tpl->getVariable('wSubcat')->value+15;?>
">&nbsp;
    	<?php echo $_smarty_tpl->getVariable('itS')->value['name'];?>

    </td>
    <td>
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/resumen-gastos-concept.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
</tr>
<?php }} ?>
</table>