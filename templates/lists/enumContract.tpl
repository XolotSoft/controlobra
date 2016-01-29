<select name="contractId" id="contractId" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$contracts item=item key=key}
<option value="{$item.contractId}">{$item.noContract}</option>
{/foreach}
</select>