<select name="typeId_{$nom}" id="typeId_{$nom}" class="smallInput" onchange="UpdateColorArea('{$nom}')">
<option value="">Seleccione</option>
{foreach from=$types item=item key=key}
<option value="{$key}" {if $iD.typeId == $key}selected{/if}>{$item.name}</option>
{/foreach}
</select>