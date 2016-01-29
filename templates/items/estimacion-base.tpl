{foreach from=$suppliers item=item key=key}
<tr>
	<td align="center"></td>       
    <td height="40" align="center">
        <a href="javascript:void(0)" onclick="ViewConcepts({$item.supplierId})">
            {$item.name}
        </a>
    </td>        
    <td align="center" colspan="3">&nbsp;</td>
    <td align="center">
        <a href="javascript:void(0)" onclick="ViewConcepts({$item.supplierId})">
            <div id="iconSup_{$item.supplierId}">[+]</div>
        </a>
    </td>    
</tr>

<tr id="sup_{$item.supplierId}" style="display:none">
    <td colspan="6">
    {include file="{$DOC_ROOT}/templates/lists/estimacion-concept.tpl"}
    </td>
</tr>
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}