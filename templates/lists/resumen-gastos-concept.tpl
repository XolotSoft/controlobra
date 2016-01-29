<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$itS.concepts item=itC key=kC}
<tr>
    <td class="colR" align="left" height="25" width="{$wConcept+15}">&nbsp;
    	{$itC.name}
    </td>
    <td>
    {include file="{$DOC_ROOT}/templates/lists/resumen-gastos-description.tpl"}
    </td>
</tr>
{/foreach}

{foreach from=$itS.concepts2 item=itC key=kC}
<tr>
    <td class="colR" align="left" height="25" width="{$wConcept+15}">&nbsp;
    	{$itC.name}
    </td>
    <td>
    {include file="{$DOC_ROOT}/templates/lists/resumen-gastos-description.tpl"}
    </td>
</tr>
{/foreach}

</table>