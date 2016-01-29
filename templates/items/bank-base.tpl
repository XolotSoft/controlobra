{foreach from=$banks.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>
        <td align="center">{$item.bank}</td>        
        <td align="center">{$item.accountNumber}</td>
        <td align="center">${$item.startBalance}</td>
        <td align="center">${$item.saldo}</td>
        <td align="center">
        {foreach from=$item.projects item=nomProy}
        	- {$nomProy} <br />
        {/foreach}
        </td>
        <td align="center">{$item.currency}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.bankId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.bankId}" title="Editar"/>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}