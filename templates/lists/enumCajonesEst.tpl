<select name="projCajonId[{$key}]" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$cajones item=it key=key}
<option value="{$it.projCajonId}" {if $it.projCajonId == $item.projCajonId}selected{/if}>{$it.name}</option>
{/foreach}
</select>