<div class="grid_16" id="content">
    
  <div class="grid_9">
  <h1 class="resumenes">Estado de Cuenta de Accionistas</h1>
  </div>
  {*
  <div class="grid_6" id="eventbox">
      <a href="{$WEB_ROOT}/resumen-edoctagral-print" class="inline_print" target="_blank">Imprimir Resumen</a>
  </div>
  *}
  <div class="clear">
  </div>
  
  <div id="portlets">

  <div class="clear"></div>
  
  <div class="portlet">
  	        
      <div class="portlet-content nopadding" id="contenido">
        
        <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="tblNoBorder">
        <tr>
        	<td width="38%" valign="top">
            <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="tblNoBorder" style="width:350px">            
            <tbody>     
                <tr>    	
                    <td width="100" bgcolor="#B8CCE4" class="txtBlack" height="40">&nbsp;CLIENTE</td>
                    <td bgcolor="#B8CCE4" class="txtBlack" align="right">{$info.customer}&nbsp;</td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>    	
                    <td bgcolor="#D8D8D8" class="txtBlack" height="40">&nbsp;VALOR TOTAL</td>
                    <td bgcolor="#D8D8D8" class="txtBlack" align="right">${$info.total|number_format:2:'.':','}&nbsp;</td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>    	
                    <td bgcolor="#D8D8D8" class="txtBlack" height="40">&nbsp;PARTICIPACION</td>
                    <td bgcolor="#D8D8D8" class="txtBlack" align="right">{$info.participacion|number_format:2:'.':','}%&nbsp;</td>
                </tr>
                <tr><td height="10"></td></tr>
            </tbody>
            </table>
                       
      		</td>
            <td width="20"></td>
            <td width="33%" valign="top">
            	
                <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" style="width:350px">
                    <tr>    	
                        <td width="100" bgcolor="#B8CCE4" class="txtBlack" height="88" align="center">&nbsp;<b>PROYECTO</b></td>
                        <td bgcolor="#B8CCE4" class="txtBlack" align="center"><b>{$info.project}</b>&nbsp;</td>
                    </tr>
                </table>
                <div style="height:9px"></div>
				<table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="1" style="width:350px">
                    <tr>    	
                        <td class="txtBlack" height="40">&nbsp;Fecha Firma</td>
                        <td class="txtBlack" align="right">{$info.fecha}&nbsp;</td>
                    </tr>
                </table>
                              
            </td>
            <td align="center">{$info.image}
            	{if $info.image}
                <img src="{$WEB_ROOT}/images/projects/{$info.image}" width="100" height="100" />
                {/if}
            </td>
      </tr>
      </table>
      
      <br />
      
      <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="">
      <tr>
      		<td bgcolor="#C5BE97" align="center" class="txtBlack" height="35" colspan="5"><b>CONDICIONES DEL CONTRATO</b></td>
      </tr>
      <tr>
      		<td width="100" align="center" height="30">DOCUMENTO</td>
            <td width="100" align="center">VALOR DOCUMENTO</td>
            <td width="" align="center">FECHAS DOCUMENTOS</td>
            <td width="" align="center">DOCUMENTOS TOTAL</td>
            <td width="100" align="center">ACUMULADO</td>
      </tr>
      <tr>
      		<td align="left" height="30">&nbsp; ENGANCHE</td>
            <td align="right">${$info.enganche|number_format:2:'.':','} &nbsp;</td>
            <td align="center">{$info.fechaEnganche}</td>
            <td align="center"></td>
            <td align="right">${$info.enganche|number_format:2:'.':','} &nbsp;</td>
      </tr>
      {foreach from=$documentos item=item key=key}
      <tr>
      		<td bgcolor="#DDD9C3" align="left" height="30">&nbsp; {$item.noDocs} Documentos</td>
            <td bgcolor="#DDD9C3" align="right">${$item.monto|number_format:2:'.':','} &nbsp;</td>
            <td bgcolor="#DDD9C3" align="center">{$item.fecha}</td>
            <td bgcolor="#DDD9C3" align="right">${$item.total|number_format:2:'.':','} &nbsp;</td>
            <td bgcolor="#DDD9C3" align="right">${$item.acumulado|number_format:2:'.':','} &nbsp;</td>
      </tr> 
      {/foreach}     
      </table>
      
      <br />
      
      <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="">      
      <tr>
      		<td width="100" align="left" height="30">&nbsp; ACUMULADO DE PAGOS</td>
            <td width="100" align="right">${$info.acumPagos|number_format:2:'.':','} &nbsp;</td>
      </tr>
      <tr>
      		<td width="100" align="left" height="30">&nbsp; SALDO VENCIDO</td>
            <td width="100" align="right">${$info.saldoVenc|number_format:2:'.':','} &nbsp;</td>
      </tr>
      <tr>
      		<td width="100" align="left" height="30">&nbsp; SALDO TOTAL</td>
            <td width="100" align="right">${$info.saldoTot|number_format:2:'.':','} &nbsp;</td>
      </tr>      
      </table>
      
      <br />
      
      <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="">
      <tr>
      		<td bgcolor="#A5A5A5" align="center" class="txtBlack" height="35" colspan="7"><b>ESTADO DE CUENTA</b></td>
      </tr>
      <tr>
      		<td width="" align="center" height="30"><b>DOCUMENTO</b></td>
            <td width="" align="center"><b>FECHAS DOCUMENTOS</b></td>
            <td width="" align="center"><b>VALOR DOCUMENTO</b></td>
            <td width=""></td>
            <td width="" align="center" height="30"><b>FECHA DEPOSITO</b></td>
            <td width="" align="center"><b>DEPOSITO</b></td>
            <td width="" align="center"><b>SALDO</b></td>
      </tr>
      <tr>
      		<td align="left" height="30">&nbsp; Enganche</td>
            <td align="center">{$info.fechaEng}</td>
            <td align="right">${$info.enganche|number_format:2:'.':','} &nbsp;</td>
            <td></td>
            <td align="center">{$info.fechaPagoEng}</td>
            <td align="right">${$info.pagosEng|number_format:2:'.':','} &nbsp;</td>
            <td align="right">${$info.saldoEng|number_format:2:'.':','} &nbsp;</td>
      </tr>
      {foreach from=$docs item=item key=key}
      <tr>
      		<td bgcolor="#D8D8D8" align="left" height="30">&nbsp; {$item.noExpiry}</td>
            <td bgcolor="#D8D8D8" align="center">{$item.fecha}</td>
            <td bgcolor="#D8D8D8" align="right">${$item.monto|number_format:2:'.':','} &nbsp;</td>
            <td bgcolor="#D8D8D8"></td>
            <td bgcolor="#D8D8D8" align="center">{$item.fechaDep}</td>
            <td bgcolor="#D8D8D8" align="right">${$item.pagosDep|number_format:2:'.':','} &nbsp;</td>
            <td bgcolor="#D8D8D8" align="right">${$item.saldoDep|number_format:2:'.':','} &nbsp;</td>
      </tr>
      {/foreach}      
      <tr>
      		<td height="30"></td>
            <td></td>
            <td bgcolor="#A5A5A5" align="right"><b>${$info.totalValDoc|number_format:2:'.':','}</b> &nbsp;</td>
            <td bgcolor="#A5A5A5"></td>
            <td bgcolor="#A5A5A5"></td>
            <td bgcolor="#A5A5A5" align="right"><b>${$info.totalDep|number_format:2:'.':','}</b> &nbsp;</td>
            <td bgcolor="#A5A5A5" align="right"><b>${$info.saldoDep|number_format:2:'.':','}</b> &nbsp;</td>
      </tr>
      </table>
      
      <br />
      
      <table width="100%" cellpadding="0" cellspacing="0" id="tblMain" border="0" class="">
      <tr>
      		<td align="left" class="txtBlack" height="35" width="140">&nbsp; Fecha de Impresi&oacute;n</td>
            <td align="center" width="140">{$info.fechaHoy}<td>
            <td align="center" class="txtBlack">MONEDA CONTRATO M.N.</td>
            <td align="center" width="285" rowspan="2"><b>{$nomProy}</b></td>
      </tr>
      <tr>
   		<td align="left" class="txtBlack" height="35" colspan="3">&nbsp; NOTAS</td>
      </tr>
      </table>
      
      
      </div>
      
    </div>

 </div>
  <div class="clear"> </div>

<div align="center"><a href="{$WEB_ROOT}/resumen-accionistas"> << Regresar </a></div>

</div>