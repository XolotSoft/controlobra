<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/contract-expiries.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18589144175699624ac2a409-51688997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd2e2b44682c62f2d1b812031dc30f607e40dc48' => 
    array (
      0 => '/var/www//controlobra/templates/lists/contract-expiries.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '18589144175699624ac2a409-51688997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="90%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
<tr>
    <td align="center"><div align="center"><b>No.</b></div></td>
    <td align="center"><div align="center"><b>Monto $</b></div></td>
    <td align="center"><div align="center"><b>Fecha</b></div></td>
    <td align="center"><div align="center"><b>Obs.</b></div></td>
    <td align="center" width="60"><div align="center"><b>Acci&oacute;n</b></div></td>
</tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('expiries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
    <td align="center"><div align="center">
    <input class="smallInput small" name="noExpiry[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('item')->value['noExpiry'];?>
" /></div>
    <input type="hidden" name="expIds[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('item')->value['contExpiryId'];?>
" />
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="monto[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="monto_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('item')->value['monto'];?>
"  onblur="UpdateSaldoFinal()"/>    
    </div>
    </td>    
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fecha[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="fecha_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('item')->value['fecha'];?>
" readonly="readonly" onchange="OrderDocs()"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal2('fecha_<?php echo $_smarty_tpl->getVariable('key')->value;?>
','ddmmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="obs[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="obs_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('item')->value['obs'];?>
" />    
    </div>
    </td>
    <td align="center">
    <div align="center">
    <a href="javascript:void(0)" onclick="DelExpiry(<?php echo $_smarty_tpl->getVariable('key')->value;?>
)">
    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" id="<?php echo $_smarty_tpl->getVariable('key')->value;?>
" title="Eliminar Documento"/></a>
    </div>
    </td>
</tr>
<?php }} else { ?>
<tr><td colspan="5" align="center" height="30"><div align="center">Ning&uacute;n registro encontrado.</div></td></tr>
<?php } ?>
</table>