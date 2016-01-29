<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:15:07
         compiled from "./templates/lists/resumen-ventas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2927846345699615b935e56-63568567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '264b67742766699667feee5075f95df6f3a011dd' => 
    array (
      0 => './templates/lists/resumen-ventas.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '2927846345699615b935e56-63568567',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" class="boxTable">
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/resumen-ventas-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    <tbody>     
    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/resumen-ventas-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>     
</table>