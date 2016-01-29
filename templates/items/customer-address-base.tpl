{foreach from=$item.address item=it key=ky}
    <tr>       
        <td height="40" align="center"> > </td>
        <td>
        <div style="padding:6px">
            {$it.street},
            <br />
        	{if $it.noExt}
            	<b>No. Ext.</b>: {$it.noExt},
            {/if}
            {if $it.noInt}
            	<b>No. Int.</b>: {$it.noInt},            
            	<b>C&oacute;digo Postal</b>: {$it.postalCode},
            {/if}
            {if $it.colonia}
            	<br />
            	<b>Colonia</b>: {$it.colonia}
            {/if}
        </div>
        </td>        
        <td align="center">{if $it.city}{$it.city}{/if}</td>
        <td align="center">{if $it.state}{$it.state}{/if}</td>
        <td align="center">
        <a href="javascript:void(0)" onclick="DeleteAddressPopup({$it.custAddressId})">
        <img src="{$WEB_ROOT}/images/icons/action_delete.gif" title="Eliminar Direcci&oacute;n"/>
        </a>
        <a href="javascript:void(0)" onclick="EditAddressPopup({$it.custAddressId})">
        <img src="{$WEB_ROOT}/images/icons/edit.gif" id="{$item.customerId}" title="Editar Direcci&oacute;n"/>
        </a>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="5" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}