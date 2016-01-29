<select name="subTypeId_{$nom}" id="subTypeId_{$nom}" class="smallInput" onchange="UpdateColorAreaSub('{$nom}')">
<option value="">Seleccione</option>
{foreach from=$types[$typeId].subTypes item=item key=ky}
<option value="{$ky}" {if $subTypeId == $ky && $subTypeId != ""}selected{/if}>{$item.name}</option>
{/foreach}
</select>