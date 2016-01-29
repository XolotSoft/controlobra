<select name="projItemId" id="projItemId" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$items item=item key=key}
<option value="{$item.projItemId}">{$item.name}</option>
{/foreach}
</select>