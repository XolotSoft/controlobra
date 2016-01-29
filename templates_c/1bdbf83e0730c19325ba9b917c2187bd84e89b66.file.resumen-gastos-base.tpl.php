<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "/var/www//controlobra/templates/items/resumen-gastos-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60324796856996128589ed1-39129743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bdbf83e0730c19325ba9b917c2187bd84e89b66' => 
    array (
      0 => '/var/www//controlobra/templates/items/resumen-gastos-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '60324796856996128589ed1-39129743',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>    
    
   <?php  $_smarty_tpl->tpl_vars['itC'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kS'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itC']->key => $_smarty_tpl->tpl_vars['itC']->value){
 $_smarty_tpl->tpl_vars['kS']->value = $_smarty_tpl->tpl_vars['itC']->key;
?>
    <tr id="cats_<?php echo $_smarty_tpl->getVariable('item')->value['projectId'];?>
">    	
       	<td bgcolor="#FFFFFF" height="30">&nbsp;<?php echo $_smarty_tpl->getVariable('itC')->value['name'];?>
</td>
        <td colspan="15" bgcolor="#FFFFFF">
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/resumen-gastos-subcat.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </td>
    </tr>
    <tr>    	
       	<td class="colR_T" bgcolor="#D8D8D8" height="30" colspan="4" style="color:#000000"><b>&nbsp;TOTAL <?php echo $_smarty_tpl->getVariable('itC')->value['name'];?>
</b></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_T" bgcolor="#D8D8D8"></td>
        <td class="colR_G" align="right"" width="<?php echo $_smarty_tpl->getVariable('wTotal')->value+16;?>
" bgcolor="#D8D8D8">$<?php echo number_format($_smarty_tpl->getVariable('itC')->value['total'],2,'.',',');?>
&nbsp;</td>
        <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wBlank')->value+17;?>
"></td>
        <td class="colR_T" align="center" width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value+15;?>
" bgcolor="#D8D8D8">0.00</td>
        <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value+17;?>
" bgcolor="#D8D8D8">$0.00</td>
        <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wPorc')->value+17;?>
" bgcolor="#D8D8D8">0.00</td>
        <td class="colR_G" align="center" width="<?php echo $_smarty_tpl->getVariable('wBlank')->value+15;?>
"></td>
        <td class="colR_T" align="center" width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value+17;?>
" bgcolor="#D8D8D8">0.00</td>
        <td align="center" width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value+15;?>
" bgcolor="#D8D8D8">$0.00</td>
        <td align="center" width="<?php echo $_smarty_tpl->getVariable('wPorc')->value+15;?>
" bgcolor="#D8D8D8">0.00</td>
     </tr>
    <?php }} ?>
    
    
    
    
    
<?php }} else { ?>
<tr><td colspan="14" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>