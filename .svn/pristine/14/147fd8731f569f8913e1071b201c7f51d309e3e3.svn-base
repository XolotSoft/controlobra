<table width="400" cellpadding="0" cellspacing="0" border="0" style="border:0px">
{section name=foo start=0 loop={$areas} step=1}
	{assign var="k" value=$smarty.section.foo.index}
<tr>
    <td style="border:0px" width="100">
        <select name="projEjeLId_{$k}" id="projEjeLId_{$k}" class="smallInput">
        <option value="">Seleccione</option>
        {foreach from=$ejesL item=item key=key}
        <option value="{$item.projEjeLId}" {if $ejes[$k].projEjeLId == $item.projEjeLId}selected{/if}>{$item.letra|replace:"1":"'"}</option>
        {/foreach}
        </select>
    </td>
    <td style="border:0px" align="center" width="10"> - </td>
    <td style="border:0px" width="100">
        <select name="projEjeL2Id_{$k}" id="projEjeL2Id_{$k}" class="smallInput">
        <option value="">Seleccione</option>
        {foreach from=$ejesL item=item key=key}
        <option value="{$item.projEjeLId}" {if $ejes[$k].projEjeL2Id == $item.projEjeLId}selected{/if}>{$item.letra|replace:"1":"'"}</option>
        {/foreach}
        </select>
    </td>
    <td width="10" style="border:0px"> | </td>
    <td style="border:0px" width="100">
        <select name="projEjeNId_{$k}" id="projEjeNId_{$k}" class="smallInput">
        <option value="">Seleccione</option>
        {foreach from=$ejesN item=item key=key}
        <option value="{$item.projEjeNId}" {if $ejes[$k].projEjeNId == $item.projEjeNId}selected{/if}>{$item.numero|replace:"A":"'"}</option>
        {/foreach}
        </select>
    </td>
    <td style="border:0px" align="center" width="10"> - </td>
    <td style="border:0px" width="">
        <select name="projEjeN2Id_{$k}" id="projEjeN2Id_{$k}" class="smallInput">
        <option value="">Seleccione</option>
        {foreach from=$ejesN item=item key=key}
        <option value="{$item.projEjeNId}" {if $ejes[$k].projEjeN2Id == $item.projEjeNId}selected{/if}>{$item.numero|replace:"A":"'"}</option>
        {/foreach}
        </select>
    </td>
</tr>
{/section}
{if $areas == 0}
<tr><td align="center" style="border:0px">Ning&uacute;n eje encontrado.</td></tr>
{/if}
</table>