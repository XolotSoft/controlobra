<select name="materialId[{$key}]" id="materialId_{$key}" class="smallInput" onchange="LoadInfoMat({$key})">
<option value="">Seleccione</option>
{foreach from=$materials item=itM key=kM}
<option value="{$itM.materialId}" {if $item.materialId == $itM.materialId}selected{/if}>{$itM.name}</option>
{/foreach}
</select>