<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:28:20
         compiled from "/var/www//controlobra/templates/forms/search-cheques.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3258947765699647433a395-28447812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c8625fbb0476ce5b8bace20d4516bf0be81b48d' => 
    array (
      0 => '/var/www//controlobra/templates/forms/search-cheques.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '3258947765699647433a395-28447812',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="type" id="type" value="searchCheques" />
<table width="100%" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center" width="110"><b>No. Cheque</b></td>
    <td align="center"><b>Cuenta</b></td>
    <td align="center" width="110"><b>No. Factura</b></td>
    <td align="center" width="110"><b>Fecha Inicial</b></td>
    <td align="center" width="110"><b>Fecha Final</b></td>
    <td align="center" width="110"><b>Status</b></td>
    <td align="center" width="110"><b>Estado</b></td>
</tr>
<tr>
    <td align="center">
    	<input type="text" class="smallInput" name="vNoCheque" id="vNoCheque" style="width:70px" />
    </td>
    <td align="center">
        <select name="vBankId" id="vBankId" class="smallInput">
        <option value="<?php echo $_smarty_tpl->getVariable('item')->value['bankId'];?>
">Seleccione</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <option value="<?php echo $_smarty_tpl->getVariable('item')->value['bankId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
        <?php }} ?>
        </select>
    </td>
    <td align="center">
        <input type="text" class="smallInput" name="vNoFactura" id="vNoFactura" style="width:70px" />
    </td>
    <td align="center">
    	<div style="float:left">
        <input type="text" class="smallInput" name="vFechaIni" id="vFechaIni" style="width:70px" maxlength="10" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('vFechaIni','ddmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </td>
    <td align="center">
    	<div style="float:left">
        <input type="text" class="smallInput" name="vFechaFin" id="vFechaFin" style="width:70px" maxlength="10" />
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('vFechaFin','ddmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </td>
    <td align="center">
        <select name="vStatus" id="vStatus" class="smallInput">
        <option value="">Seleccione</option>
        <option value="Activo">Activo</option>
        <option value="Cancelado">Caancelado</option>
        </select>
    </td>
    <td align="center">
        <select name="vEstado" id="vEstado" class="smallInput">
        <option value="">Seleccione</option>
        <option value="Emitido">Emitido</option>
        <option value="Recogido">Recogido</option>
        <option value="Cobrado">Cobrado</option>
        </select>
    </td>
</tr>
<tr><td colspan="7" height="10"></td></tr>
<tr>
    <td align="center" colspan="7">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchCheques()" />
    </td>
</tr>
</table>
</form>