<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/contract-expiries-enganche.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14825493745699624ab6c383-53758078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94f0eda17a8222437a3b3f075f84b11932beec31' => 
    array (
      0 => '/var/www//controlobra/templates/lists/contract-expiries-enganche.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '14825493745699624ab6c383-53758078',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="60%" cellpadding="0" cellspacing="0" border="0" class="_tblNoBorder">
<tr>
    <td align="center"><div align="center"><b>No.</b></div></td>
    <td align="center"><div align="center"><b>Monto $</b></div></td>
    <td align="center"><div align="center"><b>Fecha</b></div></td>
</tr>
<tr>
    <td align="center">
    <div align="center">
    <input class="smallInput small" name="nomEng" type="text" style="width:90px" value="Enganche" readonly="readonly"/>
    <input type="hidden" name="contExpIdEng" id="contExpIdEng" value="<?php echo $_smarty_tpl->getVariable('info')->value['contExpIdEng'];?>
" />
    </div>
    </td>
    <td align="center"><div align="center">    
    <input class="smallInput small" name="montoEng" id="montoEng" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('info')->value['montoEng'];?>
" onblur="FormatField('montoEng')" />   
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaEng" id="fechaEng" type="text" style="width:90px" value="<?php echo $_smarty_tpl->getVariable('info')->value['fechaEng'];?>
" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaEng','ddmmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
</table>