<select name="conceptId" id="conceptId" class="smallInput" onchange="ToogleAcero({$isSteel})">
<option value="">Seleccione</option>
{foreach from=$concepts item=item key=key}
<option value="{$item.conceptId}" {if $info.conceptId == $item.conceptId}selected{/if}>{$item.name}</option>
{/foreach}
</select>