<select name="vProjLevelId2" id="vProjLevelId2" class="smallInput">
<option value="">Seleccione</option>
{foreach from=$levels item=item key=key}
<option value="{$item.projLevelId}">{$item.level}</option>
{/foreach}
</select>