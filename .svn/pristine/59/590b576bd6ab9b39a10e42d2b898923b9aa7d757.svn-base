{foreach from=$suppliers.items item=item key=key}
    <tr>
        <td align="center" height="40">{$key + 1}</td>       
        <td align="center">{$item.tipo|capitalize}</td>
        <td>&nbsp;{$item.name}</td>
        <td align="center">{$item.phone}</td>
        <td align="center">
        {if $item.tipo == "proveedor"}       
        <a href="javascript:void(0)" onclick="ViewProjectsProv({$item.supplierId})">
        <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Proyectos" />
        </a>
        {else}
        <a href="javascript:void(0)" onclick="ViewProjects({$item.supplierId})">
        <img src="{$WEB_ROOT}/images/icons/view.png" border="0" title="Ver Proyectos" />
        </a>
        {/if}
        </td>        
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$item.supplierId}" title="Eliminar"/>
            <img src="{$WEB_ROOT}/images/icons/edit.gif" class="spanEdit" id="{$item.supplierId}" title="Editar"/>
        </td>
    </tr>
    
    <tr id="proj_{$item.supplierId}" style="display:none">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" align="left">
    {include file="{$DOC_ROOT}/templates/lists/supplier-project.tpl"}
    </td></tr>
    
    <tr id="projProv_{$item.supplierId}" style="display:none">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" align="left">
    {include file="{$DOC_ROOT}/templates/lists/supplier-project-prov.tpl"}
    </td></tr>
    
{foreachelse}
<tr><td colspan="6" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}