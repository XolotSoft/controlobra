<select name="suppliers[{$key}]" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$suppliers item=it key=k}
<option value="{$it.supplierId}" {if $item.supplierId == $it.supplierId}selected{/if}>{$it.name|truncate:30:"..."}</option>
{/foreach}
</select>