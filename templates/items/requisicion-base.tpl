{foreach from=$concepts item=item key=key}
<tr>       
    <td height="40" align="center">{$item.requisicionId}</td>
    <td align="center">{$item.name}</td>
    <td align="center">        
        
        {foreach from=$item.torres item=iT key=kT}
            <div align="center" style="padding-top:10px"><b>Torre:</b> {$iT.name}</div>
            <table width="200" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"><b>AREA</b></td>                
            </tr>
            {foreach from=$iT.areas item=iA key=kA}
            <tr>
                <td align="center">{$iA.name}</td>                
            </tr>
            {/foreach}
            </table>
        {/foreach}
        <br /> 
               
    </td>         
    <td align="center">{$item.totalReq|number_format:2:".":","}</td>
    <td align="center">{$item.fecha|date_format:"%d-%m-%Y"}</td>
    <td align="center">
    {if $item.status == "Completado"}
    	Completo
    {else}
    	{$item.status}
    {/if}
    </td>
    <td align="center">
    {if $item.status == "Pendiente"}
    	<a href="javascript:void(0)" onclick="AddPedidosPopup({$item.requisicionId})">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Pedido" />
        </a>
    {else}
    --
    {/if}
    </td>    
   {*
    <td align="center">
    	<a href="javascript:void(0)" onclick="ViewMaterials({$item.requisicionId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Materiales" />
        </a>
    </td>
    *} 
    <td align="center">
    	 <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.requisicionId}" title="Eliminar"/>
         {if $item.steel == 0}
         <img src="{$WEB_ROOT}/images/icons/details.png" class="spanView" id="{$item.requisicionId}" title="Ver Detalles"/>
         {else}
         <a href="javascript:void(0)" onclick="ViewReqAceroPopup({$item.requisicionId})">
            <img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Detalles" border="0"/>
         </a>
         {/if}
    </td>
</tr>

<tr id="materials_{$item.requisicionId}" style="display:none">    
    <td colspan="8" align="right">
    {include file="{$DOC_ROOT}/templates/lists/requisicion-material.tpl"}
    </td>
</tr>

<tr id="pedidosAll_{$item.requisicionId}" style="display:none">    
    <td colspan="8" align="right">
    <div id="contPedidosAll_{$item.requisicionId}">
    {include file="{$DOC_ROOT}/templates/lists/requisicion-pedidos.tpl"}
    </div>
    </td>
</tr>

{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}