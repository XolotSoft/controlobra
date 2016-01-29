{foreach from=$item.projProv item=it key=ky}
    <tr>       
        <td height="40" align="center"> > </td>
        <td>&nbsp;{$it.name}</td>
        <td align="center">
        {if $it.pdf}
            <a href="{$WEB_ROOT}/archivos/pdf/{$it.pdf}" target="_blank">
            <img src="{$WEB_ROOT}/images/icons/pdf.png" title="Ver Pdf" border="0"/></a>
            <a href="javascript:void(0)" onclick="DeletePdf({$it.supProjId})">
            <img src="{$WEB_ROOT}/images/icons/delete.png" title="Eliminar Pdf" border="0"/></a>
        {else}
        <a href="javascript:void(0)" onclick="AddPdf({$item.supplierId},{$it.projectId})">
        <img src="{$WEB_ROOT}/images/icons/add.png" title="Agregar Pdf" border="0"/></a>
        {/if}
    	</td>
    </tr>
{foreachelse}
<tr><td colspan="3" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}