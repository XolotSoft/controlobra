<select name="subTypeId_{$nom}" id="subTypeId_{$nom}" class="smallInput" onchange="UpdateColorAreaSub('{$nom}')">
<option value="">Seleccione</option>
{foreach from=$types[$iD.typeId].subTypes item=item key=ky}
<option value="{$ky}" {if $iD.subTypeId === ''}{else}{if $iD.subTypeId == $ky}selected{/if}{/if}>{$item.name}</option>
{/foreach}
</select>