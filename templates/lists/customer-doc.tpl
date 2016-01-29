<table width="100%" cellpadding="0" cellspacing="0" id="tblDocs" border="0" class="sortable boxTable">
<thead>
    <tr>
        <th width="80">No.</th>
        <th width="250">Nombre</th>
        <th width="">Archivo</th>
        <th width="100" class="nosort">Acciones</th>
  </tr>
</thead>
<tbody>
{foreach from=$docs item=item key=key}    
<tr>
    <td align="center" height="40">{$key + 1}</td>
    <td align="center">{$item.name}</td>        
    <td align="center">
        <a href="{$WEB_ROOT}/docs/customer/{$item.archivo}" target="_blank">{$item.archivo}</a>
    </td>
    <td align="center">            
    <a href="{$WEB_ROOT}/docs/customer/{$item.archivo}" target="_blank">
        <img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Archivo" border="0" />
    </a>
    <a href="javascript:void(0)" onclick="DeleteDoc({$item.custDocId})" title="Eliminar">
        <img src="{$WEB_ROOT}/images/icons/action_delete.gif" id="{$item.bankId}"/>
    </a>
    </td>
</tr>
{foreachelse}
<tr>
    <td align="center" colspan="4" height="30">Ning&uacute;n documento encontrado.</td>
</tr>
{/foreach}
</tbody>
<tfoot>
    <tr>
        <td colspan="4" align="right" class="tblPages" height="22">
        {if count($banks.pages)}
        {include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$banks.pages}
        {/if}
        </td>
    </tr>
</tfoot>      
</table>