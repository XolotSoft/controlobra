<table width="100%" cellpadding="0" cellspacing="0" border="0">
{foreach from=$item.concepts item=itC key=kC}
<tr>
	<td align="center" width="55">{$itC.estimacionId}</td>
    <td align="center" height="40" width="199" bgcolor="#F8F8F8"> >> </td>       
    <td align="center" bgcolor="#F8F8F8">
    <div align="center" style="padding-top:10px; padding-bottom:8px"><u>{$itC.name}</u></div>
    
    {foreach from=$itC.torres item=iT key=kT}
        <div align="center" style="padding-top:10px"><b>Torre:</b> {$iT.name}</div>
        <table width="200" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center"><b>AREA</b></td>
            <td align="center"><b>EST. ACTUAL</b></td>
        </tr>
        {foreach from=$iT.areas item=iA key=kA}
        <tr>
            <td align="center">{$iA.name}</td>
            <td align="center">{$iA.estimacion|number_format:2:'.':','}</td>
        </tr>
        {/foreach}
        </table>
    {/foreach}
    <br />     
    <div align="center" style="padding-bottom:10px"><b>Unidad:</b> {$itC.unit}</div>
    </td>
    <td align="center" bgcolor="#F8F8F8" width="168">{$itC.totalEst|number_format:2:".":","}</td>
    <td align="center" bgcolor="#F8F8F8" width="95">{$itC.status}</td>
    <td align="center" bgcolor="#F8F8F8" width="95">
    {if $itC.status == "Pendiente"}
     <a href="javascript:void(0)" onclick="ConfirmPayment({$itC.estimacionId})" title="Confirmar Pago">     
     <img src="{$WEB_ROOT}/images/icons/ok.png" class="spanConfirm" id="{$itC.estimacionId}" />
     </a>
     {/if}
     {if $itC.steel == 0}
     <img src="{$WEB_ROOT}/images/icons/details.png" class="spanView" id="{$itC.estimacionId}" title="Ver Detalles"/>
     {else}
     <a href="javascript:void(0)" onclick="ViewEstAceroPopup({$itC.estimacionId})">
     	<img src="{$WEB_ROOT}/images/icons/details.png" title="Ver Detalles" border="0"/>
     </a>
     {/if}
     <img src="{$WEB_ROOT}/images/icons/action_delete.gif" class="spanDelete" id="{$itC.estimacionId}" title="Eliminar"/>
    </td>
</tr>
{foreachelse}
<tr>
	<td align="center" width="40"></td>
    <td align="center" bgcolor="#F8F8F8" width="352"> >> </td>
	<td colspan="3" bgcolor="#F8F8F8" align="center" height="40">Ning&uacute;n concepto encontrado.</td>
</tr>
{/foreach}
</table>