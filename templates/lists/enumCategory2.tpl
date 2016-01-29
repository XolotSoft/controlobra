<select name="categoryId2" id="categoryId2" class="smallInput" onchange="LoadSubcats2()">
<option value="">{if $todos}Todos{else}Seleccione{/if}</option>
{foreach from=$categorias item=item key=key}
<option value="{$item.categoryId}" {if $info.categoryId == $item.categoryId}selected{/if}>{$item.name}</option>
{/foreach}
</select>