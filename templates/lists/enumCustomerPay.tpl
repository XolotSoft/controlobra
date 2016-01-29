<select name="customerId" id="customerId" class="smallInput" onchange="LoadItems()">
<option value="">Seleccione</option>
{foreach from=$customers item=item key=key}
<option value="{$item.customerId}" {if $info.customerId == $item.customerId}selected{/if}>{$item.name|truncate:30:"..."}</option>
{/foreach}
</select>