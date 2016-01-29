<?php /* Smarty version Smarty3-b7, created on 2016-01-18 09:25:50
         compiled from "/var/www//controlobra/templates/forms/edit-material.tpl" */ ?>
<?php /*%%SmartyHeaderCode:528063403569d03fed55ae0-79832932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc81c60a233875f466ee9fec9fb9194ac3a8bfd3' => 
    array (
      0 => '/var/www//controlobra/templates/forms/edit-material.tpl',
      1 => 1452627704,
    ),
  ),
  'nocache_hash' => '528063403569d03fed55ae0-79832932',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="divForm">
	<form id="editMaterialForm" name="editMaterialForm" method="post">
    <input type="hidden" name="formName" id="formName" value="editMaterialForm" />
    <fieldset>
        
        <div style="width:30%;float:left">* Partida:</div>
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumCategory.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <hr />
        
        <div id="fieldSubcat" <?php if (!$_smarty_tpl->getVariable('subcategorias')->value){?>style="display:none"<?php }?>>
        <div style="width:30%;float:left">Subpartida:</div>
        <div id="listSubcat"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumSubcategory.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
        <hr />
        </div>
        
        <div id="fieldConcept" <?php if (!$_smarty_tpl->getVariable('concepts')->value){?>style="display:none"<?php }?>>
            <div style="width:30%;float:left">Concepto:</div>
            <div id="listConcept"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumConceptCon.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
            <hr />
        </div>
                
        <div style="width:30%;float:left">* Nombre:</div>
        <input class="smallInput medium" name="name" id="name" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
"/>
        <hr />
        
        <div style="width:30%;float:left">% Desperdicio:</div>
        <input class="smallInput small" name="waste" id="waste" type="text" size="50" value="<?php echo $_smarty_tpl->getVariable('info')->value['waste'];?>
"/>
        <hr />
       
        <div style="width:30%;float:left">* Unidad:</div>
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enumUnit.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <hr />
        
        <div style="width:30%;float:left">Acero:</div>
        <input type="checkbox" name="steel" id="steel" value="1" onclick="ToogleSteel()" <?php if ($_smarty_tpl->getVariable('info')->value['steel']){?>checked<?php }?> />
        <hr />
        
        <div style="width:30%;float:left">Observaciones:</div>
        <textarea name="comment" id="comment" class="smallInput medium" rows="5"><?php echo $_smarty_tpl->getVariable('info')->value['comment'];?>
</textarea>
        <hr />
       
       <div id="fieldSteel" style="display:<?php if ($_smarty_tpl->getVariable('info')->value['steel']==0){?>none<?php }?>">
        
        <div style="width:30%;float:left">Diametro (Pulgadas):</div>
        <input class="smallInput small" name="diameter" id="diameter" type="text" size="50" style="width:100px" value="<?php echo $_smarty_tpl->getVariable('info')->value['diameter'];?>
"/>
        <hr />
        
        <div style="width:30%;float:left">Peso (Kg):</div>
        <input class="smallInput small" name="weight" id="weight" type="text" size="50"/ style="width:100px" value="<?php echo $_smarty_tpl->getVariable('info')->value['weight'];?>
">
        <hr />
        
        <div style="width:30%;float:left">Traslape:</div>
        <input class="smallInput small" name="traslape" id="traslape" type="text" size="50"/ style="width:100px" value="<?php echo $_smarty_tpl->getVariable('info')->value['traslape'];?>
" onblur="VerifyTraslape()">
        <hr />
        
        <div style="width:30%;float:left">Bulbos:</div>
        <input class="smallInput small" name="bulbos" id="bulbos" type="text" size="50"/ style="width:100px" value="<?php echo $_smarty_tpl->getVariable('info')->value['bulbos'];?>
" onblur="VerifyBulbos()">
        <hr />
        
        </div>
       
       	  <div align="right" style="padding-right:10px">
          <a href="javascript:void(0)" onclick="AddPrice()">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" border="0" />
          Agregar Nuevo Precio</a>
          </div>
          
          <div align="center" id="listPrice">
          <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/material-prices.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

          </div>
          
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
        <div class="formLine" style="text-align:center; margin-left:300px">            
            <a class="button_grey" id="btnEditMaterial"><span>Actualizar</span></a>           
     	</div> 
        <input type="hidden" id="type" name="type" value="saveEditMaterial"/>
        <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['materialId'];?>
" />
  	</fieldset>
	</form>
</div>