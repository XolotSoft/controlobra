<select name="matSubcatId" id="matSubcatId" class="smallInput" onchange="LoadMatConcepts()">
<option value="">Seleccione</option>
{foreach from=$subcategories item=item key=key}
<option value="{$item.matSubcatId}" {if $info.matSubcatId == $item.matSubcatId}selected{/if}>{$item.name}</option>
{/foreach}
</select>