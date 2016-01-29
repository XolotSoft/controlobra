{foreach from=$projItems item=item key=key}

	{foreach from=$item.contracts item=con key=kC}    
    <tr>
    	<td align="center" height="40">
        <a href="javascript:void(0)" onclick="ViewDesglosado('{$item.projItemId}_{$con.contractId}')">
        	<div id="iconDesg_{$item.projItemId}_{$con.contractId}">[+]</div>
        </a>
        </td>
        <td>&nbsp;{$con.customer}</td>
        <td align="center">{$con.depto} {$item.name}</td>
        <td align="center">{$con.m2Depto|number_format:2:'.':','} m2</td>
        <td align="center">${$con.priceM2|number_format:2:'.':','}</td>
        <td align="right">${$con.total|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.totalPagos|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.saldoVencido|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.saldoExtra|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.saldoTotal|number_format:2:'.':','}&nbsp;</td>        
    </tr>
    
    <tr id="desg_{$item.projItemId}_{$con.contractId}" style="display:none">
    	<td colspan="10">
    	<table width="100%" cellpadding="0" cellspacing="0" class="tblNoBorder">
        {foreach from=$con.docs item=doc key=kD}
        <tr>
            <td align="center" height="40" width="26">
            -
            </td>
            <td bgcolor="#EEECE1" width="231">&nbsp;{$doc.noExpiry} ({$doc.fecha})</td>
            <td bgcolor="#EEECE1" width="76"></td>
            <td bgcolor="#EEECE1" width="96"></td>
            <td bgcolor="#EEECE1" width="96"></td>
            <td bgcolor="#EEECE1" width="96"></td>            
            <td bgcolor="#EEECE1" width="96" align="right">${$doc.monto|number_format:2:'.':','}&nbsp;</td>
            <td bgcolor="#EEECE1" width="96"></td>
            <td bgcolor="#EEECE1"></td>
        </tr>
        {foreachelse}
        <tr>
        	<td colspan="9">Ning&uacute;n registro encontrado.</td>
        </tr>
        {/foreach}
        </table>
        </td>
    </tr>    
    {/foreach}
    
    {assign var="costoM2" value="{$item.total/$item.m2Depto}"}
     
    <tr>
    	<td align="center" height="40"></td>
        <td bgcolor="#DDD9C3" class="txtBlack"><b>TOTAL TORRE {$item.name}</b></td>
        <td bgcolor="#DDD9C3"></td>
        <td bgcolor="#DDD9C3" align="center" class="txtBlack"><b>{$item.m2Depto|number_format:2:'.':','} m2</b></td>
        <td bgcolor="#DDD9C3" align="center" class="txtBlack"><b>${$costoM2|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#DDD9C3" align="right" class="txtBlack"><b>${$item.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#DDD9C3" align="right" class="txtBlack"><b>${$item.totalPagos|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#DDD9C3" align="right" class="txtBlack"><b>${$item.saldoVencido|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#DDD9C3" align="right" class="txtBlack"><b>${$item.saldoExtra|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#DDD9C3" align="right" class="txtBlack"><b>${$item.saldoTotal|number_format:2:'.':','}</b>&nbsp;</td>
    </tr>
    <tr><td colspan="9" height="10"></td>
{foreachelse}
<tr><td colspan="10" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if $projItems|count > 0}  
	
    {assign var="costoM2" value="{$info.total/$info.m2Depto}"}
  
    <tr>
    	<td align="center" class="txtBlack" height="40"></td>
        <td bgcolor="#B8CCE4" class="txtBlack"><b>GRAN TOTAL</b></td>
        <td bgcolor="#B8CCE4"></td>
        <td bgcolor="#B8CCE4" align="center" class="txtBlack"><b>{$info.m2Depto|number_format:2:'.':','} m2</b></td>
        <td bgcolor="#B8CCE4" align="center" class="txtBlack"><b>${$info.costoM2|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.totalPagos|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.saldoVencido|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.saldoExtra|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.saldoTotal|number_format:2:'.':','}</b>&nbsp;</td>
    </tr>
{/if}