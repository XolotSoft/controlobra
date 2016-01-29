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
                <td align="center"><b>REQ. ACTUAL</b></td>
            </tr>
            {foreach from=$iT.areas item=iA key=kA}
            <tr>
                <td align="center">{$iA.name}</td>
                <td align="center">{$iA.requisicion|number_format:2:'.':','}</td>
            </tr>
            {/foreach}
            </table>
        {/foreach}
        <br /> 
        
    </td>         
    <td align="center">${$item.total|number_format:2:".":","}</td>
    <td align="center">{$item.fecha|date_format:"%d-%m-%Y"}</td>
    <td align="center">{$item.status}</td>     
    <td align="center">
    	{if $item.status == "Pendiente"}
        <input type="checkbox" name="sel_{$item.reqPedidoId}" id="sel_{$item.reqPedidoId}" value="{$item.idMats}" onclick="SelAllMats({$item.reqPedidoId})" />
        {/if}   	 
         <a href="javascript:void(0)" onclick="ViewMaterials({$item.reqPedidoId})">
         	<img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Detalles"/>
         </a>         
    </td>
    <td align="center">    
    	 <a href="javascript:void(0)" onclick="DeletePedidosPopup({$item.reqPedidoId})">
         	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar"/>
         </a>
         {*
         <a href="javascript:void(0)" onclick="ViewPedidosPopup({$item.reqPedidoId})">
         	<img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Detalles"/>
         </a>
         *}
    </td>
</tr>

<tr id="materials_{$item.reqPedidoId}" style="display:">    
    <td colspan="8" align="right">
    {include file="{$DOC_ROOT}/templates/lists/requisicion-material.tpl"}
    </td>
</tr>

{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}