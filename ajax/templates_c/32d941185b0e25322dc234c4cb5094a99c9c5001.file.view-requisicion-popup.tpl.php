<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:27:16
         compiled from "/var/www//controlobra/templates/boxes/view-requisicion-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151337425756996434e318c7-53132025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32d941185b0e25322dc234c4cb5094a99c9c5001' => 
    array (
      0 => '/var/www//controlobra/templates/boxes/view-requisicion-popup.tpl',
      1 => 1452627703,
    ),
  ),
  'nocache_hash' => '151337425756996434e318c7-53132025',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<div class="popupheader" style="z-index:70">
			<div id="fviewmenu" style="z-index:70">
	    	<div id="fviewclose"><span style="color:#CCC" id="closePopUpDiv">Close<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/b_disn.png" border="0" alt="close" /></span>
      	</div>
      </div>

      <div id="ftitl">
    		<div class="flabel">Detalles Requisici&oacute;n</div>
				<div id="vtitl" style="padding-top:10px">                	
                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="tblNoBorder">                    
                    <tr>
                    	<?php if ($_smarty_tpl->getVariable('infP')->value['image']){?>
                    	<td align="center" width="200"><div align="center">                        
                        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/projects/th_<?php echo $_smarty_tpl->getVariable('infP')->value['image'];?>
" />                        
                        </div>
                        </td>
                        <?php }?>
                        <td align="center" valign="top">
                        <div align="center" style="color:#FFF">
                        	.:: Detallles Requisici&oacute;n No. <?php echo $_smarty_tpl->getVariable('info')->value['requisicionId'];?>
 ::.
                            <div style="padding-top:10px"><?php echo $_smarty_tpl->getVariable('infP')->value['name'];?>
</div>
                        </div>
                        </td>
                    </tr>
                    </table>
                </div>
    	</div>
      <div id="draganddrop" style="position:absolute;top:45px;left:640px">
    		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/draganddrop.png" border="0" alt="mueve" />
    	</div>

		</div>
		
    <div class="wrapper">
			<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/view-requisicion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>