<?php /* Smarty version Smarty3-b7, created on 2016-01-25 18:53:41
         compiled from "/var/www//controlobra/templates/forms/search-cuantificacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76564638156a6c395538eb0-37949866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a5c04fe56500505579d7e4ec27900a5e6470478' => 
    array (
      0 => '/var/www//controlobra/templates/forms/search-cuantificacion.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '76564638156a6c395538eb0-37949866',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frmSearch" id="frmSearch" method="post" action="">
<input type="hidden" name="action" id="action" value="searchCuantificacion" />
<table width="100%" cellpadding="0" cellspacing="0" class="tblNoBorder">
<tr>
    <td align="center"><b>Partida</b></td>
    <td align="center"><b>Subpartida</b></td>
    <td align="center"><b>Concepto</b></td>
    <td align="center"><b>Contratista</b></td>
    <td align="center"><b>Torres</b></td>
    <td align="center"><b>Tipo Area</b></td>
</tr>
<tr>    
    <td align="center">
    <select name="vCategoryId" id="vCategoryId" class="smallInput" onchange="LoadSubcatsSearch()">
    <option value="">Seleccione</option>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categorias')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <option value="<?php echo $_smarty_tpl->getVariable('item')->value['categoryId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['categoryId']==$_smarty_tpl->getVariable('item')->value['categoryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
    <?php }} ?>
    </select>
    </td>
    <td align="center">
        <div id="vEnumSubcat"><?php $_template = new Smarty_Internal_Template("lists/enumSubcatSearch.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center">
        <div id="vEnumConcept"><?php $_template = new Smarty_Internal_Template("lists/enumConceptConSearch.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center">
    	<?php $_template = new Smarty_Internal_Template("lists/enumSupplierSearch.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </td>
    <td align="center">
    	<select name="vProjItemId" id="vProjItemId" class="smallInput" onchange="LoadLevelsSearch()">
        <option value="">Seleccione</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <option value="<?php echo $_smarty_tpl->getVariable('item')->value['projItemId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
        <?php }} ?>
        </select>
    </td>
    <td align="center">
	   	<select name="vProjTypeId" id="vProjTypeId" class="smallInput">
        <option value="">Seleccione</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <option value="<?php echo $_smarty_tpl->getVariable('item')->value['projTypeId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
        <?php }} ?>
        </select>
    </td>
</tr>
<tr>
    <td align="center"><b>Nivel Inicial</b></td>
    <td align="center"><b>Nivel Final</b></td>
    <td align="center"></td>
    <td align="center"><b>Cant. B</b></td>
    <td align="center"><b>Cant. H</b></td>
    <td align="center"></td>
</tr>
<tr>
    <td align="center">
    <div id="level1"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumLevelCuant.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center">
    <div id="level2"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumLevelCuant.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </td>
    <td align="center"></td>
    <td align="center"><input type="text" name="vB" id="vB" class="smallInput" style="width:100px" /></td>
    <td align="center"><input type="text" name="vH" id="vH" class="smallInput" style="width:100px" /></td>
    <td align="center"></td>
</tr>
<tr><td colspan="6" height="10"></td></tr>
<tr>
    <td align="center" colspan="6">
    <input type="button" class="btnGral" value="Buscar" onclick="SearchCuantificacion()" />
    </td>
</tr>
</table>
</form>