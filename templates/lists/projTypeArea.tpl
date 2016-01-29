<table width="99%" cellpadding="0" cellspacing="0" border="1" class="boxTable" id="tblTipos">
 <thead>
    <tr>
        <th class="tblTh">Nombre</th>
        <th class="tblTh" width="80">Factor de Redondeo</th>
        <th class="tblTh" width="60">Area Com&uacute;n</th>
        <th class="tblTh" width="60">Area Real</th>
        <th class="tblTh" width="60">Area Venta</th>
        <th class="tblTh" width="80">Area Terraza Real</th>
        <th class="tblTh" width="60">Area Terraza</th>
        <th class="tblTh" width="70">Area Jard&iacute;n Real</th>
        <th class="tblTh" width="60">Area Jard&iacute;n</th>
        <th class="tblTh" width="40">Color</th>
        <th class="tblTh" width="20">Ab.</th>
        <th class="tblTh" width="40">Acci&oacute;n</th>
  </tr>
</thead>
<tbody>	
{foreach from=$areaTypes item=item key=key}
	<tr>    	
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small3" name="name[]" id="" type="text" value="{$item.name}"/>
        {if $item.typeId}
        <input type="hidden" name="idProjType[]" value="{$item.typeId}" />
        {/if}        
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="redondeo[]" id="factorRed_{$key}" onblur="UpdateAreas({$key})" type="text" value="{if $item.redondeo > 0}{$item.redondeo}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="comunArea[]" id="areaComun_{$key}" onblur="UpdateAreaVenta({$key})" type="text" value="{if $item.comunArea > 0}{$item.comunArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="realArea[]" id="areaReal_{$key}" onblur="UpdateAreaVenta({$key})" type="text" value="{if $item.realArea > 0}{$item.realArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="ventaArea[]" id="areaVenta_{$key}" type="text" value="{if $item.ventaArea > 0}{$item.ventaArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="terrazaReal[]" id="realTerraza_{$key}" onblur="UpdateAreaTerraza({$key})" type="text" value="{if $item.terrazaReal > 0}{$item.terrazaReal}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="terrazaComun[]" id="comunTerraza_{$key}" type="text" value="{if $item.terrazaComun > 0}{$item.terrazaComun}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="jardinReal[]" id="realJardin_{$key}" onblur="UpdateAreaJardin({$key})" type="text" value="{if $item.jardinReal > 0}{$item.jardinReal}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="jardinComun[]" id="comunJardin_{$key}" type="text" value="{if $item.jardinComun > 0}{$item.jardinComun}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
<a href="javascript:void(0)" onclick="cp.select(document.frmStep4.color_{$key},'pick_{$key}',{$key});return false;" id="pick_{$key}" style="border: 1px solid #000000; font-family:Verdana; font-size:10px; text-decoration: none; background-color:{$item.color}">&nbsp;&nbsp;&nbsp;</a>
<input id="color_{$key}" size="7" type="hidden" name="color[{$key}]" value="{$item.color}">
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input type="checkbox" name="abierta[{$key}]" id="abierta_{$key}" value="1" {if $item.abierta}checked{/if} />
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <a href="javascript:void(0)" onclick="AddSubTypeArea({$key})">
        	<img src="{$WEB_ROOT}/images/icons/add.png" title="Agregar Subtipo" /></a>
        <a href="javascript:void(0)" onclick="DelTypeArea({$key})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" /></a>
        </td>
    </tr>
    
    <tr id="subTypes_{$key}" {if $item.subTypes|count == 0}style="display:none"{/if}>
    	<td colspan="12">
    		<div id="listSubTypes_{$key}">{include file="{$DOC_ROOT}/templates/lists/projSubTypeArea.tpl"}</div>
    	</td>
    </tr>
        
{foreachelse}
<tr><td align="center" colspan="12" height="30">Ning&uacute;n registro encontrado</td></tr>
{/foreach}
</tbody>
</table>