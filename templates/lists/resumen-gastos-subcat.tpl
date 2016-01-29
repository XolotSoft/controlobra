<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itC.subcategories item=itS key=kS}
<tr>
    <td class="colR" align="left" height="25" width="{$wSubcat+15}">&nbsp;
    	{$itS.name}
    </td>
    <td>
    {include file="{$DOC_ROOT}/templates/lists/resumen-gastos-concept.tpl"}
    </td>
</tr>
{/foreach}
</table>