<select name="curProjId" id="curProjId" class="smallInput" onchange="UpdateCurrentProj()">
<option value="">Seleccione</option>
{foreach from=$listProys item=item key=key}
<option value="{$item.projectId}" {if $curProjId == $item.projectId}selected{/if}>{$item.name|truncate:32:"..."}</option>
{/foreach}
</select>