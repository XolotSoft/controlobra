<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:51
         compiled from "/var/www//controlobra/templates/lists/material-prices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:943487264569d03ff194521-86216082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a23411e29c28a744200634172776eae6ef8b89f7' => 
    array (
      0 => '/var/www//controlobra/templates/lists/material-prices.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '943487264569d03ff194521-86216082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
  <td align="center" width="20"><div align="center">D</div></td>
  <td align="center"><div align="center">Proveedor</div></td>
  <td align="center" width="100"><div align="center">Precio Unitario</div></td>  
  <td align="center" width="70"><div align="center">Iva</div></td>
  <td align="center" width="100"><div align="center">Total</div></td>
  <td align="center" width="70"><div align="center">Moneda</div></td>
  <td align="center" width="85"><div align="center">Fecha</div></td>
  <td align="center" width="40">&nbsp;</td>
</tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('unitPrices')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr>
  <td><input type="radio" name="supMain" id="supMain" value="<?php echo $_smarty_tpl->getVariable('key')->value;?>
" <?php if ($_smarty_tpl->getVariable('item')->value['supMain']==1){?>checked<?php }?> /></td>
  <td align="center" height="30">
  	<div align="center">
  		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumMatSupplier.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="precios[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="precios_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['precio'];?>
" style="width:80px" onchange="UpdateTotal(<?php echo $_smarty_tpl->getVariable('key')->value;?>
)" />
  		<input type="hidden" name="idMatPrices[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" value="<?php echo $_smarty_tpl->getVariable('item')->value['matPriceId'];?>
" />
  	</div>
  </td>  
  <td align="center">
  	<div align="center">
  		<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumMatIva.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<input type="text" class="smallInput" name="totals[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="totals_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['total'];?>
" style="width:80px" />
  	</div>
  </td>
  <td align="center">
  	<div align="center">
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumCurrencyMat.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
  </td>
  <td align="center">
  	<div style="float:left">
  		<input type="text" class="smallInput" name="fechas[<?php echo $_smarty_tpl->getVariable('key')->value;?>
]" id="fechaP_<?php echo $_smarty_tpl->getVariable('key')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('item')->value['fecha'];?>
" maxlength="10" readonly="readonly" style="width:60px" />
  	</div>
  	<div style="float:left">
  		<a href="javascript:void(0)" onclick="NewCal('fechaP_<?php echo $_smarty_tpl->getVariable('key')->value;?>
','ddmmyyyy')">
  			<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" />
        </a>
  	</div>
  </td>
  <td align="center">
  	<div align="center">
  		<a href="javascript:void(0)">
  		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/action_delete.gif" title="Eliminar" onclick="DelPrice(<?php echo $_smarty_tpl->getVariable('key')->value;?>
)" />
        </a>
  	</div>
  </td>
</tr>
<?php }} else { ?>
<tr>
	<td colspan="8" align="center" height="40"><div align="center">Ningun registro encontrado.</div></td>
</tr>
<?php } ?>
</table>