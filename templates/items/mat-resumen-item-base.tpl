{foreach from=$projects.items item=item key=key}    
    
    {include file="{$DOC_ROOT}/templates/lists/mat-resumen-item-torre.tpl"}
    
{if $showPrecio}    
    {if count($item.torres)}    
    <tr>
        <td align="left" bgcolor="#333333" style="color:#FFFFFF" colspan="9">
        	<b>TOTAL PROYECTO</b>
        </td>
        <td align="right" bgcolor="#333333" style="color:#FFFFFF">
        	<b>${$item.total|number_format:2:'.':','}</b>&nbsp;
        </td>
        <td align="center" bgcolor="#333333" style="color:#FFFFFF">100.00</td>
    </tr>
    {/if}
{/if}
    
{foreachelse}
<tr><td colspan="11" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}