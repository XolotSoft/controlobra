<?php /* Smarty version Smarty3-b7, created on 2016-01-15 14:51:28
         compiled from "/var/www//controlobra/templates/lists/pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53455877456995bd091eb10-00871357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983a1e402d9ca779b3138884bbb83f006106823a' => 
    array (
      0 => '/var/www//controlobra/templates/lists/pages.tpl',
      1 => 1452627702,
    ),
  ),
  'nocache_hash' => '53455877456995bd091eb10-00871357',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('pages')->value['numbers'])){?>
<?php if ($_smarty_tpl->getVariable('type')->value=="ajax"){?><?php $_smarty_tpl->assign("linktpl","{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/links/ajax_link.tpl",null,null);?><?php }else{ ?><?php $_smarty_tpl->assign("linktpl","{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/links/link.tpl",null,null);?><?php }?>
<div class="pages">
	<?php if ($_smarty_tpl->getVariable('pages')->value['first']){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('linktpl')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('link',$_smarty_tpl->getVariable('pages')->value['first']);$_template->assign('name',$_smarty_tpl->getVariable('language')->value['first']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
	<?php if ($_smarty_tpl->getVariable('pages')->value['prev']){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('linktpl')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('link',$_smarty_tpl->getVariable('pages')->value['prev']);$_template->assign('name',$_smarty_tpl->getVariable('language')->value['prev']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
	<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value['numbers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['page']->key;
?>
	<?php if ($_smarty_tpl->getVariable('pages')->value['current']==$_smarty_tpl->getVariable('key')->value){?><span class="p"><?php echo $_smarty_tpl->getVariable('key')->value;?>
</span><?php }else{ ?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('linktpl')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('link',$_smarty_tpl->getVariable('page')->value);$_template->assign('name',$_smarty_tpl->getVariable('key')->value); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
	<?php }} ?>
	<?php if ($_smarty_tpl->getVariable('pages')->value['next']){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('linktpl')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('link',$_smarty_tpl->getVariable('pages')->value['next']);$_template->assign('name',$_smarty_tpl->getVariable('language')->value['next']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
	<?php if ($_smarty_tpl->getVariable('pages')->value['last']){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('linktpl')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('link',$_smarty_tpl->getVariable('pages')->value['last']);$_template->assign('name',$_smarty_tpl->getVariable('language')->value['last']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php }?>
</div>
<?php }?>