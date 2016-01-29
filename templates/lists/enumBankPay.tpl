<select name="bankId" id="bankId" class="smallInput" onchange="GetNextNoCheque()">
<option value="">Seleccione</option>
{foreach from=$banks item=item key=key}
<option value="{$item.bankId}" {if $info.bankId == $item.bankId}selected{/if}>{$item.bank} - {$item.accountNumber}</option>
{/foreach}
</select>