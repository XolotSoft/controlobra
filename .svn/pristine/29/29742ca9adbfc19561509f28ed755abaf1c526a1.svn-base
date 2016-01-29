<table width="400" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center"><div align="center"><b>Nombre</b></div></td>
    <td align="center" width="130"><div align="center"><b>% Retenci&oacute;n</b></div></td>
</tr>
{foreach from=$projects item=item key=key}
<tr>
	<td>
		<input type="checkbox" name="projIds[{$item.projectId}]" value="{$item.projectId}" {if $item.checked}checked{/if} />{$item.name|truncate:30:"..."}
        <input type="hidden" name="idSupProjs[{$item.projectId}]" value="{$item.supProjId}" />
    </td>
	<td align="center">
    	<div align="center">
    	<input type="text" class="smallInput" name="retencion[{$item.projectId}]" value="{$item.retencion}" style="width:100px"/>
    	</div>
    </td>
</tr>
{foreachelse}
<tr><td align="center" colspan="2"><div align="center">Ning&uacute;n proyecto encontrado.</div></td></tr>
{/foreach}
</table>