<table width="60%">
<tr>
    <td><div align="center"><b>PROYECTO</b></div></td>
    <td width="60"><div align="center"><b>ACCION</b></div></td>
</tr>
{foreach from=$bankProjects item=item key=key}
<tr>
    <td align="left">&nbsp;{$item.nombre}</td>
    <td>
    <div align="center">
        <a href="javascript:void(0)" onclick="DeleteProject({$key})">
            <img src="{$WEB_ROOT}/images/icons/delete.png" border="0" />
        </a>
    </div>
    </td>
</tr>
{foreachelse}
<tr>
	<td colspan="2"><div align="center">Ning&uacute;n registro encontrado.</div></td>
</tr>
{/foreach}
</table>
<br />