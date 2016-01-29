<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:24:56
         compiled from "/var/www//controlobra/templates/links/link.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1782587923569963a8551476-19672152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7f549c94763cd6704c16dfa479c9c10ec254cf2' => 
    array (
      0 => '/var/www//controlobra/templates/links/link.tpl',
      1 => 1452627703,
    ),
  ),
  'nocache_hash' => '1782587923569963a8551476-19672152',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<a href="<?php if (!preg_match("/^http/i",$_smarty_tpl->getVariable('link')->value)){?><?php echo $_smarty_tpl->getVariable('url')->value;?>
/<?php }?><?php echo $_smarty_tpl->getVariable('link')->value;?>
"<?php if ($_smarty_tpl->getVariable('target')->value){?> target="<?php echo $_smarty_tpl->getVariable('target')->value;?>
"<?php }?>><?php echo $_smarty_tpl->getVariable('name')->value;?>
</a>