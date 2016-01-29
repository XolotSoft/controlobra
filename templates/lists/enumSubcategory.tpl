<select name="subcategoryId" id="subcategoryId" class="smallInput" onchange="LoadConceptCons()">
<option value="">Seleccione</option>
{foreach from=$subcategorias item=item key=key}
<option value="{$item.subcategoryId}" {if $info.subcategoryId == $item.subcategoryId}selected{/if}>{$item.name}</option>
{/foreach}
</select>