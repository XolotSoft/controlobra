<select name="conceptConId" id="conceptConId" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$concepts item=item key=key}
<option value="{$item.conceptConId}" {if $info.conceptConId == $item.conceptConId}selected{/if}>{$item.name}</option>
{/foreach}
</select>