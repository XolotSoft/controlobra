<select name="matSubcatId2" id="matSubcatId2" class="smallInput" onchange="LoadMatConcepts2()">
<option value="">Seleccione</option>
{foreach from=$subcategories item=item key=key}
<option value="{$item.matSubcatId}" {if $info.matSubcatId == $item.matSubcatId}selected{/if}>{$item.name}</option>
{/foreach}
</select>