<select name="projDeptoId2" id="projDeptoId2" class="smallInput" onchange="LoadCustomer()">
<option value="">Seleccione</option>
{foreach from=$areas item=item key=key}
<option value="{$item.projDeptoId}" {if $info.projDeptoId == $item.projDeptoId}selected{/if}>{$item.name}</option>
{/foreach}
</select>