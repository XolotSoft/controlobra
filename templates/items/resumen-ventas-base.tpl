    
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;METROS TOTALES DE VENTA</td>
        <td class="txtBlack" align="right">{$info.mtsTotVta|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;METROS TOTALES VENDIDOS</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right">{$info.mtsTotVen|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;METROS TOTALES POR VENDER</td>
        <td class="txtBlack" align="right">{$info.mtsTotXVen|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;AVANCE DE VENTAS</td>
        <td class="txtBlack" align="right">{$info.avanceVtas1|number_format:2:'.':','}%&nbsp;</td>
    </tr>    
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;DEPARTAMENTOS TOTALES</td>
        <td class="txtBlack" align="right">{$info.totDeptos|number_format:0:'.':','} DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;DEPARTAMENTOS VENDIDOS</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right">{$info.totDeptosVen|number_format:0:'.':','} DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;DEPARTAMENTOS POR VENDER</td>
        <td class="txtBlack" align="right">{$info.totDeptosXVen|number_format:0:'.':','} DEPTOS&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;AVANCE DE VENTAS</td>
        <td class="txtBlack" align="right">{$info.avanceVtas2|number_format:2:'.':','}%&nbsp;</td>
    </tr>    
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="#DDD9C3" class="txtBlack" height="40">&nbsp;TOTAL VENDIDO</td>
        <td bgcolor="#DDD9C3" class="txtBlack" align="right">${$info.totalVend|number_format:2:'.':','}&nbsp;</td>
    </tr>    
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;PROMEDIO VENTA POR m2</td>
        <td class="txtBlack" align="right">${$info.promVtaM2|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td class="txtBlack" height="40">&nbsp;VENTA PARA ALCANZAR META</td>
        <td class="{if $info.vtaAlcMeta >= 0}txtBlack{else}txtRojo2{/if}" align="right">${$info.vtaAlcMeta|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td colspan="2" height="40">&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="" class="txtBlack" height="40">&nbsp;TOTAL VENTA PROYECTADA</td>
        <td bgcolor="" class="txtBlack" align="right">${$info.totVtaProy|number_format:2:'.':','}&nbsp;</td>
    </tr>    
    <tr>    	
        <td bgcolor="" class="txtBlack" height="40">&nbsp;TOTAL VENTA CON PROMEDIO ACTUAL</td>
        <td bgcolor="" class="txtBlack" align="right">${$info.totVtaProm|number_format:2:'.':','}&nbsp;</td>
    </tr>
    <tr>    	
        <td bgcolor="#948B54" class="txtBlack" height="40">&nbsp;DIFERENCIA CONTRA META</td>
        <td bgcolor="#948B54" class="{if $info.difMeta >= 0}txtBlack{else}txtRojo{/if}" align="right">
        ${$info.difMeta|number_format:2:'.':','}&nbsp;
        </td>
    </tr>
   

{*}    
{foreachelse}
<tr><td colspan="9" align="center" height="40">Ning&uacute;n registro encontrado.</td></tr>
{/foreach}
{*}