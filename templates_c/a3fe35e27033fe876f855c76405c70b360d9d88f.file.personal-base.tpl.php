<?php /* Smarty version Smarty3-b7, created on 2016-01-15 14:51:28
         compiled from "/var/www//controlobra/templates/items/personal-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123538191056995bd08b5998-09646283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3fe35e27033fe876f855c76405c70b360d9d88f' => 
    array (
      0 => '/var/www//controlobra/templates/items/personal-base.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '123538191056995bd08b5998-09646283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('personals')->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
        <td align="center" height="40"><?php echo $_smarty_tpl->getVariable('key')->value+1;?>
</td>       
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['username'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('item')->value['active']){?>Si<?php }else{ ?>No<?php }?></td>
        <td align="center">            
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
" title="Eliminar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/edit.gif" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
" title="Editar"/>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/key.png" class="spanPass" id="<?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
" title="Contrase&ntilde;a"/>
        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
<?php } ?>