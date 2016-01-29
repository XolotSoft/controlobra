<select name="projItemId" id="projItemId" class="smallInput" onchange="LoadAreas()">
<option value="">Seleccione</option>
{foreach from=$items item=item key=key}
<option value="{$item.projItemId}" {if $info.projItemId == $item.projItemId}selected{/if}>{$item.name}</option>
{/foreach}
</select>