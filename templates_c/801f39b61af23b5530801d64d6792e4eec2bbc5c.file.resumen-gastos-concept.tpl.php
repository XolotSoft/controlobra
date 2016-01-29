<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:22
         compiled from "/var/www//controlobra/templates/lists/resumen-gastos-concept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1939436695699612e9a0666-84904343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '801f39b61af23b5530801d64d6792e4eec2bbc5c' => 
    array (
      0 => '/var/www//controlobra/templates/lists/resumen-gastos-concept.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1939436695699612e9a0666-84904343',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?php  $_smarty_tpl->tpl_vars['itC'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kC'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itS')->value['concepts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itC']->key => $_smarty_tpl->tpl_vars['itC']->value){
 $_smarty_tpl->tpl_vars['kC']->value = $_smarty_tpl->tpl_vars['itC']->key;
?>
<tr>
    <td class="colR" align="left" height="25" width="<?php echo $_smarty_tpl->getVariable('wConcept')->value+15;?>
">&nbsp;
    	<?php echo $_smarty_tpl->getVariable('itC')->value['name'];?>

    </td>
    <td>
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/resumen-gastos-description.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
</tr>
<?php }} ?>

<?php  $_smarty_tpl->tpl_vars['itC'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kC'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itS')->value['concepts2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itC']->key => $_smarty_tpl->tpl_vars['itC']->value){
 $_smarty_tpl->tpl_vars['kC']->value = $_smarty_tpl->tpl_vars['itC']->key;
?>
<tr>
    <td class="colR" align="left" height="25" width="<?php echo $_smarty_tpl->getVariable('wConcept')->value+15;?>
">&nbsp;
    	<?php echo $_smarty_tpl->getVariable('itC')->value['name'];?>

    </td>
    <td>
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/resumen-gastos-description.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
</tr>
<?php }} ?>

</table>