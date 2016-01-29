<select name="categoryId" id="categoryId" class="smallInput" onchange="LoadMatSubcats()">
<option value="">Seleccione</option>
{foreach from=$categories item=item key=key}
<option value="{$item.categoryId}" {if $info.categoryId == $item.categoryId}selected{/if}>{$item.name}</option>
{/foreach}
</select>