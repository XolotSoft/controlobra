<select name="projDeptoId" id="projDeptoId" class="smallInput" onchange="UpdateM2Depto()">
<option value="">Seleccione</option>
{foreach from=$areas item=item key=key}
<option value="{$item.projDeptoId}" {if $info.projDeptoId == $item.projDeptoId}selected{/if}>{$item.name}</option>
{/foreach}
</select>