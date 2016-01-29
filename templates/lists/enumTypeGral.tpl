<select name="typeId{$nom}" id="typeId{$nom}" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$types item=item key=key}
<option value="{$key}" {if $info.typeId == $item.typeId}selected{/if}>{$item.name}</option>
{/foreach}
</select>