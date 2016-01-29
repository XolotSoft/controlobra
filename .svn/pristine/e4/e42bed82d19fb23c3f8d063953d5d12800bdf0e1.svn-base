<select name="matSubcatId[{$key}]" id="matSubcatId_{$key}" class="smallInput" onchange="LoadMaterials({$key})">
<option value="">Seleccione</option>
{foreach from=$subcategories[{$key}] item=itS key=kS}
<option value="{$itS.matSubcatId}" {if $item.matSubcatId == $itS.matSubcatId}selected{/if}>{$itS.name}</option>
{/foreach}
</select>