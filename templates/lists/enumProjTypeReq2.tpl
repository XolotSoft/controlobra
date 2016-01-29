{foreach from=$types item=item key=key}
<input type="checkbox" name="projTypes[]" value="{$item.projTypeId}" onclick="LoadItems()" />{$item.name}
<br />
{foreachelse}
Ninguna &aacute;rea encontrada.
{/foreach}