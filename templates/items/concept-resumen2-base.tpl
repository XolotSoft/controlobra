{foreach from=$projects.items item=item key=key}    
    
    <tr id="cats_{$item.projectId}">    	
        <td colspan="7" bgcolor="#FFFFFF">
        {include file="{$DOC_ROOT}/templates/lists/concept-resumen-cat2.tpl"}
        </td>
    </tr>
        
{foreachelse}
<tr><td colspan="7" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}