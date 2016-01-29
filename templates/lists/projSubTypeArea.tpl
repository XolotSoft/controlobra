<table width="100%" cellpadding="0" cellspacing="0" border="1" class="boxTable" id="tblTipos">
 <thead>
    <tr>
        <th></th>
        <th width="80"></th>
        <th width="60"></th>
        <th width="60"></th>
        <th width="60"></th>
        <th width="80"></th>
        <th width="60"></th>
        <th width="70"></th>
        <th width="60"></th>
        <th width="40"></th>
        <th width="20"></th>
        <th width="40"></th>
  </tr>
</thead>
<tbody>	
{foreach from=$item.subTypes item=it key=k}
	<tr>    	
        <td align="right" bgcolor="#FFFFFF">
        <div style="float:left; padding-top:5px; padding-left:15px;"> > </div>
        <div style="float:right">
        <input class="smallInput small3" name="name{$key}[]" id="" type="text" value="{$it.name}"/>
        </div>
        {if $it.projSubTypeId}
        <input type="hidden" name="idProjSubType{$key}[]" value="{$it.projSubTypeId}" />
        {/if}        
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="redondeo{$key}[]" id="factorRed_{$key}_{$k}" onblur="UpdateAreasS({$key},{$k})" type="text" value="{if $it.redondeo > 0}{$it.redondeo}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="comunArea{$key}[]" id="areaComun_{$key}_{$k}" onblur="UpdateAreaVentaS({$key},{$k})" type="text" value="{if $it.comunArea > 0}{$it.comunArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="realArea{$key}][]" id="areaReal_{$key}_{$k}" onblur="UpdateAreaVentaS({$key},{$k})" type="text" value="{if $it.realArea > 0}{$it.realArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="ventaArea{$key}[]" id="areaVenta_{$key}_{$k}" type="text" value="{if $it.ventaArea > 0}{$it.ventaArea}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="terrazaReal{$key}[]" id="realTerraza_{$key}_{$k}" onblur="UpdateAreaTerrazaS({$key},{$k})" type="text" value="{if $it.terrazaReal > 0}{$it.terrazaReal}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="terrazaComun{$key}[]" id="comunTerraza_{$key}_{$k}" type="text" value="{if $it.terrazaComun > 0}{$it.terrazaComun}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="jardinReal{$key}[]" id="realJardin_{$key}_{$k}" onblur="UpdateAreaJardinS({$key},{$k})" type="text" value="{if $it.jardinReal > 0}{$it.jardinReal}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input class="smallInput small4" name="jardinComun{$key}[]" id="comunJardin_{$key}_{$k}" type="text" value="{if $it.jardinComun > 0}{$it.jardinComun}{/if}"/>
        </td>
        <td align="center" bgcolor="#FFFFFF">
<a href="javascript:void(0)" onclick="cp.select(document.frmStep4.color_{$key}_{$k},'pick_{$key}_{$k}','{$key}_{$k}');return false;" id="pick_{$key}_{$k}" style="border: 1px solid #000000; font-family:Verdana; font-size:10px; text-decoration: none; background-color:{$it.color}">&nbsp;&nbsp;&nbsp;</a>
<input id="color_{$key}_{$k}" size="7" type="hidden" name="color{$key}[{$k}]" value="{$it.color}">
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <input type="checkbox" name="abierta{$key}[{$k}]" id="abierta_{$key}_{$k}" value="1" {if $it.abierta}checked{/if} />
        </td>
        <td align="center" bgcolor="#FFFFFF">
        <a href="javascript:void(0)" onclick="DelSubTypeArea({$key},{$k})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar" /></a>
        </td>
    </tr>    
{foreachelse}
<tr><td align="center" colspan="12" height="30">Ninguna sub&aacute;rea encontrada</td></tr>
{/foreach}
</tbody>
</table>