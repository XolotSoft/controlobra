{foreach from=$customers.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>       
        <td>&nbsp;{$item.name}</td>
        <td align="center">{if $item.category}{$item.category|capitalize}{/if}</td>
        <td align="center">{$item.phone}</td>
        <td align="center">
        <a href="{$WEB_ROOT}/customer-img/customerId/{$item.customerId}">
        <img src="{$WEB_ROOT}/images/icons/add.png" /></a>
        </td>
        <td align="center">        
        <a href="javascript:void(0)" onclick="ViewAddress({$item.customerId})">
            <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Direcciones" />
        </a>
        <a href="javascript:void(0)" onclick="AddAddressDiv({$item.customerId})">
        	<img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Agregar Direcci&oacute;n" />
        </a>
        </td>
        <td align="center">{if $item.active}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.customerId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.customerId}" title="Editar"/>
            <a href="{$WEB_ROOT}/customer-email/customerId/{$item.customerId}" title="Enviar Correo">
            <img src="{$WEB_ROOT}/images/icons/email.png" border="0"/></a>
            <a href="{$WEB_ROOT}/customer-doc/customerId/{$item.customerId}" title="Documentaci&oacute;n">
            <img src="{$WEB_ROOT}/images/icons/report.png" border="0"/></a>
        </td>
    </tr>
    
    <tr id="address_{$item.customerId}" style="display:none">
        <td>&nbsp;</td>        
        <td colspan="7" align="left">
        <div id="contAddress_{$item.customerId}">
        {include file="{$DOC_ROOT}/templates/lists/customer-address.tpl"}
        </div>
        </td>
    </tr>
    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}