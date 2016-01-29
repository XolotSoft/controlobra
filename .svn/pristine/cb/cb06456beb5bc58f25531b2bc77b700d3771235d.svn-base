<select name="supplierId_{$item.conceptMatId}" id="supplierId_{$item.conceptMatId}" class="smallInput" onchange="GetMatPrice({$item.conceptMatId})">
<option value="">Seleccione</option>
{foreach from=$item.suppliers item=it key=key}
<option value="{$it.supplierId}" {if $info.supplierId == $it.supplierId}selected{/if}>{$it.name|truncate:25:"..."}</option>
{/foreach}
</select>