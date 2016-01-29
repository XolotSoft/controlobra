<select name="projectId" id="projectId" class="smallInput" onchange="LoadItems()">
<option value="">Seleccione</option>
{foreach from=$projects item=item key=key}
<option value="{$item.projectId}" {if $info.projectId == $item.projectId}selected{/if}>{$item.name}</option>
{/foreach}
</select>