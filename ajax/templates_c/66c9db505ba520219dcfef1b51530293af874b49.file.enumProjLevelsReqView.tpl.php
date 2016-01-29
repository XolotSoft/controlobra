<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:17
         compiled from "/var/www//controlobra/templates/lists/enumProjLevelsReqView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16788266885699643502e0b2-60818949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c9db505ba520219dcfef1b51530293af874b49' => 
    array (
      0 => '/var/www//controlobra/templates/lists/enumProjLevelsReqView.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '16788266885699643502e0b2-60818949',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['to'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kPL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('torres')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['to']->key => $_smarty_tpl->tpl_vars['to']->value){
 $_smarty_tpl->tpl_vars['kPL']->value = $_smarty_tpl->tpl_vars['to']->key;
?>
<?php $_smarty_tpl->assign("levels",$_smarty_tpl->getVariable('to')->value['levels'],null,null);?>
<div style="width:30%;float:left"><b>Nivel Torre <?php echo $_smarty_tpl->getVariable('to')->value['name'];?>
:</b></div>
<table width="70%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
    <?php  $_smarty_tpl->tpl_vars['lev'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('levels')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lev']->key => $_smarty_tpl->tpl_vars['lev']->value){
 $_smarty_tpl->tpl_vars['kL']->value = $_smarty_tpl->tpl_vars['lev']->key;
?>
    <?php $_smarty_tpl->assign("areas",$_smarty_tpl->getVariable('lev')->value['areas'],null,null);?>
    <?php $_smarty_tpl->assign("areas2",$_smarty_tpl->getVariable('lev')->value['areas2'],null,null);?>
    <tr>
        <td align="center" width="60"><div align="center" class="bdTB"><?php echo $_smarty_tpl->getVariable('lev')->value['iniLevel'];?>
</div></td>
        <td align="center" width="30"><div align="center" class="bdTB">AL</div></td>
        <td align="center" width="60"><div align="center" class="bdTB"><?php echo $_smarty_tpl->getVariable('lev')->value['endLevel'];?>
</div></td>
        <td align="center" width="">
      	<div align="center" class="bdTB">
        	<div style="float:left; padding-left:10px">No. Pisos: <?php echo $_smarty_tpl->getVariable('lev')->value['totalLevel'];?>
</div>
        	<div style="float:right">
            	<a href="javascript:void(0)" onclick="ToogleTorre(<?php echo $_smarty_tpl->getVariable('lev')->value['cuantItemId'];?>
)">
                <div id="iconTorre_<?php echo $_smarty_tpl->getVariable('lev')->value['cuantItemId'];?>
">[+]</div></a>
            </div>
            <div style="clear:both"></div>
        </div>
        </td>
    </tr>
    
    <tr id="torre_<?php echo $_smarty_tpl->getVariable('lev')->value['cuantItemId'];?>
" style="display:none">
        <td colspan="4">        
        <div style="padding-top:5px; padding-bottom:5px; float:left">
        <table width="230" cellpadding="0" cellspacing="0" border="1">
        <?php if ($_smarty_tpl->getVariable('areas')->value){?>    
        <tr>
            <td align="center"><div align="center"><b>Area</b></div></td>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b>Req. Actual</b></div></td>
        </tr>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['itA'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kA'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('areas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itA']->key => $_smarty_tpl->tpl_vars['itA']->value){
 $_smarty_tpl->tpl_vars['kA']->value = $_smarty_tpl->tpl_vars['itA']->key;
?>
        <tr>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['name'];?>
</div></td>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['subtotal'];?>
</div></td>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['requisicion'];?>
</div></td>
        </tr>    
        <?php }} else { ?>
        <tr><td align="center" colspan="3"><div align="center">Ninguna &aacute;rea encontrada.</div></td></tr>
        <?php } ?>   
        </table>       
        </div>
        
        <!-- 2ND SECTION -->
        
        <div style="padding-top:5px; padding-bottom:5px; float:left; margin-left:20px"">
        <table width="230" cellpadding="0" cellspacing="0" border="1">
        <?php if ($_smarty_tpl->getVariable('areas2')->value){?>    
        <tr>
            <td align="center"><div align="center"><b>Area</b></div></td>
            <td align="center"><div align="center"><b>Subtotal</b></div></td>
            <td align="center"><div align="center"><b>Req. Actual</b></div></td>
        </tr>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['itA'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kA'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('areas2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itA']->key => $_smarty_tpl->tpl_vars['itA']->value){
 $_smarty_tpl->tpl_vars['kA']->value = $_smarty_tpl->tpl_vars['itA']->key;
?>
        <tr>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['name'];?>
</div></td>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['subtotal'];?>
</div></td>
            <td align="center"><div align="center"><?php echo $_smarty_tpl->getVariable('itA')->value['requisicion'];?>
</div></td>
        </tr>            
        <?php }} ?>   
        </table>       
        </div>
        
        </td>
    </tr>
    <?php }} else { ?>
    <tr><td colspan="4" align="center"><div align="center">Ninguna &aacute;rea encontrada.</div></td>
    <?php } ?>
</table>
<br />
<?php }} else { ?>
<div style="width:30%;float:left">* Nivel Torre:</div>
Ning&uacute;n nivel encontrado.
<br />
<?php } ?>
<hr />