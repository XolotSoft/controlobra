<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:16
         compiled from "/var/www//controlobra/templates/forms/view-requisicion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105490370156996434ea5368-44870209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '131b313630b1afa967c4ba4ae83dcc3ee228f5db' => 
    array (
      0 => '/var/www//controlobra/templates/forms/view-requisicion.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '105490370156996434ea5368-44870209',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
               
        <div style="width:30%;float:left"><b>Concepto:</b></div>
        <table width="60%" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td><?php echo $_smarty_tpl->getVariable('info')->value['concept'];?>
 &nbsp;&nbsp;&nbsp;<b>Cant:</b> <?php echo $_smarty_tpl->getVariable('info')->value['qtyConcept'];?>
</td>
        </tr>
        </table>
        <hr />
                        
        <div style="width:30%;float:left"><b>Tipo de Area:</b></div>
        <?php echo $_smarty_tpl->getVariable('info')->value['type'];?>
            
        <hr />
        
        <div style="width:30%;float:left"><b>Torre:</b></div>
        	<?php echo $_smarty_tpl->getVariable('info')->value['torre'];?>

        <hr />      
        
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumProjLevelsReqView.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                                        
        <div style="width:30%;float:left">&nbsp;</div>
        <table width="450" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">
        <tr>
        	<td width="150"><b>Total por Rango</b></td>           
            <td width="150"><b>Requisici&oacute;n Actual</b></td>
            <td><b>Saldo por Rango</b></td>          
        </tr>
        <tr>
        	<td><?php echo number_format($_smarty_tpl->getVariable('info')->value['totalRango'],2,".",",");?>
</td>
            <td><?php echo number_format($_smarty_tpl->getVariable('info')->value['requiActual'],2,".",",");?>
</td>
            <td><?php echo number_format($_smarty_tpl->getVariable('info')->value['saldoRango'],2,".",",");?>
</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td><b>Total Concepto</b></td>           
            <td>&nbsp;</td>
            <td><b>Saldo Total Concepto</b></td>          
        </tr>
        <tr>
        	<td><?php echo number_format($_smarty_tpl->getVariable('info')->value['totalConcept'],2,".",",");?>
</td>
            <td>&nbsp;</td>
            <td><?php echo number_format($_smarty_tpl->getVariable('info')->value['saldoConcept'],2,".",",");?>
</td>
        </tr>       
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>&nbsp;</td>           
            <td>&nbsp;</td>
            <td><b>Total Requisici&oacute;n</b></td>          
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php echo number_format($_smarty_tpl->getVariable('info')->value['totalReq'],2,".",",");?>
</td>
        </tr>
        </table> 
		
        <div style="clear:both"></div>
			<hr />
        <div class="formLine" style="text-align:center; margin-left:300px;">            
            <a class="button_grey" id="btnCerrar"><span>Cerrar</span></a>           
     	</div> 
                          
      <div style="clear:both"></div>
      
      <div style="margin-bottom:10px"></div>
      
</div>
