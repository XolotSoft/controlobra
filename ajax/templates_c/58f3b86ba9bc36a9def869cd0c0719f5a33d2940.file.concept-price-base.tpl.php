<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:04
         compiled from "/var/www//controlobra/templates/items/concept-price-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:874716327569963b0a62b41-39659927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58f3b86ba9bc36a9def869cd0c0719f5a33d2940' => 
    array (
      0 => '/var/www//controlobra/templates/items/concept-price-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '874716327569963b0a62b41-39659927',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
 $_smarty_tpl->tpl_vars['ky']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('it')->value['supplier'];?>
</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('it')->value['price'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['iva'];?>
%</td>
        <td align="right">$<?php echo $_smarty_tpl->getVariable('it')->value['total'];?>
&nbsp;</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('it')->value['fecha'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('it')->value['supMain']){?>S&iacute;<?php }else{ ?>No<?php }?></td>
    </tr>
<?php }} else { ?>
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>

<?php if (count($_smarty_tpl->getVariable('item')->value['prices'])>0){?>
    <tr>
    	<td height="40"></td>
        <td></td>
        <td></td>
        <td align="center"><b>TOTAL</b></td>
        <td align="right">$<?php echo $_smarty_tpl->getVariable('item')->value['totalP'];?>
&nbsp;</td>
        <td></td>
        <td></td>
    </tr>
<?php }?>