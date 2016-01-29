<select name="vSubcategoryId" id="vSubcategoryId" class="smallInput" onchange="LoadConceptConsSearch()">
<option value="">Seleccione</option>
{foreach from=$subcategorias item=item key=key}
<option value="{$item.subcategoryId}">{$item.name}</option>
{/foreach}
</select>