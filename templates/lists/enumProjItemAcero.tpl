{foreach from=$items item=item key=key}
<input type="checkbox" name="projItems[]" value="{$item.projItemId}" onclick="LoadLevelsAcero()" {if $item.checked}checked{/if} />{$item.name}
<br />
{foreachelse}
Ninguna torre encontrada.
{/foreach}