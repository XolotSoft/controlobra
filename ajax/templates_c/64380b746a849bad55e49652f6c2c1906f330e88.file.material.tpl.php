<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:53
         compiled from "/var/www//controlobra/templates/lists/material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1331029426569d0401d976e6-68519589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64380b746a849bad55e49652f6c2c1906f330e88' => 
    array (
      0 => '/var/www//controlobra/templates/lists/material.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1331029426569d0401d976e6-68519589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMaterial" border="0" class="sortable boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/material-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/material-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
    	<td colspan="9" align="left" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('materials')->value['items'])){?>
            <div style="float:left">        
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/itemsPage.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('page',"material"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            Reg. por P&aacute;gina :: Total = <?php echo $_smarty_tpl->getVariable('materials')->value['total'];?>

            </div>
        <?php }?>
        
        <?php if (count($_smarty_tpl->getVariable('materials')->value['pages'])){?>   
            <div style="float:right; padding-top:2px">        
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('materials')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
            </div>
        <?php }?>
        </td>
	</tr>
</tfoot>   
</table>