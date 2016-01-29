<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:25:04
         compiled from "/var/www//controlobra/templates/lists/concept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1632052092569963b082eef0-23090024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '490f82497bccd55a7c901b7d80ea3c8491cb65af' => 
    array (
      0 => '/var/www//controlobra/templates/lists/concept.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '1632052092569963b082eef0-23090024',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblConcept" border="0" class="sortable boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/concept-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/concept-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
<tfoot>
	<tr>
    	<td colspan="8" align="left" class="tblPages" height="22">
        <?php if (count($_smarty_tpl->getVariable('concepts')->value['items'])){?>
            <div style="float:left">        
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/itemsPage.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('page',"concept"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            Reg. por P&aacute;gina :: Total = <?php echo $_smarty_tpl->getVariable('concepts')->value['total'];?>

            </div>
        <?php }?>
        
        <?php if (count($_smarty_tpl->getVariable('concepts')->value['pages'])){?>   
            <div style="float:right; padding-top:2px">        
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/pages.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('pages',$_smarty_tpl->getVariable('concepts')->value['pages']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
            </div>
        <?php }?>
        </td>
	</tr>
</tfoot>      
</table>