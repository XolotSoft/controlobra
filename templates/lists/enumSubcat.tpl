<select name="subcategoryId" id="subcategoryId" class="smallInput" onchange="LoadMaterials()">
<option value="">Seleccione</option>
{foreach from=$subcategories item=item key=key}
<option value="{$item.subcategoryId}" {if $info.subcategoryId == $item.subcategoryId}selected{/if}>{$item.name}</option>
{/foreach}
</select>