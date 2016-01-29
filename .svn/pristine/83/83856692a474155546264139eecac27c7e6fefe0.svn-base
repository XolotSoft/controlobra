{if $suppliers}
<select name="supplierId" id="supplierId" class="smallInput" onchange="LoadItems()">
{foreach from=$suppliers item=item key=key}
<option value="{$item.supplierId}" {if $info.supplierId == $item.supplierId}selected{/if}>{$item.name}</option>
{/foreach}
</select>
{else}
Ning&uacute;n contratista encontrado.
<input type="hidden" name="supplierId" id="supplierId" value="" />
{/if}