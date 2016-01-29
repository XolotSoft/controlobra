<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:19:06
         compiled from "/var/www//controlobra/templates/lists/contract-expiries-ext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5673230985699624aceba67-21197955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8362ca5680aa3bf7576b34c3c8ef76f5618c797' => 
    array (
      0 => '/var/www//controlobra/templates/lists/contract-expiries-ext.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '5673230985699624aceba67-21197955',
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
    <input class="smallInput small" name="nomMant" type="text" style="width:90px" value="Mantenimiento" readonly="readonly"/>
    <input type="hidden" name="contExpIdMant" id="contExpIdMant" value="<?php echo $_smarty_tpl->getVariable('info')->value['contExpIdMant'];?>
" />
    </div>
    </td>
    <td align="center"><div align="center">    
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumMantCont.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaMant" id="fechaMant" type="text" style="width:90px" value="<?php if ($_smarty_tpl->getVariable('info')->value['fechaMant']!='--'){?><?php echo $_smarty_tpl->getVariable('info')->value['fechaMant'];?>
<?php }?>" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaMant','ddmmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
<tr>
    <td align="center">
    <div align="center">
    <input class="smallInput small" name="nomEquip" type="text" style="width:90px" value="Equipamiento" readonly="readonly"/>
    <input type="hidden" name="contExpIdEquip" id="contExpIdEquip" value="<?php echo $_smarty_tpl->getVariable('info')->value['contExpIdEquip'];?>
" />
    </div>
    </td>
    <td align="center"><div align="center">    
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumEquipCont.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  
    </div>
    </td>
    <td align="center"><div align="center">
    	<div style="float:left">
    	<input class="smallInput small" name="fechaEquip" id="fechaEquip" type="text" style="width:90px" value="<?php if ($_smarty_tpl->getVariable('info')->value['fechaEquip']!='--'){?><?php echo $_smarty_tpl->getVariable('info')->value['fechaEquip'];?>
<?php }?>" readonly="readonly"/>
        </div>
        <div style="float:left">
        <a href="javascript:void(0)" onclick="NewCal('fechaEquip','ddmmmyyyy')">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/calendar.gif" /></a>
        </div>
    </div>
    </td>
</tr>
</table>