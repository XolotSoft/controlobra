<?php /* Smarty version Smarty3-b7, created on 2016-01-15 15:14:16
         compiled from "/var/www//controlobra/templates/items/resumen-gastos-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58096723256996128512b88-62588482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a104da2ca0d1c38dbc06055b75ad4eb213cd08e2' => 
    array (
      0 => '/var/www//controlobra/templates/items/resumen-gastos-header.tpl',
      1 => 1452627699,
    ),
  ),
  'nocache_hash' => '58096723256996128512b88-62588482',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<thead>
    <tr>
        <th width="100">Partida</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wSubcat')->value;?>
">Subpartida</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wConcept')->value;?>
">Concepto</th>
        <th width="206">Descripci&oacute;n</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wCantidad')->value;?>
">Cantidad</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wUnidad')->value;?>
">Unidad</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wPrecio')->value;?>
">Precio</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wTotal')->value;?>
">Total</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wBlank')->value;?>
" style="background-color:#FFFFFF"></th>
        <th width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value;?>
">Cantidad</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value;?>
">Total</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wPorc')->value;?>
">%</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wBlank')->value;?>
" style="background-color:#FFFFFF"></th>
        <th width="<?php echo $_smarty_tpl->getVariable('wCantidad2')->value;?>
">Cantidad</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wTotal2')->value;?>
">Total</th>
        <th width="<?php echo $_smarty_tpl->getVariable('wPorc')->value;?>
">%</th>
  </tr>
</thead>