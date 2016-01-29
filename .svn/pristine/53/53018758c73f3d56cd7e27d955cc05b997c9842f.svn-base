{foreach from=$projItems item=item key=key}

	{foreach from=$item.contracts item=con key=kC}
    
    {assign var="participacion" value="{($con.total * 100) / $info.total}"}
       
    <tr>
    	<td align="center" height="40"></td>
        <td>&nbsp;{$con.customer|upper}</td>
        <td align="center">{$participacion|number_format:2:'.':','} %</td>
        <td align="right">${$con.total|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.totalPagos|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.saldoVencido|number_format:2:'.':','}&nbsp;</td>
        <td align="right">${$con.saldoTotal|number_format:2:'.':','}&nbsp;</td>
        <td align="center">
        	<a href="{$WEB_ROOT}/resumen-edocta-accionistas/contractId/{$con.contractId}" title="Ver Detalles">
        	<img src="{$WEB_ROOT}/images/icons/view.png" border="0"/>
            </a>
        </td>
    </tr>    
    {/foreach}
    
{foreachelse}
<tr><td colspan="8" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}

{if $projItems|count > 0}    
    <tr>
    	<td align="center" class="txtBlack" height="40"></td>
        <td bgcolor="#B8CCE4" class="txtBlack"><b>GRAN TOTAL</b></td>
        <td bgcolor="#B8CCE4"></td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.total|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.totalPagos|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.saldoVencido|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4" align="right" class="txtBlack"><b>${$info.saldoTotal|number_format:2:'.':','}</b>&nbsp;</td>
        <td bgcolor="#B8CCE4"></td>
    </tr>
{/if}