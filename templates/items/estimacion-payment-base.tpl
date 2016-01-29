{foreach from=$payments item=item key=ky}
    <tr>       
        <td height="40" align="center">
        {$item.estimacionId} 
        <a href="javascript:void(0)" onclick="ViewDetails({$item.estimacionPaymentId})" id="det_{$item.estimacionPaymentId}">[+]</a>
        </td>
        <td align="center">{$item.supplier}</td>
        <td align="center">${$item.total|number_format:2:".":","}</td>       
        <td align="center">{$item.fecha|date_format:"%d %b %Y"|capitalize}</td>
        <td align="center">
        <div id="txtPagado_{$item.estimacionPaymentId}">
        	{if $item.revisado}Revisado{else}Pendiente{/if}
        </div>
        </td>             
        <td align="center">
        	{if $item.revisado == 0}
        	<a href="javascript:void(0)" onclick="Confirm({$item.estimacionPaymentId})">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" title="Confirmar de Revisado"/>
            </a>
            {/if}        	       	
            <a href="javascript:void(0)" onclick="DeletePaymentPopup({$item.estimacionPaymentId})">
        	<img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar"/>
            </a>          
        </td>
    </tr>  
    
    <tr id="details_{$item.estimacionPaymentId}" style="display:none">
    <td>&nbsp;</td>
    <td colspan="5" align="left">
    <div id="contDetails_{$item.estimacionPaymentId}">
    {include file="{$DOC_ROOT}/templates/lists/estimacion-details.tpl"}
    </div>
    </td></tr>
    
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}